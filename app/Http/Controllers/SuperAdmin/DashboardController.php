<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class DashboardController extends Controller
{
    public function pending_orders_counter(){
        $output = '';
        $data = Order::where('status', 0)->count();
        $output .= sprintf('%02d', $data);
        return $output;
    }
}
