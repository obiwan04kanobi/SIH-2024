<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;  // Add this line



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle OTP sending.
     */
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:students,email'],
        ]);

        $otp = rand(100000, 999999); // Generate OTP
        Session::put('otp', $otp); // Store OTP in session

        // Send OTP via email
        Mail::raw('Your OTP code is: ' . $otp, function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Your OTP Code');
        });

        return response()->json(['success' => true]);
    }

    /**
     * Handle registration with OTP verification.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students,email'],
            // 'phone' => ['required', 'string', 'max:20'],
            'password' => ['required', Rules\Password::defaults()],
            'otp' => ['required'],
        ]);
    
        // Check OTP
        if ($request->otp != Session::get('otp')) {
            return back()->withErrors(['otp' => 'Invalid OTP.']);
        }
    
        // Create user
        $user = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
    
        // Clear OTP from session
        Session::forget('otp');
    
        Auth::login($user);
    
        return redirect()->route('home');
    }
    
}
