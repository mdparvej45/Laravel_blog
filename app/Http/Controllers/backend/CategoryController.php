<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory()
    {
        return view('backend.category.addCategory');
    }
    public function storeCategory(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:20|unique:categories',
            'slug' => 'string'
        ]);
        $category = new Category();
        $category->title = $request->title;
        $category->slug = $this->slugGenator($request->title, $request->slug);
        $category->save();
        // dd($category);
        return back();
    }
    //Slug generator
    private function slugGenator($title, $slug = null)
    {
        if($slug != null){
            $newSlug = $slug;
        }else{
            $newSlug = $title;
        }
        return $newSlug;
    }
}
