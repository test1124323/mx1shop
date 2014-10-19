<?php
include("webHead.php");
?>
<script>
window.location.href="#list";
</script>

<style>
  .h3-label{
    color:#999999;
  }  
</style>

<div class="col-sm-12" style="padding-top:10px;">
<form method="post" name="billingForm" action="billing">
<div class="col-sm-12">
<?php if(Input::has('updated')&&Input::get('updated')=='1'){?>
<div class="alert alert-danger" role="alert"><i class="glyphicon glyphicon-remove-sign" style="font-size:20px;"></i>  กรุณากรอกข้อมูลให้ถูกต้อง</div>
<?php }?>
  <h3 style="color:#777;">ชื่อ ที่อยู่ สำหรับจัดส่งของ</h3>
</div>


<?php
  $input  =  Session::get('input');
?>
<!-- row -->
<div class="col-sm-5">
  <h3> </h3>
  <h4 class="h3-label">ชื่อ <span class="text-color-red">*</span></h4>
  <input type="text" class="form-control square" name="fname" value="<?php echo @$input['fname']?>" required />
</div>
<div class="col-sm-5">
  <h3> </h3>
  <h4 class="h3-label">สกุล <span class="text-color-red">*</span></h4>
  <input type="text" class="form-control square" name="lname" value="<?php echo @$input['lname']?>" required />
</div>
<div class="col-sm-2"></div>
<!-- !row -->
<!-- row -->
<div class="col-sm-10">
<h3> </h3>
  <h4 class="h3-label">ที่อยู่ <span class="text-color-red">*</span></h4>
  <input type="text" class="form-control square" name="address" placeholder="บ้านเลขที่ หมู่บ้าน ถนน เขต แขวง" value="<?php echo @$input['address']?>" required />
</div>
<div class="col-sm-2"></div>
<!-- !row -->
<!-- row -->
<div class="col-sm-5">
<h3> </h3>
  <h4 class="h3-label">รหัสไปรษณีย์ <span class="text-color-red">*</span></h4>
  <input type="tel" class="form-control square" name="postcode" placeholder="รหัสไปรษณี" value="<?php echo @$input['postcode']?>" required />
</div>
<div class="col-sm-5">
<h3> </h3>
  <h4 class="h3-label">เบอร์โทรศัพท์ <span class="text-color-red">*</span></h4>
  <input type="tel" class="form-control square" name="telnumber" placeholder="เบอร์โทรศัพท์" value="<?php echo @$input['telnumber']?>" required />
</div>
<div class="col-sm-2"></div>
<!-- !row -->
<!-- row -->
<div class="col-sm-10">
<h3> </h3>
  <h4 class="h3-label">E-mail <span class="text-color-red">*</span></h4>
  <input type="email" class="form-control square" name="email" placeholder="example@email.com" value="<?php echo @$input['email']?>" required />
</div>
<div class="col-sm-2"></div>
<!-- !row -->

<div class="col-sm-10" align="center">
<hr>
<style>
  input{
    border-radius: 2px !important;
    padding: 6px !important;
  }
</style>
   <script type="text/javascript">
   var RecaptchaOptions = {
      theme : 'clean'
   };
   </script>
  <script type="text/javascript"
     src="http://www.google.com/recaptcha/api/challenge?k=6LeiRvwSAAAAAGfY9vwa_bzBaMhh1yzYIsWEjLAe">
  </script>
  <noscript>
     <iframe src="http://www.google.com/recaptcha/api/noscript?k=6LeiRvwSAAAAAGfY9vwa_bzBaMhh1yzYIsWEjLAe"
         height="300" width="500" frameborder="0"></iframe><br>
     <textarea name="recaptcha_challenge_field" rows="3" cols="40">
     </textarea>
     <input type="hidden" name="recaptcha_response_field"
         value="manual_challenge">
  </noscript>
</div><div class="col-sm-2"></div>



<div class="col-sm-10" align="center"><hr>
  <button class="btn btn-success square" type="submit" style="margin-top:10px;z-index:9999;background:#7FA92D;
                                                              border:none;font-size:20px;width:78%;"><i class="glyphicon glyphicon-chevron-right"></i> ดำเนินการสั่งซื้อ</button>
</div>
</form>
<div class="col-sm-12" style="height:200px;"></div>
</div>
<!-- /content -->


<?php
include("webFoot.php");
?>