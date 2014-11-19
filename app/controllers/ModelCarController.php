<?php

class ModelCarController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$result = ModelCarModel::orderby('BrandCarID','ASC')->paginate(20);

		$Brand = BrandCarModel::get()->toArray();
		$arr_data = array();
		$arr_data[0]="---เลือก---";
		foreach ($Brand as $key => $value) {
			# code...
			$arr_data[$value['BrandCarID']] = $value['BrandCarName'];
		}

		return View::make("back_setup/ModelCar",array("result"=>$result,'arr_data'=>$arr_data));
	}

	public function CreatePop(){
		$result = BrandCarModel::get()->toArray();
		$arr_data = array();
		$arr_data[0]="---เลือก---";
		foreach ($result as $key => $value) {
			# code...
			$arr_data[$value['BrandCarID']] = $value['BrandCarName'];
		}
		return View::make("back_setup/ModelCarForm",array('result'=>$arr_data));
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
		$ModelCar = new ModelCarModel;
		$ModelCar->BrandCarID = Input::get("BrandCarID");
		$ModelCar->ModelCarName = Input::get("ModelCarName");
		$ModelCar->save();
		return Redirect::to("backoffice/ModelCar");
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
		$ModelCar = ModelCarModel::find($id);
		$ModelCar->BrandCarID = Input::get("BrandCarID");
		$ModelCar->ModelCarName = Input::get("ModelCarName");
		$ModelCar->save();
		return Redirect::to("backoffice/ModelCar");
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$ModelCar = ModelCarModel::find($id);
		$ModelCar->delete();
		return Redirect::to("backoffice/ModelCar");
	}


}
