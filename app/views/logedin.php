<?php
$path   = Request::root()."/";
include("funcHead.php");
$profile   = Session::get("profile");
?>

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
      <div class="col-sm-12 login-head" style="text-align:center;">
      
        ยินดีต้อนรับสมาชิก
          <h2><?php echo $profile['fullname'];?></h2>
        
      </div>
      
    </div>
    

  </div>
</div>

<!-- /content -->


<?php
// include("webFoot.php");
?>