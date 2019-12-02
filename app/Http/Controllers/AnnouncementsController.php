<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Announcement;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Jobs\SendAnnouncement;
use Carbon\Carbon;



class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('announcements.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $employees = User::all();
        return view('announcements.create')->with('employees', $employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'details' => 'required',
             ]);

        $message = $request->details;
                

        $announcement = new Announcement;

        $announcement->title = $request->title;
        $announcement->category = $request->category;
        $announcement->details = $request->details;
        if(!is_null($request->user_id))
        {
            $announcement->user_id = $request->user_id;
        }
        
        $announcement->added_by = Auth::id();

        
        $announcement->save();

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
        
        // SendAnnouncement::dispatch($announcement)->delay(Carbon::now()->addSeconds(3));



        return redirect('announcements/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
