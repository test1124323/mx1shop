<?php

class LoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Session::has("UserID")){
			return Redirect::to('backoffice/Order');
		}else{
			return View::make("back_setup/Login");
		}
			
			

		
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
		$login1  = UserModel::Login(Input::get('userid'),Input::get('password'))
		->get()->toArray();
		
		if(count($login1)>0){
			$login = $login1[0];
			Session::put('UserID',$login['UserID']);
			Session::put('FullName',$login['FullName']);
			Session::put('SuperUser',$login['SuperUser']);
			Session::put('ActiveStatus',$login['ActiveStatus']);
			Session::put('FullName',$login['FullName']);
			//echo Session::get("UserID");
			return Redirect::to('backoffice/Order');
		}else{
			return Redirect::to('backoffice/Login/1');
		}
		

		//echo "<pre>";print_r($login);echo "</pre>";
		//return View::make('show_test',array('data'=>$a , 'aa'=>'1' , 'inpt'=>$in));
	}

	public function Logout(){
		Session::flush();
		return Redirect::to('backoffice/Login');
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make("back_setup/Login",array("incorrect"=>'1'));

		//echo "show".$id;
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
