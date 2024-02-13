<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Testimonial;
use App\models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
       
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Testimonials =Testimonial::get();
        $Users =User::get();

        return view('admin.testimonials',compact("Testimonials","Users"));
    }
    public function indexx()
    {
       // $Users =User::get();
        return view('auth.login');
    }
    
}
