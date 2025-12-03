<?php

namespace App\Http\Middleware;

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
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // If admin guard and already authenticated, redirect to admin dashboard
                if ($guard === 'admin') {
                    return redirect()->route('admin.dashboard');
                }

                // If web guard and already authenticated, redirect to user dashboard
                return redirect()->route('dashboard');
            }
        }

        return $next($request);
    }
}
