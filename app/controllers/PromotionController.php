<?php

class PromotionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//return View::make("emails/PromotionMail");
		$Promotion = PromotionModel::Search(Input::get('SSubject'),
			$this->conv_data_db(Input::get('SCreateDate')),
			$this->conv_data_db(Input::get('ECreateDate')))
		->paginate(20);
		return View::make("back_setup/Promotion",array("Promotion"=>$Promotion,'Input'=>Input::all()));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("back_setup/PromotionForm");
	}
	public function conv_data_db($date){
		if($date){
		$val = explode("/",$date);
		return ($val[2]-543)."-".$val[1]."-".$val[0];
		}else{
			return NULL;
		}
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$destinationPath1 = public_path().'/img/picEmail/';
		$fileName = "";
		if(Input::hasFile('PicAds')){
		$file = Input::file('PicAds');
		//echo "<pre>";print_r(Input::file());echo "</pre>";exit();
		$fileNameOri = $file->getClientOriginalName();
		$fileNameOriEx  = explode('.',$fileNameOri);
		$fileType = $fileNameOriEx[1];

		$fileName = date('Ymdhis').".".$fileType;

		$file->move($destinationPath1, $fileName);
		}


		
		$TextName = Input::get('TextName');
		$Promotion = new PromotionModel;
		$Promotion->Subject = $TextName;
		$Promotion->Detail = Input::get('TextEmail');
		$Promotion->Picture = $fileName;
		$Promotion->CreateDate = date('Y-m-d');
		$Promotion->save();

		$Promotion 	=	$Promotion->toArray();

		$User = UserModel::where('Email','<>','')->where('TypeUser','=','1')->get()->toArray();
		//$Promotion['Email'] = 'kobpeapoo0425@gmail.com';
		//echo "<pre>";print_r($User);echo "</pre>";
		foreach ($User as $key => $value) {
			# code...
				//echo  $value['Email']."";echo "<br>";
				# code...
				Mail::send('emails.PromotionMail', array('detail'=>$Promotion), function($message) use($value)
					{

		    			$message->to($value['Email'])->subject('แจ้งข่าวสารโปรโมชันจาก www.mx1shop.com');
					});

		}
		

		return Redirect::to("backoffice/Promotion");
		//echo Input::get('TextEmail');
		//echo "store";
		//return View::make('show_test',array('data'=>$a , 'aa'=>'1' , 'inpt'=>$in));
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
		$destinationPath1 = public_path().'/img/picEmail';
		//echo "destroy".$id;
		$Promotion = PromotionModel::where('PromotionID','=',$id)->get()->toArray();
		@unlink($destinationPath1."/".$Promotion[0]['Picture']);

		$Promotion = PromotionModel::where('PromotionID','=',$id)->delete();

		return Redirect::to("backoffice/Promotion");
	}


}
