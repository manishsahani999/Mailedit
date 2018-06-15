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

    public function __construct(BinarySubscriber $subscriber, BinaryEmail $email)
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
        return $this->view('emails.default');
    }
}