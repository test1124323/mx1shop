<?php
$act = '1';
include("backHeader.php");
include("function.php");
?>
<div class="panel panel-primary" style="width:100%;">
	<div class="panel-heading">
		<h3 class="panel-title"><i class='glyphicon glyphicon-cog'></i> รายการสินค้า</h3>
	</div>
	<div class="panel-body">
  <div >
  	<button class="btn btn-success btn-xs" data-toggle="modal" 
  	data-target=".bs-example-modal-lg" >
  	<i class='glyphicon glyphicon-plus'></i> เพิ่มข้อมูล</button>

  </div>
  <br>
  <div class="table-responsive">
    <table class="table table-hover table-bordered" >
    	<thead class="bg_tb">
    		<tr>
    			<th width="10%"><div style=" text-align: center;">ลำดับ</div></th>
    			<th width="30%"><div style=" text-align: center;">ชื่อรายการสินค้า</div></th>
    			<th width="20%"><div style=" text-align: center;">หมวดสินค้า</div></th>     			
    			<th width="10%"><div style=" text-align: center;">จำนวน</div></th>
    			<th width="10%"><div style=" text-align: center;">ราคาขาย/หน่วย</div></th>
    			<th width="20%"><div style=" text-align: center;">จัดการ</div></th>
    		</tr>
    	</thead>
    	<tbody>
    		<tr>
    			<td>aa</td>
    			<td>sss</td>
    			<td>ddd</td>
    			<td>55</td>
    			<td>666</td>
    			<td>555</td>
    		</tr>
    	</tbody>
    </table>
   </div>
</div>
</div>
<?php 
include("backFoot.php");
?>