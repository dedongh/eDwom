<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SuperAdminController extends Controller
{

    public function index()
    {
        $this->AdminAuthCheck();
        return view('admin.dashboard');
    }
    //
    public function logout()
    {
        Session::flush();
        return Redirect::to('/admin');
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
