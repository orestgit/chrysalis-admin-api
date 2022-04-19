<?php

namespace App\Jobs;

use App\Mail\AccountCreated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
class SendAccountCreationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $password;
    public  $custom_message;
    public  $user_email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data){
        $this->password =   $data['password'];
        $this->custom_message  =   $data['msg'];
        $this->user_email  =   $data['user_email'];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new AccountCreated($this->password,$this->custom_message,$this->user_email);
        Mail::to($this->user_email)->send($email);

    }
}
