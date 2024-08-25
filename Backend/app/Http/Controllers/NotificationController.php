<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Fetch all notifications
    public function index()
    {
        $notifications = Notification::all();
        return response()->json($notifications);
    }

    // Insert a new notification
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'url' => 'required|url', // Add validation for the URL
        ]);

        $notification = Notification::create($validated);

        return response()->json(['message' => 'Notification created successfully', 'notification' => $notification], 201);
    }
}
