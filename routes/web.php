<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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
    return view('welcome');
});
Route::get('index',[CarController::class,'indexpage'])->name('index');
Route::get('about',[CarController::class,'about'])->name('about');
Route::get('blog',[CarController::class,'blog'])->name('blog');
Route::get('testimonials',[CarController::class,'testimonials'])->name('testimonials');
Route::get('listing',[CarController::class,'listing'])->name('listing');
Route::get('Contact',[CarController::class,'Contact'])->name('Contact');







Route::get('addCar', function () {
    return view('admin.addCar');
})->name('addCar');
Route::get('addCategory', function () {
    return view('admin.addCategory');
})->name('addCategory');

//Auth::routes();
Auth::routes(['verify'=>true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
