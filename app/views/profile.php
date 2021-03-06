<?php
include("webHead.php");
$profile  = Session::get('profile');
?> 
<script>
window.location.href="#list";
</script>

<div class="col-sm-8" style="padding-top:10px;">
<div style="border-bottom:solid thin #F0F0F0;">
<button class="btn" style="padding:15px; font-size:14px;color:#666;background:#DEDEDE;">จัดการข้อมูลสมาชิก</button>
<?php
if(empty($profile['facebook_id'])) {
?>
<a href="<?php echo Request::root().'/passwordchange'?>"><button class="btn btn-default" style="padding:15px; font-size:14px;color:#666;">เปลี่ยน password</button></a>
<?php
  }
?>

<form method="post" name="registerform" action = "<?php echo Request::root()?>/registeration/<?php echo $profile['userid']?>">
          <input type="hidden" value="profile" name="mode">
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
            <h4 style="color:rgba(230,0,20,0.6)"> ชื่อ</h4>
            <!-- <h4 class="h3-label">ชื่อ <span class="text-color-red">*</span></h4> -->
            <input type="text" class="form-control square" placeholder="ชื่อ" name="fname" value="<?php echo $profile['fname']?>" required />
          </div>
          <div class="col-sm-11">
            <h4 style="color:rgba(230,0,20,0.6)"> สกุล</h4>
            <!-- <h4 class="h3-label">สกุล <span class="text-color-red">*</span></h4> -->
            <input type="text" class="form-control square" placeholder="สกุล" name="lname" value="<?php echo $profile['lname']?>" required />
          </div>
          
          <!-- !row -->
          <!-- row -->
          <div class="col-sm-11">
          <h4 style="color:rgba(230,0,20,0.6)"> ที่อยู่</h4>
            <!-- <h4 class="h3-label">ที่อยู่ <span class="text-color-red">*</span></h4> -->
            <input type="text" class="form-control square" name="address" placeholder="ที่อยู่ในการจัดส่งสินค้า" value="<?php echo $profile['address']?>" required />
          </div>
          
          <!-- !row -->
          <!-- row -->
          <div class="col-sm-11">
          <h4 style="color:rgba(230,0,20,0.6)"> รหัสไปรษณีย์</h4>
            <!-- <h4 class="h3-label">รหัสไปรษณีย์ <span class="text-color-red">*</span></h4> -->
            <input type="tel" class="form-control square" name="postcode" placeholder="รหัสไปรษณีย์" value="<?php echo $profile['postcode']?>" required />
          </div>
          <div class="col-sm-11">
          <h4 style="color:rgba(230,0,20,0.6)"> เบอร์โทรศัพท์</h4>
            <!-- <h4 class="h3-label">เบอร์โทรศัพท์ <span class="text-color-red">*</span></h4> -->
            <input type="tel" class="form-control square" name="telnumber" placeholder="เบอร์โทรศัพท์" value="<?php echo $profile['telnumber']?>" required />
          </div>
          
          <!-- !row -->
          <!-- row -->
          <div class="col-sm-11">
          <h4 style="color:rgba(230,0,20,0.6)"> อีเมล์</h4>
            <!-- <h4 class="h3-label">E-mail <span class="text-color-red">*</span></h4> -->
            <input type="email" class="form-control square" name="email" placeholder="example@email.com" value="<?php echo $profile['email']?>" required />
          </div>
          </div>
          <div class="col-sm-6" style="padding:20px;">
            <button class="btn btn-danger col-sm-12" style="padding:10px;font-size:18px;" type="submit"><b>บันทึกข้อมูล</b></button>          
        </div>
      </form>
</div>
<?php
include("webFoot.php");
?>