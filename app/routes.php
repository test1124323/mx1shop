<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource('main','TopicController');
Route::resource('cartStore','TopicController');

Route::resource('cart','cartController');
Route::get('cancelOrder/{id}','cartController@destroy');

Route::resource('billing','billingController');
Route::resource('billingSave','billingPDFController');
Route::get('How-to-order',function(){
	return View::make('howtoorder');
});

Route::filter('check', function()
{
	if(!Session::has("UserID")){
		return Redirect::to('backoffice/Login');
	}
});
Route::get('/backoffice/', function()
    {
    	return Redirect::to('backoffice/Login');
    });
Route::group(array('before' => 'check'), function(){
			Route::resource('/backoffice/Cate','CateController');
			Route::get('/backoffice/deleteCate/{id}','CateController@destroy');
			Route::resource('/backoffice/catePop','catePopController');


// Route::resuorce('How-to-pay','howtopayController');
			Route::resource('/backoffice/Product','ProductController');
			Route::resource('/backoffice/ProductForm','ProductManageController');
			Route::resource('/backoffice/DropdownCategory','ProductManageController@DropdownCategory');
			Route::resource('/backoffice/ProductPic','ProductPicController@show_product');
			Route::resource('/backoffice/ProductPicManage','ProductPicController');
			Route::resource('/backoffice/UpdateStatusPic','ProductPicController@update_status');
			Route::resource('/backoffice/deletePic','ProductPicController@deletePic');
			Route::resource('/backoffice/ProductEdit','ProductManageController@ShowDataEdit');
			Route::resource('/backoffice/ProductDel','ProductManageController@DeleteData');

			//order
			Route::resource('/backoffice/Order','OrderController');
			Route::resource('/backoffice/confirmOrder','OrderController@confirmOrder');
			Route::resource('/backoffice/Payment','PaymentController');
			//end order
			//user
			Route::resource('/backoffice/User','UserController');
			Route::resource('/backoffice/Customer','UserController@Customer');
			Route::resource('/backoffice/Employee','UserController@Employee');
			//end uder
			//contact
			Route::resource('/backoffice/Topic','TopicManageController');
			//end contact
			
		
});
Route::resource('/backoffice/Login','LoginController');
Route::resource('/backoffice/Logout','LoginController@Logout');	
