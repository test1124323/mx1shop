<?php
namespace component;

class SessionCart{
	$productInCart  =  array();
	foreach (Session::all() as $key => $value) {
		if(!is_array($value)){
			if(strpos($key,'P_')!==false){
				$id = substr($key, 2);
				$productInCart[$key]['amount']	= $value;
				$productInCart[$key]['detail'] 	= Product::find($id)->toArray();
			}
		}
	}

}
?>