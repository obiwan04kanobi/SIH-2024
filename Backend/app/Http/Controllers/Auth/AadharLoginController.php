<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aadhar;
use Illuminate\Support\Facades\Session;

class AadharLoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'aadhar' => 'required|string|max:12',
        ]);
    
        // Fetch user by Aadhaar number
        $aadhar = Aadhar::where('aadhar_number', $request->input('aadhar'))->first();
    
        if ($aadhar) {
            // Check if state is J&K
            if ($aadhar->state === 'J&K') {
                // Create session or cookie for user login
                Session::put('aadhar_number', $aadhar->aadhar_number);
                return redirect()->route('form'); // Redirect to the 'apply' route
            } else {
                return redirect()->back()->withErrors(['message' => 'Student is not applicable due to state restrictions.']);
            }
        } else {
            return redirect()->back()->withErrors(['message' => 'Aadhaar number not found.']);
        }
    }
    
}
