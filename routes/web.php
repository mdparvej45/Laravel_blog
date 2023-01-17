<?php

use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DeshboardController;
use App\Http\Controllers\frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/* Frontend all Controller*/
Route::GET('/', [FrontendController::class, 'index'])->name('frontend.index');//Frontend index page route 


/* Backend all Controller*/
Auth::routes();
Route::get('/home', [DeshboardController::class, 'index'])->name('deshboard');//Backend index page route
//Category Group and preficx
Route::prefix('/category')->name('category.')->group(function(){
    Route::get('/add', [CategoryController::class, 'addcategory'])->name('add');//Backend add category
    Route::get('/store', [CategoryController::class, 'storecategory'])->name('store');//Backend add category

});


