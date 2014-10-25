<?php 
function showModal($id='myModal',$showdisp='showdisp1',$title){
echo '<form method="post" id="frm_pop">
<div class="modal fade" id="'.$id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" width="200px">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">'.$title.'</h4>
      </div>
      <div class="modal-body" id="'.$showdisp.'">
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary"  onClick="savePop();">บันทึกข้อมูล</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>';
}

function objectToArray($d) 
{
    if (is_object($d)) {
        // Gets the properties of the given object
        // with get_object_vars function
        $d = get_object_vars($d);
    }

    if (is_array($d)) {
        /*
        * Return array converted to object
        * Using __FUNCTION__ (Magic constant)
        * for recursive call
        */
        return array_map(__FUNCTION__, $d);
    } else {
        // Return array
        return $d;
    }
}
function createthumb($name,$filename,$new_w,$new_h){
  $system=explode('.',$name);
  if(preg_match('/jpg|jpeg/',$system[1])){
    $src_img=imagecreatefromjpeg($name);
  }
  if(preg_match('/png/',$system[1])){
    $src_img=imagecreatefrompng($name);
  }

  $old_x=imagesx($src_img);
  $old_y=imagesy($src_img);
  $thumb_w=($old_x*$new_h)/$old_y;
  $thumb_h=$new_h;
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
function ArrOrderStatus(){
  return $arr_OrderStatus = array(
  ''=>'เลือก',
  '0'=>'รอยืนยันการสั่งซื้อ',
  '1'=>'ยืนยันการสั่งซื้อ',
  '2'=>'รอการชำระเงิน',
  '3'=>'ชำระเงินเรียบร้อย',
  '4'=>'จัดส่งเรียบร้อย',
  '5'=>'ยกเลิกรายการ');
}
function DateCurrent(){
  return date('d/m/')."".(date('Y')+543);
}
function conv_date($date){
   $str="";
  if($date!=""&&$date!="0000-00-00"){
  $val1  = explode(" ", $date);
  $val = explode('-',$val1[0]);
  $str = $val[2]."/".$val[1]."/".($val[0]+543);

  if(isset($val1[1])){
    $str .= ($val1[1]!="")?" เมื่อเวลา ".$val1[1]:"";
  }
  
  }
return $str;
}
?>