<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Brand;
use App\Product;
use Session;


class FrontController extends Controller
{
    public function index(){
        $allbrand = Brand::limit('5')->get();
    	return view('frontend.index')->with('allbrand',$allbrand);
    }

    public function contactUs(){
    	return view('frontend.contact_us');
    }

    public function postContact(Request $request){
    	
    	$data = [
    		'email'=>$request->email,
    		'subject'=>$request->subject,
    		'bodyMessage'=>$request->message
    	];

    	Mail::send('email.contact',$data, function($message) use($data){
    		$message->from($data['email']);
    		$message->to('mollahasan512@gmail.com');
    		$message->subject($data['subject']);
    	});

    	return redirect('/');
    }

    //for category based product
    public function subcategoryProduct($id){
        $allproducts = Product::where('subcategory_id',$id)
                                ->paginate('2');
        return view('frontend.categoryProduct')->with('allProducts',$allproducts)->with('id',$id);
    }

    

    //product with a range
    public function rangeProduct(Request $request, $id){
        if($request->priceRanger == 1){
            $min = 0; $max = 100;
        }
        else if($request->priceRanger == 2){
            $min = 100; $max = 500;
        }
        else if($request->priceRanger == 3){
            $min = 500; $max = 1000;
        }
        else{
            $min = 1000; $max = 5000;
        }
        Session::put('min',$min);
        Session::put('max',$max);
       return redirect('/rangeProduct/'.$id);

                               
        //return view('frontend.categoryProduct')->with('allProducts',$allproducts)->with('id',$id);
        
    }
    public function rangePr($id){
        //for range
        $min = Session::get('min');
        $max = Session::get('max');
        $products = Product::where('subcategory_id',$id)
                                ->where('product_price','>=',$min)
                                ->where('product_price','<=',$max)
                                ->paginate('5');


        return view('frontend.categoryProduct')->with('allProducts',$products)->with('id',$id);
    }

    public function sortBy($id){

        $sort = Session::get('sort');
        if($sort == 1){
            $allproducts = Product::where('subcategory_id',$id)
                                    ->orderBy('product_name','ASC')
                                    ->paginate('5');
        }

        if($sort == 2){
            $allproducts = Product::where('subcategory_id',$id)
                                    ->orderBy('product_name','DESC')
                                    ->paginate('5');
        }

        else if($sort == 3){
            $allproducts = Product::where('subcategory_id',$id)
                                    ->orderBy('product_price','ASC')
                                    ->paginate('5');
        }

        else if($sort == 4){
            $allproducts = Product::where('subcategory_id',$id)
                                    ->orderBy('product_price','DESC')
                                    ->paginate('5');
        }

        return view('frontend.categoryProduct')->with('allProducts',$allproducts)->with('id',$id);

    }

    // show product with sort

    public function sortProduct(Request $request,$id){
        Session::put('sort',$request->sort);
        
        return redirect('/sortby/'.$id);
    }
}
