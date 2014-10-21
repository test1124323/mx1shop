<?php
namespace component;
use Session;
use Product;

class SessionCart{

	public static function getProduct() {
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

	public static function clearProduct(){
		foreach (Session::all() as $key => $value) {
			if(strpos($key,'P_')!==false){
				Session::forget($key);
			}
		}		
	}

}
?>