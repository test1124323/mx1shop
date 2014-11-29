<?php
namespace component;
use Session;

class Profile{

	public static function save($user) {

		@$login 	=	@$user->toArray();
		@$userInfo 				=	array();
		@$fullname 				=	explode(" ", @$login['FullName']);
		@$userInfo['fullname']	=	@$login['FullName'];
		@$userInfo['fname'] 	=	@$fullname[0];
		@$userInfo['lname'] 	=	@$fullname[1];
		@$userInfo['address'] 	=	@$login['UserAddress'];
		@$addr 					=	substr(@$login['UserAddress'], -5);
		if($addr <= 0){
			$addr = '';
		}else{
			$userInfo['address'] 	=	str_replace($addr, '', @$userInfo['address']);
		}
		@$userInfo['postcode'] 		=	$addr;
		@$userInfo['email'] 		=	@$login['Email'];
		@$userInfo['telnumber']		=	@$login['UserTel'];
		@$userInfo['userid']		=	@$login['UserID'];
		@$userInfo['typeuser']		=	@$login['TypeUser'];
		@$uesrInfo['facebook_id'] 	=	@$login['FacebookID'];
		
		Session::put('input',@$userInfo);
		Session::put('profile',@$userInfo);
	}

}
?>