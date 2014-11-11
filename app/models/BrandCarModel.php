<?php
class BrandCarModel extends Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'main';
	protected $table = 'tbl_brand_car';
	protected $fillable = array('*');
	protected $primaryKey = 'BrandCarID';
	protected $with =	array('ModelCar');

	public function ModelCar(){
		return $this->hasMany('ModelCarModel','BrandCarID');
	}

}
