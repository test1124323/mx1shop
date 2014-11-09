<?php
$path 	=	Request::root()."/";
?>
<meta charset="UTF-8">
<style type="text/css">
	table{
		border-collapse: collapse;
	}
	td{
		border-left:solid thin #999999;
		border-right:solid thin #999999;
		padding: 5px;
	}
</style>
<div class="col-sm-12" style="background:#FFF;" id="printarea">

<!--  header("Content-type:application/pdf");
header("Content-Disposition:attachment;filename='downloaded.pdf'"); -->

<div class="col-sm-12"> </div>
<div class="col-sm-12">

<h3><b>แจ้งชำระเงิน </b></h3>
<!-- <h1><i class="glyphicon glyphicon-barcode"></i><i class="glyphicon glyphicon-barcode"></i><i class="glyphicon glyphicon-barcode"></i></h1> -->
<div class="col-sm-12" align="right">
	
</div>
<hr>
</div>

<div class="col-sm-5">
<h4>รหัสการสั่งซื้อ <?php echo $detail['OrderID']?></h4>
</div>
<div class="col-sm-6">
<h4>ผู้สั่งสินค้า <?php echo $detail['FullName']?></h4>
</div>
<div class="col-sm-6">
<h4>จำนวนเงิน : <?php echo $detail['payAmount']?> บาท</h4>
</div>
<div class="col-sm-6">
<h4>ธนาคาร <?php echo $detail['payBank']?></h4>
</div>
<div class="col-sm-6">
<h4>เวลาที่โอน <?php echo $detail['PaymentDate']?></h4>
</div>
<div class="col-sm-5">
<p><b>โทร.</b> <?php echo $detail['Tel']?></p>
<p><b>Email</b> : <?php echo $detail['Email']?></p>
<hr>
</div>

<style type="text/css">
	.about-to-pay{
		background: none;
	}
</style>
<div class="col-sm-12" style="height:200px;"></div>
</div>
<!-- /content -->

</div>

?>