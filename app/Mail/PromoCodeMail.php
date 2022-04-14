<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PromoCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $promoMail;
    public function __construct($promoMail)
    {
        $this->promoMail=$promoMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //dd(env('MAIL_USERNAME'),env('APP_NAME'),env('MAIL_HOST'),env('MAIL_PORT'),env('MAIL_ENCRYPTION'));
       $promoMail['data'] =  $this->promoMail;
         $subject = $this->promoMail['email_subject'];
        return $this->view('mail.promo_code',$promoMail)->subject($subject)->from(env('MAIL_USERNAME'), env('APP_NAME'));
    }
}
