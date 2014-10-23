<?php
class TopicController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//--------------------------RestFul function------------------------------------
	public function index()
	{
		$cateid 				= Input::get('cate');
		$keyword 				= Input::get('keyword');
		$data['productlist'] 	= Product::JoinCategory($cateid)->Category($cateid)
											->Name($keyword)
											->with('ProductImg')
											->paginate(17);
		$data['coverImg']	=	array();
		foreach ($data['productlist'] as $key => $value) {
			foreach ($value['product_img'] as $k => $v) {
				if($v['StatusFirst']=='1'){
					$data['coverImg'][$value['ProductID']] = $v['ProductIMG'];
				}
			}
		}
		// echo "<pre>";
		// print_r($data['coverImg']);
		// exit;
		return View::make('main',$data);
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
		$coverImg = 'noimage.png';
		$imgCount = 0;
		$product 	= 	Product::where('ProductID',$id);
		if(is_object($product))
		$product 	=	$product->with('ProductImg')->first()->toArray();
		foreach ($product['product_img'] as $key => $value) {
			if($value['StatusFirst']==1){
				$coverImg	=	$value['ProductIMG'];
			}
			@++$imgCount;
		}

		return View::make('productDetail',array('detail'=>$product , 'coverImg'=>$coverImg , 'imgCount'=>$imgCount ));
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
