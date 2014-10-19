<?php
class OrderModel extends Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'main';
	protected $table = 'tbl_order';
	protected $fillable = array('*');
	protected $primaryKey = 'OrderID';
	public $timestamps = false;
	protected $with 	=	array('OrderDetailModel');

	public function OrderDetail(){
		return $this->hasMany('OrderDetailModel','OrderID');
	}
	public function Payment(){
		return $this->hasOne('PaymentModel','OrderID');
	}

}