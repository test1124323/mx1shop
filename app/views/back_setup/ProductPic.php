<?php
$act = '3';
include("backHeader.php");
include("function.php");
$ImgPath = public_path().'/img/product/';
?>
<script type="text/javascript">
  function confirm_save(){
    if(confirm("ยืนยันการบันทึกอีกครั้ง")){
      return true;
    }
    return false;
  }
  function change_first(ProductID,ProductImgID){
    var path = $('#rootPath').val();
    var url = path+"backoffice/UpdateStatusPic";
    var data = {ProductID:ProductID,ProductImgID:ProductImgID};
    $.post(url,data,function(msg){
      //alert(msg);
    });

    //alert(ProductID+">>"+ProductImgID);
  }
  function deletePic(id,ProductImgID){
    //alert(ProductImgID);
    if(confirm('ยืนยันการลบภาพ อีกครั้ง')){
      $('#'+id).remove();
      var path = $('#rootPath').val();
      var url = path+"backoffice/deletePic";
      var data = {ProductImgID:ProductImgID};
      $.post(url,data,function(msg){
      //alert(msg);
      });
    }
  }
</script>

<ol class="breadcrumb" style="margin-top:-15px;">
  <li><a href="#">หน้าแรก</a></li>
  <li><a href="<?php echo $arr_menuLink[3];?>">รายการสินค้า</a></li>
  <li class="active">จัดการรูปภาพ</li>
</ol>
<div class="panel panel-default" style="margin-top:-20px;">
  <div class="panel-body">

<div class="panel panel-primary" style="width:100%;">
	<div class="panel-heading">
		<h3 class="panel-title"><i class='glyphicon glyphicon-cog'></i> จัดการรายการสินค้า</h3>
	</div>
	<div class="panel-body">
  <form method="post" id="form-input" action="ProductPicManage" enctype="multipart/form-data" onsubmit="return confirm_save();">

  <input  type="hidden" name="_method" value="POST">
  <div class="table-responsive" style="margin-top:10px;">
    <table class="table table-hover table-bordered"  id="tb_data">
    	<thead class="bg_tb">
    		<tr>
    			<th width="5%"><div style=" text-align: center;">ลำดับ</div></th>
    			<th width="20%"><div  style=" text-align: center;">ชื่อรายการสินค้า</div></th>
    			<th width="20%"><div style=" text-align: center;">อัฟโหลด</div></th>     			
    			<th width="55%"><div style=" text-align: center;">รูปภาพ</div></th>
    			
    		</tr>
    	</thead>
    	<tbody>
      <?php
      
if($result){
  $i=0;
  foreach ($result as $key => $value) {
    # code...
    ?>
    <tr>
      <td><?php echo ++$i.".";?></td>
      <td><input type="hidden" name="ProductID[<?php echo $value['ProductID'];?>]" value="<?php echo $value['ProductID'];?>">
      <?php echo $value['ProductName'];?></td>
      <td>
      <div>
        <input  class="form-control"  type="file" name="pic_<?php echo $value['ProductID'];?>[]" id="pic_<?php echo $value['ProductID'];?>" multiple >
       </div>
       <div>
         <label><input type="radio" name="type_add<?php echo $value['ProductID'];?>" value="1" checked> เก็บภาพเดิมไว้</label>
         <label><input type="radio" name="type_add<?php echo $value['ProductID'];?>" value="2"> ลบภาพเดิมทิ้งทั้งหมด</label>
       </div> 
      </td>
       <td>
       <?php 
       
       //echo "<pre>";print_r($value['product_img']);echo "</pre>";
          if($value['product_img']){
            foreach ($value['product_img'] as $keyImg => $valueImg) {
              # code...
              ?>
              <div class="col-sm-4" id="pic_<?php echo $valueImg['ProductImgID']?>">
                <img src="<?php echo $path."img/product/".$valueImg['ProductIMG'];?>" width="200px" height="100px;">
                <div class="caption">
                  <label>
                  <input type="radio" <?php echo ($valueImg['StatusFirst']=='1')?"checked":"";?> 
                  name="productID_<?php echo $value['ProductID'];?>" value="1" onClick="change_first('<?php echo $value["ProductID"];?>','<?php echo $valueImg["ProductImgID"];?>');"> ตั้งเป็นภาพแรก</label>
                <button type="button" class="btn btn-danger btn-xs" onclick="deletePic('<?php echo "pic_".$valueImg["ProductImgID"];?>','<?php echo $valueImg["ProductImgID"];?>');"><i class="glyphicon glyphicon-trash"></i> ลบ</button>
                </div>
              </div>
              <?php
            }

          }
       ?></td>
    </tr>
    <?php
  }
}
      ?>
    	</tbody>
    </table>
   </div>
   <div style="text-align:center">
   <button class="btn btn-primary btn-sm" type="submit"><i class="glyphicon glyphicon-saved"></i> บันทึกข้อมูล</button>
   <a href="<?php echo $path."backoffice/Product";?>">
   <button class="btn btn-default btn-sm" type="button"><i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ</button></a>
   </div>    
  </form>
</div>
</div>
</div><!--panel-body-->
</div><!--panel panel-default-->
<?php 
include("backFoot.php");
?>