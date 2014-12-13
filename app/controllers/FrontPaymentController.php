<?php
class FrontPaymentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//--------------------------RestFul function------------------------------------
	public function index()
	{
		return View::make('paymentForm');
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
		
		require_once('recaptchalib.php');
		$privatekey = "6LeiRvwSAAAAAN80ZpfLfcxJYXGfLNu-8NAVJp4v";
		$resp = recaptcha_check_answer ($privatekey,
		                                $_SERVER["REMOTE_ADDR"],
		                                Input::get("recaptcha_challenge_field"),
		                                Input::get("recaptcha_response_field"));

		if (!$resp->is_valid) {
		   	return Redirect::to('payment?updated=1');
		}

		$input 	=	@Session::get('profile');
		$pay 	=	new PaymentModel;
		$pay->OrderID 		=	Input::get('orderID',null);
		$pay->UserID 		=	@$input['userid'];
		$pay->FullName 		=	Input::get('fullname',null);
		$pay->Tel 			=	Input::get('telnumber',null);
		$pay->Email 		=	Input::get('email',null);
		$pay->PaymentDate 	=	Input::get('payTime',null);
		$pay->payAmount 	=	Input::get('payAmount',null);
		$pay->payBank 		=	Input::get('payBank',null);
		$pay->save();

		$pay 	=	$pay->toArray();
		$pay['OrderID'] 	=	Input::get('orderID');
		Mail::send('emails.paymail', array('detail'=>$pay), function($message)
		{
		    $message->to(Config::get('mail.adminMail'))->subject('แจ้งการชำระเงิน');
		});

		return Redirect::to('payment/'.$pay['OrderID']);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('finishPayment');
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
