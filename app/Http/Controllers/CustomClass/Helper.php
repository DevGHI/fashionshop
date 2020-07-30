<?php


namespace App\Http\Controllers\CustomClass;


use Illuminate\Support\Facades\Http;

class Helper
{
    public static $domain='http://localhost:81/fashionshop/public/';

    public static function getCategory(){
         $response=Http::get(self::$domain.'api/maincategories');
         $category=$response->json();
         return $category;
    }
}
