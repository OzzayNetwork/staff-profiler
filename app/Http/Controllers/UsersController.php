<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Jobs\WelcomeMail;
use Carbon\Carbon;
use Artisan;

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

        $user  = new User;

        $password = Str::random(8);

        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->name = $request->name;
        $user->title = $request->title;
        $user->gender = $request->gender;
        $user->added_by = Auth::user()->name;
        $user->password = Hash::make($password);

        $user->save();

        WelcomeMail::dispatch($user, $password)->delay(Carbon::now()->addSeconds(5));

        

        return redirect('posts')->with('success','Employee has been added to the system.');
        Artisan::call('queue:work');
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
