<?php
include("webHead.php");
?>
<div class="col-sm-12" style="background:#FFF;" id="printarea">
<script>
window.location.href="#list";
</script>
<!--  header("Content-type:application/pdf");
header("Content-Disposition:attachment;filename='downloaded.pdf'"); -->

<div class="col-sm-12"> </div>
<div class="col-sm-12">
<center>
<div class="alert alert-success" role="alert"><b>ดำเนินการสั่งซื้อสินค้าเรียบร้อย</b></div>
<!-- <h1><i class="glyphicon glyphicon-barcode"></i><i class="glyphicon glyphicon-barcode"></i><i class="glyphicon glyphicon-barcode"></i></h1> -->
<div class="col-sm-12" align="right">
	<a href="<?php echo Request::root();?>/billingSave/<?php echo $detail['OrderID'];?>?mode=pdf" target="_blank"><button class="btn btn-default square flat-btn bill-btn " style="color:#666;"><i class="glyphicon glyphicon-save"></i> save pdf</button></a>
	<a href="<?php echo Request::root();?>/billingSave/<?php echo $detail['OrderID'];?>?mode=print" target="_blank"><button class="btn btn-default square flat-btn bill-btn " style="color:#666;"><i class="glyphicon glyphicon-print"></i> print</button></a>

</div>
<hr>
</div>
</center>
<div class="col-sm-5">
<h4>รหัสการสั่งซื้อ <?php echo $detail['OrderID']?></h4>
</div>
<div class="col-sm-6">
<h4>ผู้สั่งสินค้า <?php echo $detail['FullName']?></h4>
</div>
<div class="col-sm-12">
<h5><b>ที่อยู่ในการจัดส่งสินค้า</b> : <?php echo $detail['Address']?> <?php echo $detail['PostCode']?></h5>
</div>
<div class="col-sm-5">
<p><b>โทร.</b> <?php echo $detail['TelNumber']?></p>
<p><b>Email</b> : <?php echo $detail['Email']?></p>
<hr>
</div>
<div class="col-sm-12">
	<table class="table"> 
	  <tr class="tr-head">
	    <td class="table-head" width="120px;" ></td>
	    <td class="table-head" >สินค้า</td>
	    <td class="table-head"  width="100px;">ราคา</td>
	    <td class="table-head"  width="100px;">จำนวน</td>
	    <td class="table-head"  width="100px;">รวม</td>
	  </tr>
	  <?php
	  $productInCart	=	$detail['order_detail'];
	  if(empty($productInCart))
	  {
	    ?>
	    <tr style="color:#666; font-weight:bold;">
	      <td colspan="6" style="color:#888;padding:15px;">ยังไม่มีสินค้าในตะกร้าสินค้า</td>
	    </tr>
	    <?php
	  }
	  $total = 0;
	  foreach ($productInCart as $key => $value) {
	  	// Array ( [AutoID] => 19 [OrderID] => 201411000001 [ProductID] => 1 [ProductName] => กระจกมองหลัง [OrderAmount] => 1 [ProductPrice] => 450 [OrderPriceTotal] => 450 )
	  ?>
	  <tr style="color:#666; font-weight:bold;">
	    <td class="table-head" ><h5><?php echo @++$i;?></h5></td>
	    <td class="table-head" ><h5 style="text-align:left;"><?php echo $value['ProductName'];?></h5></td>
	    <td class="table-head" ><h5 style="text-align:right;"><?php echo empty($value['ProductPrice'])?"":number_format($value['ProductPrice'])." ฿";?></h5></td>
	    <td class="table-head" ><h5><?php echo empty($value['OrderAmount'])?"":$value['OrderAmount'];?></h5></td>
	    <td class="table-head" ><h5 style="text-align:right;"><?php echo number_format($value['OrderPriceTotal']);?> ฿</h5></td>
	  </tr>
	  <?php
	    $total += intval($value['OrderPriceTotal']);
	  }
	  ?>
	  <tr style="color:#666; font-weight:bold;">
	    <td class="table-head" ><h5></h5></td>
	    <td class="table-head" ><h3 style="text-align:left;">รวม</h3></td>
	    <td class="table-head" ><h5 style="text-align:right;"></h5></td>
	    <td class="table-head" ><h5></h5></td>
	    <td class="table-head" ><h3 style="text-align:right;"><?php echo number_format($total);?> ฿</h3></td>
	  </tr>
	  </table>

</div>
<style type="text/css">
	.about-to-pay{
		background: none;
	}
</style>
<?php include('aboutpay.php');?>
<div class="col-sm-12" style="height:200px;"></div>
</div>
<!-- /content -->

</div>
<?php
include("webFoot.php");
?>