<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

session_start();
class SliderController extends Controller
{
    //
    public function index()
    {
        $this->AdminAuthCheck();
        return view('admin.add_slider');
    }

    public function save_slider(Request $request)
    {
        $data = array();
        $data['publication_status'] = $request->publication_status;

        $product_image = $request->file('slider_image');

        if ($product_image) {
            $image_name = Str::random(20);
            $ext = strtolower($product_image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'slider_images/';
            $image_url = $upload_path . $image_full_name;
            $success = $product_image->move($upload_path, $image_full_name);
            if ($success) {
                $data['slider_image'] = $image_url;

                DB::table('tbl_slider')->insert($data);
                Session::put('message', 'Slider added successfully');
                return Redirect::to('/add-slider');
            }
        } else {
            Session::put('error_message', 'Please select image');
            return Redirect::to('/add-slider');
        }
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
