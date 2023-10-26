<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Categories\CategoriesController;
use App\Http\Controllers\categories\SubCategoriesController;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\Orders\CartController;
use App\Http\Controllers\Orders\OrdersController;
use App\Http\Controllers\Orders\TransactionController;
use App\Http\Controllers\SuperAdmin\DashboardController;
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
    Route::get('/get-pending-orders', [DashboardController::class, 'pending_orders_counter'])->name('sa.pending-orders-counter');

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

    /** Cart **/
    Route::controller(CartController::class)->group(function(){
        Route::get('/get-cart-items', 'index')->name('sa.get-cart-items-index');
        Route::post('/add-item-to-cart', 'store')->name('sa.add-item-to-cart');
        Route::get('/get-cart-data', 'edit')->name('sa.get-cart-data');
        Route::get('/get-cart-users-items', 'show')->name('sa.get-cart-items');
        Route::delete('/delete-item-from-cart', 'delete')->name('sa.delete-item-from-cart');
        Route::delete('/delete-user-items-from-cart', 'delete_user_items')->name('sa.delete-user-items-from-cart');
    });

    /** Orders **/
    Route::controller(OrdersController::class)->group(function(){
        Route::get('/new-order', 'index')->name('sa.new-order');
        Route::post('/add-new-order', 'store')->name('sa.add-new-order');
        Route::get('/orders', 'create')->name('sa.orders-list');
        Route::get('/get-order', 'edit')->name('sa.get-order');
        Route::get("/get-order-details", 'get_order_details')->name('sa.get-order-details');
        Route::get('/order-processing-payment/{order_id}/', 'show');
        Route::delete('/delete-order', 'delete')->name('sa.delete-order');
    });

    /** Transactions **/
    Route::controller(TransactionController::class)->group(function (){
        Route::post('/pay', 'store')->name('sa.pay');
    });
});

