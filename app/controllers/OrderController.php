<?php
class OrderController extends \BaseController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$result = OrderModel::with('OrderDetail')->orderby('OrderDate','DESC')->paginate(20);
		//$result->where("OrderID","LIKE","%".Input::get('SOrderID')."%");
		//echo "<pre>";print_r(Input::get('SOrderID'));echo "</pre>";
		return View::make("back_setup/OrderAll",array('result'=>$result,'Input'=>Input::all()));
	}

	public function OrderDetail(){
		
		if(Input::get('OrderID')){
			//$result = OrderModel::where('OrderID','=',Input::get('OrderID'))->with('OrderDetail')->get()->toArray();
			$result = OrderModel::where('OrderID','=',Input::get('OrderID'))->with('OrderDetail')->orderby('OrderDate','DESC')->paginate(20);
			return View::make("back_setup/OrderDetail",array('result'=>$result));
		}else{
			return Redirect::to('backoffice/Order');
		}
		
		
	}
	public function deleteAuto()
	{
		$result1 = OrderDetailModel::where('AutoID','=',Input::get('AutoID'))->get()->toArray();
		//echo "<pre>";print_r($result1);echo "</pre>";
		$Auto = OrderDetailModel::find(Input::get('AutoID'));
		$Auto->delete();

		$result = OrderModel::where('OrderID','=',$result1[0]['OrderID'])->with('OrderDetail')->orderby('OrderDate','DESC')->get()->toArray();
		return View::make("back_setup/OrderDetail",array('result'=>$result));
	}

	public function Search(){
		//echo "<pre>";print_r(Input::all());echo "</pre>";
		$result = OrderModel::with('OrderDetail')->orderby('OrderDate','DESC');
		if (Input::has('SOrderID')){
			//$result =  $result->where("OrderID","LIKE","%".Input::get("SOrderID")."%");
		}
		
		$result =  $result->where("OrderID","LIKE","%2014f%")->paginate(20);
		//$result->where("OrderID","LIKE","%".Input::get('SOrderID')."%");
		//echo "<pre>";print_r($result);echo "</pre>";
		return View::make("back_setup/OrderAll",array('result'=>$result,'Input'=>Input::all()));
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
		$pattern = '/,/';
		$replacement = '';


		$OrderStatus = "";
		$PaymentTotal = 0;
		$PaymantDate = NULL;
		//PaymentTotal
		if (Input::has('PaymentTotal')){
			$PaymentTotal = preg_replace($pattern,$replacement,Input::get('PaymentTotal'));
			$PaymantDate = $this->conv_data_db(Input::get('PaymantDate'));

		}
		$OrderStatus = (Input::get('OrderStatus'))?Input::get('OrderStatus'):"3";
		$dateDelivered = ($OrderStatus=='4')?$this->conv_data_db(Input::get('DeliveredDate')):"";
		if(Input::get("CanOrderStaus")!=""){
			$OrderStatus = "5";
			$dateDelivered = NULL;
		}


		$Order = OrderModel::find(Input::get('OrderID'));
		$Order->OrderStatus = $OrderStatus;
		$Order->DeliveredDate = $dateDelivered;
		$Order->PaymantDate = $PaymantDate;
		$Order->save();

		if($PaymantDate!=NULL){
			$Payment = new PaymentModel();
			$Payment->PaymantDate = $PaymantDate;
			$Payment->PaymentTotal = $PaymentTotal;
			$Order->Payment()->save($Payment);
		}
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
