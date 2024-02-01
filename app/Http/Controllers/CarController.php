<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    //
    public function indexpage()
    {
        return view('index');
    }
    public function about()
    {
        return view('about');
    }
    public function blog()
    {
        return view('blog');
    }
    public function testimonials()
    {
        return view('testimonials');
    }
    public function listing()
    {
        return view('listing');
    }
    public function Contact()
    {
        return view('Contact');
    }



}
