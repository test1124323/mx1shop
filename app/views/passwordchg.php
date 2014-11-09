<?php
include("webHead.php");
$profile  = Session::get('profile');
?> 
<script>
window.location.href="#list";


function apass(){
	var newpass1 =	$("#newpass1").val();
	var newpass2 =	$("#newpass2").val();

	if(newpass1!=newpass2 || newpass1 == 0){
		$("#btnchangepass").css('background','#ECECEC');
		$("#btnchangepass").attr('disabled','disabled');
	}else{
		$("#btnchangepass").css('background','rgba(230,0,20,0.7)');
		$("#btnchangepass").removeAttr('disabled');
	}
}


</script>

<div class="col-sm-8" style="padding-top:10px;">
<div style="border-bottom:solid thin #F0F0F0;">
<a href="<?php echo Request::root().'/profile'?>"><button class="btn btn-default" style="padding:15px; font-size:14px;color:#666;">จัดการโปรไฟล์</button></a>
<button class="btn btn-default" style="padding:15px; font-size:14px;color:#666;background:#DEDEDE;">เปลี่ยน password</button>
</div>
<form method="post" name="changepass" action = "<?php echo Request::root()?>/registeration/<?php echo $profile['userid']?>">
          <input type="hidden" name="mode" value="password">
          <input type='hidden' value="put" name="_method">

          <div class="col-sm-12" style="padding:20px;">
          <div class="col-sm-12" style="padding-top:15px;"> 
          <?php
            if(Input::has('error')){
              ?>
              <div class="alert alert-danger" role="alert"><?php echo base64_decode(Input::get('error')); ?></div>
              <?php
            }elseif(Input::has('success')){
              ?>
              <div class="alert alert-success" role="alert"><?php echo base64_decode(Input::get('success')); ?></div>
              <?php
            }
          ?>
          </div>
          <div class="col-sm-11">
            <h4 style="color:rgba(230,0,20,0.6)"> </h4>
            
            <input type="password" class="form-control square" placeholder="พาสเวิร์ดเดิม" name="oldpass" />
          </div>
          <div class="col-sm-11">
            <h4 style="color:rgba(230,0,20,0.6)"> </h4>
            
            <input type="password" class="form-control square" placeholder="พาสเวิร์ดใหม่" id="newpass1" name="newpass1" onkeyup="javascript:apass()" />
          </div>
          
          <!-- !row -->
          <!-- row -->
          <div class="col-sm-11">
          <h4 style="color:rgba(230,0,20,0.6)"> </h4>
            <!-- <h4 class="h3-label">ที่อยู่ <span class="password-color-red">*</span></h4> -->
            <input type="password" class="form-control square" name="newpass2" id="newpass2" placeholder="ยืนยันพาสเวิร์ดใหม่" onkeyup="javascript:apass()" />
          </div>
          
          <!-- !row -->
         
          </div>
          <div class="col-sm-6" style="padding-left:30px;" >
            <button id="btnchangepass" class="btn btn-danger col-sm-12" style="font-size:14x;" type="submit"><b>เปลี่ยนพาสเวิร์ด</b></button>          
        </div>
      </form>
</div>
<div class="col-sm-12" style="height:200px;"></div>
<?php
include("webFoot.php");
?>