<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Extensions\MongoDBUserProvider;

class MongoDBUserProviderServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Auth::provider('mongodb', function($app, array $config) {
            return new MongoDBUserProvider($app['hash'], $config['model']);
        });
    }
}
