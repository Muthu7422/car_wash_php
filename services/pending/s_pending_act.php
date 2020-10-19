<?php
include("../../includes.php");
include("../../redirect.php");

 $a="select * from pending_service where job_card_no='".$_POST['job_card_no']."' and status='Active'";
$b=mysqli_query($conn,$a);
$c=mysqli_num_rows($b); 
if($c<'1')
{
if($_POST['other']!='')
{
$rsn=$_POST['other'];
}
else
{
$rsn=$_POST['reason'];
}
$det="insert into pending_service set pending_no='".$_POST['pending_no']."',pending_date='".$_POST['pending_date']."',job_card_no='".$_POST['job_card_no']."',vehicle_no='".$_POST['vehicle_no']."',mobile='".$_POST['mobile']."',name='".$_POST['name']."',date_since='".$_POST['date_since']."',pending_days='".$_POST['pending_days']."',reason='".$_POST['reason']."',other='".$rsn."',status='Active'";
$Esr=mysqli_query($conn,$det); 


header("location:s_pending_view.php?s=1");
}
else
{
header("location:s_pending_view.php?m=1");
}

?>