<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Common;
use App\models\Carlist;
use App\models\Category;
use App\models\Testimonial;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use DB;

class CarController extends Controller
{
    use Common;

  
    public function index()
    {
        $Carlists = Carlist::where('active', 1)->take(6)->get();
        $testimonials = Testimonial::where('Published', 1)->take(3)->get();
        $limitedContents = $Carlists->map(function ($carlist) {
            return Str::limit($carlist->content, 100);
        });  
        $limitedTestimonialsContent = $testimonials->map(function ($testimonial) {
            return Str::limit($testimonial->content, 100);
        }); 
         
        return view('index', compact("Carlists", "testimonials", "limitedContents", "limitedTestimonialsContent"));

    }
  //////////////////////////////////////////////////////////////////////////////////
    public function about()
    {
        return view('about');
    }
    public function blog()
    {
        return view('blog');
    }
   ///////////////////////////////////////////////////////////////////////////////
    public function single(string $id)
    {
            $Carlists = Carlist::findOrFail($id);
            $categories = Category::get();
            $categoryId = $Carlists->category->id;
            // Count the number of cars in the same category
            $counts = Carlist::where('categoryId', $categoryId)->count();

            return view('single', compact("Carlists", "categories", "counts"));
    }
/////////////////////////////////////////////////////////////////////////////////
    public function testimonials()
    {
            $testimonials = Testimonial::get();
            $limitedTestimonialsContent = $testimonials->map(function ($testimonial) {
                return Str::limit($testimonial->content, 100);
            });  
                                
            return view('testimonials', compact('testimonials', 'limitedTestimonialsContent'));
    }

  /////////////////////////////////////////////////////////////////////////////////
    public function listing()
    {
            $testimonials = Testimonial::where('Published', 1)->take(3)->get();

            $Carlists = Carlist::where('active', 1)->paginate(6);

            // Fetching content for each Carlist and limiting it to 100 characters
            $limitedContents = $Carlists->map(function ($carlist) {
                return Str::limit($carlist->content, 100);
            });
            $limitedTestimonialsContent = $testimonials->map(function ($testimonial) {
                return Str::limit($testimonial->content, 100);
            }); 

            return view('listing', compact("Carlists", "testimonials", "limitedContents","limitedTestimonialsContent"));
    }

/////////////////////////////////////////////////////////////
    public function Contact()
    {
        return view('Contact');
    }



}
