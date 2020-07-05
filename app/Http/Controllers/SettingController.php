<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Setting()
    {
        $setting=DB::table('settings')->first();
        return view('setting.setting',compact('setting'));
        //return $setting;
    }

    public function UpdateWebsite(Request $request,$id)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|max:255',
            'company_address' => 'required|max:255',
            'company_email' => 'required|max:255',
            'company_phone' => 'required',
            'company_mobile' => 'required',
            'company_city' => 'required',
            'company_country' => 'required',

        ]);

        $data = array();
        $data['company_name'] = $request->company_name;
        $data['company_address'] = $request->company_address;
        $data['company_email'] = $request->company_email;
        $data['company_phone'] = $request->company_phone;
        $data['company_mobile'] = $request->company_mobile;
        $data['company_city'] = $request->company_city;
        $data['company_country'] = $request->company_country;
        $data['company_zipcode'] = $request->company_zipcode;
        $image = $request->company_logo;

        if ($image) {
            $image_name = hexdec(uniqid(5));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'company/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['company_logo'] = $image_url;
            if ($request->company_logo != NULL) {
                unlink($request->company_logo);
            }


            DB::table('settings')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'successfully settings updated',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        } else {
            $data['company_logo'] = $request->old_photo;
            DB::table('settings')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'successfully settings Updated',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }



        return $request->all();
    }

}
