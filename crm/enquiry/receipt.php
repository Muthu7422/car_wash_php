<?php

session_start();

error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

$date=date('d/m/Y');
 $s="select * from crm_enquiry where Id='".$_REQUEST['Id']."'"; 
$Es=mysqli_query($conn,$s);
$Fs=mysqli_fetch_array($Es);
$n=mysqli_num_rows($Es);
$ino=$n;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Quotation Document</title>
<style>
<style type="text/css" media="print">

.header {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color:blue;
   color: white;
   text-align: center;
   padding: 60px;
   font-size: 30px;
}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color:blue;
   color: white;
   text-align: center;
}
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
<div class="header">
<p><span style="margin-left:350px"><img src="logo.jpg" width="150" height="150"></span></p>
</div>
<hr>
<div id="print-content">
<table align="center" width="626" border="0"   cellpadding="3"  cellspacing="0">
<tr>
<td><?php echo date('d/m/Y'); ?></td>
</tr>
<tr>
<td><span>Quotation To:</span> <b><span style="margin-left:10px"><?php echo $Fs['ecode']?></b></span></td>
</tr>
</table>
<br/><br/><br/>
<table align="center" width="626" border="0"   cellpadding="3"  cellspacing="0">
<tr style='height:20px'>
<td> <b><span style="margin-left:10px"><?php echo $Fs['CustomerFirstName']?></b></span></td>
</tr>
<tr style='height:10px'>
<td> <span style="margin-left:10px"><?php echo $Fs['CustomerStreet']?></span></td>
</tr>
<tr style='height:20px'>
<td><span style="margin-left:10px"><?php echo $Fs['CustomerMobile1']?></span></td>
</tr>
<tr style='height:20px'>
<td><span style="margin-left:10px"><?php echo $Fs['CustomeremailId']?></span></td>
</tr>
<tr style='height:80px'>
<td><span style='margin-left:10px'>Dear Sir/Madam</span><span style="margin-left:10px"><b><?php echo $Fs['CustomerFirstName']?></b></span></td>
</tr>

<tr>
<td><span style='margin-left:30px'>It is an immense pleasure in talk to you today, I just want to take a brief on our company and products.</td></tr>

<tr style='height:40px'>
<td><span style='margin-left:30px'>We take pleasure in introducing Vertex Solutions having its presence in the market for a decade of software solutions. We provide a pit stop solution for all your software demands. For the past 10 years, we are in the field of Software needs. We have mobilized all documentation or hand work record maintenance into simple systemized work as smart work.</b></span></td>
</tr>
<tr style='height:40px'>
<td><span style='margin-left:30px'>We aware that the businesses are looking for simplifying prospective work load into a simple cost effective management. And, so here we would to like place our product comprehensive offer on considering your requirement. Our web solution will increase the sales and mobilize your business solutions. <br/></span></td>
</tr>
</b>
<tr style='height:40px'>
<td><span style='margin-left:5px; font-size:20px'><b><u>We Offers</u></b></span></td>
</tr>
<tr style='height:40px'>
<td><span style='margin-left:20px;font-size:18px'><ul><li>BUSINESS APPLICATION for Service Station</li></ul></span></td>
</tr>
<tr style='height:40px'>
<td><span style='margin-left:5px;font-size:20px'><b><u>Some of our features</u></b></span></td>
</tr>
<tr style='height:40px'>
<td><span style='margin-left:10px;font-size:15px'><ul><li>Especially readymade application to suit your customer needs.</li>
<li>Resolving issues thru online for web application.</li>
<li> Developed and customization by industry experts</li>
<li> Interactive and easy access in all aspects.</li>
<li>Self-learning methodology or training provide to staffs.</li>
<li>Duration in a short span.</li></ul></b></span></td>
</tr>
<tr style='height:40px'>
<td><span style='margin-left:130px;font-size:25px'><b><u>Proposal / Quotation</u></b></span></td>
</tr>
<tr style='height:40px'>
<td><span style='margin-left:30px;font-size:15px'>Based on the discussion we had, we would like to offer online software solution as Web Application. The cost and features are included for your kind reference and perusal.</span></td>
</tr>

<tr style='height:40px'>
<td><span style='margin-left:10px;font-size:15px'><u>Please find quote here in below given in the following table:-</u></span></td>
</tr>
</table>

<table align="center" width="626" border="0"   cellpadding="3"  cellspacing="0">
<tr style='height:40px'>
    <th><span style='margin-left:10px;font-size:15px'>Sl.No.</th>
    <th>Descriptions</th> 
    <th>Page / Forms</th>
	<th>Amt Per Form</th>
	<th>Total in Rs.</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Master Management Module</td>
    <td>17</td>
	<td>400</td>
    <td>6,800.00</td>
  </tr>
  <tr>
    <td>2</td>
    <td>HR Management</td>
    <td>7</td>
	<td>500</td>
	<td>3,500.00</td>
  </tr>
  <tr>
    <td>3</td>
    <td>Accounts Management</td>
    <td>10</td>
	<td>500</td>
	<td>5,000.00</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Service Management</td>
    <td>4</td>
	<td>600</td>
	<td>2,400.00</td>
  </tr>
  <tr>
    <td>5</td>
    <td>Store Management</td>
    <td>8</td>
	<td>500</td>
	<td>4,000.00</td>
  </tr>
  <tr>
    <td>6</td>
    <td>Reports Module</td>
    <td>13</td>
	<td>400</td>
	<td>5,200.00</td>
  </tr>
   <tr>
   <td> </td>
    <td><b>Total Cost of Software</b></td>
     <td> </td>
	  <td> </td>
	<td><b>26,900.00</b></td>
  </tr>
</table>
<table align="center" width="626" border="0"   cellpadding="3"  cellspacing="0">
<tr style='height:40px'>
<td><span style='margin-left:5px;font-size:20px'><b><u>Payment Terms:</u></b></span></td>
</tr>
<tr style='height:40px'>
<td><span style='margin-left:10px;font-size:15px'><ul><li>Upfront payment of 100% on the day of delivery.</li>
<li>Taxes as per actual state and central government norms.</li>
<li> Maximum Project Duration will be 15 days. It may extend based on customer requirements.</li>
<li> Users will be allocated 3 users as free of cost.</li>
<li>If new form or page need to be added Rs. 800 / page will be applicable.</li>
<li>User Acceptance Testing (UAT) period will be one week.</li>
<li>Payments can be made as Card Swiping, Cheque or Online gateway system.</li></ul></b></span></td>
</tr>
</table>
<table align="center" width="626" border="0"   cellpadding="3"  cellspacing="0">
<tr style='height:60px'>
<td><span style='margin-left:10px;font-size:15px'>Yours faithfully,<br/><br/>
<span style='margin-left:10px;font-size:20px'><b>Nazeer deen S,</span></b><br/>
<span style='margin-left:10px'>Business Development,</span><br/>
<span style='margin-left:10px'>Vertex Solutions,</span><br/>
<span style='margin-left:10px'>Mobile: 9566969517</span><br/>
<span style='margin-left:10px'>Skype: nazeer.vertex</span><br/>
<span style='margin-left:10px'>Website: www.vertexsolution.co.in</span><br/></td>
</tr>
<tr style='height:40px'>
<td><span style='margin-left:130px;font-size:20px'><b><i>Thanking you for sparing your precious time</i></b></span></td>
</tr>
</table>

</div>
<h4 align="center"><input type="button" name="send" value="send" onClick="printDiv('print-content')" />&nbsp;&nbsp;&nbsp;<a href="o_offerletter.php" class="button style2">cancel</a></h4>
<br/><br/><br/><br/><br/><br/>
<div class="footer">
  <p> <span style='margin-left:20px;font-size:20px'>Vertex Solutions, No.198,VKV Building, Nehru Street, Ramnagar, Coimbatore - 641009</span></p>
</div>
</body>
</html>
