<?php
include("webHead.php");
?> 
<script>
window.location.href="#list";
</script>
<style type="text/css">
	.about-to-pay{
		background: none;
	}
</style>

<div class="head-marquee shadow-line" style="background:rgba(255,0,20,0.8);margin-top:15px; color:#fff;">

<span id="list"></span>
  <b><h5>บทความและข่าวสารยานยนต์</h5></b>
</div>
<hr>
<?php
foreach ($list as $key => $value) {
	$content 	=	iconv_substr(strip_tags($value['TopicDetail']),0,200,"UTF-8");
	$content 	=	preg_replace("/\[vdo\]/", '', $content);
	$content 	=	preg_replace("/\[\/vdo\]/", '', $content);
	?>	
	<div class="col-sm-6" style="margin-top:20px;height:400px;">
	<div class="col-sm-6" style="margin-top:20px;height:400px;">
	<a href="blog/<?php echo $value['TopicID']?>">
	<div class="ProductPic" style="background:url(img/picTopic/<?php echo @$value['TopicPic'];?>);
                  background-position:center;
                  background-size:cover;
                  background-repeat:no-repeat;"></div>
    <div style="padding:13px 0 0 7px;color:rgba(240,0,0,0.6);font-size:18px;"><b><?php echo $value['TopicName'];?></b></div></a>
	<div style="padding:7px 0 0 7px;color:#888;font-size:14px;">        <?php echo $content;?> <a href="blog/<?php echo $value['TopicID']?>"><b>...อ่านต่อ</b></a></div>
	<div style="padding:7px 0 0 7px;color:#888;font-size:14px;color:rgba(240,0,0,0.6);" align="right"></div>
          
	</div>
	
	<?php
}
?>
</div>
<div class="col-sm-12" style="height:200px;"></div>
<?php
include("webFoot.php");
?>