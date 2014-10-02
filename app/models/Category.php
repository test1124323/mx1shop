<?php
class Category extends Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'main';
	protected $table = 'category';
	protected $fillable = array('category_id', 'category_name');
	protected $primaryKey = 'category_id';

	
}
