<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use Session;
use DB;

class SubCategoryController extends Controller
{
    public function addSubCategory(){
    	return view('admin.addSubCategory');
    }

    public function storeSubCategory(Request $request){
    	$subcategory = new Subcategory;
    	$subcategory->sub_category_name = $request->sub_category_name;
    	$subcategory->category_id=$request->category_id;
    	$subcategory->publication_status=$request->publication_status;
    	$subcategory->sub_category_description=$request->sub_category_description;
    	$subcategory->save();
    	Session::get('message','A new subcategory is saved');
    	return redirect('/addSubCategory');
    }

    public function allsubCategory(){
        $this->adminAuthCheck();
        $allSubCategory = SubCategory::all();
        /*$manage_category = view('admin.allSubCategory')->with('allSubCategory',
        	$allSubCategory);*/
    	return view('admin.allSubCategory')->with('allSubCategory',$allSubCategory);
        //return view('admin_layout')->with('Category',$manage_category);
    }

    public function unactive_subcategory($category_id){
        $subcategory = SubCategory::find($category_id);
        $subcategory->publication_status = 0;
        $subcategory->save();
        Session::put('message','Sub-Category is unactivated successfully');
        return redirect('/allSubCategory');

    }

    public function active_subcategory($category_id){
        $subcategory = SubCategory::find($category_id);
        $subcategory->publication_status = 1;
        $subcategory->save();
        Session::put('message','Sub-Category is activated successfully');
        return redirect('/allSubCategory');

    }

    public function edit_subcategory($category_id){
        $this->adminAuthCheck();
        $subcategory = SubCategory::find($category_id);
        return view('admin.editSubCategory')->with('subcategory',$subcategory);
    }

    public function update_subcategory(Request $request,$category_id){
        $this->adminAuthCheck();
        $subcategory = SubCategory::find($category_id);
        


    	$subcategory->sub_category_name = $request->sub_category_name;
    	$subcategory->category_id=$request->category_id;
    	if(!$request->publication_status)
    		$subcategory->publication_status=0;
    	else
    		$subcategory->publication_status=$request->publication_status;
    	$subcategory->sub_category_description=$request->sub_category_description;
    	$subcategory->save();
    	
        Session::put('message','Category is updated successfully');
        return redirect('/allSubCategory');
    }

    public function delete_subcategory($category_id){
        $this->adminAuthCheck();
        $subcategory = SubCategory::find($category_id);
        $subcategory->delete();
        Session::put('message','Sub-Category is deleted successfully');
        return redirect('/allSubCategory');
    }

    public function adminAuthCheck(){
        $admin = Session::get('admin_id');
        if($admin)
            return;
        else
            return redirect('/admin/login')->send();
    }
}
