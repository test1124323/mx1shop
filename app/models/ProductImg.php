<?php
class ProductImg extends Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'main';
	protected $table = 'tbl_productimg';
	protected $fillable = array('*');
	protected $primaryKey = 'ProductImgID';
	public $timestamps = false;

	public function productImage($query,$pid){
		return $query->belongsTo('Product','ProductID');
	}
}
