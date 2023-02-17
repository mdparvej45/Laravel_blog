<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\User;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    //add banner method
    public function addBanner(){
        $banner_posts = Banner::take(4)->latest()->get();
        return view('backend.banner.bannerMangment', compact('banner_posts'));
    }
    public function storeBanner(Request $request){
        $user = User::auth()->user()->id;
        $request->validate([
            'title' => 'required|min:20',
        ]);
        $banner = new Banner();
        $banner->title = $request->title;
        $banner->slug = $this->slugGenarator($request->title, $request->slug);
        $image_ext = $request->banner_image->extension();
        $uniqueBannerImageName = $this->imageNameGenarator($request->title, $request->banner_image) . '.' . $image_ext;
        $uploadImage = $request->banner_image->storeAs('banner', $uniqueBannerImageName, 'public');
        $banner->banner_image = $uploadImage;
        $banner->save();
        return redirect()->route('banner.add');

    }
    private function slugGenarator($title, $slug = null){
        if($slug == null){
            $newSlug = str()->slug($title);
        }else{
            $newSlug = str()->slug($slug);
        }
        $count = Banner::where('slug', 'LIKE', '%' . $newSlug . '%')->count();
        if($count > 0){
            $newSlug = $newSlug . '-' . $count++;
        }
        return $newSlug;
    }
    private function imageNameGenarator($title, $banner_image = null){
        if($banner_image !== null){
            $newImageName = str()->slug($title);
        }
        $count = Banner::where('banner_image', 'LIKE', '%' . $newImageName . '%')->count();
        if($count > 0){
            $newImageName = 'banner-' . $newImageName . '-' . $count++;
        }
        return $newImageName;
    }
}
