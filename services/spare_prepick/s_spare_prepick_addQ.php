<?php
session_start();
include("../../includes.php");
include("../../redirect.php");

if($_POST['sdetail']!="")
{
$pm="insert into s_spare_prepick_temp set TaxRate='".$_POST['Tax']."',s_pick_no='".$_POST['pre_pick_no']."',JobcardId='".$_POST['JobcardId']."',sdate='".$_POST['date']."',s_job_card_no='".$_POST['job_card_no']."',vehicle_no='".$_POST['vehicle_no']."',mobile='".$_POST['mobile']."',sname='".$_POST['name']."',spare_cat='".$_POST['sdetail']."',spare_brd='".$_POST['sbrand']."',spare_name='".$_POST['sname']."',mrp='".$_POST['mrp']."',qty='".$_POST['quantity']."',total='".$_POST['tamount']."',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."',status='Active'";  
$Epm=mysqli_query($conn,$pm);
$job_card_no=$_POST['job_card_no'];
$JobcardId=$_POST['JobcardId'];
header("location:s_spare_prepick.php?job_card_no=$job_card_no&&JobcardId=$JobcardId");
}
else
{
	
$in="insert into s_spare_prepick set s_pick_no='".$_POST['pre_pick_no']."',sdate='".$_POST['date']."',s_job_card_no='".$_POST['job_card_no']."',JobcardId='".$_POST['JobcardId']."',vehicle_no='".$_POST['vehicle_no']."',mobile='".$_POST['mobile']."',sname='".$_POST['name']."',status='Active',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."'"; 
$Ein=mysqli_query($conn,$in);
$rno=mysqli_insert_id($conn);
	
				$names="select * from s_spare_prepick_temp where JobcardId='".$_POST['JobcardId']."' and s_job_card_no='".$_POST['job_card_no']."'";
				$ns=mysqli_query($conn,$names);
				while($jcd=mysqli_fetch_array($ns))
				{
$det="insert into s_spare_prepick_details set TaxRate='".$jcd['TaxRate']."',s_pick_no='$rno',spare_cat='".$jcd['spare_cat']."',spare_brd='".$jcd['spare_brd']."',spare_name='".$jcd['spare_name']."',mrp='".$jcd['mrp']."',qty='".$jcd['qty']."',total='".$jcd['total']."'";
$Fd=mysqli_query($conn,$det);

 $echecks="Update item_stock set StockQuantity=StockQuantity-'".$jcd['qty']."' where ItemId='".$jcd['spare_name']."' and FranchiseeId='".$_SESSION['FranchiseeId']."'"; 
$echks=mysqli_query($conn,$echecks);
				}
$del2="DELETE FROM s_spare_prepick_temp WHERE JobcardId='".$_POST['JobcardId']."' and s_job_card_no='".$_POST['job_card_no']."'";
$spm2=mysqli_query($conn,$del2);

header("location:s_spare_prepick_view.php");
}
?>