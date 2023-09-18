<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(){
        $countCartItems = Cart::all()->count();
        $output = '<div class="block block-rounded">';
        if($countCartItems > 0){
            $output .= '<div class="block-content">';
            $output .= '<table class="table table-vcenter">';
            $output .= '<thead>';
            $output .= '<tr>';
            $output .= '<th>Name</th>';
            $output .= '<th>Price</th>';
            $output .= '<th>Qty</th>';
            $output .= '<th>Subtotal</th>';
            $output .= '<th class="text-center" style="width: 100px;">Action</th>';
            $output .= '</tr>';
            $output .= '</thead>';
            $output .= '<tbody>';
            $cartItems = Cart::all();
            $sumCartItem = DB::table('carts')->sum('subtotal');
            foreach ($cartItems as $item){
                $output .= '<tr>';
                $output .= '<td>'.$item->menu_name.'</td>';
                $output .= '<td class="text-center">'.$item->price.'</td>';
                $output .= '<td class="text-center">'.$item->quantity.'</td>';
                $output .= '<td class="fw-bold text-center">'.$item->subtotal.'</td>';
                $output .= '<td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" title="Delete" data-bs-target="#DeleteCartItem" data-cart_id="'.$item->id.'">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>';
                $output .= '</tr>';
            }
            $output .= '</tbody>';
            $output .= '<tfoot>';
            $output .= '<tr>';
            $output .= '<td  class="fw-bold text-right" colspan="4">Total</td>';
            $output .= '<td class="fw-bold text-center">GH₵ '.sprintf('%02d', $sumCartItem).'</td>';
            $output .= '</tr>';
            $output .= '</tfoot>';
            $output .= '</table>';
            $output .= '<div class="mb-2">';
            $output .= '<button class="btn btn-lg btn-alt-success fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#AddNewOrder" data-user_id="'.Auth::user()->userid.'"> <i class="fa fa-money-bill-wheat"></i> Checkout';
            $output .= '</button>';
            $output .= '</div>';
            $output .= '</div>';
        }
        $output .= '</div>';
        return $output;
    }

    public function store(Request $request){
        $Sql = Cart::create([
            'user_id' => Auth::user()->userid,
            'menu_id' => $request['menu_id'],
            'menu_name' => $request['name'],
            'price' => $request['price'],
            'quantity' => $request['quantity'],
            'subtotal' => $request['price'] * $request['quantity']
        ]);
        if($Sql){
            return response()->json([
                'status' => 200,
                'msg' => 'Item added to cart successfully'
            ]);
        }
        return response()->json([
            'status' => 201,
            'msg' => 'Error: something went wrong'
        ]);
    }

    public function show(Request $request){
        $data = [];
        $total = 0;
        try {
            $getCartItems = Cart::where('user_id', $request['user_id'])->get();
            foreach ($getCartItems as $item){
                $data[] = $item->menu_name . ' (' . $item->quantity .')' . ' @ ' . $item->subtotal;
                $total += $item->subtotal;
            }
            return response()->json([
                'status' => 200,
                'msg' => 'Data found',
                'data' => $data,
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

    public function edit(Request $request){
        try {
            $getCart = Cart::where('id', $request['cart_id'])->get();
            return response()->json([
                'status' => 200,
                'msg' => 'Data found',
                'data' => $getCart
            ]);
        } catch (\Exception $e){
            return response()->json([
                'status' => 201,
                'msg' => 'Data not found. Error : ' . $e->getMessage(),
                'data' => $getCart
            ]);
        }
    }

    public function delete(Request $request){
        $Sql = Cart::where('id', $request['cart_id'])->delete();
        if($Sql){
            return response()->json([
                'status' => 200,
                'msg' => 'Item deleted from cart successfully'
            ]);
        }
        return response()->json([
            'status' => 201,
            'msg' => 'Error : Something went wrong'
        ]);
    }

    static function delete_user_items($user_id){
        $Sql = Cart::where('user_id', $user_id)->delete();
        if($Sql){
            return true;
        }
        return false;
    }

}
