<?php
$act = '2';
include("backHeader.php");
include("function.php");
$arr_OrderStatus = ArrOrderStatus();
?>
<script type="text/javascript">
	function Search(){
		$('#form-input').attr('action','Payment').submit();
	}
</script>
<ol class="breadcrumb" style="margin-top:-15px;">
  <li class="active">หน้าแรก</li>
</ol>

<div class="panel panel-default" style="margin-top:-20px;">
  <div class="panel-body">

<div class="panel panel-primary" style="width:100%;">
	<div class="panel-heading">
		<h3 class="panel-title"><i class='glyphicon glyphicon-list-alt'></i> รายการรอชำระเงิน</h3>
	</div>
	<div class="panel-body">	
	<form method="GET"  id="form-input">
	<fieldset>
		<legend>ค้นหา</legend>
		<div class="panel panel-default">
  			<div class="panel-body">
    			<div class="row">
    				<div class="col-xs-1"></div>
    				<div class="col-xs-2">
    					เลขที่ใบสั่งซื้อ
    				</div>
    				<div class="col-xs-3">
    					<input type="text" class="form-control" id="SOrderID" name="SOrderID" value="<?php echo @$Input['SOrderID'];?>" placeholder="เลขที่ใบสั่งซื้อ">
    				</div>
    				<div class="col-xs-2">
    					ชื่อ-สกุล
    				</div>
    				<div class="col-xs-3">
    					<input type="text" class="form-control" id="SFullName" value="<?php echo @$Input['SFullName'];?>" name="SFullName" placeholder="ชื่อ-สกุล">
    				</div>
    			</div>
    			<div class="row" style="margin-top:10px;">
    				<div class="col-xs-1"></div>
    				<div class="col-xs-2">
    					ที่อยู่
    				</div>
    				<div class="col-xs-3">
    					<input type="text" class="form-control" value="<?php echo @$Input['SAdress'];?>" id="SAdress" name="SAdress" placeholder="ที่อยู่">
    				</div>
    				<div class="col-xs-2">
    					หมายเลขโทรศัพท์
    				</div>
    				<div class="col-xs-3">
    					<input type="text" class="form-control" id="STel" name="STel" value="<?php echo @$Input['STel'];?>" placeholder="หมายเลขโทรศัพท์">
    				</div>
    			</div>
    			<div class="row" style="margin-top:10px;">
    				<div class="col-xs-1"></div>
    				<div class="col-xs-2">
    					วันที่ทำรายการ
    				</div>
    				<div class="col-xs-3">
    					<div class="input-group">
		  					<input type="text"  class="form-control datepicker" value="<?php echo @$Input['SOrderDate'];?>" for="SOrderDate" name="SOrderDate" id="SOrderDate" placeholder="dd/mm/yyyy"  >
		  					<span class="input-group-addon" for="SOrderDate"><i class="glyphicon glyphicon-calendar"></i></span>
						</div>
    				</div>
    				<div class="col-xs-2">
    					ถึง
    				</div>
    				<div class="col-xs-3">
    					<div class="input-group">
		  					<input type="text"  class="form-control datepicker" value="<?php echo @$Input['EOrderDate'];?>" for="EOrderDate" name="EOrderDate" id="EOrderDate" placeholder="dd/mm/yyyy"  >
		  					<span class="input-group-addon" for="EOrderDate"><i class="glyphicon glyphicon-calendar"></i></span>
						</div>
    				</div>
    			</div>
    			<div class="row" style="margin-top:10px;">
    				<div class="col-xs-12f^ text-center" >
    					<button type="button" class="btn btn-primary" onclick="Search();"><i class="glyphicon glyphicon-search"></i> ค้นหา</button>
    				</div>
    			</div>
  			</div>
		</div>
	</fieldset>


	<input type="hidden" name="OrderID" id="OrderID" value="">
        <table class="table table-hover table-bordered" >
      <thead class="bg_tb">
        <tr>
          <th width="5%"><div style=" text-align: center;">ลำดับ</th>
          <th width="10%"><div style=" text-align: center;">เลขที่ใบสั่งซื้อ</div></th>
          <th width="10%"><div style=" text-align: center;">วันที่ทำรายการ</div></th>           
          <th width="20%"><div style=" text-align: center;">ข้อมูลลูกค้า</div></th>
          <th width="8%"><div style=" text-align: center;">จำนวน</div></th>
          <th width="8%"><div style=" text-align: center;">ราคารวม</div></th>
          <th width="8%"><div style=" text-align: center;">วันที่ชำระเงิน</div></th>
          <th width="8%"><div style=" text-align: center;">สถานะ</div></th>
          <th width="8%"><div style=" text-align: center;">จัดการ</div></th>
        </tr>
      </thead>
      <tbody>
      <?php 
if(count($result)>0){
	$i=$result->getFrom()-1;
	foreach ($result as $key => $value) {
		# code...
		?>
		<tr>
			<td style=" text-align: center;"><?php echo ++$i;?></td>
			<td ><?php echo $value['OrderID'];?></td>
			<td style=" text-align: center;"><?php echo conv_date($value['OrderDate']);?></td>
			<td style=" text-align: left;">
			<?php 
			echo "ชื่อ-สกุล ".$value['FullName']."<br>";
			echo "ที่อยู่ ".$value['Address']."<br>";
			echo "รหัสไปรษณีย์ ".$value['PostCode']."<br>";
			echo "โทรศัพท์ ".$value['TelNumber']."<br>";

			?>
			</td>
			<?php 
			$OrderAmount = 0;
			$OrderPriceTotal = $value['DeliverCost'];
			foreach ($value['order_detail'] as $key2 => $value2) {
				# code...
				$OrderAmount+=$value2['OrderAmount'];
				$OrderPriceTotal+=$value2['OrderPriceTotal'];
			}
			?>
			<td style=" text-align: right;"><?php echo $OrderAmount;?></td>
			<td style=" text-align: right;"><?php echo number_format($OrderPriceTotal,2);?></td>
			<td style=" text-align: center;"><?php echo @$Payment[$value['OrderID']];?></td>
			<td style=" text-align: center;"><?php echo $arr_OrderStatus[$value['OrderStatus']];?></td>
			<td style=" text-align: center;">
      <a href="Order/<?php echo $value['OrderID'];?>">
			<button type="button" class="btn btn-primary btn-xs">
			<i class="glyphicon glyphicon-credit-card"></i> ชำระเงิน</button>
      </a>
			</td>
		</tr>
		<?php
	}
}else{
	?>
	<tr>
		<td  colspan="11" class="text-center bg-danger">ไม่พบข้อมูล</td>
	</tr>
	<?php
}
      ?>
      </tbody>
      </table>
      </form>

	<!--start page-->
	<div style="text-align:right;">
		**ทั้งหมด <?php echo $result->getTotal()." รายการ ";?>
	</div >
   <div style="text-align:right;" >
   <?php echo $result->links(); ?>
   </div>
	<!--end page-->
	</div>

	</div>
	
</div>
</div>
<?php 
include("backFoot.php");
?>