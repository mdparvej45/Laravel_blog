<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        return view('frontend.frontend_index');
    }
    public function showCategroyPost($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::where('category_id', $category->id)->with('user')->paginate(8);
        return view('frontend.category_show', compact('category','posts'));
        
    }
    public function showSubcategroyPost($slug)
    {
        $subcategory = SubCategory::where('slug', $slug)->first();
        return $subcategory;
    }
    public function showPost($slug){
        $post = Post::with(['category', 'subcategory', 'tags'])->where('slug', $slug)->first();
        // dd($post);
        return view('frontend.posts.show_singlepost', compact('post'));
    }
    public function searchLive(Request $request){
        $post = Post::where('title','LIkE', '%' . $request->searchText . '%')->get();
        return json_encode($post);
    }
}
