<?php 
$path = Request::root()."/";
include("MPDF53/mpdf.php");
$pdf = new mPDF('th', 'A4', '0', 'THSaraban');
$pdf ->AddPage('L','','','','',8,8,8,8,'','');

$hmll = "<div>AAAAAAAAAAAAAAAAAAA</div>";
$pdf->WriteHTML($html);
$pdf->Output();
?>