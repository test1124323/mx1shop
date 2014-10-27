<?php
include("webHead.php");
?>
<script>
window.location.href="#list";
</script>
 
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
<center>
<h3>สั่งซื้อสินค้าเรียบร้อย</h3><br/>
<h4>รหัสการสั่งซื้อ <?php echo $detail['OrderID']?> ผู้สั่งสินค้า <?php echo $detail['FullName']?></h4>

<h5>ที่อยู่ในการจัดส่งสินค้า <?php echo $detail['Address']?> <?php echo $detail['PostCode']?> โทร. <?php echo $detail['TelNumber']?></h5>
<h5>Email <?php echo $detail['Email']?></h5>
</center>
<!-- /content -->


<?php
include("webFoot.php");
?>