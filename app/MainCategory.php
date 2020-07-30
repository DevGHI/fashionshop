<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubCategory;

class MainCategory extends Model
{
    protected $guarded = ['id'];
 
    public function subcategories()
    {
    	return $this->hasMany('App\SubCategory','main_category_id','id');
    }
}
