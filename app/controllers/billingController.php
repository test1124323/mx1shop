<?php
class billingController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//--------------------------RestFul function------------------------------------
	public function index()
	{
		return View::make('billingForm');
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
		// Array ( 
		// [fname] => 1 
		// [lname] => 1 
		// [address] => 1 
		// [postcode] => 1 
		// [telnumber] => 1 
		// [email] => 1@hotmai.com )
		$input 		=	Input::all();
		$FullName 	=	$input['fname']." ".$input['lname'];
		$Address 	= 	$input['address'];
		$tel 		= 	$input['telnumber'];
		$PostCode 	= 	$input['postcode'];
		$Email 		= 	$input['email'];
        // [OrderID] => 201410000001
        // [UserID] => 
        // [OrderDate] => 2014-10-14 20:50:29
        // [DeliveredDate] => 
        // [PaymantDate] => 2014-10-14
        // [PaymentDetail] => 
        // [FullName] => นายณัฐพงษ์  เพียภู
        // [Address] => บ้านเลขที่ 55 หมู่ 2 ต.เอราวัณ อ.เอราวัณ จ.เลย
        // [TelNumber] => 085-4661507
        // [PostCode] => 42220
        // [Email] => kobpeapoo0425@gmail.com
        // [OrderStatus] => 5
        // [StatusNew] => 1

		echo "<pre>";
		
		$maxID 	=	OrderModel::where('OrderDate','>',date("Y-m"))->max('OrderID');
		$maxID 	=	(empty($maxID))?date("Ym")."000001":$maxID+1;
		
		$order 	=	new OrderModel;
		$order->OrderID 	= $maxID;
        $order->OrderDate 	= date("Y-m-d H:i:s");
        $order->FullName 	= $FullName;
        $order->address 	= $Address;
        $order->TelNumber 	= $tel;
        $order->PostCode 	= $PostCode;
        $order->Email 		= $Email;
        $order->OrderStatus = '2';
        $order->StatusNew 	= '1';
		// $order->save();

		print_r(Session::all());
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
