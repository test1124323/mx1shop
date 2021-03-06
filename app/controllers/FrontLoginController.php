<?php
use component\Profile;
class FrontLoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//--------------------------RestFul function------------------------------------
	public function index()
	{
		$input 	=	Input::has('stat');
		$stat	=	(empty($input))?(Input::get('stat')):"";
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
			return View::make('loginFront',array('E'=> '1'));	//empty field
		}
		$login 	=	UserModel::Login(Input::get('loguser') , md5(Input::get('logpass')))->first();
		if(is_object($login)){

			if(empty($login->UserID) || $login->TypeUser!='1'){ //user only
				return View::make('loginFront',array('E'=> '2')); //invalid login data
			}
			
			Profile::save($login);
			return Redirect::to(Request::root()."/main");
		}else{
			return View::make('loginFront',array('E'=> '2')); //invalid login data

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
		return Redirect::to(Request::root()."/main");
	}
	//--------------------------Custome function------------------------------------


}
