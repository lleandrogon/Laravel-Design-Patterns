<?php

namespace App\Providers;

use App\Events\PostPublished;
use App\Interfaces\TodoInterface;
use App\Listeners\LogPostPublishedListener;
use App\Listeners\NotifyAdminListener;
use App\Models\Todo;
use App\Observers\TodoObserver;
use App\Repositories\TodoRepository;
use Illuminate\Support\Facades\Event;
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
        Event::listen(PostPublished::class, NotifyAdminListener::class);
        Event::listen(PostPublished::class, LogPostPublishedListener::class);
    }
}
