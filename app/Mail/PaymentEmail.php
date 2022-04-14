<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentEmail extends Mailable
{
     public $mailData;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        $this->mailData=$mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         $mailData['data'] =  $this->mailData;
         $subject = $this->mailData['email_subject'];
        return $this->view('mail.payment_mail',$mailData)->subject($subject)->from(env('MAIL_USERNAME'), env('APP_NAME'));
    }
}
