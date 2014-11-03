<?php
class OrderController extends \BaseController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$result = OrderModel::with('OrderDetail')->Search(Input::get('SOrderID'),Input::get('SFullName'),
			Input::get('SAdress'),Input::get('STel'),
			$this->conv_data_db(Input::get('SOrderDate')),$this->conv_data_db(Input::get('EOrderDate')),
			$this->conv_data_db(Input::get('SPaymantDate')),$this->conv_data_db(Input::get('EPaymantDate')),
			$this->conv_data_db(Input::get('SDeliveredDate')),$this->conv_data_db(Input::get('EDeliveredDate')),
			Input::get('SOrderStatus'))
		->orderby('OrderDate','DESC')
		->paginate(20);
		//$result = OrderModel::paginate(20);
		//echo "<pre>";print_r(Input::get('SOrderID'));echo "</pre>";
		return View::make("back_setup/OrderAll",array('result'=>$result,'Input'=>Input::all()));
	}


	public function Search(){

		$result = OrderModel::with('OrderDetail')
		->Search(Input::get('SOrderID'),Input::get('SFullName'),
			Input::get('SAdress'),Input::get('STel'),
			$this->conv_data_db(Input::get('SOrderDate')),$this->conv_data_db(Input::get('EOrderDate')),
			$this->conv_data_db(Input::get('SPaymantDate')),$this->conv_data_db(Input::get('EPaymantDate')),
			$this->conv_data_db(Input::get('SDeliveredDate')),$this->conv_data_db(Input::get('EDeliveredDate')),
			Input::get('SOrderStatus'))
		->orderby('OrderDate','DESC')
		->paginate(20);
		return View::make("back_setup/OrderAll",array('result'=>$result,'Input'=>Input::all()));
	}

	public function confirmOrder(){

		$Order = OrderModel::find(Input::get('OrderID'));
		$Order->OrderStatus = '2';
		$Order->save();
		return Redirect::to('backoffice/Order');
		//$result = OrderModel::with('OrderDetail')->orderby('OrderDate','DESC')->paginate(20);
		//return View::make("back_setup/OrderAll",array('result'=>$result,'Input'=>Input::all()));

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
		if($date){
		$val = explode("/",$date);
		return ($val[2]-543)."-".$val[1]."-".$val[0];
		}else{
			return NULL;
		}
		
	}
	public function store()
	{
		$pattern = '/,/';
		$replacement = '';


		$OrderStatus = "";
		$PaymentTotal = 0;
		$PaymantDate = NULL;
		$DeliverCost = 0;
		//PaymentTotal
		if (Input::has('PaymentTotal')){
			$PaymentTotal = preg_replace($pattern,$replacement,Input::get('PaymentTotal'));
			$DeliverCost = preg_replace($pattern,$replacement,Input::get('DeliverCost'));
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
		$Order->DeliverCost = $DeliverCost;
		$Order->save();

		$product = OrderDetailModel::where("OrderID","=",Input::get('OrderID'))->get()->toArray();
		if(Input::get("OldStatus")=='5'){
			foreach ($product as $key => $value) {
				# code...
				$pro = ProductModel::find($value['ProductID']);
				$pro->ProductAmount = ($pro->ProductAmount-$value['OrderAmount']);
				$pro->save();
			}
		}
		if($OrderStatus=='5'){//if cancel  add increat product amount
			
			foreach ($product as $key => $value) {
				# code...
				$pro = ProductModel::find($value['ProductID']);
				$pro->ProductAmount = ($pro->ProductAmount+$value['OrderAmount']);
				$pro->save();
			}
		}


		if($PaymantDate!=NULL){
			$del = PaymentModel::where("OrderID",'=',Input::get('OrderID'))->delete();
			

			$Payment = new PaymentModel();
			$Payment->PaymantDate = $PaymantDate;
			$Payment->PaymentTotal = $PaymentTotal;
			$Order->Payment()->save($Payment);
		}

		return Redirect::to('backoffice/'.Input::get("UrlRe"));
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//echo Request::root();
		if($id){
			
			//$result = OrderModel::where('OrderID','=',Input::get('OrderID'))->with('OrderDetail')->get()->toArray();
			$result = OrderModel::where('OrderID','=',$id)->with("Payment")->with('OrderDetail')->orderby('OrderDate','DESC')->get()->toArray();
			//echo "<pre>";print_r($result);echo "</pre>";
			return View::make("/back_setup/OrderDetail",array('result'=>$result));
		}else{
			return Redirect::to('backoffice/Order');
		}
		//echo "show".$id;
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
		
		$result1 = OrderDetailModel::where('AutoID','=',$id)->get()->toArray();
		$result = OrderModel::where('OrderID','=',$result1[0]['OrderID'])->with('OrderDetail')->orderby('OrderDate','DESC')->get()->toArray();
		
		$Auto = OrderDetailModel::find($id);
		$Auto->delete();
		return Redirect::to('backoffice/Order/'.$result1[0]['OrderID']);
		//echo "destroy".$id;
	}


}
