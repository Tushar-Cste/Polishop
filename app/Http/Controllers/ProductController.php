<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Product;

class ProductController extends Controller
{
    public function addProduct(){
    	$this->adminAuthCheck();
    	return view('admin.addProduct');
    }

    public function storeProduct(Request $request){
    	$this->adminAuthCheck();
    	$product = new Product;
    	$product->product_name = $request->product_name;
    	$product->category_id = $request->category_id;
    	$product->subcategory_id = $request->sub_category_id;
    	$product->product_description = $request->product_description;
    	$product->product_price=$request->product_price;
    	$product->product_size = $request->product_size;
    	$product->product_color = $request->product_color;
    	$product->publication_status = 1;
        $product->priority = $request->priority;
        $product->no_of_sold = 0;

    	if($request->hasFile('product_image')){
            //get file name with extention
            $filenameWithExt = $request->file('product_image')->getClientOriginalName();
            //get only filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get only extention;
            $fileExt = $request->file('product_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$fileExt;
            $path = $request->file('product_image')->storeAs('public/product_images',$fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $product->product_image = $fileNameToStore;
        $product->save();
        return redirect('/addProduct');

    }

    public function allProduct(){
    	$this->adminAuthCheck();
    	$all_product = Product::all();

    	return view('admin.allProduct')->with('all_product',$all_product);  
    }

     public function unactive_product($product_id){
    	$product = Product::find($product_id);
    	$product->publication_status = 0;
    	$product->save();
    	Session::put('message','Product is unactivated');
    	return redirect('/allProduct');
    }

    public function active_product($product_id){
    	$product = Product::find($product_id);
    	$product->publication_status = 1;
    	$product->save();
    	Session::put('message','Product is activated');
    	return redirect('/allProduct');
    }

    public function changePriority(Request $request,$id){
        $product = Product::find($id);
        $product->priority = $request->priority;
        $product->save();
        return redirect('/allProduct');
    }
    public function editproduct($product_id){
    	$this->adminAuthCheck();
    	$product = Product::find($product_id);
    	return view('admin.editProduct')->with('product',$product);
    }

    public function updateProduct(Request $request,$product_id){
     	$this->adminAuthCheck();
    	$product =Product::find($product_id);
    	$product->product_name = $request->product_name;
    	$product->category_id = $request->category_id;
    	$product->subcategory_id = $request->sub_category_id;
    	$product->product_description = $request->product_description;
    	$product->product_price=$request->product_price;
    	$product->product_size = $request->product_size;
    	$product->product_color = $request->product_color;
    	$product->publication_status = $request->publication_status;
        $product->priority = $request->priority;

    	if($request->hasFile('product_image')){
    		if($product->product_image != 'noimage.jpg'){
	    		storage::delete('public/product_images/'.$product->product_image);
	    	}
            //get file name with extention
            $filenameWithExt = $request->file('product_image')->getClientOriginalName();
            //get only filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get only extention;
            $fileExt = $request->file('product_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$fileExt;
            $path = $request->file('product_image')->storeAs('public/product_images',$fileNameToStore);
            $product->product_image = $fileNameToStore;
        }

        
        $product->save();
        Session::put('message','Product is updated');
        return redirect('/allProduct');

    }

    public function deleteproduct($product_id){
    	$this->adminAuthCheck();
    	$product = Product::find($product_id);
    	if($product->product_image != 'noimage.jpg'){
            Storage::delete('public/product_images/'.$product->product_image);
        }
        $product->delete();
        return redirect('/allProduct');
    }

    public function adminAuthCheck(){
    	$admin = Session::get('admin_id');
    	if($admin)
    		return;
    	else
    		return redirect('/admin')->send();
    }
}
