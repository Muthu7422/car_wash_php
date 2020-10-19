<?php
session_start();
include("../../includes.php");
include("../../redirect.php");


$p="select * from job_card_no where id='1'";
$Ep=mysql_query($p);
$Fp=mysql_fetch_array($Ep); 
	   
$pre_pick_no="SP".$Fp['spick'];

$upj="update job_card_no set spick=spick+1 where id='1'"; 
$upw=mysqli_query($conn,$upj);


$in="insert into s_spare_prepick set s_pick_no='".$pre_pick_no."',sdate='".$_SESSION['date']."',s_job_card_no='".$_SESSION['job_card_no']."',JobcardId='".$_SESSION['JobcardId']."',vehicle_no='".$_SESSION['vehicle_no']."',mobile='".$_SESSION['mobile']."',sname='".$_SESSION['name']."',status='Active',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."'"; 
$Ein=mysql_query($in);
$rno=mysql_insert_id();
	
				$names="select * from s_spare_prepick_temp where JobcardId='".$_SESSION['JobcardId']."' and s_job_card_no='".$_SESSION['job_card_no']."'";
				$ns=mysql_query($names);
				while($jcd=mysql_fetch_array($ns))
				{
					// mrp is selling price mrp1 is mrp
$det="insert into s_spare_prepick_details set TaxRate='".$jcd['TaxRate']."',s_pick_no='$rno',spare_cat='".$jcd['spare_cat']."',spare_brd='".$jcd['spare_brd']."',spare_name='".$jcd['spare_name']."',mrp='".$jcd['mrp']."',mrp1='".$jcd['mrp1']."',qty='".$jcd['qty']."',total='".$jcd['total']."'";
$Fd=mysql_query($det);

 $echecks="Update item_stock set StockQuantity=StockQuantity-'".$jcd['qty']."' where ItemId='".$jcd['spare_name']."' and FranchiseeId='".$_SESSION['FranchiseeId']."'"; 
$echks=mysql_query($echecks);
				}
$del2="DELETE FROM s_spare_prepick_temp WHERE JobcardId='".$_SESSION['JobcardId']."' and s_job_card_no='".$_SESSION['job_card_no']."'";
$spm2=mysql_query($del2);

header("location:s_spare_prepick_view.php");

?>