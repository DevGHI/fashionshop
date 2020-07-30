<?php


namespace App\Http\Controllers\CustomClass;


use App\Customer;
use App\Order;
use App\Township;
use App\User;

class OrderData
{
    public function detail($id){
        $data=Order::findOrFail($id);
        $data['township']=Township::findOrFail($data->township_id);
        $customer_id=User::findOrFail($data->user_id)->customer_id;
        $data['customer_data']=Customer::findOrFail($customer_id);
        $temp_arr=[];
        foreach ($data->products as $item){
            $product_id=$item->product_id;
            $product_obj=new ProductData();
            $product_detail=$product_obj->detail($product_id);
            array_push($temp_arr,$product_detail);
        }
        $data['products_data']=$temp_arr;
        unset($data['products']);
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
