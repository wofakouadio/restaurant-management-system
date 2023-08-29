<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        return view('super-admin.new-menu');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'cat-id' => 'required',
            'sub-cat-id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'status' => 'required'
        ]);

        $prefix = 'M';

        $request['menu_id'] = IdGenerator::generate(['table' => 'menus', 'field' => 'menu_id', 'length' => 6, 'prefix' =>$prefix]);

        if ($request->hasFile('profile-picture')) {
            $profile_picture =  $request->file('profile-picture')->store('items/menus', 'public');
        }else{
            $profile_picture = 'items/menus/menu-default.jpg';
        }

//        $request['size'] = $request->input('size');
        if($request['size']){
            $size = implode(',', $request['size']);
        }else{
            $size = '';
        }

        $Sql = Menu::create([
            'cat_id' => $request['cat-id'],
            'name' => strtoupper($request['name']),
            'image' => $profile_picture,
            'sub_cat_id' => $request['sub-cat-id'],
            'description' => $request['description'],
            'extra' => $request['extra'],
            'price' => $request['price'],
            'discount' => $request['discount'],
            'status' => $request['status'],
            'size' => $size,
            'menu_id' => $request['menu_id']
        ]);

        if($Sql){
            return response()->json([
                'status' => 200,
                'msg' => 'Menu created successfully'
            ]);
        }
        return response()->json([
            'status' => 201,
            'msg' => 'Error: something went wrong'
        ]);
    }
}
