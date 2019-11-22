<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
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
        // $posts=DB::select('SELECT * FROM profile');
        if(Auth::user()->is_admin == 1)
        {
            $posts=Post::orderBy('id','desc')->paginate(5);   
        }
        else
        {
            $posts = Post::where('approval_status', 1)->orderBy('id','desc')->paginate(5);
        }
         

         // dd($posts);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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

        $this->validate($request,[
            'nickname'=>'required',
            'facts'=>'required',
            'about'=>'required',
            'cover_img'=>'image|required|max:1999',
            'skills'=>'required',
            'dob'=>'required',
            'hobbies'=>'required',
        ]);

        //handle file upload
        if($request->hasFile('cover_img')){
            //get file name with extension
            $filenamewithext=$request->file('cover_img')->getClientOriginalName();
            //get just file name
            $filename=pathinfo($filenamewithext,PATHINFO_FILENAME);
            //get extension
            $extension=$request->file('cover_img')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //upload image

            $destinationPath = public_path('/cover_images');
            $path = $request->file('cover_img')->move($destinationPath, $fileNameToStore);
            // $path=$request->file('cover_img')->storeAs('public/cover_images',$fileNameToStore);

        }
        else{
            $fileNameToStore='noimage.jpg';
        }

        //creating row
        $post = new Post;
        $post->nickname=$request->input('nickname');
        $post->about=$request->input('about');
        $post->user_id=Auth::id();
        $post->facts=$request->input('facts');
        $post->skills=$request->input('skills');
        $post->hobbies=$request->input('hobbies');
        $post->pic=$fileNameToStore;
        $post->facebook=$request->input('facebook');
        $post->github=$request->input('github');
        $post->dob=$request->input('dob');
        if(Auth::user()->is_admin)
        {
            $post->approval_status = 1;
        }


        // dd($post);



        $post->save();
        if(Auth::user()->is_admin == 1)
        {
            return redirect('posts/')->with('success','profile was created');
        }

        else
        {
            return redirect('posts/')->with('success','profile was created and awaits approval');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $post=Post::find($id);
        $skillsNum=substr_count($post->skills,";");
        $myhobbies=($post->hobbies);
        $myskills=($post->skills);

        $myhobbiesArray=array_filter(explode(';',$myhobbies));
        $myskillsArray=array_filter(explode(';',$myskills));
        // dd($myskillsArray);
        $data=[
            'post'=>$post,
           'myskillsArray'=> $myskillsArray,
           'myhobbiesArray'=>$myhobbiesArray
           
        ];
        return view('posts.staff-profile')->with($data);
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

    public function approveProfile($id)
    {
        $post = Post::find($id);

        $post->approval_status = 1;

        $post->save();

        return redirect('posts/')->with('success', 'Employees profile has been approved');
    }
}
