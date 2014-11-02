<?php
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=download.pdf");
$path 	=	Request::root()."/";
?>

<meta charset="UTF-8">
<div class="col-sm-9" style="padding:0px;">
<!-- !left side --><div class="col-sm-12" style="background:#FFF;">


<div class="col-sm-12">&nbsp;</div>
<div class="col-sm-12">
<center>

<hr>
</center></div>

<div class="col-sm-5">
<h4>รหัสการสั่งซื้อ 201411000014</h4>
</div>
<div class="col-sm-6">
<h4>ผู้สั่งสินค้า aaaaaa a</h4>
</div>
<div class="col-sm-12">
<h5><b>ที่อยู่ในการจัดส่งสินค้า</b> : 1 11111</h5>
</div>
<div class="col-sm-5">
<p><b>โทร.</b> 1111111111</p>
<p><b>Email</b> : aaaa@aaaa.com</p>
<hr>
</div>
<div class="col-sm-12">
	<table class="table"> 
	  <tbody><tr class="tr-head">
	    <td class="table-head" width="120px;"></td>
	    <td class="table-head">สินค้า</td>
	    <td class="table-head" width="100px;" align="right">ราคา</td>
	    <td class="table-head" width="100px;" align="center">จำนวน</td>
	    <td class="table-head" width="100px;" align="right">รวม</td>
	  </tr>
	  	  <tr style="color:#666; font-weight:bold;">
	    <td class="table-head"><h5>1</h5></td>
	    <td class="table-head"><h5 style="text-align:left;">กระจกมองหลัง</h5></td>
	    <td class="table-head"><h5 style="text-align:right;">4,500 ฿</h5></td>
	    <td class="table-head"><h5 style="text-align:center;">1</h5></td>
	    <td class="table-head"><h5 style="text-align:right;">4,500 ฿</h5></td>
	  </tr>
	  	  <tr style="color:#666; font-weight:bold;">
	    <td class="table-head"><h5>2</h5></td>
	    <td class="table-head"><h5 style="text-align:left;">ค่าจัดส่ง</h5></td>
	    <td class="table-head"><h5 style="text-align:right;"></h5></td>
	    <td class="table-head"><h5></h5></td>
	    <td class="table-head"><h5 style="text-align:right;">100 ฿</h5></td>
	  </tr>
	  	  <tr style="color:#666; font-weight:bold;">
	    <td class="table-head"><h5></h5></td>
	    <td class="table-head"><h3 style="text-align:left;">รวม</h3></td>
	    <td class="table-head"><h5 style="text-align:right;"></h5></td>
	    <td class="table-head"><h5></h5></td>
	    <td class="table-head"><h3 style="text-align:right;">4,600 ฿</h3></td>
	  </tr>
	  </tbody></table>

</div>
<style type="text/css">
	.about-to-pay{
		background: none;
	}
</style>
<div class="col-sm-11 about-to-pay">
<div class="col-sm-12"><h4 style="color:rgba(255,0,0,0.7);">**อย่าชำระเงินก่อนได้รับการติดต่อกลับจากทางร้านนะครับ**</h4></div>
  <div class="col-sm-12"><h4 style="color:#FF8800;">ช่องทางการชำระเงิน</h4></div>
  <div class="col-sm-12"><h4>ชื่อบัญชี นายธีรศักดิ์  ลีลาอดิศัย</h4></div>
  <div class="col-sm-12">
    <div class="col-sm-6">ธนาคารกสิกรไทย สาขาสระบุรี 139-2-80992-5</div>
  </div>
  <div class="col-sm-12">
    <div class="col-sm-6">ธนาคารไทยพาณิชย์ โรบินสันสระบุรี 404-7-46941-3</div>
  </div>
  <div class="col-sm-12">
    <div class="col-sm-6">ธนาคารกรุงศรีอยุธยา โรบินสันสระบุรี 719-1-02381-9</div>
  </div>
  <div class="col-sm-12">
    <div class="col-sm-6">ธนาคารกรุงเทพ โรบินสันสระบุรี 585-7-02048-0</div>
  </div>
  <div class="col-sm-12">
    <div class="col-sm-6">ธนาคารกรุงไทย โรบินสันสระบุรี 982-6-14535-1</div>
  </div>
  <div class="col-sm-12">
    <div class="col-sm-6">ธนาคารทหารไทย โรบินสันสระบุรี 639-2-02909-3</div>
  </div>
  
  <div class="col-sm-12"><hr></div>  
  <div class="col-sm-12">หมายเหตุ : กรุณาโอนเงินเป็นเศษสตางค์เพื่อง่ายต่อการตรวจสอบ เช่น ยอดชำระ 350.00 บาท โอนเป็น 350.01 บาท เป็นต้น</div>
  <div class="col-sm-12">หลังการชำระเงินเรียบร้อยแล้วให้ส่งหลักฐานการโอนเงินมาที่ <br><b style="font-size:16px;"> Line: mx1shop</b><br>  <b style="font-size:16px;">หรือโทร 061-410-3299</b></div>
  

</div><div class="col-sm-12" style="height:200px;"></div>
</div>
<!-- /content -->

</div>
<?php
if(Input::get('mode')=='print'){
?>
	<script>window.print();</script>
<?php
}else{

	$html = ob_get_contents();        //เก็บค่า html ไว้ใน $html 
	ob_end_clean();
	$pdf = new mPDF('th', 'A4-L', '0', '');   //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
	$pdf->SetAutoFont();
	$pdf->SetDisplayMode('fullpage');
	$pdf->WriteHTML($html, 2);
	$pdf->Output(public_path()."/MyPDF/MyPDF.pdf");         // เก็บไฟล์ html ที่แปลงแล้วไว้ใน MyPDF/MyPDF.pdf ถ้าต้องการให้แสด

}
?>