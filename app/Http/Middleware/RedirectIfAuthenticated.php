<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null): Response
    {
        //$guards = empty($guards) ? [null] : $guards; (string ...$guards)

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }
        if(Auth::guard($guard)->check()) {
            if(Auth::user()->roles[0]->name === "Manager"){
                return redirect('auth/managers');
            }
            if(Auth::user()->roles[0]->name === "Supervisor"){
                return redirect('auth/supervisors');
            }
            if(Auth::user()->roles[0]->name === "Staff"){
                return redirect('auth/staffs');
            }
            return redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }
}
