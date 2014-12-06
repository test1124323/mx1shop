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

		$destinationPath1 = public_path().'/img/picTopic/';
		$fileName = "";
		if(Input::hasFile('TopicPic')){
		$file = Input::file('TopicPic');
		//echo "<pre>";print_r(Input::file());echo "</pre>";exit();
		$fileNameOri = $file->getClientOriginalName();
		$fileNameOriEx  = explode('.',$fileNameOri);
		$fileType = $fileNameOriEx[1];

		$fileName = date('Ymdhis').".".$fileType;
		$file->move($destinationPath1, $fileName);
		}

		$Topic = new TopicModel;
		$Topic->TopicName = Input::get('TopicName');
		$Topic->TopicDetail = Input::get('TopicDetail');
		$Topic->TopicNew = Input::get('TopicNew');
		$Topic->TopicStatus = Input::get('TopicStatus');
		$Topic->TopicPic = $fileName;
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

		$destinationPath1 = public_path().'/img/picTopic/';
		if(Input::hasFile('TopicPic')){
			$Topic = TopicModel::where('TopicID','=',$id)->get()->toArray();

			@unlink($destinationPath1."/".$Topic[0]['TopicPic']);

		$file = Input::file('TopicPic');
		//echo "<pre>";print_r(Input::file());echo "</pre>";exit();
		$fileNameOri = $file->getClientOriginalName();
		$fileNameOriEx  = explode('.',$fileNameOri);
		$fileType = $fileNameOriEx[1];

		$fileName = date('Ymdhis').".".$fileType;
		$file->move($destinationPath1, $fileName);
		}

		$Topic = TopicModel::find($id);
		$Topic->TopicName = Input::get('TopicName');
		$Topic->TopicDetail = Input::get('TopicDetail');
		$Topic->TopicNew = Input::get('TopicNew');
		$Topic->TopicStatus = Input::get('TopicStatus');
		if(Input::hasFile('TopicPic')){
			$Topic->TopicPic = $fileName;
		}
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
