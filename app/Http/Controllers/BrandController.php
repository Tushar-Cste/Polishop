<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Brand;
use Session;

class BrandController extends Controller
{
    public function addBrand(){
    	return view('admin.addBrand');
    }

    public function storeBrand(Request $request){
    	$this->adminAuthCheck();
    	$brand = new Brand;
    	$brand->brand_name = $request->brand_name;
    	

    	if($request->hasFile('brand_logo')){
            //get file name with extention
            $filenameWithExt = $request->file('brand_logo')->getClientOriginalName();
            //get only filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get only extention;
            $fileExt = $request->file('brand_logo')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$fileExt;
            $path = $request->file('brand_logo')->storeAs('public/brand_logos',$fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $brand->brand_logo = $fileNameToStore;
        $brand->save();
        return redirect('/addBrand');

    }

    public function allBrand(){
    	$allBrand = Brand::get();
    	return view('admin.allBrand')->with('allBrand',$allBrand);
    }

    public function editBrand($id){
    	$brand = Brand::find($id);
    	return view('admin.editBrand')->with('brand',$brand);
    }

    public function updateBrand(Request $request,$id){
    	$this->adminAuthCheck();
    	$brand = Brand::find($id);
    	$brand->brand_name = $request->brand_name;
    	

    	if($request->hasFile('brand_logo')){
    		if($brand->brand_logo != 'noimage.jpg'){
	            Storage::delete('public/brand_logos/'.$brand->brand_logo);
	        }
            //get file name with extention
            $filenameWithExt = $request->file('brand_logo')->getClientOriginalName();
            //get only filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get only extention;
            $fileExt = $request->file('brand_logo')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$fileExt;
            $path = $request->file('brand_logo')->storeAs('public/brand_logos',$fileNameToStore);
            $brand->brand_logo = $fileNameToStore;
        }
        $brand->save();
        Session::flash('message','Brand is updated');
        return redirect('/allBrand');
    }

    public function delete($id){
    	$brand = Brand::find($id);
    	if($brand->brand_logo != 'noimage.jpg'){
            Storage::delete('public/brand_logos/'.$brand->brand_logo);
        }
        $brand->delete();
        return redirect('/allBrand');
    }

    public function adminAuthCheck(){
    	$admin = Session::get('admin_id');
    	if($admin)
    		return;
    	else
    		return redirect('/admin')->send();
    }
}
