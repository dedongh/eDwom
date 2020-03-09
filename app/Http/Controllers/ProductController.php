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
}
