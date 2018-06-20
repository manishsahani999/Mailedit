<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\{BinarySubscriber, BinaryEmail};

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
        $email_data = json_decode($this->email->content, true);

        return $this->view('emails.test')
        ->subject($this->email['subject'])
        ->with([
            'content' => $email_data
        ]);
    }
}