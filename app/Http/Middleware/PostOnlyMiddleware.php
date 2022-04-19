<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostOnlyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( Auth::check() && (Auth::user()->user_role == 1 || Auth::user()->user_role == 2)){
            
            return $next($request);
        }
        else
        {
            return redirect()->route('admin-login');
        }
        return $next($request);
    }
}
