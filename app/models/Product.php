<?php
class Product extends Eloquent{
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

	public function ProductImg(){
		return $this->hasMany('ProductImg','ProductID');
	}

	public function scopeCategory($query,$cateid){
		if(empty($cateid)){
			return $query;
		}
		return $query->where('ProductCateID',$cateid);
	}
}