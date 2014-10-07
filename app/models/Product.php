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

	public function productCategory(){
		return $this->hasMany('ProductCate','ProductID');
	}

	public function ProductImg(){
		return $this->hasMany('ProductImg','ProductID');
	}

	public function ProductCate(){
		return $this->belongsToMany('Category', 'tbl_productcate' , 'ProductID' , 'CategoryID');
	}

	public function scopeJoinCategory($query){
		
		// return $query->whereRaw("MATCH(ProductCateLabel) AGAINST(?)",array('a'.$cateid));
		return $query->join('tbl_productcate', 'tbl_product.ProductId', '=', 'tbl_productcate.ProductID')
					->join('tbl_category', 'tbl_category.CategoryID', '=', 'tbl_productcate.CategoryID')
					->groupBy('tbl_product.ProductId');
		
		// return $query->where('ProductCateID','LIKE','% '.$cateid.'%')
		// 			->orWhere('ProductCateID','LIKE','%'.$cateid.' %');

	}

	public function scopeCategory($query,$cateid){
		if(empty($cateid)){
			return $query;
		}

		return $query->where('tbl_category.CategoryID','=',$cateid)->orWhere('tbl_category.CateParentID','=',$cateid);
	}

	public function scopeName($query,$keyword){
		if(empty($keyword)){
			return $query;
		}
		return $query->where('ProductName','LIKE','%'.$keyword.'%');
	}
}
