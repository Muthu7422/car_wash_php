<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

mysqli_set_charset($conn,"utf8"); //for arab text
$date=date('d/m/Y');
$s="select * from a_final_bill where inv_no='".$_REQUEST['inv_no']."'";
$Es=mysqli_query($conn,$s);
$Fs=mysqli_fetch_array($Es);
$n=mysqli_num_rows($Es);
$ino=$n;

 $spm="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'";;
$Scm=mysqli_query($conn,$spm);
$Frp1=mysqli_fetch_array($Scm);


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
<td align="left" width="350"><b><?PHP echo $Frp1['NonEnglish']; ?></b><br/><?PHP echo $Frp1['NonEnglishAddres']; ?><br/><?PHP echo $Frp1['con_number']; ?><br/>VAT:<?PHP echo  $Frp1['gst_no']; ?><?PHP echo $Frp1['website']; ?><br/><?PHP echo $Frp1['email']; ?> </td>
<td align="center" width="350"><b> <span class="logo-lg"></span> </td>
</tr>

</table>
</td>
</tr>
<?php
$cus="select * from a_customer where mobile1='".$Fs['cmobile']."'";
$spm=mysqli_query($conn,$cus);
$epm=mysqli_fetch_array($spm);
?>
<tr>
<td>
<table align="center" width="700" border="0" style="border-bottom:2px solid black;"  cellpadding="3"  cellspacing="0">
<tr>
<td align="left" width="350"><b>انفوس تو </b><br/><?PHP echo $epm['cust_name']; ?><br/><?PHP echo $epm['addr']; ?><br/><?PHP echo $epm['mobile1']; ?><br/><?PHP echo $epm['email']; ?></td>
<td align="center" width="175"> انفوس ن <br/>جبكرد ن <br/>دت </td> 
<td align="left" width="50">: <br/>:<br/>:</td>
<td align="left" width="125"><?php echo $Fs['inv_no']; ?><br/><?php echo $Fs['job_card_no']; ?><br/><?php echo date("d-m-Y", strtotime($Fs['bill_date'])); ?></td>
</tr>

</table>
</td>
</tr>

<tr>
<td>
<table align="center" width="600" border="1px" cellpadding="3"  cellspacing="0">

<tr>
<td colspan="4"><span style="font-size:18px" class="style4">كستومر برفرنس</span></td>
</tr>
<br/>

<?php 

				$ab2="select * from a_final_bill where inv_no='".$_REQUEST['inv_no']."'";  
				$cp2=mysqli_query($conn,$ab2);
				$dp2=mysqli_fetch_array($cp2);

				$sinv2="select * from a_customer where id='".$dp2['cname']."' order by id desc";
				$Esinv2=mysqli_query($conn,$sinv2);
				$FEsinv2=mysqli_fetch_array($Esinv2);
				
				
				
				?>

<tr>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv2['typr_polish']=='1') { ?> checked="true" <?php } ?> disabled>طير بولش </span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv2['db_polish']=='1') { ?> checked="true" <?php } ?> disabled>ضشبورد بولش</span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv2['mat_paper']=='1') { ?> checked="true" <?php } ?> disabled>مات ببر </span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv2['e_water_wash']=='1') { ?> checked="true" <?php } ?> disabled>انجن وتر وش</span></td>

</tr>
</table>
</br>
<table align="center" width="600" border="3"   cellpadding="3"  cellspacing="0">
<tr>
<td align="left"><b>فيهكل ضتيلس  :</b></td>
</tr>
<tr>
<td>فيهكل ن </td>
<td>فيهكل موديل </td>
<td>فيهكل برند </td>
<td>فيهكل صجمنت </td>
<td>فيهكل طيب </td>
</tr>

<?php
$i=0;
 $gt1="select * from a_final_bill where inv_no='".$_REQUEST['inv_no']."'"; 
$Egt1=mysqli_query($conn,$gt1);
$Fs1=mysqli_fetch_array($Egt1);

			$cus="select * from a_customer_vehicle_details where vehicle_no='".$Fs1['cvehile']."'";
			$spm=mysqli_query($conn,$cus);
			$epm=mysqli_fetch_array($spm);
			
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
  $pq="select * from s_job_card_pdetails where job_card_no='".$Fs['JobcardId']."'";
$rs=mysqli_query($conn,$pq);
$n=mysqli_num_rows($rs);
if($n>0)
{
  ?>
<tr>
<td align="left" height="10px"><b>باكج دتيلس  :</b></td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr >
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>س:ن </FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>باكج نايم </FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>أمنت(AED)</FONT></td>
</tr>

<?php
$i=0;
			$sdm="select *from s_job_card where job_card_no='".$Fs['job_card_no']."'"; 
			$scm=mysqli_query($conn,$sdm);
			$dcm=mysqli_fetch_array($scm);
			
			
			$sdm1="select *from s_job_card_pdetails where job_card_no='".$dcm['id']."'"; 
			$scm1=mysqli_query($conn,$sdm1);
			while($dcm1=mysqli_fetch_array($scm1))
			{
$i++;
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $dcm1['package_type']; ?></td>
<td><?php echo $dcm1['package_amt'];?></td>
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
$pq="select * from s_job_card_sdetails where  job_card_no='".$Fs['JobcardId']."'";
$rs=mysqli_query($conn,$pq);
$n=mysqli_num_rows($rs);
if($n>0)
{
?>
<tr>
<td align="left"  height="10px"><b>سرفيس دتيلس :</b></td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>س:ن</FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>سرفيس نايم </FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>أمنت(AED)</FONT></td>
</tr>

<?php
$i=0;
			$sdm="select *from s_job_card where job_card_no='".$Fs['job_card_no']."'"; 
			$scm=mysqli_query($conn,$sdm);
			$dcm=mysqli_fetch_array($scm);
			
			
			$sdm1="select *from s_job_card_sdetails where job_card_no='".$dcm['id']."'"; 
			$scm1=mysqli_query($conn,$sdm1);
			while($dcm1=mysqli_fetch_array($scm1))
			{
		    $sdm2="select *from m_service_type where stype='".$dcm1['service_type']."'"; 
			$scm2=mysqli_query($conn,$sdm2);
			$dcm2=mysqli_fetch_array($scm2);
$i++;
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $dcm2['NonEnglish']; ?></td>
<td><?php echo $dcm1['st_amt'];?></td>
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
$pq="select * from s_outsources where  JobcardId='".$Fs['JobcardId']."'";
$rs=mysqli_query($conn,$pq);
$n=mysqli_num_rows($rs);
if($n>0)
{
?>
<tr>
<td align="left"  height="10px"><b>أتسرسس سرفيس دتيلس :</b></td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>س:ن</FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>سرفيس نايم</FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>أمنت(AED)</FONT></td>
</tr>

<?php
$i=0;

			$sdm1="select *from s_outsources_details where JobcardId='".$_REQUEST['JobcardId']."'"; 
			$scm1=mysqli_query($conn,$sdm1);
			while($dcm1=mysqli_fetch_array($scm1))
			{
				
			$sdm="select *from m_service_type where id='".$dcm1['Outsources']."'"; 
			$scm=mysqli_query($conn,$sdm);
			$dcm=mysqli_fetch_array($scm);
			
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
  $pq="select * from s_spare_prepick where JobcardId='".$Fs['JobcardId']."'";
$rs=mysqli_query($conn,$pq);
$n=mysqli_num_rows($rs);
if($n>0)
{
  ?>

<tr>
<td align="left"  height="10px"><b>سبرس دتيلس :</b></td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>س:ن</FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>صبري نايم </FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>رت </FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>تكس %</FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>مرب </FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>قونتتي </FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>أمنت(AED)</FONT></td>
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
<td><?php echo $rate; ?></td>
<td><?php echo $Cas['TaxRate'];?> %</td>
<td><?php echo number_format($Cas['mrp']); ?> </td>
<td><?php echo number_format($Cas['qty']);?></td>
<td><?php echo number_format($total,2);?></td>
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
$rs=mysqli_query($conn,$pq);
$n=mysqli_num_rows($rs);
if($n>0)
{
  ?>

<tr>
<td align="left"  height="50px"><b>أتسرسس دتيلس :</b></td>
</tr>
<tr>
<td>
<table align="left" width="350" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>س:ن</FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>أتسرسس </FONT></td>
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
$Egt1=mysqli_query($conn,$gt1);
$Fs1=mysqli_fetch_array($Egt1);
?>
<tr>
<td align="center" height="25px"><b>بيمنت دتيلس  :</b></td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td align="left" width="500" class="style4">حرقص يور انفوس !</td>
<td width="150"><b>سرفيس أمنت </td>
<td width="25"><b> :</b></td>
<td width="25" align="right"><b><?php echo number_format($Fs1['TotalServiceAmount'],2);?></b></td>
</tr>
<tr>
<td class="style4">ترمس اند كندتينس :</td>
				<?php 
				//number_format($number, 2, '.', '');
				$hdfj=$Fs1['ServiceAmountAfterGst']-$Fs1['TotalServiceAmount'];
					$adb=$hdfj/2;
				//$newgst=number_format((($TotalServiceAmount-$ServiceAmountAfterGst)/9), 2, '.', '');
				
				?>
<td><b>كجثة@9%</td>
<td width="25"><b> :</b></td>
<td width="25" align="right"><b><?php echo  number_format( $adb,2);?></b></td>
 </td>
</tr>
<tr>
<td class="style4"></td>
<td><b>سجست @9%</td>
<td width="25"><b> :</b></td>
<td width="25" align="right"><b><?php echo number_format( $adb,2);?></b></td>
</tr>
<tr>
<td class="style4">1.منفكتررس ورنتي </td>
<td><b>توتال سرفيس أمنت </b></td>
<td width="25"><b> :</b></td>
<td width="25" align="right"><b><?php echo number_format($Fs1['ServiceAmountAfterGst'],2);?></b></td>
</tr>
<tr>
<td class="style4">2.جودس أنس صلد ول نت بتكن بك </td>
<td><b>ديسكونت أمنت </b></td>
<td width="25"><b> :</b></td>
<td align="right"><b><?php echo number_format($Fs1['discount'],2); ?></b></td>
</tr>


<tr>
<td class="style4">3.ضسبتس إف أني سبجكت تو يوه </td>
<td><b>بيد أمنت </b></td>
<td width="25"><b> :</b></td>
<td align="right"><b><?php echo number_format($Fs1['paid_amt'],2); ?></b></td>
</tr>
<tr>
<td class="style4"> جرسدكشن ا & إو  </td>
<td><b>صبري أمنت </b></td>
<td width="25"><b> :</b></td>
<td align="right"><b><?php echo number_format($Fs1['SpareAmt'],2);?></b></td>
</tr>
<tr>
<td class="style4"></td>
<td><b>أتسرسس أمنت </b></td>
<td width="25"><b> :</b></td>
<td align="right"><b><?php echo number_format($Fs1['OutSourcesAmt'],2);?></b></td>
</tr>
<tr>
<td class="style4">و ابرقية يور برمبة بيمنت .</td>
<td><b>بيل أمنت </b></td>
<td width="25"><b> :</b></td>
<td align="right"><b><?php echo number_format($Fs1['Total_bill_Amount'],2);?></b></td>
</tr>
<tr>
<td><b></b>ثانكس فر بسنس !</td>
<td><b>رسفيد  </b></td>
<td width="25"><b> :</b></td>
<td align="right"><b><?php echo number_format($Fs1['rec_amt'],2);?></b></td>
</tr>
<tr>
<td><b><?PHP echo $Frp1['franchisee_name']; ?></b></td>
<td><b>بلنس أمنت </b></td>
<td width="25"><b> :</b></td>
<td align="right"><b><?php echo number_format($Fs1['bal_amt'],2);?></b></td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>

      <?php
						 
						$number = $Fs1['Total_bill_Amount'];
		 
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
<td width="350"><b>بيل أمنت إن وردس : </b><?php echo  $result . "Rupees  ";?><br/></td>
</tr>

</table>
<h4 align="right">فر فرصة غير   </h4><br/>
<h4 align="right">أوثرزد صجنتري </h4>
</td>

</tr>
</tbody>
</table>
</div>
<h4 align="center"><input type="button" name="print" value="برنت " onClick="printDiv('print-content')" />&nbsp;&nbsp;&nbsp;<a href="../../services/job_card/s_jobcard_view_close.php" class="button style2">كانسل </a></h4>
</body>
</html>
