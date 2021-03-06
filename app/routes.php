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
Route::resource('track' , 'TrackController');
Route::resource('blog' , 'blogController');
Route::resource('loginfb' , 'loginfbController');



Route::get('/','TopicController@index');
Route::resource('main','TopicController');
Route::resource('cartStore','TopicController');

Route::resource('cart','cartController');
Route::get('cancelOrder/{id}','cartController@destroy');

Route::resource('billing','billingController');
Route::resource('billingSave','billingPDFController');

Route::resource('registeration','regisController');
Route::get('passwordchange','FrontProfileController@changepassform');
Route::resource('payment','FrontPaymentController');

Route::group(array('before' => 'isNonLogin'), function(){
	Route::resource('profile','FrontProfileController');
});

Route::group(array('before' => 'isLogedin'), function(){
	Route::resource('login','FrontLoginController');
});

Route::get('How-to-order',function(){
	return View::make('howtoorder');
});

Route::get('about-us',function(){
	return View::make('aboutus');
});

Route::filter('check', function()
{
	if(!Session::has("UserID")){
		return Redirect::to('backoffice/Login');
	}
});

Route::get('logout','FrontLoginController@logout');



Route::get('/backoffice/', function()
    {
    	return Redirect::to('backoffice/Login');
    });
Route::get('destroy','nullController@destroy');
Route::group(array('before' => 'check'), function(){
			Route::resource('/backoffice/Cate','CateController');
			Route::get('/backoffice/deleteCate/{id}','CateController@destroy');
			Route::resource('/backoffice/catePop','catePopController');
			Route::resource('/backoffice/Product','ProductController');
			Route::resource('/backoffice/ProductForm','ProductManageController');

			Route::resource('/backoffice/DropdownCategory','ProductManageController@DropdownCategory');
			Route::resource('/backoffice/ProductPic','ProductPicController@show_product');
			Route::resource('/backoffice/ProductPicManage','ProductPicController');
			Route::resource('/backoffice/UpdateStatusPic','ProductPicController@update_status');
			Route::resource('/backoffice/deletePic','ProductPicController@deletePic');
			Route::resource('/backoffice/ProductEdit','ProductManageController@ShowDataEdit');
			Route::resource('/backoffice/ProductDel','ProductManageController@DeleteData');
			Route::resource('/backoffice/DropdownBrandCar','ProductManageController@DropdownBrandCar');
			Route::resource('/backoffice/DropdownModelCar','ProductManageController@DropdownModelCar');

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
			//Brand Car
			Route::resource('/backoffice/BrandCar','BrandCarController');
			Route::resource('/backoffice/BrandCarPop','BrandCarController@CreatePop');
			Route::get('/backoffice/BrandCarDel/{id}','BrandCarController@destroy');
			/////
			//Model Car
			Route::resource('/backoffice/ModelCar','ModelCarController');
			Route::resource('/backoffice/ModelCarPop','ModelCarController@CreatePop');
			Route::get('/backoffice/ModelCarDel/{id}','ModelCarController@destroy');

			Route::resource('/backoffice/Promotion','PromotionController');



			//
			
		
});
Route::resource('/backoffice/Login','LoginController');
Route::resource('/backoffice/Logout','LoginController@Logout');	
