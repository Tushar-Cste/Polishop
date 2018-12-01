<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Session;

class AdminController extends Controller
{
    public function dashboardIndex(Request $request){
    	$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);
    	$result = Admin::where('admin_email','=',$admin_email)
    						->where('admin_password','=',$admin_password)
    						->first();
    	if($result){
    		Session::put('admin_name',$result->admin_name);
    		Session::put('admin_id',$result->id);
    		return redirect('/dashboard');
    	}
    	//print_r($result);

    	
    }
}
