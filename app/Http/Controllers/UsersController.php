<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\User;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
         $this->middleware('auth');
    }
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());

        $validatedData = $request->validate([
        	'email' => 'required|email|max:255|unique:users',
        	'phone' => 'required',
        	'name' => 'required',
            'title' => 'required',
            'gender' => 'required',
        ]);

        $password = Str::random(8);
        $message = 'Welcome to the Nouveta family! We hope this is the start of a beautiful partnership where we can learn from each other. You can view the rest of the team through our website. Your current password is '. $password;
        

                $mail = new PHPMailer;

                $mail->SMTPDebug = 0;                                   // Enable verbose debug output
                $mail->isSMTP();                                        // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                                             // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                                 // Enable SMTP authentication
                $mail->Username = 'testingsissyy@gmail.com';             // SMTP username
                $mail->Password = 'nouveta2019!';              // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS 
                $mail->Port = 587;                                    // TCP port to 
                //Recipients
                $mail->setFrom('testingsissyy@gmail.com', 'Nouveta Admin');
                $mail->addAddress($request->email, $request->name);  // Add a recipient, Name is optional
                $mail->addReplyTo('your-email@gmail.com', 'Mailer');
                
                $mail->isHTML(true);                                                                    // Set email format to HTML
                $mail->Subject = 'Welcome to Nouveta';
                $mail->Body    = $message;                     // message

                $mail->send();
                


                $user  = new User;

                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->name = $request->name;
                $user->title = $request->title;
                $user->gender = $request->gender;
                $user->added_by = Auth::user()->name;
                $user->password = Hash::make($password);

                // dd($user);
                $user->save();

                return back()->with('success','Message has been sent!');
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

    public function makeAdmin($id)
    {
        $user = User::find($id);

        $user->is_admin = !$user->is_admin;

        $user->save();

        if($user->is_admin == 1)
        {
            return redirect()->back()->with('success', 'The user is now an admin');
        }
        
        else
        {
            return redirect()->back()->with('success', 'The user is no longer an admin');
        }
    }

    public function activateUser($id)
    {
        $user = User::find($id);

        $user->acc_status = !$user->acc_status;

        $user->save();

        if($user->acc_status == 1)
        {
            return redirect()->back()->with('success', 'The employees account is active');
        }
        
        else
        {
            return redirect()->back()->with('success', 'The employee account is frozen');
        }
    }

}
