<?php
class ProductModel extends Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'main';
	protected $table = 'tbl_product';
	protected $fillable = array('*');
	protected $primaryKey = 'ProductID';
	public $timestamps = false;
	
	public function ProcateCategory(){
		return $this->hasMany('ProductCateModel','ProductID','ProductID');
	}
	public function ProductImg(){
		return $this->hasMany('ProductImg','ProductID')->orderby('StatusFirst','ASC');
	}

}
