<?php
$act = '1';
include("backHeader.php");
include("function.php");
$arr_UserStatus = array("1"=>"ใช้งาน","2"=>"ระงับการใช้งาน");
$data = @$Topic[0];

$path1 = $path."backoffice/";
?>
<script type="text/javascript">
  function checkPass(){
    var p1 = $('#PassWord').val();
    var p2 = $('#PassWord2').val();
    if(p1!=p2&&p1==""){
      $('#s2').html("รหัสผ่านไม่ถูกต้อง");
      $('#p2').removeClass("input-group has-success").addClass("input-group has-warning");
      $("#flag").val('1');
    }
    else{
      $('#s2').html("รหัสผ่านถูกต้อง");
      $('#p2').removeClass("input-group has-warning").addClass("input-group has-success");
      $("#flag").val("");
    }
  }
  function checkInput(){
    if($('#TopicName').val()==""){
      alert("ระบุ "+$("#TopicName").attr("placeholder"));
      $('#TopicName').focus();
      return false;
    }
    if($("#TopicDetail").val()==""){
      alert("ระบุ "+$("#TopicDetail").attr("placeholder"));
      $('#TopicDetail').focus();
      return false;
    }
    return true;

  }
  function add_vdo(){
    if($('#text_vdo').val()!=""){
      var url = $('#text_vdo').val();
      var html = "[vdo]"+url+"[/vdo]";
      var TopicDetail = $('#TopicDetail').val();
      $('#TopicDetail').val(TopicDetail+html);
    }
    
  }
</script>
<ol class="breadcrumb" style="margin-top:-15px;">
  <li><a href="#">หน้าแรก</a></li>
  <li ><a href="<?php echo $path1."Topic";?>">บทความ</a></li>
  <li class="active">เพิ่ม/แก้ไขบทความ</li>
</ol>
<div class="panel panel-default" style="margin-top:-20px;">
  <div class="panel-body">

<div class="panel panel-primary" style="width:100%;">
	<div class="panel-heading">
		<h3 class="panel-title"><i class='glyphicon glyphicon-cog'></i> เพิ่ม/แก้ไขบทความ</h3>
	</div>
	<div class="panel-body">
  <div >
  </div>
  <div class="table-responsive" style="margin-top:10px;">
  <?php
  $action =$path."backoffice/Topic"; 
    if($data['TopicID']!=""){
      $action =$path."backoffice/Topic/".$data['TopicID']; 
    }
  ?>
  <form method="post"  id="form-input" action="<?php echo $action;?>" onSubmit="return checkInput();">
  <input type="hidden" name="_method" value="<?php echo ($data['TopicID']!='')?"PUT":"POST";?>">
  <div class="row">
    <div class="col-xs-1"></div>
    <div class="col-xs-2">
      ชื่อบทความ
    </div>
    <div class="col-xs-4"> 
      <input type="text" class="form-control" id="TopicName" 
      name="TopicName"  value="<?php echo $data['TopicName'];?>" placeholder="ชื่อบทความ">
    </div>
  </div>
  <div class="row" style="margin-top:10px;">
    <div class="col-xs-1"></div>
    <div class="col-xs-2">
      บทความ
    </div>
    <div class="col-xs-4">
      <textarea class="form-control" 
      placeholder="บทความ" id="TopicDetail"  rows="10" name="TopicDetail"><?php echo $data['TopicDetail'];?></textarea>
    </div>
    <div class="col-xs-1">
    เพิ่ม URL วีดีโอ
    </div>
    <div class="col-xs-2">
      <input type="text" class="form-control" placeholder="วาง url วีดีโอที่นี่" id="text_vdo">
    </div>
    <div class="col-xs-1">
      <button type="button" class="btn btn-primary btn-sm" onclick="add_vdo();">
      <i class="glyphicon glyphicon-saved"></i> แทรกวีดีโอ</button>
    </div>
  </div>
  <div class="row" style="margin-top:10px;">
  <div class="col-xs-1"></div>
  <div class="col-xs-2">สถานะ New</div>
  <div class="col-xs-4">
      <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-primary btn-xs <?php echo ($data['TopicNew']=='1'||$data['TopicNew']=="")?"active":"";?>">
        <input type="radio" name="TopicNew" id="TopicNew1" value="1" <?php echo ($data['TopicNew']=='1'||$data['TopicNew']=="")?"checked":"";?>> บทความใหม่
      </label>
      <label class="btn btn-primary  btn-xs <?php echo ($data['TopicNew']=='2')?"active":"";?>">
        <input type="radio" name="TopicNew" id="TopicNew2" value="2" 
        <?php echo ($data['TopicNew']=='2')?"checked":"";?> >บทความปกติ
      </label>
    </div>
  </div>
  </div>
  <div class="row" style="margin-top:10px;">
  <div class="col-xs-1"></div>
  <div class="col-xs-2">สถานะแสดง</div>
  <div class="col-xs-4">
      <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-primary btn-xs <?php echo ($data['TopicStatus']=='1'||$data['TopicStatus']=="")?"active":"";?>">
        <input type="radio" name="TopicStatus" id="TopicStatus1" value="1" <?php echo ($data['TopicStatus']=='1'||$data['TopicStatus']=="")?"checked":"";?>> แสดงบทความ
      </label>
      <label class="btn btn-primary  btn-xs <?php echo ($data['TopicStatus']=='2')?"active":"";?>">
        <input type="radio" name="TopicStatus" id="TopicStatus2" value="2" 
        <?php echo ($data['TopicStatus']=='2')?"checked":"";?> > ไม่แสดงบทความ
      </label>
    </div>
  </div>
  </div>
  <div class="row" style="margin-top:10px;">
    <div class="col-xs-3"></div>
    <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-saved"></i> บันทึกข้อมูล</button>
      <a href="<?php echo $path1."Topic";?>">
       <button type="button"  class="btn btn-default btn-sm" >
       <i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ</button></a>
    </div>
  </div>
  </form>
   </div>
</div>
</div>

</div><!--panel-body-->
</div><!--panel panel-default-->
<?php 
include("backFoot.php");
?>