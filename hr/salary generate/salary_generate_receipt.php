<?php
include("../../dbinfoi.php");
session_start();

error_reporting(0);

$date=date('d/m/Y');
 $s="select * from h_payroll_calculation where e_code='".$_REQUEST['e_code']."' and id='".$_REQUEST['id']."'"; 
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
<table align="center" width="626" border="1"   cellpadding="3"  cellspacing="0">
<thead>

<tr>
<?php
$dcp="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'";
$epp=mysqli_query($conn,$dcp);
$rpm=mysqli_fetch_array($epp);

?>
<th align="center" colspan="9" ><?php echo $rpm['franchisee_name'] ?> <br />
 <?php echo $rpm['address'] ?><br />
  Mail : care@autodeilerz.com.com<br />
  Website : autodeilerz.com<br/>
  Ph : 7338310007,22585527</th>
</thead>
<tbody>
<tr>
<td height="45" colspan="11" align="Center"><B><span style="font-size:22px">PAY SLIP</span></B></td>
</tr>
<tr >
<td width="297"  align="LEFT" style="height:30px"><b>Name Of Employer </b></td>
<td width="311"  colspan="5"  align="LEFT" > <?php echo $rpm['franchisee_name']; ?> </td>
</tr>
<tr >
<td  align="LEFT" style="height:30px"> <b>Address</b></td>
<td  align="LEFT"  colspan="5" ><?php echo $rpm['address'] ?></td>
</tr>
<tr >
<td  align="LEFT" style="height:30px"><b>Name OF Employee</b> </td>
<td  align="LEFT"  colspan="5" ><?php echo $Fs['e_name']  ?></td>
</tr>

<?php 
$rpm="select * from h_employee where id='".$Fs['eid']."'";
$rep=mysqli_query($conn,$rpm);
$rop=mysqli_fetch_array($rep);

$too="select * from h_designation where id='".$rop['edesign']."'";
$hun=mysqli_query($conn,$too);
$trp=mysqli_fetch_array($hun);

$too1="select * from h_department where id='".$rop['edepart']."'";
$hun1=mysqli_query($conn,$too1);
$trp1=mysqli_fetch_array($hun1);
?>
<tr >
<td  align="LEFT" style="height:30px"><b>Designation</b></td>
<td  align="LEFT"  colspan="5" ><?php echo $trp['dname']; ?></td>
</tr>
<tr >
<td  align="LEFT" style="height:30px"><b>Department<b></td>
<td  align="LEFT"  colspan="5" ><?php echo $trp1['dname']; ?></td>
</tr>
<tr >
<td  align="LEFT" style="height:30px"><b>Total Salary<b></td>
<td  align="LEFT"  colspan="5" >Rs:<?php echo $Fs['basic_salary']; ?></td>
</tr>
<tr >
<td  align="LEFT" style="height:30px"><b>Total no of days in this month<b></td>
<td  align="LEFT"  colspan="5" ><?php echo $Fs['total_days']; ?> Days</td>
</tr>
<tr >
<td  align="LEFT" style="height:30px"><b>Total no of hours in this month<b></td>
<td  align="LEFT"  colspan="5" ><?php echo $Fs['Total_Hours']; ?></td>
</tr>
<tr >
<td  align="LEFT" style="height:30px"><b>Worked Days<b></td>
<td  align="LEFT"  colspan="5" ><?php echo $Fs['worked_days']; ?> Days</td>
</tr>

<tr >
<td  align="LEFT" style="height:30px"><b>Worked Hours<b></td>
<td  align="LEFT"  colspan="5" ><?php echo $Fs['work_hour']; ?></td>
</tr>

<tr >
<td  align="LEFT" style="height:30px"><b>Late Hours<b></td>
<td  align="LEFT"  colspan="5" ><?php echo $Fs['NoOFHourLeft']; ?></td>
</tr>

<tr >
<td  align="LEFT" style="height:30px"><b>Incentives<b></td>
<td  align="LEFT"  colspan="5" ><?php echo $Fs['MonthlyIncentive']; ?> </td>
</tr>
<?php
if($Fs['deduction']!='0')
{
?>
<tr >
<td  align="LEFT" style="height:30px"><b>Deduction<b></td>
<td  align="LEFT"  colspan="5">Rs.<?php echo $Fs['deduction']; ?></td>
</tr>
<?php
}
?>
<tr >
<td  align="LEFT" style="height:30px"><b>Actual amount paid out:<b></td>
<td  align="LEFT"  colspan="5" >Rs.<?php echo $Fs['total'] ?></td>
</tr>










<tr height="30px">
<td colspan="8"></td>
</tr>


</table>
</div>
<h4 align="center"><input type="button" name="print" value="print" onClick="printDiv('print-content')" /></h4>
</body>
</html>
