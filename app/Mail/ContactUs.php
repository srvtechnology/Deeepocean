<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $mailDataAdmin;
     public function __construct($mailDataAdmin)
    {
        $this->mailDataAdmin=$mailDataAdmin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         $mailDataAdmin['data'] =  $this->mailDataAdmin;
         $subject = $this->mailDataAdmin['email_subject'];
        return $this->view('mail.contact',$mailDataAdmin)->subject($subject)->from(env('MAIL_USERNAME'), env('APP_NAME'));
    }
}
