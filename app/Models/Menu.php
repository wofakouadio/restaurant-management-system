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
//        'size',
        'extra',
        'price',
        'discount',
        'cat_id',
        'sub_cat_id',
        'reviews',
        'status',
        'image'
    ];

    protected $table = 'menus';

    public function setSizeAttributes($value): void
    {
        $this->attributes['size'] = json_encode($value);
    }

    public function getSizeAttributes($value){
        return $this->attributes['size'] = json_decode($value);
    }
}
