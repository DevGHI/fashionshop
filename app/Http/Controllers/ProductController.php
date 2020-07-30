<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CustomClass\ProductData;
use App\Product;
use Illuminate\Http\Request;
use App\ProductPhoto;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        $obj=new ProductData();
        $products_arr=$obj->format($products);

        return response(['data' => $products_arr ], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required',
            'detail'=>'required',
            'sub_category_id'=>'required',
            'photo'=>'required'
        ]);
        $product_id = Product::create([
            'name'=>$request->get('name'),
            'price'=>$request->get('price'),
            'detail'=>$request->get('detail'),
            'sub_category_id'=>$request->get('sub_category_id'),
            'color_name'=>json_encode($request->get('color_name')),
            'size_name'=>json_encode($request->get('size_name'))
        ])->id;

        if($request->hasFile('photo'))
            {
                $photo=$request->file('photo');

                foreach($photo as $image)
                {
                    $filename = uniqid().''.$image->getClientOriginalName();
                    //return $filename;
                    $image->move(public_path('upload/product'), $filename);

                    ProductPhoto::create([
                        'photo'=>$filename,
                        'product_id'=>$product_id
                    ]);
                }

                $obj=new ProductData();
                return response()->json([
                    'status'=>'success',
                    'message'=>'Insert Success',
                    'data'=>$obj->detail($product_id)
                ]);
            }
    }

    public function show($id)
    {
        $obj=new ProductData();
        $product=$obj->detail($id);
        return [
            'data'=>$product
        ];
    }

    public function update(Request $request, $id)
    {
        //$host='http://localhost:8000/shop/public/upload/product/';

        //without  update photo
        Product::findOrFail($id)->update([
            'name'=>$request->get('name'),
            'price'=>$request->get('price'),
            'detail'=>$request->get('detail'),
            'sub_category_id'=>$request->get('sub_category_id')
            ]);

        return response()->json([
            'status'=>'success',
            'message'=>'Update Success'
        ]);

        //with update photo but only for one photo
        /*if($request->hasFile('photo'))
        {
            $img=$request->file('photo');
            $image_name=uniqid().'_'.$img->getClientOriginalName();
            $img->move(public_path('upload/product'),$image_name);

            $photo=ProductPhoto::where('product_id',$id)->get();
            //return $imag;
            foreach($photo as $value)
            {
            //return $value->photo;
                $image_path=public_path().'/upload/product/'.$value->photo;
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            }

            ProductPhoto::where('product_id',$id)->update([
                'photo'=>$image_name
            ]);

            Product::findOrFail($id)->update([
            'name'=>$request->get('name'),
            'price'=>$request->get('price'),
            'detail'=>$request->get('detail'),
            'sub_category_id'=>$request->get('sub_category_id')
            ]);
            return 'update success';
        }else{
            Product::findOrFail($id)->update([
            'name'=>$request->get('name'),
            'price'=>$request->get('price'),
            'detail'=>$request->get('detail'),
            'sub_category_id'=>$request->get('sub_category_id')
            ]);
            return 'update success';
        }*/
    }

    public function destroy($id)
    {
        /*Product::destroy($id);

        return response(['data' => null ], 204);*/

        $product=Product::find($id);
        //return $product;
        $photo=ProductPhoto::where('product_id',$id)->get();
        $delete_photo=ProductPhoto::where('product_id',$id);
        //return $delete_photo;
        foreach($photo as $value){
            //return $value->photo;
            unlink(public_path().'/upload/product/'.$value->photo);
        }
        //return $photo;
        $product->delete();
        //$photo->delete();
        $delete_photo->delete();
        return response()->json([
            'status'=>'success',
            'message'=>'Delete Success'
        ]);
    }

    public function subcategory_product($subcategory_id){
        $products = Product::where('sub_category_id',$subcategory_id)->paginate(9);
        $obj=new ProductData();
        $products_arr=$obj->format($products);

        return ['data'=>$products_arr,'paginate'=>$products];
    }
}
