<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class Test2ServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        dump('Hello from test 2 service provider');
    }
}
