<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $otp = rand(100000, 999999);
        session(['otp' => $otp, 'otp_email' => $request->email]);

        // Send OTP via email
        Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
            $message->to($request->email)
                ->subject('Your OTP Code');
            $message->from('kisanseva13@gmail.com', 'PM-USP YOJANA 2024-25');
        });

        // Store user info in session for later confirmation
        session(['user_info' => $request->all()]);

        return redirect()->route('verify.otp')->with('message', 'OTP sent to your email.');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|numeric']);

        $sessionOtp = session('otp');
        $userInfo = session('user_info');

        if ($sessionOtp == $request->otp) {
            // Create user
            $user = User::create([
                'name' => $userInfo['name'],
                'email' => $userInfo['email'],
                'phone' => $userInfo['phone'],
                'password' => Hash::make($userInfo['password']),
            ]);

            Auth::login($user);

            // Clear session data
            session()->forget(['otp', 'user_info']);

            return redirect('/')->with('success', 'User registered successfully.');
        }

        return redirect()->back()->withErrors(['otp' => 'Invalid OTP']);
    }
}
