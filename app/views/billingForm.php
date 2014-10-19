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
  <h3 style="color:#777;">ชื่อ ที่อยู่ สำหรับจัดส่งของ</h3>
</div>



<!-- row -->
<div class="col-sm-5">
  <h3> </h3>
  <h4 class="h3-label">ชื่อ <span class="text-color-red">*</span></h4>
  <input type="text" class="form-control square" name="fname" required />
</div>
<div class="col-sm-5">
  <h3> </h3>
  <h4 class="h3-label">สกุล <span class="text-color-red">*</span></h4>
  <input type="text" class="form-control square" name="lname" required />
</div>
<div class="col-sm-2"></div>
<!-- !row -->
<!-- row -->
<div class="col-sm-10">
<h3> </h3>
  <h4 class="h3-label">ที่อยู่ <span class="text-color-red">*</span></h4>
  <input type="text" class="form-control square" name="address" placeholder="บ้านเลขที่ หมู่บ้าน ถนน เขต แขวง" required />
</div>
<div class="col-sm-2"></div>
<!-- !row -->
<!-- row -->
<div class="col-sm-5">
<h3> </h3>
  <h4 class="h3-label">รหัสไปรษณีย์ <span class="text-color-red">*</span></h4>
  <input type="tel" class="form-control square" name="postcode" placeholder="รหัสไปรษณี" required />
</div>
<div class="col-sm-5">
<h3> </h3>
  <h4 class="h3-label">เบอร์โทรศัพท์ <span class="text-color-red">*</span></h4>
  <input type="tel" class="form-control square" name="telnumber" placeholder="เบอร์โทรศัพท์" required />
</div>
<div class="col-sm-2"></div>
<!-- !row -->
<!-- row -->
<div class="col-sm-10">
<h3> </h3>
  <h4 class="h3-label">E-mail <span class="text-color-red">*</span></h4>
  <input type="email" class="form-control square" name="email" placeholder="example@email.com" required />
</div>
<div class="col-sm-2"></div>
<!-- !row -->




<div class="col-sm-10" align="right"><hr>
  <button class="btn btn-success" type="submit" style="margin-top:10px;z-index:9999;background:#7FA92D;border:none;font-size:20px;"><i class="glyphicon glyphicon-chevron-right"></i> ดำเนินการสั่งซื้อ</button>
</div>
</form>
<div class="col-sm-12" style="height:200px;"></div>
</div>
<!-- /content -->


<?php
include("webFoot.php");
?>