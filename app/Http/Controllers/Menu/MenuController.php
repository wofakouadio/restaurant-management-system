<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index(){
        return view('super-admin.new-menu');
    }
}
