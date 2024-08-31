<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ValidateDocumentController extends Controller
{
    public function fetchDocument(Request $request)
    {
        $username = $request->query('username');
        $documentType = $request->query('document_type');

        if (!$username || !$documentType) {
            return response()->json(['error' => 'Username and document type are required.'], 400);
        }

        // Format document type and path
        $documentTypeFormatted = str_replace(' ', '_', strtolower($documentType));
        $folderPath = "{$username}/{$documentType}/analysed/";

        try {
            // List files in the 'analysed' folder
            $listProcess = new Process([
                'aws', 's3', 'ls',
                "s3://sih-2024/{$folderPath}"
            ]);
            $listProcess->run();

            if (!$listProcess->isSuccessful()) {
                \Log::error('AWS CLI list command failed', [
                    'command' => $listProcess->getCommandLine(),
                    'output' => $listProcess->getOutput(),
                    'error_output' => $listProcess->getErrorOutput()
                ]);
                throw new ProcessFailedException($listProcess);
            }

            // Extract file names from the list
            $output = $listProcess->getOutput();
            $files = explode("\n", trim($output));

            // Debug output to ensure file names are correct
            \Log::info('Files in analysed folder:', ['files' => $files]);

            // Find the JSON file
            $jsonFiles = array_filter($files, function($file) {
                return preg_match('/\.json$/', $file);
            });

            if (empty($jsonFiles)) {
                return response()->json(['error' => 'No .json file found in the analysed folder.'], 404);
            }

            // Extract the file name from the output
            $jsonFileName = array_values($jsonFiles)[0];
            $jsonFileName = trim($jsonFileName); // Remove any extra spaces

            // Construct the file path
            $filePath = $folderPath . $jsonFileName;

            // Fetch the .json file
            $fetchProcess = new Process([
                'aws', 's3', 'cp',
                "s3://sih-2024/{$filePath}",
                'php://stdout'
            ]);

            $fetchProcess->run();

            if (!$fetchProcess->isSuccessful()) {
                \Log::error('AWS CLI fetch command failed', [
                    'command' => $fetchProcess->getCommandLine(),
                    'output' => $fetchProcess->getOutput(),
                    'error_output' => $fetchProcess->getErrorOutput()
                ]);
                throw new ProcessFailedException($fetchProcess);
            }

            // Return the JSON content from the process output
            $jsonContent = $fetchProcess->getOutput();
            return response()->json(json_decode($jsonContent, true));

        } catch (\Exception $e) {
            \Log::error('Exception occurred', ['message' => $e->getMessage()]);
            return response()->json(['error' => 'Failed to fetch document.', 'message' => $e->getMessage()], 500);
        }
    }
}
