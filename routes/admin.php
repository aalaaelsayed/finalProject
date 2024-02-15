<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarAdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MassagesController;





Route::prefix('admin')->middleware('verified')->group(function () {
    
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
//////////////////////////////////////
Route::get('users',[UserController::class,'index'])->name('users');
Route::get('createuser',[UserController::class,'create'])->name('createuser');
Route::post('addusers',[UserController::class,'store'])->name('addusers');
Route::get('edituser/{id}',[UserController::class,'edit'])->name('edituser');
Route::put('updateuser/{id}',[UserController::class,'update'])->name('updateuser');
///////////////////////////
Route::get('massagelist',[MassagesController::class,'index'])->name('massagelist');
Route::get('showMassage/{id}',[MassagesController::class,'show'])->name('showMassage');
Route::get('deletemassage/{id}',[MassagesController::class,'destroy']);


});
?>