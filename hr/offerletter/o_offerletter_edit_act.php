<?php
include("../../includes.php");
include("../../redirect.php");

$id=$_POST['id'];

 $emp="update h_offer_letter set ecode='".$_POST['ecode']."',ename='".$_POST['ename']."',emobile='".$_POST['emobile']."',address='".$_POST['saddress']."',email='".$_POST['eemail']."',state='".$_POST['sstate']."',joindate='".$_POST['jdate']."',edesignation='".$_POST['edesign']."',edepart='".$_POST['edept']."',perannulsalary='".$_POST['salary']."',status='Active',FranchiseeId='".$_SESSION['FranchiseeId']."' where id='$id'";
$rpm=mysqli_query($conn,$emp); 

header ("location:o_offerletter.php")

?>
