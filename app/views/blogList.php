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
<br/>
<div class="col-sm-12">
<?php 
foreach ($list as $key => $value) {
	?>
	<a href="#list"><h2>บทความ</h2></a>
	<hr>
	<!-- Array ( [0] => Array ( [TopicID] => 1 [TopicName] => ทดสอบบทความ [TopicDetail] => การทำงานที่ดี [vdo]http://mx1shop.com/public/backoffice/Topic/create[/vdo] ต้องรู้จักเคารพคนอื่น[vdo]https://www.youtube.com/watch?v=SWuRTOyzoRw[/vdo] [TopicNew] => 1 [TopicStatus] => 1 ) ) -->
	<div class="blog-list"><a href="blog/<?php echo $value['TopicID']?>"><?php echo $value['TopicName'];?></a></div>
	<?php
}
?>
</div>
<div class="col-sm-12" style="height:200px;"></div>
<?php
include("webFoot.php");
?>