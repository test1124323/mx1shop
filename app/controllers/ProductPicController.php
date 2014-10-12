<?php

class ProductPicController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//echo "SSS";
		//print_r(Input::get('chk_productID'));

		//return View::make("back_setup/ProductPic");
	}
	public function update_status(){
		 ProductImg::where('ProductID','=',$_POST['ProductID'])->update(array('StatusFirst' => 2));
		 ProductImg::where('ProductImgID','=',$_POST['ProductImgID'])->update(array('StatusFirst' => 1));
		echo "เปลี่ยนแปลงข้อมูลเรียบร้อย";
		//echo $_POST['ProductID'].">>".$_POST['ProductImgID'];
	}

	public function show_product(){

		// print_r(Input::get('chk_productID'));
		$result = array();
		if(count(Input::get('chk_productID'))){
			$result = ProductModel::whereIn('ProductID',Input::get('chk_productID'))->with('ProductImg')->get()->toArray();

			//echo "<pre>";print_r($result);echo "</pre>";
			// Product::Category($cateid)->Name($keyword)
			return View::make("back_setup/ProductPic",array('result'=>$result));
		}
		else{
			return Redirect::to('backoffice/Product');
		}
		//echo $str_cond = implode(',',Input::get('chk_productID'));
		
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
private	function createthumb($name,$filename,$new_w,$new_h){

  $system=explode('.',$name);
  if(preg_match('/jpg|jpeg/',$system[1])){
    $src_img=imagecreatefromjpeg($name);
  }
  if(preg_match('/png/',$system[1])){
    $src_img=imagecreatefrompng($name);
  }

  $old_x=imagesx($src_img);
  $old_y=imagesy($src_img);

  $size=GetimageSize($name);
  $thumb_w = $new_w;
  $thumb_h =round($new_w*$size[1]/$size[0]);

  //$thumb_w=($old_x*$new_h)/$old_y;
  //$thumb_h=$new_h;

  $co_x=floor(($new_w-$thumb_w)/2);
  $co_y=0;      

  $dst_img=imagecreatetruecolor($new_w,$thumb_h); 
  $white=imagecolorallocate($dst_img,255,255,255);
  imagefill($dst_img,0,0,$white);
  imagecopyresized($dst_img,$src_img,$co_x,$co_y,0,0,$thumb_w,$thumb_h,$old_x,$old_y);    

  if(preg_match("/png/",$system[1])){
    imagepng($dst_img,$filename);   
  }else{
    imagejpeg($dst_img,$filename); 
  }
  imagedestroy($dst_img); 
  imagedestroy($src_img); 
}

	public function store()
	{
		$destinationPath1 = public_path().'/img/product/';
		$destinationPath2 =  public_path().'/img/product_tmp/';

		$arr_dataImg = array();
		$j=0;
		foreach (Input::get('ProductID') as $key => $value) {
			# code...
			
		$i=0;
		if (Input::hasFile('pic_'.$key)){

			$result = ProductImg::where('ProductID','=',$key)->get()->toArray();
			if(count($result)){
				//echo"<pre>";print_r($result);echo "</pre>";
				foreach ($result as $kr => $vr) {
				# code...
					@unlink($destinationPath1."/".$vr['ProductIMG']);
					@unlink($destinationPath2."/".$vr['ProductIMG']);
				}
			}


			$delete = ProductImg::where('ProductID', '=',$key)->delete();
			foreach(Input::file('pic_'.$key) as $key2 => $value2){

				$file = Input::file('pic_'.$key)[$i];
				$file2 = Input::file('pic_'.$key)[$i];

				$fileNameOri = Input::file('pic_'.$key)[$i]->getClientOriginalName();
				$fileNameOri  = explode('.',$fileNameOri);
				$fileName = date('Ymdhis').$i.$j.".".$fileNameOri[1];

				



				$file->move($destinationPath1, $fileName);

				

				//add copy right
				//$myCopyright = imagecreatefrompng(public_path().'/img/water_mask1_200.png');
				$myCopyright = imagecreatefromjpeg(public_path().'/img/water_mask1_2002.jpg');
				$srcWidth = imagesx($myCopyright);
				$srcHeight = imagesy($myCopyright);

				//echo $srcWidth.">>".$srcHeight."<b>";

				if(preg_match('/jpg|jpeg/',$fileNameOri[1])){
					$myImage=imagecreatefromjpeg($destinationPath1."/".$fileName);
				}
				if(preg_match('/png/',$fileNameOri[1])){
					$myImage=imagecreatefrompng($destinationPath1."/".$fileName);
				}

				$destWidth = imagesx($myImage);
				$destHeight = imagesy($myImage);

				//echo $destWidth.">>".$destHeight."<b>";

				$destX = ($destWidth - $srcWidth) / 2;
				$destY = ($destHeight - $srcHeight) / 1;



				$white = imagecolorexact($myCopyright, 255, 255, 255);
				//imagecolortransparent($myCopyright, $white);

				imagecopymerge($myImage, $myCopyright, $destX, $destY, 0, 0, $srcWidth, $srcHeight, 50);

				if(preg_match('/jpg|jpeg/',$fileNameOri[1])){
					imagejpeg($myImage,$destinationPath1."/".$fileName);
				}
				if(preg_match('/png/',$fileNameOri[1])){
					imagepng($myImage,$destinationPath1."/".$fileName);
				}
				imagedestroy($myImage);
				imagedestroy($myCopyright);
				//end add copy right

				$arr_dataImg[$key][] = $fileName;

				$Pro_img = new ProductImg;
				$Pro_img->ProductID = $key;
				$Pro_img->ProductIMG = $fileName; 
				$Pro_img->save();

				//echo"<pre>";print_r(Input::file('pic_'.$key)[$i]);echo "</pre>";
				$i++;

			}
			$j++;
		}//end if

	}

	if(count($arr_dataImg)>0){

		foreach ($arr_dataImg as $key => $value) {
			# code...
			foreach ($value as $key2 => $value2) {
				# code...
				$path = $destinationPath1."/".$value2;
				$target = $destinationPath2."/".$value2;

				copy($path, $target);
				//create thumb
				$this->createthumb($target,$target,400,400);
				//end create thumb
			}
		}
	}




	//echo $uploadSuccess."Upload";
		//$file = Input::file('pic_1')[0]->getClientOriginalName();
		//$name = Input::file('pic1')->getClientOriginalName();
		//echo "<pre>";print_r($file);echo "</pre>";
		//echo $name.">>>";
		//echo $uri = Request::path();
		//echo "store";
	$result = ProductModel::whereIn('ProductID',Input::get('ProductID'))->with('ProductImg')->get()->toArray();
	return View::make("back_setup/ProductPic",array('result'=>$result));

	
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


}
