<?php
$act = '1';
include("backHeader.php");
include("function.php");
?>

<script type="text/javascript">

function show_pop(id,url,display,method,BrandCarID,BrandCarName){
	$('#'+id).modal();                      // initialized with defaults
	$('#'+id).modal({ keyboard: false });   // initialized with no keyboard
	$('#'+id).modal('show'); 
	var data = {display: display,_method: method,BrandCarID:BrandCarID,BrandCarName:BrandCarName};
	$.post(url,data,function(msg){
		$('#'+display).html(msg);
	});
}
function savePop(){
	if($('#_method').val()=='PUT'){
		var url = "BrandCar/"+$('#BrandCarID').val();
	}else{
		var url = "BrandCar";
	}
	

	if($('#BrandCarName').val()==""){
		alert("ระบุ "+$('#BrandCarName').attr('placeholder'));
		$('#BrandCarName').focus();
		return false;
	}
	$('#frm_pop').attr('action',url).submit();
}
function delData(BrandCarID){
	if(confirm("ยืนยันการลบ !! ")){
		window.location.href="BrandCarDel/"+BrandCarID;
	}
}
</script>

<ol class="breadcrumb" style="margin-top:-15px;">
  <li><a href="#">หน้าแรก</a></li>
  <li class="active">ยี่ห้อรถ</li>
</ol>
<div class="panel panel-default" style="margin-top:-20px;">
  <div class="panel-body">

<div class="panel panel-primary" style="width:70%;">
<div class="panel-heading">
    <h3 class="panel-title"><i class='glyphicon glyphicon-cog'></i> ยี่ห้อรถ</h3>
  </div>
  <div class="panel-body">
  <div >
  	<button class="btn btn-success btn-xs" data-toggle="modal" 
  	data-target=".bs-example-modal-lg" 
  	onclick="show_pop('myModal','../backoffice/BrandCarPop','showdisp1','POST','','');">
  	<i class='glyphicon glyphicon-plus'></i> เพิ่มข้อมูล</button>

  </div>
  <div class="table-responsive" style="margin-top:10px;">
    <table class="table table-hover" >
    	<thead class="bg_tb">
    		<tr>
    			<th width="15%"><div style=" text-align: left;">ลำดับ</div></th>
    			<th width="55%"><div style=" text-align: left;">ชื่อยี่ห้อรถ</div></th>
    			<th width="30%"><div style=" text-align: left;">จัดการ</div></th>
    		</tr>
    	</thead>
    	<tbody>
    	<?php 
if(count($result)>0){
	$i=0;
	foreach ($result as $key => $value) {
		# code..
	?>
	<tr>
		<td><?php echo ++$i;?></td>
		<td><?php echo $value['BrandCarName'];;?></td>
		<td>
	
			<button type="button" class="btn btn-primary btn-xs" 
			onclick="show_pop('myModal','../backoffice/BrandCarPop/<?php echo $value['BrandCarID'];?>','showdisp1','PUT','<?php echo $value['BrandCarID'];?>','<?php echo $value['BrandCarName'];?>');">
			<i class="glyphicon glyphicon-pencil"></i> แก้ไข</button>

			<button type="button" class="btn btn-danger btn-xs" 
			onclick="delData('<?php echo $value['BrandCarID'];?>');" >
			<i class="glyphicon glyphicon-trash"></i> ลบ</button>
		</td>
	</tr>
	<?php
	}
}
    	?>
    	</tbody>
    </table>
    </div>
  </div>
</div>
</div><!--panel-body-->
</div><!--panel panel-default-->
<?php
include("backFoot.php");
echo showModal('myModal','showdisp1','เพิ่ม/แก้ไข ข้อมูลยี่ห้อรถ');
?>
