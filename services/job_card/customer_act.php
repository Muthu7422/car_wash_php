<?php
include("../../includes.php");

$phone1=$_POST['mobile1'];
$phone2=$_POST['mobile2'];

$ledger="select * from m_ledger where LedgerGroup='26' and LedgerName='".strtoupper($_POST['customer_name'])."' and ContactNo='$phone1'";
$ledgerq=mysqli_query($conn,$ledger);
$ledgergrp=mysqli_fetch_array($ledgerq);
$ln=mysqli_num_rows($ledgerq);

if($ln<'1')
{
 $pm="insert into a_customer set MemberShip='".$_POST['Membership']."',cust_no='".$_POST['customer_no']."',cust_name='".strtoupper($_POST['customer_name'])."',addr='".strtoupper($_POST['address'])."',mobile1='$phone1',mobile2='$phone2',email='".$_POST['email']."',cus_out_amt='".$_POST['cus_out_amt']."',FrachiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."',status='Active',ledger_group='".$_POST['ledger_group']."',GSTN='".strtoupper($_POST['GSTN'])."'";  
$Epm=mysqli_query($conn,$pm);
$id=mysqli_insert_id($conn);

$lgr="insert into m_ledger set LedgerGroup='26',LedgerName='".strtoupper($_POST['customer_name'])."',ContactNo='$phone1'";
$ledgrp=mysqli_query($conn,$lgr);
$LedgerId=mysqli_insert_id($conn);		

$cu="update a_customer set LedgerId='$LedgerId' where id='$id'";
$custup=mysqli_query($conn,$cu);


$sto="select total_outstanding from cust_outstanding where cust_name='".strtoupper($_POST['customer_name'])."' order by id desc";
$Esto=mysqli_query($conn,$sto);
$nr=mysqli_num_rows($Esto);
if($nr>'0')
{
	$FEsto=mysqli_fetch_array($Esto);
	$ttlos=$FEsto['total_outstanding'];
}
else
{
	$ttlos=0;
}

//$io="INSERT INTO `cust_outstanding` (`id`, `cust_name`, `invoice`, `invoice_amt`, `p_date`, `paid_amt`, `paid_date`, `balance_amt`, `total_outstanding`, `ad_amount`, `tran_amount`, `payment_mode`) VALUES (NULL, '".$_POST['customer_name']."', '0', '0', '".date('Y-m-d')."', '0', '".date('Y-m-d')."', '0', '$ttlos', '".$_POST['cus_out_amt']."', '0', 'cash');";
//$Eio=mysqli_query($io);

 


for($i=1;$i<5;$i++)
{
	if($_POST['VehicleNo'.$i]!="")
	{
		$id1=$_POST['VehicleModel'.$i];
		$name=explode("-",$id1);
		$BrandName=trim($name[1]);
	
	
		$rvno=strtoupper(str_replace(" ","",$_POST['VehicleNo'.$i]));
	 	$Dm="insert into a_customer_vehicle_details set cust_no='$id',cust_name='".strtoupper($_POST['customer_name'])."',vehicle_no='$rvno',VehicleModel='$BrandName',VehicleBrand='".strtoupper($_POST['VehicleBrand'.$i])."',VehicleSegment='".strtoupper($_POST['VehicleSegment'.$i])."',VehicleType='".strtoupper($_POST['VehicleType'.$i])."',InsuranceCompnayName='".strtoupper($_POST['InsuranceCompnayName'.$i])."',InsuranceNumber='".strtoupper($_POST['InsuranceNumber'.$i])."',Year='".strtoupper($_POST['Year'.$i])."',InsuranceNumberExpiryDate='".$_POST['InsuranceNumberExpiryDate'.$i]."',FrachiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."',status='Active'"; 
		$Epms=mysqli_query($conn,$Dm);  
		 
	}
	else
	{
		//exit();
		header("location:s_jobcard_no.php");
	}
}



//exit();

header("location:s_jobcard_no.php?s=1");

}

else
{
header("location:s_jobcard_no.php");
}
?>