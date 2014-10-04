<?php
class CategoryModel extends Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'main';
	protected $table = 'tbl_category';
	protected $fillable = array('*');
	protected $primaryKey = 'CategoryID';
	public $timestamps = false;

	public function scopeLevel1Cate($query){
		return $query->where('CateLevel','1');
	}
	public function scopeLevel2Cate($query){
		return $query->where('CateLevel','2');
	}
}
