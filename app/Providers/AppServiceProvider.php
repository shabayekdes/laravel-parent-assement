<?php

namespace App\Providers;

use App\DataProviders\DataProviderContract;
use App\DataProviders\DataProviderManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DataProviderContract::class, function ($app) {
            return new DataProviderManager($app->config['data_providers.providers']);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
