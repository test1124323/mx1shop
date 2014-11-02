<?php
class cartController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//--------------------------RestFul function------------------------------------
	public function index()
	{
		$productInCart  =  	array();
		$deliverCost 	=	array();
		$deliverAmount	=	array();
		foreach (Session::all() as $key => $value) {
			if(!is_array($value)){
				if(strpos($key,'P_')!==false){
					@++$count;
					$id = substr($key, 2);
					$productInCart[$key]['amount']	= $value;
					$productInCart[$key]['detail'] 	= Product::find($id)->toArray();
					array_push($deliverCost, $productInCart[$key]['detail']['DeliverCost']);
					$deliverCost[$productInCart[$key]['detail']['DeliverCost']]	=	$value;
				}
			}
		}
		$maxDC	=	@intval(max($deliverCost));
		@$maxDC 	=	$deliverCost[$maxDC]*$maxDC;
		Session::put('deliverCost',$maxDC);
		return View::make('finishOrder',array('productInCart'=>$productInCart));
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
		if(Session::has($id)){
			Session::forget($id);
		}
		return Redirect::to('cart');
	}

	//--------------------------Custome function------------------------------------


}
