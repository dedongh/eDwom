<?php

use Illuminate\Support\Facades\Route;


// frontend routes
Route::get('/','HomeController@index');


// backend routes
Route::get('/admin','AdminController@index');
