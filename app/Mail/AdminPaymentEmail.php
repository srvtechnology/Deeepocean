<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminPaymentEmail extends Mailable
{
    public $mailDataAdmin;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
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
         $subject = $this->mailDataAdmin['email_subject2'];
        return $this->view('mail.admin_payment',$mailDataAdmin)->subject($subject)->from(env('MAIL_USERNAME'), env('APP_NAME'));
    }
}
