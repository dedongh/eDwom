<?php

use Illuminate\Support\Facades\Route;


// frontend routes
Route::get('/','HomeController@index');


// backend routes
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
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

