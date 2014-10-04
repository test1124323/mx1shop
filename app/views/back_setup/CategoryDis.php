<?php
$act = '1';
include("backHeader.php");
include("function.php");
?>

<script type="text/javascript">

function show_pop(id,url,display){
	$('#'+id).modal();                      // initialized with defaults
	$('#'+id).modal({ keyboard: false });   // initialized with no keyboard
	$('#'+id).modal('show'); 
	var data = {display: display,val: '23'};
	$.post(url,data,function(msg){
		$('#'+display).html(msg);
	});
}
function savePop(){
	var url = "../backoffice/Cate";
	$('#frm_pop').action('action',url).submit();
}
</script>
<div class="panel panel-primary" style="width:70%;">
<div class="panel-heading">
    <h3 class="panel-title"><i class='glyphicon glyphicon-cog'></i> หมวดสินค้า</h3>
  </div>
  <div class="panel-body">
  <div >
  	<button class="btn btn-primary btn-xs" data-toggle="modal" 
  	data-target=".bs-example-modal-lg" 
  	onclick="show_pop('myModal','../backoffice/catePop','showdisp1');"><i class='glyphicon glyphicon-plus'></i> เพิ่มข้อมูล</button>

  </div>
  <br>
  <div class="table-responsive">
    <table class="table table-hover" >
    	<thead class="bg_tb">
    		<tr>
    			<th width="15%"><div style=" text-align: left;">ลำดับ</div></th>
    			<th width="55%"><div style=" text-align: left;">ชื่อหมวดสินค่า</div></th>
    			<th width="30%"><div style=" text-align: left;">จัดการ</div></th>
    		</tr>
    	</thead>
    	<tbody>
    	<tr>
    		<td align="left">1.</td>
    		<td align="left">อุปกรณ์ตกแต่งภายนอก</td>
    		<td align="left">
    		<button type="button" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-pencil"></i> แก้ไข</button>
    		<button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> ลบ</button>
    		</td>
    	</tr>
    	<tr>
    		<td align="left">2.</td>
    		<td align="left">อุปกรณ์ตกแต่งภายใน</td>
    		<td align="left">
    		<button type="button" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-pencil"></i> แก้ไข</button>
    		<button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> ลบ</button>
    		</td>
    	</tr>
    	</tbody>
    </table>
    </div>
  </div>
</div>

<?php
include("backFoot.php");
echo showModal('myModal','showdisp1','เพิ่ม/แก้ไข ข้อมูลหมวดสินค้า');
?>
