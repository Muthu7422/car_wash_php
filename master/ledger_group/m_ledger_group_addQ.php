<?php
include("../../includes.php");
include("../../redirect.php");

  $see="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);

$Es="select * from m_ledger_group where ledger_group='".$_POST['ledger_group']."' and status='Active'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
$in="insert into m_ledger_group set ledger_group='".$_POST['ledger_group']."',status='Active'";
$Ein=mysqli_query($conn,$in);
header("location:m_ledger_group_view.php?s=Data Saved Sucessfully");
}
else
{
	header("location:m_ledger_group_view.php?a=Already Exits");
}
?>