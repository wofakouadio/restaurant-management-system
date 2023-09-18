<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'items',
        'total',
        'cashier',
        'payment_method',
        'status',
    ];

    protected $table = 'orders';
}
