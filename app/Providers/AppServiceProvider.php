<?php

namespace App\Providers;

use App\Repositories\Eloquent\MarvelRepository;
use App\Repositories\MarvelRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MarvelRepositoryInterface::class, MarvelRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
