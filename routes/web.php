<?php

use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DeshboardController;
use App\Http\Controllers\backend\PermissionController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

Auth::routes();

//This is Authentecation Route
Route::group(['middleware' => ['auth','isbanned']], function () {

    /* Backend all Controller*/
    Route::get('/home', [DeshboardController::class, 'index'])->name('deshboard');//Backend index page route
    

    //Role Group and prefix
    Route::prefix('/role')->name('role.')->middleware('permission:role_create|role_edit|role_status|role_delete')->group(function(){
        Route::get('/add', [RoleController::class, 'addRoles'])->name('add');//Backend add role controller
        Route::post('/store', [RoleController::class, 'storeRoles'])->name('store');//Backend add role controller
        Route::get('/edit/{id:id}', [RoleController::class, 'editRoles'])->name('edit');//Backend edit role controller
        });

    //Permission Group and perfix 
    Route::prefix('/permission')->name('permission.')->group(function(){
        Route::get('/add', [PermissionController::class, 'addPermission'])->name('add');//Add new permission route
        Route::get('/assign/{id:id}', [PermissionController::class, 'assignPermission'])->name('assign');//Assign permission route
        Route::post('/added/{id:id}', [PermissionController::class, 'addedPermission'])->name('added');//added parmission backend
    });
    
    
    //Banner group and prefix
    Route::prefix('/banner')->name('banner.')->group(function(){
        Route::get('/add', [BannerController::class, 'addBanner'])->name('add');//Backend add banner
        Route::post('/store', [BannerController::class, 'storeBanner'])->name('store');//Backend store banner
    });
    
    //Category Group and preficx
    Route::prefix('/category')->name('category.')->group(function(){
        Route::get('/add', [CategoryController::class, 'addCategory'])->name('add');//Backend add category
        Route::post('/store', [CategoryController::class, 'storeCategory'])->name('store');//Backend add category store database
        Route::get('/all', [CategoryController::class, 'allCategory'])->name('all');//Backend all categories show 
        Route::get('/edit/{slug:slug}', [CategoryController::class, 'editCategory'])->name('edit');//Backend category edit Route
        Route::put('/update', [CategoryController::class, 'updateCategory'])->name('update');//Categroy update Route
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

    //User group and prefix
    Route::prefix('users')->name('users.')->group(function(){
        Route::get('/add', [UserController::class, 'addUsers'])->name('add');//Backend add user Route
        Route::post('/store', [UserController::class, 'storeUsers'])->name('store');//Backend store user route
        Route::get('/all',[ UserController::class, 'allEmployee'])->name('all');//Backend all user rooute
        Route::get('/bann/{id:id}',[ UserController::class, 'bannEmployee'])->name('bann');//Backend bann user rooute
    });
});




