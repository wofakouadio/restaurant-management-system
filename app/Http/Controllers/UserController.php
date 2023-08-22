<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class UserController extends Controller
{
    public function store(Request $request){
        $NewUser = $request->validate([
            'firstname' => ['required','regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            'lastname' => ['required','regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            'dob' => 'required|date',
            'placeofbirth' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'contact' => ['required','regex:/^([0-9]+)*$/'],
            'email' => 'required|email|unique:'.User::class,
            'username' => 'required|unique:'.User::class,
            'role' => 'required'
        ]);
        $prefix = 'E';
        $NewUser['userid'] = IdGenerator::generate(['table' => 'users', 'field' => 'userid', 'length' => 6, 'prefix' =>$prefix]);

        if ($request->hasFile('profile-picture')) {
            $NewUser['profile-picture'] =  $request->file('profile-picture')->store('users', 'public');
        }else{
            $NewUser['profile-picture'] = 'users/user-default-profile.png';
        }
        $Sql = User::create([
            'userid' => $NewUser['userid'],
            'sur_name' => mb_strtoupper($NewUser['firstname']),
            'middle_name' => mb_strtoupper($request['middlename']),
            'last_name' => mb_strtoupper($NewUser['lastname']),
            'dob' => ($NewUser['dob']),
            'gender' => $NewUser['gender'],
            'place_of_birth' => $NewUser['placeofbirth'],
            'main_address' => $NewUser['address'],
            'secondary_address' => $request['secondary-address'],
            'primary_contact' => $NewUser['contact'],
            'secondary_contact' => $request['secondary-contact'],
            'email' => $NewUser['email'],
            'username' => $NewUser['username'],
            'profile_picture' => $NewUser['profile-picture'],
            'role_type' => $NewUser['role'],
            'password' => bcrypt('password')
        ]);
        if($Sql){
            return response()->json([
                'status' => 200,
                'msg' => 'User saved successfully'
            ]);
        }
        return response()->json([
            'status' => 201,
            'msg' => 'Error : Something went wrong'
        ]);
    }

    public function edit(Request $request){
        try {
            $getUser = User::where('userid', $request['user_id'])->get();
            return response()->json([
                'status' => 200,
                'msg' => 'User found ss',
                'data' => $getUser
            ]);
        } catch (\Exception $e){
            return response()->json([
                'status' => 201,
                'msg' => 'User not found. Error :' . $e->getMessage(),
                'data' => []
            ]);
        }
    }

    public function update(Request $request){
        $UpdateUser = $request->validate([
            'firstname' => ['required','regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            'lastname' => ['required','regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            'dob' => 'required|date',
            'placeofbirth' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'contact' => ['required','regex:/^([0-9]+)*$/'],
            'email' => 'required|email',
            'username' => 'required',
            'role' => 'required'
        ]);

        if ($request->hasFile('profile-picture')) {
            $UpdateUser['profile-picture'] =  $request->file('profile-picture')->store('users', 'public');
        }else{
            $UpdateUser['profile-picture'] = $request['user-profile-picture'];
        }
        $Sql = User::update([
            'sur_name' => mb_strtoupper($UpdateUser['firstname']),
            'middle_name' => mb_strtoupper($request['middlename']),
            'last_name' => mb_strtoupper($UpdateUser['lastname']),
            'dob' => ($UpdateUser['dob']),
            'gender' => $UpdateUser['gender'],
            'place_of_birth' => $UpdateUser['placeofbirth'],
            'main_address' => $UpdateUser['address'],
            'secondary_address' => $request['secondary-address'],
            'primary_contact' => $UpdateUser['contact'],
            'secondary_contact' => $request['secondary-contact'],
            'email' => $UpdateUser['email'],
            'username' => $UpdateUser['username'],
            'profile_picture' => $UpdateUser['profile-picture'],
            'role_type' => $UpdateUser['role']
        ]);
        if($Sql){
            return response()->json([
                'status' => 200,
                'msg' => 'User updated successfully'
            ]);
        }
        return response()->json([
            'status' => 201,
            'msg' => 'Error : Something went wrong'
        ]);
    }
}
