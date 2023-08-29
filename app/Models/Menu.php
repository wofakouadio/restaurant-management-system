<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'name',
        'description',
        'size',
        'extra',
        'price',
        'discount',
        'category',
        'subcategory',
        'review',
        'status',
        'image'
    ];

    protected $table = 'menus';
}
