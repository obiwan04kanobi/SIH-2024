<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Extensions\MongoSessionHandler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app['session']->extend('mongodb', function ($app) {
            return new MongoSessionHandler();
        });
    }

}
