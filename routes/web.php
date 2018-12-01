<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/
/*Route::get('/sample',function(){
	return view('sample');
});

Route::post('/',function(){
	return "tushar";
});*/

/*
	Route for frontend
*/
Route::get('/','FrontController@index');
Route::get('/contactUs','FrontController@contactUs');
Route::post('/contact','FrontController@postContact');

//Route to subCategory wise product

Route::get('/subcategoryProduct/{id}','FrontController@subcategoryProduct');
//show with a range
Route::post('/rangeProduct/{id}','FrontController@rangeProduct');
Route::get('/rangeProduct/{id}','FrontController@rangePr');
Route::get('/showRangeProduct/{product}','FrontController@showRangeProduct');
//show with sort
Route::post('/sortProduct/{id}','FrontController@sortProduct');
Route::get('/sortby/{id}','FrontController@sortBy');


/*
	Route for backend

*/

Route::get('/admin/login','SuperadminController@login');

Route::post('/dashboardIndex','AdminController@dashboardIndex');
Route::get('/dashboard','SuperadminController@index');
Route::get('/logout','SuperadminController@logout');

//Route for category

Route::get('/addCategory','CategoryController@index');
Route::get('/allCategory','CategoryController@allCategory');
Route::post('/storeCategory','CategoryController@storeCategory');
Route::get('/unactive_category/{category_id}','CategoryController@unactive_category');
Route::get('/active_category/{category_id}','CategoryController@active_category');
Route::get('/editCategory/{category_id}','CategoryController@edit_category');
Route::post('/updateCategory/{category_id}','CategoryController@update_category');
Route::get('/deleteCategory/{category_id}','CategoryController@delete_category');

//Route for sub category

Route::get('/addSubCategory','SubCategoryController@addSubCategory');
Route::post('/storeSubCategory','SubCategoryController@storeSubCategory');
Route::get('/allSubCategory','SubCategoryController@allSubCategory');
Route::get('/unactive_subcategory/{category_id}','SubCategoryController@unactive_subcategory');
Route::get('/active_subcategory/{category_id}','SubCategoryController@active_subcategory');
Route::get('/editSubCategory/{category_id}','SubCategoryController@edit_subcategory');
Route::post('/updateSubCategory/{category_id}','SubCategoryController@update_subcategory');
Route::get('/deleteSubCategory/{category_id}','SubCategoryController@delete_subcategory');

//routes for product

Route::get('/addProduct','ProductController@addProduct');
Route::post('/storeProduct','ProductController@storeProduct');
Route::get('/allProduct','ProductController@allProduct');
Route::get('/unactive_product/{product_id}','ProductController@unactive_product');
Route::get('/active_product/{product_id}','ProductController@active_product');
Route::get('/editproduct/{product_id}','ProductController@editproduct');
Route::post('/updateProduct/{product_id}','ProductController@updateProduct');
Route::get('/deleteproduct/{product_id}','ProductController@deleteproduct');

//routes for brand

Route::get('/addBrand','BrandController@addBrand');
Route::post('/storeBrand','BrandController@storeBrand');
Route::get('/allBrand','BrandController@allBrand');
Route::get('/editbrand/{id}','BrandController@editBrand');
Route::post('/updateBrand/{id}','BrandController@updateBrand');
Route::get('/deletebrand/{id}','BrandController@deleteBrand');