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

  $name="select * from a_customer where cust_name='".$Fs['cname']."'";  
$name1=mysqli_query($conn,$name);
$name2=mysqli_fetch_array($name1);


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
<!--

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
<table align="center" width="768" border="1"   cellpadding="3"  cellspacing="0">
<thead>
 <tr height="30px">
    
    <td align="center" colspan="16"><strong>TAX INVOICE</strong></td>
  </tr>
<tr>
<th align="center" colspan="14" ><span style="font-size:23px"><B><?php echo  $Fpr1['cus_name'];?></B></span><BR/>
 <B><?php echo  $Fpr1['a_addrs'];?></B><br /><B>Contact No : <?php echo  $Fpr1['mobile1'];?>,<?php echo  $Fpr1['mobile1'];?></B><br /><B>Email : <?php echo  $Fpr1['email'];?></B><br /><B>Website : <?php echo  $Fpr1['website'];?></B><br /></th>
</thead>
<tbody>
<tr>
<td  boalign="LEFT" colspan="5" ><span style="font-size:18px">Customer Name  : <B><?PHP echo $name2['cust_name']; ?></B></span><BR/>
  Mobile No: <B><?PHP echo $name2['mobile1']; ?></B><BR/>
  Address : <B><?PHP echo $name2['addr']; ?></B><BR/>
  Payment Mode: <B><?PHP echo $Fs['ptype']; ?></B></td>
<td  boalign="LEFT" colspan="11" ><span style="font-size:18px">Date : <b><?PHP echo $Fs['bill_date']; ?></b></span><br/>
  Invoice No: <b><?PHP echo $Fs['inv_no']; ?></b><br/>
  Job Card No: <b><?PHP echo $Fs['job_card_no']; ?></b><br/></td>
</tr>
<?php 
$na="select * from a_customer_vehicle_details where cust_name='".$Fs['cname']."'";  
$nam=mysqli_query($conn,$na);
$vehile=mysqli_fetch_array($nam);


?>

<tr height="50px">
   <td colspan="4"><b>Vehicle No : </b><?PHP echo $vehile['vehicle_no']; ?></td>
   <td width="187" colspan="2"><b>Make : </b><?PHP echo $vehile['vehicle_name']; ?></td>
<td colspan="3"><b>	Model :</b> <?PHP echo $vehile['vehicle_make']; ?></td>
  </tr>
  <tr height="15px">
    
    <td align="center" colspan="16"><strong>VEHICLE SERVICE DETAILS </strong></td>
  </tr>
  
<tr align="center">
<td width="58"><b>S:No</b></td>
<td colspan="4"><b>Service Name</b></td>
<td width="25" colspan="1"><b>Qty</b></td>
<td colspan="1"><b>Price</b></td>
<td width="94" colspan="2"><b>Amount</b></td>
</tr>



<?php
$tr=0;
$qt=0;
$dt=0;
$trs=0;
$gt1="select * from a_final_bill_details where inv_no='".$_REQUEST['inv_no']."'";
$Egt1=mysqli_query($conn,$gt1);
while($Fs1=mysqli_fetch_array($Egt1))
{
$i++;
?>
<?php 
$amount=$Fs1['qty']*$Fs1['amount'];
?>
<tr>
<td width="58" align="center"><?php echo $i; ?></td>
<td colspan="4"><?php echo $Fs1['service']; ?></td>
<td width="25" colspan="1" align="center"><?php echo $Fs1['qty'];?></td>
<td colspan="1" align="center"><?php echo $Fs1['amount'];?></td>
<td width="94" colspan="2" align="center"><?php echo $amount;?>.00</td>
</tr>
<?php
$fbsd="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."'";
$fbs=mysqli_query($conn,$fbsd);
while($fbd=mysqli_fetch_array($fbs))
{
?>
<tr>
<td width="58" align="center"></td>
<td colspan="4">Spare Name : <?php echo $fbd['sname']; ?></td>
<td width="25" colspan="1" align="center"><?php echo $fbd['sqty'];?></td>
<td colspan="1" align="center"> <?php echo $fbd['smrp'];?></td>
<td width="94" colspan="2" align="center"><?php echo $fbd['stotal'];?>.00</td>
</tr>
<?php 

$total_qty = $total_qty+$Fs1['qty'];
$stot=$stot+$fbd['stotal'];
}
$total_amount = $total_amount+$amount+$stot;
   ?>
</tbody>

<?php
$tr=$tr+$tot_rate;
$qt=$qt+$Fs1['qty'];
$trs=$trs+$tot_rate1;
$dt=0;
}
?>
<tr>

<td colspan="7" align="right"> <b>Sub Total:</b></td>

<td width="94"  align="center"><b><?php echo $total_amount ?>.00</b></td>
</tr>
<?php
$transport=$Fs['pack_charge']+$Fs['ship_charge'];

$gst_amt= $Fs['cgst_amt']+$Fs['sgst_amt'];



 ?>
<tr>
<td colspan="7" align="right"><b>Discount :</b></td>
<td width="94" align="center"><b><?php echo $Fs['discount'] ?>.00</b></td>
</tr>
<?php 
$dis_amt=$total_amount-$Fs['discount'];
?>
<tr>
<td colspan="7" align="right"><b>Discounted Ampunt :</b></td>
<td width="94" align="center"><b><?php echo $dis_amt; ?>.00</b></td>
</tr>
<tr>
<td colspan="7" align="right"><b>Labour Charge</b></td>
<td width="94" align="center"><b><?php echo $Fs['lab_crge'] ?>.00</b></td>
</tr>
<tr>
<td colspan="7" align="right"><b>Grand Total</b></td>
<td width="94" align="center"><b><?php echo $Fs['bill_amt'] ?>.00</b></td>
</tr>
<tr>
<td colspan="7" align="right"><b>Amount received</b></td>
<td width="94" align="center"><b><?php echo $Fs['rec_amt'] ?>.00</b></td>
</tr>

<tr>
<td colspan="7" align="right"><b>Balance</b></td>
<td width="94" align="center"><b><?php echo $Fs['bal_amt'] ?>.00</b></td>
</tr>




<?php
$net_amount=$total_amount+$transport+$gst_amt+$Fs['igst_amt'];
$grand=$Fs['bal_amt'];

 ?>



<tr>
<td colspan="14" align="left">Amount Charageble (in Word)<br /><b><?php
  /**
   * Created by PhpStorm.
   * User: sakthikarthi
   * Date: 9/22/14
   * Time: 11:26 AM
   * Converting Currency Numbers to words currency format
   */
$number = $grand;
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
        $hundred = ($counter == 1 && $str[0]) ? 'And ' : null;
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
  echo $result . "Rupees  " ;
 ?></b></td>
</tr>
<?php 
 $ss1="select * from t_sales_invoice_details where finvoice_no='".$_REQUEST['finvoice_no']."'";
$ss2=mysqli_query($conn,$ss1);
while($ss3=mysqli_fetch_array($ss2))
{


 $it1="select * from t_item where itemname='".$ss3['item_name']."'"; 
$Eit1=mysqli_query($conn,$it1);
$Fit1=mysqli_fetch_array($Eit1);
}

?>
<?php 
$total_gst=$Fs['cgst']+$Fs['igst']+$Fs['sgst'];
?>
<?php

$bn="select * from company where comp_name='".$_SESSION['company']."'";
$Ebn=mysqli_query($conn,$bn);
$Fbn=mysqli_fetch_array($Ebn);

?>
<tr>

<td colspan="5" align="left"><B>For<?php echo $_SESSION['company'] ?><BR/><BR />
    <BR/>
    Signature</B></td>
<td colspan="7" align="right"><B>	Customer Signature<BR/><BR />
    <BR/>
</B></td>
</tr>
<tr height="30px">
    
    <td align="center" colspan="16"><strong>Thank You For Your Business</strong></td>
  </tr>
</table>
</div>
<h4 align="center"><input type="button" name="print" value="print" onClick="printDiv('print-content')" />&nbsp;&nbsp;&nbsp;<a href="f_bill.php" class="button style2">cancel</a></h4>
</body>
</html>
