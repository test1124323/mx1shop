<?php
class PaymentModel extends Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'main';
	protected $table = 'tbl_payment';
	protected $fillable = array('*');
	protected $primaryKey = 'OrderID';
	public $timestamps = false;

	public function Order(){
		return $this->hasOne('OrderModel','OrderID');
	}
}