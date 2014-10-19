<?php
$act = '2';
include("backHeader.php");
include("function.php");
$arr_OrderStatus = ArrOrderStatus();
?>
<script type="text/javascript">
	function OrderDetail(OrderID){
		$('#OrderID').val(OrderID);
		$('#form-input').attr('action','OrderDetail').submit();

	}
</script>
<ol class="breadcrumb" style="margin-top:-15px;">
  <li class="active">หน้าแรก</li>
</ol>

<div class="panel panel-default" style="margin-top:-20px;">
  <div class="panel-body">

<div class="panel panel-primary" style="width:100%;">
	<div class="panel-heading">
		<h3 class="panel-title"><i class='glyphicon glyphicon-list-alt'></i> รายการสั่งสินค้า</h3>
	</div>
	<div class="panel-body">	
	<form method="post"  id="form-input">
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
          <th width="8%"><div style=" text-align: center;">วันที่ส่งสินค้า</div></th>
          <th width="8%"><div style=" text-align: center;">สถานะ</div></th>
          <th width="8%"><div style=" text-align: center;">จัดการ</div></th>
        </tr>
      </thead>
      <tbody>
      <?php 
if(count($result)>0){
	$i=0;
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
			$OrderPriceTotal = 0;
			foreach ($value['order_detail'] as $key2 => $value2) {
				# code...
				$OrderAmount+=$value2['OrderAmount'];
				$OrderPriceTotal+=$value2['OrderPriceTotal'];
			}
			?>
			<td style=" text-align: right;"><?php echo $OrderAmount;?></td>
			<td style=" text-align: right;"><?php echo number_format($OrderPriceTotal,2);?></td>
			<td style=" text-align: center;"><?php echo conv_date($value['PaymantDate']);?></td>
			<td style=" text-align: center;"><?php echo conv_date($value['DeliveredDate']);?></td>
			<td style=" text-align: center;"><?php echo $arr_OrderStatus[$value['OrderStatus']];?></td>
			<td style=" text-align: center;">
			<button type="button" class="btn btn-primary btn-xs"  onclick="OrderDetail('<?php echo $value['OrderID'];?>');">
			<i class="glyphicon glyphicon-credit-card"></i> ชำระเงิน</button>
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