<?php
include("webHead.php");
?>
<div class="col-sm-12" style="background:#FFF;">
<script>
window.location.href="#list";
</script>
<!--  header("Content-type:application/pdf");
header("Content-Disposition:attachment;filename='downloaded.pdf'"); -->

<!-- content -->
<!-- 		// [OrderID] => 201410000015
	 //    [UserID] => 
	 //    [OrderDate] => 2014-10-27 14:52:15
	 //    [DeliveredDate] => 
	 //    [PaymantDate] => 
	 //    [PaymentDetail] => 
	 //    [FullName] => aaaaaa bb
	 //    [Address] => s
	 //    [TelNumber] => 1111111111
	 //    [PostCode] => 30000
	 //    [Email] => aaaa@aaaa.com
	 //    [OrderStatus] => 0
	 //    [StatusNew] => 1
	 //    [order_detail] => Array
	 //        (
	 //            [0] => Array
	 //                (
	 //                    [AutoID] => 17
	 //                    [OrderID] => 201410000015
	 //                    [ProductID] => 1
	 //                    [ProductName] => กระจกมองหลัง
	 //                    [OrderAmount] => 1
	 //                    [ProductPrice] => 450
	 //                    [OrderPriceTotal] => 450
	 //                )

	 //        ) -->

<div class="col-sm-12"> </div>
<div class="col-sm-12">
<center>
<h3 style="color:#5AD10A;">สั่งซื้อสินค้าเรียบร้อย</h3>
<h1><i class="glyphicon glyphicon-barcode"></i><i class="glyphicon glyphicon-barcode"></i><i class="glyphicon glyphicon-barcode"></i></h1>
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
<h5><b>โทร.</b> <?php echo $detail['TelNumber']?></h5>
</div>
<div class="col-sm-6"><b>Email</b> : <?php echo $detail['Email']?></div>

<!-- /content -->

</div>
<?php
include("webFoot.php");
?>