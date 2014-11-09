<?php
$path   = Request::root()."/";
include("webHead.php");
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

  <div class="col-sm-12 login">
    <div class="col-xs-1 login"></div>
    
    <div class="col-xs-10" style="background:#FFF;padding:0px;">
      <div class="col-sm-12 login-head" style="text-align:center;">
      
        แจ้งการชำระเงินเรียบร้อยแล้วกรุณารอการติดต่อจากแอดมินนะครับ
        
      </div>
      <div class="col-sm-12" style="height:30px;"> </div>
      <center><a href="<?php echo Request::root()."/main";?>"><h4>กลับสู่หน้าหลัก</h4></a></center>

    </div>
    

  </div>
</div>

<!-- /content -->


<?php
include("webFoot.php");
?>