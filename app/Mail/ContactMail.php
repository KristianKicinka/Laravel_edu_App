<?php

namespace App\Mail;

use http\Env\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @param \Request $request
     */
    public function __construct($request)
    {
        $this->request = $request;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->request['predmet'])
                    ->from($this->request['email'])
                    ->view('Frontend.pages.Frontend_Page.mail_tmp')
                    ->with('request',$this->request);
    }
}
