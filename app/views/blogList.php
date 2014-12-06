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
	<!-- Array ( [0] => Array ( [TopicID] => 1 [TopicName] => ทดสอบบทความ [TopicDetail] => การทำงานที่ดี [vdo]http://mx1shop.com/public/backoffice/Topic/create[/vdo] ต้องรู้จักเคารพคนอื่น[vdo]https://www.youtube.com/watch?v=SWuRTOyzoRw[/vdo] [TopicNew] => 1 [TopicStatus] => 1 ) ) -->
	<!-- Array ( [TopicID] => 1 [TopicName] => บช.น. สั่งย้าย ผกก.สน.พญาไท เหตุมีรถตัดหน้าขบวนเสด็จฯ2 
					[TopicDetail] =>
		เมื่อวันที่ 28 ตุลาคม 2557 พล.ต.ต. พงษ์พันธุ์ วรรณภักตร์ รักษาราชการแทนผู้บังคับการตำรวจนครบาล 1 ได้ลงนามย้าย พ.ต.อ. สมาน รอดกำเนิด ผู้กำกับการสถานีตำรวจนครบาลพญาไท ไปปฏิบัติราชการที่กองบังคับการตำรวจนครบาล 1 พร้อมกับให้ พ.ต.อ. ปิยะวัฒน์ บุญยืนอนนต์ รองผู้บังคับการตำรวจนครบาล 1 ไปรักษาราชการแทน ตั้งแต่วันที่ 28 ตุลาคม - 26 พฤศจิกายน 2557 รวมระยะเวลา 30 วัน เนื่องจาก มีจุดประสงค์เพื่อให้การปฏิบัติราชการ เป็นไปด้วยความเรียบร้อย หลังจากมีรถจักรยานยนต์ขับเข้ามาประชิดท้ายขบวนรถยนต์พระที่นั่งของสมเด็จพระเทพรัตนราชสุดา สยามบรมราชกุมารี เมื่อวันที่ 23 ตุลาคมที่ผ่านมา และมีรถยนต์ขับตัดหน้าขบวนรถยนต์พระที่นั่งฯ เมื่อวันที่ 26 ตุลาคมที่ผ่านมา[vdo]http://localhost/mx1shop/public/backoffice/Topic/1[/vdo]
					[TopicNew] => 1 
					[TopicStatus] => 1 
					[TopicPic] => 20141205041116.png ) -->
	
	<div class="col-sm-6">
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
<div class="col-sm-12" style="height:500px;"></div>
<?php
include("webFoot.php");
?>