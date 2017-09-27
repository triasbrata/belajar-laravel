<?php

namespace App\Events;

use App\Events\Event;
use App\Post;
use App\User;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class PostCreateOrUpdate extends Event
{
    public $post;
    public $editor;

    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        //
        $this->post = $post;

    $this->editor = User::whereHas('role',function ($query)
        {
            return $query->where('title','Editor');
        })->get();
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
