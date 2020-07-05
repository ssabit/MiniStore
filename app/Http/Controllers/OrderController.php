<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function PendingOrder()
    {
        $pending=DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.name','orders.*')
            ->where('order_status','pending')->get();

        //return response()->json($pending);

        return view('order.pending_order',compact('pending'));


    }

    public function ViewOrder($id){


        $order=DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.*','orders.*')
            ->where('orders.id',$id)
            ->first();


        $order_details=DB::table('orderdetails')
            ->join('products','orderdetails.product_id','products.id')
            ->select('orderdetails.*','products.product_name','products.product_code')
            ->where('order_id',$id)->get();
        //return response()->json($order);
        return view('order.order_confirmation',compact('order','order_details'));

    }

    public function SuccessOrder(){

        $success=DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.name','orders.*')
            ->where('order_status','success')->get();

        //return response()->json($pending);

        return view('order.success_order',compact('success'));


    }

}
