<?php
class FrontProfileController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//--------------------------RestFul function------------------------------------
	public function index()
	{
		$pf 	=	Session::get('profile');
		$user 	=	UserModel::find($pf['userid']);
		return View::make('profile',array('user'=>$user));
	}

	public function changepassform(){
		return View::make('passwordchg');
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
		$login 	=	UserModel::Login(Input::get('loguser') , md5(Input::get('logpass')))->first();
	
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
			$addr 					=	substr($login['UserAddress'], -5);
			if($addr <= 0){
				$addr = '';
			}else{
				$userInfo['address'] 	=	str_replace($addr, '', $userInfo['address']);
			}
			$userInfo['postcode'] 	=	$addr;
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

	public function logout(){
		Session::forget('profile');
		Session::forget('input');
	}
	//--------------------------Custome function------------------------------------


}
