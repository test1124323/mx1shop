<?php
$act = '1';
include("backHeader.php");
include("function.php");
?>
<ol class="breadcrumb" style="margin-top:-15px;">
  <li><a href="#">หน้าแรก</a></li>
  <li class="active">รายการสินค้า</li>
</ol>
<div class="panel panel-default" style="margin-top:-20px;">
  <div class="panel-body">

<div class="panel panel-primary" style="width:100%;">
	<div class="panel-heading">
		<h3 class="panel-title"><i class='glyphicon glyphicon-cog'></i> รายการสินค้า</h3>
	</div>
	<div class="panel-body">
  <div >
  <a href="ProductForm">
  	<button class="btn btn-success btn-xs" data-toggle="modal" 
  	data-target=".bs-example-modal-lg" >
  	<i class='glyphicon glyphicon-plus'></i> เพิ่มข้อมูล</button>
  	</a>
  </div>
  <div class="table-responsive" style="margin-top:10px;">
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
</div><!--panel-body-->
</div><!--panel panel-default-->
<?php 
include("backFoot.php");
?>