<?php
class PromotionModel extends Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'main';
	protected $table = 'tbl_promotion';
	protected $fillable = array('*');
	protected $primaryKey = 'promotionID';
	public $timestamps = false;
	
public function scopeSearch($query,$Subject,$Sdate,$Edate){
		if($Subject){
			$query->where('Subject','LIKE','%'.$Subject.'%');
		}
		if(trim($Sdate)<>''&&trim($Edate)<>''){
			$query->whereBetween('CreateDate',array($Sdate,$Edate));
		}

		return $query;
	}
}
