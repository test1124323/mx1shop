<?php
include("webHead.php");
?> 
<script>
window.location.href="#list";
</script>
<style type="text/css">
	.about-to-pay{
		background: none;
	}
</style>
<br/>
<div class="col-sm-12" style="background:rgba(255,0,20,0.7);padding:20px;"><h3 style="color:#FFF;">วิธีการสั่งซื้อ</h3></div>
<?php include('aboutorder.php');?>
<div class="col-sm-12" style="background:rgba(255,0,20,0.7);padding:20px;"><h3 style="color:#FFF;">วิธีการชำระเงิน</h3></div>
<?php include('aboutpay.php');
?>
<div class="col-sm-12" style="height:200px;"></div>
<?php
include("webFoot.php");
?>