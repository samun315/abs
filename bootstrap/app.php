<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {

            //Common master Route
            Route::middleware(['web', 'preventBackHistory', 'user'])
                ->prefix('common')
                ->name('common.master.')
                ->group(base_path('routes/common/master.php'));
            //End Sales Common master Route

            //Menu master Route
            Route::middleware(['web', 'preventBackHistory', 'user'])
                ->prefix('menu')
                ->name('menu.master.')
                ->group(base_path('routes/menu/master.php'));
            //End Sales Menu master Route

            //Start Menu Menu-item Route
            Route::middleware(['web', 'preventBackHistory', 'user'])
                ->prefix('menu')
                ->name('menu.')
                ->group(base_path('routes/menu/menu.php'));
            //End Menu Menu-item Route

            //****Start Api Route******//
            Route::middleware(['api'])
                ->prefix('api')
                ->name('api.')
                ->group(base_path('routes/api/api.php'));
            //****Start Api Route******//
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'user' => \App\Http\Middleware\UserAuth::class,
            'preventBackHistory' => \App\Http\Middleware\PreventBackHistory::class,
        ])->web(append: [
            \App\Http\Middleware\GenerateCSPNonce::class,
            \App\Http\Middleware\AuthGates::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
