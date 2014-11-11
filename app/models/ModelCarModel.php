<?php
class ModelCarModel extends Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'main';
	protected $table = 'tbl_model_car';
	protected $fillable = array('*');
	protected $primaryKey = 'ModelCarID';

	
	public function BrandCar(){
		return $this->belongsTo('BrandCarModel','BrandCarID');
	}
}
