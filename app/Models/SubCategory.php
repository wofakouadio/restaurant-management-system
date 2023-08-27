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

    protected $table = 'sub_categories';
//    protected $primaryKey = 'cat_sub_id';

    public function category(){
        return $this->hasMany(SubCategory::class, 'cat_id');
    }
}
