<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarAdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestimonialsController;




Route::prefix('admin')->group(function () {


    // Route::get('addTestimonials', function () {
    //     return view('admin.addTestimonials');
    // })->name('addTestimonials');
    
//////////////////////
Route::get('creatcar',[CarAdminController::class,'create'])->name('creatcar');
Route::post('imageUpload',[ImageController::class,'upload'])->name('imageUpload');
Route::post('addCar',[CarAdminController::class,'store'])->name('addCar');
Route::get('cars',[CarAdminController::class,'index'])->name('cars');
Route::get('editcar/{id}',[CarAdminController::class,'edit'])->name('editcar');
Route::put('updateCar/{id}',[CarAdminController::class,'update'])->name('updateCar');
Route::get('deleteCar/{id}',[CarAdminController::class,'destroy']);
////////////////////////
Route::get('creatcat',[CategoryController::class,'create'])->name('creatcat');
Route::post('addCategory',[CategoryController::class,'store'])->name('addCategory');
Route::get('Category',[CategoryController::class,'index'])->name('Category');
Route::get('editcat/{id}',[CategoryController::class,'edit'])->name('editcat');
Route::put('updateCategory/{id}',[CategoryController::class,'update'])->name('updateCategory');
Route::get('deleteCategory/{id}',[CategoryController::class,'destroy']);
///////////////////////////
Route::get('creattest',[TestimonialsController::class,'create'])->name('creattest');
Route::post('addtest',[TestimonialsController::class,'store'])->name('addtest');
Route::get('Testimonial',[TestimonialsController::class,'index'])->name('Testimonial');
Route::get('edittest/{id}',[TestimonialsController::class,'edit'])->name('edittest');
Route::put('updatetest/{id}',[TestimonialsController::class,'update'])->name('updatetest');
Route::get('deletetest/{id}',[TestimonialsController::class,'destroy']);

});
?>