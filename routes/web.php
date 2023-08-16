<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login',[
        'title' => 'Login'
    ]);
});

Route::get('register', function () {
    return view('auth.register',[
        'title' => 'Register'
    ]);
});

Route::get('forgot-password', function () {
    return view('auth.forgot-password',[
        'title' => 'Forgot Password'
    ]);
});
