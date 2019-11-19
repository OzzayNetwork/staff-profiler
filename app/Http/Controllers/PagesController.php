<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
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
}
