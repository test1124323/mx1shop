<?php
$path   = Request::root()."/";
include("funcHead.php");
echo $stat;
?>
<script>
window.location.href="#list";
</script>
<style type="text/css">
  body{
    background:#F1F1F1 !important;
  }

</style>
<!-- content  -->
<div class="col-sm-12 " style="padding-bottom:100px;">
  <div class="col-sm-4 "></div>

  <div class="col-sm-4 login">
    <div class="col-xs-1 login"></div>
    
    <div class="col-xs-10" style="background:#FFF;padding:0px;">
      <div class="col-sm-12 login-head">
        MX1Shop
      </div>
      <form method="post" actio"<?php echo Request::root()?>/login">
      <div class="col-sm-12 form-row" style="padding:40px;">
        <input type="text" class="form-control square" placeholder="Username" name="loguser" />
        <div class="col-sm-12" style="padding:15px"></div>
        <input type="password" class="form-control square" placeholder="Password" name="logpass" />
        <div class="col-sm-12" style="padding:15px"></div>
        <button class="btn btn-danger col-sm-12" style="padding:10px;font-size:18px;" type="submit"><b>เข้าสู่ระบบ</b></button>
        <div class="col-sm-12" style="padding:5px"></div>
        <button class="btn btn-default col-sm-12" type="button">ลงทะเบียน</button>
      </div>
      </form>
    </div>
    

  </div>
</div>

<!-- /content -->


<?php
// include("webFoot.php");
?>