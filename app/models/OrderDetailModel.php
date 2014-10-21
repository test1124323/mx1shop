<?php
class OrderDetailModel extends Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'main';
	protected $table = 'tbl_orderdetail';
	protected $fillable = array('*');
	protected $primaryKey = 'AutoID';
	public $timestamps = false;


	public function Order(){
		return $this->belongsTo('OrderModel','OrderID');
	}
}