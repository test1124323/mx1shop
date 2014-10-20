<?php
$act = '1';
include("backHeader.php");
include("function.php");
$arr_UserStatus = array("1"=>"ใช้งาน","2"=>"ระงับการใช้งาน");
$arr_level = array("1"=>"Admin","2"=>"พนักงาน");
?>
<script type="text/javascript">
  function UserEdit(UserID){
    $("#UserID").val(UserID);
    $('#form-input').attr("action","UserEdit").submit();
  }
  function delData(UserID){
  if(confirm("ยืนยันการลบ !! ")){
    window.location.href="deleteCustomer/"+UserID;
  }
}
function AddUser(){
  $('#form-input').submit();
}
</script>
<ol class="breadcrumb" style="margin-top:-15px;">
  <li><a href="#">หน้าแรก</a></li>
  <li class="active">ข้อมูลพนักงาน</li>
</ol>
<div class="panel panel-default" style="margin-top:-20px;">
  <div class="panel-body">

<div class="panel panel-primary" style="width:100%;">
	<div class="panel-heading">
		<h3 class="panel-title"><i class='glyphicon glyphicon-cog'></i> ข้อมูลลูกค้า</h3>
	</div>
	<div class="panel-body">
  <div >
  	<button class="btn btn-success btn-xs"  onclick="AddUser();" data-toggle="modal" 
  	data-target=".bs-example-modal-lg" >
  	<i class='glyphicon glyphicon-plus'></i> เพิ่มข้อมูล</button>
  </div>
  <div class="table-responsive" style="margin-top:10px;">
  <form method="post"  id="form-input" action="UserEdit"> 
  <input type="hidden" name="UserID" id="UserID" value="">
  <input type="hidden" name="TypeUser" id="TypeUser" value="2">
        <table class="table table-hover table-bordered" >
      <thead class="bg_tb">
        <tr>
          <th width="5%"><div style=" text-align: center;">ลำดับ</div></th>
          <th width="15%"><div style=" text-align: center;">ชื่อ - สกุล</div></th>
          <th width="15%"><div style=" text-align: center;">ที่อยู่</div></th>
          <th width="10%"><div style=" text-align: center;">เบอร์โทร</div></th>
          <th width="10%"><div style=" text-align: center;">Email</div></th>             
          <th width="10%"><div style=" text-align: center;">Username</div></th>
          <th width="10%"><div style=" text-align: center;">Password</div></th>
          <th width="10%"><div style=" text-align: center;">ระดับ/สถานะ</div></th>
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
              <td><?php echo $arr_level[$value['SuperUser']]."/".$arr_UserStatus[$value['ActiveStatus']];?></td>
              <td class="text-center">
              <button type="button" class="btn btn-default btn-xs" 
              onclick="UserEdit('<?php echo $value['UserID'];?>');">
              <i class="glyphicon glyphicon-pencil"></i> แก้ไข</button>
    <button type="button" class="btn btn-danger btn-xs" onclick="delData('<?php echo $value['UserID'];?>');"><i class="glyphicon glyphicon-trash"></i> ลบ</button></td>
            </tr>
            <?php
          }
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