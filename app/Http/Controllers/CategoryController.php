<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    //
    public function index()
    {
        return view('admin.add_category');
    }

    public function all_category()
    {
        $all_category_info = DB::table('tbl_category')->get();
        $manage_category = view('admin.all_category')
            ->with('all_category_info', $all_category_info);
        return view('admin_layout')
            ->with('admin.all_category', $manage_category);
    }

    public function save_category(Request $request)
    {
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;

        DB::table('tbl_category')->insert($data);
        Session::put('message', 'Category added successfully');

        return Redirect::to('/add-category');
    }

    public function unactive_category($category_id)
    {
        DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->update(['publication_status'=>0]);
        Session::put('message','Category added to archives');
        return Redirect::to('/all-category');
    }
    public function active_category($category_id)
    {
        DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->update(['publication_status'=>1]);
        Session::put('message','Category removed from archives');
        return Redirect::to('/all-category');
    }

    public function edit_category($category_id)
    {
        $category_info =  DB::table('tbl_category')
        ->where('category_id', $category_id)
        ->first();
        $category_info = view('admin.edit_category')
            ->with('category_info', $category_info);
        return view('admin_layout')
            ->with('admin.edit_category', $category_info);
    }

    public function update_category(Request $request, $category_id)
    {
        $data = array();

        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;

        DB::table('tbl_category')
        ->where('category_id', $category_id)
        ->update($data);

        Session::put('message','Category updated successfully');
        return Redirect::to('/all-category');
    }

    public function delete_category($category_id)
    {
        DB::table('tbl_category')
        ->where('category_id', $category_id)
        ->delete();
        Session::put('message','Category deleted successfully');
        return Redirect::to('/all-category');
    }
}
