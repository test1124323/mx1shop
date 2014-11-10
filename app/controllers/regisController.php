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
		require_once('recaptchalib.php');
		$privatekey = "6LeiRvwSAAAAAN80ZpfLfcxJYXGfLNu-8NAVJp4v";
		$resp = recaptcha_check_answer ($privatekey,
		                                $_SERVER["REMOTE_ADDR"],
		                                Input::get("recaptcha_challenge_field"),
		                                Input::get("recaptcha_response_field"));

		if (!$resp->is_valid) {
		   	return Redirect::to('login');
		}

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

		}elseif($input['mode']=='password'){
			$profile 	=	Session::get('profile');
			$pas 		=	UserModel::Checkpass($profile['userid'],md5($input['oldpass']))->get()->toArray();
			if(empty($pas)||$input['newpass1']!=$input['newpass2']){
				$txt 	=	base64_encode('พาสเวิร์ดไม่ถูกต้อง');
				return Redirect::to('passwordchange?error='.$txt);
			}
			$user->PassWord 	=	md5($input['newpass1']);
			$user->save();
			$txt 	=	base64_encode('เปลี่ยนพาสเวิร์ดเรียบร้อย');
			return Redirect::to('passwordchange?success='.$txt); 
		}

		
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
