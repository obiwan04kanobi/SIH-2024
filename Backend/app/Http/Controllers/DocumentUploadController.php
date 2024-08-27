<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DocumentUploadController extends Controller
{
    public function uploadDocument(Request $request)
    {
        // Validate the request
        $request->validate([
            'file' => 'required|file|mimes:pdf,jpeg,png,jpg|max:2048',  // Adjust the mime types and max size as needed
            'document_type' => 'required|string|in:10th,12th',  // Document type can be '10th' or '12th'
            'user_id' => 'required|string',  // User ID is required
        ]);

        // Get the user ID from the request
        $userId = $request->input('user_id');

        // Get the document type from the request (e.g., '10th' or '12th')
        $documentType = $request->input('document_type');
        $folderName = $documentType . ' Marksheet';

        // Construct the S3 path
        $s3Path = "{$userId}/{$folderName}";

        // Get the file from the request
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();  // Original file name
        $filePath = $file->getPathName();  // Temporary file path

        // Construct the full S3 destination path
        $s3DestinationPath = "s3://sih-2024/{$s3Path}/{$fileName}";

        // Execute the AWS CLI command
        $command = "aws s3 cp \"{$filePath}\" \"{$s3DestinationPath}\"";
        exec($command, $output, $returnVar);

        // Check if the command was successful
        if ($returnVar === 0) {
            return response()->json([
                'message' => 'File uploaded successfully!',
                'file_path' => $s3DestinationPath,
                'aws_output' => $output  // Optional: Include AWS CLI output in the response
            ], 200);
        } else {
            Log::error('S3 Upload Failed', ['command' => $command, 'output' => $output]);
            return response()->json([
                'message' => 'File upload failed!',
                'error' => 'Failed to upload using AWS CLI',
                'aws_output' => $output  // Optional: Include AWS CLI output in the response
            ], 500);
        }
    }
}
