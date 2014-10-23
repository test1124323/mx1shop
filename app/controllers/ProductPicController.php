<?php
use Intervention\Image\ImageManagerStatic as Image;
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
  $src_img = "";
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
		//echo "<pre>";print_r(Input::file());echo "</pre>";exit();
	try{
		$destinationPath1 = public_path().'/img/product/';
		$destinationPath2 =  public_path().'/img/product_tmp/';

		$arr_dataImg = array();
		$j=0;
		$Input = Input::get();
		$InputFile = Input::file();
		foreach ($Input['ProductID'] as $key => $value) {
			# code...
			
		$i=0;
		$hasPic = "pic_";
		$hasPic .= $key;
		if (Input::hasFile($hasPic)){

			$result = ProductImg::where('ProductID','=',$key)->get()->toArray();
			$type_add = $Input['type_add'.$key.''];
			if(count($result)){
				//echo"<pre>";print_r($result);echo "</pre>";
				
				if($type_add=='2'){
					foreach ($result as $kr => $vr) {
				# code...
					@unlink($destinationPath1."/".$vr['ProductIMG']);
					@unlink($destinationPath2."/".$vr['ProductIMG']);
					}
				}
		
			}

			if($type_add=='2'){
				$delete = ProductImg::where('ProductID', '=',$key)->delete();
			}
			$pic = "pic_";
			$pic .= $key;
			foreach(Input::file($pic) as $key2 => $value2){

				$file = $InputFile[$pic][$i];

				$fileNameOri = $file->getClientOriginalName();
				$fileNameOriEx  = explode('.',$fileNameOri);
				$fileType = $fileNameOriEx[1];

				$fileName = date('Ymdhis').$i.$j.".".$fileType;

				



				$file->move($destinationPath1, $fileName);

				

				//add copy right
				//$myCopyright = imagecreatefrompng(public_path().'/img/water_mask1_200.png');
				$myCopyright = imagecreatefromjpeg(public_path().'/img/water_mask1_350.jpg');
				$srcWidth = imagesx($myCopyright);
				$srcHeight = imagesy($myCopyright);
				$myImage = "";

				//echo $srcWidth.">>".$srcHeight."<b>";
				//echo $fileNameOriEx[1]."<br>";
				if(preg_match('/jpg|jpeg/',$fileType)){
					$myImage=imagecreatefromjpeg($destinationPath1."/".$fileName);
				}
				if(preg_match('/png/',$fileType)){
					$myImage=imagecreatefrompng($destinationPath1."/".$fileName);
				}
				///echo $myImage;
				//exit();
				$destWidth = imagesx($myImage);
				$destHeight = imagesy($myImage);

				//echo $destWidth.">>".$destHeight."<b>";

				$destX = ($destWidth - $srcWidth) / 2;
				$destY = ($destHeight - $srcHeight) / 1;

				//$myImageThumb = $myImage;

				$white = imagecolorexact($myCopyright, 255, 255, 255);
				//imagecolortransparent($myCopyright, $white);

				imagecopymerge($myImage, $myCopyright, $destX, $destY, 0, 0, $srcWidth, $srcHeight, 50);

				//imagecopymerge($myImageThumb, $myCopyright, $destX, $destY, 0, 0,400,300, 50);

				if(preg_match('/jpg|jpeg/',$fileType)){
					imagejpeg($myImage,$destinationPath1."/".$fileName);

					imagejpeg($myImage,$destinationPath2."/".$fileName);
				}
				if(preg_match('/png/',$fileType)){
					imagepng($myImage,$destinationPath1."/".$fileName);
					imagepng($myImage,$destinationPath2."/".$fileName);
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
				

				//copy($path, $target);
				//create thumb
				//$this->createthumb($target,$target,400,400);
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
		catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
}

public function deletePic(){
	$delete = ProductImg::where('ProductImgID', '=',$_POST['ProductImgID'])->delete();
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