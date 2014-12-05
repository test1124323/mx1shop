<?php
$act = '1';
include("backHeader.php");
include("function.php");

$arr_new = array(''=>'ทั้งหมด','1'=>'บทความใหม่','2'=>'บทความปกติ');
$arr_show = array(''=>'ทั้งหมด','1'=>'แสดงหน้าแรก','2'=>'ไม่แสดง');
?>
<script type="text/javascript">
  function DelData(id){
    if(confirm("ยืนยันการลบข้อมูล")){
      $("#_method").val("DELETE");
      $("#form-input").attr("method","POST").attr("action","Promotion/"+id).submit();
    }
  }
</script>
<ol class="breadcrumb" style="margin-top:-15px;">
  <li><a href="#">หน้าแรก</a></li>
  <li class="active">ข่าวสารและโปรโมชันถึงลูกค้า</li>
</ol>
<div class="panel panel-default" style="margin-top:-20px;">
  <div class="panel-body">

<div class="panel panel-primary" style="width:100%;">
	<div class="panel-heading">
		<h3 class="panel-title"><i class='glyphicon glyphicon-envelope'></i> ข่าวสารและโปรโมชันถึงลูกค้า</h3>
	</div>
	<div class="panel-body">

  <div class="table-responsive" >
  <form method="get"  id="form-input" action="Promotion">
  <input type="hidden" name="_method" id="_method" value="GET">
  <fieldset>
    <legend>ค้นหา</legend>
    <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-xs-1"></div>
            <div class="col-xs-2">
              ชื่อหัวข้อ
            </div>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="SSubject" name="SSubject" 
              value="<?php echo @$Input['SSubject'];?>" placeholder="ชื่อหัวข้อ">
            </div>
          </div>
          <div class="row" style="margin-top:10px;">
            <div class="col-xs-1"></div>
            <div class="col-xs-2">
              วันที่ทำรายการ
            </div>
            <div class="col-xs-3">
              <div class="input-group">
                <input type="text"  class="form-control datepicker" 
                value="<?php echo @$Input['SCreateDate'];?>" for="SCreateDate" 
                name="SCreateDate" id="SCreateDate" placeholder="dd/mm/yyyy"  >
                <span class="input-group-addon" for="SCreateDate">
                <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
            </div>
            <div class="col-xs-2">
              ถึง
            </div>
            <div class="col-xs-3">
              <div class="input-group">
                <input type="text"  class="form-control datepicker" 
                value="<?php echo @$Input['ECreateDate'];?>" for="ECreateDate" name="ECreateDate" 
                id="ECreateDate" placeholder="dd/mm/yyyy"  >
                <span class="input-group-addon" for="ECreateDate">
                <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
            </div>
          </div>
          <div class="row" style="margin-top:10px;">
            <div class="col-xs-12f^ text-center" >
              <button type="submit" class="btn btn-primary" >
              <i class="glyphicon glyphicon-search"></i> ค้นหา</button>
            </div>
          </div>
        </div>
    </div>
  </fieldset>
  <div style="margin-top:10px;" >
  <a href="Promotion/create">
  <button  type="button" class="btn btn-success btn-xs" >
    <i class='glyphicon glyphicon-plus'></i> เพิ่มข้อมูล</button>
  </a>
  </div>
    <table class="table table-hover table-bordered" style="margin-top:10px;" >
      <thead class="bg_tb">
        <tr>
          <th width="10%"><div style=" text-align: center;">ลำดับ</div></th>
          <th width="20%"><div style=" text-align: center;">วันที่</div></th>
          <th width="50%"><div style=" text-align: center;">ชื่อหัวข้อ</div></th>       
          <th width="20"><div style=" text-align: center;">จัดการ</div></th>
        </tr>
      </thead>
      <tbody>
      <?php
if(count($Promotion)>0){
  $i= $Promotion->getFrom()-1;
  foreach ($Promotion as $key => $value) {
  ?>
  <tr>
    <td class="text-center"><?php echo ++$i;?></td>
    <td ><?php echo conv_date($value['CreateDate']);?></td>
    <td ><?php echo $value['Subject'];?></td>
    <td class="text-center">
    <button type="button" class="btn btn-danger btn-xs" 
    onclick="DelData('<?php echo $value['PromotionID'];?>');" >
    <i class="glyphicon glyphicon-trash"></i> ลบข้อมูล
    </button>
    </td>
  </tr>
  <?php
  }

}else{?>
  <tr>
    <td  colspan="6" class="text-center bg-danger">ไม่พบข้อมูล</td>
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
    **ทั้งหมด <?php echo $Promotion->getTotal()." รายการ ";?>
  </div >
   <div style="text-align:right;" ><?php echo $Promotion->links(); ?></div>
<!--end page-->
</div>
</div>

</div><!--panel-body-->
</div><!--panel panel-default-->
<?php 
include("backFoot.php");
?>