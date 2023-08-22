<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //load authentication page
    public function index(){
        return view('auth.login');
    }

    public function UserRedirection(){
        if(Auth::user() && Auth::user()->role_type === 1){
            return '/super-admin/';
        }elseif(Auth::user() && Auth::user()->role_type === 2){
            return '/admin/';
        }elseif(Auth::user() && Auth::user()->role_type === 3){
            return '/supervisor/';
        }elseif(Auth::user() && Auth::user()->role_type === 4){
            return '/cashier/';
        }elseif(Auth::user() && Auth::user()->role_type === 5){
            return '/customer/';
        }else{
            return '/';
        }
    }

    //show registration form
    public function show_registration(){
        return view('auth.register');
    }

    //show forgot password form
    public function show_forgot_password(){
        return view('auth.forgot-password');
    }

    //login user
    public function login(Request $request){

        $LoginValidation = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        try {
            if (Auth::attempt([
                    'username' => $LoginValidation['username'],
                    'password' => $LoginValidation['password']
                ])){
                $request->session()->regenerate();
                return response()->json([
                    'status' => 200,
                    'msg' => "Login successful. Redirecting...",
                    'data' => $this->UserRedirection()
                ]);
            }else{
                return response()->json([
                    'status' => 201,
                    'msg' => "Login failed. Invalid credentials...",
                    'data' => []
                ]);
            }
        }catch (\Exception $e){
            return response()->json([
                'status' => 201,
                'msg' => "Login failed. Something went wrong...",
                'data' => $e->getMessage()
            ]);
        }

    }

    // Logout session
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
