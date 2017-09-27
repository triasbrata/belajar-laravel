<?php

namespace App\Listeners;

use App\Events\RegisterUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class RegisterUserListener
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
     * @param  RegisterUser  $event
     * @return void
     */
    public function handle(RegisterUser $event)
    {
        $data = [
            'user_name' => $event->user->name,
            'user_email' => $event->user->email,
            'pesan' => $event->pesan
        ];
        Mail::send('emails.register_user', $data, function ($message) use ($data) {
            $message->from('admin@localhost.com', 'John Doe');
            $message->to($data['user_email'],$data['user_name']);
            $message->subject('Register User');
        });
    }
}
