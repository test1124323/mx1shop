<?php
class FrontLoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//--------------------------RestFul function------------------------------------
	public function index()
	{
		$stat	=	(empty(Input::has('stat')))?(Input::get('stat')):"";
		return View::make('loginFront',array('stat'=>$stat));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{ 
		if( !Input::has('loguser') || !Input::has('logpass') ){
			return View::make('loginFront',array('stat'=> '1'));	//empty field
		}
		$login 	=	UserModel::Login(Input::get('loguser') , Input::get('logpass'))->first();
	
		if(is_object($login)){
			if(empty($login->UserID) || $login->TypeUser!='1'){ //user only
				return View::make('loginFront',array('stat'=> '2')); //invalid login data
			}
			$login 	=	$login->toArray();

			$userInfo 				=	array();
			$fullname 				=	explode(" ", $login['FullName']);
			$userInfo['fullname']	=	$login['FullName'];
			$userInfo['fname'] 		=	$fullname[0];
			$userInfo['lname'] 		=	$fullname[1];
			$userInfo['address'] 	=	$login['UserAddress'];
			$userInfo['postcode'] 	=	substr($login['UserAddress'], -5);
			$userInfo['email'] 		=	$login['Email'];
			$userInfo['telnumber']	=	$login['UserTel'];
			$userInfo['userid']		=	$login['UserID'];
			$userInfo['typeuser']	=	$login['TypeUser'];
			Session::put('input',$userInfo);
			Session::put('profile',$userInfo);
			return Redirect::to(Request::root()."/main");
		}else{
			return View::make('loginFront',array('stat'=> '2')); //invalid login data

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
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

	}

	//--------------------------Custome function------------------------------------


}
