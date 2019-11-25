<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class PagesController extends Controller
{
    public function index(){
        $posts=Post::orderBy('id','desc')->paginate(5);
        return view('pages.index')->with('posts',$posts);
    }

    public function staffProfile(){
        return view('pages.staff-profile');
    }

    public function about(){
        $title='welcome to the about';
        // return view('pages.about', compact('title'));
        return view('pages.about')->with('title',$title);
    }

    public function services(){
        $data=array(
            'title' => 'services',
            'services' => ['web design', 'programing', 'SEO']
        );
        return view('pages.services')->with($data);
    }

    public function staffs(){
        return view('pages.staffs');
    }

    public function announcements(){
        return view('pages.announcements');
    }
}
