<?php
session_start();
include("../../dbinfoi.php");


$s="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."' and FranchiseeId='".$_SESSION['BranchId']."' and UserId='".$_SESSION['UserId']."'";
$Es=mysqli_query($conn,$s);
$Fs=mysqli_fetch_array($Es);
$n=mysqli_num_rows($Es);
$ino=$n;

$spm="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'";;
$Scm=mysqli_query($conn,$spm);
$Frp1=mysqli_fetch_array($Scm);

?>

<?php
include("../../dbinfoi.php");
$date=date('d/m/Y');

 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style>
<style type="text/css">

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
<table align="center" width="932" border="3" cellpadding="0"  cellspacing="0">
<thead>
<tr>
<th align="center" colspan="6" ><span style="font-size:28px"><B><?php echo $Frp1['franchisee_name'] ?> </B></span><BR/><?php echo $Frp1['address'] ?>,<BR/><?php echo $Frp1['gst_no'] ?>,<BR/><?php echo $Frp1['cen_manager'] ?><BR/><?php echo $Frp1['con_number'] ?><BR/></th>

<td width="1"></th>
<tr>

<th align="LEFT" colspan="3" >TO,<BR />NAME :<span style="margin-left:26px"> <B><?PHP echo $Fs['sname']; ?></B></span><BR/>ADDRESS : <?PHP echo $Fs['saddress']; ?><BR/>MOBILE : <span style="margin-left:10px"><?PHP echo $Fs['smobile']; ?></span><BR/>STATE CODE : 33 <BR/></th>


<th align="LEFT" colspan="4" ><BR/>JOB CARD NO : <span style="margin-left:10px"><B><?PHP echo $Fs['job_card_no']; ?></B></span><BR/>DATE : <span style="margin-left:75px"><?PHP echo date("d-m-Y", strtotime($Fs['jdate'])); ?></span></th>

</tr>
<?php
$ab="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'";  
$cp=mysqli_query($conn,$ab);
$dp=mysqli_fetch_array($cp);

 $pq="select * from s_job_card_pdetails where job_card_no='".$dp['id']."'";
$rs=mysqli_query($conn,$pq);
$n=mysqli_num_rows($rs);
if($n>0)
{
$xy=mysqli_fetch_array($rs);
?>
</thead>
<th align="center" colspan="6" style=" height:40px" ><span style="font-size:30px">PACKAGE DETAILS</span></th>
<tbody>


<TR>
<th width="111" align="center"  style=" height:40px">Sl NO</th>
<th width="274">PACKAGE NAME </th>
<th width="135">PACKAGE AMOUNT</th>
<th colspan="2">REMARKS</th>


</TR>
<?php
$i=0;
 $abcd="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'"; 
$dcmd=mysqli_query($conn,$abcd);
$scpd=mysqli_fetch_array($dcmd);

 $abc="select * from s_job_card where id='".$scpd['id']."'"; 
$dcm=mysqli_query($conn,$abc);
$scp=mysqli_fetch_array($dcm);

$de1="select * from  s_job_card_pdetails where job_card_no='".$scp['id']."'";
$det1=mysqli_query($conn,$de1);
while($jc1=mysqli_fetch_array($det1))

{
$i++;
?>

<tr>
<td align="center"  style=" height:40px"><?PHP echo $i ; ?></td>
<td align="center" style=" height:40px"><?PHP echo $jc1['package_type']; ?></td>
<td align="center" style=" height:40px"><?PHP echo $jc1['package_amt']; ?></td>
<td align="center" style=" height:40px" colspan="2"><?PHP echo $jc1['pac_remarks']; ?></td>

</tr> 
<?php
}
}
?>
<?php 
 $ab="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'";  
$cp=mysqli_query($conn,$ab);
$dp=mysqli_fetch_array($cp);

 $pq="select * from s_job_card_sdetails where job_card_no='".$dp['id']."'";
$rs=mysqli_query($conn,$pq);
$n=mysqli_num_rows($rs);
if($n>0)
{
	
//if($xy['job_card_no']==$dp['id'])
//{
?>



<th align="center" colspan="5" style=" height:40px" ><span style="font-size:30px">SERVICE DETAILS</span></th>
<TR>
<th width="111" align="center"  style=" height:40px">Sl No</th>
<th width="274">SERVICE TYPE</th>
<th width="135">SERVICE AMOUNT</th>
<th width="176">CUSTOMER COMMENTS</th>
<th width="216">REPAAIR ADVICE</th>

</TR>
<?php
$i=0;
$abcd="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'"; 
$dcmd=mysqli_query($conn,$abcd);
$scpd=mysqli_fetch_array($dcmd);

 $abc="select * from s_job_card where id='".$scpd['id']."'"; 
$dcm=mysqli_query($conn,$abc);
$scp=mysqli_fetch_array($dcm);

$de="select * from  s_job_card_sdetails where job_card_no='".$scp['id']."'";
$det=mysqli_query($conn,$de);
while($jc=mysqli_fetch_array($det))

{
$i++;
?>

<tr>
<td align="center"  style=" height:40px"><?PHP echo $i ; ?></td>
<td align="center" style=" height:40px"><?PHP echo $jc['service_type']; ?></td>
<td align="center" style=" height:40px"><?PHP echo $jc['st_amt']; ?></td>
<td align="center" style=" height:40px"><?PHP echo $jc['remarks']; ?></td>
<td align="center" style=" height:40px"><?PHP echo $jc['remarks_1']; ?></td>
</tr> 
<?php
}
}
?>

<tr>

<tr>

<td  align="right" colspan="4" height="30px"><b>TOTAL SERVICE AMOUNT :</b> &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<b><?php echo $Fs['total_amt'];?></b></td></tr>



<tr>

<td  align="right" colspan="4" height="30px">FUEL LEVEL : &nbsp;&nbsp;</td>
<td align="left" colspan="2">&nbsp;&nbsp;<?php echo $Fs['fuel'];?></td
></tr>

<tr>

<td  align="right" colspan="4" height="30px">POST SERVICE FOLLOW - UP : &nbsp;&nbsp; </td>
<td align="left" colspan="2">&nbsp;&nbsp;<?php echo $Fs['follow'];?></td
></tr>

<tr>
<td colspan="6" style=" height:100px; margin-top:30PX;" align="right"><B><br /><br /><br />AUTHORIZED SIGNATORY</B></td>


</tr>

</table>
</div>
<h4 align="center"><input type="button" name="print" value="print" onClick="printDiv('print-content')" />&nbsp;&nbsp;&nbsp;<a href="jobcard_reports.php" class="button style2">cancel</a></h4>
</body>
</html>
