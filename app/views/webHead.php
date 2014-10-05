<!doctype html>
<?php 
$data['path'] = empty(Request::segment(2))?'':'../';
$path = $data['path'];
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
	<title>::MX1 Shop::</title>
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
      <li class="dropdown dropdown-large">
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
        </ul>
        
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