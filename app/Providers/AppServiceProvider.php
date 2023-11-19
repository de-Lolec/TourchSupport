<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MachineLearningManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('MachineLearningManager', function ($app) {
            return new MachineLearningManager();
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
