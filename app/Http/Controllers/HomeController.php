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
 
    if (Auth::check()) {
        return redirect('admin/users');
    } else {
        return redirect('/');
    }

    }
   
    public function indexxx()
    {
            return view('home');
    }
}
