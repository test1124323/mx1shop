<?php
class Category extends Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'main';
	protected $table = 'tbl_category';
	protected $fillable = array('*');
	protected $primaryKey = 'CategoryID';

	public function productCategory(){
		return $this->hasMany('ProductCate','CategoryID');
	}

	public function CateProduct(){
		return $this->belongsToMany('Product', 'tbl_productcate', 'CategoryID' , 'ProductID' );
	}
}
