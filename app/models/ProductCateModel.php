<?php
class ProductCateModel extends Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'main';
	protected $table = 'tbl_productcate';
	protected $fillable = array('*');
	protected $primaryKey = 'RunningNumber';
	public $timestamps = false;

	public function Product(){
		return $this->belongsTo('tbl_product','ProductID','ProductID');
	}
	
}
