<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title="Welcome to Home";
        // return view('pages.index',compact('title'));
        return view('pages.index')->with('title',$title);
    }
    public function about(){
        return view('pages.about');
    }
    public function contacts(){
        $data=array(
            'title' => 'Contacts',
            'services' => ['WebDesign' , 'Programming' , 'SEO']
        );
        return view('pages.contacts')->with($data);
    }
}
