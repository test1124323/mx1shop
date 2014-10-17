<?php
include("webHead.php");

?>
<script>
window.location.href="#list";
</script>
<!-- content  -->
<div class="headtag col-lg-4"><h4 class="textwhite headtext" style="color:#888;">รถเข็น</h4></div>
<div style="border:2px solid #F22; margin:40px 0px 0 8px; border-radius:0px; width:98%; border-top-left-radius:5px;border-top-right-radius:5px;"></div>
<div style="padding-left:20px;"><h2 class="title-text-x">รายการสินค้าในรถเข็น</h2></div>
<div style="padding-left:0px;"><br/>
<?php
echo "<pre>";
print_r(Session::all());
?>

<div class="col-sm-12" style="height:200px;"></div>
<!-- /content -->


<?php
include("webFoot.php");
?>