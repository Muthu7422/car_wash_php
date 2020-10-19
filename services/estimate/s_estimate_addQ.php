<?php
include("../../includes.php");
include("../../redirect.php");

$in="insert into s_estimate set eno='".$_POST['eno']."',edate='".$_POST['edate']."',evehicle_no='".$_POST['evehicle_no']."',ejcn='".$_POST['ejcn']."',emobile='".$_POST['emobile']."',ename='".$_POST['ename']."',eppn='".$_POST['eppn']."',esce='".$_POST['esce']."',elce='".$_POST['elce']."',tce='".$_POST['tce']."',remarks='".$_POST['remarks']."'";
$Ein=mysqli_query($conn,$in);
$eno=$_POST['eno'];
header("location:s_estimate_receipt.php?eno=$eno");
?>