<?php
$act = '3';
include("backHeader.php");
include("function.php");
?>
<script type="text/javascript">
  function ProductPic(){
    $('#form-input').attr('method','POST').attr('action','ProductPic').submit();
  }
  function ProductEdit(){
     $('#form-input').attr('method','POST').attr('action','ProductEdit').submit();
  }
  function ProductDelete(){
    if(confirm("ยืนยันการลบข้อมุล")){
      $('#form-input').attr('method','POST').attr('action','ProductDel').submit();
    }
     
  }
  function Fnchk_all(){
    if($('#chk_all').prop('checked')){
      $('input[name*=chk_productID]').prop('checked',true);
    }else{
      $('input[name*=chk_productID]').prop('checked',false);
    }
  }
  function Search(){
     $('#form-input').attr('action','Product').submit();
  }
  function ProductForm(){
    $('#form-input').attr('method','POST').attr('action','ProductForm').submit();
  }
  function ProductAdd(){
    //$('#_method').val("GET");
    $('#form-input').attr('action','ProductForm/create').submit();
  }
</script>
<?php 
//echo "<pre>";print_r($result);echo "</pre>";

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

  <div class="table-responsive" >
  <form method="get"  id="form-input">
  
  <fieldset>
    <legend>ค้นหา</legend>
    <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-xs-1"></div>
            <div class="col-xs-2">
              รหัสสินค้า
            </div>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="SProductID" name="SProductID" 
              value="<?php echo @$Input['SProductID'];?>" placeholder="รหัสสินค้า">
            </div>
            <div class="col-xs-2">
              ชื่อรายการสินค้า
            </div>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="SProductName" 
              value="<?php echo @$Input['SProductName'];?>" name="SProductName" placeholder="ชื่อรายการสินค้า">
            </div>
          </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-xs-1"></div>
            <div class="col-xs-2">
              หมวดสินค้า
            </div>
            <div class="col-xs-3">
              <?php
                echo Form::select('SCategoryID',$arr_dataSel,@$Input['SCategoryID'],array('class'=>'form-control'));
              ?>
            </div>
          </div>
      
          <div class="row" style="margin-top:10px;">
            <div class="col-xs-12f^ text-center" >
              <button type="button" class="btn btn-primary" onclick="Search();"><i class="glyphicon glyphicon-search"></i> ค้นหา</button>
            </div>
          </div>
        </div>
    </div>
  </fieldset>
   

  <div style="margin-top:10px;" >

    <button class="btn btn-success btn-xs" onclick="ProductAdd();">
    <i class='glyphicon glyphicon-plus'></i> เพิ่มข้อมูล</button>
    <button type="button" onclick="ProductPic();" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-picture"></i> จัดการภาพ</button>
    <button type="button" class="btn btn-default btn-xs" onclick="ProductEdit();"><i class="glyphicon glyphicon-pencil"></i> แก้ไขข้อมูล</button>
    <button type="button" class="btn btn-danger btn-xs" onclick="ProductDelete();"><i class="glyphicon glyphicon-trash"></i> ลบข้อมูล</button>
  </div>
    <table class="table table-hover table-bordered" style="margin-top:10px;" >
      <thead class="bg_tb">
        <tr>
          <th width="5%"><div style=" text-align: center;">
          <input type="checkbox" name="chk_all" id="chk_all"  onclick="Fnchk_all();" > ลำดับ</div></th>
          <th width="15%"><div style=" text-align: center;">รหัสสินค้า</div></th>
          <th width="20%"><div style=" text-align: center;">ชื่อรายการสินค้า</div></th>
          <th width="15%"><div style=" text-align: center;">หมวดสินค้า</div></th>           
          <th width="5%"><div style=" text-align: center;">จำนวน</div></th>
          <th width="8%"><div style=" text-align: center;">ราคาขาย/หน่วย</div></th>
          <th width="30%"><div style=" text-align: center;">รายละเอียด</div></th>
        </tr>
      </thead>
      <tbody>
      <?php 
      if(count($product)>0){
        $i=$product->getFrom()-1;
        foreach ($product as $key => $value) {
          # code...
          ?>
          <tr>
              <td style=" text-align: center;" >
              <input type="checkbox" name="chk_productID[]" value="<?php echo $value['ProductID'];?>" > <?php echo ++$i.".";?>
              </td>
              <td><a href="ProductForm/<?php echo $value['ProductID'];?>"><?php echo sprintf("%07s",$value['ProductID']);?></a></td>
              <td><?php echo $value['ProductName'];?></td>
              <td><?php
                if($value['procate_category']){
                  foreach ($value['procate_category'] as $key2 => $value2) {
                    echo "<li>".@$arr_dataAll[$value2['CategoryID']]['name']."</li>";
                  }
                }
              ?></td>
              <td style="text-align:right;"><?php echo number_format($value['ProductAmount']);?></td>
              <td style="text-align:right;"><?php echo number_format($value['ProductSalePrice'],2);?></td>
              <td>
      <div class="panel-group" id="accordion">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $value['ProductID'];?>">
             รายละเอียดแบบย่อ
            </a>
          </h4>
        </div>
        <div id="collapseOne<?php echo $value['ProductID'];?>" class="panel-collapse collapse in">
          <div class="panel-body">
            <?php echo $value['ProductShortDESC'];?>
        </div>
      </div>
      <div class="panel panel-info">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo<?php echo $value['ProductID'];?>">
             รายละเอียดแบบเต็ม
            </a>
          </h4>
        </div>
        <div id="collapseTwo<?php echo $value['ProductID'];?>" class="panel-collapse collapse">
          <div class="panel-body">
          <?php echo $value['ProductDESC'];?>
          </div>
        </div>
      </div>
     </td>

        </tr>
          <?php
        }
      }else{
        ?>
        <tr>
          <td  colspan="7" class="text-center bg-danger">ไม่พบข้อมูล</td>
        </tr>
        <?php
      }
      ?>

      </tbody>
    </table>
  </form>
   </div>
<!--start page-->
<div style="text-align:right;">
    **ทั้งหมด <?php echo $product->getTotal()." รายการ ";?>
  </div >
   <div style="text-align:right;" ><?php echo $product->links(); ?></div>
<!--end page-->
</div>
</div>

</div><!--panel-body-->
</div><!--panel panel-default-->
<?php 
include("backFoot.php");
?>