<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\models\Testimonial;
use App\models\User;
use App\models\Carlist;
use Illuminate\Support\Str;

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
     //  return view('home');
    //    $Carlists = Carlist::where('active', 1)->take(6)->get();
    //    $testimonials = Testimonial::where('Published', 1)->take(3)->get();
    //    $limitedContents = $Carlists->map(function ($carlist) {
    //        return Str::limit($carlist->content, 100);
    //    });  
    //    $limitedTestimonialsContent = $testimonials->map(function ($testimonial) {
    //        return Str::limit($testimonial->content, 100);
    //    }); 
        
    //    return view('index', compact("Carlists", "testimonials", "limitedContents", "limitedTestimonialsContent"));
    if (Auth::check()) {
        return redirect('admin/users');
    } else {
        return redirect('/');
    }
    }
   
    public function indexxx()
    {
       
        // if (Auth::check()) {
        //     return redirect('admin/users');
        // } else {
        //     return redirect('/');
        // }

            return view('home');

  

    }
}
