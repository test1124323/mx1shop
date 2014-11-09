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
  .input{
    border: thin solid #FBFBFB !important;
  }
</style>

<div class="col-sm-12" style="padding-top:10px;">
<form method="post" name="pay" action="payment">
<div class="col-sm-12">
<?php if(Input::has('updated')&&Input::get('updated')=='1'){?>
<div class="alert alert-danger" role="alert"><i class="glyphicon glyphicon-remove-sign" style="font-size:20px;"></i>  กรุณากรอกข้อมูลให้ถูกต้อง</div>
<?php }?>
  <h3 style="color:#777;">แจ้งการชำระเงิน</h3>
  <small style="color:#AAA;">แจ้งการชำระเงินของคุณที่นี่</small>
</div>


<?php
  $input  =  Session::get('input');
?>
<!-- row -->
<div class="col-sm-12" style="padding:0;">
  <div class="col-sm-5">
    <h3> </h3>
    <!-- <h4 class="h3-label">ชื่อ <span class="text-color-red">*</span></h4> -->
    <input type="text" class="form-control square" placeholder="รหัสการสั่งซื้อ" name="orderID" required />
  </div>
</div>

<div class="col-sm-8">
  <h3> </h3>
  <!-- <h4 class="h3-label">ชื่อ <span class="text-color-red">*</span></h4> -->
  <input type="text" class="form-control square" placeholder="ชื่อ - สกุล" name="fullname" value="<?php echo @$input['fname']?> <?php echo @$input['lname']?>" required />
</div>

<!-- !row -->

<!-- row -->

<div class="col-sm-5">
<h3> </h3>
  <!-- <h4 class="h3-label">เบอร์โทรศัพท์ <span class="text-color-red">*</span></h4> -->
  <input type="tel" class="form-control square" name="telnumber" placeholder="เบอร์โทรศัพท์" value="<?php echo @$input['telnumber']?>" required />
</div>
<!-- !row -->
<!-- row -->
<div class="col-sm-5">
<h3> </h3>
  <!-- <h4 class="h3-label">E-mail <span class="text-color-red">*</span></h4> -->
  <input type="email" class="form-control square" name="email" placeholder="example@email.com" value="<?php echo @$input['email']?>" required />
</div>
<div class="col-sm-2"></div>
<!-- !row -->
<!-- row -->
<div class="col-sm-5">
<h3> </h3>
  <!-- <h4 class="h3-label">E-mail <span class="text-color-red">*</span></h4> -->
  <input type="text" class="form-control square" name="payAmount" placeholder="จำนวนเงินที่โอน" required />
</div>
<!-- !row -->
<!-- row -->
<div class="col-sm-5">
<h3> </h3>
  <!-- <h4 class="h3-label">E-mail <span class="text-color-red">*</span></h4> -->
  <input type="text" class="form-control square" name="payBank" placeholder="ธนาคารที่โอน" required />
</div>
<div class="col-sm-2"></div>
<!-- !row -->

<!-- row -->
<div class="col-sm-5">
<h3> </h3>
  <!-- <h4 class="h3-label">E-mail <span class="text-color-red">*</span></h4> -->
  <input type="text" class="form-control square" name="payTime" placeholder="เวลาที่โอน" required />
</div>
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
  <button class="btn btn-success square" type="submit" style="margin-top:10px;z-index:9999;background:rgba(255,0,0,0.7);
                                                              border:none;font-size:20px;width:78%;"><i class="glyphicon glyphicon-chevron-right"></i> แจ้งการชำระเงิน</button>
</div>
</form>
<?php include('aboutpay.php');?>
<div class="col-sm-12" style="height:200px;"></div>
</div>
<!-- /content -->


<?php
include("webFoot.php");
?>