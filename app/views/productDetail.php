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
    width:'95%'
  });
}
</script>
<!-- content  -->
<div class="headtag col-lg-4"><h4 class="textwhite headtext" style="color:#888;">รายละเอียดสินค้า</h4></div>
<div style="border:2px solid #F22; margin:40px 0px 0 8px; border-radius:0px; width:98%; border-top-left-radius:5px;border-top-right-radius:5px;"></div>
<div style="padding-left:20px;"><h2 class="title-text-x"><?php echo $detail['ProductName']?></h2></div>
<div style="padding-left:0px;"><br/>
<?php       
            // [ProductImgID] => 1
            // [ProductID] => 10
            // [ProductIMG] => S__3940401.jpg
            // [ProductThumb] => S__3940401.jpg
            // [StatusFirst] => 1
foreach ($detail['product_img'] as $key => $value) {
  $style    = '95%';
  if($value['StatusFirst']!=1){
    $style  = '0';
  }

  ?>
<div class="col-sm-12" id="Ppic_<?php echo @++$a;?>" style="padding:0px;border:solid 2px #FFF; box-shadow:0 -2px 10px rgba(100,100,100,0.4);width:<?php echo $style;?>;float:left;">
    <div class="ProductPicDetail " style="background:url(img/product/<?php echo $value['ProductIMG']?>);
                  background-position:center;
                  background-size:cover;
                  background-repeat:no-repeat; border:none;" >
    </div>
</div>

  <?php
}?>

<div class="col-xs-12" style="padding:0;z-index:9999">
<?php foreach ($detail['product_img'] as $key => $value) {
  ?>

  <div class="col-xs-1" style="padding:0; width:70px;cursor:pointer; z-index:99999;"  id="pic_<?php echo @++$i;?>" onclick="switchImg(<?php echo $i;?>);">
    <div class="  productPictmp" style="background:url(img/product_tmp/<?php echo $value['ProductIMG']?>);
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
    <!-- <img src="img/ebsblT.png" width="100%">
    <center><h3 style="color:#E21;text-shadow:1px 1px 0px rgba(0,0,0,0.1);">รายละเอียดสินค้า</h3></center>
    <img src="img/underline3.png" width="100%"> -->
    <i><h3>รายละเอียดสินค้า</h3></i>
    <hr>
                    <span style="font-size: 15px !important;"><?php echo $detail['ProductDESC']?></span>
    <br/><br/>
  </div>
  <!-- =================== -->
  <div class="col-sm-5 price-box" >
    <div style=" " class="col-sm-12">
      <div class="col-sm-12" style="text-align:center;padding:3px;font-size:18px;" >รหัสสินค้า <b><?php echo str_pad($detail['ProductID'], 7 , '0',STR_PAD_LEFT);?></b></div>
      <div class="col-sm-12" style="text-align:center;background:#7FA92D;color:#FFF;padding:3px;font-size:24px;" >ราคา <?php echo $detail['ProductSalePrice']?>฿</div>
    </div>
    <div class="col-sm-12">
        <div class="input-group " style="margin:10px 0 10px 0;">
          <span class="input-group-addon">จำนวน</span>
          <input type="number" class="form-control" style="border-radius:0px !important;" min = '0' value="0">
        </div>
        <button class="btn btn-default" style="color:#FFF;background:#666;border-radius:2px !important;"><img src="img/cart.png" width="23px">หยิบใส่รถเข็น</button>

    </div>

  </div>

</div>

<div class="col-sm-12" style="height:200px;"></div>
<!-- /content -->


<?php
include("webFoot.php");
?>