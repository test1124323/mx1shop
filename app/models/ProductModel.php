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
	protected $with =array('ProcateCategory');	

	public function ProcateCategory(){
		return $this->hasMany('ProductCateModel','ProductID','ProductID');
	}
	public function ProductImg(){
		return $this->hasMany('ProductImg','ProductID')->orderby('StatusFirst','ASC');
	}
	public function scopeSearch($query,$ProductID,$ProductName,$CategoryID){
		if(!empty($ProductID)){
			$query->where('ProductID','LIKE','%'.$ProductID.'%');
		}
		if(!empty($ProductName)){
			$query->where('ProductName','LIKE','%'.$ProductName.'%');
		}
		if($CategoryID){
			
		}
		
		return $query;
	}

}
