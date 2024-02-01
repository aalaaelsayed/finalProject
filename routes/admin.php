<?php

use Illuminate\Support\Facades\Route;



Route::prefix('admin')->group(function () {

    Route::get('addCategory', function () {
        return view('admin.addCategory');
    })->name('addCategory');
   
});
?>