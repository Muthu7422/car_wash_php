<?php
include("../../includes.php");
include("../../redirect.php");
if(isset($_POST['add']))
{	
$in="update  s_spare_prepick set s_pick_no='".$_POST['pre_pick_no']."',sdate='".$_POST['date']."',s_job_card_no='".$_POST['job_card_no']."',JobcardId='".$_POST['JobcardId']."',vehicle_no='".$_POST['vehicle_no']."',mobile='".$_POST['mobile']."',sname='".$_POST['name']."',status='Active',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."' where s_job_card_no='".$_POST['job_card_no']."' and JobcardId='".$_POST['JobcardId']."'"; 
$Ein=mysqli_query($conn,$in);
$rno=mysqli_insert_id($conn);

	$spm1="select *from s_spare_prepick where s_pick_no='".$_POST['pre_pick_no']."'";
	$dcm1=mysqli_query($conn,$spm1);
	$jb1=mysqli_fetch_array($dcm1);


$det="insert into s_spare_prepick_details set TaxRate='".$_POST['Tax']."',s_pick_no='".$jb1['id']."',spare_cat='".$_POST['sdetail']."',spare_brd='".$_POST['sbrand']."',spare_name='".$_POST['sname']."',mrp='".$_POST['mrp']."',qty='".$_POST['quantity']."',total='".$_POST['tamount']."'";
$Fd=mysqli_query($conn,$det);

 $echecks="Update item_stock set StockQuantity=StockQuantity-'".$_POST['quantity']."' where ItemId='".$_POST['sname']."' and FranchiseeId='".$_SESSION['FranchiseeId']."'"; 
$echks=mysqli_query($conn,$echecks);

$job_card_no=$_POST['job_card_no'];
$JobcardId=$_POST['JobcardId'];
header("location:s_spare_prepick_edit.php?job_card_no=$job_card_no&&JobcardId=$JobcardId");
}
if(isset($_POST['final']))
{
header("location:s_spare_prepick_view.php");	
}

?>