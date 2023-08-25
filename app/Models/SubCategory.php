<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_id',
        'name',
        'image',
        'sub_cat_id'
    ];

    protected $table = 'categories';

    protected function category(){
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
