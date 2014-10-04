<?php

class CateController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$cate = CategoryModel::all()->toArray();
		$cateLevel1 = CategoryModel::level1Cate()->get()->toArray();
		$cateLevel2 = CategoryModel::level2Cate()->get()->toArray();
		//print_r($cate);
		return View::make('back_setup/CategoryDis',array("CateData"=>$cateLevel1,"CateData2"=>$cateLevel2));
		//echo "index";
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
	public function store()//save
	{
		$cate_add = new CategoryModel;
		$cate_add->CategoryName = Input::get('CategoryName');
		$cate_add->DeleteStatus = 0;
		$cate_add->CateParentID = Input::get('parent');
		$cate_add->CateLevel = Input::get('level');
		$cate_add->save();

		return Redirect::to('backoffice/Cate');

		//$cate = CategoryModel::all()->toArray();
		//return View::make('back_setup/CategoryDis',array("CateData"=>$cate));

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
		$cate_add = CategoryModel::find($id);
		$cate_add->CategoryName = Input::get('CategoryName');
		$cate_add->DeleteStatus = 0;
		$cate_add->CateParentID = Input::get('parent');
		$cate_add->CateLevel = Input::get('level');
		$cate_add->save();

		return Redirect::to('backoffice/Cate');


		//echo "update".$id;
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$cate_add = CategoryModel::find($id);
		$cate_add->delete();
		return Redirect::to('backoffice/Cate');
		//echo "destroy".$id;
	}


}
