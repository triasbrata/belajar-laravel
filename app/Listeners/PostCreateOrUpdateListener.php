<?php

namespace App\Listeners;

use App\Events\PostCreateOrUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class PostCreateOrUpdateListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostCreateOrUpdate  $event
     * @return void
     */
    public function handle(PostCreateOrUpdate $event)
    {
        
        $event->editor->each(function ($editor) use ($event)
        {
            $data =[
                'post'=> $event->post,
                'user_name' => $editor->name,
                'user_email' => $editor->email,
            ];

            Mail::send('emails.for-editor', $data, function ($message) use ($data) {
                $message->from('admin@berita.com', 'Admin');          
                $message->to($data['user_email'], $data['user_email']);
                $message->subject("Artikel baru : ". $data['post']->title);
            });
        });   
    }
}
