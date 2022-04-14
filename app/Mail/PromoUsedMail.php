<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PromoUsedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $promoUsedMail;
    public function __construct($promoUsedMail)
    {
        $this->promoUsedMail=$promoUsedMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       //dd(env('MAIL_USERNAME'),env('APP_NAME'),env('MAIL_HOST'),env('MAIL_PORT'),env('MAIL_ENCRYPTION'));
       $promoUsedMail['data'] =  $this->promoUsedMail;
         $subject = $this->promoUsedMail['email_subject'];
        return $this->view('mail.promo_used_mail',$promoUsedMail)->subject($subject)->from(env('MAIL_USERNAME'), env('APP_NAME'));
    
    }
}
