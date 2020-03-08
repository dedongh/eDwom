<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();
class BrandController extends Controller
{
    //
    public function index()
    {
        return view('admin.add_brand');
    }

    public function save_brand(Request $request)
    {
        $data = array();
        //$data['brand_id'] = $request->brand_id;
        $data['brand_name'] = $request->brand_name;
        $data['brand_description'] = $request->brand_description;
        $data['publication_status'] = $request->publication_status;

        DB::table('tbl_brands')->insert($data);
        Session::put('message', 'Brand added successfully');

        return Redirect::to('/add-brand');
    }

    public function all_brand()
    {
        $all_brand_info = DB::table('tbl_brands')->get();
        $manage_category = view('admin.all_brands')
            ->with('all_brand_info', $all_brand_info);
        return view('admin_layout')
            ->with('admin.all_brands', $manage_category);
    }

    public function delete_brand($brand_id)
    {
        DB::table('tbl_brands')
            ->where('brand_id', $brand_id)
            ->delete();
        Session::put('message','Brand deleted successfully');
        return Redirect::to('/all-brand');
    }

}
