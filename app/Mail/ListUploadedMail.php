<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\BinarySubsList;

class ListUploadedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $list;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(BinarySubsList $list)
    {
        $this->list = $list;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("{$this->list->name}, Updated")->view('emails.list');
    }
}
