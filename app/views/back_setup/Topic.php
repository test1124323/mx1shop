<?php
$act = '4';
include("backHeader.php");
include("function.php");

$arr_new = array(''=>'ทั้งหมด','1'=>'บทความใหม่','2'=>'บทความปกติ');
$arr_show = array(''=>'ทั้งหมด','1'=>'แสดงหน้าแรก','2'=>'ไม่แสดง');
?>
<script type="text/javascript">
  function DelData(id){
    if(confirm("ยืนยันการลบข้อมูล")){
      $("#_method").val("DELETE");
      $("#form-input").attr("method","POST").attr("action","Topic/"+id).submit();
    }
  }
</script>
<ol class="breadcrumb" style="margin-top:-15px;">
  <li><a href="#">หน้าแรก</a></li>
  <li class="active">บทความ</li>
</ol>
<div class="panel panel-default" style="margin-top:-20px;">
  <div class="panel-body">

<div class="panel panel-primary" style="width:100%;">
	<div class="panel-heading">
		<h3 class="panel-title"><i class='glyphicon glyphicon-cog'></i> บทความ</h3>
	</div>
	<div class="panel-body">

  <div class="table-responsive" >
  <form method="get"  id="form-input" action="Topic">
  <input type="hidden" name="_method" id="_method" value="GET">
  <fieldset>
    <legend>ค้นหา</legend>
    <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-xs-1"></div>
            <div class="col-xs-2">
              ชื่อบทความ
            </div>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="STopicName" name="STopicName" 
              value="<?php echo @$Input['STopicName'];?>" placeholder="ชื่อบทความ">
            </div>
            <div class="col-xs-2">
              บทความ
            </div>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="STopicDetail" 
              value="<?php echo @$Input['STopicDetail'];?>" name="STopicDetail" placeholder="บทความ">
            </div>
          </div>
          <div class="row" style="margin-top:10px">
            <div class="col-xs-1"></div>
            <div class="col-xs-2">
              สถานะแสดง
            </div>
            <div class="col-xs-3">
              <?php echo Form::select('STopicStatus',$arr_show,@$Input['STopicStatus'],array("class"=>'form-control'));?>
            </div>
            <div class="col-xs-2">
              สถานะ New
            </div>
            <div class="col-xs-3">
              <?php echo Form::select('STopicNew',$arr_new,@$Input['STopicNew'],array("class"=>'form-control'));?>
            </div>
          </div>
          <div class="row" style="margin-top:10px;">
            <div class="col-xs-12f^ text-center" >
              <button type="submit" class="btn btn-primary" ><i class="glyphicon glyphicon-search"></i> ค้นหา</button>
            </div>
          </div>
        </div>
    </div>
  </fieldset>
  <div style="margin-top:10px;" >
  <a href="Topic/create">
  <button  type="button" class="btn btn-success btn-xs" >
    <i class='glyphicon glyphicon-plus'></i> เพิ่มข้อมูล</button>
  </a>
  </div>
    <table class="table table-hover table-bordered" style="margin-top:10px;" >
      <thead class="bg_tb">
        <tr>
          <th width="10%"><div style=" text-align: center;">ลำดับ</div></th>
          <th width="15%"><div style=" text-align: center;">ภาพหน้าปก</div></th>
          <th width="20%"><div style=" text-align: center;">ชื่อบทความ</div></th>
          <th width="10%"><div style=" text-align: center;">สถานะแสดง</div></th>
          <th width="10%"><div style=" text-align: center;">สถานะ New</div></th>           
          <th width="15%"><div style=" text-align: center;">จัดการ</div></th>
        </tr>
      </thead>
      <tbody>
      <?php
if(count($Topic)>0){
  $i= $Topic->getFrom()-1;
  foreach ($Topic as $key => $value) {
  ?>
  <tr>
    <td class="text-center"><?php echo ++$i;?></td>
    <td>
    <?php if($value['TopicPic']){
      ?>
      <img src="<?php echo $path."img/picTopic/".$value['TopicPic'];?>" height="150" width="200">
      <?php
      }?>
    </td>
    <td ><?php echo $value['TopicName'];?></td>
     <td><?php echo $arr_show[$value['TopicStatus']];?></td>
    <td><?php echo $arr_new[$value['TopicNew']];?></td>
    <td class="text-center">
    <a href="Topic/<?php echo $value['TopicID'];?>">
    <button type="button" class="btn btn-default btn-xs" >
    <i class="glyphicon glyphicon-pencil"></i> แก้ไขข้อมูล
    </button></a>
    <button type="button" class="btn btn-danger btn-xs" 
    onclick="DelData('<?php echo $value['TopicID'];?>');" >
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
    **ทั้งหมด <?php echo $Topic->getTotal()." รายการ ";?>
  </div >
   <div style="text-align:right;" ><?php echo $Topic->links(); ?></div>
<!--end page-->
</div>
</div>

</div><!--panel-body-->
</div><!--panel panel-default-->
<?php 
include("backFoot.php");
?>