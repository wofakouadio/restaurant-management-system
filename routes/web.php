<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Categories\CategoriesController;
use App\Http\Controllers\categories\SubCategoriesController;
use App\Http\Controllers\Menu\MenuController;
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

//Route::middleware('guest')->group(function(){
//
//});
Route::get('/', [AuthController::class, 'index']);
Route::get('register', [AuthController::class, 'show_registration']);
Route::get('forgot-password', [AuthController::class, 'show_forgot_password']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('auth')->group( function () {
    Route::post('/user-login', [AuthController::class, 'login'])->name('auth.user-login');
});

Route::middleware('super-admin')->prefix('super-admin')->group(function (){

    /** Dashboard **/
    Route::get('/', [SuperAdminController::class, 'index'])->name('sa.dashboard');

    /** Users **/
    Route::get('/new-user', [SuperAdminController::class, 'new_user_page'])->name('sa.new-user');
    Route::post('/register-new-user', [UserController::class, 'store'])->name('sa.register-new-user');
    Route::get('/all-users', [SuperAdminController::class, 'all_users'])->name('sa.all-users');
    Route::get('/get-all-roles', [SuperAdminController::class, 'get_all_roles'])->name('sa.get-all-roles');
    Route::get('/get-user', [UserController::class, 'edit'])->name('sa.get-user');
    Route::put('/update-user', [UserController::class, 'update'])->name('sa.update-user');
    Route::delete('/delete-user', [UserController::class, 'delete'])->name('sa.delete-user');

    /** Categories **/
    Route::controller(CategoriesController::class)->group(function (){
        Route::get('/categories', 'index')->name('sa.categories');
        Route::post('/new-category', 'store')->name('sa.new-category');
        Route::get('/get-category', 'edit')->name('sa.get-category');
        Route::put('/update-category', 'update')->name('sa.update-category');
        Route::delete('/delete-category', 'delete')->name('sa.delete-category');
        Route::get('/categories-dropdown', 'categories_dropdown')->name('sa.categories-dropdown');
    });

    /** Sub Categories **/
    Route::controller(SubCategoriesController::class)->group(function(){
        Route::get('/sub-categories', 'index')->name('sa.sub-categories');
        Route::post('/new-sub-category', 'store')->name('sa.new-sub-category');
        Route::get('/get-sub-category', 'edit')->name('sa.get-sub-category');
        Route::put('/update-sub-category', 'update')->name('sa.update-sub-category');
        Route::delete('/delete-sub-category', 'delete')->name('sa.delete-sub-category');
        Route::get('/get-sub-categories-in-dropdown', 'sub_categories_dropdown')->name('sa.sub-categories-dropdown-based-on-category');
        Route::get('/get-sub-categories', 'sub_categories')->name('sa.get-sub-categories');
    });

    /** Menu **/
    Route::controller(MenuController::class)->group(function (){
        Route::get('/new-menu', 'index')->name('sa.new-menu');
        Route::post('/add-new-menu', 'store')->name('sa.add-new-menu');
        Route::get('/menus', 'show')->name('sa.all-menus');
        Route::get('/get-menu', 'edit')->name('sa.get-menu');
        Route::put('/update-menu', 'update')->name('sa.update-menu');
        Route::delete('/delete-menu', 'delete')->name('sa.delete-menu');
    });

//    Route::post('/new-category', [CategoriesController::class, 'store'])->name('sa.new-category');
//    Route::get('/get-category', [CategoriesController::class, 'edit'])->name('sa.get-category');
//    Route::put('/update-category', [CategoriesController::class, 'update'])->name('sa.update-category');
//    Route::delete('/delete-category', [CategoriesController::class, 'delete'])->name('sa.delete-category');
});

