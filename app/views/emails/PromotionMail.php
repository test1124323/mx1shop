<?php
$path 	=	Request::root()."/";
$destinationPath1 = public_path().'/img/picEmail/';
?>
<meta charset="UTF-8">
<style type="text/css">
	table{
		border-collapse: collapse;
	}
	td{
		border-left:solid thin #999999;
		border-right:solid thin #999999;
		padding: 5px;
	}
</style>
<div class="col-sm-12" style="background:#FFF;" id="printarea">
<div class="col-sm-12"> </div>
<div class="col-sm-12">
<h3><b>แจ้งข่าวสารและโปรโมชัน www.mx1shop.com </b></h3>
<div class="col-sm-12" align="center">
<img src="http://www.mx1shop.com/public/img/cover.png"  height="300" width="900">
</div>
<hr>
</div>
<div class="col-sm-5">
<h4><b><?php echo $detail['Subject'];?></b></h4>
</div>
<?php 

if($detail['Picture']!=""){
	?>
	<div class="col-sm-6">
		<img src="http://www.mx1shop.com/public/img/product/<?php echo $detail['Picture'];?>" >
	</div>
	<?php
	}
	?>
<div class="col-sm-6">
<?php echo $detail['Detail'];?>
</div>

<style type="text/css">
	.about-to-pay{
		background: none;
	}
</style>

<div class="col-sm-12" style="height:200px;"></div>