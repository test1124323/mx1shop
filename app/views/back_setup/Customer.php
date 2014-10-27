<?php
$act = '1';
include("backHeader.php");
include("function.php");
$arr_UserStatus = array("1"=>"ใช้งาน","2"=>"ระงับการใช้งาน");
?>
<script type="text/javascript">
  function UserEdit(UserID){
    $("#UserID").val(UserID);
    $('#form-input').attr("method","POST").attr("action","UserEdit").submit();
  }
  function delData(UserID){
  if(confirm("ยืนยันการลบ !! ")){
    window.location.href="deleteCustomer/"+UserID;
  }
}
function AddUser(){
  $('#form-input').attr("method","POST").attr("action","UserEdit").submit();
}
function Search(){
  $('#form-input').attr("action","Customer").submit();
}
</script>
<ol class="breadcrumb" style="margin-top:-15px;">
  <li><a href="#">หน้าแรก</a></li>
  <li class="active">ข้อมูลลูกค้า</li>
</ol>
<div class="panel panel-default" style="margin-top:-20px;">
  <div class="panel-body">

<div class="panel panel-primary" style="width:100%;">
	<div class="panel-heading">
		<h3 class="panel-title"><i class='glyphicon glyphicon-cog'></i> ข้อมูลลูกค้า</h3>
	</div>
	<div class="panel-body">

  <div class="table-responsive" style="margin-top:10px;">
  <form method="get"  id="form-input" >
  <fieldset>
    <legend>ค้นหา</legend>
    <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-xs-1"></div>
            <div class="col-xs-2">
              ชื่อ-สกุล
            </div>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="SFullName" 
              value="<?php echo @$Input['SFullName'];?>" name="SFullName" 
              placeholder="ชื่อ-สกุล">
            </div>
            <div class="col-xs-2">
              ที่อยู่
            </div>
            <div class="col-xs-3">
              <input type="text" class="form-control" value="<?php echo @$Input['SUserAddress'];?>" 
              id="SUserAddress" name="SUserAddress" placeholder="ที่อยู่">
            </div>
          </div>
          <div class="row" style="margin-top:10px;">
            <div class="col-xs-1"></div>
            <div class="col-xs-2">
              หมายเลขโทรศัพท์
            </div>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="SUserTel" name="SUserTel" 
              value="<?php echo @$Input['SUserTel'];?>" placeholder="หมายเลขโทรศัพท์">
            </div>
            <div class="col-xs-2">
              อีเมล์
            </div>
            <div class="col-xs-3">
              <input type="text" class="form-control" value="<?php echo @$Input['SEmail'];?>" 
              id="SEmail" name="SEmail" placeholder="อีเมล์">
            </div>
   
          </div>

          <div class="row" style="margin-top:10px;">
            <div class="col-xs-1"></div>
            <div class="col-xs-2">
              สถานะ
            </div>
            <div class="col-xs-3">
              <?php echo Form::select('SActiveStatus',array('ทั้งหมด','1'=>'ใช้งาน','2'=>'ระงับการใช้งาน'),
              @$Input['SActiveStatus'],array('class'=>'form-control'));?>
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
    <div  style="margin-top:10px;">
    <button class="btn btn-success btn-xs"  onclick="AddUser();" data-toggle="modal" 
    data-target=".bs-example-modal-lg" >
    <i class='glyphicon glyphicon-plus'></i> เพิ่มข้อมูล</button>
  </div>

  <input type="hidden" name="UserID" id="UserID" value="">
  <input type="hidden" name="TypeUser" id="TypeUser" value="1">
        <table class="table table-hover table-bordered" style="margin-top:10px;">
      <thead class="bg_tb">
        <tr>
          <th width="5%"><div style=" text-align: center;">ลำดับ</div></th>
          <th width="15%"><div style=" text-align: center;">ชื่อ - สกุล</div></th>
          <th width="15%"><div style=" text-align: center;">ที่อยู่</div></th>
          <th width="10%"><div style=" text-align: center;">เบอร์โทร</div></th>
          <th width="10%"><div style=" text-align: center;">Email</div></th>             
          <th width="10%"><div style=" text-align: center;">Username</div></th>
          <th width="10%"><div style=" text-align: center;">Password</div></th>
          <th width="10%"><div style=" text-align: center;">สถานะ</div></th>
          <th width="15%"><div style=" text-align: center;">จัดการ</div></th>
        </tr>
      </thead>
      <tbody>
      <?php 
        if(count($Customer)){
          $i=$Customer->getFrom()-1;
          foreach ($Customer as $key => $value) {
            # code...
            ?>
            <tr>
              <td class="text-center"><?php echo ++$i;?></td>
              <td><?php echo $value['FullName'];?></td>
              <td><?php echo $value['UserAddress']?></td>
              <td><?php echo $value['UserTel'];?></td>
               <td><?php echo $value['Email'];?></td>
              <td><?php echo $value['UserName'];?></td>
              <td><?php echo $value['PassWord'];?></td>
              <td><?php echo $arr_UserStatus[$value['ActiveStatus']];?></td>
              <td class="text-center"><button type="button" class="btn btn-default btn-xs" onclick="UserEdit('<?php echo $value['UserID'];?>');"><i class="glyphicon glyphicon-pencil"></i> แก้ไข</button>
    <button type="button" class="btn btn-danger btn-xs" onclick="delData('<?php echo $value['UserID'];?>');"><i class="glyphicon glyphicon-trash"></i> ลบ</button></td>
            </tr>
            <?php
          }
        }else{
          ?>
          <tr>
            <td  colspan="9" class="text-center bg-danger">ไม่พบข้อมูล</td>
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
    **ทั้งหมด <?php echo $Customer->getTotal()." รายการ ";?>
  </div >
   <div style="text-align:right;" ><?php echo $Customer->links(); ?></div>
<!--end page-->
</div>
</div>

</div><!--panel-body-->
</div><!--panel panel-default-->
<?php 
include("backFoot.php");
?>