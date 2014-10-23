<?php
$act = '0';
include("backHeader.php");
include("function.php");
?>
<script type="text/javascript">
	function delete_data(id){
		if(confirm("ยืนยันการลบรายการ")){
			$('#AutoID').val(id);
			$('#form-input').attr('action','deleteAuto').submit();
		}
	}
	function cancelOrder(){
		if(confirm("ยินยันการยกเลิกรายหการ")){
			$('#CanOrderStaus').val('5');
			$('#form-input').submit();

		}
	}
	function chkInput(){
		if($('#PaymentTotal').val()==""){
			alert("ระบุ จำนวนเงิน");
			$('#PaymentTotal').focus();
			return false;
		}
		 PaymentTotal = parseFloat($('#PaymentTotal').val().split(",").join(""));
		 PriceTotal = parseFloat($('#PriceTotal').val());
		if(PaymentTotal!=PriceTotal){
			alert("ระบุ จำนวนเงินให้เท่ากับเงินรวม");
			$('#PaymentTotal').focus();
			return false;
		}
		if($('#PaymantDate').val()==""){
			alert("ระบุ วันที่ชำระเงิน");
			$('#PaymantDate').focus();
			return false;
		}
		if($("#OrderStatus").prop('checked')){
			if($("#DeliveredDate").val()==""){
			alert("ระบุ วันที่จัดส่ง");
			$('#DeliveredDate').focus();
			return false;
			}
		}else{
			if(confirm("คุณต้องการบันทึกข้อมูลการจัดส่งด้วยหรือไม่")){
				alert("เลือกยืนยันการจัดส่ง");
				$("#OrderStatus").focus();
				return false;
			}
		}
		$('#form-input').submit();
	}
</script>
<ol class="breadcrumb" style="margin-top:-15px;">
  <li>หน้าแรก</li>
  <?php 
  	if($result[0]['OrderStatus']=='2'){
  		?>
  		<li ><a href="Payment">รายการรอชำระเงิน</a></li>
  		<?php
  	}else{
  		?>
  		<li ><a href="Order">รายการสั่งสินค้า</a></li>
  		<?php
  	}
  ?>
  <li class="active">รายละเอียดการสั่งซื้อ</li>
</ol>

<div class="panel panel-default" style="margin-top:-20px;">
  <div class="panel-body">

<div class="panel panel-primary" style="width:100%;">
	<div class="panel-heading">
		<h3 class="panel-title"><i class='glyphicon glyphicon-list-alt'></i> รายละเอียดการสั่งซื้อสินค้า</h3>
	</div>
	<div class="panel-body">

<div class="row">
	<div class="col-sm-6" >
<div class="panel panel-default">
  <div class="panel-body">
  	<div class="row">
  		<div class="col-sm-5 bg-success" ><strong>ข้อมูลการจัดส่งสินค้า</strong></div>
  	</div>
  	<div class="row">
  		<div class="col-sm-2">ชื่อ : </div>
  		<div class="col-sm-5"><?php echo $result[0]['FullName'];?></div>
  	</div>
  	<div class="row">
  		<div class="col-sm-2">ที่อยู่ : </div>
  		<div class="col-sm-10"><?php echo $result[0]['Address']."  รหัสไปรษณีย์ ".$result[0]['PostCode'];?></div>
  	</div>
  	<div class="row">
  		<div class="col-sm-2">โทร : </div>
  		<div class="col-sm-10"><?php echo $result[0]['TelNumber'];?></div>
  	</div>
  	<div class="row">
  		<div class="col-sm-2">Email : </div>
  		<div class="col-sm-10"><?php echo $result[0]['Email'];?></div>
  	</div>
  	
  </div>
</div>
</div>
<div class="col-sm-6" >
	<div class="panel panel-default">
  		<div class="panel-body">
  			<div class="row">
  				<div class="col-sm-5 bg-success"><strong>ข้อมูลใบสั่งซื้อ</strong></div>
  			</div>
  			<div class="row">
  				<div class="col-sm-4">เลขที่ใบสั่งซ์้อ : </div>
  				<div class="col-sm-8"><?php echo $result[0]['OrderID'];?></div>
  			</div>
  			<div class="row">
  				<div class="col-sm-4">วันที่สั่งซื้อ : </div>
  				<div class="col-sm-8"><?php echo conv_date($result[0]['OrderDate']);?></div>
  			</div>
  			<div class="row">
  				<div class="col-sm-4">ชำระเงินเมื่อ : </div>
  				<div class="col-sm-8"><?php echo conv_date($result[0]['PaymantDate']);?></div>
  			</div>
  		</div>
  	</div>
</div>
</div>
	<form method="post"  id="form-input" action="OrderDetailConf">
	<input type="hidden" name="AutoID" id="AutoID">
	<input type="hidden" name="OrderID" id="OrderID" value="<?php echo $result[0]['OrderID'];?>">
	<input type="hidden" name="CanOrderStaus" id="CanOrderStaus" value="">
	<div class="table-responsive">
        <table class="table table-hover table-bordered" >
      <thead class="bg_tb">
        <tr>
          <th width="10%"><div style=" text-align: center;">ลำดับ</th>
          <th width="15%"><div style=" text-align: center;">รหัสสินค้า</div></th>
          <th width="15%"><div style=" text-align: center;">ชื่อรายการ</div></th>           
          <th width="10%"><div style=" text-align: center;">จำนวน</div></th>
          <th width="15%"><div style=" text-align: center;">ราคา/หน่วย</div></th>
          <th width="15%"><div style=" text-align: center;">ราคารวม</div></th>
          <th width="15%"><div style=" text-align: center;">จัดการ</div></th>
        </tr>
      </thead>
      <tbody>
      <?php 
if($result){
	$sum = 0;
	$i=1;
	foreach ($result[0]['order_detail'] as $key => $value) {
		$sum+=$value['OrderPriceTotal'];
		?>
		<tr>
			<td style=" text-align: center;"><?php echo $i;?></td>
			<td style=" text-align: left;"><?php echo sprintf("%07s",$value['ProductID']);?></td>
			<td style=" text-align: left;"><?php echo $value['ProductName'];?></td>
			<td style=" text-align: right;"><?php echo $value['OrderAmount'];?></td>
			<td style=" text-align: right;"><?php echo number_format($value['ProductPrice'],2);?></td>
			<td style=" text-align: right;"><?php echo number_format($value['OrderPriceTotal'],2);?></td>
			<td style=" text-align: center;">
			<button type="button" class="btn btn-danger btn-xs"  onclick="delete_data('<?php echo $value['AutoID'];?>');">
			<i class="glyphicon glyphicon-trash"></i> ลบข้อมูล</button></td>
		</tr>
		<?php
		$i++;
	}
	?>
	<tr class="bg-info">
		<td colspan="5" style=" text-align: center;"><strong>รวมทั้งสิ้น</strong></td>
		<td style=" text-align: right;">
		<input type="hidden" id="PriceTotal" name="PriceTotal" value="<?php echo ($sum)?>">
		<?php echo number_format($sum,2)?></td>
		<td  style=" text-align: center;">
		</td>
	</tr>
	<?php
}
      ?>
      </tbody>
      </table>
      </div>
      <?php 
if($result[0]['OrderStatus']>='3'){
	?>
	   <div class="row">
		<div class="col-sm-6" >
			<div class="panel panel-default">
		  	<div class="panel-body">
		    	<div class="row">
				<div class="col-sm-5 bg-info">
					<strong>ข้อมูลการจัดส่ง</strong>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6" >
					<label><input type="checkbox" name="OrderStatus" id="OrderStatus" value="4" <?php echo ($result[0]['OrderStatus']=='4')?"checked":"";?> > ยืนยันจัดส่ง</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3" >
					วันที่จัดส่ง
				</div>
				<div class="col-sm-5">
					<div class="input-group">
		  				<input type="text"  class="form-control datepicker" for="DeliveredDate" name="DeliveredDate" id="DeliveredDate" placeholder="dd/mm/yyyy" readonly="readonly" value="<?php echo conv_date($result[0]['DeliveredDate']);?>">
		  				<span class="input-group-addon" for="DeliveredDate"><i class="glyphicon glyphicon-calendar"></i></span>
					</div>
			</div>
			</div>
		  </div>
		</div>
		</div>
	</div>
	<?php
}else if($result[0]['OrderStatus']=='2'){
	?>
		   <div class="row">
		<div class="col-sm-6" >
			<div class="panel panel-default">
		  	<div class="panel-body">
		    	<div class="row">
				<div class="col-sm-5 bg-info">
					<strong>ข้อมูลการชำระเงิน</strong>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-3" >จำนวนเงิน</div>
				<div class="col-sm-6">

				<div class="input-group">
  						<span class="input-group-addon">TH</span>
  						<input type="text" class="form-control text-right" onblur="NumberFormat(this,2);"  placeholder="จำนวนเงิน" name="PaymentTotal" id="PaymentTotal">
  					<span class="input-group-addon">บาท</span> 
				</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-3" >
					วันที่ชำระเงิน
				</div>
				<div class="col-sm-5">
					<div class="input-group">
		  				<input type="text"  class="form-control datepicker" for="PaymantDate" name="PaymantDate" id="PaymantDate" placeholder="dd/mm/yyyy" readonly="readonly" value="<?php echo conv_date($result[0]['DeliveredDate']);?>">
		  				<span class="input-group-addon" for="PaymantDate"><i class="glyphicon glyphicon-calendar"></i></span>
					</div>
			</div>
			</div>
		  </div>
		</div>
		</div>
		<div class="col-sm-6" >
			<div class="panel panel-default">
		  	<div class="panel-body">
		    	<div class="row">
				<div class="col-sm-5 bg-info">
					<strong>ข้อมูลการจัดส่ง</strong>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-6" >
					<label><input type="checkbox" id="OrderStatus" name="OrderStatus" value="4" <?php echo ($result[0]['OrderStatus']=='4')?"checked":"";?> > ยืนยันจัดส่ง</label>
				</div>
				

			</div>
			<div class="row">
				<div class="col-sm-3" >
					วันที่จัดส่ง
				</div>
				<div class="col-sm-5">
					<div class="input-group">
		  				<input type="text"  class="form-control datepicker" for="DeliveredDate" name="DeliveredDate" id="DeliveredDate" placeholder="dd/mm/yyyy" readonly="readonly" value="<?php echo conv_date($result[0]['DeliveredDate']);?>">
		  				<span class="input-group-addon" for="DeliveredDate"><i class="glyphicon glyphicon-calendar"></i></span>
					</div>
			</div>
			</div>
		  </div>
		</div>
		</div>

	</div>
	<?php

}
      ?>


		<div class="row">
			<div class="col-sm-12 text-center">
			<?php 
			if($result[0]['OrderStatus']=='2'){
				?>
				<button class="btn btn-primary btn-sm" type="button" onclick="chkInput();"><i class="glyphicon glyphicon-saved"></i> บันทึกข้อมูล</button>
				<?php

			}else{
				?>
				<button class="btn btn-primary btn-sm" type="submit"><i class="glyphicon glyphicon-saved"></i> บันทึกข้อมูล</button>
				<?php
			}
			?>
			<button class="btn btn-danger btn-sm" type="button" onclick="cancelOrder();"><i class="glyphicon glyphicon-saved"></i> ยกเลิกรายการ</button>
			</div>
		</div>
      </form>
	</div>
	</div>
</div>
</div>
<?php 
include("backFoot.php");
?>
