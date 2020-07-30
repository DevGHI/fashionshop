<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CustomClass\OrderData;
use App\Http\Requests\OrderRequest;
use App\Order;
use App\Payment;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\User;
use App\OrderProduct;
use App\Http\Controllers\CustomClass\ProductData;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\CustomClass\Helper;


class OrderController extends Controller
{
    public function index(Request $request)
    {
        if(empty($request->get('status'))){
            $status='pending';
        }
        else{
            $status=$request->get('status');
        }
        $orders = Order::where('status',$status)->orderBy('id','desc')->get();
        $obj=new OrderData();
        $order_arr=$obj->format($orders);

        return response(['data' => $order_arr ], 200);
        //$orders['products']=$orders->products;

        //return response(['data' => $orders ], 200);
    }

    public function store(OrderRequest $request)
    {
        /*$user=Auth::user();
        return [
            'customer id'=>$user
            ];*/

        $this->validate($request,[
            'township_id'=>'required',
            'receive_date'=>'required',
            'receive_time'=>'required',
            'address'=>'required',
            'user_id'=>'required',
            //'order_id'=>'required',
            'product_id'=>'required',
            'quantity'=>'required'
        ]);

        $order_id=Order::create([
            'township_id'=>$request->get('township_id'),
            'receive_date'=>$request->get('receive_date'),
            'receive_time'=>$request->get('receive_time'),
            'address'=>$request->get('address'),
            'user_id'=>$request->get('user_id')
        ])->id;

        Payment::create([
            'order_id'=>$order_id,
            'type'=>$request->get('type')
        ]);

        //return response(['data' => $order ], 201);

        $product=$request->get('product_id');
        $quantity=$request->get('quantity');
        $count=count($product);
        for($i=0;$i<$count;$i++)
        {
            $product_result=$product[$i];
            $quantity_result=$quantity[$i];
            //echo $result."<br>";
            OrderProduct::create([
                'order_id'=>$order_id,
                'product_id'=>$product_result,
                //'quantity'=>$request->get('quantity')
                'quantity'=>$quantity_result
            ]);
        }
        $obj=new OrderData();
        if($request->has('web')){
            return view('user.message')->with([
                'message'=>'Order Sccess!.',
                'categories'=>Helper::getCategory(),

            ]);
        }
        return response()->json([
            'status'=>'success',
            'message'=>'Insert Success',
            'data'=>$obj->detail($order_id)
        ]);

    }

    public function show($id)
    {
       $obj=new OrderData();
       $data=$obj->detail($id);
        return response(['Order', $data ], 200);
    }

    public function update(OrderRequest $request, $id)
    {
        Order::findOrFail($id)->update($request->all());

        return [
            'status'=>'success',
            'message'=>'Update Success'
        ];

        //$order->update($request->all());

        //return response(['data' => $order ], 200);
    }

    public function destroy($id)
    {
        $order=Order::find($id);
        //return $order;
        $product=OrderProduct::where('order_id',$id);
        //return $product;
        $order->delete();
        $product->delete();

        // //return response(['data' => null ], 204);
        return [
            'status'=>'success',
            'message'=>'Delete Success'
        ];
    }

    public function order_report(Request $request){
        $start_date=$request->get('start_date');
        $end_date=$request->get('end_date');
        $status=$request->get('status');
        $products=DB::select("SELECT products.*,SUM(order_products.quantity) as TotalQty,products.price*SUM(order_products.quantity) as TotalAmount
                                    FROM orders,order_products,products
                                    WHERE orders.created_at>='$start_date'
                                    AND orders.created_at<='$end_date'
                                    AND orders.status='pending'
                                    AND orders.id=order_products.order_id
                                    AND order_products.product_id=products.id
                                    GROUP BY products.id");
        return response(['data' => $products ], 200);
    }
    
    public function user_report(Request $request){
        $date=$request->get('date');
        $township_id=$request->get('township_id');
        $status=$request->get('status');
        $data=DB::select("SELECT orders.id as order_id,customers.*,townships.name as township_name
                        FROM orders,users,customers,townships
                        WHERE DATE(orders.created_at)='$date'
                        AND orders.status='$status'
                        AND orders.user_id=users.id
                        AND users.customer_id=customers.id
                        AND customers.township_id='$township_id'
                        AND customers.township_id=townships.id");
        return response(['data' => $data ], 200);
    }


}
