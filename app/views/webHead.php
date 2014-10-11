<!doctype html>
<?php 
$data['path'] = (Request::segment(2)=='')?'':'../';
$path = $data['path'];


    $cate1      = CategoryModel::level1Cate()->get()->toArray();
    $cate2      = CategoryModel::level2Cate()->get()->toArray();
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="author" content="mx1shop">
  <meta name="type" content="website">
	<title>MX1 Shop::</title>
  <meta name="description" content="ศูนย์รวมประดับยนต์ เครื่องเสียง กล้องบันทึกภาพ กล้องถอย ไฟซีนอน ไฟเดย์ไลท์ ไฟแฟลช ไฟหรี่ เซนเซอร์กันขโมย ปลายท่อ กันสาด กันแมลง โครเมี่ยมตกแต่งรถยนต์ หน้ากากวิทยุ สอบถามข้อมูลเพิ่มเติมได้นะครับ
แม็กซ์
โทร : 081-7009767, 083-0208068
ไลน์ : oxymaxy
อีเมลล์ : lee.pradubyon@gmail.com">

  <!-- <link rel="shortcut icon" href="<?php echo $path;?>img/mx1-logo-tile.png"> -->

  <script src="<?php echo $path;?>js/jquery-1.10.2.js"></script>
  <script src="<?php echo $path;?>js/bootstrap.min.js"></script>
  <link rel='stylesheet' href='<?php echo $path;?>css/bootstrap.css'>
  <link rel='stylesheet' href='<?php echo $path;?>css/headstyle.css'>
  <link rel='stylesheet' href='<?php echo $path;?>css/menu.css'>
  <link rel='stylesheet' href='<?php echo $path;?>css/mainslider.css'>
  <link rel='stylesheet' href='<?php echo $path;?>css/style_base.css'>
  <link rel='stylesheet' href='<?php echo $path;?>css/color.css'>

	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);
	</style>


</head>
<body>

<div class="container back-container">

<!-- menu -->
<nav class="navbar navbar-default navbar-static" style="margin-bottom:0px;z-index:10000;">

    <div id="account_head" align="right">
    ล็อกอิน  |  
    ติดต่อเรา
    </div>

    <div class="navbar-header">
    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <div class="logo1" style="background: url('<?php echo $path;?>img/mx1-logo-tile.png');background-size: contain;background-repeat: no-repeat;">
      
    </div>

    <a class="navbar-brand" href="#"><div style="width:200px;"></div></a>
  </div>
  
  
  <div class="collapse navbar-collapse js-navbar-collapse">
    <ul class="nav navbar-nav">
    <li class="dropdown dropdown-large">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">หน้าแรก</a>
      </li>
      <!-- <li class="dropdown dropdown-large">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">หมวดหมู่สินค้า <b class="caret"></b></a>
        
        <ul class="dropdown-menu dropdown-menu-large row">
          <li class="col-sm-3">
            <ul>
              <li class="dropdown-header">Glyphicons</li>
              <li><a href="#">Available glyphs</a></li>
              <li class="disabled"><a href="#">How to use</a></li>
              <li><a href="#">Examples</a></li>
              <li class="divider"></li>
              <li class="dropdown-header">Dropdowns</li>
              <li><a href="#">Example</a></li>
              <li><a href="#">Aligninment options</a></li>
              <li><a href="#">Headers</a></li>
              <li><a href="#">Disabled menu items</a></li>
            </ul>
          </li>
          <li class="col-sm-3">
            <ul>
              <li class="dropdown-header">Button groups</li>
              <li><a href="#">Basic example</a></li>
              <li><a href="#">Button toolbar</a></li>
              <li><a href="#">Sizing</a></li>
              <li><a href="#">Nesting</a></li>
              <li><a href="#">Vertical variation</a></li>
              <li class="divider"></li>
              <li class="dropdown-header">Button dropdowns</li>
              <li><a href="#">Single button dropdowns</a></li>
            </ul>
          </li>
          <li class="col-sm-3">
            <ul>
              <li class="dropdown-header">Input groups</li>
              <li><a href="#">Basic example</a></li>
              <li><a href="#">Sizing</a></li>
              <li><a href="#">Checkboxes and radio addons</a></li>
              <li class="divider"></li>
              <li class="dropdown-header">Navs</li>
              <li><a href="#">Tabs</a></li>
              <li><a href="#">Pills</a></li>
              <li><a href="#">Justified</a></li>
            </ul>
          </li>
          <li class="col-sm-3">
            <ul>
              <li class="dropdown-header">Navbar</li>
              <li><a href="#">Default navbar</a></li>
              <li><a href="#">Buttons</a></li>
              <li><a href="#">Text</a></li>
              <li><a href="#">Non-nav links</a></li>
              <li><a href="#">Component alignment</a></li>
              <li><a href="#">Fixed to top</a></li>
              <li><a href="#">Fixed to bottom</a></li>
              <li><a href="#">Static top</a></li>
              <li><a href="#">Inverted navbar</a></li>
            </ul>
          </li>
        </ul> -->
        
      </li>
      <li class="dropdown dropdown-large">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">บทความ</a>
      </li>

      <li class="dropdown dropdown-large">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">แจ้งชำระเงิน</a>
      </li>

      <li class="dropdown dropdown-large">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">เกี่ยวกับเรา</a>
      </li>
    </ul>
    
  </div><!-- /.nav-collapse -->
</nav>

<!-- menu -->
<!-- slider -->

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner" style="background:#555;">
        
        <div class="item active" align="center">
          <img src="<?php echo $path;?>img/cover.png">
           <div class="carousel-caption">
           <div class="col-lg-5" align="left">
            
            </div>
          </div>
        </div><!-- End Item -->

        <div class="item" align="center">
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
              </div>
       </div> 
      <!-- </ul> -->


    </div><!-- End Carousel -->

<!-- slider -->


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
<form name="search" method="get" action="">
      <div class="search-text">Search</div>
      <input name="keyword" type="text" class="form-control" placeholder='ค้นหาสินค้า' value="<?php echo Input::get('keyword');?>"><br/><br/>
      <select name="cate" class="form-control" style="border-radius:30px;">
        <option class="option-pad" value="">- - - ทุกหมวดหมู่ - - -</option>
        <?php 
          $cate = Input::get('cate');

        foreach ($cate1 as $k1 => $v1) {
          if($v1['CategoryID']==$cate){
                 $con1 = 'selected';
                }else{
                  $con1 = '';
                }
          ?>
          <option class="option-pad" value="<?php echo $v1['CategoryID'];?>" <?php echo $con1;?>><?php echo $v1['CategoryName'];?></option>
          <?php
          foreach ($cate2 as $k2 => $v2) {
            if($v2['CateParentID']==$v1['CategoryID']){
               if($v2['CategoryID']==$cate){
                 $con = 'selected';
                }else{
                  $con = '';
                }
              ?>
                <option class="option-pad" value="<?php echo $v2['CategoryID'];?>" style="padding:4px;" <?php echo $con;?>>   <?php echo $v2['CategoryName'];?></option>
              <?php
            }
          }
        }
      ?>
      </select>
      <br/><br/>
      <button class="btn btn-default col-sm-6" type="submit" style="float:right">ค้นหา</button>
</form>
</div><!-- /input-group -->

<div class="side-cate">
<!--   <h3>สินค้าใหม่</h3>
  <ul class="list-group">
    <li class="list-group-item catelist"><a href="#"> Cras justo odio</a></li>
    <li class="list-group-item catelist"><a href="#">  Dapibus ac facilisis in</a></li>
    <li class="list-group-item catelist"><a href="#">  Morbi leo risus</a></li>
    <li class="list-group-item catelist"><a href="#">  Porta ac consectetur ac</a></li>
    <li class="list-group-item catelist"><a href="#">  Vestibulum at eros</a></li>
  </ul> -->

  <h3>หมวดหมู่</h3>
    

  <ul class="list-group">
  
  <?php 
  
    foreach ($cate1 as $k1 => $v1) {
      ?>
      <li class="list-group-item catelist" style="font-size:17px;"><a href="?cate=<?php echo $v1['CategoryID'];?>"><?php echo $v1['CategoryName'];?></a></li>
      <?php
      foreach ($cate2 as $k2 => $v2) {
        if($v2['CateParentID']==$v1['CategoryID']){

          ?>
            <li class="list-group-item catelist"><a style="color:#F77" href="?cate=<?php echo $v2['CategoryID'];?>" > - <?php echo $v2['CategoryName'];?></a></li>
          <?php

          
        }
      }
    }
  ?>
  </ul>
</div>

</div>

<span id="list"></span>
<div class="col-sm-9" style="padding:0px;">
<!-- !left side -->