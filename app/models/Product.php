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

	public function scopeCategory($query,$cate_id){
		return $query->where('CateLevel','1');
	}
}
