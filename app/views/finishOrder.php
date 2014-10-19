<?php
include("webHead.php");

?>
<script>
window.location.href="#list";
</script>
<!-- content  -->
<div class="headtag col-lg-4"><h4 class="textwhite headtext" style="color:#888;">ตระกร้า</h4></div>
<div style="border:2px solid #F22; margin:40px 0px 0 8px; border-radius:0px; width:98%; border-top-left-radius:5px;border-top-right-radius:5px;"></div>
<div style="padding-left:20px;"><h2 class="title-text-x">รายการสินค้าในตระกร้า</h2></div>
<div style="padding-left:0px;"><br/>
<?php
 // [detail] => Array
 //                (
 //                    [ProductID] => 4
 //                    [ProductName] => ไฟหน้า
 //                    [ProductLastCost] => 
 //                    [ProductSalePrice] => 2200
 //                    [ProductAmount] => 1
 //                    [ProductShortDESC] => 
 //                    [ProductDESC] => 
 //                    [ProductDate] => 2014-10-10
 //                    [ProductStatus] => 1
 //                    [ProductCode] => 
 //                    [product_img] => Array
 //                        (
 //                            [0] => Array
 //                                (
 //                                    [ProductImgID] => 24
 //                                    [ProductID] => 4
 //                                    [ProductIMG] => 2014101602124800.jpg
 //                                    [ProductThumb] => 
 //                                    [StatusFirst] => 2
 //                                )
// echo "<pre>";
// print_r($productInCart);exit;
?>
<div class="panel panel-default" style="margin:10px;">
  <!-- Default panel contents -->
  
  <table class="table"> 
  <tr class="tr-head">
    <td class="table-head" width="30px;" ></td>
    <td class="table-head" ></td>
    <td class="table-head" >สินค้า</td>
    <td class="table-head"  width="100px;">ราคา</td>
    <td class="table-head"  width="100px;">จำนวน</td>
    <td class="table-head"  width="100px;">รวม</td>
  </tr>
  <?php
  if(empty($productInCart))
  {
    ?>
    <tr style="color:#666; font-weight:bold;">
      <td colspan="6" style="color:#888;padding:15px;">ยังไม่มีสินค้าในตะกร้า</td>
    </tr>
    <?php
  }
  $total = 0;
  foreach ($productInCart as $key => $value) {
  ?>
  <tr style="color:#666; font-weight:bold;">
    <td class="table-head" style="font-size:10px;"><a href="<?php echo Request::root()?>/cancelOrder/<?php echo $key;?>"><i  class="glyphicon glyphicon-remove cancel-order"></i></a></td>
    <td  class"picCart"><a href="<?php echo Request::root()?>/main/<?php echo $value['detail']['ProductID'];?>">
    <div class="  productPictmp" style="background:url(<?php echo $path;?>img/product_tmp/<?php echo @$value['detail']['product_cover'][0]['ProductIMG'];?>);
                  background-position:center;
                  background-size:cover;
                  background-repeat:no-repeat; border-radius:10px;
                  margin:0px;">
    </div></a>
    </td>
    <td class="table-head" ><a href="<?php echo Request::root()?>/main/<?php echo $value['detail']['ProductID'];?>"><h5><?php echo $value['detail']['ProductName'];?></h5></td>
    <td class="table-head" ><h5><?php echo number_format($value['detail']['ProductSalePrice']);?> ฿</h5></td>
    <td class="table-head" ><h5><?php echo $value['amount'];?></h5></td>
    <td class="table-head" ><h5><?php $sum = (intval($value['amount'])*intval($value['detail']['ProductSalePrice'])); 
                                      echo number_format($sum);?> ฿</h5></td>
  </tr>
  <?php
    $total += $sum;
  }
  ?>
  </table>
</div>

<div class="col-sm-6" style="float:right; width:45%;text-align:right;padding:5px 30px 10px 0; color:#555;"><span style="font-size:18px;">ยอดรวมทั้งหมด</span>  <span style="font-size:24px;"><?php echo number_format($total);?> ฿</span></div>

<div class="col-sm-6">
<button class="btn btn-default" onclick="window.location.reload();" style="z-index:9999; margin-top:10px;"><i class="glyphicon glyphicon-refresh"></i> อัพเดทรายการสินค้า</button>
<a href="<?php echo Request::root();?>/billing"><button class="btn btn-success" style="margin-top:10px;z-index:9999;"><i class="glyphicon glyphicon-chevron-right"></i> ดำเนินการสั่งซื้อ</button></a>
</div>

<div style="height:200px; width:100%;"></div>
<!-- /content -->


<?php
include("webFoot.php");
?>