<?php
$act = '5';
include("backHeader.php");
include("function.php");
$arr_UserStatus = array("1"=>"ใช้งาน","2"=>"ระงับการใช้งาน");
$data = @$Topic[0];

$path1 = $path."backoffice/";
?>
<script src="<?php echo $path;?>js/ckeditor/ckeditor.js"></script>

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
    if($('#TextName').val()==""){
      alert("ระบุ "+$("#TextName").attr("placeholder"));
      $('#TextName').focus();
      return false;
    }
    return true;

  }

</script>
<ol class="breadcrumb" style="margin-top:-15px;">
  <li><a href="#">หน้าแรก</a></li>
  <li ><a href="<?php echo $path1."Promotion";?>">ข่าวสารและโปรโมชั่นถึงลูกค้า</a></li>
  <li class="active">ส่งอีเมล์</li>
</ol>
<div class="panel panel-default" style="margin-top:-20px;">
  <div class="panel-body">

<div class="panel panel-primary" style="width:100%;">
	<div class="panel-heading">
		<h3 class="panel-title"><i class='glyphicon glyphicon-envelope'></i> ส่งอีเมล์</h3>
	</div>
	<div class="panel-body">
  <div >
  </div>
  <div class="table-responsive" style="margin-top:10px;">
  <?php
  $action =$path."backoffice/Promotion"; 
    if($data['TopicID']!=""){
      $action =$path."backoffice/Promotion/".$data['TopicID']; 
    }
  ?>
  <form method="post"  id="form-input" action="<?php echo $action;?>" onSubmit="return checkInput();"  enctype="multipart/form-data">
  <input type="hidden" name="_method" value="<?php echo ($data['TopicID']!='')?"PUT":"POST";?>">
  <div class="row">
    <div class="col-xs-1"></div>
    <div class="col-xs-2">
      ชื่อหัวข้อ
    </div>
    <div class="col-xs-4"> 
      <input type="text" class="form-control" id="TextName" 
      name="TextName"  value="<?php echo $data['TextName'];?>" placeholder="ชื่อหัวข้อ">
    </div>
  </div>
  <br>
   <div class="row">
    <div class="col-xs-1"></div>
    <div class="col-xs-2">
      รูปภาพ
    </div>
    <div class="col-xs-2"> 
      <input type="file" class="form-control" id="PicAds" 
      name="PicAds"  value="<?php echo $data['PicAds'];?>" placeholder="รูปภาพ">
    </div>
  </div>
  <div class="row" style="margin-top:10px;">
    <div class="col-xs-1"></div>
    <div class="col-xs-2">
      รายละเอียด
    </div>
    <div class="col-xs-8">
      <textarea  class="ckeditor" id="TextEmail"  rows="10" name="TextEmail"></textarea>
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