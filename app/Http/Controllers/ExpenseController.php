<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function AddExpense()
    {

        return view('expense.add_expense');
    }


    public function StoreExpense(Request $request)
    {

        $validatedData = $request->validate([
            'details' => 'required|max:255',
            'amount' => 'required|max:30',
            'month' => 'required',
            'date' => 'required',
            'year' => 'required',
        ]);


        $data = array();
        $data['details'] = $request->details;
        $data['amount'] = $request->amount;
        $data['month'] = $request->month;
        $data['date'] = $request->date;
        $data['year'] = $request->year;

        // return response()->json($data);


        $expense = DB::table('expenses')->insert($data);
        if ($expense) {
            $notification = array(
                'message' => 'Successfully Expense Added',
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

    }

    public function TodayExpense(Request $request)
    {

        $date=date("d/m/Y", time() + 86400);

        $today=DB::table('expenses')->where('date',$date)->get();


        //return response()->json($today);


        return view('expense.today_expense',compact('today'));


    }
    public function EditTodayExpense($id)
    {

        //$edituser=DB::table('employees')->get();
        $tdy = DB::table('expenses')->where('id', $id)->first();
        return view('expense.edit_today_expense', compact('tdy'));
    }

    public function UpdateExpense(Request $request, $id)
    {

        $validatedData = $request->validate([
            'details' => 'required|max:255',
            'amount' => 'required|max:30',
            'month' => 'required',
            'date' => 'required',
            'year' => 'required',
        ]);


        $data = array();
        $data['details'] = $request->details;
        $data['amount'] = $request->amount;
        $data['month'] = $request->month;
        $data['date'] = $request->date;
        $data['year'] = $request->year;

        // return response()->json($data);


        $expense = DB::table('expenses')->where('id',$id)->update($data);
        if ($expense) {
            $notification = array(
                'message' => 'Successfully Expense updated',
                'alert-type' => 'success'
            );
            return Redirect()->route('today.expense')->with($notification);
        } else {

            $notification = array(
                'message' => 'error',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }

    }

    public function MonthlyExpense(Request $request)
    {

        $month=date("F");

        $monthExpense=DB::table('expenses')->where('month',$month)->get();


        //return response()->json($today);


        return view('expense.monthly_expense',compact('monthExpense'));


    }

    public function YearlyExpense(Request $request)
    {

        $year=date("Y");

        $yearExpense=DB::table('expenses')->where('year',$year)->get();


        //return response()->json($today);


        return view('expense.yearly_expense',compact('yearExpense'));


    }


    public function JanuaryExpense(Request $request)
    {

        $month="January";

        $monthExpense=DB::table('expenses')->where('month',$month)->get();


        //return response()->json($today);


        return view('expense.monthly_expense',compact('monthExpense'));


    }

    public function FebruaryExpense(Request $request)
    {

        $month="February";

        $monthExpense=DB::table('expenses')->where('month',$month)->get();


        //return response()->json($today);


        return view('expense.monthly_expense',compact('monthExpense'));


    }
    public function MarchExpense(Request $request)
    {

        $month="March";

        $monthExpense=DB::table('expenses')->where('month',$month)->get();


        //return response()->json($today);


        return view('expense.monthly_expense',compact('monthExpense'));


    }
    public function AprilExpense(Request $request)
    {

        $month="April";

        $monthExpense=DB::table('expenses')->where('month',$month)->get();


        //return response()->json($today);


        return view('expense.monthly_expense',compact('monthExpense'));


    }
    public function MayExpense(Request $request)
    {

        $month="May";

        $monthExpense=DB::table('expenses')->where('month',$month)->get();


        //return response()->json($today);


        return view('expense.monthly_expense',compact('monthExpense'));


    }
    public function JuneExpense(Request $request)
    {

        $month="June";

        $monthExpense=DB::table('expenses')->where('month',$month)->get();


        //return response()->json($today);


        return view('expense.monthly_expense',compact('monthExpense'));


    }
    public function JulyExpense(Request $request)
    {

        $month="July";

        $monthExpense=DB::table('expenses')->where('month',$month)->get();


        //return response()->json($today);


        return view('expense.monthly_expense',compact('monthExpense'));


    }
    public function AugustExpense(Request $request)
    {

        $month="August";

        $monthExpense=DB::table('expenses')->where('month',$month)->get();


        //return response()->json($today);


        return view('expense.monthly_expense',compact('monthExpense'));


    }
    public function SeptemberExpense(Request $request)
    {

        $month="September";

        $monthExpense=DB::table('expenses')->where('month',$month)->get();


        //return response()->json($today);


        return view('expense.monthly_expense',compact('monthExpense'));


    }
    public function OctoberExpense(Request $request)
    {

        $month="October";

        $monthExpense=DB::table('expenses')->where('month',$month)->get();


        //return response()->json($today);


        return view('expense.monthly_expense',compact('monthExpense'));


    }
    public function NovembarExpense(Request $request)
    {

        $month="Novembar";

        $monthExpense=DB::table('expenses')->where('month',$month)->get();


        //return response()->json($today);


        return view('expense.monthly_expense',compact('monthExpense'));


    }
    public function DecemberExpense(Request $request)
    {

        $month="December";

        $monthExpense=DB::table('expenses')->where('month',$month)->get();


        //return response()->json($today);


        return view('expense.monthly_expense',compact('monthExpense'));


    }


}
