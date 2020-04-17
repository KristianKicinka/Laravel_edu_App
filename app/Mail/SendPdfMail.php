<?php

namespace App\Mail;

use http\Env\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPdfMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param Request $request
     */
    public function __construct( $request)
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

        return $this->subject('Edu-App Newsletter')
            ->from('eduportalmail@gmail.com')
            ->attach($this->request["pdf_file_val"])
            ->view('Backend.AdminInterface.content.Newsletter.veryMuchPdfSender')
            ->with("request",$this->request);

    }
}
