<?php

namespace App\Http\Controllers;
use App\Supplier;
use Illuminate\Http\Request;
use DB;
class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('supplier.add_supplier');
    }

    public function StoreSupplier(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:suppliers|max:255',
            'address' => 'required',
            'photo' => 'required',
            'phone' => 'required|unique:suppliers|max:13',
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
        $data['branch_name'] = $request->branch_name;
        $data['city'] = $request->city;
        $data['type'] = $request->type;
        $image = $request->file('photo');
        //return response()->json($data);

        if ($image) {
            $image_name = hexdec(uniqid(5));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'supplier/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['photo'] = $image_url;
                $suppliers = DB::table('suppliers')->insert($data);
                if ($suppliers) {
                    $notification = array(
                        'message' => 'Successfully Supplier Inserted',
                        'alert-type' => 'success'
                    );
                    return Redirect()->route('all.supplier')->with($notification);
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


    public function AllSupplier()
    {

        $suppliers= Supplier::all();
        //$suppliers=DB::table('employees')->get();

        return view('supplier.all_supplier', compact('suppliers'));
    }

    public function ViewSupplier($id)
    {

        //$employees=Employee::findorfail($id);
        $single = DB::table('suppliers')->where('id', $id)->first();

        //return response()->json($single);
        return view('supplier.view_supplier', compact('single'));
    }


    public function DeleteSupplier($id)
    {

        $single = DB::table('suppliers')->where('id', $id)->first();
        $image = $single->photo;
        //return response()->json($post);
        $delete = DB::table('suppliers')->where('id', $id)->delete();

        if ($delete) {
            unlink($image);
            $notification = array(
                'message' => 'Successfully Supplier Delete',
                'alert-type' => 'success'
            );
            return redirect()->route('all.supplier')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something Went Wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }



    public function EditSupplier($id)
    {

        //$edituser=DB::table('employees')->get();
        $edit = DB::table('suppliers')->where('id', $id)->first();
        return view('supplier.edit_supplier', compact('edit'));
    }


    public function UpdateSupplier(Request $request, $id)
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
        $data['branch_name'] = $request->branch_name;
        $data['city'] = $request->city;
        $data['type'] = $request->type;
        $image = $request->file('photo');

        if ($image) {
            $image_name = hexdec(uniqid(5));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'supplier/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['photo'] = $image_url;
            if ($request->old_photo != NULL) {
                unlink($request->old_photo);
            }


            DB::table('suppliers')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Successfully Supplier updated',
                'alert-type' => 'success'
            );
            return redirect()->route('all.supplier')->with($notification);

        } else {
            $data['photo'] = $request->old_photo;
            DB::table('suppliers')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Successfully Supplier Updated',
                'alert-type' => 'success'
            );
            return redirect()->route('all.supplier')->with($notification);

        }


    }

}
