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
			return View::make('loginFront',array('stat'=> '1'));
		}
		$login 	=	UserModel::Login(Input::get('loguser') , Input::get('logpass'))->first();
	
		if(is_object($login)){
			// print_r($login->UserID);exit;
			if(empty($login->UserID)){
				return View::make('loginFront',array('stat'=> '2'));
			}
			$login 	=	$login->toArray();
			// UserID----1
			// UserName----kobpeapoo25@gmail.com
			// PassWord----12345
			// Email----kobpeapoo25@gmail.com
			// Lastvist_at----
			// SuperUser----
			// TypeUser----1
			// ActiveStatus----1
			// UserAddress----55 หมู่ 2 ต.เอราวัณ อ.เอราวัณ จ.เลย 42220
			// UserTel----0854661507
			// FullName----นายณัฐพงษ์ เพียภู
			// FacebookID----
			$fullname 	=	split(' ', string)$login['FullName']);
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
