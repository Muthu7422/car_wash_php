<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

$date=date('d/m/Y');
$s="select * from s_billing where inv_no='".$_REQUEST['inv_no']."'";
$Es=mysqli_query($conn,$s); 
$Fs=mysqli_fetch_array($Es);
$n=mysqli_num_rows($Es);
$ino=$n;

 $spm="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'";
$Scm=mysqli_query($conn,$spm);
$Frp1=mysqli_fetch_array($Scm);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Receipt Voucher</title>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
<table align="center" width="700" border="0px"   cellpadding="3"  cellspacing="0">
<tr>
 <td align="center" width="300"><b> <img src="<?php echo $_SESSION['path'];?>/iocss/logo1.png" alt="logo" style="width:auto;height:80px;background-color:#FFF"/> </td>
 <td align="center" width="300"><b> <h2><?PHP echo $Frp1['franchisee_name']; ?></h2></td>
</tr>
</table>
<table align="center" width="700" border="1px"   cellpadding="3"  cellspacing="0">
<tr>
 <td align="center" width="400"><?PHP echo $Frp1['address']; ?>, <?PHP echo $Frp1['con_number']; ?> </br> <b>GST No : </b><?PHP echo $Frp1['gst_no']; ?></td>
</tr>
</table>
<table align="center" width="700" border="0px"   cellpadding="3"  cellspacing="0">
<tr>
 <td align="center" width="400"><h1>Cash Receipt</h1></td>
 </tr>
</table>
<table align="center" width="700" border="1px"   cellpadding="3"  cellspacing="0"> 
 <tr>
 <?php
  /* $sij="select * from  s_job_card where id='".$_REQUEST['JobcardId']."'";
  $Esij=mysqli_query($conn,$sij);
  $FEsij=mysqli_fetch_array($Esij);  */
 
 $Voucher_Id=$_REQUEST['Voucher_Id'];
   $sc="select * from receipt_voucher where id='$Voucher_Id'";
 $Esc=mysqli_query($conn,$sc);
 $FEsc=mysqli_fetch_array($Esc);
 
  $poi="select * from cust_outstanding where cust_id='".$FEsc['cust_id']."'";
	$tyu=mysqli_query($conn,$poi);
	$uoi=mysqli_fetch_array($tyu);

 $cus="select * from a_customer where id='".$FEsc['cust_id']."'";
 $spm=mysqli_query($conn,$cus);
 $epm1=mysqli_fetch_array($spm);
 ?>
   <td align="left" width="100"><b> RECEIPT NO : </b><u><?php echo $FEsc['Voucher_Id']; ?></u></td><td align="right" width="100"><b>DATE : </b><u><?php echo date("d-m-Y", strtotime($FEsc['paid_date'])); ?></u></td>  
 </tr>
 <tr>
   <td align="left" width="350"><b>RECEIPT TO : </b><u><?PHP echo $epm1['cust_name']; ?></u><br/> <b>Mobile No : </b><u><?PHP echo $epm1['mobile1']; ?> </u></td><td align="left" width="350"><b>Amount Received : </b><u><?php echo $FEsc['paid_amt']; ?></u></td>
 </tr>
 
 <table align="center" width="700" border="1px"   cellpadding="3"  cellspacing="0"> 
 <tr>
   <td align="left" width="700" border="1px"><b>REMARKS :  </b><u><?PHP echo $FEsc['remarks']; ?></u></td>
 </tr>
 </table>
</table>
</table>
</td>
</tr>

<tr>&nbsp;</tr>

<tr>
<td>
<table align="center" width="300" border="3"   cellpadding="3"  cellspacing="0">
<tr>
<td>Total Amount Due</td>
<td width="100"><?php echo number_format($FEsc['invoice_amt'],2); ?>  </td>
</tr>
<tr>
<td>Amount Received</td>
<td width="100"> <?php echo number_format($FEsc['paid_amt'],2); ?> </td>
</tr>
<tr>
<td>Balance Due</td>
<td width="100"> <?php echo number_format($FEsc['balance_amt'],2); ?> </td>
</tr>
</table>
</td>
</tr>

<table align="center" width="700" border="0px"   cellpadding="3"  cellspacing="0" style="display:none;">
  <tr>

      <?php
						// $number=$Fs1['paid_amt']+$Fs1['Total_bill_Amount'];
						$number = $FEsc['paid_amt'];
		 
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
<td width="350" style="text-align:right" colspan="2"><b>Total amount in words : </b><?php echo  $result . "Rupees  Only";?><br/></td>
</tr>
</table>

<table align="center" width="700" border="0px"   cellpadding="3"  cellspacing="0"> 
 <tr>
   <td align="left" width="700"><b>Payment Received in : </b></td>
 </tr>
</table>
<table align="center" width="700" border="1px"   cellpadding="3"  cellspacing="0"> 
 <tr>
   <td align="left" width="20"><b></b></td><td></td><td align="left" width="680"><b>Payment Mode : </b><?php echo  $FEsc['payment_mode'];?></td>
   
 </tr>

</table>

<table align="center" width="700" border="1px"   cellpadding="3"  cellspacing="0">
  <h4 align="center"><input type="button" name="print" value="print" onClick="printDiv('print-content')" />&nbsp;&nbsp;&nbsp;<a href="a_receipt_f.php" class="button style2">Close</a></h4>
</table>

<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr><td colspan="2"><div style="text-align:center;"><?PHP echo $Frp1['website']; ?> | <?PHP echo $Frp1['email']; ?> </div></td></tr>
</table>

</tbody>
</table>
</div>
</body>
</html>
