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

$spm="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'";
$Scm=mysqli_query($conn,$spm);
$Frp1=mysqli_fetch_array($Scm);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Job Card Receipt</title>
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
<?php 
   $sij="select * from  s_job_card where job_card_no='".$_REQUEST['job_card_no']."'";
  $Esij=mysqli_query($conn,$sij);
  $FEsij=mysqli_fetch_array($Esij); 
  
     $sij1="select * from  s_job_card_sdetails where job_card_no='".$_REQUEST['id']."'";
  $Esij1=mysqli_query($conn,$sij1);
  $FEsij1=mysqli_fetch_array($Esij1); 
?>  
<body oncontextmenu="return false;">

<div id="print-content">
<table align="center" width="250" border="1"   cellpadding="3"  cellspacing="0">
  <thead>    
    <tr>
    <td align="left" width="350"><b><?PHP echo $Frp1['franchisee_name']; ?></b><br/><?PHP echo $Frp1['address']; ?><br/><?PHP echo $Frp1['con_number']; ?><br/>GSTIN:<?PHP echo  $Frp1['gst_no']; ?><?PHP echo $Frp1['website']; ?><br/><?PHP echo $Frp1['email']; ?> </td>
 </tr>
	<tr>
      <td align="center" width="250"><b> <img src="<?php echo $_SESSION['path'];?>/iocss/logo3.jpg" alt="logo" style="width:auto;height:80px;background-color:#FFF"/> </td> 
    </tr>
  </thead>

<tbody>
<tr>
<td> 
<table align="center" width="250" border="1px"   cellpadding="3"  cellspacing="0"> 
  <tr>
     <td align="left" width="112"><b>Date </b></td><td align="left" width="135"><b>Time </b></td>
  </tr>
  <tr>
     <td align="left" width="112"><u><?php echo date("d-m-Y", strtotime($FEsij['DeliveryDate'])); ?></u></td><td align="left" width="135"><u><?php echo $FEsij['DeliveryTime'] ?></u></td>
  </tr>  	
</table>
<table align="center" width="250" border="1px"   cellpadding="3"  cellspacing="0"> 

 <tr>
    <td align="left" width="250"><b>Vehicle No </b><u><?php echo $FEsc['id']; ?></u></td><td align="left" width="100"><b>Job Card No </b>&nbsp; &nbsp; </td>
 </tr>
 <tr>
   <td align="left" width="250"><u><?php echo $FEsij['vehicle_no'] ?></u></td><td align="left" width="250"><u><?php echo $FEsij['job_card_no'] ?></u></td>
 </tr>
 <tr>
 <tr>
    <td align="left" width="250"><b>State </b><u></u></td><td align="left" width="100"><?php echo $FEsij['jstate'] ?>&nbsp; &nbsp; </td>
 </tr>
 
 <tr>
 <?php

 
  $Voucher_Id=$_REQUEST['Voucher_Id'];
  $sc="select * from receipt_voucher where Voucher_Id='$Voucher_Id'";
 $Esc=mysqli_query($conn,$sc);
 $FEsc=mysqli_fetch_array($Esc);

 $cus="select * from a_customer where id='".$FEsc['cust_id']."'";
 $spm=mysqli_query($conn,$cus);
 $epm1=mysqli_fetch_array($spm);
 ?>
   <td align="left" width="150"><b>Cust Name</b></td><td align="left" width="100"><b>Cust No</b></td>  
 </tr>
 <tr>
   <td align="left" width="250"><u><?php echo $FEsij['sname'] ?></u></td><td align="left" width="250"><u><?php echo $FEsij['smobile'] ?></u></td>
 </tr>

 </table>
 <div>&nbsp;</div>
<table align="center" width="250" border="1px" cellpadding="3"  cellspacing="0">

<tr>
<td colspan="4"><span style="font-size:18px" class="style4">Customer Preference</span></td>
</tr>
<br/>

<?php 

				$ab2="select * from s_job_card where id='".$_REQUEST['id']."'";  
				$cp2=mysqli_query($conn,$ab2);
				$dp2=mysqli_fetch_array($cp2);

				$sinv2="select * from a_customer where id='".$dp2['customer_id']."' order by id desc";
				$Esinv2=mysqli_query($conn,$sinv2);
				$FEsinv2=mysqli_fetch_array($Esinv2);
				
				
				?>

<tr>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv2['typr_polish']=='1') { ?> checked="true" <?php } ?> disabled>Tyre polish</span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv2['db_polish']=='1') { ?> checked="true" <?php } ?> disabled>Dashboard Polish</span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv2['mat_paper']=='1') { ?> checked="true" <?php } ?> disabled>Mat Paper </span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv2['e_water_wash']=='1') { ?> checked="true" <?php } ?> disabled>Engine Water Wash</span></td>

</tr>
</table>
<table align="center" width="250" border="1px"   cellpadding="3"  cellspacing="0" >  

 <tr>
   <td align="left" width="250"><b>Service Types </b><u><?PHP echo $epm1['cust_name']; ?></u></td><td align="left" width="350"><b>Service Amount </b></td>
 </tr>
 <tr>
   <td align="left" width="250"><u><?php echo $FEsij1['service_type'] ?></u></td><td align="left" width="250"><u><?php echo $FEsij1['st_amt'] ?></u></td>
 </tr>
</table>
<div>&nbsp;</div>
<table align="center" width="250" border="1px"   cellpadding="3"  cellspacing="0" hidden>  
  <tr>
    <td align="left" width="150"><b>Gold </b><u><?PHP echo $epm1['cust_name']; ?></u></td><td align="right" width="250"><b><?PHP echo $epm1['cust_name']; ?></b></td>
  </tr>
  <tr>
    <td align="left" width="100"><b>Platinum </b><u><?PHP echo $epm1['cust_name']; ?></u></td><td align="right" width="250"><b><?PHP echo $epm1['cust_name']; ?></b></td>
  </tr>
</table>
<div>&nbsp;</div>
<table align="center" width="250" border="1px"   cellpadding="3"  cellspacing="0">  
  <tr>
    <td align="left" width="150"><b>Amount </b></td><td align="right" width="250"><b><?PHP echo $FEsij['total_amt']; ?></b></td>
  </tr>
  <tr>
    <td align="left" width="100"><b>Discount Amount </b></td><td align="right" width="250"><b><?PHP echo $FEsij['DiscountAmount']; ?></b></td>
  </tr>
  <tr>
    <td align="left" width="100"><b>VAT% </b></td><td align="right" width="250"><b><?PHP echo $FEsij['gst']; ?></b></td>
	
  </tr>
  <tr>
    <td align="left" width="100"><b>Total </b></td><td align="right" width="250"><b><?PHP echo $FEsij['IncludeGst']; ?></b></td>
  </tr>
</table>
</td>
</tr>

<table align="center" width="700" border="1px"   cellpadding="3"  cellspacing="0">
  <h4 align="center"><input type="button" name="print" value="print" onClick="printDiv('print-content')" />&nbsp;&nbsp;&nbsp;<a href="s_jobcard_view.php" class="button style2">Close</a></h4>
</table>

<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
 <tr><td colspan="2"><div style="text-align:center;"><?PHP echo $Frp1['website']; ?> | <?PHP echo $Frp1['email']; ?> </div></td></tr>
</table>

</tbody>
</table>
</div>
</body>
</html>
