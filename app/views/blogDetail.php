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
	img{
		border-radius: 10px;
	}
</style>
<br/>
<div class="col-sm-12">

<h4 style="color:#777;">บทความ</h4>
<hr>
<h2 style="color:#B00;"><?php echo $detail['TopicName']?></h2>
</div>
<div align="center" class="col-sm-12" style="padding-top:40px;">
<img src="../img/picTopic/<?php echo $detail['TopicPic'];?>" width="80%">
</div>
<div class="col-sm-12" style="padding-top:40px;font-size:15px;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; color:#444;"><?php //echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".preg_replace("/<p>/", "", $detail['TopicDetail']) ;?>
<?php print_r(vidyoutube($detail['TopicDetail'],'vdo'));?>
</div>

<!-- Array ( [TopicID] => 1 [TopicName] => บช.น. สั่งย้าย ผกก.สน.พญาไท เหตุมีรถตัดหน้าขบวนเสด็จฯ2 [TopicDetail] =>
เมื่อวันที่ 28 ตุลาคม 2557 พล.ต.ต. พงษ์พันธุ์ วรรณภักตร์ รักษาราชการแทนผู้บังคับการตำรวจนครบาล 1 ได้ลงนามย้าย พ.ต.อ. สมาน รอดกำเนิด ผู้กำกับการสถานีตำรวจนครบาลพญาไท ไปปฏิบัติราชการที่กองบังคับการตำรวจนครบาล 1 พร้อมกับให้ พ.ต.อ. ปิยะวัฒน์ บุญยืนอนนต์ รองผู้บังคับการตำรวจนครบาล 1 ไปรักษาราชการแทน ตั้งแต่วันที่ 28 ตุลาคม - 26 พฤศจิกายน 2557 รวมระยะเวลา 30 วัน เนื่องจาก มีจุดประสงค์เพื่อให้การปฏิบัติราชการ เป็นไปด้วยความเรียบร้อย หลังจากมีรถจักรยานยนต์ขับเข้ามาประชิดท้ายขบวนรถยนต์พระที่นั่งของสมเด็จพระเทพรัตนราชสุดา สยามบรมราชกุมารี เมื่อวันที่ 23 ตุลาคมที่ผ่านมา และมีรถยนต์ขับตัดหน้าขบวนรถยนต์พระที่นั่งฯ เมื่อวันที่ 26 ตุลาคมที่ผ่านมา[vdo]http://localhost/mx1shop/public/backoffice/Topic/1[/vdo]

[TopicNew] => 1 [TopicStatus] => 1 [TopicPic] => 20141205041116.png ) -->
<div class="col-sm-12" style="height:200px;"></div>
<?php
include("webFoot.php");
?>