<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\Http\Controllers\CustomClass\UserData;

class UserController extends Controller
{
    public function index()
    {
        $users = Customer::latest()->get();
        $obj=new UserData();
        $users_arr=$obj->format($users);
        // return $users_arr;

        return response(['data' => $users_arr ], 200);
        // return 'hello.......';
    }

    /*public function store(UserRequest $request)
    {
        $user = User::create($request->all());

        return response(['data' => $user ], 201);

    }*/

    public function show($id)
    {
        /*$user = User::findOrFail($id);

        return response(['data', $user ], 200);*/
        $obj=new UserData();
        $user=$obj->detail($id);
        return response()->json([
            'data'=>$user
        ]);
    }

    public function update(UserRequest $request, $id)
    {
        //$customer_id=User::findOrFail($id)->update($request->all())->customer_id;
        Customer::findOrFail($id)->update([
            'name'=>$request->get('name'),
            'phone'=>$request->get('phone'),
            'address'=>$request->get('address'),
            'township_id'=>$request->get('township_id')
        ]);

        User::where('customer_id',$id)->update([
            'email'=>$request->get('email')
        ]);
        //return response(['data' => $user ], 200);
        return [
            'status'=>'success',
            'message'=>'Update Success'
        ];
    }

    public function destroy($id)
    {
        /*User::destroy($id);

        return response(['data' => null ], 204);*/
        $customer=Customer::find($id);
        $user=User::where('customer_id',$id);
        $customer->delete();
        $user->delete();

        return response()->json([
            'status'=>'success',
            'message'=>'Delete Success'
        ]);

    }
}
