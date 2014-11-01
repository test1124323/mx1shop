<?php
use component\SessionCart as Cart;
use component\Shelf;
class billingController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//--------------------------RestFul function------------------------------------
	public function index()
	{
		$prod 	=	Cart::getProduct();
		if(empty($prod)){return Redirect::to('cart?updated=1');}
		return View::make('billingForm');
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
		Session::put('input',Input::all());
		require_once('recaptchalib.php');
		$privatekey = "6LeiRvwSAAAAAN80ZpfLfcxJYXGfLNu-8NAVJp4v";
		$resp = recaptcha_check_answer ($privatekey,
		                                $_SERVER["REMOTE_ADDR"],
		                                Input::get("recaptcha_challenge_field"),
		                                Input::get("recaptcha_response_field"));

		if (!$resp->is_valid) {
		   	return Redirect::to('billing?updated=1');
		}

		$input 		=	Input::all();
		$FullName 	=	$input['fname']." ".$input['lname'];
		$Address 	= 	$input['address'];
		$tel 		= 	$input['telnumber'];
		$PostCode 	= 	$input['postcode'];
		$Email 		= 	$input['email'];
		$child 		=	array();

		$productInCart		=	Cart::getProduct();
		$maxID 				=	OrderModel::where('OrderDate','>',date("Y-m"))->max('OrderID');
		$maxID 				=	(empty($maxID))?date("Ym")."000001":$maxID+1;

		$order 				=	new OrderModel;
		$order->OrderID 	= 	$maxID;
        $order->OrderDate 	= 	date("Y-m-d H:i:s");
        $order->FullName 	= 	$FullName;
        $order->address 	= 	$Address;
        $order->TelNumber 	= 	$tel;
        $order->PostCode 	= 	$PostCode;
        $order->Email 		= 	$Email;
        $order->OrderStatus = 	'0';
        $order->StatusNew 	= 	'1';


		foreach ($productInCart as $key => $value) {
			$val 							= $value['detail'];
			$childModel 					= new OrderDetailModel;
		    $childModel->OrderID 			= $maxID;
		    $childModel->ProductID 			= $val['ProductID'];
		    $childModel->ProductName 		= $val['ProductName'];
		    $childModel->OrderAmount 		= $value['amount'];
		    $childModel->ProductPrice 		= $val['ProductSalePrice'];
		    $childModel->OrderPriceTotal 	= intval($val['ProductSalePrice'])*intval($value['amount']);
			array_push($child, $childModel);

		}

			$childModel 					= new OrderDetailModel;
		    $childModel->OrderID 			= $maxID;
		    $childModel->ProductID 			= null;
		    $childModel->ProductName 		= "ค่าจัดส่ง";
		    $childModel->OrderAmount 		= 0;
		    $childModel->ProductPrice 		= 0;
		    $childModel->OrderPriceTotal 	= intval(Session::get('deliverCost'));

			array_push($child, $childModel);

		DB::transaction(function() use ($child,$order)
		{
			foreach ( Shelf::buy($child) as $key => $objChild) {
			 	$objChild->save();
			}
			$order->save();
			foreach ($child as $key => $mChild) {
				$mChild->save();
			}
			Cart::clearProduct();

		});
		// mail
		$data = array("sss");
		Mail::send('emails.billingmail', $data, function($message)
		{
		    $message->from('lusiaskolonie@gmail.com', 'Laravel');

		    $message->to('lusiaskolonie@gmail.com');
		});

		return Redirect::to('billing/'.$maxID);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$order 	=	OrderModel::find($id)->toArray();
		return View::make("bill",array('detail'=>$order));
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
