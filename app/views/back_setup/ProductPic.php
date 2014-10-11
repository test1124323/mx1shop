<?php
$act = '1';
include("backHeader.php");
include("function.php");
?>
<ol class="breadcrumb" style="margin-top:-15px;">
  <li><a href="#">หน้าแรก</a></li>
  <li><a href="Product">รายการสินค้า</a></li>
  <li class="active">จัดการรูปภาพ</li>
</ol>
<div class="panel panel-default" style="margin-top:-20px;">
  <div class="panel-body">

<div class="panel panel-primary" style="width:100%;">
	<div class="panel-heading">
		<h3 class="panel-title"><i class='glyphicon glyphicon-cog'></i> จัดการรายการสินค้า</h3>
	</div>
	<div class="panel-body">
  <form method="post" id="form-input" action="ProductForm">

  <input  type="hidden" name="_method" value="POST">
  <div class="table-responsive" style="margin-top:10px;">
  <?php 
print_r($result);
  ?>
    <table class="table table-hover table-bordered"  id="tb_data">
    	<thead class="bg_tb">
    		<tr>
    			<th width="5%"><div style=" text-align: center;">ลำดับ</div></th>
    			<th width="20%"><div  style=" text-align: center;">ชื่อรายการสินค้า</div></th>
    			<th width="20%"><div style=" text-align: center;">อัฟโหลด</div></th>     			
    			<th width="10%"><div style=" text-align: center;">รูปภาพ</div></th>
    			<th width="5%"><div style=" text-align: center;">จัดการ</div></th>
    		</tr>
    	</thead>
    	<tbody>
      <?php
if($result){
  $i=0;
  foreach ($result as $key => $value) {
    # code...
    ?>
    <tr>
      <td><?php echo ++$i.".";?></td>
      <td><?php echo $value['ProductName'];?></td>
      <td></td>
       <td></td>
        <td></td>
    </tr>
    <?php
  }
}
      ?>
    	</tbody>
    </table>
   </div>
   <div style="text-align:center">
   <button class="btn btn-primary btn-sm" type="submit"><i class="glyphicon glyphicon-saved"></i> บันทึกข้อมูล</button>
  <button class="btn btn-default btn-sm">ยกเลิก</button>
   </div>    
  </form>
</div>
</div>
</div><!--panel-body-->
</div><!--panel panel-default-->
<?php 
include("backFoot.php");
?>