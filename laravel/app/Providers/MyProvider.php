<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MyProvider extends ServiceProvider
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
        //
    }
}


class DeferredServiceProvider extends ServiceProvider {
    protected $defer = true;
    public function register()
    {
        $this->app->singleton(Connection::class, function () {});
    }
    public function provides()
    {
        return [Connection::class];
    }
}