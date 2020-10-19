<?php
error_reporting(0);
ob_start();
include("../../includes.php");
include("../../redirect.php");

if (isset($_POST['AddService']))
{
$det="insert into s_job_card_sdetails set job_card_no='".$_POST['job_card_id']."',service_type='".$_POST['stype']."',st_amt='".$_POST['st_amt']."',qty='".$_POST['qty']."'";
$Esr=mysqli_query($conn,$det); 
$job_card_no=$_POST['job_card_no'];
header("location:s_jobcard_edit.php?job_card_no=$job_card_no");
}
if($_REQUEST['act']=='Del')
{
$det="delete from s_job_card_sdetails where id='".$_REQUEST['sid']."'";
$Esr=mysqli_query($conn,$det); 
$job_card_no=$_REQUEST['job_card_no'];
header("location:s_jobcard_edit.php?job_card_no=$job_card_no");
}

if (isset($_POST['AddJobCard']))
{

$in="update s_job_card set ServiceAdvisor='".$_POST['ServiceAdvisor']."',DeliveryDate='".$_POST['delivery_date']."',DeliveryTime='".$_POST['delivery_time']."',PaidAmount='".$_POST['paying_advance_amount']."',BalanceAmount='".$_POST['balance_amount']."',Remarks='".$_POST['remarks_1']."',ParticularInstructions='".$_POST['customer_instructions']."',job_card_no='".$_POST['job_card_no']."',jdate='".$_POST['jdate']."',vehicle_no='".$_POST['vehicle_no']."',smobile='".$_POST['smobile']."',sname='".$_POST['sname']."',saddress='".$_POST['saddress']."',kms='".$_POST['kms']."',fuel='".$_POST['fuel']."',follow='".$_POST['follow']."',total_amt='".$_POST['total_amt']."' where id='".$_POST['job_card_id']."'"; 
$Ein=mysqli_query($conn,$in);


				
		/*$names1="select * from s_job_card_sdetails_temp where job_card_no='".$_POST['job_card_no']."'";
		$ns1=mysqli_query($conn,$names1);
		while($jcd1=mysqli_fetch_array($ns1))
		{
		$det1="insert into s_job_card_sdetails set job_card_no='$rno',service_type='".$jcd1['service_type']."',st_amt='".$jcd1['st_amt']."',qty='".$jcd1['qty']."',remarks='".$jcd1['remarks']."',remarks_1='".$jcd1['remarks_1']."',status='Active'";
		$Fd1=mysqli_query($conn,$det1);
		}*/
				
		
$iinv="update s_job_card_inventory set ServiceBooklet='".$_POST['ServiceBooklet']."',SpareWheel='".$_POST['SpareWheel']."',Jack='".$_POST['Jack']."',";
$iinv.="ToolKit='".$_POST['ToolKit']."',MudFlaps='".$_POST['MudFlaps']."',WheelCaps='".$_POST['WheelCaps']."',T1='".$_POST['TyreT1']."',";				
$iinv.="T2='".$_POST['TyreT2']."',T3='".$_POST['TyreT3']."',T4='".$_POST['TyreT4']."',T5='".$_POST['TyreT5']."',";
$iinv.="Stereo='".$_POST['Stereo']."',Speakers='".$_POST['Speakers']."',Tweeters='".$_POST['Tweeters']."',Clock='".$_POST['Clock']."',";
$iinv.="MirrorsRH='".$_POST['MirrorsRH']."',MirrorsLH='".$_POST['MirrorsLH']."',MirrorsInner='".$_POST['MirrorsInner']."',KeyChain='".$_POST['KeyChain']."',";
$iinv.="Battery='".$_POST['Battery']."',MatF1='".$_POST['MatF1']."',MatF2='".$_POST['MatF2']."',MatR1='".$_POST['MatR1']."',";
$iinv.="MatR2='".$_POST['MatR2']."',MatR3='".$_POST['MatR3']."',MatR4='".$_POST['MatR4']."',MatD='".$_POST['MatD']."' where JobCardId='".$_POST['job_card_id']."'";
$Eiinv=mysqli_query($conn,$iinv);

$job_card_no=$_POST['job_card_no'];
header("location:s_jobcard_receipt.php?job_card_no=$job_card_no");
}		
?>