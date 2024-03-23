<?php

namespace App\Providers;

use App\Jobs\ProcessExecuteTotal;
use App\Livewire\Orders;
use App\Repositories\ExecutedRepository;
use App\Repositories\OrderRepository;
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

        $this->app->bind(OrderRepository::class, function ($app) {
            return new OrderRepository();
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
