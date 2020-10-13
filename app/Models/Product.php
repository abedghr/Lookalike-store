<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'prod_name','prod_description','prod_old_price','prod_new_price','prod_image','cat_id','prod_related'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id','id');
    }
    public function related()
    {
        return $this->belongsTo(Related::class,'prod_related','id');
    }
}
