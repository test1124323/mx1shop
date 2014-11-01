<?php
namespace component;
use Session;
use Product;

class Shelf{

	public static function buy($child) {
		$pd 	=	array();
		$pass 	=	true;
		foreach ($child as $key => $mChild) {
			if(empty($mChild->ProductID)){
				continue;
			}
			$pd[$key] 	=	Product::find($mChild->ProductID);
			if($pd[$key]->ProductAmount >= $mChild->OrderAmount){
				$pd[$key]->ProductAmount	-=	$mChild->OrderAmount;
				$pass = $pass&&true;
			}else{
				$pass = $pass&&false;
			}	
			
		}
		if($pass){
			// foreach ($child as $key => $mChild) {
			// 	$pd[$key]->save();
			// }
			return $pd;
		}else{
			return false;
		}
	}

}
?>