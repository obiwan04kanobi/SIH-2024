<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class Authenticated
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('student')) {
            return redirect()->route('login.page')->with('error', 'You need to log in first');
        }

        return $next($request);
    }
}
