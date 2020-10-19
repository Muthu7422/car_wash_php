<?php
include("../../dbinfoi.php");
session_start();

error_reporting(0);

$date=date('d/m/Y');
 $s="select * from h_offer_letter where ecode='".$_REQUEST['ecode']."'"; 
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
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<table align="center" width="626" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td><?php echo date('d/m/Y'); ?></td>
</tr>
<tr>
<td><span>Offer Id</span> <b><span style="margin-left:10px"><?php echo $Fs['ecode']?></b></span></td>
</tr>
</table>
<br/><br/><br/>
<table align="center" width="626" border="0"   cellpadding="3"  cellspacing="0">
<tr style='height:20px'>
<td> <b><span style="margin-left:10px"><?php echo $Fs['ename']?></b></span></td>
</tr>
<tr style='height:10px'>
<td> <span style="margin-left:10px"><?php echo $Fs['address']?></span></td>
</tr>
<tr style='height:20px'>
<td><span style="margin-left:10px"><?php echo $Fs['emobile']?></span></td>
</tr>
<tr style='height:20px'>
<td><span style="margin-left:10px"><?php echo $Fs['email']?></span></td>
</tr>
<tr style='height:80px'>
<td><span style='margin-left:10px'>Dear</span><span style="margin-left:10px"><b><?php echo $Fs['ename']?></b></span></td>
</tr>
<?php
$too="select * from h_designation where id='".$Fs['edesignation']."'";
$hun=mysqli_query($conn,$too);
$trp=mysqli_fetch_array($hun);

$too1="select * from h_department where id='".$Fs['edepart']."'";
$hun1=mysqli_query($conn,$too1);
$trp1=mysqli_fetch_array($hun1);
?>
<tr>
<td><span style='margin-left:10px'>On Behalf of Vertex Solutions Pvt Ltd., I am very pleased to offer you a position of <b><?php echo $trp1['dname'] ?></b> <br/><span style='margin-left:10px'></span>in our organization. Your joining date will be Oct 30,2017.</span></td>
</tr>
<?php
$dcp="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'";
$epp=mysqli_query($conn,$dcp);
$rpm=mysqli_fetch_array($epp);

?>
<tr style='height:40px'>
<td><span style='margin-left:10px'>You will be working for <b><?php echo $rpm['franchisee_name'] ?>,.</b></span></td>
</tr>
<tr style='height:40px'>
<td><span style='margin-left:10px'>On the first day of the employment, please start working at 9 AM. Work timings <br/> <span style='margin-left:10px'></span>will be 9 AM - 6 PM and it will be altered based on the project requirement.</span></td>
</tr>

<tr style='height:40px'>
<td><span style='margin-left:10px'>Your salary will be Rs. <b><?php echo $Fs['perannulsalary']?></b> / Annum .The probation period will be <b>3 months.</b> Salary <br/> <span style='margin-left:10px'></span> will be reviewed after <b>12 months</b> based on the performance.Please indicate your acceptance <br/> <span style='margin-left:10px'></span> to the employment agreement by signing and returning it within seven days from the date <br/> <span style='margin-left:10px'></span> of this letter to the following address. Please retain the second copy for your records.</span></td>
</tr>
<tr style='height:40px'>
<td><span style='margin-left:10px;font-size:18px'>autodeilerz.com,</span></td>
</tr>
<tr style='height:40px'>
<td><span style='margin-left:10px;font-size:15px'><?php echo $rpm['address'] ?></span></td>
</tr>
<tr style='height:40px'>
<td><span style='margin-left:10px;font-size:15px'>I look forward to welcoming you in our organization.</b></span></td>
</tr>
<tr style='height:40px'>
<td><span style='margin-left:10px;font-size:15px'>Should you need any further clarifications, Please feel free to contact me</span></td>
</tr>
<tr style='height:40px'>
<td><span style='margin-left:10px;font-size:15px'>Sincerely,</span></td>
</tr>
</table>
<table align="center" width="626" border="0"   cellpadding="3"  cellspacing="0">
<tr style='height:60px'>
<td><span style='margin-left:10px;font-size:15px'>Managing Director,<br/><span style='margin-left:10px'></span><?php echo $rpm['email']; ?><br/><span style='margin-left:10px'></span><?php echo $rpm['con_number']; ?></span></td>
</tr>
</table>

</div>
<h4 align="center"><input type="button" name="print" value="print" onClick="printDiv('print-content')" />&nbsp;&nbsp;&nbsp;<a href="o_offerletter.php" class="button style2">cancel</a></h4>
</body>
</html>
