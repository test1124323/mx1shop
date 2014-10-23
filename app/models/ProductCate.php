<?php
class ProductCate extends Eloquent{
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

	public function product(){
		return $this->belongsTo('Product','ProductID');
	}

	public function cate(){
		return $this->belongsTo('Category','CategoryID');
	}

}
