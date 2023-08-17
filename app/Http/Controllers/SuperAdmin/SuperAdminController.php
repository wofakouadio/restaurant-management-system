<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index(){
        return view('super-admin.dashboard');
    }

    public function new_user_page(){
        $roles = Role::all();
        return view('super-admin.new-user',compact('roles'));
    }
}
