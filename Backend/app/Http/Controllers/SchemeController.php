<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About_Scheme;

class SchemeController extends Controller
{
    // Fetch all schemes
    public function index()
    {
        $schemes = Scheme::all();
        return response()->json($schemes);
    }

    // Insert a new scheme
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'url' => 'required|url', // Ensure URL is correctly validated
        ]);

        // Create and save the scheme
        $scheme = Scheme::create([
            'description' => $validated['description'],
            'url' => $validated['url'],
        ]);

        return response()->json(['message' => 'Scheme created successfully', 'scheme' => $scheme], 201);
    }
    
}
