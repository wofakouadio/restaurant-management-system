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

    public function delete_order_statuses($order_id){
        return OrderStatus::where('order_id', $order_id)->delete();
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
            $total = 0;
            $output = '';
            $counter = 1;
            $getOrders = Order::select('items')->where('order_id', $request['order_id'])->get();
            $output = '<table class="table table-sm table-vcenter">';
            $output .= '<thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item</th>
                                    <th class="scope text-center">Qty</th>
                                    <th class="scope text-center">Amount</th>
                                </tr>
                            </thead>';
            $output .= '<tbody>';
            $JsonData = json_decode($getOrders, true);
            if(is_array($JsonData) && !empty($JsonData)){
                $itemsJson = $JsonData[0]['items'];
                $items = json_decode($itemsJson, true);
                foreach ($items as $item){
                    $output .= '<tr>';
                    $output .= '<th>'.$counter++.'</th>';
                    $output .= '<th>'.$item['item_name'].'</th>';
                    $output .= '<th class="scope text-center">'.$item['item_quantity'].'</th>';
                    $output .= '<th class="scope text-center">GH₵ '.$item['item_subtotal'].'</th>';
                    $output .= '</tr>';
                    $total += $item['item_subtotal'];
                }
                $output .= '<tr>';
                $output .= '<th colspan="3"  class="scope text-center">TOTAL</th>';
                $output .= '<th class="scope text-center fw-bold">GH₵ '.$total.'</th>';
                $output .= '</tr>';
            }
            $output .= '</tbody>';
            $output .= '<table>';

            return response()->json([
                'status' => 200,
                'msg' => 'Data found',
                'data' => $output,
                'total' => $total
            ]);
        } catch (\Exception $e){
            return response()->json([
                'status' => 201,
                'msg' => 'Data not found. Error : ' . $e->getMessage(),
                'data' => []
            ]);
        }
    }

    public function get_order_details(Request $request){
        try {
            $total = 0;
            $output = '';
            $counter = 1;
            $getOrders = Order::select('items')->where('order_id', $request['order_id'])->get();
            $output = '<table class="table table-sm table-vcenter">';
            $output .= '<thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item</th>
                                    <th class="scope text-center">Qty</th>
                                    <th class="scope text-center">Amount</th>
                                </tr>
                            </thead>';
            $output .= '<tbody>';
            $JsonData = json_decode($getOrders, true);
            if(is_array($JsonData) && !empty($JsonData)){
                $itemsJson = $JsonData[0]['items'];
                $items = json_decode($itemsJson, true);
                foreach ($items as $item){
                    $output .= '<tr>';
                    $output .= '<th>'.$counter++.'</th>';
                    $output .= '<th>'.$item['item_name'].'</th>';
                    $output .= '<th class="scope text-center">'.$item['item_quantity'].'</th>';
                    $output .= '<th class="scope text-center">GH₵ '.$item['item_subtotal'].'</th>';
                    $output .= '</tr>';
                    $total += $item['item_subtotal'];
                }
                $output .= '<tr>';
                $output .= '<th colspan="3"  class="scope text-center">TOTAL</th>';
                $output .= '<th class="scope text-center fw-bold">GH₵ '.$total.'</th>';
                $output .= '</tr>';
            }
            $output .= '</tbody>';
            $output .= '<table>';

            return response()->json([
                'status' => 200,
                'msg' => 'Data found',
                'data' => $output,
                'total' => $total
            ]);
        } catch (\Exception $e){
            return response()->json([
                'status' => 201,
                'msg' => 'Data not found. Error : ' . $e->getMessage(),
                'data' => []
            ]);
        }
    }

    public function show(Request $request){
        $orderDetails = Order::select('items')->where('order_id', $request['order_id'])->get();
        $orderTotal = Order::select('total')->where('order_id', $request['order_id'])->get();
        $paymentType = Order::select('payment_method')->where('order_id', $request['order_id'])->get();
        $remarks = Order::select('remarks')->where('order_id', $request['order_id'])->get();
//        return view('super-admin.order-processing-payment', compact('orderDetails', 'paymentType', 'orderTotal', 'remarks'));
        return view('super-admin.order-processing-payment', [
            'orderDetails' => $orderDetails,
            'paymentType' => $paymentType,
            'orderTotal' => $orderTotal,
            'remarks' => $remarks,
            'order_id' => $request['order_id']
        ]);
    }

    public function delete(Request $request){
        $Sql = Order::where('order_id', $request['order_id'])->delete();
        if($Sql){
            return response()->json([
                'status' => 200,
                'msg' => 'Order deleted successfully'
            ]);
            $this->delete_order_statuses($request['order_id']);
        }
        return response()->json([
            'status' => 201,
            'msg' => 'Error : Something went wrong'
        ]);
    }
}
