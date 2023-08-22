<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('guest')->group(function(){
    Route::get('/', [AuthController::class, 'index']);
    Route::get('register', [AuthController::class, 'show_registration']);
    Route::get('forgot-password', [AuthController::class, 'show_forgot_password']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('auth')->group( function () {
    Route::post('/user-login', [AuthController::class, 'login'])->name('auth.user-login');
});

Route::middleware('super-admin')->prefix('super-admin')->group(function (){
    Route::get('/', [SuperAdminController::class, 'index'])->name('sa.dashboard');
    Route::get('/new-user', [SuperAdminController::class, 'new_user_page'])->name('sa.new-user');
    Route::post('/register-new-user', [UserController::class, 'store'])->name('sa.register-new-user');
    Route::get('/all-users', [SuperAdminController::class, 'all_users'])->name('sa.all-users');
    Route::get('/get-all-roles', [SuperAdminController::class, 'get_all_roles'])->name('sa.get-all-roles');
    Route::get('/get-user', [UserController::class, 'edit'])->name('sa.get-user');
    Route::put('/update-user', [UserController::class, 'update'])->name('sa.update-user');
    Route::delete('/delete-user', [UserController::class, 'delete'])->name('sa.delete-user');
});

