<?php

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSending;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;

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
        Log::info("--------EmailSending--------");
        $message = $event->message; 
        $headers = $event->message->getHeaders();
        $uuid = $headers->get('X-Mailer-Click');

        if(isset($uuid) && !is_null($uuid) && isset($trackLink) && !is_null($trackLink)) {
            if ($message->getContentType() === 'text/html' ||
                ($message->getContentType() === 'multipart/alternative' && $message->getBody())
            ) {
                $message->setBody($this->injectLinkTracker($message->getBody(), $uuid->getFieldBody(), $trackLink->getFieldBody()));
            }
        }

        if(isset($uuid) && !is_null($uuid)) {
            if ($message->getContentType() === 'text/html' ||
                ($message->getContentType() === 'multipart/alternative' && $message->getBody())
            ) {
                $message->setBody($this->injectLinkTracker($message->getBody(), $uuid->getFieldBody()));
            }
        }
    }

    public function injectLinkTracker($html, $uuid)
    {
        $html = preg_replace_callback("/(<a[^>]*href=['\"])([^'\"]*)/",
                function($matches) use($uuid)
                {
                    if(strpos($matches[2], 'mailto:') !== false) {
                        return $matches[0];
                    } else {
                        if (empty($matches[2])) {
                            $url = app()->make('url')->to('/');
                        } else {
                            $url = str_replace('&amp;', '&', $matches[2]);
                        }

                        $temp = config('settings.app.frontend_host_url').'/email/'.$uuid.'/link/'.base64_encode($url);


                        return $matches[1].$temp;     
                    }
                },
                $html);
    
        return $html;
    }
}
