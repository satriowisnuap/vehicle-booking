<?php

use App\Http\Middleware\EnsureUserHasRole;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => EnsureUserHasRole::class,
        ]);

        // Ganti tujuan redirect default (yang tadinya hardcode '/dashboard')
        $middleware->redirectUsersTo(function ($request) {
            $user = $request->user();

            if (! $user) {
                return '/login';
            }

            if ($user->isAdmin()) {
                return route('admin.dashboard');
            }

            if ($user->isApprover()) {
                return route('approver.dashboard');
            }

            return '/login';
        });

        // Pastikan guest yang belum login diarahkan ke /login (biasanya sudah default)
        $middleware->redirectGuestsTo('/login');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
