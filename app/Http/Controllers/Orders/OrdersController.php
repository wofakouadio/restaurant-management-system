<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderStatus;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index(){
//        $menus = Menu::where('status', 1)->get();
        $menus = Menu::latest()->get();
        return view('super-admin.new-order', compact('menus'));
    }

    public function GenerateOrderID(){
        return IdGenerator::generate(['table' => 'orders', 'field' => 'order_id', 'length'=>5, 'prefix' => date('ymdHisu')]);
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
            'items' => $request['items'],
            'total' => $request['total'],
            'cashier' => Auth::user()->userid,
            'remarks' => $request['remarks'],
            'payment_method' => $request['payment_method']
        ]);
        if($Sql){
            $this->PlacedOrderStatus($request['order_id']);
            CartController::delete_user_items(Auth::user()->userid);
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

    public function create(){
        $orders = Order::latest()->get();
        return view('super-admin.orders-list', compact('orders'));
    }

    public function edit(Request $request){
        try {
            $getOrder = Order::where('order_id', $request['order_id'])->get();
            return response()->json([
                'status' => 200,
                'msg' => 'Data found',
                'data' => $getOrder
            ]);
        } catch (\Exception $e){
            return response()->json([
                'status' => 201,
                'msg' => 'Data not found. Error : ' . $e->getMessage(),
                'data' => $getOrder
            ]);
        }
    }
}
