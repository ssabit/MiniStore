<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SalaryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }




    public function PaySalary(){

        $month=date("F",strtotime('-1 month'));
        $salary=DB::table('advance_salaries')
            ->join('employees','advance_salaries.emp_id','employees.id')
            ->select('advance_salaries.*', 'employees.name','employees.salary','employees.photo')
            ->where('month',$month)
            ->get();


        $employee=DB::table('employees')->get();

        //return response()->json($salary);
        return view('salary.pay_salary', compact('employee'));



    }
}
