<?php

use Illuminate\Support\Facades\Route;


/*************************
 * frontend routes       *
 *                       *
 * ***********************/
Route::get('/','HomeController@index');

// show product by category
Route::get('/show_product_by_category/{category_id}','HomeController@show_product_by_category');
// show product by brand
Route::get('/show_product_by_brand/{brand_id}','HomeController@show_product_by_brand');
// product details by ID
Route::get('/view_product/{product_id}', 'HomeController@view_product');
// add to cart
Route::post('/add-to-cart', 'CartController@add_to_cart');
// show cart
Route::get('/show-cart', 'CartController@show_cart');
// delete cart
Route::get('/delete-cart/{id}', 'CartController@delete_cart');
// update quantity
Route::get('/update-qty-up/{id}/{quantity}', 'CartController@update_qty_up');
Route::get('/update-qty-down/{id}/{quantity}', 'CartController@update_qty_down');

// login
Route::get('/login','AuthController@index');
Route::get('/user-logout','AuthController@logout');
Route::post('/register-user', 'AuthController@register_user');
Route::post('/login-user', 'AuthController@login_user');


/*************************
 *  backend routes       *
 *                       *
 * ***********************/
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin-dashboard','AdminController@dashboard');

//category routes
Route::get('/add-category','CategoryController@index');
Route::get('/all-category','CategoryController@all_category');
Route::post('/save-category','CategoryController@save_category');
Route::get('/unactive_category/{category_id}','CategoryController@unactive_category');
Route::get('/active_category/{category_id}','CategoryController@active_category');
Route::get('/edit-category/{category_id}','CategoryController@edit_category');
Route::post('/update-category/{category_id}','CategoryController@update_category');
Route::get('/delete-category/{category_id}','CategoryController@delete_category');

//brands route
Route::get('/add-brand','BrandController@index');
Route::post('/save-brand','BrandController@save_brand');
Route::get('/all-brand','BrandController@all_brand');
Route::get('/delete-brand/{brand_id}','BrandController@delete_brand');
Route::get('/unactive_brand/{brand_id}','BrandController@unactive_brand');
Route::get('/active_brand/{brand_id}','BrandController@active_brand');
Route::get('/edit-brand/{brand_id}','BrandController@edit_brand');
Route::post('/update-brand/{brand_id}','BrandController@update_brand');

//product route
Route::get('/add-product','ProductController@index');
Route::post('/save-product','ProductController@save_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/unactive_product/{product_id}','ProductController@unactive_product');
Route::get('/active_product/{product_id}','ProductController@active_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::post('/update-product/{product_id}','ProductController@update_product');

// slider routes
Route::get('/add-slider','SliderController@index');
Route::get('/all-slider','SliderController@all_slider');
Route::post('/save-slider','SliderController@save_slider');
Route::get('/unactive_slider/{slider_id}','SliderController@unactive_slider');
Route::get('/active_slider/{slider_id}','SliderController@active_slider');
Route::get('/delete-slider/{slider_id}','SliderController@delete_slider');
