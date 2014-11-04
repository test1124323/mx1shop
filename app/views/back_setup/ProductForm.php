<?php
$act = '3';
include("backHeader.php");
include("function.php");
?>
<script type="text/javascript">

  function remove_id(id){
  $('#'+id).remove();

    var table = document.getElementById('tb_data');
    var rowCount = (table.rows.length);
    //alert(rowCount);
    for(i=1;i<=parseInt(rowCount);i++){
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
    table.rows[rowCount].cells[1].innerHTML=" <input type=\"hidden\" name=\"HidProductID["+id_tb+"]\" value=\"\"><input type=\"text\" id=\"ProductName"+id_tb+"\" name=\"ProductName["+id_tb+"][]\" value=\"\" class=\"form-control\" placeholder=\"ชื่อรายการสินค้า\">";
    var path = $('#rootPath').val();
    var url = path+"backoffice/DropdownCategory";
    var random =  id_tb+""+parseInt((Math.random()*1690708)/10);

    var data = {id_tb:id_tb+"_"+random,CategoryID:''};
    var html = "";
     html +='<div><a data-toggle="modal" class="btn btn-info btn-xs" data-backdrop="static"  onclick=\'add_select("'+id_tb+'","");\' ><i class="glyphicon glyphicon-plus" ></i> เพิ่มหมวดสินค้า</a></div><br>';
    $.post(url,data,function(msg){
       html +='<div id="select'+id_tb+'"><div class="input-group" id="sel'+random+'" ><span class="input-group-btn"><button class="btn btn-danger" onclick=\'remove_id("sel'+random+'");\' type="button"><i class="glyphicon glyphicon-trash"></i></button></span>'+msg+'</div></div>';
      table.rows[rowCount].cells[2].innerHTML=''+html;
    });
    
    
    table.rows[rowCount].cells[3].innerHTML='<input id="ProductAmount'+id_tb+'" onBlur="NumberFormat(this,0);"  style=" text-align: right;" name="ProductAmount['+id_tb+'][]" class="form-control" value="" placeholder="จำนวน">';
    table.rows[rowCount].cells[4].innerHTML='<div><input id="ProductSalePrice'+id_tb+'" style=" text-align: right;" onBlur="NumberFormat(this,2);" name="ProductSalePrice['+id_tb+'][]" class="form-control" value="" placeholder="ราคาขาย"></div><div style="margin-top:10px">ค่าจัดส่ง</div><div style="margin-top:10px"><input id="DeliverCost'+id_tb+'" style=" text-align: right;" onBlur="NumberFormat(this,2);" name="DeliverCost['+id_tb+'][]" class="form-control" value="" placeholder="ค่าจัดส่ง"></div>';
    
    table.rows[rowCount].cells[5].innerHTML='<div class="row"><div class="col-xs-2">ย่อ</div><div class="col-xs-9"><textarea class="form-control"  placeholder="คำอธิบายย่อ" name="ProductShortDESC['+id_tb+'][]"></textarea></div></div><br><div class="row"><div class="col-xs-2">ละเอียด</div><div class="col-xs-9"><textarea class="form-control"  placeholder="คำอธิบายละเอียด" name="ProductDESC['+id_tb+'][]"></textarea></div></div>';

    table.rows[rowCount].cells[6].innerHTML="<a data-toggle=\"modal\" class=\"btn btn-danger btn-xs\" data-backdrop=\"static\" href=\"javascript:void(0);\" onClick=\"remove_id('"+id_tb+"');\"><i class='glyphicon glyphicon-trash'></i> ลบ</a> ";
  
  
  }
  function add_select(id_tb,CategoryID){
   var random =  id_tb+""+parseInt((Math.random()*1600708)/10);
  // alert(random);
    var path = $('#rootPath').val();
     var url = path+"backoffice/DropdownCategory";
     var data = {id_tb:id_tb+"_"+random,CategoryID:CategoryID};
     var val = "";
      $.post(url,data,function(msg){
          val +='<div class="input-group"  id="sel'+random+'"  style="margin-top:10px;"><span class="input-group-btn"><button class="btn btn-danger" onclick=\'remove_id("sel'+random+'");\' type="button"><i class="glyphicon glyphicon-trash"></i></button></span>'+msg+'</div></div>';
          $('#select'+id_tb).append(''+val);
      });
  }
    function confirm_save(){
    var table = document.getElementById('tb_data');
    var rowCount = (table.rows.length);
    if(rowCount=='1'){
      alert('กรุณาเพิ่มข้อมูลก่อนบันทึก');
      return false;
    }
    if(confirm("ยืนยันการบันทึกอีกครั้ง")){
      return true;
    }
    return false;
  }
</script>
<ol class="breadcrumb" style="margin-top:-15px;">
  <li><a href="#">หน้าแรก</a></li>
  <li><a href="<?php echo $arr_menuLink[3];?>">รายการสินค้า</a></li>
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
  <form method="post" id="form-input" action="<?php echo $path?>backoffice/ProductForm" onsubmit="return confirm_save();">
  <input  type="hidden" name="_method" value="POST">
  <div class="table-responsive" style="margin-top:10px;">
    <table class="table table-hover table-bordered"  id="tb_data">
    	<thead class="bg_tb">
    		<tr>
    			<th width="5%"><div style=" text-align: center;">ลำดับ</div></th>
    			<th width="20%"><div  style=" text-align: center;">ชื่อรายการสินค้า</div></th>
    			<th width="20%"><div style=" text-align: center;">หมวดสินค้า</div></th>     			
    			<th width="10%"><div style=" text-align: center;">จำนวน</div></th>
    			<th width="10%"><div style=" text-align: center;">ราคาขาย&ค่าจัดส่ง</div></th>
          <th width="30%"><div style=" text-align: center;">คำอธิบาย</div></th>
    			<th width="5%"><div style=" text-align: center;">จัดการ</div></th>
    		</tr>
    	</thead>
    	<tbody>
      <?php 
        if(isset($result)){
          $i=1;
         // echo "<pre>";print_r($result);echo "</pre>";
          foreach ($result as $key => $value) {
            $id_tb = $i."_A";
            # code...
            ?>
            <tr id="<?php echo $id_tb;?>">
              <td style=" text-align: center;"><?php echo $i;?>
              <input type="hidden" name="HidProductID[<?php echo $id_tb;?>]" value="<?php echo $value['ProductID'];?>">
              </td>
              <td><input type="text" id="ProductName<?php echo $id_tb;?>" name="ProductName[<?php echo $id_tb;?>][]" value="<?php echo $value['ProductName']?>" class="form-control" placeholder="ชื่อรายการสินค้า"></td>
              <td>
                <div>
                    <a data-toggle="modal" class="btn btn-info btn-xs" data-backdrop="static"  onclick="add_select('<?php echo $id_tb;?>','');" >
                    <i class="glyphicon glyphicon-plus" ></i> เพิ่มหมวดสินค้า</a>
                  </div><br>
                <?php 

                if(isset($value['procate_category'])){
                  //echo "<pre>";print_r($value['procate_category']);echo "</pre>";
                  foreach ($value['procate_category'] as $key2 => $value2) {
                  # code...
                  //echo $value2["CategoryID"]."<br>";
                  $random = rand(10,1000000);
                  ?>
                  
                  <div id="select<?php echo $id_tb;?>">
                     <script type="text/javascript">
                        add_select('<?php echo $id_tb;?>','<?php echo $value2["CategoryID"]?>');
                      </script>
                    
                  </div>
                  <?php
                  //echo $value2['CategoryID']."<br>";
                }
              }else{
                ?>
                <div id="select<?php echo $id_tb;?>"></div>
                <?php
              }
                
                ?>
              </td>
              <td style=" text-align: center;"><input id="ProductAmount<?php echo $id_tb;?>" onBlur="number_format(this,0);"  style=" text-align: right;" name="ProductAmount[<?php echo $id_tb;?>][]" class="form-control" value="<?php echo $value['ProductAmount'];?>" placeholder="จำนวน"></td>
              <td style=" text-align: center;">
              <div>
                <input id="ProductSalePrice<?php echo $id_tb;?>" style=" text-align: right;" 
              onBlur="number_format(this,2);" name="ProductSalePrice[<?php echo $id_tb;?>][]" 
              class="form-control" value="<?php echo number_format($value['ProductSalePrice'],2);?>"
               placeholder="ราคาขาย">
              </div>
              <div style="margin-top:10px">
                ค่าจัดส่ง
              </div>
              <div style="margin-top:10px">
                <input id="DeliverCost<?php echo $id_tb;?>" style=" text-align: right;" 
              onBlur="number_format(this,2);" name="DeliverCost[<?php echo $id_tb;?>][]" 
              class="form-control" value="<?php echo number_format($value['DeliverCost'],2);?>"
               placeholder="ค่าจดส่ง">
              </div>

              </td>
              <td><div class="row">
              <div class="col-xs-2">ย่อ</div>
                <div class="col-xs-9">
                  <textarea class="form-control"  placeholder="คำอธิบายย่อ" name="ProductShortDESC[<?php echo $id_tb;?>][]"><?php echo $value['ProductShortDESC'];?></textarea></div>
                </div><br><div class="row"><div class="col-xs-2">ละเอียด</div>
                <div class="col-xs-9">
                  <textarea class="form-control"  placeholder="คำอธิบายละเอียด" name="ProductDESC[<?php echo $id_tb;?>][]"><?php echo $value['ProductDESC'];?></textarea>
                </div>
              </div></td>
              <td style=" text-align: center;">
                <a data-toggle="modal" class="btn btn-danger btn-xs" data-backdrop="static" href="javascript:void(0);" onClick="remove_id('<?php echo $id_tb;?>');"><i class='glyphicon glyphicon-trash'></i> ลบ</a>
              </td>
            </tr>
            <?php
            $i++;
          }
        }
      ?>
    	</tbody>
    </table>
   </div>
   <div style="text-align:center">
   <button class="btn btn-primary btn-sm" type="submit"><i class="glyphicon glyphicon-saved"></i> บันทึกข้อมูล</button>
    <a href="<?php echo $path."backoffice/Product";?>">
   <button class="btn btn-default btn-sm" type="button"><i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ</button></a>
   </div>    
  </form>
</div>
</div>
</div><!--panel-body-->
</div><!--panel panel-default-->
<?php 
include("backFoot.php");
?>