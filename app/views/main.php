<?php
include("webHead.php");
if(Input::has('cate')){
  ?>
<script>
  
  window.location.href="#list";

</script>
  <?php
}
?>

<!-- content  -->



<!-- right side -->

<div class="col-sm-9" style="padding:0px;">
<div class="head-marquee">
<span id="list"></span>
  <marquee><b><h5>MX1 Shop ศูนย์รวมสินค้าคุณภาพสำหรับคุณ</h5></b></marquee>
</div>
<?php 
$i=1;
  

if(empty($productlist)){
?>
<div style=" padding:0 20px 0 20px;">
<pre style="font-size:20px; color:#999; text-shadow:1px 2px 0px rgba(255,255,255,0.8); background:#FCFCFC;" align="center">
ไม่พบผลการค้นหา
</pre>
</div>
<?php
}
foreach ($productlist as $pkey => $pvalue) { 
  $size = ($i>2)?'4':'6';
 ?>
<div class="col-sm-<?php echo $size?> product-head">
          <a href="<?php echo $pvalue['ProductID']?>">
          <div class="ProductPic" 
          style="background:url(img/product_tmp/<?php echo @$pvalue['product_img'][0]['ProductIMG']?>);
                  background-position:center;
                  background-size:cover;
                  background-repeat:no-repeat;">
          </div>
          </a>

          <div style="padding:13px 0 0 7px;color:#888;font-size:14px;"><b>รหัสสินค้า : </b><?php echo str_pad($pvalue['ProductID'], 7 , '0' , STR_PAD_LEFT);?></div>
          <div style="padding:7px 0 0 7px;color:#888;font-size:14px;"><b>ชื่อสินค้า : </b><?php echo $pvalue['ProductName'];?></div>
          <div style="padding:7px 0 0 7px;color:#888;font-size:14px;"><b>ราคา : <?php echo number_format($pvalue['ProductSalePrice']);?>฿</b></div>
</div>

<?php
  $i++;
}
?>
 


</div>
<!-- !right side -->


<!-- /content -->


<?php
include("webFoot.php");
?>