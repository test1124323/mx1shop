<?php

class ProductManageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('back_setup/ProductForm');
		//echo "index";
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//print_r(Input::get('ProductName'));
		if(count(Input::get('ProductName'))){
			foreach (Input::get('ProductName') as $key => $value) {
			# code...
			$Product = new ProductModel;
			$Product->ProductName = $value;
			$Product->ProductSalePrice = str_replace(",","",Input::get('ProductSalePrice')[$key]);
			$Product->ProductAmount = str_replace(",","",Input::get('ProductAmount')[$key]);
			$Product->ProductShortDESC = Input::get('ProductShortDESC')[$key];
			$Product->ProductDESC = Input::get('ProductDESC')[$key];
			$Product->ProductDate = '';
			}
		}



		//echo "store";
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		echo "show".$id;
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		echo "update".$id;
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		echo "destroy".$id;
	}

public function DropdownCategory(){
  
   $result1 = CategoryModel::level1Cate()->get()->toArray();
   $result2 = CategoryModel::level2Cate()->get()->toArray();
   	//echo "<pre>";print_r($result1);echo "</pre>";
   $arr_data = array();
   $arr_dataAll = array();
 	if(count($result1)){
 		foreach ($result1 as $key => $value) {
 			# code...
 			$arr_dataAll[$value['CategoryID']]['name'] = $value['CategoryName'];
 			$arr_dataAll[$value['CategoryID']]['id'] = $value['CategoryID'];
 		}
 		foreach ($result2 as $key2 => $value2) {
 			# code...
 			$arr_dataAll[$value2['CategoryID']]['name'] = $value2['CategoryName'];
 			$arr_dataAll[$value2['CategoryID']]['id'] = $value2['CategoryID'];
 			$arr_data[$value2['CateParentID']][$value2['CategoryID']] = $value2['CategoryID'];
 		}
 	}
$html = '<select id="Category'.$_POST["id_tb"].'"  name="CategoryName[]" class="form-control" placeholder="เลือกหมวดสินค้า">';
		$html.='<option value="">เลือกหมวดสินค้า</option>';
		if($arr_data){
			foreach ($arr_data as $key => $value) {
				# code...
				$html.='<optgroup label="'.$arr_dataAll[$key]['name'].'">';
				foreach ($value as $key2 => $value2) {
					# code...
					$html.='<option value="'.$key2.'">'.$arr_dataAll[$key2]['name'].'</option>';

				}
				$html.='</optgroup>';

			}
		}
$html .='</select>';
 	return $html;
}

}
