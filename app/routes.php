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
Route::resource('/backoffice/Order','OrderController@Search');
Route::resource('/backoffice/OrderDetail','OrderController@OrderDetail');
Route::resource('/backoffice/deleteAuto','OrderController@deleteAuto');
Route::resource('/backoffice/OrderDetailConf','OrderController');
Route::resource('/backoffice/Payment','PaymentController');

Route::resource('/backoffice/Customer','UserController@Customer');
Route::resource('/backoffice/UserEdit','UserController@UserEdit');
Route::resource('/backoffice/User','UserController');
