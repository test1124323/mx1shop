<!doctype html>
<?php 
$data['path'] = empty(Request::segment(2))?'':'../';
$path = $data['path'];
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>::MX1 Shop::</title>
  <script src="<?php echo $path;?>js/jquery-1.10.2.js"></script>
  <script src="<?php echo $path;?>js/bootstrap.min.js"></script>
  <link rel='stylesheet' href='<?php echo $path;?>css/bootstrap.css'>
  <link rel='stylesheet' href='<?php echo $path;?>css/bootstrap-theme.css'>
	<!--<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>-->
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);
	</style>
	<style type="text/css">
		.bg_tb{
			background-color: #99CCFF;
		}
	</style>
</head>
<body>
<?php
${'tab'.$act} = 'active';
$arr_menu = array('1' =>'ตั้งค่า',
'2'=>'รายการสั่งซื้อสินค้าทั้งหมด',
'3'=>'รายการรอชำระเงิน');
$arr_menuLink = array('1'=>'#','2'=>'','3'=>'');
$arr_sub1 = array('1'=>'หมวดสินค้า','2'=>'รายการสินค้า','3'=>'บทความ','4'=>'ข้อมูลลูกค้า','5'=>'ข้อมูลพนักงาน');
$arr_subLink1 = array('1'=>'../backoffice/Cate','2'=>'','3'=>'','4'=>'','5'=>'');
?>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">MX1 Shop</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <?php
      	foreach ($arr_menu as $key => $value) {
      		if($key=='1'){
      			?>
			      	<li class="dropdown <?php  echo (isset(${'tab'.$key}))?${'tab'.$key}:"";?>" >
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $value;?><span class="caret"></span></a>
			          <ul class="dropdown-menu" role="menu">
			          <?php foreach ($arr_sub1 as $key1 => $value1) {
			          	?>
			          	<li><a href="<?php echo $arr_subLink1[$key1]?>"><?php echo $value1;?></a></li>
			          	<?php
			          }?>
			          </ul>
			        </li>
      			<?php
      		}
      		else{
      			?>
      			<li class="<?php  echo (isset(${'tab'.$key}))?${'tab'.$key}:"";?>"><a href="<?php echo $arr_menuLink[$key];?>" ><?php echo $value;?></a></li>
      			<?php
      		}
      	}
      ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">คุณจักรยาน แกนล่อน</a></li>
    	<li> <button type="button" class="btn btn-danger">Logout</button></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="panel panel-default">
  <div class="panel-body">