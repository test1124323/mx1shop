<?php

class ProductManageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//echo "SSS";
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
		return View::make('back_setup/ProductForm');
	}
	public function ShowDataEdit(){
		try{
			if(Input::has('chk_productID')){

				$result = ProductModel::with('ProcateCategory')
				->whereIn('ProductID',Input::get('chk_productID'))
				->get()
				->toArray();
				//echo "<pre>";print_r($result);echo "</pre>";

				return View::make("back_setup/ProductForm",array('result'=>$result));
			}
			else{
				return Redirect::to('backoffice/Product');
			}
		}
		catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}

	}
	public function  DeleteData(){
		//echo "<pre>";print_r(Input::get('chk_productID'));echo  "</pre>";exit();
		if(count(Input::get('chk_productID'))){
			$delete1 = ProductModel::whereIn('ProductID',Input::get('chk_productID'))->delete();
			$delete2 = ProductCateModel::whereIn('ProductID',Input::get('chk_productID'))->delete();
			
		}
		return Redirect::to('backoffice/Product');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//echo "<pre>";print_r(Input::get());echo "</pre>";
		//exit();
		try{
		$arr_data = array();
		$pattern = '/,/';
		$replacement = '';
		$Input = Input::all();
		//echo preg_replace($pattern, $replacement, $string);
			//*************//
		$date = date('Y-m-d');
		$i=0;
		if(count($Input['ProductName'])){
			foreach ($Input['ProductName'] as $key => $value) {
			# code...
				$HidProductID = $Input['HidProductID'][$key];

				$ProductDESC = $Input['ProductDESC'][$key][0];
				$ProductShortDESC = $Input['ProductShortDESC'][$key][0];
				$ProductAmount = $Input['ProductAmount'][$key][0];
				$ProductSalePrice = $Input['ProductSalePrice'][$key][0];
				$DeliverCost = $Input['DeliverCost'][$key][0];

			if(empty($HidProductID)){
				

				$Product = new ProductModel;
				$Product->ProductName = $value[0];
				$Product->ProductSalePrice = preg_replace($pattern,$replacement,$ProductSalePrice);
				$Product->ProductAmount = preg_replace($pattern,$replacement,$ProductAmount);
				$Product->ProductShortDESC = $ProductShortDESC;
				$Product->ProductDESC = $ProductDESC;
				$Product->DeliverCost = preg_replace($pattern,$replacement,$DeliverCost);
				$Product->ProductDate = ''.$date;
				$Product->save();

				//get max id
				$MaxID = DB::table('tbl_product')->max('ProductID');
				//echo $MaxID."<br>";
				//array_push($arr_dataInsert,''.$MaxID);
				$arr_data[] = ''.$MaxID;
				$CategoryName = $Input['CategoryName'][$key];
				
				foreach ($CategoryName as $keyCate => $valueCate) {
					# code...
					$ProCate = new ProductCateModel();
					$ProCate->CategoryID = $valueCate;
					$Product->ProcateCategory()->save($ProCate);
				}

				}else{


					$Product = ProductModel::find($HidProductID);
					$Product->ProductName = $value[0];
					$Product->ProductSalePrice = preg_replace($pattern,$replacement,$ProductSalePrice);
					$Product->ProductAmount = preg_replace($pattern,$replacement,$ProductAmount);
					$Product->ProductShortDESC = $ProductShortDESC;
					$Product->ProductDESC = $ProductDESC;
					$Product->ProductDate = ''.$date;
					$Product->DeliverCost = preg_replace($pattern,$replacement,$DeliverCost);
					$Product->save();

					//cate
					$delete = ProductCateModel::where('ProductID', '=',$HidProductID)->delete();
					$id = explode("_",$key);
					$CategoryName = $Input['CategoryName'][$id[0]];
					foreach ($CategoryName as $keyCate => $valueCate) {
						$ProCate = new ProductCateModel;
						$ProCate->CategoryID = $valueCate;
						$ProCate->ProductID = $HidProductID;
						$ProCate->save();

					}
					//end cate

				}

			}
		}
		
	//});

		//echo "<pre>";print_r($arr_data2);echo "</pre>";
		if(count($arr_data)>0){
		$result = ProductModel::whereIn('ProductID',$arr_data)->with('ProductImg')->get()->toArray();
		//echo "<pre>";print_r($result);echo "</pre>";
		return View::make("back_setup/ProductPic",array('result'=>$result));
		}else{
		//echo "AAAAAAAAAAAa";
		return Redirect::to('backoffice/Product');
		}
	
		}
		catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
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
		$result = ProductModel::with('ProcateCategory')->where('ProductID','=',$id)->get()->toArray();
		//echo "<pre>";print_r($result);echo "</pre>";

		return View::make("back_setup/ProductForm",array('result'=>$result));
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
					$select = "";
					if(isset($_POST['CategoryID'])&&$_POST['CategoryID']==$key2){
						$select = "selected";
					}
					# code...
					$html.='<option value="'.$key2.'" '.$select.' >'.$arr_dataAll[$key2]['name'].'</option>';

				}
				$html.='</optgroup>';

			}
		}
$html .='</select>';
 	return $html;
}

}
