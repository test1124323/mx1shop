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
		$data['cate1'] 			= CategoryModel::level1Cate()->get()->toArray();
		$data['cate2']  		= CategoryModel::level2Cate()->get()->toArray();
		$data['productlist'] 	= Product::Category($cateid)->Name($keyword)->with('ProductImg')->get()->toArray();
		// print_r(DB::getQueryLog());exit;
		// echo "<pre>";
		// print_r($data['productlist']);exit;
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
		
		// $list = DB::table('topic')->get();
		// $data['list'] 	= $list;
		return View::make('vote');
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
		//
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
