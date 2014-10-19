<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make("main_test");
	}

	public function Customer(){
		$Customer = UserModel::Customer('1')->paginate(20);
		return View::make("back_setup/Customer",array("Customer"=>$Customer));
	}
	public function UserEdit(){
		$Customer = UserModel::Customer('1')->where("UserID","=",Input::get("UserID"))->get()->toArray();
		return View::make("back_setup/CustomerForm",array("Customer"=>$Customer));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$User = UserModel::find(Input::get("UserID"));
		$User->UserName = Input::get("UserName");
		$User->PassWord = Input::get("PassWord");
		$User->Email = Input::get("Email");
		$User->ActiveStatus = Input::get("ActiveStatus");
		$User->UserAddress = Input::get("UserAddress");
		$User->UserTel = Input::get("UserTel");
		$User->FullName = Input::get("FullName");
		$User->save();
		return Redirect::to('backoffice/Customer');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		echo "show".$id;
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		echo "update".$id;
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		echo "destroy".$id;
	}


}
