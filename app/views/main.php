<?php
include("webHead.php");
?>
<!-- slider -->

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner" style="background:#555;">
      
        <div class="item active" align="center">
          <img src="<?php echo $path;?>img/Bugatti-Veyron.jpg">
           <div class="carousel-caption">
           <div class="col-lg-5 corue-text" align="left">
            <h2 class="corue-head">MX1 Shop</h2>
            
            <p class="tagDetail" >หากคุณกำลังมองหาร้านขายอุปกรณ์ประดับยนต์ที่มีคุณภาพ mx1 shop มีให้เลือกสรรค์มากมายกว่า 400 รายการ <br/><br/>
            <button class="btn btn-danger"> สั่งซื้อทันที </button>
            </p>
            </div>
          </div>
        </div><!-- End Item -->
 
         <div class="item" align="center">
          <img src="<?php echo $path;?>img/car-accessory-06.jpg">
           <div class="carousel-caption">
           <div class="col-lg-5 corue-text" style="float:right !important;" align="left">
            <h2 class="corue-head">ล้อแม็กซ์ราคาถูก</h2>
            
            <p class="tagDetail">หากคุณกำลังมองหาร้านขายอุปกรณ์ประดับยนต์ที่มีคุณภาพ mx1 shop มีให้เลือกสรรค์มากมายกว่า 400 รายการ <br/><br/>
            <button class="btn btn-danger"> สั่งซื้อทันที </button>
            </p>
            </div>
          </div>
        </div><!-- End Item -->
                
      </div><!-- End Carousel Inner -->


      <!-- <ul class="nav nav-tabs"> -->
       <div class="floattab">
          <div class="col-xs-2 carouInner" align="center"> 
              <div data-target="#myCarousel" data-slide-to="0" class="active buttick" ><a style="color:#FFF;text-decoration:none;">•</a></div>
              <div data-target="#myCarousel" data-slide-to="1" class="buttick" ><a style="color:#FFF;text-decoration:none;">•</a></div>
              <div data-target="#myCarousel" data-slide-to="2" class="buttick" ><a style="color:#FFF;text-decoration:none;">•</a></div>
              <div data-target="#myCarousel" data-slide-to="3" class="buttick" ><a style="color:#FFF;text-decoration:none;">•</a></div>
          </div>
       </div> 
      <!-- </ul> -->


    </div><!-- End Carousel -->

<!-- slider -->

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
  
  <?php 
    foreach ($cate1 as $k1 => $v1) {
      ?>
      <li class="list-group-item catelist" style="font-size:17px;"><a href="?cate=<?php echo $v1['CateParentID'];?>"><?php echo $v1['CategoryName'];?></a></li>
      <?php
      foreach ($cate2 as $k2 => $v2) {
        if($v2['CateParentID']==$v1['CategoryID']){
          ?>
            <li class="list-group-item catelist"><a style="color:#F77" href="?cate=<?php echo $v2['CateParentID'];?>"> - <?php echo $v2['CategoryName'];?></a></li>
          <?php
        }
      }
    }
  ?>
  </ul>
</div>

</div>


<!-- !left side -->


<!-- right side -->

<div class="col-sm-9" style="padding:0px;">
<div class="head-marquee">
  <marquee><b><h5>MX1 Shop ศูนย์รวมสินค้าคุณภาพสำหรับคุณ</h5></b></marquee>
</div>
<?php 
print_r($productlist);

for ($i=0; $i < 2; $i++) { 
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