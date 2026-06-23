<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class YoRHaAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('yorha_authenticated')) {
            return redirect()->route('auth.login')
                ->with('error', 'Access denied. Unit authentication required.');
        }

        return $next($request);
    }
}