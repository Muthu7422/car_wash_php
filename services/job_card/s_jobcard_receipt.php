<?php
session_start();
include("../../dbinfoi.php");
//$p1="select * from t_user_create";
//$Ep1=mysqli_query($conn,$p1);
//$Fp1=mysqli_fetch_array($Ep1);

$s="select * from s_job_card where id='".$_REQUEST['id']."' and FranchiseeId='".$_SESSION['BranchId']."' and UserId='".$_SESSION['UserId']."'";
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
.style2 { font-family: Arial, Helvetica, sans-serif;}
.style3 { font-family: "Comic Sans MS", cursive, sans-serif;}
.style4 { font-family: Tahoma, Geneva, sans-serif;}
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
<table align="center" width="932" border="0" cellpadding="0"  cellspacing="0">

<thead>
<tr>
<th align="center" class="style3"><span style="font-size:28px" ><B><?php echo $Frp1['franchisee_name'] ?> </B></span><BR/></th>
</tr>


<tr>
<th align="left" colspan="6" ><span style="font-size:20px;margin-right:10px" class="style2">JOB CARD</span><span style="margin-left:480px">Job Order No : <?php echo $Fs['job_card_no']; ?></span><br/><br/>GUEST DETAILS<span style="margin-left:470px">Date : <?php echo date("d-m-Y", strtotime($Fs['jdate'])); ?></span></th>
</tr>

<?php



$ab="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'";  
$cp=mysqli_query($conn,$ab);
$dp=mysqli_fetch_array($cp);

$cust="select * from a_customer where mobile1='".trim($dp['smobile'])."'";
$custs=mysqli_query($conn,$cust);
$custf=mysqli_fetch_array($custs);

?>
</thead>
<table align="center" width="920px" border="1" cellpadding="5px"  cellspacing="0">
<tr><td>

<table align="center" width="920px" border="0" cellpadding="0"  cellspacing="0">
<br/>
<tr style="height:20px">
<td colspan="6"><span style="font-size:18px" class="style4">Name : </span><?php echo $dp['sname']; ?><br/><span style="font-size:18px" class="style4">Address :</span> <?php echo $dp['saddress'];?><br/><span style="font-size:18px" class="style4">Moblie:</span></b><?php echo$dp['smobile'] ?><span style="margin-left:100px"><span style="font-size:18px" class="style4">E-mail : </span></b><?php echo $custf['email'];?></span></td>
</tr>
</table>
<table align="center" width="920px" border="0" cellpadding="0"  cellspacing="0">
<br/><br/>
<?php
 $rpm="select * from a_customer_vehicle_details where vehicle_no='".trim($dp['vehicle_no'])."'"; 
$prm=mysqli_query($conn,$rpm);
$tpm=mysqli_fetch_array($prm);


$svm="select * from master_vehicle where Id='".$tpm['VehicleModel']."'";
$Esvm=mysqli_query($conn,$svm);
$FEsvm=mysqli_fetch_array($Esvm);
?>
<tr style="height:40px">
<td colspan="6"><span style="font-size:18px" class="style4">VEHICLE DETAILS</span><br/><br/><span style="font-size:18px" class="style4">Car Registration No :</span> <?php echo $dp['vehicle_no']; ?><br/><span style="font-size:18px" class="style4">Car Model : </span><?php echo $FEsvm['VehicleModel'];?><br/></td>
</tr>
</table>
</td></tr></table>
<br/>
<table align="center" width="920px" border="1" cellpadding="5px"  cellspacing="0">
<tr><td>
<table align="center" width="920px" border="0" cellpadding="0"  cellspacing="0">
<br/>
<?php
 $Rpo="select * from s_job_card_sdetails where job_card_no='".$dp['id']."'"; 
$Top=mysqli_query($conn,$Rpo);
$Dop=mysqli_num_rows($Top);
?>
<?php
if($Dop>0)
{
?>
<tr>
<td class="style4"><span style="font-size:18px">Service Required & Products:</span></td>

</tr>
<?php
$i=0;
$rpm1="select * from s_job_card_sdetails where job_card_no='".$dp['id']."'";
$prm1=mysqli_query($conn,$rpm1);
while($tpm1=mysqli_fetch_array($prm1))
{
	$i++;
?>
<tr style="height:10px">
<td>
<span style="margin-left:180px;font-size:20px"></span><span style="font-size:18px"><?php echo $i;?>). <?php echo $tpm1['service_type']; ?></span></td>
<?php
}
?>
</tr>
<?php
}
?>
<?php
 $Rpo="select * from s_job_card_recomdetails where job_card_no='".$dp['id']."'"; 
$Top=mysqli_query($conn,$Rpo);
$Dop=mysqli_num_rows($Top);
?>
<?php
if($Dop>0)
{
?>


</tr>
<?php
}
?>
<?php
$Rpo1="select * from s_job_card_pdetails where job_card_no='".$dp['id']."'";
$Top1=mysqli_query($conn,$Rpo1);
$Dop1=mysqli_num_rows($Top1);
?>
<?php
if($Dop1>0)
{
?>
<tr><td><span style="font-size:18px" class="style4">Service Package Details:</span><br/><table align="left" width="500" border="0" cellpadding="0"  cellspacing="0">

<?php
$i=0;
$rpm1="select * from s_job_card_pdetails where job_card_no='".$dp['id']."'";
$prm1=mysqli_query($conn,$rpm1);
while($tpm1=mysqli_fetch_array($prm1))
{
	$i++;

?>
<tr>
<td><span style="margin-left:180px;font-size:20px"></span><span style="font-size:18px"><?php echo $i;?>). <?php echo $tpm1['package_type']; ?></span></td>
</tr>
<?php
}
?>
<?php
}
?>
</table></td></tr>
</table>
</td></tr>
</table>

<table align="center" width="932" border="1" cellpadding="5px"  cellspacing="0">

<tr>
<td colspan="4"><span style="font-size:18px" class="style4">INVENTORY</span></td>
</tr>
<br/>

<?php 

				$ab1="select * from s_job_card where id='".$_REQUEST['id']."'";  
				$cp1=mysqli_query($conn,$ab1);
				$dp1=mysqli_fetch_array($cp1);

				$sinv="select * from s_job_card_inventory where JobCardId='".$dp1['id']."' order by id desc";
				$Esinv=mysqli_query($conn,$sinv);
				$FEsinv=mysqli_fetch_array($Esinv);
				
				
				?>

<tr>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['Idol']=='1') { ?> checked="true" <?php } ?> disabled>Idol</span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['WheelCaps']=='1') { ?> checked="true" <?php } ?> disabled>Wheel Caps</span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['ToolKit']=='1') { ?> checked="true" <?php } ?> disabled>Tool Kit</span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['StereoSpeakers']=='1') { ?> checked="true" <?php } ?> disabled>JStereo Speakers</span></td>

</tr>
<tr>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['MudFlaps']=='1') { ?> checked="true" <?php } ?> disabled>Mud Flaps</span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['SafetyTriangle']=='1') { ?> checked="true" <?php } ?> disabled>Safety Triangle</span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['AirFreshner']=='1') { ?> checked="true" <?php } ?> disabled>Air Freshner</span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['WiperBlades']=='1') { ?> checked="true" <?php } ?> disabled>Wiper Blades</span></td>

</tr>
<tr>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['SpareWheel']=='1') { ?> checked="true" <?php } ?> disabled> Spare Wheel</span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['Jack']=='1') { ?> checked="true" <?php } ?> disabled> Jack</span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['FloarMats1']=='1') { ?> checked="true" <?php } ?> disabled>Floar Mats</span></td>

</tr>

</table>
</br>
<table align="center" width="920px" border="1" cellpadding="5px"  cellspacing="0">
<tr><td>
<table align="center" width="920px" border="0" cellpadding="0"  cellspacing="0">
<br/><br/>

<tr style="height:40px">
<?php
$rpms="select * from s_job_card where id='".$_REQUEST['id']."'";
$prms=mysqli_query($conn,$rpms);
$tpms=mysqli_fetch_array($prms);

?>
<td><span style="font-size:18px" class="style4">PAYABLE AMOUNT In : </span><span style="margin-left:20px"> <?php echo $tpms['BalanceAmount']; ?></span><span style="margin-left:100px;font-size:18px" class="style4">Delivery Date : <?php echo date("d-m-Y", strtotime($tpms['DeliveryDate'])); ?></span><span style="margin-left:50px;font-size:18px" class="style4">Time : <?php echo $tpms['DeliveryTime']; ?></span></td>
</tr>
<tr style="height:40px">
<td style="font-size:14px" class="style4"><B>Remarks/Observations/Damages if Any</b> <span style="margin-left:20px"><?php echo $tpms['Remarks']; ?></span></td>
</tr>
<tr style="height:40px">
<td style="font-size:14px" class="style4"><B>Particular Instructions By Guest if Any </b><span style="margin-left:15px"><?php echo $tpms['ParticularInstructions']; ?></span></td>
</tr>
<tr style="height:40px">
<td style="font-size:14px" class="style4"><b>I Hereby Authorize the Execution Of Jobs Described On My Car Using The Necessary Meterial I Hereby Agree To T&C Mention Overleaf</b></td>
</tr>
<?php 
//echo $pngdata=$_POST['edata'];
//echo "sdsdsdsdsd";
//echo "</br>";
$pngdata=$dp1['CustomerSignature'];
//$pngdata="image/png;base64,iVBORw0KGgoAAAANSUhEUgAABHoAAAEfCAYAAAA+zqE7AAAgAElEQVR4XuydB5gkVdWG39s9m2ZhSStpgQUBFZGkCwYQWP2VIEpeREQyS1yYmapF/UUGRdipmg0iOYmkHxAEFCSJJEEFFQwoCpKTSIZdNs3U/9zu6u6q6p6Z7pmemQ7ffR5lt/vec895q7pn65tzzzFoiIAIiIAIiIAIiIAIiIAIiIAIiIAIiIAINAQB0xBRKAgREAEREIEKCPhfBTYAngb36goWaqoIiIAIiIAIiIAIiIAIiECNE5DQU+MXSO6JgAiIQPUJ+EHBZssq0PZW9feQRREQAREQAREQAREQAREQgdEgIKFnNKhrTxEQAREYFQL+jhCcCOwOua9/cyk4h4yKO9pUBERABERABERABERABESg6gQk9FQdqQyKgAiIQK0S8G4Es3uxd6lDoOPSWvVafomACIiACIiACIiACIiACJRPQEJP+aw0UwREQATqlMD89WH5bhDsAmbXEkG8B+ldof3+Og1QbouACIiACIiACIiACIiACIQEJPToVhABERCBhiYwf2XoeQWCccBCCF4DMzUMuQdIh39+D1rWVb2ehr4ZFJwIiIAIiIAIiIAIiEATEJDQ0wQXWSGKgAg0MwHvcTAfLhAIvgxcAWYlsDWZTeb/su+rXk8z3ymKXQREQAREQAREQAREoDEISOhpjOuoKERABESgBAHvYTDTEm/cAJwJwd2FgsyxGW3gLhBOERABERABERABERABERCB+iQgoac+r5u8FgEREIEBCHQfDsGFJSb1Qss6sOzceGHmSGIPTAf3HiEWAREQAREQAREQAREQARGoPwISeurvmsljERABERiAgK3Ls/wNMCZ7PKtodIJ7Kvh/BT4WvtsDQTqb5RMsgpZtoP0xoRYBERABERABERABERABEagvAhJ66ut6yVsREAERKINA118gtVl2YixTJ1xrngFnA8gIQjZzZ4uC2JMvzvwOtE6BY98rY0NNEQEREAEREAEREAEREAERqBECEnpq5ELIDREQARGoDoE5Z0L6+DJsfR7cX4O3JXBPoTizXZn/0fAwtH5OYk8ZNDVFBERABERABERABERABGqEgISeGrkQckMEREAEqkOg66eQ2idh62VgrcRrV4B7YPa1rj3A3FAQeGJZQA/DpB1h5qLq+CcrIiACIiAC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";
?>
<tr style="height:60px">
<td style="font-size:14px" class="style4">
<?php 
				if($dp1['CustomerSignature']!='')
				{
				?>
<span style="margin-left:590px"><img src="data:<?php echo $pngdata; ?>" width="250px" height="80px" />
				<?php } ?>
</td>
</tr>


<tr style="height:60px">
<?php
				  $ssc="select * from h_employee where id='".$tpms['ServiceAdvisor']."'"; 
				  $Essc=mysqli_query($conn,$ssc);
				  $FEssc=mysqli_fetch_array($Essc);

?>
<td style="font-size:14px" class="style4"><b>Service Advisor Name : </b><?php echo $FEssc['ename'] ?> <span style="margin-left:360px"><b>Guest Name & Signature</span></b></td>
</tr>
<tr style="height:40px">
<td style="font-size:14px" class="style4"><b>Mob No : </b><?php echo $FEssc['emobile'] ?>,<?php echo $FEssc['smobile'] ?><b><span style="margin-left:370px">Mob No :</span></b></td>
</tr>
</table>
</td></tr>
</table>
<table align="center" width="932" border="1" cellpadding="3px"  cellspacing="0">
<br/><br/>

<tr style="height:40px" >
<td><span style="font-size:15px;margin-left:2px" class="style4"><b>Customer Name  : </b></span><span style="margin-left:20px"> <?php echo $tpms['sname']; ?></span><span style="margin-left:100px"><b><span style="font-size:15px" class="style4">Moblie : </span></b><?php echo $tpms['smobile'];  ?></span><span style="margin-left:150px"><b><span style="font-size:15px" class="style4">Job Order No : </span></b><?php echo $tpms['job_card_no']; ?></span><br/><br/>
<b><span style="font-size:15px;margin-left:2px" class="style4">Car Reg.No./ Model  : </span></b><span style="margin-left:20px"> <?php echo $dp['vehicle_no']; ?> / <?php echo $FEsvm['VehicleModel'];?></span><span style="margin-left:350px"><b><span style="font-size:15px" class="style4">Date : </span></b><?php echo date("d-m-Y", strtotime($tpms['jdate'])); ?></span><br/></br>
<b><span style="font-size:15px;margin-left:2px" class="style4">Paid Amount In  : </span></b><span style="margin-left:20px"> <?php echo $tpms['PaidAmount']; ?></span><span style="margin-left:50px"><b><span style="font-size:15px" class="style4">Bal.Amt : </span></b><?php echo $tpms['BalanceAmount'];  ?></span><span style="margin-left:70px"><b><span style="font-size:15px" class="style4">Delivery Date : </span></b><?php echo  date("d-m-Y", strtotime($tpms['DeliveryDate'])); ?></span><span style="margin-left:50px"><b><span style="font-size:15px" class="style4">Time : </span></b><?php echo  $tpms['DeliveryTime']; ?></span>
<br/><br/><b><span style="font-size:18px;margin-left:2px" class="style3"><?PHP echo $Frp1['franchisee_name']; ?></span></b><br/>
<span style="font-size:15px;margin-left:2px" class="style4"><b><?PHP echo $Frp1['address']; ?><br/><?PHP echo $Frp1['con_number']; ?><br/><?PHP echo $Frp1['website']; ?><br/><?PHP echo $Frp1['email']; ?> </span></td>
</tr>
</table>


</table>
</div>
<h4 align="center"><input type="button" name="print" value="print" onClick="printDiv('print-content')" />&nbsp;&nbsp;&nbsp;<a href="s_jobcard_view.php" class="button style2">Close</a></h4>
</body>
</html>
