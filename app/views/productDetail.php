<?php
include("webHead.php");

?>
<script>
    window.location.href="#list";
</script>
<!-- content  -->
<div class="headtag col-lg-4"><h4 class="textwhite headtext" style="color:#888;">รายละเอียดสินค้า</h4></div>
<div style="border:2px solid #F22; margin:40px 0px 0 8px; border-radius:0px; width:98%; border-top-left-radius:5px;border-top-right-radius:5px;"></div>
<div style="padding-left:20px;"><h2 class="title-text-x"><?php echo $detail['ProductName']?></h2></div>
<div style="padding-left:10px;"><br/>
<div class="col-sm-12" style="padding:0px;border:solid 5px #FFF; box-shadow:0 -2px 10px rgba(100,100,100,0.4);">
    <div class="ProductPicDetail " style="background:url(img/product/S__3940401.jpg);
                  background-position:center;
                  background-size:cover;
                  background-repeat:no-repeat; border:none;" >
    </div>
</div>
<div class="col-sm-12" style="padding:0;">
<?php foreach ($detail['product_img'] as $key => $value) {
  ?>

  <div class="col-xs-1" style="padding:0; width:70px;">
    <div class="  productPictmp" style="background:url(img/product/<?php echo $value['ProductIMG']?>);
                  background-position:center;
                  background-size:cover;
                  background-repeat:no-repeat;" >
    </div>
  </div>

  <?php
}?>
<?php foreach ($detail['product_img'] as $key => $value) {
  ?>

  <div class="col-xs-1" style="padding:0; width:70px;">
    <div class="  productPictmp" style="background:url(img/product/<?php echo $value['ProductIMG']?>);
                  background-position:center;
                  background-size:cover;
                  background-repeat:no-repeat;" >
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
    <div style="font-size:23px;"><i>รายละเอียดสินค้า</i></div>
    <hr>
                    <span style="font-size: 15px !important;"><?php echo $detail['ProductDESC']?></span>
    <br/><br/>
  </div>
  <!-- =================== -->
  <div class="col-sm-5 price-box" >
    <div style="text-align:right;" ><h1><?php echo $detail['ProductSalePrice']?>฿</h1></div>
  </div>

</div>

<div class="col-sm-12" style="height:200px;"></div>
<!-- /content -->


<?php
include("webFoot.php");
?>