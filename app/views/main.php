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

<!-- <div class="col-sm-12" style="background:rgba(255,0,20,0.7);padding:20px;"><h3 style="color:#FFF;">วิธีการสั่งซื้อ</h3></div> -->
<div class="head-marquee shadow-line" style="background:rgba(255,0,20,0.8);margin-top:15px; color:#fff;">

<span id="list"></span>
  <b><h5>MX1 Shop ศูนย์รวมสินค้าคุณภาพสำหรับคุณ</h5></b>
</div>
<?php 
$i=1;

if($a==0){
?>
<div class="col-sm-12" style=" padding:0 20px 0 20px;">
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

          <a href="main/<?php echo $pvalue['ProductID']?>" style="text-decoration:none;">

          <div class="ProductPic" 
          style="background:url(img/product_tmp/<?php echo @$coverImg[$pvalue['ProductID']];?>);
                  background-position:center;
                  background-size:cover;
                  background-repeat:no-repeat;">
          </div>
          

          <div style="padding:13px 0 0 7px;color:#555;font-size:14px;"><b>ชื่อสินค้า : <?php echo $pvalue['ProductName'];?></b></div>
          <div style="padding:7px 0 0 7px;color:#888;font-size:14px;"><b>รหัสสินค้า : </b><?php echo str_pad($pvalue['ProductID'], 7 , '0' , STR_PAD_LEFT);?></div>
          <div style="padding:7px 0 0 7px;color:#888;font-size:14px;"><b>ราคา : <?php echo number_format($pvalue['ProductSalePrice']);?>฿</b></div>
          </a>
</div>

<?php
  $i++;
}
?>
 <div class="col-sm-12" style="text-align:center;" ><?php echo $productlist->links(); ?></div>
<div class="col-sm-12" style="height:200px;"></div>
<!-- !right side -->


<!-- /content -->


<?php
include("webFoot.php");
?>