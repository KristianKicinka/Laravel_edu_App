<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
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

        if(($_REQUEST['email']) != null) {
            $email = $_REQUEST['email'];

            DB::table('newsletter')->insert(
                ['email' => $email]
            );
        }
        return $this->subject('Edu-App Newsletter')
            ->from('testemailsending29@gmail.com')
            ->view('Frontend.pages.Frontend_Page.newsletter_mail');
    }
}
