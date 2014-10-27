<?php
include("webHead.php");

?>
<script>
window.location.href="#list";

function switchImg(id){
  for(var i=1;i<=<?php echo $imgCount;?>;i++){
    if(i!=id){
      $("#Ppic_"+i).animate({
         width:'0'
      });
    }
  }
  $("#Ppic_"+id).animate({
    width:'90%'
  });
}
</script>
<!-- content  -->

<div class="headtag col-lg-4"><h4 class="textwhite headtext" style="color:#888;">รายละเอียดสินค้า</h4></div>
<div style="border:2px solid #F22; margin:40px 0px 0 8px; border-radius:0px; width:98%; border-top-left-radius:5px;border-top-right-radius:5px;"></div>
<div style="padding-left:20px;"><h2 class="title-text-x"><?php echo $detail['ProductName']?></h2></div>
<?php if(Input::has('updated')&&Input::get('updated')=='1') {?>
<div class="alert alert-info" role="alert">เพิ่ม <?php echo $detail['ProductName']?> ลงในตระกร้าเรียบร้อยแล้ว หากต้องการตรวจสอบรายการ <a href="<?php echo Request::root();?>/cart">คลิกที่นี่</a></div>
<?php }?>
<?php if(Input::has('updated')&&Input::get('updated')=='2') {?>
<div class="alert alert-danger" role="alert"><i class="glyphicon glyphicon-remove-sign" style="font-size:20px;"></i>  สินค้าไม่พอ</div>
<?php }?>
<div style="padding-left:0px;"><br/>

<?php       
if($imgCount==0){

  ?>
<div class="col-sm-12" id="Ppic_<?php echo @++$a;?>" style="padding:0px;border:solid 2px #FFF; box-shadow:0 -2px 10px rgba(100,100,100,0.4);float:left;">
    <div class="ProductPicDetail " style="background:url(<?php echo $path;?>img/product/noimage.png);
                  background-position:center;
                  background-size:cover;
                  background-repeat:no-repeat; border:none;" >
    </div>
</div>

  <?php
}?>

<?php       
foreach ($detail['product_img'] as $key => $value) {
  $style    = '90%';
  if($value['StatusFirst']!=1){
    $style  = '0';
  }

  ?>
<div class="col-sm-12" id="Ppic_<?php echo @++$a;?>" style="padding:0px;border:solid 2px #FFF; box-shadow:0 -2px 10px rgba(100,100,100,0.4);width:<?php echo $style;?>;float:left;">
    <div class="ProductPicDetail " style="background:url(<?php echo $path;?>img/product/<?php echo $value['ProductIMG']?>);
                  background-position:center;
                  background-size:contain;
                  background-repeat:no-repeat; border:none;" >
    </div>
</div>

  <?php
}?>

<div class="col-xs-12" style="padding:0;z-index:9999">
<?php foreach ($detail['product_img'] as $key => $value) {
  ?>

  <div class="col-xs-1" style="padding:0; width:70px;cursor:pointer; z-index:99999;"  id="pic_<?php echo @++$i;?>" onclick="switchImg(<?php echo $i;?>);">
    <div class="  productPictmp" style="background:url(<?php echo $path;?>img/product_tmp/<?php echo $value['ProductIMG']?>);
                  background-position:center;
                  background-size:cover;
                  background-repeat:no-repeat;">
    </div>
  </div>

  <?php
}?>

</div>

</div>

<div class="col-sm-12"> 

  <div class="col-sm-7 description" align="left" >
    <i><h3>รายละเอียดสินค้า</h3></i>
    <hr>
                    <span style="font-size: 15px !important;"><?php echo $detail['ProductDESC']?></span>
    <br/><br/>
  </div>
  <!-- =================== -->
  <div class="col-sm-5 price-box" >
    <div style=" " class="col-sm-12">
      <div class="col-sm-12" style="text-align:center;padding:3px;font-size:18px;" >รหัสสินค้า <b><?php echo str_pad($detail['ProductID'], 7 , '0',STR_PAD_LEFT);?></b></div>
      <div class="col-sm-12" style="text-align:center;padding:3px;font-size:14px;color:#FF7799;" >สินค้าคงเหลือจำนวน <span style="font-size:16px"><?php echo $detail['ProductAmount']?></span> ชิ้น</b></div>
      <div class="col-sm-12" style="text-align:center;background:#7FA92D;color:#FFF;padding:3px;font-size:24px;" >ราคา <?php echo number_format($detail['ProductSalePrice']);?>฿</div>
    </div>
    <div class="col-sm-12">
    <form name="orderForm" method="post" action="../cartStore/<?php echo $detail['ProductID']?>">
        <input type="hidden" name="_method" value="put">
       
        <div class="input-group " style="margin:10px 0 10px 0;">
          <span class="input-group-addon">สั่งซื้อจำนวน</span> 
          <input type="number" class="form-control" id="ProductCount" name="ProductCount" style="border-radius:0px !important;text-align:right;" min = '1' value="1">
          <span class="input-group-addon">ชิ้น</span>
        </div>
        <button type="submit" class="btn btn-default" style="color:#FFF;background:#666;border-radius:2px !important;"><img src="<?php echo $path;?>img/cart.png" width="23px">หยิบใส่ตะกร้า</button>
    </form>
    </div>

  </div>

</div>

<div class="col-sm-12" style="height:200px;"></div>
<!-- /content -->


<?php
include("webFoot.php");
?>