<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderProduct;

class Order extends Model
{
    protected $guarded = ['id'];

    public function products()
    {
    	return $this->hasMany('App\OrderProduct','order_id','id');
    }
}
