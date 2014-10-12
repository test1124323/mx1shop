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
<div class="col-sm-11" style="padding:0;">
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
<div class="col-sm-12" align="center">
<img src="img/ebsblT.png">
<h3 style="color:#FF2244;">รายละเอียดสินค้า</h3>
<img src="img/underline3.png">
</div>
<!-- /content -->


<?php
include("webFoot.php");
?>