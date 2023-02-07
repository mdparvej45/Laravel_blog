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
        $fetch = Category::latest()->get();
        return view('backend.category.addCategory', compact('fetch'));
    }

    //Store category in database Method
    public function storeCategory(Request $request)
    {   $category_array = Category::all();
        $request->validate([
            'title' => 'required|string|max:12',
            'slug' => 'unique:categories,slug'
        ]);
        $category = new Category();
        $category->title = $request->title;
        $category->slug = $this->slugGenator($request->title, $request->slug);
        if(count($category_array) < 4){
            $category->save();
            return redirect()->back()->with('messagewarning', 'Category is successfully added!');
        }else{
            return redirect()->back()->with('message', 'Opps ! You have already 4 item of categories.');
        }
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

    //Edit category method 
    public function editCategory($slug){
        $editedcategory = Category::where('slug', $slug)->first();
        return view('backend.category.editCategory', compact('editedcategory'));
    }


    //Category Update method 
    public function updateCategory(Request $request, Category $slug){
        $request->validate([
            'title' => 'required|string|min:20|',
        ]);
        $slug->title = $request->title;
        $slug->slug = $this->slugGenator($request->title, $request->slug);
        $slug->save();
        return redirect()->route('category.edit',$slug->slug);
    }

    //Delete category method 
    public function deleteCategory(Category $slug){
        $slug->delete();
        return redirect()->route('category.add');
    }

}
