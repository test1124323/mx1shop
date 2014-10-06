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

Route::resource('/','TopicController');
Route::resource('/test1','testController');
Route::resource('/backoffice/Cate','CateController');
Route::get('/backoffice/deleteCate/{id}','CateController@destroy');
Route::resource('/backoffice/catePop','catePopController');
Route::resource('/backoffice/Product','ProductController');
Route::resource('/backoffice/ProductForm','ProductManageController');
Route::resource('/backoffice/DropdownCategory','ProductManageController@DropdownCategory');
