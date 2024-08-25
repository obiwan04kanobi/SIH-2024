<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; // Import the Session facade
use App\Models\Students as Student;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $otpStore = []; // For demo purposes; use a database or cache in production

    public function sendOtp(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $otp = rand(100000, 999999); // Generate a 6-digit OTP
        session(['otp' => $otp, 'otp_email' => $request->email]); // Store OTP in session
    
        \Log::info('OTP in session after sending: ' . session('otp'));
        \Log::info('Email in session after sending: ' . session('otp_email'));
        
    
        try {
            // Send OTP to user's email
            Mail::raw("Your OTP is: $otp", function($message) use ($request) {
                $message->to($request->email)
                    ->subject('Your OTP Code');
                $message->from('kisanseva13@gmail.com', 'PM-USP YOJANA 2024-25');
            });
    
            return response()->json(['success' => true, 'message' => 'OTP sent to your email']);
        } catch (\Exception $e) {
            \Log::error('OTP sending failed: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to send OTP']);
        }
    }
     
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'password' => 'required|string',
            'otp' => 'required|numeric'
        ]);
    
        $sessionOtp = session('otp');
        $sessionEmail = session('otp_email');
        \Log::info('OTP in session during verification: ' . $sessionOtp);
        \Log::info('Email in session during verification: ' . $sessionEmail);
        \Log::info('OTP in request: ' . $request->otp);
        \Log::info('Email in request: ' . $request->email);
    
        if ($sessionOtp && $sessionEmail === $request->email && $sessionOtp == $request->otp) {
            // Proceed with user registration
            $user = new Student([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);
            $user->save();
    
            // Clear OTP session data
            session()->forget(['otp', 'otp_email']);
    
            // Redirect to login page with a success message
            return redirect('/login')->with('success', 'User registered successfully. Please login.');
        }
    
        return response()->json(['success' => false, 'message' => 'Invalid OTP']);
    }
        
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        // Find the student by email
        $student = Student::where('email', $credentials['email'])->first();

        if ($student && $student->verifyPassword($credentials['password'])) {
            // Login successful
            Session::put('student', $student); // Store the student in session
            return redirect()->intended('/')->with('success', 'Login successful');
        }

        // Login failed
        return redirect()->back()->with('error', 'Invalid email or password');
    }

    public function logout()
    {
        Session::forget('student'); // Clear the student from session
        return redirect('/')->with('success', 'Logout successful');
    }
}
