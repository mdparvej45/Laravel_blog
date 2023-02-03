<?php

namespace App\Http\Controllers\backend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;

class PostController extends Controller
{
    //add post method
    public function addPost(){
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.post.addPost', compact('categories', 'subcategories'))->with('success','Post created successfully!');
    }

    //Store post method
    public function storePost(Request $request){
        $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'type' => 'required',
            'title' => 'required',
            'image' => 'mimes:JPG,png,jpg, PNG, jpeg, JPEG, SVG,svg'
        ],[
            'category_id.required' => 'Please select Category',
            'sub_category_id.required' => 'Please select Sub-Category'
        ]);
 

        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;
        $post->sub_category_id = $request->sub_category_id;
        $post->type = $request->type;
        $post->title = $request->title;
        $post->hash_tag = $request->hash_tag;
        $post->slug = $this->slugGenerator($request->title, $request->slug);
        $post->detiles = $request->detiles;
        if($request->hasFile('image')){
            $ext = $request->image->extension();
            $image_name = $this->slugGenerator($request->title, $request->slug) . '.' . $ext;
            $upload_post_img = $request->image->storeAs('posts', $image_name, 'public');
            $post->images = $upload_post_img;
        }
        $post->save();
        return redirect()->back();

    }

    //All Post show method
    public function allPost()
    {
        $all_post = Post::get();
        return view('backend.post.allPost', compact('all_post'));
    }

    //Delete post method
    public function deletePost(Post $slug)
    {
        $slug->delete();
        return back();
    }

    //Create slug name generator
    private function slugGenerator($title, $slug = null){
        if($slug == null){
            $newSlug = str()->slug($title);
        }else{
            $newSlug = str()->slug($slug);
        }
        $count = Post::where('slug', 'LIKE', '%' . $newSlug . '%')->count();
        if($count > 0){
            $newSlug = $newSlug . '-' . $count++;
        }
        return $newSlug;
    }
}
