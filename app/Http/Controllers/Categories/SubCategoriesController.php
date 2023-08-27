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

    public function edit(Request $request){
        try {
            $getSubCategory = SubCategory::where('sub_cat_id', $request['sub_cat_id'])->get();
            return response()->json([
                'status' => 200,
                'msg' => 'Data found',
                'data' => $getSubCategory
            ]);
        } catch (\Exception $e){
            return response()->json([
                'status' => 201,
                'msg' => 'Data not found. Error : ' . $e->getMessage(),
                'data' => $getSubCategory
            ]);
        }
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'cat-id' => 'required'
        ]);

        if ($request->hasFile('profile-picture')) {
            $profile_picture =  $request->file('profile-picture')->store('items/sub-categories', 'public');
        }else{
            $profile_picture = $request['fetched-image'];
        }

        $Sql = SubCategory::where('sub_cat_id', $request['sub_cat_id'])->update([
            'cat_id' => $request['cat-id'],
            'name' => strtoupper($request['name']),
            'image' => $profile_picture
        ]);

        if($Sql){
            return response()->json([
                'status' => 200,
                'msg' => 'Sub-Category updated successfully'
            ]);
        }
        return response()->json([
            'status' => 201,
            'msg' => 'Error: something went wrong'
        ]);
    }

    public function delete(Request $request){
        $Sql = SubCategory::where('sub_cat_id', $request['sub-cat-id'])->delete();
        if($Sql){
            return response()->json([
                'status' => 200,
                'msg' => 'Sub-Category deleted successfully'
            ]);
        }
        return response()->json([
            'status' => 201,
            'msg' => 'Error : Something went wrong'
        ]);
    }
}
