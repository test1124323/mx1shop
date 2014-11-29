<?php
use component\Profile;
class loginfbController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$this->store();
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

		FacebookConnect::getFacebook(Config::get('app.faceook_api.application'));
		$getUser = FacebookConnect::getUser(Config::get('app.faceook_api.permissions'), url('/loginfb'));
		
		if (isset($getUser['user_profile'])) {
			
			$pf 					=	$getUser['user_profile'];
			$userProfile 			=	UserModel::fbID($pf['id'])->first();
			if($userProfile){
				$exist 				=	$userProfile->toArray();
			}
			
			if(empty($exist)){
				$userProfile 				=	new UserModel;
				$userProfile->UserName 		=	$pf['id'];
				$userProfile->FullName 		=	$pf['name'];
				$userProfile->FacebookID 	=	$pf['id'];
				$userProfile->save();
			}
			Profile::save($userProfile);	
			?>
			
			<script>
				window.location.href="profile";
			</script>
			<?php
		}
		
	}

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
	
	}


}
