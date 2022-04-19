<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\exactly;

class isAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next){
        if( Auth::check() && Auth::user()->user_role == 2 || Auth::user()->user_role==1){
            return $next($request);
        }
        else
        {
            return redirect()->route('admin-login');
        }
        return $next($request);
    }
}
