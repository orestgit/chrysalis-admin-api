<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $password;
    public  $custom_message;
    public  $user_email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password,$custom_message,$user_email)
    {
        $this->password =   $password;
        $this->custom_message  =   $custom_message;
        $this->user_email  =   $user_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Account Created')
        ->view('emails.accountCretaed');
    }
}
