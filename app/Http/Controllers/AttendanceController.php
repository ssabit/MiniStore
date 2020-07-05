<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Attendance;
class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function TakeAttendance()
    {
        $employee=DB::table('employees')->get();

        return view('attendance.take_attendance',compact('employee'));
    }


    public function InsertAttendance(Request $request)
    {
        //return $request->all();
        $date=$request->att_date;
        $att_date=DB::table('attendances')->where('att_date',$date)->first();

        if($att_date){

            $notification = array(
                'message' => 'Attendance Already taken',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);

        }else{

            foreach ($request->user_id as $id){
                $data[]=[

                    "user_id"=>$id,
                    "attendance"=>$request->attendance[$id],
                    "att_date"=>$request->att_date,
                    "att_year"=>$request->att_year,
                    "month"=>$request->month,
                    "edit_date"=>date("d_m_y")
                ];
            }
            $att=DB::table('attendances')->insert($data);

            if ($att) {
                $notification = array(
                    'message' => 'Successfully A ttendance Inserted',
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



    }

    public function AllAttendance()
    {
        $all_at=DB::table('attendances')->select('edit_date')->groupBy('edit_date')->get();
        return view('attendance.all_attendance',compact('all_at'));
    }


    public function EditAttendance($edit_date)
    {
        $date=DB::table('attendances')->where('edit_date',$edit_date)->first();
        $data=DB::table('attendances')
            ->join('employees','attendances.user_id','employees.id')
            ->select('employees.name','employees.photo','attendances.*')
            ->where('edit_date',$edit_date)->get();
        return view('attendance.edit_attendance',compact('data','date'));

        //$all_at=DB::table('attendances')->select('edit_date',$edit_date)->groupBy('edit_date')->get();
        //return view('all_attendance',compact('all_at'));
    }


    public function UpdateAttendance(Request $request){

        foreach ($request->id as $id) {
            $data = [
                "attendance" => $request->attendance[$id],
                "att_date" => $request->att_date,
                "att_year" => $request->att_year,
                "month" => $request->month

            ];


            $attendances = Attendance::where(['att_date' => $request->att_date, 'id' => $id])->first();
            $attendances->update($data);

        }
        if ($attendances) {
            $notification = array(
                'message' => 'Successfully Attendance Updated',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.attendance')->with($notification);
        } else {

            $notification = array(
                'message' => 'error',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }

        //return response()->json($attendances);

    }



    public function ViewAttendance($edit_date)
    {


        $date=DB::table('attendances')->where('edit_date',$edit_date)->first();
        $data=DB::table('attendances')
            ->join('employees','attendances.user_id','employees.id')
            ->select('employees.name','employees.photo','attendances.*')
            ->where('edit_date',$edit_date)->get();
        return view('attendance.view_attendance',compact('data','date'));


    }

}
