<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Log;

class TestFetchController extends Controller
{
    public function fetchJsonFile()
    {
        $filePath = 's3://sih-2024/reena/10th Marksheet/analysed/reena_10th_marksheet.pdf.json';

        try {
            // Log the command for debugging
            $command = [
                'aws', 's3', 'cp',
                escapeshellarg($filePath),
                'php://stdout'
            ];
            Log::info('Executing command', ['command' => implode(' ', $command)]);

            $process = new Process($command);
            $process->run();

            if (!$process->isSuccessful()) {
                Log::error('AWS CLI fetch command failed', [
                    'command' => $process->getCommandLine(),
                    'output' => $process->getOutput(),
                    'error_output' => $process->getErrorOutput()
                ]);
                throw new ProcessFailedException($process);
            }

            $jsonContent = $process->getOutput();
            return response()->json(json_decode($jsonContent, true));

        } catch (\Exception $e) {
            Log::error('Exception occurred', ['message' => $e->getMessage()]);
            return response()->json(['error' => 'Failed to fetch document.', 'message' => $e->getMessage()], 500);
        }
    }
}
