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
	
	public function scopeCustomer($query,$data){
		return $query->where('TypeUser','=',$data);
	}
}
