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

	public function OrderDetail(){
		return $this->hasMany('OrderDetailModel','OrderID');
	}
}