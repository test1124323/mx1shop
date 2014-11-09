<?php
class regisController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//--------------------------RestFul function------------------------------------
	public function index()
	{
		
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
		$input 	=	Input::all();
		$user 				=	new UserModel;
		$user->FullName		=	$input['fname']." ".$input['lname'];
		$user->UserName 	=	$input['email'];
		$realpass 			=	substr(md5($user->Fullname),12,6);
		$user->PassWord 	=	md5($realpass); 
		$user->Email 		=	$input['email'];
		$user->TypeUser		=	'1';
		$user->UserAddress 	=	$input['address']." ".$input['postcode'];
		$user->UserTel 		=	$input['telnumber'];
 
		Mail::send('emails.regisApprove', array('user'=>$user , 'realpass'=> $realpass), function($message) use ($user)
		{
		    $message->to($user->Email)->subject('ยืนยันการสมัครสมาชิก');
		});

		$user->save();
		

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
