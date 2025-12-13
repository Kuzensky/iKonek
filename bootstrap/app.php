<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        ]);

        // Disable CSRF validation temporarily to test
        $middleware->validateCsrfTokens(except: [
            'admin/login',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Handle expired CSRF tokens for logout gracefully
        $exceptions->renderable(function (\Illuminate\Session\TokenMismatchException $e, \Illuminate\Http\Request $request) {
            // If the user was trying to logout and the token expired, logout and redirect to home
            if ($request->is('logout') || $request->is('admin/logout')) {
                // Clear the session
                $request->session()->flush();
                $request->session()->regenerate();

                // Redirect to appropriate page
                if ($request->is('admin/logout')) {
                    return redirect()->route('admin.login')
                        ->with('status', 'Your session has expired. Please login again.');
                }

                return redirect('/')
                    ->with('status', 'You have been logged out.');
            }

            // For other routes, show the standard error page
            return response()->view('errors.419', [], 419);
        });
    })->create();
