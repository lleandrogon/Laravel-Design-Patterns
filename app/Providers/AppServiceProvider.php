<?php

namespace App\Providers;

use App\Interfaces\TodoInterface;
use App\Models\Todo;
use App\Observers\TodoObserver;
use App\Repositories\TodoRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TodoInterface::class, TodoRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Todo::observe(TodoObserver::class);
    }
}
