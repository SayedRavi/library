<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role == 'admin'){
            return $next($request);

        }else{
            auth()->logout();
            return redirect()->route('home')->with([
                'message' => 'invalid attempt',
                'classes' => 'red'
            ]);
        }
    }
}
