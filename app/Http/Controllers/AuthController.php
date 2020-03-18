<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //

    public function index()
    {
        return view('pages.login');
    }

    public function register_user(Request $request)
    {
        $data = array();

        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['password'] = md5($request->password);
        $data['phone'] = $request->phone_number;

        $customer_id = DB::table('tbl_customers')
            ->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);

        return Redirect::to('/');
    }

    public function login_user(Request $request)
    {
        $user_email = $request->user_email;
        $user_password = md5($request->user_password);
        $result = DB::table('tbl_customers')
            ->where('customer_email', $user_email)
            ->where('password', $user_password)
            ->first();

        if ($result) {
            Session::put('customer_id', $result->customer_id);
            return Redirect::to('/');
        } else {
           return Redirect::to('/login');
        }


    }


    public function logout()
    {
        Session::flush();
        return Redirect::to('/');
    }
}
