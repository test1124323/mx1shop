<?php
use component\Profile;
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
		$user->Email 		=	$input['email'];
		$user->TypeUser		=	'1';
		$user->UserAddress 	=	$input['address']." ".$input['postcode'];
		$user->UserTel 		=	$input['telnumber'];
		$realpass 			=	substr(md5($user->Fullname.$user->Email.$user->UserTel.rand(1,100000)),12,6);
		$user->PassWord 	=	md5($realpass); 

		Mail::send('emails.regisApprove', array('user'=>$user , 'realpass'=> $realpass), function($message) use ($user)
		{
		    $message->to($user->Email)->subject('ยืนยันการสมัครสมาชิก');
		});

		$user->save();
		return Redirect::to('login?E=success');
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
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input 	=	Input::all();
		$user 	=	UserModel::find($id);
		
		if($input['mode']=='profile'){
			$aa 	=	UserModel::Checkmail($input['email'])->get()->toArray();
			if(!empty($aa)&&$input['email']!=$user->Email){
				$txt 	=	base64_encode('อีเมล์นี้ถูกใช้งานโดยผู้ใช้อื่นแล้ว');
				
				return Redirect::to('profile?error='.$txt);
			}

			$user->FullName		=	$input['fname']." ".$input['lname'];
			$user->UserName 	=	$input['email'];
			$user->Email 		=	$input['email'];
			$user->UserAddress 	=	$input['address']." ".$input['postcode'];
			$user->UserTel 		=	$input['telnumber'];
			$user->save();

			Profile::save($user);
			$txt 	=	base64_encode('อัพเดตข้อมูลแล้ว');
			return Redirect::to('profile?success='.$txt);

		}else{
			$realpass 			=	substr(md5($user->Fullname.$user->Email.$user->UserTel.rand(1,100000)),12,6);
			$user->PassWord 	=	md5($realpass); 
		}
		echo "<pre>";
		print_r($user);

		
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
