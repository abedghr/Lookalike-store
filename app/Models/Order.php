<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'fname','lname','email','phone','city','address','notes','products','total_price','order_done'
    ];
}
