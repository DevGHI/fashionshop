<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\PrdouctPhoto;

class SubCategory extends Model
{
    protected $guarded = ['id'];

    public function product()
    {
    	return $this->hasMany('App\Product','sub_category_id','id');
    }

    /*public function photo()
    {
    	return $this->hasMany('App\ProductPhoto','product_id','id');
    }*/
}
