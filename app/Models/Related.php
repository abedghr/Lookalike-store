<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Related extends Model
{
    protected $fillable = [
        'name','gender'
    ];

    public function product(){
        return $this->hasMany(Product::class);
    }
}
