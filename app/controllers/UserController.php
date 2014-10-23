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
	public function Employee(){
		$Customer = UserModel::Customer('2')->paginate(20);
		return View::make("back_setup/Employee",array("Customer"=>$Customer));
	}
	public function UserEdit(){
		$Customer = UserModel::Customer(Input::get("TypeUser"))->where("UserID","=",Input::get("UserID"))->get()->toArray();
		return View::make("back_setup/CustomerForm",array("Customer"=>$Customer,'TypeUser'=>Input::get("TypeUser")));
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
		
		if(Input::get("UserID")!=""){
			$User = UserModel::find(Input::get("UserID"));
		}else{
			$User = new UserModel;
		}

		$User->UserName = Input::get("UserName");
		$User->PassWord = Input::get("PassWord");
		$User->Email = Input::get("Email");
		$User->ActiveStatus = Input::get("ActiveStatus");
		$User->UserAddress = Input::get("UserAddress");
		$User->UserTel = Input::get("UserTel");
		$User->FullName = Input::get("FullName");
		$User->TypeUser = Input::get("TypeUser");
		$User->SuperUser = Input::get("SuperUser");
		$User->save();
		if(Input::get("TypeUser")=='1'){
			return Redirect::to('backoffice/Customer');
		}else{
			return Redirect::to('backoffice/Employee');
		}
		
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
		$User = UserModel::find($id);
		$User->delete();
		return Redirect::to('backoffice/Customer');
		//echo "destroy".$id;
	}


}
