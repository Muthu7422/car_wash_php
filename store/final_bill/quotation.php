<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

$date=date('d/m/Y');
$s="select * from a_final_bill where inv_no='".$_REQUEST['inv_no']."'";
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
<title>Quotation</title>
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
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td align="left" width="350"><b><?PHP echo $Frp1['franchisee_name']; ?></b><br/><?PHP echo $Frp1['address']; ?><br/><?PHP echo $Frp1['con_number']; ?><br/><?PHP echo "GST No: ".$Frp1['gst_no']; ?><br/><?PHP echo $Frp1['website']; ?><br/><?PHP echo $Frp1['email']; ?> </td>
<td align="right" width="350"><b> <img src="<?php echo $_SESSION['path'];?>/iocss/logo3.png" alt="logo" style="width:auto;height:80px;background-color:#FFF"/> </td>
</tr>

</table>
</td>
</tr>
<?php

 $sij="select * from  s_job_card where id='".$_REQUEST['JobcardId']."'";
$Esij=mysql_query($sij);
$FEsij=mysql_fetch_array($Esij);

 $cus="select * from a_customer where id='".$FEsij['customer_id']."'";
$spm=mysql_query($cus);
$epm=mysql_fetch_array($spm);
?>
<tr>
<td>
<table align="center" width="700" border="0" style="border-bottom:2px solid black;"  cellpadding="3"  cellspacing="0">
<tr>
<td align="left" width="350"><b>Quotation To</b><br/><?PHP echo $epm['cust_name']; ?><br/><?PHP echo $epm['addr']; ?><br/><?PHP echo $epm['mobile1']; ?><br/><?PHP echo $epm['email']; ?></td>
<td align="right" width="175"><br/>Quotation No<br/>Date</td>
<td align="right" width="50"><br/>:<br/>:</td>
<td align="left" width="125"><br/><?php echo $FEsij['job_card_no']; ?><br/><?php echo date("d-m-Y", strtotime($FEsij['jdate'])); ?></td>
</tr>

</table>
</td>
</tr>

<tr>
<td align="left"><b>Vehicle Details :</b></td>
</tr>
<tr>
<td>
<table align="center" width="600" border="3"   cellpadding="3"  cellspacing="0">
<tr>
<td>Vehicle No</td>
<td>Vehicle Model</td>
<td>Vehicle Brand</td>
<td>Vehicle Segment</td>
<td>Vehicle Type</td>
</tr>

<?php
$i=0;
$gt1="select * from a_final_bill where inv_no='".$_REQUEST['inv_no']."'"; 
$Egt1=mysql_query($gt1);
$Fs1=mysql_fetch_array($Egt1);

			$cus="select * from a_customer_vehicle_details where vehicle_no='".$FEsij['vehicle_no']."'";
			$spm=mysql_query($cus);
			$epm=mysql_fetch_array($spm);
			
			$c="select * from master_vehicle where Id='".$epm['VehicleModel']."'";
			$sx=mysqli_query($conn,$c);
			$as=mysqli_fetch_array($sx);

?>
<tr>
<td><?php echo $epm['vehicle_no']; ?></td>
<td><?php echo $as['VehicleModel']; ?></td>
<td><?php echo $epm['VehicleBrand'];?></td>
<td><?php echo $epm['VehicleSegment']; ?></td>
<td><?php echo $epm['VehicleType']; ?></td>
</tr>
</table>
</td>
</tr>
<?php
  $pq="select * from s_job_card_pdetails where job_card_no='".$FEsij['id']."'";
$rs=mysql_query($pq);
$n=mysql_num_rows($rs);
if($n>0)
{
  ?>
<tr>
<td align="left" height="10px"><b>Package Details :</b></td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr >
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>S:no</FONT></td>
<td bgcolor="#757978" style="text-align:left" colspan="3"><FONT COLOR='FFFFFF'>Package Name</FONT></td>
<td bgcolor="#757978" style="text-align:right"><FONT COLOR='FFFFFF'>Amount</FONT></td>
</tr>

<?php
$i=0;
			$sdm="select *from s_job_card where id='".$FEsij['id']."'"; 
			$scm=mysql_query($sdm);
			$dcm=mysql_fetch_array($scm);
			
			
			$sdm1="select *from s_job_card_pdetails where job_card_no='".$dcm['id']."'"; 
			$scm1=mysql_query($sdm1);
			while($dcm1=mysql_fetch_array($scm1))
			{
$i++;
?>
<tr>
<td><?php echo $i; ?></td>
<td colspan="3"><?php echo $dcm1['package_type']; ?></td>
<td style="text-align:right"><?php echo $dcm1['package_amt'];?></td>
</tr>
<?php 

$totalPackageAmount=$totalPackageAmount+$dcm1['package_amt'];
}


?>
</table>
</td>
</tr>
<?php
}

?>
<?php
$pq="select * from s_job_card_sdetails where job_card_no='".$FEsij['id']."'";
$rs=mysql_query($pq);
$n=mysql_num_rows($rs);
if($n>0)
{
?>
<tr>
<td align="left"  height="10px"><b>Service Details :</b></td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr >
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>S:no</FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>Service Name</FONT></td>

<td bgcolor="#757978" style="text-align:right"><FONT COLOR='FFFFFF'>Amount</FONT></td>

</tr>

<?php
$i=0;
			$sdm="select * from s_job_card where id='".$FEsij['id']."'"; 
			$scm=mysql_query($sdm);
			$dcm=mysql_fetch_array($scm);
			
			
			$sdm1="select * from s_job_card_sdetails where job_card_no='".$dcm['id']."'"; 
			$scm1=mysql_query($sdm1);
			while($dcm1=mysql_fetch_array($scm1))
			{
$i++;
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $dcm1['service_type']; ?></td>

<td style="text-align:right"><?php echo number_format($dcm1['st_amt'],2);?></td>
</tr>
<?php
$totalServiceAmount=$totalServiceAmount+$dcm1['st_amt'];
}


?>
</table>
</td>
</tr>
<?php
}

?>
<?php
$pq="select * from s_job_card_recomdetails where job_card_no='".$FEsij['id']."'";
$rs=mysql_query($pq);
$n=mysql_num_rows($rs);
if($n>0)
{
?>
<tr style="display:none">
<td align="left"  height="10px"><b>Recommended Service Details :</b></td>
</tr>
<tr style="display:none"> 
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>S:no</FONT></td>
<td bgcolor="#757978" ><FONT COLOR='FFFFFF'>Service Name</FONT></td>
<td></td>
<td></td>
<td></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>Amount</FONT></td>
</tr>

<?php
$i=0;
			$sdm="select *from s_job_card where id='".$FEsij['id']."'"; 
			$scm=mysql_query($sdm);
			$dcm=mysql_fetch_array($scm);
			
			
			$sdm1="select *from s_job_card_recomdetails where job_card_no='".$dcm['id']."'"; 
			$scm1=mysql_query($sdm1);
			while($dcm1=mysql_fetch_array($scm1))
			{
$i++;
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $dcm1['service_type']; ?></td>
<td></td>
<td></td>
<td></td>
<td style="text-align:right"><?php echo $dcm1['st_amt'];?></td>
</tr>
<?php 
}


?>
</table>
</td>
</tr>
<?php
}

?>
<?php
$pq="select * from s_outsources where  JobcardId='".$FEsij['id']."'";
$rs=mysql_query($pq);
$n=mysql_num_rows($rs);
if($n>0)
{
?>
<tr>
<td align="left"  height="10px"><b>Outsources Service Details :</b></td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>S:no</FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>Service Name</FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>Amount</FONT></td>
</tr>

<?php
$i=0;

			$sdm1="select *from s_outsources_details where JobcardId='".$_REQUEST['JobcardId']."'"; 
			$scm1=mysql_query($sdm1);
			while($dcm1=mysql_fetch_array($scm1))
			{
				
			$sdm="select *from m_service_type where id='".$dcm1['Outsources']."'"; 
			$scm=mysql_query($sdm);
			$dcm=mysql_fetch_array($scm);
			
$i++;
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $dcm['stype']; ?></td>
<td><?php echo $dcm1['TotalAmount'];?></td>
</tr>
<?php 
}


?>
</table>
</td>
</tr>
<?php
}

?>
<?php
  $pq="select * from s_spare_prepick where JobcardId='".$FEsij['id']."'";
$rs=mysql_query($pq);
$n=mysql_num_rows($rs);
if($n>0)
{
  ?>

<tr>
<td align="left"  height="10px"><b>Spare Details :</b></td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>S:no</FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>Spare Name</FONT></td>
<td bgcolor="#757978" style="text-align:right;padding-right:5px"><FONT COLOR='FFFFFF'>Rate</FONT></td>
<td bgcolor="#757978" style="text-align:right;padding-right:5px"><FONT COLOR='FFFFFF'>Tax%</FONT></td>
<td bgcolor="#757978" style="text-align:right;padding-right:5px"><FONT COLOR='FFFFFF'>Qty</FONT></td>
<td bgcolor="#757978" style="text-align:right;padding-right:5px"><FONT COLOR='FFFFFF'>Amount</FONT></td>
</tr>

<?php
$i=0;
	 $Eds="select * from s_spare_prepick where JobcardId='".$_REQUEST['JobcardId']."'";
	$Edw=mysqli_query($conn,$Eds);
	$Ewq=mysqli_fetch_array($Edw);
		
		$Dz="select * from s_spare_prepick_details where s_pick_no='".$Ewq['id']."'";
		$Cx=mysqli_query($conn,$Dz);
		while($Cas=mysqli_fetch_array($Cx))
		{
	 
			$sdm="select *from m_spare where sid='".$Cas['spare_name']."'"; 
			$scm=mysqli_query($conn,$sdm);
			while($dcm=mysqli_fetch_array($scm))
			{
				
				$spare=$Cas['qty']*$Cas['mrp'];
				$rate=$Cas['total']/$Cas['qty'];
				$total=$Cas['mrp']*$Cas['qty'];
$i++;
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $dcm['sname']; ?></td>
<td style="text-align:right;padding-right:5px"><?php echo number_format($rate,2); ?></td>
<td style="text-align:right;padding-right:5px"><?php echo $Cas['TaxRate'];?></td>
<td style="text-align:right;padding-right:5px"><?php echo number_format($Cas['qty']);?></td>
<td style="text-align:right"><?php echo number_format($total,2);?></td>
</tr>
<?php 
$spamt=$spamt+$spare;
}
}
?>
</table>
</td>
</tr>
<?php

}
?>


<?php
$pq="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='SparePick'";
$rs=mysql_query($pq);
$n=mysql_num_rows($rs);
if($n>0)
{
  ?>

<tr>
<td align="left"  height="50px"><b>Outsources Details :</b></td>
</tr>
<tr>
<td>
<table align="left" width="350" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>S:no</FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>Outsources</FONT></td>
</tr>

<?php
$i=0;		

	 

	 	$Dz="select * from s_outsources_details where JobcardId='".$_REQUEST['JobcardId']."'";
		$Cx=mysqli_query($conn,$Dz);
		while($Cas=mysqli_fetch_array($Cx))
		{
	 
			$sdm="select *from m_service_type where id='".$Cas['Outsources']."'"; 
			$scm=mysqli_query($conn,$sdm);
			while($dcm=mysqli_fetch_array($scm))
			{
$i++;
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $dcm['stype']; ?></td>
</tr>
<?php 
$spamt=$spamt+$spare;
}
}
?>
</table>
</td>
</tr>
<?php

}
?>


<?php

 $gt1="select * from a_final_bill where inv_no='".$_REQUEST['inv_no']."'"; 
$Egt1=mysql_query($gt1);
$Fs1=mysql_fetch_array($Egt1);
?>
<tr>
<td align="center" height="25px"><b>Estimated Cost Details </b></td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td align="left" width="450" class="style4"></td>
<td width="150"><b>Service Amount : </td>

<td width="55px" align="right" colspan="2"><b><i class="fa fa fa-inr" aria-hidden="true"></i><?php echo number_format(($totalServiceAmount+$totalPackageAmount),2);?></b></td>
</tr>

<tr>
<td class="style4"></td>
<td><b>Discount % : </td>

<td width="55px" align="right" colspan="2"><b>
<?php echo number_format($FEsij['DiscountPercentage'],2);?> </td>
</tr>


<tr>
<td class="style4"></td>
<td><b>GST % : </td>

<td width="55px" align="right" colspan="2"><b>
<?php echo $FEsij['gst'];?></td>
</tr>
<tr>
<td class="style4"></td>
<td><b>After Tax : </b></td>

<?php
$tsp=$totalServiceAmount+$totalPackageAmount;
//$tsa=($totalServiceAmount-($totalServiceAmount *($FEsij['DiscountPercentage']/100)));
$tsa=($tsp-($tsp *($FEsij['DiscountPercentage']/100)));

$agst=$tsa+($tsa*($FEsij['gst']/100));
//$agst=$FEsij['IncludeGst'];
$espareamount=$FEsij['spare_amt'];
 ?>
<td width="55px" align="right" colspan="2"><b><i class="fa fa fa-inr" aria-hidden="true"></i><?php echo number_format(($agst),2);?></b></td>
</tr>

<tr>
<td class="style4">  </td>
<td><b>Spare Amount : </b></td>

<td width="55px" align="right" colspan="2"><b><i class="fa fa fa-inr" aria-hidden="true"></i><?php echo number_format($spamt,2);?></b></td>
</tr>

<tr>
<td class="style4"></td>
<td><b>Total Amount : </b></td>

<td width="55px" align="right" colspan="2"><b><i class="fa fa fa-inr" aria-hidden="true"></i><?php echo number_format(round(($agst)+$spamt),2);?></b></td>
</tr>
<tr>
<td></td>
<td><b> </b></td>
<td width="15"><b> </b></td>
<td align="right"><b></b></td>
</tr>
<tr>
<td></td>

</tr>
</table>
</td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>

      <?php
						 $number=round($agst+$spamt);
						//$number = ($agst-$espareamount)+$spamt;
		 
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
<td width="350"><b>Total Amount in Words : </b><?php echo  $result . "Rupees  Only";?><br/></td>
</tr>

</table>
</td>
</tr>
</tbody>
</table>
</div>
<h4 align="center"><input type="button" name="print" value="print" onClick="printDiv('print-content')" />&nbsp;&nbsp;&nbsp;<a href="../../services/job_card/s_jobcard_view.php" class="button style2">Close</a></h4>
</body>
</html>
