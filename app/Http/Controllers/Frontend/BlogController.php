<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\BlogPost;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class BlogController extends Controller
{


  public function index()
{
    $about = AboutUs::first();
    $blog = BlogPost::first();
    $contact = ContactUs::first();

    
    return view('frontend.index', compact('about', 'blog','contact'));
}

    public function blog()
    {
     $blog = BlogPost::first();
        return view('frontend.blog-post', ['blog' => $blog]);
    }
    
  public function aboutUs()
  {
    $about =  AboutUs::first();
    return view('frontend/about',['about' => $about]);
  }


  public function authour()
  {
    return view('frontend/authour');
  }

  public function contactUs()
  {
    $contact = ContactUs::first();

    return view('frontend/contact',['contact'=> $contact]);
  }


  public function blogDetails()
  {
    $blog = BlogPost::first();
    return view('frontend/blog-post-details',['blog' => $blog]);
  }
}
