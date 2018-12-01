<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class SuperadminController extends Controller
{

	public function index(){
    	$this->adminAuthCheck();
    	return view('admin.dashboard');
    }
    public function login(){
    	return view('admin.adminLogin');
    }

    public function logout(){
    	Session::put('admin_name',null);
    	Session::put('admin_id',null);

    	return redirect('/admin/login');
    }

    public function adminAuthCheck(){
    	$admin = Session::get('admin_id');
    	if($admin)
    		return;
    	else
    		return redirect('/admin')->send();
    }
}
