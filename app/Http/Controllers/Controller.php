<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Controllers\CustomClass\CategoryData;
use App\Http\Controllers\CustomClass\Helper;
use App\Http\Controllers\CustomClass\ProductData;
use App\User;
use App\Township;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();

            if ($user->user_type === 'admin') {
               $token=$user->createToken('Shop')->accessToken;
                   return [
                       'status'=>'success',
                       'user'=>$user,
                       'token'=>'Bearer '.$token
                   ];
            } else if ($user->user_type == 'customer') {
                //return 'Can Order Food';
                $customer=Customer::findOrFail($user->customer_id);
                $customer['township_name']=Township::findOrFail($customer['township_id'])->name;
                $customer['user_type']='customer';
                $customer['user_id']=$user->id;
                $token=$user->createToken('Shop')->accessToken;
                   return [
                       'status'=>'success',
                       'user'=>$customer,
                       'token'=>'Bearer '.$token
                   ];
            }

        } else {
            return [
                'status'=>'fail',
                'message'=>'Email or Password does not match!'
            ];
        }

    }

    function user_register(Request $request){
        if($request->get('password')==$request->get('confirm_password')){
            $customer_id=Customer::create([
                'name'=>$request->get('name'),
                'phone'=>$request->get('phone'),
                'address'=>$request->get('address'),
                'township_id'=>$request->get('township_id'),
            ])->id;

            $user=User::create([
                'email'=>$request->get('email'),
                'password'=>Hash::make($request->get('password')),
                'user_type'=>'customer',
                'customer_id'=>$customer_id
            ]);
            return [
                'user'=>$user,
                'status'=>'success'
            ];
        }
        else{
            return [
                'status'=>'fail',
                'message'=>'Confirm Password does not match!..'
            ];
        }
    }

    function home(){

    //    return Helper::getCategory();
        return view('user.index')->with([
            'categories'=>Helper::getCategory()
        ]);
    }

    function category_product($subcategory_id){
        $obj=new ProductController();
        $product=$obj->subcategory_product($subcategory_id);
        // return $product['data'];
        $obj=new CategoryData();
        $category=$obj->sub_detail($subcategory_id);
//        return $category['name'];
        return view('user.shop_category')->with([
            'categories'=>Helper::getCategory(),
            'products'=>$product,
            'category'=>$category['name']

        ]);
    }

    function product_detail($id){
        $obj=new ProductController();
        $product_detail=$obj->show($id);
        // return $product_detail['data'];
//        return json_decode($product_detail['data']['color_name'])[0];
        return view('user.product_detail')->with([
            'categories'=>Helper::getCategory(),
            'product'=>$product_detail['data']
        ]);
    }

    function contact(){
        return view('user.contact')->with([
            'categories'=>Helper::getCategory()
        ]);
    }

    function checkout(){
        $user_info=$_COOKIE['user_info'];
        $user_info=json_decode($user_info,true);


        $cart=$_COOKIE['cart'];
        $cart=json_decode($cart,true);

        // return $cart;
        $res=Http::get(Helper::$domain.'api/townships');
        $townshops=$res->json();
        return view('user.checkout')->with([
            'categories'=>Helper::getCategory(),
            'user_info'=>$user_info,
            'township'=>$townshops['data'],
            'cart'=>$cart
        ]);
    }
    function login_page(){
        return view('user.login')->with([
            'categories'=>Helper::getCategory()
        ]);
    }

    function register_page(){
        $res=Http::get(Helper::$domain.'api/townships');
        $townshops=$res->json();
        return view('user.register')->with([
            'categories'=>Helper::getCategory(),
            'township'=>$townshops['data']
        ]);
    }

    function cart_detail(Request $request){
        $products=json_decode($request->get('products'));
        $obj=new ProductData();
        $arr=[];
        foreach ($products as $data){
            $detail=$obj->detail($data);
            array_push($arr,$detail);
        }
        return $arr;
    }


}
