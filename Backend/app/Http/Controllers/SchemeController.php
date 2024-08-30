<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About_Scheme;

class SchemeController extends Controller
{
    // Fetch all schemes
    public function index()
    {
        $schemes = About_Scheme::all();
        return response()->json($schemes);
    }

    // Insert a new scheme
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'description' => 'required|string|max:255',
                'url' => 'required|string', // Adjust validation to accept file paths
            ]);
    
            $scheme = About_Scheme::create([
                'description' => $validated['description'],
                'url' => $validated['url'],
            ]);
    
            return response()->json(['message' => 'Scheme created successfully', 'scheme' => $scheme], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }    
    
}
