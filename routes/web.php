<?php

use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DeshboardController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

/* Frontend all Controller*/
Route::GET('/', [FrontendController::class, 'index'])->name('frontend.index');//Frontend index page route 


/* Backend all Controller*/
Auth::routes();
Route::get('/home', [DeshboardController::class, 'index'])->name('deshboard');//Backend index page route


//Category Group and preficx
Route::prefix('/category')->name('category.')->group(function(){
    Route::get('/add', [CategoryController::class, 'addCategory'])->name('add');//Backend add category
    Route::post('/store', [CategoryController::class, 'storeCategory'])->name('store');//Backend add category store database
    Route::get('/all', [CategoryController::class, 'allCategory'])->name('all');//Backend all categories show 
    Route::get('/edit/{slug:slug}', [CategoryController::class, 'editCategory'])->name('edit');//Backend category edit Route
    Route::put('/update/{slug:slug}', [CategoryController::class, 'updateCategory'])->name('update');//Categroy update Route
    Route::delete('/delete/{slug:slug}', [CategoryController::class, 'deleteCategory'])->name('delete');//Categroy update Route
    
    //__Subcategory Group and prefics
    Route::prefix('/subcategory')->name('subcategory.')->group(function(){
        Route::get('/add', [SubCategoryController::class, 'addSubCategory'])->name('add');//Backend add subcategory
        Route::POST('/store', [SubCategoryController::class, 'storeSubCategory'])->name('store');//Backend store subcategory
        Route::delete('/delete/{slug:slug}', [SubCategoryController::class, 'deleteSubCategory'])->name('delete');//Backend delete subcategory
        Route::get('/edit/{slug:slug}', [SubCategoryController::class, 'editSubCategory'])->name('edit');//Backend edit subcategory
    });
});
//Post group and prefix
Route::prefix('/post')->name('post.')->group(function(){
    Route::get('/add', [PostController::class, 'addPost'])->name('add');//Backend add post Route
    Route::post('/store', [PostController::class, 'storePost'])->name(('store'));//Backend store post Route
    Route::get('/all', [PostController::class, 'allPost'])->name('all');//Backend all post Route
    Route::delete('/delete/{slug:slug}', [PostController::class, 'deletePost'])->name('delete');//Backend post delete Route
});


