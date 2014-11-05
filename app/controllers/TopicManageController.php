<?php

class TopicManageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Topic = TopicModel::Search(Input::get("STopicName"),Input::get("STopicDetail"),Input::get("STopicNew"),Input::get("STopicStatus"))->paginate(20);
		return View::make("back_setup/Topic",array("Topic"=>$Topic,'Input'=>Input::all()));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("back_setup/TopicForm");
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$Topic = new TopicModel;
		$Topic->TopicName = Input::get('TopicName');
		$Topic->TopicDetail = Input::get('TopicDetail');
		$Topic->TopicNew = Input::get('TopicNew');
		$Topic->TopicStatus = Input::get('TopicStatus');
		$Topic->save();
		return Redirect::to('backoffice/Topic');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$Topic = TopicModel::where("TopicID","=",$id)->get()->toArray();
		return View::make("back_setup/TopicForm",array("Topic"=>$Topic));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$Topic = TopicModel::find($id);
		$Topic->TopicName = Input::get('TopicName');
		$Topic->TopicDetail = Input::get('TopicDetail');
		$Topic->TopicNew = Input::get('TopicNew');
		$Topic->TopicStatus = Input::get('TopicStatus');
		$Topic->save();
		return Redirect::to('backoffice/Topic');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$Topic = TopicModel::find($id);
		$Topic->delete();
		return Redirect::to('backoffice/Topic');
	}


}
