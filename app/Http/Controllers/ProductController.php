<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

session_start();
class ProductController extends Controller
{

    //
    public function index()
    {
        $this->AdminAuthCheck();
        return view('admin.add_product');
    }

    public function save_product(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_short_description'] = $request->product_short_description;
        $data['product_long_description'] = $request->product_long_description;
        $data['product_price'] = $request->product_price;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['publication_status'] = $request->publication_status;

        $product_image = $request->file('product_image');

        if ($product_image) {
            $image_name = Str::random(20);
            $ext = strtolower($product_image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'product_images/';
            $image_url = $upload_path . $image_full_name;
            $success = $product_image->move($upload_path, $image_full_name);
            if ($success) {
                $data['product_image'] = $image_url;

                DB::table('tbl_products')->insert($data);
                Session::put('message', 'Product added successfully');
                return Redirect::to('/add-product');
            }
        } else {
            Session::put('error_message', 'Please select image');
            return Redirect::to('/add-product');
        }
    }

    public function all_product()
    {
        $this->AdminAuthCheck();
        $all_product_info = DB::table('tbl_products')
            ->join('tbl_category', 'tbl_products.category_id','=', 'tbl_category.category_id')
            ->join('tbl_brands','tbl_products.brand_id','=','tbl_brands.brand_id')
            ->select('tbl_products.*','tbl_category.category_name', 'tbl_brands.brand_name')
            ->get();

        return view('admin.all_products')->with('all_product_info', $all_product_info);
    }
    public function delete_product($product_id)
    {
        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->delete();
        Session::put('message','Product deleted successfully');
        return Redirect::to('/all-product');
    }

    public function unactive_product($product_id)
    {
        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->update(['publication_status'=>0]);
        Session::put('message','Product added to archives');
        return Redirect::to('/all-product');
    }
    public function active_product($product_id)
    {
        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->update(['publication_status'=>1]);
        Session::put('message','Product removed from archives');
        return Redirect::to('/all-product');
    }

    public function edit_product($product_id)
    {
        $this->AdminAuthCheck();
        $product_info = DB::table('tbl_products')
            ->join('tbl_category', 'tbl_products.category_id','=', 'tbl_category.category_id')
            ->join('tbl_brands','tbl_products.brand_id','=','tbl_brands.brand_id')
            ->select('tbl_products.*','tbl_category.category_name', 'tbl_brands.brand_name')
            ->where('tbl_products.product_id', $product_id)
            ->first();
        return view('admin.edit_product')
            ->with('product_info', $product_info);
    }

    public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return;
        } else {
            return Redirect::to('/admin')->send();
        }
    }

}
