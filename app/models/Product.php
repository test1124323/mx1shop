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
		return $query->whereRaw("MATCH(ProductCateLabel) AGAINST(?)",array('a'.$cateid));
		// return $query->where('ProductCateID','LIKE','% '.$cateid.'%')
		// 			->orWhere('ProductCateID','LIKE','%'.$cateid.' %');

	}

	public function scopeName($query,$keyword){
		if(empty($keyword)){
			return $query;
		}
		return $query->where('ProductCateID','LIKE','%'.$keyword.'%');
	}
}
