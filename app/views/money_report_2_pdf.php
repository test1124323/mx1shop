<?php
$path = "../../";
define('FPDF_FONTPATH','font/');
include($path."include/config_header_top.php");
include($path."include/MPDF53/mpdf.php");
$link = "menu_id=".$menu_id."&menu_sub_id=".$menu_sub_id;  /// for mobile
$paramlink = url2code($link);
$pdf = new mPDF('th', 'A4', '0', 'THSaraban');
$pdf ->AddPage('L','','','','',8,8,8,8,'','');

$filter="";
if($_POST['YEAR'] != "" &&$_POST['EMONTH']!="" &&$_POST['SMONTH']!=""){
	$filter .= " and YEAR_PAYROLL ='".$_POST['YEAR']."' AND MONTH_PAYROLL >= '".$_POST['SMONTH']."' and MONTH_PAYROLL <= '".$_POST['EMONTH']."' ";
}

	
    $sql = "select  YEAR_PAYROLL,MONTH_PAYROLL,SUM(SALARY_DEBIT) as SALARY_DEBIT,
	sum(SALARY_CREDIT) as SALARY_CREDIT,SUM(SALARY_MAS) as SALARY_MAS
	 from PAYROLL_EMP 
WHERE  1=1 $filter 
GROUP BY YEAR_PAYROLL,MONTH_PAYROLL";
	$query = $db->query($sql);
	$nums = $db->db_num_rows($query);
	
$html = "";
$html .= "<style type='text/css'>
				body{
					font-size:10pt;
				}
				table {
					border-collapse:collapse;
				}
				td {
					padding:5px;
				}
			</style>";
$html .= "<div style='height:1cm;' align='center'><strong>รายงานการจ่ายเงินเดือนประจำเดือน </strong></div>";
		
$html .= "<table width='100%' border='0' cellspacing='0' cellpadding='0' >
  <thead >
	   <tr >
          <th style='height:0.6cm; border:solid 1px #000000; width:1cm;'><div align='center'><strong>เดือน/ปี</strong></div></th>
          <th style='height:0.6cm; border:solid 1px #000000; width:1cm;' ><div align='center'><strong>เงินได้</strong></div></th>
		  <th style='height:0.6cm; border:solid 1px #000000; width:2cm;'><div align='center'><strong>เงินหัก</strong></div></th>
		  <th style='height:0.6cm; border:solid 1px #000000; width:1cm;' ><div align='center'><strong>ภาษีเงินได้</strong></div></th>
		  <th style='height:0.6cm; border:solid 1px #000000; width:3cm;' ><div align='center'><strong>รวมเป็นเงิน</strong></div></th>
				</tr>";	
 $html.="</thead><tbody>";	
	 if ($nums > 0) {			
				$i=1;
				while ($rec = $db->db_fetch_array($query)) {	
				$TOTAL = $db->get_data_field("SELECT sum(PAY_TAX_AMOUNT+PAY_TAX_OTHER) as TOTAL FROM PAYROLL_TAX_HIS 
				WHERE PAY_TAX_YEAR = '".$rec['YEAR_PAYROLL']."' and PAY_TAX_MONTH = '".$rec['MONTH_PAYROLL']."'","TOTAL");
				
				$SUM_SALARY_DEBIT+=$rec["SALARY_DEBIT"];
				$SUM_SALARY_DEBIT2+=$rec["SALARY_DEBIT"]-$TOTAL;
				$SUM_TOTAL+=$TOTAL;
				$SUM_SALARY_MAS+=$rec['SALARY_MAS'];											
$html.="<tr>
              <td style='height:0.6cm; border:solid 1px #000000;' align='center' >".$mont_th_short[$rec["MONTH_PAYROLL"]]."/".$rec["YEAR_PAYROLL"]."</td>
              <td style='height:0.6cm; border:solid 1px #000000;' align='right'>".number_format($rec["SALARY_DEBIT"],2)."</td>
			  <td style='height:0.6cm; border:solid 1px #000000;' align='right' >".number_format($rec["SALARY_DEBIT"]-$TOTAL,2)."</td>
			   <td style='height:0.6cm; border:solid 1px #000000;' align='right' >".number_format($TOTAL,2)."</td>
			  <td style='height:0.6cm; border:solid 1px #000000;' align='right' >".number_format($rec['SALARY_MAS'],2)."</td>";
 $html.="</tr>";
									  	$i++;
                         		}
$html.="<tr>
              <td style='height:0.6cm; border:solid 1px #000000;' align='left' >รวม</td>
              <td style='height:0.6cm; border:solid 1px #000000;' align='right'>".$SUM_SALARY_DEBIT."</td>
			  <td style='height:0.6cm; border:solid 1px #000000;' align='right' >".number_format($SUM_SALARY_DEBIT2,2)."</td>
			   <td style='height:0.6cm; border:solid 1px #000000;' align='right' >".number_format($SUM_TOTAL,2)."</td>
			  <td style='height:0.6cm; border:solid 1px #000000;' align='right' >".number_format($SUM_SALARY_MAS,2)."</td>";
 $html.="</tr>";
 						 }else {
 $html.="<tr><td style='height:0.6cm; border:solid 1px #000000;' align=\"center\" colspan=\"5\">ไม่พบข้อมูล</td></tr>";
                         }
 $html .= "</tbody>
             </table>";

$pdf->WriteHTML($html);

$pdf->Output();