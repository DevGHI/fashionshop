<?php


namespace App\Http\Controllers\CustomClass;


use App\MainCategory;
use App\SubCategory;

class CategoryData
{
    public function main_detail($id){
        $data=MainCategory::findOrFail($id);
        $main_photo=$data['photo'];
        $temp_arr=[];
        foreach ($data->subcategories as $item){
             $obj=new CategoryData();
             $sub_category=$obj->subcategory_withproductlimit($item->id,10);
             array_push($temp_arr,$sub_category);
            // $item['photo']=Helper::$domain.'upload/sub_category/'.$item->photo;
        }

        $data['subcategories_data']=$temp_arr;
        unset($data['subcategories']);
        $data['photo']=Helper::$domain.'upload/main_category/'.$main_photo;

        return $data;

    }

    public function maincat_format($arr){
        $temp_arr=[];
        foreach ($arr as $data){
            $detail=$this->main_detail($data->id);
            array_push($temp_arr,$detail);
        }
        return $temp_arr;
    }


    public function sub_detail($id){
        $data=SubCategory::findOrFail($id);
        $sub_photo=$data['photo'];
        $products=$data->product;
        $arr=[];
        foreach($products as $item){
            $obj=new ProductData();
            $products_data=$obj->detail($item->id);
            array_push($arr,$products_data);
        }
        $data['product_data']=$arr;
        unset($data['product']);

        $data['photo']=Helper::$domain.'upload/sub_category/'.$sub_photo;

        return $data;
    }

    public function subcategory_withproductlimit($id,$limit){
        $data=SubCategory::findOrFail($id);
        $sub_photo=$data['photo'];
        $products=$data->product;
        $arr=[];
        $i=0;
        foreach($products as $item){
            if ($i<$limit){
                $obj=new ProductData();
                $products_data=$obj->detail($item->id);
                array_push($arr,$products_data);
                $i++;
            }
        }
        $data['product_data']=$arr;
        unset($data['product']);

        $data['photo']=Helper::$domain.'upload/sub_category/'.$sub_photo;

        return $data;
    }

    public function subcat_format($arr){
        $temp_arr=[];
        foreach ($arr as $data){
            $detail=$this->subcategory_withproductlimit($data->id,10);
            array_push($temp_arr,$detail);
        }
        return $temp_arr;
    }
}
