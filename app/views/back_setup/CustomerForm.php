<?php
$act = '1';
include("backHeader.php");
include("function.php");
$arr_UserStatus = array("1"=>"ใช้งาน","2"=>"ระงับการใช้งาน");
$data = @$Customer[0];

$class_status = "has-success";
$text_show = "รหัสผ่านถูกต้อง";
$flag = "";
if($data['PassWord']==""){
  $class_status = "has-warning";
  $text_show = "รหัสผ่านไม่ถูกต้อง";
  $flag = '1';
}


$path1 = $path."backoffice/";
?>
<script type="text/javascript">
  function checkPass(){
    var p1 = $('#PassWord').val();
    var p2 = $('#PassWord2').val();
   // alert(p2);
    if(p1!=p2){
      $('#sp_con').html("<font style='color:red;'>**รหัสผ่านไม่ถูกต้อง</font>");
      $('#p2').removeClass("input-group has-success").addClass("input-group has-warning");
      $("#flag").val('1');
    }
    else{
      $('#sp_con').html("<font style='color:green;'>**รหัสผ่านถูกต้อง</font>");
      $('#p2').removeClass("input-group has-warning").addClass("input-group has-success");
      $("#flag").val("");
    }
  }
  function checkInput(){
    if($('#FullName').val()==""){
      alert("ระบุ "+$("#FullName").attr("placeholder"));
      $('#FullName').focus();
      return false;
    }
    if($("#UserAddress").val()==""){
      alert("ระบุ "+$("#UserAddress").attr("placeholder"));
      $('#UserAddress').focus();
      return false;
    }
    if($("#UserName").val()==""){
      alert("ระบุ "+$("#UserName").attr("placeholder"));
      $('#UserName').focus();
      return false;
    }
    if($("#TypeUser").val()=='2'){
      if($("#flag").val()=="1"){
      alert("กรุณายืนยันรหัสผ่านให้ตรงกัน");
      $('#PassWord2').focus();
      return false;
    }
    
    }
    return true;

  }
</script>
<ol class="breadcrumb" style="margin-top:-15px;">
  <li><a href="#">หน้าแรก</a></li>
  <?php 

  if($TypeUser=='1'){
    $path1 = $path1."Customer";
    }else{
       $path1 = $path1."Employee";
      }?>
  <li ><a href="<?php echo $path1;?>">ข้อมูลพนักงาน</a></li>
  <li class="active">ข้อมูลลูกค้า</li>
</ol>
<div class="panel panel-default" style="margin-top:-20px;">
  <div class="panel-body">

<div class="panel panel-primary" style="width:100%;">
	<div class="panel-heading">
		<h3 class="panel-title"><i class='glyphicon glyphicon-cog'></i> ข้อมูลลูกค้า</h3>
	</div>
	<div class="panel-body">
  <div >
  </div>
  <div class="table-responsive" style="margin-top:10px;">
  <form method="post"  id="form-input" action="<?php echo $path."backoffice/";?>User" onSubmit="return checkInput();">
  <input type="hidden" name="UserID" id="UserID" value="<?php echo $data['UserID'];?>">
  <input type="hidden" name="TypeUser" id="TypeUser" value="<?php echo $TypeUser;?>">
  <input type="hidden" name="flag" id="flag" value="<?php echo $flag;?>">
  <div class="row">
    <div class="col-xs-1"></div>
    <div class="col-xs-2">
      ชื่อ - สกุล
    </div>
    <div class="col-xs-3"> 
      <input type="text" class="form-control" id="FullName" 
      name="FullName" value="<?php echo $data['FullName'];?>" placeholder="ชื่อ - สกุล">
    </div>
  </div>
  <div class="row" style="margin-top:10px;">
    <div class="col-xs-1"></div>
    <div class="col-xs-2">
      ที่อยู่
    </div>
    <div class="col-xs-4">
      <textarea class="form-control" placeholder="ที่อยู่" id="UserAddress"  name="UserAddress"><?php echo $data['UserAddress'];?></textarea>
    </div>
  </div>
  <div class="row" style="margin-top:10px;">
    <div class="col-xs-1"></div>
    <div class="col-xs-2">
      เบอร์โทรศัพท์
    </div>
    <div class="col-xs-2">
      <input type="text" id="UserTel" class="form-control" name="UserTel" value="<?php echo $data['UserTel'];?>" placeholder="เบอร์โทรศัพท์">
    </div>
  </div>
  <div class="row" style="margin-top:10px;">
    <div class="col-xs-1"></div>
    <div class="col-xs-2">
      อีเมล์
    </div>
    <div class="col-xs-3">
      <input type="text" id="Email" class="form-control" name="Email" value="<?php echo $data['Email'];?>" placeholder="อีเมล์">
    </div>
  </div>
  <div class="row" style="margin-top:10px;">
    <div class="col-xs-1"></div>
    <div class="col-xs-2">
      ชื่อผู้ใช้งาน
    </div>
    <div class="col-xs-2">
      <input type="text" id="UserName" class="form-control" name="UserName" value="<?php echo $data['UserName'];?>" placeholder="ชื่อผู้ใช้งาน">
    </div>
  </div>
<?php 
if($TypeUser=='2'){
  ?>
  <div class="row" style="margin-top:10px;">
    <div class="col-xs-1"></div>
    <div class="col-xs-2">
      รหัสผ่าน
    </div>
    <div class="col-xs-2">
  
            <input type="password" class="form-control" id="PassWord" name="PassWord" 
      value="<?php echo $data['PassWord'];?>" placeholder="รหัสผ่าน">
    </div>
  </div>
  <div class="row" style="margin-top:10px;">
    <div class="col-xs-1"></div>
    <div class="col-xs-2">
      ยืนยันรหัสผ่าน
    </div>

    <div class="col-xs-2">
      <input type="password" onkeyup="checkPass();"  class="form-control" id="PassWord2" name="PassWord2" value="<?php echo $data['PassWord'];?>" 
      placeholder="ยืนยันรหัสผ่าน">
      <span   id="sp_con"></span>
    </div>
  </div>

  <div class="row" style="margin-top:10px;">
  <div class="col-xs-1"></div>
  <div class="col-xs-2">ระดับ</div>
  <div class="col-xs-4">
      <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-info btn-xs <?php echo ($data['SuperUser']=='1'||$data['SuperUser']=="")?"active":"";?>">
        <input type="radio" name="SuperUser" id="SuperUser1" value="1" <?php echo ($data['SuperUser']=='1'||$data['SuperUser']=="")?"checked":"";?>> Admin
      </label>
      <label class="btn btn-info  btn-xs <?php echo ($data['SuperUser']=='2')?"active":"";?>">
        <input type="radio" name="SuperUser" id="SuperUser2" value="2" <?php echo ($data['SuperUser']=='2')?"checked":"";?>> พนักงาน
      </label>
    </div>
  </div>
  </div>
  <?php
}
  ?>
  <div class="row" style="margin-top:10px;">
  <div class="col-xs-1"></div>
  <div class="col-xs-2">สถานะ</div>
  <div class="col-xs-4">
      <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-primary btn-xs <?php echo ($data['ActiveStatus']=='1'||$data['ActiveStatus']=="")?"active":"";?>">
        <input type="radio" name="ActiveStatus" id="ActiveStatus1" value="1" <?php echo ($data['ActiveStatus']=='1'||$data['ActiveStatus']=="")?"checked":"";?>> ใช้งาน
      </label>
      <label class="btn btn-primary  btn-xs <?php echo ($data['ActiveStatus']=='2')?"active":"";?>">
        <input type="radio" name="ActiveStatus" id="ActiveStatus2" value="2" <?php echo ($data['ActiveStatus']=='2')?"checked":"";?>> ระงับการใช้งาน
      </label>
    </div>
  </div>
  </div>
  <div class="row" style="margin-top:10px;">
    <div class="col-xs-3"></div>
    <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-saved"></i> บันทึกข้อมูล</button>
      <a href="<?php echo $path1;?>">
       <button type="button"  class="btn btn-default btn-sm"><i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ</button></a>
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