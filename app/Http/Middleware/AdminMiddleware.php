<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- Add this line
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Now this will work correctly
        if (Auth::check()) {
            if (auth()->user()->role === 'admin') {
                return $next($request);
            }
        }

        return redirect('/');
    }
}
