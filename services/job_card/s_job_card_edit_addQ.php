<?php
include("../../includes.php");
include("../../redirect.php");

if($_POST['pk_amt']!="")
{
	$ecm="select * from s_job_card where job_card_no='".$_POST['job_card_no']."'";
	$pcm=mysqli_query($conn,$ecm);
	$rcm=mysqli_fetch_array($pcm);
	
 $det1="update s_job_card set job_card_no='".$_POST['job_card_no']."',financial_year='2019-2020',jdate='".$_POST['jdate']."',vehicle_no='".$_POST['vehicle_no']."',smobile='".$_POST['smobile']."',sname='".$_POST['sname']."',saddress='".$_POST['saddress']."',kms='".$_POST['kms']."',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."',status='Active' where job_card_no='".$_REQUEST['job_card_no']."'";
$Esr1=mysqli_query($conn,$det1); 
	
 $det="insert into s_job_card_pdetails set job_card_no='".$rcm['id']."',package_type='".$_POST['ptype']."',pac_remarks='".$_POST['pk_remarks_1']."',package_amt='".$_POST['pk_amt']."',status='Active'";
$Esr=mysqli_query($conn,$det);    
$job_card_no=$_POST['job_card_no'];
header("location:s_jobcard_edit.php?job_card_no=$job_card_no");
}
else
{
	$ecm1="select * from s_job_card where job_card_no='".$_POST['job_card_no']."'";
	$pcm1=mysqli_query($conn,$ecm1);
	$rcm1=mysqli_fetch_array($pcm1);
	
$det1="update  s_job_card set job_card_no='".$_POST['job_card_no']."',financial_year='2019-2020',jdate='".$_POST['jdate']."',vehicle_no='".$_POST['vehicle_no']."',smobile='".$_POST['smobile']."',sname='".$_POST['sname']."',saddress='".$_POST['saddress']."',kms='".$_POST['kms']."',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."',status='Active' where job_card_no='".$_REQUEST['job_card_no']."'";
$Esr1=mysqli_query($conn,$det1);   

$det="insert into s_job_card_sdetails set job_card_no='".$rcm1['id']."',service_type='".$_POST['stype']."',st_amt='".$_POST['st_amt']."',qty='".$_POST['qty']."',remarks='".$_POST['remarks']."',remarks_1='".$_POST['remarks_1']."',status='Active'";
$Esr=mysqli_query($conn,$det);  
$job_card_no=$_POST['job_card_no'];

header("location:s_jobcard_edit.php?job_card_no=$job_card_no");
}	
?>