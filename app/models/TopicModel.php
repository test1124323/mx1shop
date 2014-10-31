<?php
class TopicModel extends Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'main';
	protected $table = 'tbl_topic';
	protected $fillable = array('*');
	protected $primaryKey = 'TopicID';
	public $timestamps = false;
public function scopeSearch($query,$TopicName,$TopicDetail,$TopicNew,$TopicStatus){
		if($TopicName){
			$query->where('TopicName','LIKE','%'.$TopicName.'%');
		}
		if($TopicDetail){
			$query->where('TopicDetail','LIKE','%'.$TopicDetail.'%');
		}
		if($TopicNew!=""){
			$query->where('TopicNew','=',$TopicNew);
		}
		if($TopicStatus!=""){
			$query->where('TopicStatus','=',$TopicStatus);
		}

		return $query;
	}
}
