<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuperAdminController extends Controller
{
    public function index(){
        return view('super-admin.dashboard');
    }

    public function new_user_page(){
        $roles = Role::all();
        return view('super-admin.new-user',compact('roles'));
    }

    public function all_users(){
        $users = DB::table('users')->join('roles', 'roles.id', '=', 'users.role_type')->select('users.userid', 'users.sur_name as sur_name', 'users.middle_name', 'users.last_name', 'users.email as user_mail', 'users.profile_picture', 'roles.id as role_id', 'roles.name as role')->get();
        return view('super-admin.all-users',compact('users'));
    }

    public function get_all_roles(){
        $output = [];
        $roles = Role::select('id', 'name')->get();
        foreach ($roles as $role){
            $output[] .= "<option value='".$role->id."'>".$role->name."</option>";
        }
        return $output;
    }
}
