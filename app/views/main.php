<?php
include("webHead.php");
?>

<!-- content  -->

<div class="col-xs-12" style=" background:#F6F6F6;padding:0px;">
<!-- left side -->
<div class="col-sm-3" style="padding:10px 10px 0 10px;">
<!-- <h4>Search</h4> -->
<div class="input-group col-sm-12" style="background:#E9E9E9;padding:4px 14px 14px 14px;border-radius:4px;width:100%;">
<form name="search" method="post" action="">
      <div class="search-text">Search</div>
      <input type="text" class="form-control" placeholder='ค้นหาสินค้า'><br/><br/>
      <select class="form-control" style="border-radius:30px;">
        <option class="option-pad">--ทุกหมวดหมู่--</option>
      </select>
      <br/><br/>
      <button class="btn btn-default col-sm-6" type="submit" style="float:right">ค้นหา</button>
</form>
</div><!-- /input-group -->

<div class="side-cate">
  <h3>สินค้าใหม่</h3>
  <ul class="list-group">
    <li class="list-group-item catelist"><a href="#"> Cras justo odio</a></li>
    <li class="list-group-item catelist"><a href="#">  Dapibus ac facilisis in</a></li>
    <li class="list-group-item catelist"><a href="#">  Morbi leo risus</a></li>
    <li class="list-group-item catelist"><a href="#">  Porta ac consectetur ac</a></li>
    <li class="list-group-item catelist"><a href="#">  Vestibulum at eros</a></li>
  </ul>

  <h3>หมวดหมู่</h3>
    

  <ul class="list-group">
  
  <?php 
    foreach ($cate1 as $k1 => $v1) {
      ?>
      <li class="list-group-item catelist" style="font-size:17px;"><a href="?cate=<?php echo $v1['CateParentID'];?>"><?php echo $v1['CategoryName'];?></a></li>
      <?php
      foreach ($cate2 as $k2 => $v2) {
        if($v2['CateParentID']==$v1['CategoryID']){
          ?>
            <li class="list-group-item catelist"><a style="color:#F77" href="?cate=<?php echo $v2['CateParentID'];?>"> - <?php echo $v2['CategoryName'];?></a></li>
          <?php
        }
      }
    }
  ?>
  </ul>
</div>

</div>


<!-- !left side -->


<!-- right side -->

<div class="col-sm-9" style="padding:0px;">
<div class="head-marquee">
<span id="list"></span>
  <marquee><b><h5>MX1 Shop ศูนย์รวมสินค้าคุณภาพสำหรับคุณ</h5></b></marquee>
</div>
<?php 
$i=1;
// echo "<pre>";
// print_r($productlist[0]['product_img'][0]['ProductIMG']);exit;
foreach ($productlist as $pkey => $pvalue) { 
  $size = ($i>2)?'4':'6';
 ?>
<div class="col-sm-<?php echo $size?> product-head">
          <div class="ProductPic" 
          style="background:url(img/product_tmp/<?php echo @$pvalue['product_img'][0]['ProductIMG']?>);
                  background-position:center;
                  background-size:cover;
                  background-repeat:no-repeat;">
          </div>

          <div style="padding:10px 0 0 7px;color:#888;font-size:14px;">รหัสสินค้า : <?php echo str_pad($pvalue['ProductID'], 7 , '0' , STR_PAD_LEFT);?></div>
          <div style="padding:7px 0 0 7px;color:#888;font-size:14px;">ชื่อสินค้า : <?php echo $pvalue['ProductName'];?></div>
          <div style="padding:7px 0 0 7px;color:#888;font-size:14px;">ราคา : <b><?php echo number_format($pvalue['ProductSalePrice']);?>฿</b></div>
</div>

<?php
  $i++;
}
?>
 


</div>
<!-- !right side -->
</div>

<!-- /content -->


<?php
include("webFoot.php");
?>