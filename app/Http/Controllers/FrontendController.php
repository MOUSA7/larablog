<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function index(){
        $blogs = Blog::with('category')->where('status',0)->take(3)->latest()->get();
//        dd($blogs);
        return view('frontend.pages.index',compact('blogs'));
    }

    public function blog(){
        return view('frontend.pages.blog');
    }

    public function post(){
        $blogs = Blog::where('status',0)->take(3)->latest()->get();
        return view('frontend.pages.post',compact('blogs'));
    }

    public function show($slug){
       $blog = Blog::whereSlug($slug)->first();
       return view('frontend.pages.show',compact('blog'));
    }
    //
}
