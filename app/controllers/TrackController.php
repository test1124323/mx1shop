<?php
class TrackController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//--------------------------RestFul function------------------------------------
	public function index()
	{
		return View::make('tracker');
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

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$Ostat 	=	array('รอยืนยันการสั่งซื้อ','ยืนยันการสั่งซื้อ','รอการชำระเงิน','ชำระเงินเรียบร้อย','จัดส่งเรียบร้อย','ยกเลิกรายการ');
		$order 	=	OrderModel::find($id)->toArray();
		if($order['Email'] != $_REQUEST['mail'] || empty($order)){
			return 'No';
		}

		$string 	=	"<div style='padding:20px;background:#EFEFEF;'>";
		$string 	.=	"<p>รหัสการสั่งซื้อ : ".$id."</p>";
		$string 	.=	"<p>ชื่อ - สกุลผู้สั่งซื้อ : ".$order['FullName']."</p>";
		$string 	.=	"<p><h3 style='color:#2B5;'>สถานะ : ".$Ostat[$order['OrderStatus']]."</h3></p>";
		$string 	.=	"</div>";
		return $string;
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
		if(!(Input::has('ProductCount'))||is_nan(Input::get('ProductCount'))){
		return Redirect::to('main');
		}
		$pid 	=	'P_'.$id;
		$quantity = 0 ;
		if(Session::has($pid)){
			$quantity	= 	intval(Session::get($pid)) + intval(Input::get('ProductCount'));
		}else{
			$quantity 	= 	Input::get('ProductCount');
		}
		if(Product::find($id)->ProductAmount < $quantity){
			return Redirect::to('main/'.$id."?updated=2");
		}

		Session::put($pid,$quantity);
		
		return Redirect::to('main/'.$id."?updated=1");
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	//--------------------------Custome function------------------------------------


}
