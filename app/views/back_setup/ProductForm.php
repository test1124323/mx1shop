<?php
$act = '1';
include("backHeader.php");
include("function.php");
?>
<script type="text/javascript">
  function remove_id(id){
  $('#'+id).remove();

    var table = document.getElementById('tb_data');
    var rowCount = (table.rows.length);
    
    for(i=1;i<=rowCount;i++){
      table.rows[i].cells[0].align="center";
      table.rows[i].cells[0].innerHTML= i+".";
    }
  }
function add_row(){
  
    var table = document.getElementById('tb_data');
    var rowCount = (table.rows.length);
    var row = table.insertRow(rowCount);
    
    var id_tb = rowCount+""+parseInt((Math.random()*10)+1);
    table.rows[rowCount].id = id_tb;
    table.rows[rowCount].style.background = "#FFFFFF";
    var j =0;

    for(var i = 0;i<7;i++){
    table.rows[rowCount].insertCell(i);   
    }
    
    table.rows[rowCount].cells[0].align="center";
    table.rows[rowCount].cells[1].align="left";
    table.rows[rowCount].cells[2].align="left";
    table.rows[rowCount].cells[3].align="left";
    table.rows[rowCount].cells[4].align="left";
    table.rows[rowCount].cells[5].align="left";
    table.rows[rowCount].cells[6].align="center";
  

    table.rows[rowCount].cells[0].innerHTML= rowCount+".";
    table.rows[rowCount].cells[1].innerHTML="<input type=\"text\" id=\"ProductName"+id_tb+"\" name=\"ProductName["+id_tb+"][]\" value=\"\" class=\"form-control\" placeholder=\"ชื่อรายการสินค้า\">";
    var url = "../backoffice/DropdownCategory";
    var random =  id_tb+""+parseInt((Math.random()*1690708)/10);

    var data = {id_tb:id_tb+"_"+random};
    var html = "";
     html +='<div><a data-toggle="modal" class="btn btn-info btn-xs" data-backdrop="static"  onclick="add_select('+id_tb+');" ><i class="glyphicon glyphicon-plus" ></i> เพิ่มหมวดสินค้า</a></div><br>';
    $.post(url,data,function(msg){
       html +='<div id="select'+id_tb+'"><div class="input-group" id="sel'+random+'" ><span class="input-group-btn"><button class="btn btn-danger" onclick=\'remove_id("sel'+random+'");\' type="button"><i class="glyphicon glyphicon-trash"></i></button></span>'+msg+'</div></div>';
      table.rows[rowCount].cells[2].innerHTML=''+html;
    });
    
    
    table.rows[rowCount].cells[3].innerHTML='<input id="ProductAmount'+id_tb+'" onBlur="NumberFormat(this,0);"  style=" text-align: right;" name="ProductAmount['+id_tb+'][]" class="form-control" value="" placeholder="จำนวน">';
    table.rows[rowCount].cells[4].innerHTML='<input id="ProductSalePrice'+id_tb+'" style=" text-align: right;" onBlur="NumberFormat(this,2);" name="ProductSalePrice['+id_tb+'][]" class="form-control" value="" placeholder="ราคาขาย">';
    
    table.rows[rowCount].cells[5].innerHTML='<div class="row"><div class="col-xs-2">ย่อ</div><div class="col-xs-9"><textarea class="form-control"  placeholder="คำอธิบายย่อ" name="ProductShortDESC['+id_tb+'][]"></textarea></div></div><br><div class="row"><div class="col-xs-2">ละเอียด</div><div class="col-xs-9"><textarea class="form-control"  placeholder="คำอธิบายละเอียด" name="ProductDESC['+id_tb+'][]"></textarea></div></div>';

    table.rows[rowCount].cells[6].innerHTML="<a data-toggle=\"modal\" class=\"btn btn-danger btn-xs\" data-backdrop=\"static\" href=\"javascript:void(0);\" onClick=\"remove_id('"+id_tb+"');\"><i class='glyphicon glyphicon-trash'></i> ลบ</a> ";
  
  
  }
  function add_select(id_tb){
   var random =  id_tb+""+parseInt((Math.random()*1600708)/10);
  // alert(random);
     var url = "../backoffice/DropdownCategory";
     var data = {id_tb:id_tb+"_"+random};
     var val = "";
      $.post(url,data,function(msg){
          val +='<div class="input-group"  id="sel'+random+'"  style="margin-top:10px;"><span class="input-group-btn"><button class="btn btn-danger" onclick=\'remove_id("sel'+random+'");\' type="button"><i class="glyphicon glyphicon-trash"></i></button></span>'+msg+'</div></div>';
          $('#select'+id_tb).append(''+val);
      });
  }
</script>
<ol class="breadcrumb" style="margin-top:-15px;">
  <li><a href="#">หน้าแรก</a></li>
  <li><a href="Product">รายการสินค้า</a></li>
  <li class="active">จัดการรายการสินค้า</li>
</ol>
<div class="panel panel-default" style="margin-top:-20px;">
  <div class="panel-body">

<div class="panel panel-primary" style="width:100%;">
	<div class="panel-heading">
		<h3 class="panel-title"><i class='glyphicon glyphicon-cog'></i> จัดการรายการสินค้า</h3>
	</div>
	<div class="panel-body">
  <div >
  	<button class="btn btn-success btn-xs" data-toggle="modal" 
  	data-target=".bs-example-modal-lg" onclick="add_row();" >
  	<i class='glyphicon glyphicon-plus'></i> เพิ่มรายการ</button>
  </div>
  <form method="post" id="form-input" action="ProductForm">

  <input  type="hidden" name="_method" value="POST">
  <div class="table-responsive" style="margin-top:10px;">
    <table class="table table-hover table-bordered"  id="tb_data">
    	<thead class="bg_tb">
    		<tr>
    			<th width="5%"><div style=" text-align: center;">ลำดับ</div></th>
    			<th width="20%"><div  style=" text-align: center;">ชื่อรายการสินค้า</div></th>
    			<th width="20%"><div style=" text-align: center;">หมวดสินค้า</div></th>     			
    			<th width="10%"><div style=" text-align: center;">จำนวน</div></th>
    			<th width="10%"><div style=" text-align: center;">ราคาขาย/หน่วย</div></th>
          <th width="30%"><div style=" text-align: center;">คำอธิบาย</div></th>
    			<th width="5%"><div style=" text-align: center;">จัดการ</div></th>
    		</tr>
    	</thead>
    	<tbody>
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