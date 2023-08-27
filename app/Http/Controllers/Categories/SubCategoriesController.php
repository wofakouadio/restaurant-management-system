<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoriesController extends Controller
{
    public function index(){
        $subcategories = DB::table('sub_categories')->join('categories', 'categories.cat_id', '=', 'sub_categories.cat_id')->select('sub_categories.sub_cat_id', 'sub_categories.image', 'categories.name as category_name', 'sub_categories.name')->get();
//        $subcategories = subcategory::all();
//        dd($subcategories);
        return view('super-admin.sub-categories', compact('subcategories'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'cat-id' => 'required'
        ]);

        $prefix = 'S';

        $request['sub-cat-id'] = IdGenerator::generate(['table' => 'sub_categories', 'field' => 'sub_cat_id', 'length' => 6, 'prefix' =>$prefix]);

        if ($request->hasFile('profile-picture')) {
            $profile_picture =  $request->file('profile-picture')->store('items/sub-categories', 'public');
        }else{
            $profile_picture = 'items/sub-categories/cat-default.jpg';
        }

        $Sql = SubCategory::create([
            'cat_id' => $request['cat-id'],
            'name' => strtoupper($request['name']),
            'image' => $profile_picture,
            'sub_cat_id' => $request['sub-cat-id']
        ]);

        if($Sql){
            return response()->json([
                'status' => 200,
                'msg' => 'Sub-Category created successfully'
            ]);
        }
        return response()->json([
            'status' => 201,
            'msg' => 'Error: something went wrong'
        ]);
    }
}
