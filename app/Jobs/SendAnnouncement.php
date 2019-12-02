<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Announcement;
use App\User;
use Carbon\Carbon;
use Artisan;



class SendAnnouncement implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $announcement; 

    public function __construct($announcement)
    {
        //
        $this->announcement = $announcement;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Artisan::call('queue:work');
        $announcement = $this->announcement;
        $users = User::all('email', 'name');

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
        $mail->addReplyTo(env('MY_EMAIL'), 'Nouveta Admin');
        
        $mail->isHTML(true);                                                                  
        $mail->Subject = $announcement->title;
        $mail->Body    = $announcement->details;  
        foreach($users as $user)
        try
        {
            $mail->addAddress($user->email, $user->name);
            $mail->send();
            $mail->clearAddresses();
        }
        catch (Exception $e)
        {
            echo "Mailer Error ({$user['email']}) {$mail->ErrorInfo}\n";
        }
        
    }
}
