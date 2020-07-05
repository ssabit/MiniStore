<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use phpDocumentor\Reflection\Types\Compound;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('employee.add_employee');
    }



    public function StoreEmployee(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:employees|max:255',
            'nid_no' => 'required|unique:employees|max:255',
            'address' => 'required',
            'photo' => 'required',
            'phone' => 'required|max:13',
            'salary' => 'required',

        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['experience'] = $request->experience;
        $data['nid_no'] = $request->nid_no;
        $data['salary'] = $request->salary;
        $data['vacation'] = $request->vacation;
        $data['city'] = $request->city;
        $image = $request->file('photo');


        if ($image) {
            $image_name = hexdec(uniqid(5));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'employee/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['photo'] = $image_url;
                $employee = DB::table('employees')->insert($data);
                if ($employee) {
                    $notification = array(
                        'message' => 'Successfully Employee Inserted',
                        'alert-type' => 'success'
                    );
                    return Redirect()->route('home')->with($notification);
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

    public function AllEmployees()
    {

        $employees = Employee::all();
        //$employees=DB::table('employees')->get();

        return view('employee.all_employee', compact('employees'));
    }


    public function ViewEmployee($id)
    {

        //$employees=Employee::findorfail($id);
        $single = DB::table('employees')->where('id', $id)->first();

        //return response()->json($single);
        return view('employee.view_employee', compact('single'));
    }

    public function DeleteEmployee($id)
    {

        $single = DB::table('employees')->where('id', $id)->first();
        $image = $single->photo;
        //return response()->json($post);
        $delete = DB::table('employees')->where('id', $id)->delete();

        if ($delete) {
            unlink($image);
            $notification = array(
                'message' => 'Successfully Employee Delete',
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


    public function EditEmployee($id)
    {

        //$edituser=DB::table('employees')->get();
        $edit = DB::table('employees')->where('id', $id)->first();
        return view('employee.edit_employee', compact('edit'));
    }


    public function UpdateEmployee(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'nid_no' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required|max:13',
            'salary' => 'required',

        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['experience'] = $request->experience;
        $data['nid_no'] = $request->nid_no;
        $data['salary'] = $request->salary;
        $data['vacation'] = $request->vacation;
        $data['city'] = $request->city;
        $image = $request->file('photo');

        if ($image) {
            $image_name = hexdec(uniqid(5));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'employee/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['photo'] = $image_url;
            if ($request->old_photo != NULL) {
                unlink($request->old_photo);
            }


            DB::table('employees')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'successfully employee updated',
                'alert-type' => 'success'
            );
            return redirect()->route('all.employee')->with($notification);

        } else {
            $data['photo'] = $request->old_photo;
            DB::table('employees')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'successfully employees Updated',
                'alert-type' => 'success'
            );
            return redirect()->route('all.employee')->with($notification);

        }


    }


}
