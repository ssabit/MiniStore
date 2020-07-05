<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use Illuminate\Http\Request;
use DB;

class PosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        //Product::al();
        $product=DB::table('products')
            ->join('categories','products.cat_id','categories.id')
            ->select('categories.cat_name','products.*')
            ->get();

        //Customer::al();
        $customer=DB::table('customers')->get();

        $categorie=DB::table('categories')->get();

        return view('pos',compact('product','customer','categorie'));
    }


    public function PosDone($id){
        //return response()->json($id);

        $approve=DB::table('orders')->where('id',$id)->update(['order_status'=>'success']);
        //return response()->json($id);

        if ($approve){
            $notification = array(
                'message' => 'Successfully Order Confirmed! All Products Delivered',
                'alert-type' => 'success'
            );
            return redirect()->route('pending.orders')->with($notification);

        } else {
            $notification = array(
                'message' => 'Something Went Wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

        }
    }

}
