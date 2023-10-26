<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public static function GenerateOrderID(): string
    {
        return IdGenerator::generate(['table' => 'orders', 'field' => 'order_id', 'length'=>5, 'prefix' => date('ymdHisu')]);
    }
    public function store(Request $request){
        return response()->json($this->GenerateOrderID());
    }
}
