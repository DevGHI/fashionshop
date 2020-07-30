<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CustomClass\CategoryData;
use App\Http\Requests\SubCategoryRequest;
use App\SubCategory;
use App\Product;
use App\Http\Controllers\CustomClass\ProductData;
use App\ProductPhoto;
use App\Http\Controllers\CustomClass\Helper;
class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::latest()->get();
        //return response(['data' => $subcategories ], 201);

        $obj=new CategoryData();
        $subcat_arr=$obj->subcat_format($subcategories);

        //return response(['data' => $subcat_arr ], 200);
        return $subcat_arr;
    }

    public function store(SubCategoryRequest $request)
    {
        /*$subcategory = SubCategory::create($request->all());

        return response(['data' => $subcategory ], 201);*/

        $this->validate($request,[
            'name'=>'required',
            'photo'=>'required',
            'main_category_id'=>'required'
        ]);
        if($request->hasFile('photo'))
        {
            $photo=$request->file('photo');
            $filename=uniqid().''.$photo->getClientOriginalName();
            $photo->move(public_path('upload/sub_category'),$filename);

            $subcat=SubCategory::create([
            'name'=>$request->get('name'),
            'photo'=>$filename,
            'main_category_id'=>$request->get('main_category_id')
            ])->id;
        }

        //$obj=new ProductData();
        return response()->json([
            'status'=>'success',
            'message'=>'Insert Success',
            //'data'=>$obj->sub_detail($subcat)
            //'data'=>$subcat
            'id'=>$subcat,
            'name'=>$request->get('name'),
            'photo'=>Helper::$domain.'upload/sub_category/'.$filename,
            'main_category_id'=>$request->get('main_category_id')
        ]);

    }

    public function show($id)
    {
        $obj=new CategoryData();
        return [
            'data'=>$obj->sub_detail($id)
        ];

        //return response(['data', $subcategory ], 200);
    }

    public function update(SubCategoryRequest $request, $id)
    {
        /*$subcategory = SubCategory::findOrFail($id);
        $subcategory->update($request->all());

        return response(['data' => $subcategory ], 200);*/
        if($request->hasFile('photo'))
        {
            $img=$request->file('photo');
            $file=uniqid().'_'.$img->getClientOriginalName();
            $img->move(public_path('upload/sub_category'),$file);

            $image=SubCategory::find($id);
            $image_path=public_path().'/upload/sub_category/'.$image->photo;
            if(file_exists($image_path))
            {
                unlink($image_path);
            }

            SubCategory::findOrFail($id)->update([
                'photo'=>$file
            ]);
            $arr=$request->all();
            unset($arr['photo']);
            SubCategory::findOrFail($id)->update($arr);
        }else{
            SubCategory::findOrFail($id)->update($request->all());
        }
        return response()->json([
            'status'=>'success',
            'message'=>'Update Success'
        ]);
    }

    public function destroy($id)
    {
        /*SubCategory::destroy($id);

        return response(['data' => null ], 204);*/
        $sub_cat=SubCategory::find($id);
        unlink(public_path().'/upload/sub_category/'.$sub_cat->photo);
        $sub_cat->delete();

        return response()->json([
            'status'=>'success',
            'message'=>'Delete Success'
        ]);
    }
}
