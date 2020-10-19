<?php
session_start();
include("../../dbinfoi.php");
//$p1="select * from t_user_create";
//$Ep1=mysqli_query($p1);
//$Fp1=mysqli_fetch_array($Ep1);

$s="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."' and FranchiseeId='".$_SESSION['FranchiseeId']."' and UserId='".$_SESSION['UserId']."'";
$Es=mysqli_query($conn,$s);
$Fs=mysqli_fetch_array($Es);
$n=mysqli_num_rows($Es);
$ino=$n;

$spm="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'";;
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
<th align="center" class="style3"><span style="font-size:22px" ><B><?php echo "Auto Detailerz";//$Frp1['franchisee_name'] ?> </B></span><BR/></th>
<th align="center" class="style2"><span style="font-size:22px;margin-left:10px"><B> EXPRESS CAR WASH </B></span><BR/></th>
</tr>
<tr>
<th align="left" colspan="6" ><span style="font-size:20px;margin-right:10px" class="style2">JOB CARD</span><span style="margin-left:480px">Job Order No : <?php echo $Fs['job_card_no']; ?></span><br/><br/>GUEST DETAILS<span style="margin-left:470px">Date : <?php echo date("d-m-Y", strtotime($Fs['jdate'])); ?></span></th>
</tr>

<?php
$ab="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'";  
$cp=mysqli_query($conn,$ab);
$dp=mysqli_fetch_array($cp);
?>
</thead>
<table align="center" width="932" border="0" cellpadding="0"  cellspacing="0">
<br/>
<tr style="height:20px">
<td colspan="6"><span style="font-size:18px" class="style4">Name : </span><?php echo $dp['sname']; ?><br/><span style="font-size:18px" class="style4">Address :</span> <?php echo $dp['saddress'];?><br/><span style="font-size:18px" class="style4">Moblie:</span></b><?php echo$dp['smobile'] ?><span style="margin-left:100px"><span style="font-size:18px" class="style4">E-mail : </span></b><?php echo $dp['smobile'];?></span></td>
</tr>
</table>
<table align="center" width="932" border="0" cellpadding="0"  cellspacing="0">
<br/><br/>
<?php
$rpm="select * from a_customer_vehicle_details where cust_no='".$dp['customer_id']."'";
$prm=mysqli_query($conn,$rpm);
$tpm=mysqli_fetch_array($prm);
?>
<tr style="height:40px">
<td colspan="6"><span style="font-size:18px" class="style4">CAR DETAILS</span><br/><br/><span style="font-size:18px" class="style4">Car Registration No :</span> <?php echo $dp['vehicle_no']; ?><br/><span style="font-size:18px" class="style4">Car Model : </span><?php echo $tpm['vehicle_name'];?><br/></td>
</tr>
</table>
<table align="center" width="932" border="0" cellpadding="0"  cellspacing="0">
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
<table align="center" width="932" border="0" cellpadding="0"  cellspacing="0">

<tr>
<td><span style="font-size:18px" class="style4">INVENTORY</span></td>
</tr>
<br/>

<?php 

				$ab1="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'";  
				$cp1=mysqli_query($conn,$ab1);
				$dp1=mysqli_fetch_array($cp1);

				$sinv="select * from s_job_card_inventory where JobCardId='".$dp1['id']."'";
				$Esinv=mysqli_query($conn,$sinv);
				while($FEsinv=mysqli_fetch_array($Esinv))
				{
				
				?>

<tr>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['ServiceBooklet']=='1') { ?> checked="true" <?php } ?>>Service Bookit</span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['Speakers']=='1') { ?> checked="true" <?php } ?>>Speakers</span></td>
</tr>
<tr>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['SpareWheel']=='1') { ?> checked="true" <?php } ?>>Spare Wheel / Make</span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['Tweeters']=='1') { ?> checked="true" <?php } ?>>Tweeters</span></td>
</tr>
<tr>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['Jack']=='1') { ?> checked="true" <?php } ?>>Jack & handle</span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['Clock']=='1') { ?> checked="true" <?php } ?>>Clock</span></td>
</tr>
<tr>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['ToolKit']=='1') { ?> checked="true" <?php } ?>>Tool Kit</span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['MirrorsRH']=='1') { ?> checked="true" <?php } ?>>MirrorsRH</span></td>
<td><span style="margin-left:-290px"><input type="checkbox" <?php if($FEsinv['MirrorsRH']=='1') { ?> checked="true" <?php } ?>>MirrorsLH</span></td>
<td><span style="margin-left:-250px"><input type="checkbox" <?php if($FEsinv['MirrorsRH']=='1') { ?> checked="true" <?php } ?>>MirrorsInner</span></td>





</tr>
<tr>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['MirrorsLH']=='1') { ?> checked="true" <?php } ?>>Mud Flaps</span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['KeyChain']=='1') { ?> checked="true" <?php } ?>>idol/Key Chain</span></td>
</tr>
<tr>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['WheelCaps']=='1') { ?> checked="true" <?php } ?>>Wheel Caps</span></td>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['Battery']=='1') { ?> checked="true" <?php } ?>>Battery/Make</span></td>
</tr>
<tr>
<td><span style="margin-right:10px"><input type="checkbox">Tyres / Make</span>
<span style="margin-right:10px">1<input type="checkbox"<?php if($FEsinv['T1']=='1') { ?> checked="true" <?php } ?>></span>
<span style="margin-right:10px">2<input type="checkbox" <?php if($FEsinv['T2']=='1') { ?> checked="true" <?php } ?>></span>
<span style="margin-right:10px">3<input type="checkbox" <?php if($FEsinv['T3']=='1') { ?> checked="true" <?php } ?>></span>
<span style="margin-right:10px">4<input type="checkbox" <?php if($FEsinv['T4']=='1') { ?> checked="true" <?php } ?>></span>
<span style="margin-right:10px">5<input type="checkbox" <?php if($FEsinv['T5']=='1') { ?> checked="true" <?php } ?>></span></td>
<td><span style="margin-right:10px"><input type="checkbox">MAT</span>
<span style="margin-right:10px">F1<input type="checkbox" <?php if($FEsinv['MatF1']=='1') { ?> checked="true" <?php } ?>></span>
<span style="margin-right:10px">F2<input type="checkbox" <?php if($FEsinv['MatF2']=='1') { ?> checked="true" <?php } ?> ></span>
<span style="margin-right:10px">R1<input type="checkbox" <?php if($FEsinv['MatR1']=='1') { ?> checked="true" <?php } ?>></span>
<span style="margin-right:10px">R2<input type="checkbox" <?php if($FEsinv['MatR2']=='1') { ?> checked="true" <?php } ?>></span>
<span style="margin-right:10px">R3<input type="checkbox" <?php if($FEsinv['MatR3']=='1') { ?> checked="true" <?php } ?>></span>
<span style="margin-right:10px">R4<input type="checkbox" <?php if($FEsinv['MatR4']=='1') { ?> checked="true" <?php } ?>></span>
<span style="margin-right:10px">D<input type="checkbox" <?php if($FEsinv['MatD']=='1') { ?> checked="true" <?php } ?>></span></td>
</tr>
<tr>
<td><span style="margin-right:10px"><input type="checkbox" <?php if($FEsinv['Stereo']=='1') { ?> checked="true" <?php } ?>>Stero</span></td>
<td><span style="margin-right:10px"><input type="checkbox">Others</span></td>
</tr>
<?php
				}
				?>
</table>
<table align="center" width="932" border="0" cellpadding="0"  cellspacing="0">
<br/><br/>

<tr style="height:40px">
<?php
$rpms="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'";
$prms=mysqli_query($conn,$rpms);
$tpms=mysqli_fetch_array($prms);

?>
<td><span style="font-size:18px" class="style4">PAYABLE AMOUNT In : </span><span style="margin-left:20px"> <?php echo $tpms['PaidAmount']; ?></span><span style="margin-left:100px;font-size:18px" class="style4">Delivery Date : <?php echo date("d-m-Y", strtotime($tpms['DeliveryDate'])); ?></span><span style="margin-left:50px;font-size:18px" class="style4">Time : <?php echo $tpms['DeliveryTime']; ?></span></td>
</tr>
<tr style="height:40px">
<td style="font-size:14px" class="style4"><B>Remarks/Observations/Damges if Any</b> <span style="margin-left:20px"><?php echo $tpms['Remarks']; ?></span></td>
</tr>
<tr style="height:40px">
<td style="font-size:14px" class="style4"><B>Particular Instructions By Guest if Any </b><span style="margin-left:15px"><?php echo $tpms['ParticularInstructions']; ?></span></td>
</tr>
<tr style="height:40px">
<td style="font-size:14px" class="style4"><b>I Hereby Authorise the Execution Of Jobs Desctibed On My Car Using The Necessary Metrial I Hereby Agree To T&C Mention Overleaf</b></td>
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
<table align="center" width="932" border="1" cellpadding="0"  cellspacing="0">
<br/><br/>

<tr style="height:40px" >
<td><span style="font-size:15px" class="style4"><b>Customer Name  : </b></span><span style="margin-left:20px"> <?php echo $tpms['sname']; ?></span><span style="margin-left:100px"><b><span style="font-size:15px" class="style4">Moblie : </span></b><?php echo $tpms['smobile'];  ?></span><span style="margin-left:150px"><b><span style="font-size:15px" class="style4">Job Order No : </span></b><?php echo $tpms['job_card_no']; ?></span><br/><br/>
<b><span style="font-size:15px" class="style4">Car Reg.No./ Model  : </span></b><span style="margin-left:20px"> <?php echo $dp['vehicle_no']; ?> / <?php echo $tpm['vehicle_name'];?></span><span style="margin-left:400px"><b><span style="font-size:15px" class="style4">Date : </span></b><?php echo date("d-m-Y", strtotime($tpms['jdate'])); ?></span><br/></br>
<b><span style="font-size:15px" class="style4">PAYABLE AMOUNT In  : </span></b><span style="margin-left:20px"> <?php echo $tpms['PaidAmount']; ?></span><span style="margin-left:50px"><b><span style="font-size:15px" class="style4">Bal.Amt : </span></b><?php echo $tpms['BalanceAmount'];  ?></span><span style="margin-left:70px"><b><span style="font-size:15px" class="style4">Delivery Date : </span></b><?php echo  date("d-m-Y", strtotime($tpms['DeliveryDate'])); ?></span><span style="margin-left:50px"><b><span style="font-size:15px" class="style4">Time : </span></b><?php echo  $tpms['DeliveryTime']; ?></span>
<br/><br/><b><span style="font-size:20px" class="style3">Auto Detailerz</span></b><br/>
<span style="font-size:15px" class="style4">No,531, 144,Ring Road,HSR Layout,1st Sector Agara, Near HDFC Bank,Bangalore -560102<br/>
Mob,:7338310007,7760930008, Ph,:08022585527 Email : care@autodeailerz.com  Website : autodeailerz.com</span></td>
</tr>
</table>


</table>
</div>
<h4 align="center"><input type="button" name="print" value="print" onClick="printDiv('print-content')" />&nbsp;&nbsp;&nbsp;<a href="s_jobcard_view.php" class="button style2">cancel</a></h4>
</body>
</html>
