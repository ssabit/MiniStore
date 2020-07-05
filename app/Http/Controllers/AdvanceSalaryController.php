<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdvanceSalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function AddAdvanceSalary()
    {

        return view('salary.advance_salary');
    }

    public function AllSalary()
    {

        //$salary= Supplier::all();
        $salary=DB::table('advance_salaries')
            ->join('employees','advance_salaries.emp_id','employees.id')
            ->select('advance_salaries.*', 'employees.name','employees.salary','employees.photo')
            ->orderBy('id','DESC')
            ->get();


        //return response()->json($salary);
        return view('salary.all_advance_salary', compact('salary'));
    }

    public function StoreAdvanceSalary(Request $request)
    {

        $validatedData = $request->validate([
            'emp_id' => 'required|max:255',
            'month' => 'required|max:30',
            'advanced_salary' => 'required',
            'year' => 'required',


        ]);

        $month=$request->month;
        $empid=$request->emp_id;

        $advance= DB::table('advance_salaries')
            ->where('month',$month)
            ->where('emp_id',$empid)
            ->first();

        if($advance===NULL){
            $data = array();
            $data['emp_id'] = $request->emp_id;
            $data['month'] = $request->month;
            $data['advanced_salary'] = $request->advanced_salary;
            $data['year'] = $request->year;
            //return response()->json($data);


            $advance_salary = DB::table('advance_salaries')->insert($data);


            if ($advance_salary) {
                $notification = array(
                    'message' => 'Successfully Advance Paid',
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
        }else{
            $notification = array(
                'message' => 'All ready paid in this month',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }

    }
}
