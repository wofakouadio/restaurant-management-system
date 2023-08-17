<?php

namespace App\Http\Controllers;

use A6digital\Image\DefaultProfileImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function CreateImageFromName($firstname, $lastname){
        $img = '';
        $img = DefaultProfileImage::create($firstname.' '.$lastname, 256, "#212121", "#FFF");
        Storage::put("public/users/".strtolower(substr($firstname, 0, 1).substr($lastname, 0, 1).time()).".png", $img->encode());
        return $img;
    }

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
        if()
        try {

        } catch (\Exception $e){

        }

        if ($request->hasFile('profile-picture')) {
            $request['profile-picture'] =  $request->file('profile-picture')->store('users', 'public');
        }else{
            $this->CreateImageFromName($NewUser['firstname'], $NewUser['lastname']);
        }
        return response()->json(['error' => 'something went wrong']);
    }
}
