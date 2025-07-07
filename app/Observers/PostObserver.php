<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\User;
use App\Notifications\NotifyAdmin;
use Illuminate\Support\Facades\Log;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        $adminUser = User::where('user_type', 'admin')->first();
        $adminUser->notify(new NotifyAdmin($post));

        Log::info('A new post has been published with Title : ' . $post->title . ' and Description : ' . $post->description);
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
