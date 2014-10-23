<?php
$act = '1';
include("backHeader.php");
include("function.php");
$arr_UserStatus = array("1"=>"ใช้งาน","2"=>"ระงับการใช้งาน");
$data = @$Customer[0];
?>
<ol class="breadcrumb" style="margin-top:-15px;">
  <li><a href="#">หน้าแรก</a></li>
  <?php if($TypeUser=='1'){
    ?>
    <li ><a href="Customer">ข้อมูลลูกค้า</a></li>
    <?php
    }else{
      ?>
      <li ><a href="Employee">ข้อมูลพนักงาน</a></li>
      <?php
      }?>
  
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
  <form method="post"  id="form-input" action="User">
  <input type="hidden" name="UserID" id="UserID" value="<?php echo $data['UserID'];?>">
  <input type="hidden" name="TypeUser" id="TypeUser" value="<?php echo $TypeUser;?>">
  <div class="row">
    <div class="col-xs-1"></div>
    <div class="col-xs-1">
      ชื่อ - สกุล
    </div>
    <div class="col-xs-3"> 
      <input type="text" class="form-control" id="FullName" 
      name="FullName" value="<?php echo $data['FullName'];?>" placeholder="ชื่อ - สกุล">
    </div>
  </div>
  <div class="row" style="margin-top:10px;">
    <div class="col-xs-1"></div>
    <div class="col-xs-1">
      ที่อยู่
    </div>
    <div class="col-xs-4">
      <textarea class="form-control" placeholder="ที่อยู่"  name="UserAddress"><?php echo $data['UserAddress'];?></textarea>
    </div>
  </div>
  <div class="row" style="margin-top:10px;">
    <div class="col-xs-1"></div>
    <div class="col-xs-1">
      เบอร์โทรศัพท์
    </div>
    <div class="col-xs-2">
      <input type="text" id="UserTel" class="form-control" name="UserTel" value="<?php echo $data['UserTel'];?>" placeholder="เบอร์โทรศัพท์">
    </div>
  </div>
  <div class="row" style="margin-top:10px;">
    <div class="col-xs-1"></div>
    <div class="col-xs-1">
      อีเมล์
    </div>
    <div class="col-xs-3">
      <input type="text" id="Email" class="form-control" name="Email" value="<?php echo $data['Email'];?>" placeholder="อีเมล์">
    </div>
  </div>
  <div class="row" style="margin-top:10px;">
    <div class="col-xs-1"></div>
    <div class="col-xs-1">
      ชื่อผู้ใช้งาน
    </div>
    <div class="col-xs-2">
      <input type="text" id="UserName" class="form-control" name="UserName" value="<?php echo $data['UserName'];?>" placeholder="ชื่อผู้ใช้งาน">
    </div>
  </div>
  <div class="row" style="margin-top:10px;">
    <div class="col-xs-1"></div>
    <div class="col-xs-1">
      รหัสผ่าน
    </div>
    <div class="col-xs-2">
      <input type="text" class="form-control" id="PassWord" name="PassWord" value="<?php echo $data['PassWord'];?>" placeholder="รหัสผ่าน">
    </div>
  </div>
  <?php 
if($TypeUser=='2'){
  ?>
  <div class="row" style="margin-top:10px;">
  <div class="col-xs-1"></div>
  <div class="col-xs-1">ระดับ</div>
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
  <div class="col-xs-1">สถานะ</div>
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
    <div class="col-xs-2"></div>
    <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-saved"></i> บันทึกข้อมูล</button>
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