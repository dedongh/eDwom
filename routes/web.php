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
