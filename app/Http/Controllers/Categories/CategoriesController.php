<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

        // Connect to the local database
        $localConnection = DB::connection('mysql');

        // Connect to the remote database
        $remoteConnection = DB::connection('mysql_remote');

        // Sync the databases
        $localConnection->beginTransaction();
        $remoteConnection->beginTransaction();

        try {
            // Get the data from the local database
            $data = $localConnection->select('SELECT * FROM categories');
            $data2 = $remoteConnection->select('SELECT * FROM categories');

//            dd($data . " " . $data2);
            return response()->json($data2);

            // Insert the data into the remote database
//            foreach ($data as $row) {
//                foreach ($data2 as $row2){
//                    if($row2->cat_id !== $row->cat_id){
//                        $remoteConnection->insert('INSERT INTO categories (cat_id, name, image, created_at, updated_at) VALUES (?,?,?,?,?)', [
//                            $row->cat_id,
//                            $row->name,
//                            $row->image,
//                            $row->created_at,
//                            $row->updated_at
//                        ]);
//                    }
//                }
//            }

            // Commit the transactions
//            $localConnection->commit();
//            $remoteConnection->commit();
//
//            // Log the success
//            Log::info('Database synchronization successful');
        } catch (\Exception $e) {
            // Rollback the transactions
//            $localConnection->rollback();
//            $remoteConnection->rollback();
//
//            // Log the error
//            Log::error('Database synchronization failed: '. $e->getMessage());
        }

//        try {
//            $getCategory = Category::where('cat_id', $request['cat_id'])->get();
//            return response()->json([
//                'status' => 200,
//                'msg' => 'Data found',
//                'data' => $getCategory
//            ]);
//        } catch (\Exception $e){
//            return response()->json([
//                'status' => 201,
//                'msg' => 'Data not found. Error : ' . $e->getMessage(),
//                'data' => $getCategory
//            ]);
//        }
    }
}
