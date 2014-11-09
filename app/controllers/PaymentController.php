<?php

class PaymentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$result = OrderModel::with('OrderDetail')
		->Search(Input::get('SOrderID'),Input::get('SFullName'),
			Input::get('SAdress'),Input::get('STel'),
			$this->conv_data_db(Input::get('SOrderDate')),$this->conv_data_db(Input::get('EOrderDate')),
			$this->conv_data_db(Input::get('SPaymantDate')),$this->conv_data_db(Input::get('EPaymantDate')),
			$this->conv_data_db(Input::get('SDeliveredDate')),$this->conv_data_db(Input::get('EDeliveredDate')),
			'2')
		->orderby('OrderDate','DESC')
		->paginate(20);
		$Payment1 = PaymentModel::get()->toArray();
		//$result = OrderModel::paginate(20);
		//echo "<pre>";print_r($Payment);echo "</pre>";
		$Payment = array();
		foreach ($Payment1 as $key => $value) {
			$Payment[$value['OrderID']] = $value['PaymentDate'];
		}
		//echo "<pre>";print_r($result);echo "</pre>";
		return View::make("back_setup/Payment",array('result'=>$result,'Payment'=>$Payment));
	}

	public function Search(){

		$result = OrderModel::with('OrderDetail')
		->Search(Input::get('SOrderID'),Input::get('SFullName'),
			Input::get('SAdress'),Input::get('STel'),
			$this->conv_data_db(Input::get('SOrderDate')),$this->conv_data_db(Input::get('EOrderDate')),
			$this->conv_data_db(Input::get('SPaymantDate')),$this->conv_data_db(Input::get('EPaymantDate')),
			$this->conv_data_db(Input::get('SDeliveredDate')),$this->conv_data_db(Input::get('EDeliveredDate')),
			'2')
		->orderby('OrderDate','DESC')
		->paginate(20);
		return View::make("back_setup/Payment",array('result'=>$result,'Input'=>Input::all()));
	}
	public function conv_data_db($date){
		if($date){
		$val = explode("/",$date);
		return ($val[2]-543)."-".$val[1]."-".$val[0];
		}else{
			return NULL;
		}
		
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
		echo "store";
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		echo "show".$id;
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
		echo "update".$id;
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		echo "destroy".$id;
	}
}