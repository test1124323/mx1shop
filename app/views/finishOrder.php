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
    <td class="table-head"  width="100px;" ></td>
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
  foreach ($productInCart as $key => $value) {
  ?>
 
  <tr style="color:#666; font-weight:bold;">
    <td class="table-head" style="font-size:10px;"><a href="<?php echo Request::root()?>/cancelOrder/<?php echo $key;?>"><i  class="glyphicon glyphicon-remove cancel-order"></i></a></td>
    <td >
    <div class="  productPictmp" style="background:url(<?php echo $path;?>img/product_tmp/<?php echo $value['detail']['product_cover'][0]['ProductIMG'];?>);
                  background-position:center;
                  background-size:cover;
                  background-repeat:no-repeat; border-radius:10px;
                  margin:0px;">
    </div>
    </td>
    <td class="table-head" ><a href="<?php echo Request::root()?>/main/<?php echo $value['detail']['ProductID'];?>"><h5><?php echo $value['detail']['ProductName'];?></h5></td>
    <td class="table-head" ><h5><?php echo number_format($value['detail']['ProductSalePrice']);?> ฿</h5></td>
    <td class="table-head" ><h5><?php echo $value['amount'];?></h5></td>
    <td class="table-head" ><h5><?php echo number_format(intval($value['amount'])*intval($value['detail']['ProductSalePrice']));?> ฿</h5></td>
  </tr>
  <?php
  }
  ?>
  </table>
</div>

<div class="panel-heading" style="float:right;">
<button class="btn btn-default" onclick="window.location.reload();"><i class="glyphicon glyphicon-refresh"></i> อัพเดทรายการสินค้า</button>
<button class="btn btn-success"><i class="glyphicon glyphicon-chevron-right"></i> ดำเนินการสั่งซื้อ</button>
</div>

<div class="col-sm-12" style="height:200px;"></div>
<!-- /content -->


<?php
include("webFoot.php");
?>