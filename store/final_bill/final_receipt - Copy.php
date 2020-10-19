<?php
include("../../dbinfo.php");
session_start();

error_reporting(0);

$date=date('d/m/Y');
 $s="select * from a_final_bill where inv_no='".$_REQUEST['inv_no']."'"; 
$Es=mysqli_query($conn,$s);
$Fs=mysqli_fetch_array($Es);
$n=mysqli_num_rows($Es);
$ino=$n;

//  $spm="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'";
 $spm="select * from m_franchisee where id='5'";
$Scm=mysqli_query($conn,$spm);
$Frp1=mysqli_fetch_array($Scm);


 $pr1="select * from m_company where cus_name='".$_SESSION['company']."'";  
$Epr1=mysqli_query($conn,$pr1);
$Fpr1=mysqli_fetch_array($Epr1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
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
<table align="center" width="695" border="1"   cellpadding="3"  cellspacing="0">
<thead>
 

<tr>
<th align="center" colspan="5" ><span style="font-size:28px"><B><?php echo $Frp1['franchisee_name'] ?> </B></span><BR/><?php echo $Frp1['address'] ?>,<BR/><?php echo $Frp1['gst_no'] ?>,<BR/><?php echo $Frp1['cen_manager'] ?><BR/><?php echo $Frp1['con_number'] ?><BR/></th>
</thead>
<tbody>

<?php
$cus="select * from a_customer where id='".$Fs['cname']."'";
$spm=mysqli_query($conn,$cus);
$epm=mysqli_fetch_array($spm);
?>

<tr>
<td  boalign="LEFT" colspan="2" ><span style="font-size:18px">Customer Name  : <B><?PHP echo $epm['cust_name']; ?></B></span><BR/>
  Mobile No: <B><?PHP echo $Fs['cmobile']; ?></B><BR/>
  Address : <B><?PHP echo $Fs['caddrs']; ?></B><BR/>
  Payment Mode: <B><?PHP echo $Fs['ptype']; ?></B></td>
<td  boalign="LEFT" colspan="1" ><span style="font-size:18px">Date : <b><?PHP echo date("d-m-Y", strtotime($Fs['bill_date'])); ?></b></span><br/>
  Invoice No: <b><?PHP echo $Fs['inv_no']; ?></b><br/>
  Job Card No: <b><?PHP echo $Fs['job_card_no']; ?></b><br/></td>
</tr>
<?php 
$na="select * from a_customer_vehicle_details where cust_name='".$Fs['cname']."'";  
$nam=mysqli_query($conn,$na);
$vehile=mysqli_fetch_array($nam);


?>


  <tr height="15px">
    
    <td align="left" colspan="5"><strong>VEHICLE SERVICE DETAILS </strong></td>
  </tr>
  
  <?php
  $pq="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='Package'";
$rs=mysqli_query($conn,$pq);
$n=mysqli_num_rows($rs);
if($n>0)
{
  ?>
  <th align="center" colspan="5" style=" height:20px" ><span style="font-size:20px">PACKAGE DETAILS</span></th>
  
<tr align="center">
<td width="92"><b>S:No</b></td>
<td width="368"><b>Package Name</b></td>
<td width="209"><b>Amount</b></td>
</tr>



<?php
$tr=0;
$qt=0;
$dt=0;
$trs=0;
 $gt1="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='Package'"; 
$Egt1=mysqli_query($conn,$gt1);
$Fs1=mysqli_fetch_array($Egt1);


			$sdm="select *from s_job_card where job_card_no='".$Fs1['job_card_no']."'"; 
			$scm=mysqli_query($conn,$sdm);
			while($dcm=mysqli_fetch_array($scm))
			{
			$sdm1="select *from s_job_card_pdetails where job_card_no='".$dcm['id']."'"; 
			$scm1=mysqli_query($conn,$sdm1);
			while($dcm1=mysqli_fetch_array($scm1))
			{


$i++;
?>

<tr>
<td width="92" align="center"><?php echo $i; ?></td>
<td width="368"><?php echo $dcm1['package_type']; ?></td>
<td  width="209" align="center"><?php echo $dcm1['package_amt'];?></td>
</tr>
<?php 
}
}
}
?>

 <?php
  $pq="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='Service'";
$rs=mysqli_query($conn,$pq);
$n=mysqli_num_rows($rs);
if($n>0)
{
  ?>

  <th align="center" colspan="5" style=" height:20px" ><span style="font-size:20px">SERVICE DETAILS</span></th>
  
<tr align="center">
<td width="92"><b>S:No</b></td>
<td width="368"><b>Service  Name</b></td>
<td width="209"><b>Amount</b></td>
</tr>



<?php

 $gt1="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='Service'"; 
$Egt1=mysqli_query($conn,$gt1);
$Fs1=mysqli_fetch_array($Egt1);


			$sdm="select *from s_job_card where job_card_no='".$Fs1['job_card_no']."'"; 
			$scm=mysqli_query($conn,$sdm);
			while($dcm=mysqli_fetch_array($scm))
			{
			
			$sdm1="select *from s_job_card_sdetails where job_card_no='".$dcm['id']."'"; 
			$scm1=mysqli_query($conn,$sdm1);
			while($dcm1=mysqli_fetch_array($scm1))
			{


$i++;
?>
<?php 

?>
<tr>
<td width="92" align="center"><?php echo $i; ?></td>
<td width="368"><?php echo $dcm1['service_type']; ?></td>
<td  width="209" align="center"><?php echo $dcm1['st_amt'];?></td>
</tr>
<?php 
}
}
}
?>

 <?php
  $pq="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='SparePick'";
$rs=mysqli_query($conn,$pq);
$n=mysqli_num_rows($rs);
if($n>0)
{
  ?>

<th align="center" colspan="5" style=" height:20px" ><span style="font-size:20px">SPARE DETAILS</span></th>
  
<tr align="center">
<td width="92"><b>S:No</b></td>
<td width="368"><b>Spare  Name</b></td>
<td width="209"><b>Amount</b></td>
</tr>



<?php

 $gt1="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='SparePick'"; 
$Egt1=mysqli_query($conn,$gt1);
while($Fs1=mysqli_fetch_array($Egt1))
{


			$sdm="select *from m_spare where sid='".$Fs1['sname']."'"; 
			$scm=mysqli_query($conn,$sdm);
			while($dcm=mysqli_fetch_array($scm))
			{
			
			

$i++;
?>
<?php 

?>
<tr>
<td width="92" align="center"><?php echo $i; ?></td>
<td width="368"><?php echo $dcm['sname']; ?></td>
<td  width="209" align="center"><?php echo $dcm['smrp'];?></td>
</tr>
<?php 
}
}
}
?>

<?php

 $gt1="select * from a_final_bill where inv_no='".$_REQUEST['inv_no']."'"; 
$Egt1=mysqli_query($conn,$gt1);
$Fs1=mysqli_fetch_array($Egt1);

?>

 <tr  colspan="2">

</tr>

   <tr>
<td  align="right" colspan="2" height="30px"><b> SERVICE AMOUNT :</b> &nbsp;&nbsp;</td>
<td align="left" colspan="1">&nbsp;&nbsp;<b><?php echo $Fs1['ser_amt'];?></b></td>
</tr>

<?PHP
$gt3="select IFNULL(sum(smrp),0) as smrp from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='SparePick'"; 
$Egt3=mysqli_query($conn,$gt3);
$Fs3=mysqli_fetch_array($Egt3);

?>
 <tr>
<td  align="right" colspan="2" height="30px"><b> SPARE AMOUNT :</b> &nbsp;&nbsp;</td>
<td align="left" colspan="1">&nbsp;&nbsp;<b><?php echo $Fs3['smrp'];?></b></td>
</tr>

<tr>
<td  align="right" colspan="2" height="30px"><b>OTHES CHARGE :</b> &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<b><?php echo $Fs1['other_charge'];?></b></td>
</tr>

<?PHP
$total=$Fs1['ser_amt']+$Fs3['smrp']+$Fs1['other_charge'];
?>
<tr style="display:none">
<td  align="right" colspan="2" height="30px"><b>TOTAL AMOUNT :</b> &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<b><?php echo $total;?></b></td>
</tr>
<?PHP
$dis=$total*($Fs1['discount']/100);

?>
<?php
if($Fs1['discount']!='0')
{
?>
<tr>
<td  align="right" colspan="2" height="30px"><b>DISCOUNT  (<?php echo $Fs1['discount']; ?>%) :</b> &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<b><?php echo $dis;?></b></td>
</tr>
<?php
}
?>
<?php
$Amt=$total-$dis;
$gst=$Amt*($Fs1['gst']/100);

?>
<tr>
<td  align="right" colspan="2" height="30px"><b>GST <?php echo $Fs1['gst']; ?> %:</b> &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<b><?php echo round($gst,2);?></b></td>
</tr>
<tr>
<td  align="right" colspan="2" height="30px"><b>BILL AMOUNT:</b> &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<b><?php echo round($Fs1['bill_amt'],0); ?>.00</b></td>
</tr>
<tr>
<td  align="right" colspan="2" height="30px"><b>ADVANCE AMOUNT:</b> &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<b><?php echo $Fs1['paid_amt']; ?></b></td>
</tr>
<?PHP
if($Fs1['from_off_amt']!='0')
{
?>
<tr>
<td  align="right" colspan="2" height="30px"><b>PREMIUM PACKAGE AMOUNT:</b> &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<b><?php echo $Fs1['from_off_amt']; ?></b></td>
</tr>
<?php
}
$ro=$Fs1['paid_amt']+$Fs1['from_off_amt'];
$bal=$Fs1['bill_amt']-$ro

?>
<tr>
<td  align="right" colspan="2" height="30px"><b>BALANCE AMOUNT:</b> &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<b><?php echo $Fs1['bal_amt']; ?></b></td>
</tr>
<?php
$rec=$bal-$Fs1['bill_amt'];

?>
<tr>
<td  align="right" colspan="2" height="30px"><b>RECEIVED AMOUNT:</b> &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<b><?php echo $Fs1['rec_amt']; ?>.00</b></td>
</tr>
<?php

$bn="select * from company where comp_name='".$_SESSION['company']."'";
$Ebn=mysqli_query($conn,$bn);
$Fbn=mysqli_fetch_array($Ebn);

?>

<tr height="30px">
    
    <td align="center" colspan="16"><strong>Thank You For Your Business</strong></td>
  </tr>

</table>
</div>
<h4 align="center"><input type="button" name="print" value="print" onClick="printDiv('print-content')" />&nbsp;&nbsp;&nbsp;<a href="f_bill_view.php" class="button style2">cancel</a></h4>
</body>
</html>
