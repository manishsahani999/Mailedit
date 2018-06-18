<?php

namespace App\Listeners;

use App\Events\UserHasRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\UserRegistrationMail;
use Illuminate\Support\Facades\Mail;

class UserHasRegisteredListener
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
     * @param  UserHasRegistered  $event
     * @return void
     */
    public function handle(UserHasRegistered $event)
    {
        $user = $event->user;

        $content = '
        <br><br>
        User information: <br>
        Name: '.$user->name.'<br>
        Email: '.$user->email.'<br>
        Phone Number: '.$user->phone.'<br>
        ';

        $data = ['subject' => 'New user Registration', 'type' => 1 ,  'content' => $content];

        Mail::to($user->email)->send(new UserRegistrationMail($user));

    }
}
