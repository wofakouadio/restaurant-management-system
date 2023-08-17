<?php

use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
});

Route::get('register', function () {
    return view('auth.register');
});

Route::get('forgot-password', function () {
    return view('auth.forgot-password');
});

Route::prefix('super-admin')->group(function (){
    Route::get('/', [SuperAdminController::class, 'index'])->name('sa.dashboard');
    Route::get('/new-user', [SuperAdminController::class, 'new_user_page'])->name('sa.new-user');
    Route::post('/register-new-user', [UserController::class, 'store'])->name('sa.register-new-user');
});

