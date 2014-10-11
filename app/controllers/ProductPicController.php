<?php

class ProductPicController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//echo "SSS";
		//print_r(Input::get('chk_productID'));

		//return View::make("back_setup/ProductPic");
	}

	public function show_product(){

		// print_r(Input::get('chk_productID'));
		$result = array();
		if(count(Input::get('chk_productID'))){
			$result = ProductModel::whereIn('ProductID',Input::get('chk_productID'))->get()->toArray();
		}
		
		//echo $str_cond = implode(',',Input::get('chk_productID'));

			return View::make("back_setup/ProductPic",array('result'=>$result));

		
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
