<?php
class OrderModel extends Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'main';
	protected $table = 'tbl_order';
	protected $fillable = array('*');
	protected $primaryKey = 'OrderID';
	public $timestamps = false;
	//protected $with 	=	array('OrderDetailModel');

	public function OrderDetail(){
		return $this->hasMany('OrderDetailModel','OrderID');
	}
	public function Payment(){
		return $this->hasOne('PaymentModel','OrderID');
	}
	
	public function scopeSearch($query,$OrderID,$FullName,$Address,$Tel,$SOrderDate,$EOrderDate,$SPaymantDate,$EPaymantDate,$SDeliveredDate,$EDeliveredDate,$OrderStatus){
		if($OrderID){
			$query->where('OrderID','LIKE','%'.$OrderID.'%');
		}
		if($FullName){
			$query->where('FullName','LIKE','%'.$FullName.'%');
		}
		if($Address){
			$query->where('Address','LIKE','%'.$Address.'%');
		}
		if($Tel){
			$query->where('TelNumber','LIKE','%'.$Tel.'%');
		}
		if(!empty($SOrderDate)&&!empty($EOrderDate)){
			$query->whereBetween('OrderDate',array($SOrderDate,$EOrderDate));
		}
		if(!empty($SPaymantDate)&&!empty($EPaymantDate)){
			$query->whereBetween('PaymantDate',array($SPaymantDate,$EPaymantDate));
		}
		if(!empty($SDeliveredDate)&&!empty($EDeliveredDate)){
			$query->whereBetween('DeliveredDate',array($SDeliveredDate,$EDeliveredDate));
		}
		if($OrderStatus){
			$query->where('OrderStatus','=',$OrderStatus);
		}

		return $query;
	}
}