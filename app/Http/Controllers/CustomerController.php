<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use DB;
class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        return view('customer.add_customer');
    }


    public function StoreCustomer(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:customers|max:255',
            'address' => 'required',
            'photo' => 'required',
            'phone' => 'required|max:13',
            'city' => 'required',

        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['shopname'] = $request->shopname;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->back_branch;
        $data['city'] = $request->city;
        $image = $request->file('photo');
        //return response()->json($data);

        if ($image) {
            $image_name = hexdec(uniqid(5));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'customer/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['photo'] = $image_url;
                $customers = DB::table('customers')->insert($data);
                if ($customers) {
                    $notification = array(
                        'message' => 'Successfully Customer Inserted',
                        'alert-type' => 'success'
                    );
                    return Redirect()->back()->with($notification);
                } else {

                    $notification = array(
                        'message' => 'error',
                        'alert-type' => 'success'
                    );
                    return Redirect()->back()->with($notification);
                }


            } else {
                return Redirect()->back();
            }
        } else {
            return Redirect()->back();
        }

        //die(print_r($data));
        //return view('home');
        // return response()->json($data);
        //return view('add_employee');
    }


    public function AllCustomer()
    {

        $customers = Customer::all();
        //$employees=DB::table('employees')->get();

        return view('customer.all_customer', compact('customers'));
    }

    public function ViewCustomer($id)
    {

        //$employees=Employee::findorfail($id);
        $single = DB::table('customers')->where('id', $id)->first();

        //return response()->json($single);
        return view('customer.view_customer', compact('single'));
    }



    public function DeleteCustomer($id)
    {

        $single = DB::table('customers')->where('id', $id)->first();
        $image = $single->photo;
        //return response()->json($post);
        $delete = DB::table('customers')->where('id', $id)->delete();

        if ($delete) {
            unlink($image);
            $notification = array(
                'message' => 'Successfully Customer Delete',
                'alert-type' => 'success'
            );
            return redirect()->route('all.customer')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something Went Wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function EditCustomer($id)
    {

        //$edituser=DB::table('employees')->get();
        $edit = DB::table('customers')->where('id', $id)->first();
        return view('customer.edit_customer', compact('edit'));
    }



    public function UpdateCustomer(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required|max:13',
            'city' => 'required',

        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['shopname'] = $request->shopname;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->back_branch;
        $data['city'] = $request->city;
        $image = $request->file('photo');

        if ($image) {
            $image_name = hexdec(uniqid(5));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'customer/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['photo'] = $image_url;
            if ($request->old_photo != NULL) {
                unlink($request->old_photo);
            }


            DB::table('customers')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Successfully Customer updated',
                'alert-type' => 'success'
            );
            return redirect()->route('all.customer')->with($notification);

        } else {
            $data['photo'] = $request->old_photo;
            DB::table('customers')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Successfully Customer Updated',
                'alert-type' => 'success'
            );
            return redirect()->route('all.customer')->with($notification);

        }


    }

}
