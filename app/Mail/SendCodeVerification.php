<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCodeVerification extends Mailable
{
    use Queueable, SerializesModels;
    public $code_digit;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code_digit, $name)
    {
        $this->code_digit = $code_digit;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Reset Password")
        ->markdown('email.code');
    }
}
