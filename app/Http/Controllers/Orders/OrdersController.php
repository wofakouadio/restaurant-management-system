<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class OrdersController extends Controller
{
    public function index(){
        $menus = Menu::where('status', 1)->get();
        return view('super-admin.new-order', compact('menus'));
    }
}
