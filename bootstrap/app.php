<?php

use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Middleware\TestMiddleware;
use App\Http\Middleware\Test2Middleware;
use App\Http\Middleware\Test3Middleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        apiPrefix: 'api/v1/',
        commands: __DIR__ . '/../routes/console.php',
        channels: __DIR__ . '/../routes/channels.php',
        health: '/up',
        then: function () {
            Route::prefix('admin')->middleware('web')
                ->name('admin.')
                ->group(base_path('routes/admin.php'));

            Route::prefix('vendor')->middleware('web')
                ->name('vendor.')
                ->group(base_path('routes/vendor.php'));

            Route::prefix('api/v2/')->middleware('api')
                ->group(base_path('routes/api2.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->prepend([
        //     TestMiddleware::class,
        // ]);
        // \Illuminate\Foundation\Http\Middleware\TrimStrings::class,

        // $middleware->appendToGroup('testGroup', [
        //     TestMiddleware::class,
        //     Test2Middleware::class,
        // ]);
        // $middleware->prependToGroup('testGroup', [
        //     Test3Middleware::class,
        // ]);

        // $middleware->web(append: [
        //     TestMiddleware::class,
        // ]);

        $middleware->alias([
            'test' => TestMiddleware::class,
            'auth2' => AuthMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
