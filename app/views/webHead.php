<!doctype html>
<?php 
$data['path'] = (Request::segment(2)=='')?'':'../';
$path = $data['path'];


    $cate1      = CategoryModel::level1Cate()->get()->toArray();
    $cate2      = CategoryModel::level2Cate()->get()->toArray();

    foreach (Session::all() as $key => $value) {
      if(!is_array($value)){
        if(strpos($key,'P_')!==false){
          @++$incart;
        }
      }
    }


?>
<html lang="th">
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
  <link rel='stylesheet' href='<?php echo $path;?>css/scrollstyle.css'>
  <link rel='stylesheet' href='<?php echo $path;?>css/color.css'>
 
 <!--  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'> -->
  <style>
    @import url(//fonts.googleapis.com/css?family=Lato:700);
  </style>


</head>
<body>

<div class="container back-container">

<!-- menu -->
<nav class="navbar navbar-default navbar-static" style="margin-bottom:0px;z-index:10000;">

    <div id="account_head" align="right">
    <?php 
        if(Session::has('profile')){
          ?>
          <b><a href="<?php echo Request::root()?>/profile">โปรไฟล์</a></b> | <b><a href="<?php echo Request::root()?>/logout">ออกจากระบบ</a></b>
          <?php
        }else{
          ?>
          <b><a href="<?php echo Request::root()?>/login">เข้าสู่ระบบ</a> | <a href="<?php echo Request::root()?>/login">สมัครสมาชิก</a></b><!--  | <a href="<?php //echo Request::root()?>/register"><b>ลงทะเบียน</b></a> -->
          <?php
        }
    ?>
    
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
        <a href="<?php echo Request::root();?>/main">หน้าแรก</a>
      </li>
      </li>
      <li class="dropdown dropdown-large">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">บทความ</a>
      </li>

      <li class="dropdown dropdown-large">
        <a href="<?php echo Request::root();?>/payment">แจ้งชำระเงิน</a>
      </li>

      <li class="dropdown dropdown-large">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">เกี่ยวกับเรา</a>
      </li>

      <li class="dropdown dropdown-large">
        <a href="<?php echo Request::root();?>/cart">ตะกร้าสินค้า <?php if(isset($incart)){?><span class="label label-default"><?php echo $incart;?></span><?php }?></a>
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
            <!-- <button class="btn btn-danger"> สั่งซื้อทันที </button> -->
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
            <!-- <button class="btn btn-danger"> สั่งซื้อทันที </button> -->
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
  <div class="col-sm-6 saleItem bg-color-pinkred text-color-white ">
    <h2>ลดราคารับสิ้นปี 60%</h2>
    <p class="deal-text">กระหน่ำลดราคาสินค้ามากกว่า 100 รายการ เพียงกด Like และ Share Fan page พร้อมบอกว่าอยากให้ลดราคาสินค้าชิ้นใด สิ้นสุดระยะเวลากิจกรรมและประกาศผลในวันที่ 1 มกราคม 2558 นี้เท่านั้น</p>
  </div>
  <a href="#">
  <div align="center" class="col-sm-3 saleItem text-color-white bgdeal" style="background:url(<?php echo $path;?>img/accesorie60a.jpg);
  background-position: center;
  background-size: cover; 
  background-repeat:no-repeat;
" >
    <h4 style="background:rgba(0,0,0,0.5); padding:5px;">ติดตามการสั่งซื้อสินค้า</h4>
  </div>
  </a>

  <a href="<?php echo $path;?>How-to-order">
  <div class="col-sm-3 saleItem bg-color-silver">
  <h2 class=" text-color-grey howtobuy" style="padding:5px;">วิธีสั่งซื้อ และชำระเงิน</h2>
  <button class="btn btn-warning btn-howtopay" style="width:100%;">คลิกที่นี่</button>
  </div>
  </a>
</div>


<div class="col-xs-12" style=" background:#F8F8F8;padding:0px;">
<!-- left side -->
<div class="col-sm-3" style="padding:10px 10px 0 10px;">
<!-- <h4>Search</h4> -->
<div class="input-group col-sm-12" style="padding:4px 14px 14px 14px;border-radius:4px;width:100%;">
<form name="search" method="get" action="<?php echo url('main')?>">
      <div class="search-text"> </div>
      <input name="keyword" type="text" style="text-align:center;font-weight:bold;" class="form-control " placeholder='ค้นหาสินค้า' value="<?php echo Input::get('keyword');?>"><br/><br/>
      <select name="cate" class="form-control" style="border-radius:2px;border:none;border-bottom: solid 2px #DDDDDD !important;">
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
      <button class="btn btn-success col-sm-6" type="submit" style="float:right"><i class="glyphicon glyphicon-search"></i> ค้นหา</button>
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
      <li class="list-group-item catelist" style="font-size:14px;"><b><a href="<?php echo url('main')?>?cate=<?php echo $v1['CategoryID'];?>"><?php echo $v1['CategoryName'];?></a></b></li>
      <?php
      foreach ($cate2 as $k2 => $v2) {
        if($v2['CateParentID']==$v1['CategoryID']){

          ?>
            <li class="list-group-item catelist"><a style="color:#F77" href="<?php echo url('main')?>?cate=<?php echo $v2['CategoryID'];?>" > - <?php echo $v2['CategoryName'];?></a></li>
          <?php

          
        }
      }
    }
  ?>
  </ul>
</div>

</div>

<span id="list"></span>
<div class="col-sm-9" style="padding:0px;background:#FFF;">
<!-- !left side -->