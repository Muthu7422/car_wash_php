<?php
include("../../dbinfoi.php");
session_start();

error_reporting(0);

$date=date('d/m/Y');
 $s="select * from sales_invoice where inv_no='".$_REQUEST['inv_no']."'"; 
$Es=mysqli_query($conn,$s);
$Fs=mysqli_fetch_array($Es);
$n=mysqli_num_rows($Es);
$ino=$n;
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
<table align="center" width="746" border="1"   cellpadding="3"  cellspacing="0">
<thead>
 <tr height="30px">
  <td align="center" colspan="6"><strong>TAX INVOICE</strong></td>
    <td height="55" colspan="10"><span class="style4"><span class="style4" style="padding-left:30px"> <span class="logo-lg"><img src="<?php echo $_SESSION['path'];?>/iocss/adlogo.png" alt="logo" width="327" height="38" style="width: 170px;height:30px;left: 15px;"/></span></span>
						
					
    </span></td>
  </tr>
<tr>
<?php
$dcp="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'";
$epp=mysqli_query($conn,$dcp);
$rpm=mysqli_fetch_array($epp);

?>
<th align="center" colspan="14" ><?php echo $rpm['franchisee_name'] ?> <br />
 <?php echo $rpm['address'] ?><br />
  Mail : care@autodeilerz.com.com<br />
  Website : autodeilerz.com<br/>
  Ph : 7338310007,22585527</th>
</thead>
<tbody>
<tr>
<td  boalign="LEFT" colspan="16" ><b> INVOICE NO <span style="padding-left:50px">: </span></b><?PHP echo $Fs['inv_no']; ?>  <BR /> <b>INVOICE DATE <span style="padding-left:30px">:  </span></b><?PHP echo $Fs['sdate'];?>  </br></td>
</tr>
<tr >
<td  boalign="LEFT" bgcolor="#E4E7E8" colspan="16" ><b>Bill to<b></td>
</tr>
<?php 
$rpm="select * from a_customer where id='".$Fs['cname']."'";
$eep=mysqli_query($conn,$rpm);
$pos=mysqli_fetch_array($eep);


?>
<tr>
<td  boalign="LEFT" colspan="16" >TO, M/S<BR/><span style="font-size:18px"><B><?PHP echo $pos['cust_name']; ?></B></span><BR/><?PHP echo $pos['addr']; ?><BR/><?PHP echo $pos['mobile1']; ?>,<?PHP echo $pos['mobile2']; ?><br /> Gmail : <?PHP echo $pos['email'];?></td>
</tr>

<tr align="center">
<td width="76" colspan="1"><b>S:No</b></td>
<td colspan="3"><b>Spare Brand </b></td>
<td colspan="4"><b>Spare Name </b></td>
<td width="58" colspan="1"><b>Qty</b></td>
<td colspan="3"><b>Rate</b></td>
<td width="82" colspan="2"><b>Amount</b></td>
</tr>



<?php
$tr=0;
$qt=0;
$dt=0;
$trs=0;
$gt1="select * from sales_invoice_details where inv_no='".$_REQUEST['inv_no']."'";
$Egt1=mysqli_query($conn,$gt1);
while($Fs1=mysqli_fetch_array($Egt1))
{
$i++;

$it="select * from m_spare_brand where sid='".$Fs1['spard_brand']."'";
$Eit=mysqli_query($conn,$it);
$Fit=mysqli_fetch_array($Eit);
$itt="select * from m_spare where sid='".$Fs1['spare_name']."'";
$Eitt=mysqli_query($conn,$itt);
$Fitt=mysqli_fetch_array($Eitt);
?>
<tr >
<td align="center" width="76" colspan="1"><?php echo $i; ?></td>
<td colspan="3"><?php echo $Fit['sbrand']; ?></td>
<td colspan="4"><?php echo $Fitt['sname']; ?></td>
<td align="center" width="58" colspan="1"><?php echo $Fs1['qty']; ?></td>
<td align="center" colspan="3"><?php echo  $Fs1['mrp']; ?></td>
<td width="82" colspan="2"><?php echo $Fs1['total']; ?></td>
</tr>

</tbody>

<?php

$total=$total+$Fs1['total'];



?>





<?php

}


$rpm1="select * from sales_invoice where inv_no='".$_REQUEST['inv_no']."'";
$eep1=mysqli_query($conn,$rpm1);
$pos1=mysqli_fetch_array($eep1);
?>




<tr height="30px">
<td colspan="13"></td>
</tr>


<tr  height="35px">
<td colspan="10"><span style="padding-left:430px">Total : </span></td>
<td colspan="4" align="center"><b><?php echo $total ?>.00</b></td>
</tr>
<tr  height="35px">
<td colspan="10"><span style="padding-left:350px">Discount Amount : </span></td>
<td colspan="4" align="center"><b><?php echo $pos1['dicount_amt']; ?></b></td>
</tr>

<?php 
if($pos1['igst']!='0')
{
?>
<tr  height="35px">
<td colspan="10"><span style="padding-left:410px">IGST</span></td>
<td colspan="4" align="center"><b><?php echo $pos1['igst'] ?> %</b></td>
</tr>
<?php
}
else
{
?>
<tr  height="35px">
<td colspan="10" align="center"><span style="padding-left:410px">SGST : </span></td>
<td colspan="4" align="center"><b><?php echo $pos1['sgst'] ?> %</b></td>
</tr>
<tr  height="35px">
<td colspan="10" align="center"><span style="padding-left:410px">CGST : </span></td>
<td colspan="4" align="center"><b><?php echo $pos1['cgst'] ?> %</b></td>
</tr>

<?php
}
?>
</tr>
<tr  height="35px">
<td colspan="10" align="center"><span style="padding-left:360px">GST Amount :</span></td>
<td colspan="4" align="center"><b><?php echo $pos1['gst_amt'] ?></b></td>
</tr>
</tr>
<tr  height="35px">
<td colspan="10" align="center"><span style="padding-left:365px">Bill Amount :</span></td>
<td colspan="4" align="center"><b><?php echo round($pos1['bill_amt'], 0) ?>.00</b></td>
</tr>


<?php 
$total_gst=$Fs['cgst']+$Fs['igst']+$Fs['sgst'];
?>


<?php

$bn="select * from company where comp_name='".$_SESSION['company']."'";
$Ebn=mysqli_query($conn,$bn);
$Fbn=mysqli_fetch_array($Ebn);

?>


<tr>

<td align="LEFT" colspan="8" >Here's your invoice!<br/>Terms and conditions:<br />1.Manufacturers Gurantee<br/>2.Goods once sold will not be taken back<br/>3.Disputes if any subject to Bangalore Jurisdiction E & EO</td>

<td align="left" colspan="5"> Tax Amount In Words <B>: <?php
  /**
   * Created by PhpStorm.
   * User: sakthikarthi
   * Date: 9/22/14
   * Time: 11:26 AM
   * Converting Currency Numbers to words currency format
   */
$number = round($pos1['bill_amt'], 0);
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
 ?></B></td>
</tr>

<tr>
<td height="90" colspan="8"><B>We appreciate your prompt payment.<br/>
Thanks for your business!<br/>
AUTO DETAILERZ</B></td>
<td colspan="5" align="right"><B>For<?php echo $_SESSION['company'] ?><BR/><BR />
    <BR/>Authorised Signatory</B></td>
</tr>
</table>
</div>
<h4 align="center"><input type="button" name="print" value="print" onClick="printDiv('print-content')" />&nbsp;&nbsp;&nbsp;<a href="sales_report_payment_mode.php" class="button style2">cancel</a></h4>
</body>
</html>
