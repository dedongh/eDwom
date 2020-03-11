<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //

    public function index()
    {
        $all_published_product = DB::table('tbl_products')
            ->join('tbl_category', 'tbl_products.category_id','=', 'tbl_category.category_id')
            ->join('tbl_brands','tbl_products.brand_id','=','tbl_brands.brand_id')
            ->select('tbl_products.*','tbl_category.category_name', 'tbl_brands.brand_name')
            ->where('tbl_products.publication_status',1)
            ->limit(9)
            ->get();

        return view('pages.home_content')
            ->with('all_published_product',$all_published_product);
    }

    public function show_product_by_category($category_id)
    {
        $product_by_category = DB::table('tbl_products')
            ->join('tbl_category', 'tbl_products.category_id','=', 'tbl_category.category_id')
            ->join('tbl_brands','tbl_products.brand_id','=','tbl_brands.brand_id')
            ->select('tbl_products.*','tbl_category.category_name', 'tbl_brands.brand_name')
            ->where('tbl_products.publication_status',1)
            ->where('tbl_category.category_id', $category_id)
            ->limit(18)
            ->get();

        return view('pages.product_by_category')
            ->with('product_by_category',$product_by_category);
    }
    public function show_product_by_brand($brand_id)
    {
        $product_by_brand = DB::table('tbl_products')
            ->join('tbl_category', 'tbl_products.category_id','=', 'tbl_category.category_id')
            ->join('tbl_brands','tbl_products.brand_id','=','tbl_brands.brand_id')
            ->select('tbl_products.*','tbl_category.category_name', 'tbl_brands.brand_name')
            ->where('tbl_products.publication_status',1)
            ->where('tbl_brands.brand_id', $brand_id)
            ->limit(18)
            ->get();

        return view('pages.product_by_brand')
            ->with('product_by_brand',$product_by_brand);
    }
}
