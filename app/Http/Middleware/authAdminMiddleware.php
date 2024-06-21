<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class AuthAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user() && Auth::user()->role_id == config('constant.role.admin')){
            return $next($request);
        }
        if(Auth::user() && Auth::user()->role_id == config('constant.role.free_user')){
            return $next($request);
        }
        else{
            return redirect()->route('admin.login');
        }
    }
}
