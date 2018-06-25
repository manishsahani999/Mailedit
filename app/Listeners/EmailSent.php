<?php

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;

class EmailSent
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
     * @param  MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        $headers = $event->message->getHeaders();
        $hash = $headers->get('X-Mailer-Model');
        if(isset($hash) && !is_null($hash)) {
            $email_id = $hash->getFieldBody();
            
            $sent_email = BinaryEmail::find($email_id);
    
            // Get info about the message-id from SES
            if($sent_email) {
                $sent_email->ses_message_id = $headers->get('X-SES-Message-ID')->getFieldBody();
                $sent_email->save();
            }
        }
    }
}
