<?php

class OrderController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$result = OrderModel::with('OrderDetail')->get()->toArray();
		//echo "<pre>";print_r($result);echo "</pre>";
		return View::make("back_setup/OrderAll",array('result'=>$result));
	}

	public function OrderDetail(){
		$result = OrderModel::where('OrderID','=',Input::get('OrderID'))->with('OrderDetail')->get()->toArray();
		return View::make("back_setup/OrderDetail",array('result'=>$result));
	}
	public function deleteAuto()
	{
		$result1 = OrderDetailModel::where('AutoID','=',Input::get('AutoID'))->get()->toArray();
		//echo "<pre>";print_r($result1);echo "</pre>";
		$Auto = OrderDetailModel::find(Input::get('AutoID'));
		$Auto->delete();

		$result = OrderModel::where('OrderID','=',$result1[0]['OrderID'])->with('OrderDetail')->get()->toArray();
		return View::make("back_setup/OrderDetail",array('result'=>$result));
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
	public function conv_data_db($date){
		$val = explode("/",$date);
		return ($val[2]-543)."-".$val[1]."-".$val[0];
	}
	public function store()
	{
		$OrderStatus = (Input::get('OrderStatus'))?Input::get('OrderStatus'):"3";

		$Order = OrderModel::find(Input::get('OrderID'));
		$Order->OrderStatus = $OrderStatus;
		$Order->DeliveredDate = ($OrderStatus=='4')?$this->conv_data_db(Input::get('DeliveredDate')):"";
		$Order->save();

		return Redirect::to('backoffice/Order');
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
		

		//return Redirect::to('backoffice/Cate');
		//echo "destroy".$id;
	}


}
