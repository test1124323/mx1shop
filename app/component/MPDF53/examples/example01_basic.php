<?php
header ('Content-type: text/html; charset=utf-8');
$stlye="<style>
		.linepdf{ 	 
			border-bottom-style:dotted;
		}
	</style>";
$html1 = "<div id=\"mydiv\" ><p class=\"linepdf\" >HTML content goes here...</p></div>
			<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
			<tr>
				<td colspan=\"3\" align=\"right\" class=\"linepdf\" ><font size=\"17\">สวัสดี</font></td>
			</tr>
			<tr>
				<td width=\"20%\" class=\"linepdf\">&nbsp;</td>
				<td width=\"60%\" align=\"center\">ddddddd</td>
				<td align=\"center\" width=\"20%\"> กกกกสา <br>
				</td>
			</tr>
			</table>
			<div class=\"color\">This ''div'' is styled using the CSS border-bottom-style. Try changing the value to see the effect it has on the bottom border style.</div>";

//==============================================================
//==============================================================
//==============================================================

include("../mpdf.php");

$mpdf = new mPDF('UTF-8', 'A4');
$mpdf->SetDisplayMode('fullpage');
$mpdf->SetAutoFont();
// LOAD a stylesheet
$stylesheet = file_get_contents('mpdfstyleA4.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html1,2);

$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================


?>