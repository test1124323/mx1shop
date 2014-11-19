<?php

class BrandCarController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$result = BrandCarModel::get()->toArray();
		return View::make("back_setup/BrandCar",array("result"=>$result));
	}

	public function CreatePop(){
		return View::make("back_setup/BrandCarForm");
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
		$BrandCar = new BrandCarModel;
		$BrandCar->BrandCarName = Input::get("BrandCarName");
		$BrandCar->save();
		return Redirect::to("backoffice/BrandCar");
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//$result = BrandCarModel::find($id)->get()->toArray();
		//return View::make("back_setup/BrandCar",array("result"=>$result));
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
		$BrandCar = BrandCarModel::find($id);
		$BrandCar->BrandCarName = Input::get("BrandCarName");
		$BrandCar->save();
		return Redirect::to("backoffice/BrandCar");
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$BrandCar = BrandCarModel::find($id);
		$BrandCar->delete();
		return Redirect::to("backoffice/BrandCar");
	}


}
