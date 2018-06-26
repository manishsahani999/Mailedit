<?php

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;
use App\Models\BinaryEmail;

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
        Log::info("-------------EmailSent-------------");
        $headers = $event->message->getHeaders();
        Log::info('Headers = '.$headers);
        $hash = $headers->get('X-Mailer-Click');
        Log::info('Hash ='.$hash);
        if(isset($hash) && !is_null($hash)) {
            $email_uuid = $hash->getFieldBody();

            Log::info('Uuid ='.$email_uuid);
            
            $sent_email = BinaryEmail::whereUuid($email_uuid)->firstOrFail();

            Log::info('Email = '.$sent_email);
     
            // Get info about the message-id from SES
            if($sent_email) {
                // $sent_email->ses_message_id = $headers->get('X-SES-Message-ID')->getFieldBody();
                // $sent_email->save();
            }
        }
    }
}
