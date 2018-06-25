<?php

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSending;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailSending
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
     * @param  MessageSending  $event
     * @return void
     */
    public function handle(MessageSending $event)
    {
        $message = $event->message; 
        $headers = $event->message->getHeaders();
        $uuid = $headers->get('X-Mailer-Click');
        $trackLink = $headers->get('X-Mailer-TrackLink');
        if(isset($uuid) && !is_null($uuid) && isset($trackLink) && !is_null($trackLink)) {
            if ($message->getContentType() === 'text/html' ||
                ($message->getContentType() === 'multipart/alternative' && $message->getBody())
            ) {
                $message->setBody(injectLinkTracker($message->getBody(), $uuid->getFieldBody(), $trackLink->getFieldBody()));
            }
        }
    }
}
