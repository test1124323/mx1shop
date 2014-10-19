<?php
namespace component;
use Session;
use Product;

class SessionCart{

	public static function getProduct() {
		// return "ss";
		$productInCart  =  array();
		foreach (Session::all() as $key => $value) {
			if(!is_array($value)){
				if(strpos($key,'P_')!==false){
					$id = substr($key, 2);
					$productInCart[$id]['amount']	= $value;
					$productInCart[$id]['detail'] 	= Product::find($id)->toArray();
				}
			}
		}
		return $productInCart;
	}

}
?>