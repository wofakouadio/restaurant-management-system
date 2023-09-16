<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Menu;
use App\Models\Order;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class OrdersController extends Controller
{
    public function index(){
        $menus = Menu::where('status', 1)->get();
        return view('super-admin.new-order', compact('menus'));
    }

    public function GenerateOrderID(){
        return IdGenerator::generate(['table' => 'orders', 'field' => 'order_id', 'length' => 15, 'prefix' => date('ymdHisu')]);
    }

    public function store(StoreOrderRequest $request){
        $orderValidated = $request->validated();
        $request['order_id'] = $this->GenerateOrderID();
        $Sql = Order::create([
            'order_id' => $request['order_id'],
            'menu_id' => $request['menu_id'],
            'menu_name' => $request['name'],
            'price' => $request['price'],
            'quantity' => $request['quantity'],
            'total_price' => $request['quantity'] * $request['price'],
            'remarks' => $request['remarks'],
            'payment_method' => $request['payment_method']
        ]);
        if($Sql){
            return response()->json([
                'status' => 200,
                'msg' => 'Order created successfully'
            ]);
        }
        return response()->json([
            'status' => 201,
            'msg' => 'Error: something went wrong'
        ]);
    }
}
