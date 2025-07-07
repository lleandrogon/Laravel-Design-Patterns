<?php

namespace App\Listeners;

use App\Events\PostPublished;
use App\Events\PostPublisher;
use App\Models\User;
use App\Notifications\NotifyAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostPublished $event): void
    {
        $adminUser = User::where('user_type', 'admin')->first();
        $adminUser->notify(new NotifyAdmin($event->post));
    }
}
