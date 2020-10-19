<?php
session_start();
include("../../dbinfoi.php");
$p1="select * from t_user_create";
$Ep1=mysqli_query($conn,$p1);
$Fp1=mysqli_fetch_array($Ep1);
$s="select * from s_estimate where eno='".$_REQUEST['eno']."'";
$Es=mysqli_query($conn,$s);
$Fs=mysqli_fetch_array($Es);
$n=mysqli_num_rows($Es);
$ino=$n;


$ss1="select * from a_customer where cust_name='".trim($Fs['ename'])."'";
$Ess1=mysqli_query($conn,$ss1);
$Fss1=mysqli_fetch_array($Ess1);
?>

<?php
include("../../dbinfoi.php");
$date=date('d/m/Y');
$pr="select * from s_estimate order by id desc limit 1";
$Epr=mysqli_query($conn,$pr);
$Fpr=mysqli_fetch_array($Epr);
$n=mysqli_num_rows($Epr);

$n1=$n+1;
$inv=$Fpr['eno'];

 

 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style>
<style type="text/css">
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
</head>

<body oncontextmenu="return false;">
<div id="print-content">
<table align="center" width="950" border="3" cellpadding="0"  cellspacing="0">
<thead>
<tr>
<th align="center" colspan="5" ><span style="font-size:28px"><B>SHAKILA AUTO SERVICE </B></span><BR/>Near 24 Building, BHEL Maingate,<BR/> Trichy - 620014,<BR/>Mail : shakilaautoservice@gmail.com<BR/>Ph : 7708644747<BR/> GSTIN : GSTN NO, STATE CODE : 33</th>

</th>
<tr>

<th align="LEFT" colspan="3" ><BR />TO,  <BR/>Name : M/S <span style="font-size:18px"><B><?PHP echo $Fs['ename']; ?></B></span><BR/>ADDRESS : <?PHP echo $Fss1['addr']; ?><BR/>MOBILE : <?PHP echo $Fs['emobile']; ?><BR/>STATE CODE : 33 <BR/></th>


<th align="LEFT" colspan="3" ><BR/>ESTIMATE NO : <span style="font-size:18px"><B><?PHP echo $Fs['eno']; ?></B></span><BR/>DATE : <?PHP echo $Fs['edate']; ?><BR/>JOB CARD NO : <?PHP echo $Fs['ejcn']; ?><BR/> SPARE PREPICK NO : <?PHP echo $Fs['eppn']; ?><BR /></th>

</tr>
</thead>
<tbody>
<TR>
<th colspan="1" style=" height:40px">Spare Cost Estimation</th>
<th colspan="1">Labour Charge Estimation</th>
<th colspan="2">Total Cost Estimation</th>

</TR>

<td align="center" colspan="1" style=" height:40px"><?PHP echo $Fs['esce']; ?></td>
<td align="center" colspan="1" style=" height:40px"><?PHP echo $Fs['elce']; ?></td>
<td align="center" colspan="2" style=" height:40px"><?PHP echo $Fs['tce']; ?></td>
<tr> 

<td  colspan="15" height="20px"</td>
</tr>
<tr> 
<td>REMARKS : </td>
<td  colspan="15" height="30px"><?PHP echo $Fs['remarks']; ?></td>
</tr>


<tr>
<td colspan="4" style=" height:100px; margin-top:30PX;" align="right"><B><br /><br /><br />AUTHORIZED SIGNATORY</B></td>


</tr>

</table>
</div>
<h4 align="center"><input type="button" name="print" value="print" onClick="printDiv('print-content')" />&nbsp;&nbsp;&nbsp;<a href="s_estimate.php" class="button style2">cancel</a></h4>
</body>
</html>
