<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Common;
use App\models\Carlist;
use App\models\Category;
use App\models\Testimonial;

use Illuminate\Pagination\Paginator;
use DB;

class CarController extends Controller
{
    use Common;

    public function index()
    {
        $Carlists =Carlist::where('active', 1)->take(5)->get();
        $Testimonials =Testimonial::where('Published', 1)->take(3)->get();
        return view('index',compact("Carlists","Testimonials"));
    }
    //
    // public function indexpage()
    // {
    //     return view('index');
    // }
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
        $Testimonials =Testimonial::get();

        return view('testimonials',compact("Testimonials"));
    }
    public function listing()

    {

        $Testimonials =Testimonial::where('Published', 1)->take(3)->get();
        $Carlists = Carlist::where('active', 1)->paginate(1);
        return view('listing',compact("Carlists","Testimonials"));
    }
    public function Contact()
    {
        return view('Contact');
    }



}
