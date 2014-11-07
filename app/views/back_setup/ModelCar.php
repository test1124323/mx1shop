<?php
$act = '1';
include("backHeader.php");
include("function.php");
?>

<script type="text/javascript">

function show_pop(id,url,display,method,ModelCarID,ModelCarName,BrandCarID){
	$('#'+id).modal();                      // initialized with defaults
	$('#'+id).modal({ keyboard: false });   // initialized with no keyboard
	$('#'+id).modal('show'); 
	var data = {display: display,_method: method,ModelCarID:ModelCarID,ModelCarName:ModelCarName,BrandCarID:BrandCarID};
	$.post(url,data,function(msg){
		$('#'+display).html(msg);
	});
}
function savePop(){
	if($('#_method').val()=='PUT'){
		var url = "ModelCar/"+$('#ModelCarID').val();
	}else{
		var url = "ModelCar";
	}
	
	if($('#BrandCarID').val()=="0"){
		alert("เลือกยี่ห้อรถ");
		$('#BrandCarID').focus();
		return false;
	}
	if($('#ModelCarName').val()==""){
		alert("ระบุ "+$('#ModelCarName').attr('placeholder'));
		$('#ModelCarName').focus();
		return false;
	}
	$('#frm_pop').attr('action',url).submit();
}
function delData(ModelCarID){
	if(confirm("ยืนยันการลบ !! ")){
		window.location.href="ModelCarDel/"+ModelCarID;
	}
}
</script>

<ol class="breadcrumb" style="margin-top:-15px;">
  <li><a href="#">หน้าแรก</a></li>
  <li class="active">รุ่นรถ</li>
</ol>
<div class="panel panel-default" style="margin-top:-20px;">
  <div class="panel-body">

<div class="panel panel-primary" style="width:70%;">
<div class="panel-heading">
    <h3 class="panel-title"><i class='glyphicon glyphicon-cog'></i> รุ่นรถ</h3>
  </div>
  <div class="panel-body">
  <div >
  	<button class="btn btn-success btn-xs" data-toggle="modal" 
  	data-target=".bs-example-modal-lg" 
  	onclick="show_pop('myModal','../backoffice/ModelCarPop','showdisp1','POST','','','');">
  	<i class='glyphicon glyphicon-plus'></i> เพิ่มข้อมูล</button>

  </div>
  <div class="table-responsive" style="margin-top:10px;">
    <table class="table table-hover" >
    	<thead class="bg_tb">
    		<tr>
    			<th width="5%"><div style=" text-align: left;">ลำดับ</div></th>
    			<th width="30%"><div style=" text-align: left;">ชื่อยี่ห้อรถ</div></th>
    			<th width="30%"><div style=" text-align: left;">รุ่นรถ</div></th>
    			<th width="20%"><div style=" text-align: left;">จัดการ</div></th>
    		</tr>
    	</thead>
    	<tbody>
    	<?php 
if(count($result)>0){
	$i=$result->getFrom()-1;
	//echo "<pre>";print_r($result);echo "</pre>";
	foreach ($result as $key => $value) {
	?>
	<tr>
		<td><?php echo ++$i;?></td>
		<td><?php echo $arr_data[$value['BrandCarID']];?></td>
		<td><?php echo $value['ModelCarName'];?></td>
		<td>
	
			<button type="button" class="btn btn-primary btn-xs" 
			onclick="show_pop('myModal','../backoffice/ModelCarPop/<?php echo $value['ModelCarID'];?>','showdisp1','PUT','<?php echo $value['ModelCarID'];?>','<?php echo $value['ModelCarName'];?>','<?php echo $value['BrandCarID'];?>');">
			<i class="glyphicon glyphicon-pencil"></i> แก้ไข</button>

			<button type="button" class="btn btn-danger btn-xs" 
			onclick="delData('<?php echo $value['ModelCarID'];?>');" >
			<i class="glyphicon glyphicon-trash"></i> ลบ</button>
		</td>
	</tr>
	<?php
	}
}
    	?>
    	</tbody>
    </table>
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
</div><!--panel-body-->
</div><!--panel panel-default-->
<?php
include("backFoot.php");
echo showModal('myModal','showdisp1','เพิ่ม/แก้ไข ข้อมูลรุ่นรถ');
?>
