<?php
$act = '1';
include("backHeader.php");
include("function.php");
?>

<script type="text/javascript">

function show_pop(id,url,display,method,parent,level,CategoryID,CategoryName){
	$('#'+id).modal();                      // initialized with defaults
	$('#'+id).modal({ keyboard: false });   // initialized with no keyboard
	$('#'+id).modal('show'); 
	var data = {display: display,_method: method,parent:parent,level:level,CategoryID:CategoryID,CategoryName:CategoryName};
	$.post(url,data,function(msg){
		$('#'+display).html(msg);
	});
}
function savePop(){
	if($('#_method').val()=='PUT'){
		var url = "Cate/"+$('#CategoryID').val();
	}else{
		var url = "Cate";
	}
	

	if($('#CategoryName').val()==""){
		alert("ระบุ "+$('#CategoryName').attr('placeholder'));
		$('#CategoryName').focus();
		return false;
	}
	$('#frm_pop').attr('action',url).submit();
}
function delData(CategoryID){
	if(confirm("ยืนยันการลบ !! ")){
		window.location.href="deleteCate/"+CategoryID;
	}
}
</script>

<ol class="breadcrumb" style="margin-top:-15px;">
  <li><a href="#">หน้าแรก</a></li>
  <li class="active">หมวดสินค่า</li>
</ol>
<div class="panel panel-default" style="margin-top:-20px;">
  <div class="panel-body">

<div class="panel panel-primary" style="width:70%;">
<div class="panel-heading">
    <h3 class="panel-title"><i class='glyphicon glyphicon-cog'></i> หมวดสินค้า</h3>
  </div>
  <div class="panel-body">
  <div >
  	<button class="btn btn-success btn-xs" data-toggle="modal" 
  	data-target=".bs-example-modal-lg" 
  	onclick="show_pop('myModal','../backoffice/catePop','showdisp1','POST','0','1','','');">
  	<i class='glyphicon glyphicon-plus'></i> เพิ่มข้อมูล</button>

  </div>
  <div class="table-responsive" style="margin-top:10px;">
    <table class="table table-hover" >
    	<thead class="bg_tb">
    		<tr>
    			<th width="15%"><div style=" text-align: left;">ลำดับ</div></th>
    			<th width="55%"><div style=" text-align: left;">ชื่อหมวดสินค้า</div></th>
    			<th width="30%"><div style=" text-align: left;">จัดการ</div></th>
    		</tr>
    	</thead>
    	<tbody>
    	<?php 
    	$i=0;
    	if(count($CateData)){
			 foreach ($CateData as $key => $value) {

				?>
				<tr>
			    		<td align="left"><?php echo ++$i.".";?></td>
			    		<td align="left"><?php echo $value['CategoryName'];?></td>
			    		<td align="left">

			    		<button type="button" class="btn btn-success btn-xs" 
			    		onclick="show_pop('myModal','../backoffice/catePop','showdisp1','POST','<?php echo $value['CategoryID'];?>','2','','');">
			    		<i class="glyphicon glyphicon-plus"></i> เพิ่มหมวดย่อย</button>

			    		<button type="button" class="btn btn-primary btn-xs" 
			    		onclick="show_pop('myModal','../backoffice/catePop/<?php echo $value['CategoryID'];?>','showdisp1','PUT','0','1','<?php echo $value['CategoryID'];?>','<?php echo $value['CategoryName'];?>');">
			    		<i class="glyphicon glyphicon-pencil"></i> แก้ไข</button>
			    		<button type="button" class="btn btn-danger btn-xs" onclick="delData('<?php echo $value['CategoryID'];?>');" ><i class="glyphicon glyphicon-trash"></i> ลบ</button>
			    		</td>
			    	</tr>
				<?php

				$j=0;
				   $CateData2 = DB::table('tbl_category')->where('CateParentID','=',$value['CategoryID'])->get();
				    $CateData2 = objectToArray($CateData2);
				if(count($CateData2)){
					foreach ($CateData2 as $key2 => $value2) {
						//echo "<pre>";print_r($value2);echo "</pre>";
						?>
							<tr class="warning">
						    		<td align="left"><?php echo '&nbsp&nbsp&nbsp'.$i.'.'.++$j.".";?></td>
						    		<td align="left"><?php echo '&nbsp&nbsp&nbsp'.$value2['CategoryName'];?></td>
						    		<td align="left">						    		
						    		<button type="button" class="btn btn-primary btn-xs" 
						    		onclick="show_pop('myModal','../backoffice/catePop/<?php echo $value2['CategoryID'];?>','showdisp1','PUT','<?php echo $value2['CateParentID'];?>','2','<?php echo $value2['CategoryID'];?>','<?php echo $value2['CategoryName'];?>');">
						    		<i class="glyphicon glyphicon-pencil"></i> แก้ไข</button>
						    		<button type="button" class="btn btn-danger btn-xs" onclick="delData('<?php echo $value2['CategoryID'];?>');" ><i class="glyphicon glyphicon-trash"></i> ลบ</button>
						    		</td>
						    	</tr>
							<?php 

					}
				}
				
				//$CateDataLevel2 = $CateData2[''];
			}
		}else{

			?>
			<tr class="danger">
			    		<td align="center" colspan="3">ไม่พบข้อมูล</td>
			    
			    	</tr>
			<?php
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
echo showModal('myModal','showdisp1','เพิ่ม/แก้ไข ข้อมูลหมวดสินค้า');
?>
