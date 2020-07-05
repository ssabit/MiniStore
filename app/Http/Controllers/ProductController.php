<?php

namespace App\Http\Controllers;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function AddProduct()
    {

        return view('product.add_product');
    }

    public function AllProduct()
    {

        $products=DB::table('products')->get();

        return view('product.all_product', compact('products'));
    }


    public function StoreProduct(Request $request)
    {

        $validatedData = $request->validate([
            'product_name' => 'required|max:255',
            'product_code' => 'required|unique:products|max:30',
            'cat_id' => 'required',
            'sup_id' => 'required',
            'product_garage' => 'required',
            'product_route' => 'required',
            'buying_date' => 'required',
            'exp_date' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'product_image' => 'required',


        ]);


        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['cat_id'] = $request->cat_id;
        $data['sup_id'] = $request->sup_id;
        $data['product_garage'] = $request->product_garage;
        $data['product_route'] = $request->product_route;
        $data['buy_date'] = $request->buying_date;
        $data['exp_date'] = $request->exp_date;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;
        $image = $request->file('product_image');

        //return response()->json($data);
        if ($image) {
            $image_name = hexdec(uniqid(5));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'product/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['product_image'] = $image_url;
                $customers = DB::table('products')->insert($data);
                if ($customers) {
                    $notification = array(
                        'message' => 'Successfully Product Added',
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


    }


    public function DeleteProduct($id)
    {

        $single = DB::table('products')->where('id', $id)->first();
        $image = $single->product_image;
        $delete = DB::table('products')->where('id', $id)->delete();

        if ($delete) {
            unlink($image);
            $notification = array(
                'message' => 'Successfully Product Delete',
                'alert-type' => 'success'
            );
            return redirect()->route('all.product')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something Went Wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }



    public function ViewProduct($id)
    {

        $product=DB::table('products')
            ->join('categories', 'products.cat_id','categories.id')
            ->join('suppliers', 'products.sup_id','suppliers.id')
            ->select('categories.cat_name', 'products.*','suppliers.name')
            ->where('products.id',$id)
            ->first();

        ;

        //return response()->json($product);
        return view('product.view_product', compact('product'));
    }



    public function EditProduct($id)
    {

        //$edituser=DB::table('employees')->get();
        $edit = DB::table('products')->where('id', $id)->first();
        return view('product.edit_product', compact('edit'));
    }


    public function UpdateProduct(Request $request, $id)
    {

        $validatedData = $request->validate([
            'product_name' => 'required|max:255',
            'product_code' => 'required|max:30',
            'cat_id' => 'required',
            'sup_id' => 'required',
            'product_garage' => 'required',
            'product_route' => 'required',
            'buying_date' => 'required',
            'exp_date' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',


        ]);


        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['cat_id'] = $request->cat_id;
        $data['sup_id'] = $request->sup_id;
        $data['product_garage'] = $request->product_garage;
        $data['product_route'] = $request->product_route;
        $data['buy_date'] = $request->buying_date;
        $data['exp_date'] = $request->exp_date;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;
        $image = $request->file('product_image');
        if ($image) {
            $image_name = hexdec(uniqid(5));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'product/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['product_image'] = $image_url;
            if ($request->old_photo != NULL) {
                unlink($request->old_photo);
            }


            DB::table('products')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Successfully Product updated',
                'alert-type' => 'success'
            );
            return redirect()->route('all.product')->with($notification);

        } else {
            $data['product_image'] = $request->old_photo;
            DB::table('products')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Successfully Product Updated',
                'alert-type' => 'success'
            );
            return redirect()->route('all.product')->with($notification);

        }


    }



    public function ImportProduct(){

        return view('product.import_product');

    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'Products.xlsx');
    }


    public function import(Request $request)
    {
        $import=Excel::import(new ProductsImport, $request->file('import_file'));

        if ($import) {
            $notification = array(
                'message' => 'Successfully Product updated',
                'alert-type' => 'success'
            );
            return redirect()->route('all.product')->with($notification);

        } else {
            $notification = array(
                'message' => 'Error Importing File',
                'alert-type' => 'error'
            );
            return redirect()->route('all.product')->with($notification);

        }

    }
}
