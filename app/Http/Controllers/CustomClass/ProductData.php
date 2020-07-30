<?php


namespace App\Http\Controllers\CustomClass;


use App\Product;
use App\Order;
use App\MainCategory;
use App\SubCategory;
use App\ProductPhoto;

class ProductData
{
    public function detail($id){
        $data=Product::findOrFail($id);
        $sub_category=SubCategory::findOrFail($data->sub_category_id);
        $data['subcategory']=$sub_category;
        foreach ($data->photo as $item){
            $item['photo_url']=Helper::$domain.'upload/product/'.$item->photo;
        }
        $data['photo']=$data->photo;
        return $data;
    }

    public function format($arr){
        $temp_arr=[];
        foreach ($arr as $data){
            $detail=$this->detail($data->id);
            array_push($temp_arr,$detail);
        }
        return $temp_arr;
    }







}
