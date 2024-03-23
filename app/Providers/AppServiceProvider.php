<?php

namespace App\Providers;

use App\Jobs\ProcessExecuteTotal;
use App\Repositories\ExecutedRepository;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ExecutedRepository::class, function ($app) {
            return new ExecutedRepository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bindMethod([ProcessExecuteTotal::class, 'handle'], function (ProcessExecuteTotal $job, Application $app) {
            return $job->handle();
        });
    }
}
