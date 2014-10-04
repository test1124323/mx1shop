<?php
include("webHead.php");
?>

<!-- content  -->

<div class="col-sm-12 onsale scroll-wrapper">
  <div class="col-sm-6 saleItem bg-color-pinkred text-color-white">
  	<h2>ลดราคารับสิ้นปี 60%</h2>
  	<p class="deal-text">กระหน่ำลดราคาสินค้ามากกว่า 100 รายการ เพียงกด Like และ Share Fan page พร้อมบอกว่าอยากให้ลดราคาสินค้าชิ้นใด สิ้นสุดระยะเวลากิจกรรมและประกาศผลในวันที่ 1 มกราคม 2558 นี้เท่านั้น</p>
  </div>
  <div align="center" class="col-sm-3 saleItem text-color-white bgdeal" style="background:url(img/accesorie60a.jpg);
  background-position: center;
  background-size: cover; 
  background-repeat:no-repeat;
" >
  	<h4 style="background:rgba(0,0,0,0.5); padding:5px;">10 อันดับสินค้าขายดี</h4>
  </div>
  <div class="col-sm-3 saleItem bg-color-silver">
  <h2 class=" text-color-grey howtobuy" style="padding:5px;">วิธีสั่งซื้อ และชำระเงิน</h2>
  <button class="btn btn-info btn-howtopay" style="width:100%;">คลิกที่นี่</button>
  </div>
</div>


<div class="col-xs-12" style=" background:#F6F6F6;padding:0px;">
<!-- left side -->
<div class="col-sm-3" style="padding:10px 10px 0 10px;">
<!-- <h4>Search</h4> -->
<div class="input-group col-sm-12" style="background:#E9E9E9;padding:4px 14px 14px 14px;border-radius:4px;width:100%;">
<form name="search" method="post" action="">
      <div class="search-text">Search</div>
      <input type="text" class="form-control" placeholder='ค้นหาสินค้า'><br/><br/>
      <select class="form-control" style="border-radius:30px;">
        <option class="option-pad">--ทุกหมวดหมู่--</option>
      </select>
      <br/><br/>
      <button class="btn btn-default col-sm-6" type="submit" style="float:right">ค้นหา</button>
</form>
</div><!-- /input-group -->

<div class="side-cate">
  <h3>สินค้าใหม่</h3>
  <ul class="list-group">
    <li class="list-group-item catelist"><a href="#"> Cras justo odio</a></li>
    <li class="list-group-item catelist"><a href="#">  Dapibus ac facilisis in</a></li>
    <li class="list-group-item catelist"><a href="#">  Morbi leo risus</a></li>
    <li class="list-group-item catelist"><a href="#">  Porta ac consectetur ac</a></li>
    <li class="list-group-item catelist"><a href="#">  Vestibulum at eros</a></li>
  </ul>

  <h3>หมวดหมู่</h3>
  <ul class="list-group">
    <li class="list-group-item catelist"><a href="#"> Cras justo odio</a></li>
    <li class="list-group-item catelist"><a href="#">  Dapibus ac facilisis in</a></li>
    <li class="list-group-item catelist"><a href="#">  Morbi leo risus</a></li>
    <li class="list-group-item catelist"><a href="#">  Porta ac consectetur ac</a></li>
    <li class="list-group-item catelist"><a href="#">  Vestibulum at eros</a></li>
    <li class="list-group-item catelist"><a href="#"> Cras justo odio</a></li>
    <li class="list-group-item catelist"><a href="#">  Dapibus ac facilisis in</a></li>
    <li class="list-group-item catelist"><a href="#">  Morbi leo risus</a></li>
    <li class="list-group-item catelist"><a href="#">  Porta ac consectetur ac</a></li>
    <li class="list-group-item catelist"><a href="#">  Vestibulum at eros</a></li>
  </ul>
</div>

</div>


<!-- !left side -->


<!-- right side -->

<div class="col-sm-9" style="padding:0px;">
<div class="head-marquee">
  <marquee><b><h5>MX1 Shop ศูนย์รวมสินค้าคุณภาพสำหรับคุณ</h5></b></marquee>
</div>
<?php for ($i=0; $i < 2; $i++) { 
 ?>
<div class="col-sm-6 product-head">
          <div class="ProductPic" 
          style="background:url(img/testProductList.png);
                  background-position:center;
                  background-size:cover;
                  background-repeat:no-repeat;">
          </div>

          <div style="padding:10px 0 0 7px;color:#888;font-size:14px;">รหัสสินค้า : 027162</div>
          <div style="padding:7px 0 0 7px;color:#888;font-size:14px;">ชื่อสินค้า : ไฟหน้าซีนอล XA002</div>
          <div style="padding:7px 0 0 7px;color:#888;font-size:14px;">ราคา : <b>3,700฿</b></div>
</div>
 <?php
}?>

<?php for ($i=0; $i < 9; $i++) { 
 ?>
 <div class="col-sm-4 product-list">
          <div class="ProductPic" 
          style="background:url(img/testProductList.png);
                  background-position:center;
                  background-size:cover;
                  background-repeat:no-repeat;">
          </div>  
          <div style="padding:10px 0 0 7px;color:#888;font-size:14px;">รหัสสินค้า : 027162</div>
          <div style="padding:7px 0 0 7px;color:#888;font-size:14px;">ชื่อสินค้า : ไฟหน้าซีนอล XA002</div>
          <div style="padding:7px 0 0 7px;color:#888;font-size:14px;">ราคา : <b>3,700฿</b></div>
  </div>
 <?php
}?>
 


</div>
<!-- !right side -->
</div>

<!-- /content -->


<?php
include("webFoot.php");
?>