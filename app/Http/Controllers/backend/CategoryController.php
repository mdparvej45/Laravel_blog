<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Add category Method
    public function addCategory()
    {
        return view('backend.category.addCategory');
    }

    //Store category in database Method
    public function storeCategory(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:20|',
            'slug' => 'unique:categories,slug'


        ]);
        $category = new Category();
        $category->title = $request->title;
        $category->slug = $this->slugGenator($request->title, $request->slug);
        $category->save();
        return redirect()->route('category.add');
    }
    //Slug generator is store method helper
    private function slugGenator($title, $slug = null)
    {
        if($slug == null){
            $newSlug = str()->slug($title);
        }else{
            $newSlug = str()->slug($slug);
        }
        $couunt = Category::where('slug', 'LIKE', '%' . $newSlug . '%')->count();
        if($couunt > 0){
            $newSlug = $newSlug . '-' . $couunt++;
        }
        return $newSlug;
    }
    //Show all categories Method
    public function allCategory(){
        $fetch = Category::latest()->get();
        return view('backend.category.allCategroy', compact('fetch'));//Call backend categorys all page
    }
    //Edit category method 
    public function editCategory(Category $slug){
        // dd($slug);
        return view();
    }
}
