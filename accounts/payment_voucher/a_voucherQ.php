<?php 
include("../../includes.php");
include("../../redirect.php");


$i="insert into  voucher set vdate='".$_POST['vdate']."',amount='".$_POST['amount']."',remarks='',status='1'";
$Ei=mysqli_query($conn,$i);
$rno=mysqli_insert_id();

//echo count($_POST['pamount']);

for($j=0;$j<count($_POST['pamount']);$j++)
{
	if($_POST['pamount'][$j]!="")
	{

	$ss1="update p_outstanding set pamount=pamount+'".$_POST['pamount'][$j]."',rno='$rno' where pno='".$_POST['pid'][$j]."'"; 
	$Ess1=mysqli_query($conn,$ss1);
	
	$rem=$rem." | ".$_POST['pid'][$j];
	
	$oh="insert into p_outstanding_history set vdate='".$_POST['vdate']."',amount='".$_POST['pamount'][$j]."',pno='".$_POST['pid'][$j]."',rno='$rno'";
	$Eoh=mysqli_query($conn,$oh);
	
	}
} 

$i="update voucher set remarks='$rem' where id='$rno'";
$Ei=mysqli_query($conn,$i);

header("location:a_voucher_f.php?m=Payment Voucher Saved Successfully");
?>