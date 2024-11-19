<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsUndergraduate
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || 
            !in_array(auth()->user()->grade, ['1', '2', '3', '4']))
            //|| auth()->user()->authority) 
            {
            return redirect()->route('unauthorized');
        }

        return $next($request);
    }
}