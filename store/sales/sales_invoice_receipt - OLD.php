<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

$date=date('d/m/Y');
$s="select * from sales_invoice where inv_no='".$_REQUEST['inv_no']."'";
$Es=mysql_query($s);
$Fs=mysql_fetch_array($Es);
$n=mysql_num_rows($Es);
$ino=$n;

 $spm="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'";;
 $Scm=mysql_query($spm);
 $Frp1=mysql_fetch_array($Scm);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Final Jobcard Bill</title>
<style>
<style type="text/css" media="print">


a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;
	padding-top:3px;
	padding-bottom:2px;
    padding-right:10px;
    padding-left:10px;
    text-decoration: none;
    color: initial;
}
@media print { 
table, table tr, table td { 
border-top: #000 solid 1px; 
border-bottom: #000 solid 1px; 
border-left: #000 solid 1px; 
border-right: #000 solid 1px; 
}
.tds
{
border-top: #000 solid 1px; 
border-bottom: #000 solid 1px; 
border-left: #000 solid 1px; 
border-right: #000 solid 1px; 
}
}


.style2 {font-family: Arial, Helvetica, sans-serif}
.style3 {font-size: 18px}
.style4 {font-size: 16px}
</style>
<style>
table { border-collapse: collapse; }
tr { border: none; }
td.line {
  border-right: solid 0px #000; 
  border-left: solid 0px #000;
}
table, th{
    border: 0px solid black;
}


</style>
<script>
function printDiv(divName) {

 var printContents = document.getElementById(divName).innerHTML;
 w=window.open();
 w.document.write(printContents);
 w.print();
 w.close();
}
</script>
<script>
function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise .;
}
</script>
</head>

<body oncontextmenu="return false;">

<div id="print-content">
<table align="center" width="600" border="0"   cellpadding="3"  cellspacing="0">
<thead>

</thead>
<tbody>

<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td align="left" width="350"><b><?PHP echo $Frp1['franchisee_name']; ?></b><br/><?PHP echo $Frp1['address']; ?><br/><?PHP echo $Frp1['con_number']; ?><br/><?PHP echo $Frp1['website']; ?><br/><?PHP echo $Frp1['email']; ?> </td>
</tr>

</table>
</td>
</tr>
<?php
$cus="select * from a_customer where id='".$Fs['cname']."'";
$spm=mysql_query($cus);
$epm=mysql_fetch_array($spm);
?>
<tr>
<td>
<table align="center" width="700" border="0" style="border-bottom:2px solid black;"  cellpadding="3"  cellspacing="0">
<tr>
<td align="left" width="350"><b>INVOICE TO</b><br/><?PHP echo $epm['cust_name']; ?><br/><?PHP echo $epm['addr']; ?><br/><?PHP echo $epm['mobile1']; ?><br/><?PHP echo $epm['email']; ?></td>
<td align="center" width="175">INVOICE NO <br/>DATE</td>
<td align="left" width="50">: <br/>:</td>
<td align="left" width="125"><?php echo $Fs['inv_no']; ?><br/><?php echo date("d-m-Y", strtotime($Fs['sdate'])); ?></td>
</tr>

</table>
</td>
</tr>
<tr>
<td align="left"  height="50px"><b>Spare Details :</b></td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>S:no</FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>Spare Name</FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>Qty</FONT></td>
<td align="center" bgcolor="#757978"><FONT COLOR='FFFFFF'>Rate</FONT></td>
<td align="center" bgcolor="#757978"><FONT COLOR='FFFFFF'>Taxable Amount</FONT></td>
<td align="center" bgcolor="#757978"><FONT COLOR='FFFFFF'>CGST % </FONT></td>
<td align="center" bgcolor="#757978"><FONT COLOR='FFFFFF'>SGST % </FONT></td>
<td align="center" bgcolor="#757978"><FONT COLOR='FFFFFF'>Tax Amount</FONT></td>
</tr>

<?php
$i=0;

 $gt1="select * from sales_invoice_details where inv_no='".$_REQUEST['inv_no']."'"; 
 $Egt1=mysql_query($gt1);
 while($Fs1=mysql_fetch_array($Egt1))

 {

			$sdm="select *from m_spare where sid='".$Fs1['spare_name']."'"; 
			$scm=mysql_query($sdm);
			while($dcm=mysql_fetch_array($scm))
			{
				
				$spare=$Fs1['sqty']*$Fs1['smrp'];
$i++;
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $dcm['sname']; ?></td>
<td><?php echo $Fs1['qty']; ?></td>
<td align="right"><?php echo $Fs1['BeforeTaxOfMrp']; ?></td>
<td align="right"><?php echo $Fs1['total'];?></td>
<td align="right"><?php echo $Fs1['cgst']; ?></td>
<td align="right"><?php echo $Fs1['sgst'];?></td>
<td align="right"><?php echo $Fs1['tax_amt'];?></td>
</tr>
<?php 
}
$spamt=$spamt+$spare;
}
						$i=5-$n;
						for($k=0;$k<=$i;$k++)
						{
?>
      <tr>
        <td  class="line" align="center">&nbsp;</td>
        <td  class="line" style="padding-left:30px">&nbsp;</td>
        <td  class="line" align="center">&nbsp;</td>
        <td  class="line" align="center">&nbsp;</td>
        <td  class="line" align="center">&nbsp;</td>
		<td  class="line" align="center">&nbsp;</td>
		<td  class="line" align="center">&nbsp;</td>
      </tr>
		<?php	}	?>
</table>
</td>
</tr>

<?php

 $gt1="select * from sales_invoice where inv_no='".$_REQUEST['inv_no']."'"; 
 $Egt1=mysql_query($gt1);
 $Fs1=mysql_fetch_array($Egt1);

?>
<tr>
<td align="center" height="25px"><b>Payment Details :</b></td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td align="left" width="500" class="style4">Here's your invoice!</td>
<td width="150"><b>Taxable Amount</td>
<td width="25"><b> :</b></td>
<td width="25"><b><?php echo $Fs1['total_amt'];?></b></td>
</tr>

<tr>
<td class="style4">Terms and conditions:</td>
<td><b> Tax  </b></td>
<td width="25"><b> :</b></td>
<td><b><?php echo $Fs1['TotalTaxAmount'];?></b></td>

</tr>

<tr>
<td class="style4"></td>
<td><b>Total Amount  </b></td>
<td width="25"><b> :</b></td>
<td><b><?php echo number_format(($Fs1['total_amt']+$Fs1['TotalTaxAmount']), 2, '.', '');?></b></td>

</tr>

<td class="style4">1.Manufacturers Gurantee</td>
<td> </td>
<td width="25"><b> </b></td>
<td><b></b></td>
</tr>

<tr>
<td class="style4">2.Goods once sold will not be taken back</td>
<td bgcolor=""><b></b></td>
<td width="25" bgcolor=""><b> </b></td>
<td bgcolor=""><b></b></td>
</tr>

<tr>
<td class="style4">3.Disputes if any subject to Tamilnadu</td>
<td><b></b></td>
<td width="25"><b> </b></td>
<td><b></b></td>
</tr>
<tr >
<td class="style4"> Jurisdiction E &EO</td>
<td><b> </b></td>
<td width="25"><b></b></td>
<td><b></b></td>
</tr>
<tr>
  <?php
						 
						$number = $Fs1['total_amt']+$Fs1['TotalTaxAmount'];
		 
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
   $result . "Rupees  ";
  
  
 ?>

<td colspan="5" align="right"><b>Amount in words : <?php echo  $result . "Rupees ";?></b><br/></td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td width="350" class="style4">We appreciate your prompt payment.<br/>Thanks for your business!<br/><b><?PHP echo $Frp1['franchisee_name']; ?></b></td>
    
</tr>

</table>
</td>
</tr>
</tbody>
</table>
</div>
<h4 align="center"><input type="button" name="print" value="print" onClick="printDiv('print-content')" />&nbsp;&nbsp;&nbsp;<a href="sales_invoice_view.php" class="button style2">cancel</a></h4>
</body>
</html>
