<?php

namespace App\Http\Controllers\backend;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class SubCategoryController extends Controller
{
    //Add Sub category method
    public function addSubCategory(){
        $subcategorries = SubCategory::with('category')->get();
        // dd($subcategorries);
        $category = Category::get();
        return view('backend.category.addSubCategory', compact('subcategorries', 'category')); 
    }

    //Store sub category method
    public function storeSubCategory(Request $request){
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|string',
            'slug' => 'unique:sub_categories,slug'
        ],
        [
            'category_id.required' => 'Please select a category.'
        ]
    );
        $sub_category = new SubCategory();
        $sub_category->category_id = $request->category_id;
        $sub_category->title = $request->title;
        $sub_category->slug = $this->slugGenerator($request->title, $request->slug);
        $sub_category->save();
        // dd($sub_category->slug);
        return redirect()->route('category.subcategory.add', compact('sub_category'));
    }

    //Edit subcategory method
    public function editSubCategory( $slug){
        $data = SubCategory::where('slug', $slug)->first();
        $categores = Category::get();

        // dd($data);

        return view('backend.category.editSubCategory', compact('data', 'categores'));
    }

    //Delete sibcategory method
    public function deleteSubCategory(SubCategory $slug){
        $slug->delete();
        return back();
    }

    //Create slug finder 
    private function slugFinder($slug){
        $category = Category::all();
        if($slug == $category->slug){
            return $find = $slug;
        }
        
    }
    //Create slug name generator
    private function slugGenerator($title, $slug = null){
        if($slug == null){
            $newSlug = str()->slug($title);
        }else{
            $newSlug = str()->slug($slug);
        }
        $count = SubCategory::where('slug', 'LIKE', '%' . $newSlug . '%')->count();
        if($count > 0){
            $newSlug = $newSlug . '-' . $count++;
        }
        return $newSlug;
    }
}
