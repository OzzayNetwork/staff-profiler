<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\User;

class WelcomeMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user; 
    protected $password;


    public function __construct($user, $password)
    {
        //
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $user = $this->user;

        $password = $this->password;

        $message = 'Welcome to the Nouveta family! We hope this is the start of a beautiful partnership where we can learn from each other. You can view the rest of the team through our website. Your current password is '. $password;
        

        $mail = new PHPMailer;

        $mail->SMTPDebug = 0;                                   
        $mail->isSMTP();                                        
        $mail->Host = 'smtp.gmail.com';                                             
        $mail->SMTPAuth = true;                         
        $mail->Username = env('MY_EMAIL');             
        $mail->Password = env('MY_PASSWORD');   
        $mail->SMTPSecure = 'tls'; 
        $mail->Port = 587; 
        $mail->setFrom(env('MY_EMAIL'), 'Nouveta Admin');
        $mail->addAddress($user->email, $user->name); 
        $mail->addReplyTo(env('MY_EMAIL'), 'Nouveta Admin');
        
        $mail->isHTML(true); 
        $mail->Subject = 'Welcome to Nouveta';
        $mail->Body    = $message; 

        $mail->send();
    }
}
