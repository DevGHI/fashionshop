<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductPhoto;

class Product extends Model
{
    protected $fillable=['id','name','price','detail','sub_category_id','color_name','size_name'];

    public function photo()
    {
    	return $this->hasMany('App\ProductPhoto','product_id','id');
    }

    public function subcateogry()
    {
        return $this->belongsTo('App\SubCategory','id','sub_category_id');
    }
}
