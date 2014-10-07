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
		//echo "<pre>";print_r(Input::get('ProductName'));echo "</pre>";

		//echo "<pre>";print_r(Input::get('CategoryName'));echo "</pre>";
		//exit();
		$date = date('Y-m-d');
		if(count(Input::get('ProductName'))){
			foreach (Input::get('ProductName') as $key => $value) {
			# code...
			$Product = new ProductModel;
			$Product->ProductName = $value[0];
			$Product->ProductSalePrice = (Input::get('ProductSalePrice')[$key][0]);
			$Product->ProductAmount = (Input::get('ProductAmount')[$key][0]);
			$Product->ProductShortDESC = Input::get('ProductShortDESC')[$key][0];
			$Product->ProductDESC = Input::get('ProductDESC')[$key][0];
			$Product->ProductDate = ''.$date;

			$Product->save();

			
			foreach (Input::get('CategoryName')[$key] as $keyCate => $valueCate) {
				# code...
				//echo "<pre>";print_r($valueCate);echo "</pre>";
				$ProCate = new ProductCateModel();
				$ProCate->CategoryID = $valueCate;
				$product->Category()->save();


			}

			//$pro2 = ProductModel::find(1);




			}
		}


return Redirect::to('backoffice/Product');
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
 $id = explode("_",$_POST["id_tb"]);
$html = '<select id="Category'.$_POST["id_tb"].'"  name="CategoryName['.$id[0].'][]" class="form-control" placeholder="เลือกหมวดสินค้า">';
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
