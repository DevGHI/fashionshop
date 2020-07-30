<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CustomClass\CategoryData;
use App\Http\Requests\MainCategoryRequest;
use App\MainCategory;
use App\SubCategory;
use App\Http\Controllers\CustomClass\ProductData;
use App\Http\Controllers\CustomClass\Helper;

class MainCategoryController extends Controller
{
    public function index()
    {
        $maincategories = MainCategory::latest()->get();

        //return response(['data' => $maincategories ], 200);
        //return $maincategories[0]->subcategories;
       $obj=new CategoryData();
       $maincat_arr=$obj->maincat_format($maincategories);

        //return response(['data' => $maincat_arr ], 200);
        return $maincat_arr;
    }

    public function store(MainCategoryRequest $request)
    {
        //$maincategory = MainCategory::create($request->all())->id;

        //return response(['data' => $maincategory ], 201);
        $this->validate($request,[
            'name'=>'required',
            'photo'=>'required',
        ]);
        if($request->hasFile('photo'))
        {
            $photo=$request->file('photo');
            $filename=uniqid().''.$photo->getClientOriginalName();
            $photo->move(public_path('upload/main_category'),$filename);

            $maincat=MainCategory::create([
            'name'=>$request->get('name'),
            'photo'=>$filename
            ])->id;
        }

        //$obj=new ProductData();
        return response()->json([
            'status'=>'success',
            'message'=>'Insert Success',
            //'data'=>$obj->main_detail($maincat)
            //'data'=>$maincat
            'id'=>$maincat,
            'name'=>$request->get('name'),
            'photo'=>Helper::$domain.'upload/main_category/'.$filename
        ]);

    }

    public function show($id)
    {

        $obj=new CategoryData();

        return response()->json([
            'data'=>$obj->main_detail($id)
        ]);
    }

    public function update(MainCategoryRequest $request, $id)
    {
        /*$maincategory = MainCategory::findOrFail($id);
        $maincategory->update($request->all());

        return response(['data' => $maincategory ], 200);*/
        if($request->hasFile('photo'))
        {
            $img=$request->file('photo');
            $file=uniqid().'_'.$img->getClientOriginalName();
            $img->move(public_path('upload/main_category'),$file);

            $image=MainCategory::find($id);
            $image_path=public_path().'/upload/main_category/'.$image->photo;
            if(file_exists($image_path))
            {
                unlink($image_path);
            }

            MainCategory::findOrFail($id)->update([
                'photo'=>$file,
                'name'=>$request->get('name')
            ]);
        }else{
            MainCategory::findOrFail($id)->update([
                'name'=>$request->get('name')
            ]);
        }
        return response()->json([
            'status'=>'success',
            'message'=>'Update Success'
        ]);
    }

    public function destroy($id)
    {
        //MainCategory::destroy($id);

        //return response(['data' => null ], 204);
        $main_cat=MainCategory::find($id);
        unlink(public_path().'/upload/main_category/'.$main_cat->photo);
        $main_cat->delete();

        return response()->json([
            'status'=>'success',
            'message'=>'Delete Success'
        ]);
    }
}
