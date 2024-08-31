<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            Log::info('User email: ' . $request->email);
            Log::info('User password: ' . $request->password);  // Note: Password is not stored in logs in a real application
            
            $request->authenticate();
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard', absolute: false));
        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
            return back()->withErrors(['email' => 'Invalid login credentials.']);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
