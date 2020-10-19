<?php
include("../../includes.php");
include("../../redirect.php");


if($_POST['stype']!="")
{


 $in="update s_job_card set jdate='".$_POST['jdate']."',vehicle_no='".$_POST['vehicle_no']."',smobile='".$_POST['smobile']."',sname='".$_POST['sname']."',saddress='".$_POST['saddress']."',kms='".$_POST['kms']."',fuel='".$_POST['fuel']."',follow='".$_POST['follow']."',service_amt='".$_POST['service_amt']."',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."',status='Active' where job_card_no='".$_POST['job_card_no']."'"; 
$Ein=mysqli_query($conn,$in);
$rno=mysqli_insert_id($conn);

 $det="insert into s_job_card_details_temp set job_card_no='".$_POST['job_card_no']."',jdate='".$_POST['jdate']."',vehicle_no='".$_POST['vehicle_no']."',service_type='".$_POST['stype']."',st_amt='".$_POST['st_amt']."',qty='".$_POST['qty']."',remarks='".$_POST['remarks']."',remarks_1='".$_POST['remarks_1']."',smobile='".$_POST['smobile']."',sname='".$_POST['sname']."',saddress='".$_POST['saddress']."',kms='".$_POST['kms']."',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."',status='Active'";
$Esr=mysqli_query($conn,$det); 
$job_card_no=$_POST['job_card_no'];
header("location:s_jobcard_edit.php?job_card_no=$job_card_no");
}
else
{
  $in="update s_job_card set jdate='".$_POST['jdate']."',vehicle_no='".$_POST['vehicle_no']."',smobile='".$_POST['smobile']."',sname='".$_POST['sname']."',saddress='".$_POST['saddress']."',kms='".$_POST['kms']."',fuel='".$_POST['fuel']."',follow='".$_POST['follow']."',service_amt='".$_POST['service_amt']."',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."',status='Active' where job_card_no='".$_POST['job_card_no']."'"; 
$Ein=mysqli_query($conn,$in);
$rno=mysqli_insert_id($conn);

$names="select * from s_job_card_details_temp where job_card_no='".$_POST['job_card_no']."'";
$ns=mysqli_query($conn,$names);
while($jcd=mysqli_fetch_array($ns))
{

$j="select * from s_job_card_details where job_card_no='".$_POST['job_card_no']."'";
$jj=mysqli_query($conn,$j);
$jjj=mysqli_fetch_array($jj);


if($jcd['service_type']!=$jjj['service_type'])
{


$det="insert into s_job_card_details set job_card_no='".$_POST['job_card_no']."',jdate='".$_POST['jdate']."',vehicle_no='".$jcd['vehicle_no']."',service_type='".$jcd['service_type']."',st_amt='".$jcd['st_amt']."',qty='".$jcd['qty']."',remarks='".$jcd['remarks']."',remarks_1='".$jcd['remarks_1']."',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."'";
$Fd=mysqli_query($conn,$det);
}


$sql="delete from s_job_card_details_temp where job_card_no='".$_POST['job_card_no']."'";
$spm=mysqli_query($conn,$sql);
}







/*if($_POST['payment']=='Credit')
{
	$ss1="insert into fp_outstanding set bno='$_POST['job_card_no']',bdate='".$_POST['date']."',amount='',pamount='',status='Active',rno='$rno'"; 
	$Ess1=mysqli_query($conn,$ss1);
	
	$rem=$rem." | ".$_POST['pid'][$j];
	
	$oh="insert into p_outstanding_history set vdate='".$_POST['vdate']."',amount='".$_POST['pamount'][$j]."',pno='".$_POST['pid'][$j]."',rno='$rno'";
	$Eoh=mysqli_query($conn,$oh);
}*/




header("location:s_jobcard_view.php?s=1");
}
?>