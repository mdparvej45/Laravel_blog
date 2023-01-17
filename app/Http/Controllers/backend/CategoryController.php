<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addcategory()
    {
        return view('backend.category.addCategory');
    }
    public function storecategory()
    {
        return view('backend.category.addCategory');
    }
}
