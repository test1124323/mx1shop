<?php
if(!Input::has("mode")&&empty($mode)){
	include("webHead.php");
}else{
	$path 	=	public_path()."/";
	include("funcHead.php");
	?>
	<style type="text/css">
		table{
			border-collapse: collapse;
		}
		td{
			border-left:solid thin #999999;
			border-right:solid thin #999999;
			padding: 5px;
		}
		.head-gray{
			background: #EDEDED;
		}
		
	</style>
	<?php
} 

?> 
<script>
window.location.href="#list";

function hover(id){
	$("#"+id).css('background','#E0E0E0');
}
function non_hover(id){
	$("#"+id).css('background','#EFEFEF');
}
function expand(id){
	$("#expand_"+id).css('color','rgba(255,30,30,0.7)');
	$("#expand_"+id).css('font-weight','bold');

	$("#ex_content_"+id).slideToggle(200,function(){
		window.location.href="#expand_"+id;	
	});
	
}
</script>
<div class="head-marquee shadow-line" style="background:rgba(255,0,20,0.8);margin-top:15px; color:#fff;">

<span id="list"></span>
  <b><h5>ประวัติการสั่งซื้อ</h5></b>
</div>
<hr>
<h4 style="padding:25px; color:rgba(255,30,30,0.9);">ประวัติการสั่งซื้อสินค้าของ <?php $pro 	=	Session::get('profile'); echo $pro['fullname'] ?></h4>
<?php
	foreach ($orderlist as $key => $detail) {
		$i = 0;
		?>
			<a href="javascript:void(0)" onclick="expand('<?php echo $i;?>')" style="text-decoration:none;">
				<div class="shadow-line " id="expand_<?php echo $i;?>" onmouseout="non_hover(this.id)" onmouseover="hover(this.id);" style="padding:15px;background:#EFEFEF;border-radius:2px;font-weight:500;color:#555;
		">
				<i class="glyphicon glyphicon-chevron-right"></i>  
				รหัส <?php echo $detail['OrderID'];?>   |   วันที่ <?php echo str_replace('-', '/', $detail['OrderDate']) ?>
				</div>
			</a>

			<div id="ex_content_<?php echo $i?>" style="padding:30px;border-radius:5px;border:thin solid #DDD;<?php ($i==0)?'display:none':'';?> ">
				<!-- content -->
				
					<div class="">
					<h4>ผู้สั่งสินค้า <?php echo $detail['FullName']?></h4>
					</div>
					<div class="">
					<h5><b>ที่อยู่ในการจัดส่งสินค้า</b> : <?php echo $detail['Address']?></h5>
					</div>
					<div class="">
					<p><b>โทร.</b> <?php echo $detail['TelNumber']?></p>
					<p><b>Email</b> : <?php echo $detail['Email']?></p>
					</div>

					<div class=""><hr>
						<table class="table"> 
						  <tr class="tr-head" style="border-bottom:thin solid #666;">
						    <td class="table-head head-gray" width="50px;"  align="center"></td>
						    <td class="table-head head-gray" >สินค้า</td>
						    <td class="table-head head-gray"  width="100px;" align="center">ราคา</td>
						    <td class="table-head head-gray"  width="100px;" align="center">จำนวน</td>
						    <td class="table-head head-gray"  width="100px;" align="center">รวม</td>
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
						    <td class="table-head" ><h5 style="text-align:center;"><?php echo @++$i;?></h5></td>
						    <td class="table-head" ><h5 style="text-align:left;"><?php echo $value['ProductName'];?></h5></td>
						    <td class="table-head" ><h5 style="text-align:right;"><?php echo empty($value['ProductPrice'])?"":number_format($value['ProductPrice'])." ฿";?></h5></td>
						    <td class="table-head" ><h5 style="text-align:center;"><?php echo empty($value['OrderAmount'])?"":$value['OrderAmount'];?></h5></td>
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
				
			</div>
		<?php
		
		$i++;
	}

?>
<div class="col-sm-12" style="height:200px;"></div>
<?php
include("webFoot.php");
?>