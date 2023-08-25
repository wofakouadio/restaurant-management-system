<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
    public function index(){
        $subcategories = SubCategory::all();
        return view('super-admin.sub-categories', compact('subcategories'));
    }
}
