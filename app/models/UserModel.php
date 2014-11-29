<?php
class UserModel extends Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'main';
	protected $table = 'tbl_user';
	protected $fillable = array('*');
	protected $primaryKey = 'UserID';
	public $timestamps = false;
	
	public function scopeCustomer($query,$data,$FullName,$UserAddress,$UserTel,$Email,$ActiveStatus){
		if(!empty($FullName)){
			$query->where('FullName','LIKE','%'.$FullName.'%');
		}
		if(!empty($UserAddress)){
			$query->where('UserAddress','LIKE','%'.$UserAddress.'%');
		}
		if(!empty($UserTel)){
			$query->where('UserTel','LIKE','%'.$UserTel.'%');
		}
		if(!empty($Email)){
			$query->where('Email','LIKE','%'.$Email.'%');
		}
		if(!empty($ActiveStatus)){
			$query->where('ActiveStatus','=',$ActiveStatus);
		}
		return $query->where('TypeUser','=',$data);
	}

	public function scopefbID($query,$id){
		return $query->where('FacebookID',$id);
	}

	public function scopeLogin($query,$username,$password){
		return $query->where('UserName','=',$username)
		->where('PassWord','=',$password)
		->where('ActiveStatus','=','1');
	}
	public function scopeCheckmail($query,$email){
		return $query->where('Email',$email);
	}

	public function scopeCheckpass($query,$uid,$pass){
		return $query->where('PassWord',$pass)->where('UserID',$uid);
	}
}
