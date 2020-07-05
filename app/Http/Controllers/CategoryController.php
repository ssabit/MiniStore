<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
{
    public function AddCategory()
    {

        return view('category.add_category');
    }

    public function AllCategory()
    {


        $category= DB::table('categories')->get();

        return view('category.all_category',compact('category'));
    }


    public function StoreCategory(Request $request)
    {


        $validatedData = $request->validate([
            'cat_name' => 'required|max:255',

        ]);

        $data = array();
        $data['cat_name'] = $request->cat_name;
        $category= DB::table('categories')->insert($data);

        if ($category) {
            $notification = array(
                'message' => 'Successfully Category Inserted',
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

        return view('category.all_category');
    }

    public function DeleteCategory($id)
    {

        $delete = DB::table('categories')->where('id', $id)->delete();

        if ($delete) {
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

    public function EditCategory($id)
    {

        //$edituser=DB::table('employees')->get();
        $edit = DB::table('categories')->where('id', $id)->first();
        return view('category.edit_category')->with('edit',$edit);
    }


    public function UpdateCategory(Request $request, $id)
    {

        $validatedData = $request->validate([
            'cat_name' => 'required|max:255',

        ]);

        $data = array();
        $data['cat_name'] = $request->cat_name;
        $category= DB::table('categories')->where('id',$id)->update($data);

        if ($category) {
            $notification = array(
                'message' => 'Successfully Category Update',
                'alert-type' => 'success'
            );
            return redirect()->route('all.category')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something Went Wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


    }
}
