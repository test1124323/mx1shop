<?php
include("webHead.php");
?> 
<script>
function checkstat(){
	var tid 	=	$("#trackid").val();
	var mail 	=	$("#trackemail").val();
	if( isNaN(tid) || tid=='undefined' || tid=='' ){
		$("#orderList").html('<center><h3>ไม่พบรายการสั่งซื้อสินค้า '+tid+'</h3></center>');
		return false;
	}
	var url 	=	"<?php echo Request::root()?>/track/"+tid;
	var data 	=	{mail: mail};
	$("#orderList").hide();
	$.get(url,data,function(result){
		if(result == 'No'){
			$("#orderList").html('<center><h4 style="color:#D00;">ไม่พบรายการสั่งซื้อสินค้า โปรดตรวจสอบข้อมูลให้ถูกต้อง</h4></center>');
		}else{
			$("#orderList").html(result);
		}
		$("#orderList").fadeIn();
	});
// OrderStatus 0=รอยืนยันการสั่งซื้อ 1=ยืนยันการสั่งซื้อ 2= รอการชำระเงิน 3=ชำระเงินเรียบร้อย 4=จัดส่งเรียบร้อย 5=ยกเลิกรายการ

}

window.location.href="#list";
</script>
<style type="text/css">
	.about-to-pay{
		background: none;
	}
</style>

<div class="head-marquee shadow-line" style="background:rgba(255,0,20,0.8);margin-top:15px; color:#fff;">

<span id="list"></span>
  <b><h5>ตรวจสอบสถานะสินค้า</h5></b>
</div>
<div style="padding:15px;background:#EFEFEF;" align="center">
	<h3>กรุณากรอกรหัสการสั่งซื้อเพื่อทำการตรวจสอบ</h3>
	<p>
	<input id="trackid" type="text" class="form-control square" style="width:40%;margin-top:20px;text-align:center" placeholder="xxxxxxxxxxx"/>
	</p>
	<p>
	<input id="trackemail" type="text" class="form-control square" style="width:40%;margin-top:20px;text-align:center" placeholder="youremail@email.com"/>
	</p>
	<p>
	<button type="button" class="btn btn-success" onclick="javascript:checkstat()"><i class="glyphicon glyphicon-ok-sign"></i> ตรวจสอบ</button>
	</p>
</div>
<hr>

<div id="orderList">
	
</div>


</div>
<div class="col-sm-12" style="height:500px;"></div>
<?php
include("webFoot.php");
?>