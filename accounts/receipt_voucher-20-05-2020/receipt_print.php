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
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td align="left" width="400"><b><?PHP echo $Frp1['franchisee_name']; ?></b><br/><?PHP echo $Frp1['address']; ?><br/><?PHP echo "Mobile No. ".$Frp1['con_number']; ?><br/><?PHP echo "GST No: ".$Frp1['gst_no']; ?></td>
<td align="right" width="300"><b> <img src="<?php echo $_SESSION['path'];?>/iocss/logo3.png" alt="logo" style="width:auto;height:80px;background-color:#FFF"/> </td>
</tr>

</table>
</td>
</tr>
<?php

 $sij="select * from  s_job_card where id='".$_REQUEST['JobcardId']."'";
 $Esij=mysql_query($sij);
 $FEsij=mysql_fetch_array($Esij); 
 
 $rid=$_REQUEST['rid'];
 $sc="select * from cust_outstanding where id='$rid'";
 $Esc=mysqli_query($conn,$sc);
 $FEsc=mysqli_fetch_array($Esc);

 $cus="select * from a_customer where id='".$FEsc['cust_name']."'";
 $spm=mysql_query($cus);
 $epm=mysql_fetch_array($spm);

?>
<tr>
<td>
<table align="center" width="700" border="0" style="border-bottom:2px solid black;"  cellpadding="3"  cellspacing="0">
<tr>
<td align="left" width="350"><b>RECEIPT TO</b><br/><?PHP echo $epm['cust_name']; ?><br/><?PHP echo $epm['mobile1']; ?><br/></td>
<td align="center" width="175"><br/>RECEIPT NO <br/>DATE</td>
<td align="left" width="50"><br/>: <br/>:</td>
<td align="left" width="125"><br/><?php echo $FEsc['id']; ?><br/><?php echo date("d-m-Y", strtotime($FEsc['paid_date'])); ?></td>
</tr>

</table>
</td>
</tr>

<tr style="display:none">
<td align="left"><b>Vehicle Details :</b></td>
</tr>
<tr style="display:none">
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
  $pq="select * from s_job_card_pdetails where job_card_no='".$Fs['JobcardId']."'";
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
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>Package Name</FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>Amount</FONT></td>
</tr>

<?php
$i=0;
			$sdm="select *from s_job_card where job_card_no='".$Fs['job_card_no']."'"; 
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
<td><?php echo $dcm1['package_type']; ?></td>
<td><?php echo $dcm1['package_amt'];?></td>
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
$pq="select * from s_job_card_sdetails where  job_card_no='".$Fs['JobcardId']."'";
$rs=mysql_query($pq);
$n=mysql_num_rows($rs);
//if($n>0)
if(1==1)
{
?>
<tr>
<td align="left"  height="10px"><b>Receipt Details :</b></td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>S:no</FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>Particulars</FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>Paid</FONT></td>
</tr>

<?php
$i=0;						
			$sdm1="select * from cust_outstanding where id='$rid'"; 
			$scm1=mysqli_query($conn,$sdm1);
			while($dcm1=mysqli_fetch_array($scm1))
			{
$i++;
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo "Payment towards of Invoice No  ".$dcm1['invoice']; ?></td>
<td style="text-align:right"><?php echo number_format($dcm1['tran_amount'],2);?></td>
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
$pq="select * from s_job_card_recomdetails where  job_card_no='".$Fs['JobcardId']."'";
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
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>Service Name</FONT></td>
<td bgcolor="#757978"><FONT COLOR='FFFFFF'>Amount</FONT></td>
</tr>

<?php
$i=0;
			$sdm="select *from s_job_card where job_card_no='".$Fs['job_card_no']."'"; 
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
  $pq="select * from s_spare_prepick where JobcardId='".$Fs['JobcardId']."'";
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
<td style="text-align:right"><?php echo number_format($rate,2); ?></td>
<td style="text-align:right"><?php echo $Cas['TaxRate'];?> </td>

<td style="text-align:right"><?php echo number_format($Cas['qty']);?></td>
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

<tr style="display:none">
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td align="left" width="450" class="style4"></td>
<td width="150"><b>Service Amount : </td>

<td width="55px" align="right" colspan="2"><b><i class="fa fa fa-inr" aria-hidden="true"></i><?php echo number_format($Fs1['TotalServiceAmount'],2);?></b></td>
</tr>
<tr>
<td class="style4"></td>
<td><b>Discount % : </b></td>

<td width="55px" align="right" colspan="2"><b><?php echo number_format($Fs1['discount'],2); ?></b></td>
</tr>
<tr>
<td class="style4"></td>
<td><b>GST@18% : </td>

<td width="55px" align="right" colspan="2"><b>
<?php echo number_format($Fs1['gst'],2);?></td>
</tr>
<tr>
<td class="style4"></td>
<td><b>Total Amount : </b></td>

<?php
$tsa=($Fs1['TotalServiceAmount']-($Fs1['TotalServiceAmount']*($Fs1['discount']/100)));
$agst=$tsa+($tsa*($Fs1['gst']/100));

 ?>
<td width="55px" align="right" colspan="2"><b><i class="fa fa fa-inr" aria-hidden="true"></i><?php echo number_format($agst,2);?></b></td>
</tr>
<tr>
<td class="style4"></td>
<td><b>Paid Advance : </b></td>

<td width="55px" align="right" colspan="2"><b><i class="fa fa fa-inr" aria-hidden="true"></i><?php echo number_format($Fs1['paid_amt'],2); ?></b></td>
</tr>

<tr>
<td class="style4"></td>
<td><b>Balance Amount Rs.: </b></td>

<td width="55px" align="right" colspan="2"><b><i class="fa fa fa-inr" aria-hidden="true"></i><?php echo number_format(round($Fs1['Total_bill_Amount']),2);?></b></td>
</tr>


</table>
</td>
</tr>
<tr>
<td>
<table align="right" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>

      <?php
						// $number=$Fs1['paid_amt']+$Fs1['Total_bill_Amount'];
						$number = $FEsc['tran_amount'];
		 
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
<tr style="display:none"><td width="350" style="vertical-align: top;">
<div style="text-align:justify;font-size: 8px;">
<b>Invoice Terms & Conditions:</b></br>
Thank you for purchasing our services. We value your trust and assure you of the best services at all times. As our customer, when you are buying our product or service, you agree to our terms and conditions as below:<br/>
	
1.	This invoice is against the service selected on Service Order Form [or against product purchased from Aqura].</br>
2.	Product & Service prices are fixed and as per market standards and published at Aqura Cars & Services (ACS) service center and online platforms. Applicable taxes shall be additional to price. However, ACS reserves the right to change the prices at any point of time.</br>
3.	Upon payment and availing this invoice; it is the responsibility of the client to collect the vehicle after service [or collect the purchased product].</br>
4.	Customer shall be fully responsible for belongings inside the vehicle and ACS staff or management shall not be liable for any loss. Customers are requested to wait for their turn if the wash or cleaning bays are full. Customers are not allowed to enter the work area for safety.</br>
5.	Vehicle not availed within 2 days after service shall be handed over to Police Department under Kollam Jurisdiction.</br>
6.	ACS will not be responsible for scratches already on the vehicle, and those caused while customer drives in/out. ACS shall not be liable for any mechanical & electrical problems during or after wash; or after any other service availed by customer at the A C S.</br>
7.	ACS reserves the right to offer [or withdraw] special or seasonal promotions and discounts on its products or services to customers from time to time.</br>
8.	ACS welcomes clients to enlist for AQURAMILES Loyalty Scheme to avail long term benefits. If you are already a member, the value of this invoice entitles points being added on your Aqura Customer Number.</br>
9.	ACS is governed with the laws of the Applicable Acts under the Indian Union. ACS will carry out its business in good faith and complete transparency. ACS reserves the right to refuse any order from customers that it cannot fulfill within the legal and regulatory permissions obtained to operate.</br>
10.	Any dispute that may arise upon invoice; or value on invoice; shall be dealt with cordially; in order to settle peacefully. However, any legal matters shall be dealt within courts under Kollam Jurisdiction.</br>
11.	All information provided to ACS by the customer shall be kept confidential excepting only such information as is already generally known to the public. ACS shall not release, use or disclose it except for communicating information with customer or if required by law or an order from court.</br>

</div>
</td>
<td width="350">
<div style="text-align:justify;font-size: 5px;">
<b>നിബന്ധനകളും വ്യവസ്ഥകളും :</b></br>
ഞങ്ങളുടെ സേവനം സ്വീകരിച്ചതിന് നന്ദി.  നിങ്ങളുടെ വിശ്വാസത്തെ ഞങ്ങൾ വിലമതിക്കുന്നു,ഒപ്പം എപ്പോഴും നിങ്ങൾക്ക് മികച്ച സേവനം ലഭ്യമാക്കുമെന്ന് ഉറപ്പ് തരുകയും ചെയ്യുന്നു. ഒരു ഉപഭോക്താവെന്ന നിലയിൽ നിങ്ങൾ ഞങ്ങളുടെ ഉത്പ്പന്നമോ സേവനങ്ങളോ വാങ്ങുമ്പോൾ നിങ്ങൾ താഴെ പറയുന്ന നിമയങ്ങളും വ്യവസ്ഥകളും അംഗീകരിക്കുകയാണ്. 
</br>	
1.	ഇത്,സർവ്വീസ് ഓർഡർ ഫോമിൽ നിങ്ങൾ തെരഞ്ഞെടുത്തസേവനത്തിനുള്ള ( അല്ലെങ്കിൽ അക്യൂറയിൽ നിന്ന് നിങ്ങൾ വാങ്ങുന്ന ഉത്പ്പന്നത്തിനുള്ള) ഇൻവോയ്സ് ആണ്. </br>
2.	ഉത്പ്പന്നങ്ങളുടേയും സേവനങ്ങളുടേയും  വില മാർക്കറ്റ് മാനദണ്ഡങ്ങൾക്ക് അനുസരിച്ച് നിശ്ചയിച്ചിട്ടുള്ളതും അക്യൂറ കാർസ് ആൻഡ് സർവ്വീസസിലും (ACS)  ഓൺലൈൻ പ്ലാറ്റ് ഫോമുകളിലും പ്രസിദ്ധീകരിച്ചിട്ടുള്ളതുമായിരിക്കും . വിലയ്ക് പുറമേ നികുതികളും ബാധകമായിരിക്കും. വില ഏത് സമയത്തും മാറ്റാനുള്ള അധികാരം എ സി എസ്സിൽ നിക്ഷിപ്തമായിരിക്കും. </br>
3.	പേയ്മെന്റിന് ശേഷം ഇൻവോയ്സ് ലഭിച്ചുകഴിഞ്ഞാൽ,  സർവ്വീസ് പൂർത്തിയാക്കിയ വാഹനം ഏറ്റുവാങ്ങേണ്ട ഉത്തരവാദിത്വം ഉപഭോക്താവിന് ആയിരിക്കും. (വാങ്ങിയത് ഉത്പ്പന്നമാണെങ്കിൽ അത് കളക്ട് ചെയ്യേണ്ടത്)</br>
4.	വാഹനത്തിനുള്ളിലുള്ള വസ്തുക്കളുടെ പൂർണ്ണമായ ഉത്തരവാദിത്വം ഉപഭോക്താവിന് ആയിരിക്കും. ഏതെങ്കിലും തരത്തിലുള്ള നഷ്ടത്തിന് എ സി എസ് സ്റ്റാഫോ മാനേജ്മെന്റോ ഉത്തരവാദികളായിരിക്കില്ല. വാഷ് അല്ലെങ്കിൽ ക്ലീനിങ്ങ് ബേകൾ നിറഞ്ഞിരിക്കുകയാണെങ്കിൽ ഉപഭോക്താവ് തന്റെ ഊഴമെത്തുന്നത് വരെ കാത്തിരിക്കേണ്ടതാണ്. സുരക്ഷയെ മുൻനിർത്തി ഉപഭോക്താക്കൾ വർക്ക് ഏരിയയിലേക്ക് പ്രവേശിക്കാൻ പാടുള്ളതല്ല.</br>
5.	സർവ്വീസ് നടത്തി രണ്ട് ദിവസത്തിന് ശേഷവും ഏറ്റെടുക്കാത്ത വാഹനങ്ങൾ കൊല്ലം നിയമപരിധിയ്ക്ക് അകത്തുള്ള പൊലീസ് ഡിപ്പാർട്ട്മെന്റിന് കൈമാറുന്നതാണ്.<br/>
6.	വാഹനത്തിൽ നിലവിലുള്ളതോ അല്ലെങ്കിൽ ഉപഭോക്താവ് അകത്തേക്ക് വരുമ്പോഴോ പുറത്തേക്ക് പോകുമ്പോഴോ ഉണ്ടാകുന്ന സ്ക്രാച്ചുകൾക്ക് എ സി എസ്സ് ഉത്തരവാദികളായിരിക്കില്ല. വാഷ് ചെയ്യുമ്പോഴോ അതിന് ശേഷമോ ഉണ്ടാകുന്ന മെക്കാനിക്കൽ അല്ലെങ്കിൽ ഇലക്ട്രിക്കൽ സംബന്ധമായ പ്രശ്നങ്ങൾക്ക് എ സി എസ്സ് ഉത്തരവാദികളായിരിക്കില്ല. </br>
7.	ഉത്പ്പന്നങ്ങൾക്കും സേവനങ്ങൾക്കും കാലാകാലങ്ങളിൽ സ്പെഷ്യൽ അല്ലെങ്കിൽ സീസണൽ പ്രമോഷനുകൾ നൽകാൻ (അല്ലെങ്കിൽ പിൻവലിക്കാൻ) ഉള്ള അധികാരം എ സി എസ്സിൽ നിക്ഷിപ്തമായിരിക്കും. </br>
8.	ദീർഘകാല ഗുണങ്ങൾക്കായി അക്യൂറ മൈൽസ് ലോയൽറ്റി സ്കീമിൽ ചോരാനായി എ സി എസ്സ് ഉപഭോക്താക്കളെ ക്ഷണിക്കുകയാണ്. നിങ്ങൾ മുൻപേ തന്നെ ഒരു അംഗമാണെങ്കിൽ ഈ ഇൻവോയ്സിലെ തുക അനുസരിച്ചുള്ള പോയന്റ് നിങ്ങളുടെ അക്യൂറ കസ്റ്റമർ നമ്പരിലേക്ക് കൂട്ടിച്ചേർക്കുന്നതാണ്.</br>
9.	ഇന്ത്യൻ യൂണിയന് ബാധകമായ നിയമങ്ങൾക്ക് അനുസരിച്ച് പ്രവർത്തിക്കുന്ന സ്ഥാപനമാണ് എ സി എസ്സ്. മികച്ച വിശ്വാസത്തോടും സമ്പൂർണ്ണമായ സുതാര്യതയോടും കൂടിയാണ് എ സി എസ്സ് ബിസിനസ് നടത്തുന്നത്. നിയമപരമോ നിയന്ത്രണങ്ങൾ പാലിക്കാത്തതോ ആയ രീതിയിൽ പ്രവർത്തിക്കാനാവശ്യപ്പെടുന്ന ഉപഭോക്താക്കളുടെ ഓർഡർ റദ്ദാക്കാനുള്ള അവകാശം എ സി എസ്സിനുണ്ടായിരിക്കും.</br>
10.	ഇൻവോയ്സിന് മേലുണ്ടാകുന്ന അല്ലെങ്കിൽ ഇൻവോയ്സിലെ തുക സംബന്ധിച്ച് ഉണ്ടാകുന്ന  എല്ലാ തർക്കങ്ങളും സാധാനപരമായി പരസ്പരം ചർച്ച ചെയ്ത് പരിഹരിക്കേണ്ടതാണ്. എന്നിരുന്നാലും ഏതെങ്കിലും വിധത്തിലുള്ള നിയമപരമായ പ്രശ്നങ്ങളുണ്ടാകുന്ന പക്ഷം അത് കൊല്ലം നിയമപരിധിയിലെ കോടതികളിലായിരിക്കും കൈകാര്യം ചെയ്യുക. </br>
11.	ഉപഭോക്താവ്  എ സി എസ്സിലേക്ക് നൽകുന്ന എല്ലാ വിവരങ്ങളും രഹസ്യമായി സൂക്ഷിക്കുന്നതാണ്, എന്നാൽ നിയമം ആവശ്യപ്പെടുമ്പോഴോ അല്ലെങ്കിൽ എ സി എസ്സിന് ഉപഭോക്താവിനോട് സംവദിക്കാനോ അല്ലാതെ, എ സി എസ്സ് ഉപഭോക്താവിന്റെ വിവരങ്ങൾ കൈമാറുകയോ പുറത്ത് വിടുകയോ ചെയ്യുന്നതല്ല.</br>
</div>
</td>
</tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr><tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td colspan="2"><div style="text-align:right;"><?PHP echo $Frp1['website']; ?> | <?PHP echo $Frp1['email']; ?> </div></td></tr>
</table>
</td>
</tr>
</tbody>
</table>
</div>

<h4 align="center"><input type="button" name="print" value="print" onClick="printDiv('print-content')" />&nbsp;&nbsp;&nbsp;<a href="../../services/job_card/s_jobcard_view_close.php" class="button style2">Close</a></h4>
</body>
</html>
