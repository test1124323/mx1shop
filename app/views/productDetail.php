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
<?php foreach ($detail['product_img'] as $key => $value) {
  ?>
  <div align="center" style="background:#FDFDFD;padding:0;">
  <div style="width:90%;">
    <div class="ProductPicDetail" style="background:url(img/product/<?php echo $value['ProductIMG']?>);
                  background-position:center;
                  background-size:cover;
                  background-repeat:no-repeat;" >
    </div>
  </div>
  </div>
  <?php
}?>
</div>

<!-- /content -->


<?php
include("webFoot.php");
?>