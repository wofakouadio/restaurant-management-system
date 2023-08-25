<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('super-admin.categories', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        $prefix = 'C';
        $request['cat_id'] = IdGenerator::generate(['table' => 'categories', 'field' => 'cat_id', 'length' => 6, 'prefix' =>$prefix]);

        if ($request->hasFile('profile-picture')) {
            $profile_picture =  $request->file('profile-picture')->store('items/categories', 'public');
        }else{
            $profile_picture = 'items/categories/cat-default.jpg';
        }

        $Sql = Category::create([
            'cat_id' => $request['cat_id'],
            'name' => strtoupper($request['name']),
            'image' => $profile_picture
        ]);

        if($Sql){
            return response()->json([
                'status' => 200,
                'msg' => 'Category created successfully'
            ]);
        }
        return response()->json([
            'status' => 201,
            'msg' => 'Error: something went wrong'
        ]);
    }

    public function edit(Request $request){
        try {
            $getCategory = Category::where('cat_id', $request['cat_id'])->get();
            return response()->json([
                'status' => 200,
                'msg' => 'Data found',
                'data' => $getCategory
            ]);
        } catch (\Exception $e){
            return response()->json([
                'status' => 201,
                'msg' => 'Data not found. Error : ' . $e->getMessage(),
                'data' => $getCategory
            ]);
        }
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        if ($request->hasFile('profile-picture')) {
            $profile_picture =  $request->file('profile-picture')->store('items/categories', 'public');
        }else{
            $profile_picture = $request['fetched-image'];
        }

        $Sql = Category::where('cat_id', $request['cat_id'])->update([
            'name' => strtoupper($request['name']),
            'image' => $profile_picture
        ]);

        if($Sql){
            return response()->json([
                'status' => 200,
                'msg' => 'Category updated successfully'
            ]);
        }
        return response()->json([
            'status' => 201,
            'msg' => 'Error: something went wrong'
        ]);
    }

    public function delete(Request $request){
        $Sql = Category::where('cat_id', $request['cat-id'])->delete();
        if($Sql){
            return response()->json([
                'status' => 200,
                'msg' => 'Category deleted successfully'
            ]);
        }
        return response()->json([
            'status' => 201,
            'msg' => 'Error : Something went wrong'
        ]);
    }

}
