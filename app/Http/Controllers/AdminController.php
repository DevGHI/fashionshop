<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CustomClass\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.township');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function color()
    {
        return view('admin.color');
    }


    public function size()
    {
        return view('admin.size');
    }

    public function supplier()
    {
        return view('admin.supplier');
    }


    public function product()
    {
        $api=Helper::$domain.'api/subcategories';
        $response = Http::get($api);
        $data= $response->json();

        $color_response=Http::get(Helper::$domain.'api/colors');
        $color=$color_response->json();

        $size_response=Http::get(Helper::$domain.'api/sizes');
        $size=$size_response->json();

        // return $color;
        // return gettype($data);
        return view('admin.product')->with([
            'subcategories'=>$data,
            'colors'=>$color,
            'sizes'=>$size
        ]);
    }

    public function order(){
        return view('admin.order');
    }

    public function total_order(){ 
        $api=Helper::$domain.'api/townships';
        $response = Http::get($api);
        $data= $response->json();
        return view('admin.total_order')->with([
            'townships'=>$data
        ]);
    }

    public function main_category(){
        $api=Helper::$domain.'api/maincategories';
        $response = Http::get($api);
        $data= $response->json();
        return view('admin.main_category')->with([
            'main_categories'=>$data
        ]);
    }

    public function product_detail($id){
        return view('admin.product_detail',compact('id'));
    }

    public function order_detail($id){
        return view('admin.order_detail',compact('id'));
    }

    public function user(){
        $api=Helper::$domain.'api/townships';
        $response = Http::get($api);
        $data= $response->json();
        //return $response;
        //return gettype($data);
        //return $data;
        // return 'success'->with([
        //     'townships'=>$data
        // ]);
        //return view('admin.test',compact('data'));
        return view('admin/user')->with([
            'township'=>$data
        ]);
    }
}
