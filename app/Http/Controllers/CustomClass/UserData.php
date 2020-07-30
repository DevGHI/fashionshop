<?php


namespace App\Http\Controllers\CustomClass;


use App\Customer;
use App\User;
use App\Township;

class UserData
{
    public function detail($id){
        $data=Customer::findOrFail($id);
        $data['township'] = Township::findOrFail($data->township_id);
        $user=User::where('customer_id',$id)->get();
        // $user=User::findOrFail($data->users);
        $data['users_data']=$user;
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
