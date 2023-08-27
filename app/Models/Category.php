<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_id',
        'name',
        'image'
    ];

    protected $table = 'categories';

//    protected $primaryKey = 'cat_id';

    public function subcategory(){
        return $this->belongsTo(Category::class, 'cat_id');
    }

}
