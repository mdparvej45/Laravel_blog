<?php
use App\Http\Controllers\frontend\FrontendController;
use Illuminate\Support\Facades\Route;




/* Frontend all Routes*/


//Category Controller all here:
Route::prefix('/')->name('frontend.')->group(function(){
    Route::GET('', [FrontendController::class, 'category'])->name('index');//Frontend index page route
    Route::GET('category/{slug:slug}', [FrontendController::class, 'showCategroyPost'])->name('category');//
    Route::GET('category/subcategory/{slug:slug}', [FrontendController::class, 'showSubcategroyPost'])->name('subcategory');//
    Route::GET('showpost/{slug:slug}', [FrontendController::class, 'showPost'])->name('showpost');
    Route::GET('search', [FrontendController::class, 'searchLive'])->name('search.live');

});
//Banners Controller all here: 
Route::prefix('/')->name('frontend.')->group(function(){
    Route::get('banner/', [FrontendController::class, 'banner'])->name('banner');
});