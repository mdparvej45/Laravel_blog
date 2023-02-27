<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\frontend\FrontendController;




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

//Social account login 
//Google login
Route::prefix('/google')->name('google.')->group(function(){
    Route::get('/login', [SocialLoginController::class, 'googleLogin'])->name('login');//Google login route
    Route::get('/redirect', [SocialLoginController::class, 'googleRedirect'])->name('redirect');//Google cradantial redirect
});
//Facebook Login 
Route::prefix('/facebook')->name('facebook.')->group(function(){
    Route::get('/login', [SocialLoginController::class, 'facebookLogin'])->name('login');//Facebook login rotue
    Route::get('/redirect', [SocialLoginController::class, 'facebookRedirect'])->name('redirect');//Facebook redirect route
});
//Github Login
Route::prefix('/github')->name('github.')->group(function(){
    Route::get('/login', [SocialLoginController::class, 'githubLogin'])->name('login');//Github login route
    Route::get('/redirect', [SocialLoginController::class, 'githubRedirect'])->name('redirect');//Github Redirect route
});