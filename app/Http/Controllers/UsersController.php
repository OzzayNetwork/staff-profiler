<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

        

        $email = $request->email;
        $data = [
                'name' => $request->name,
                'password' => $password,
                'title' => 'Account details for '. $request->name,
                
                 ];

        Mail::send('emails.send', $data, function ($message) use ($email)
            {
                $message->subject('New account created!');
                $message->from('admin@nouveta.tech', 'Ian Macharia');
                $message->to($email);

            });


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

        return redirect()->route('users.create');
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

}
