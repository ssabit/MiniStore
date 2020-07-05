<?php

namespace App\Http\Controllers;


//use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Cart;
use DB;
class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $data=array();
        $data['id']=$request->id;
        $data['name']=$request->name;
        $data['qty']=$request->qty;
        $data['price']=$request->price;
        $data['weight']=$request->weight;
        $add=Cart::add($data);


        //return response()->json($add);

        if ($add) {
            $notification = array(
                'message' => 'Product Added to Cart',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Something Went Wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }



    public function CartUpdate(Request $request,$rowId){

        $qty=$request->qty;
        $update=Cart::update($rowId, $qty);

        if ($update) {
            $notification = array(
                'message' => 'Update Success',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Something Went Wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


    }



    public function CartRemove($rowId){

        $remove=Cart::remove($rowId);

        if ($remove) {
            $notification = array(
                'message' => 'Remove Success',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Something Went Wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


    }


    public function  CreateInvoice(Request $request){

        $validatedData = $request->validate([
            'cus_id' => 'required',
        ],
            [
                'cus_id.required' =>'Select A Customer First'

            ]);

        $cus_id=$request->cus_id;

        $customer=DB::table('customers')->where('id',$cus_id)->first();

        $content=Cart::content();

        //return response()->json($content);
        return view('order.invoice',compact('customer','content'));

    }

    public function FinalInvoice(Request $request){

        $data=array();
        $data['customer_id']=$request->customer_id;
        $data['order_date']=$request->order_date;
        $data['order_status']=$request->order_status;
        $data['total_products']=$request->total_products;
        $data['sub_total']=$request->sub_total;
        $data['payment_status']=$request->payment_status;
        $data['vat']=$request->vat;
        $data['total']=$request->total;
        $data['pay']=$request->pay;
        $data['due']=$request->due;


        $order_id=DB::table('orders')->insertGetId($data);
        $contents=Cart::content();
        $order_data=array();
        foreach ($contents as $content) {
            $order_data['order_id']=$order_id;
            $order_data['product_id']=$content->id;
            $order_data['quantity']=$content->qty;
            $order_data['unitcost']=$content->price;
            $order_data['total']=$content->total;

            $insert=DB::table('orderdetails')->insert($order_data);

        }


        if ($insert) {
            $notification = array(
                'message' => 'Successfuly Invoice Createad',
                'alert-type' => 'success'
            );
            Cart::destroy();
            return redirect()->route('pending.orders')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something Went Wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


        // return response()->json($data);


    }

}
