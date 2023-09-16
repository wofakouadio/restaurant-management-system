<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderStatus;
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

    public function PlacedOrderStatus($order_id){
        return OrderStatus::create([
            'order_id' => $order_id,
            'placed_status' => 0,
            'placed_status_timestamp' => date('Y-m-d H:i:s')
        ]);
    }

    public function ConfirmedOrderStatus($order_id){
        return OrderStatus::where('order_id', $order_id)->update([
            'confirmed_status' => 1,
            'confirmed_status_timestamp' => date('Y-m-d H:i:s')
        ]);
    }

    public function ReadyOrderStatus($order_id){
        return OrderStatus::where('order_id', $order_id)->update([
            'ready_status' => 2,
            'ready_status_timestamp' => date('Y-m-d H:i:s')
        ]);
    }

    public function DeliveredOrderStatus($order_id){
        return OrderStatus::where('order_id', $order_id)->update([
            'delivered_status' => 3,
            'delivered_status_timestamp' => date('Y-m-d H:i:s')
        ]);
    }

    public function CancelledOrderStatus($order_id){
        return OrderStatus::where('order_id', $order_id)->update([
            'cancelled_status' => 4,
            'cancelled_status_timestamp' => date('Y-m-d H:i:s')
        ]);
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
            $this->PlacedOrderStatus($request['order_id']);
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
