<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $verification_code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($verification_code)
    {
        $this->verification_code = $verification_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        $from_name = "Educare";
        $from_email = "yogesh.bizita@gmail.com";
        $subject = $this->verification_code. " " . "is your Educare account recovery code";
        return $this->from($from_email, $from_name)
            ->view('emails.verification', compact($this->verification_code))
            ->subject($subject);
    }
}
