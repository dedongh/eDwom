<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    //

    public function add_to_cart(Request $request)
    {
        $product_id = $request->product_id;
        $quantity = $request->qty;
        $product_info = DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->first();


        $data['id'] = $product_info->product_id;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['quantity'] = $quantity;
        $data['attributes']['image'] = $product_info->product_image;


        //$options = $request->except('_token', 'product_id', 'price', 'qty');
        $options['image'] = $product_info->product_image;

        \Cart::add($data);


        return Redirect::to('/show-cart');
    }

    public function show_cart()
    {
        $all_published_cart = DB::table('tbl_category')
            ->where('publication_status', 1)
            ->get();
        return view('pages.cart')->with('all_published_cart', $all_published_cart);
    }
}
