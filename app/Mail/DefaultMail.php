<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\{BinarySubscriber, BinaryEmail};
use Log;

class DefaultMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    protected $email;
    protected $subscriber;

    public function __construct($subscriber, $email)
    {
        $this->email = $email;
        $this->subscriber = $subscriber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info("---------Default Mail---------");
        $email_data = json_decode($this->email->content, true);


        $links = [
            'openTrackingLink'  => $this->getOpentrackingLink(),
            'unsubscriberLink'  => $this->getUnsubscribeLink()
        ];

        $this->withSwiftMessage(function ($message) {
            $headers = $message->getHeaders();
            $headers->addTextHeader('X-Mailer-Click', $this->email->uuid);
        });
            

        return $this->view('emails.test')
                    ->subject($this->email['subject'])
                    ->with([
                        'content' => $email_data,
                        'links'   => $links  
                    ]);
    }

    public function getOpenTrackingLink()
    {
        return config('settings.app.frontend_host_url').'/email-open-tracking/'.$this->email->uuid;
    }

    public function getUnsubscribeLink()
    {
        return config('settings.app.frontend_host_url').'/unsubscribe/'.$this->subscriber->uuid;
    }
}