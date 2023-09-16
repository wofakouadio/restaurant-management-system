<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'placed_status',
        'placed_status_timestamp',
        'confirmed_status',
        'confirmed_status_timestamp',
        'ready_status',
        'ready_status_timestamp',
        'delivered_status',
        'delivered_status_timestamp',
        'cancelled_status',
        'cancelled_status_timestamp'
    ];

    protected $table = 'order_statuses';

}
