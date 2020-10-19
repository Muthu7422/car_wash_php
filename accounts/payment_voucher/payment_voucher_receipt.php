<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

$date=date('d/m/Y');
 $s="select * from payment_voucher where v_id='".$_REQUEST['v_id']."'"; 
$Es=mysqli_query($conn,$s);
$Fs=mysqli_fetch_array($Es);


 $spm="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'";;
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
<td align="left" width="350"><b><?PHP echo $Frp1['franchisee_name']; ?></b><br/><?PHP echo $Frp1['address']; ?><br/><?PHP echo $Frp1['con_number']; ?><br/><?PHP echo $Frp1['website']; ?><br/><?PHP echo $Frp1['email']; ?> </td>
<td align="right"><img src="<?php echo $_SESSION['path'];?>/iocss/logo1.png" alt="logo" style="width:auto;height:80px;background-color:#FFF"/></td>
</tr>

</table>
</td>
</tr>
<?php
$cus="select * from a_customer where cust_name='".$Fs['cname']."'";
$spm=mysqli_query($conn,$cus);
$epm=mysqli_fetch_array($spm);
?>
<tr>
<td>
<table align="center" width="700" border="0" style="border-bottom:2px solid black;"  cellpadding="3"  cellspacing="0">
<tr>
<td></td><td align="center" width="175">Voucher Id<br/>DATE</td>
<td align="left" width="50">: <br/>:</td>
<td align="left" width="125"><?php echo $Fs['v_id']; ?><br/><?php echo date("d-m-Y", strtotime($Fs['v_date'])); ?></td>
</tr>

</table>
</td>
</tr>

<tr>
<td>
<table align="center" width="700" border="1"   cellpadding="3"  cellspacing="0">
<tr>
<td align="center" bgcolor="#757978"><FONT COLOR='FFFFFF'>S.No</FONT></td>
<td align="center" bgcolor="#757978"><FONT COLOR='FFFFFF'>Supplier Name</FONT></td>
<td align="center" bgcolor="#757978"><FONT COLOR='FFFFFF'>Date</FONT></td>
<td align="center" bgcolor="#757978"><FONT COLOR='FFFFFF'>Amount</FONT></td>

</tr>

<?php
$i=0;

 $s="select * from payment_voucher where v_id='".$_REQUEST['v_id']."'"; 
$Es=mysqli_query($conn,$s);
 while($Fs=mysqli_fetch_array($Es))
{
 $s1="select * from m_ledger where Id='".$Fs['cust_name']."'"; 
$Es1=mysqli_query($conn,$s1);
$Fs1=mysqli_fetch_array($Es1);
			
$i++;        
?>
<tr >
<td><?php echo $i; ?></td>
<td align="center"><?php echo $Fs1['LedgerName']; ?></td>
<td align="center"><?php echo $Fs['v_date']; ?></td>
<td align="center"><?php echo $Fs['amount']; ?></td>
</tr>

<?php 

}

						$i=3-$n;
						for($k=0;$k<=$i;$k++)
						{
?>
     <tr>
	  

        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
		<td align="center">&nbsp;</td>
		<td align="center">&nbsp;</td>

       
      </tr>
	 <?php } ?>
					
</table>
</td>
</tr>

<?php
 $btr="select * from payment_voucher where v_id='".$_REQUEST['v_id']."'"; 
$abtr=mysqli_query($conn,$btr);
$abtr1=mysqli_fetch_array($abtr);
?>
<tr>
<td align="center" height="25px"><b>Payment Details :</b></td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td align="left" width="500" class="style4" hidden>Here's your Quotation!</td>

</tr>

<tr>

</tr>
<tr>
<td class="style4 "></td>
<td><b>Total Amount</b></td>
<td width="25"><b> :</b></td>

<td><b><?php echo $abtr1['amount']; ?></b></td>
</tr>



<td class="style4" >1. Manufacturers Guarantee</td>
<td> </td>
<td width="25"><b> </b></td>
<td><b></b></td>
</tr>

<tr>
<td class="style4" >2. Goods once sold will not be taken back</td>
<td bgcolor=""><b></b></td>
<td width="25" bgcolor=""><b> </b></td>
<td bgcolor=""><b></b></td>
</tr>

<tr>
<td class="style4"> </td>
<td><b></b></td>
<td width="25"><b> </b></td>
<td><b></b></td>
</tr>
<tr >
<td class="style4"> </td>
<td><b> </b></td>
<td width="25"><b></b> </td>
<td><b></b></td>
</tr>
<tr>
  <?php
						 
						$number = $abtr1['amount'];
		 
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
   $result . "SAR ";
  
  
 ?>

<td colspan="5" align="right"><b>Amount in words : <?php echo  $result;?></b><br/></td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<table align="center" width="700" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td width="350" class="style4" >We appreciate your prompt payment.<br/>Thanks for your business!<br/><b><?PHP echo $Frp1['franchisee_name']; ?></b></td>
    
</tr>

</table>
</td>
</tr>
</tbody>
</table>
</div>
<h4 align="center"><input type="button" name="print" value="print" onClick="printDiv('print-content')" />&nbsp;&nbsp;&nbsp;<a href="payment_voucher_view.php" class="button style2">Close</a></h4>
</body>
</html>
