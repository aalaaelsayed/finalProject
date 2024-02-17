<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarAdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\CantactController;
use App\Http\Controllers\UserController;
use App\models\Carlist;
use App\models\Testimonial;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
           $Carlists = Carlist::where('active', 1)->take(6)->get();
       $testimonials = Testimonial::where('Published', 1)->take(3)->get();
       $limitedContents = $Carlists->map(function ($carlist) {
           return Str::limit($carlist->content, 100);
       });  
       $limitedTestimonialsContent = $testimonials->map(function ($testimonial) {
           return Str::limit($testimonial->content, 100);
       }); 
        
       return view('index', compact("Carlists", "testimonials", "limitedContents", "limitedTestimonialsContent"));
})->name('/');
Route::fallback(function () {
    return view('404');
});
Route::get('index',[CarController::class,'index'])->name('index');
Route::get('about',[CarController::class,'about'])->name('about');
Route::get('blog',[CarController::class,'blog'])->name('blog');
Route::get('testimonials',[CarController::class,'testimonials'])->name('testimonials');
Route::get('listing',[CarController::class,'listing'])->name('listing');
Route::get('Contact',[CarController::class,'Contact'])->name('Contact');
Route::get('single/{id}',[CarController::class,'single'])->name('single');

/////////////////////
Route::post('sendmail', [CantactController::class, 'sendmail'])->name('sendmail');





// Route::get('/{any}', function () {
//   return view('welcome'); // You can change 'welcome' to your desired view
// //   $Carlists = Carlist::where('active', 1)->take(6)->get();
// //   $testimonials = Testimonial::where('Published', 1)->take(3)->get();
// //   $limitedContents = $Carlists->map(function ($carlist) {
// //       return Str::limit($carlist->content, 100);
// //   });  
// //   $limitedTestimonialsContent = $testimonials->map(function ($testimonial) {
// //       return Str::limit($testimonial->content, 100);
// //   }); 
   
// //   return view('index', compact("Carlists", "testimonials", "limitedContents", "limitedTestimonialsContent"));
// })->where('any', '.*');


// //Auth::routes();
Auth::routes(['verify'=>true]);
Route::get('log', [App\Http\Controllers\HomeController::class, 'indexxx'])->middleware('verified')->name('log');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('/home');


