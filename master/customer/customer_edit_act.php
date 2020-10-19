<?php
session_start();
include("../../dbinfoi.php");


   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  

 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

 $cs="update a_customer set MemberShip='".$_POST['Membership']."',cust_name='".strtoupper($_POST['customer_name'])."',company_name='".strtoupper($_POST['company_name'])."',last_name='".strtoupper($_POST['lname'])."',s_cust_name='".strtoupper($_POST['s_customer_name'])."',addr='".strtoupper($_POST['address'])."',s_addr='".strtoupper($_POST['s_address'])."',city='".strtoupper($_POST['city'])."',s_city='".strtoupper($_POST['s_city'])."',state='".strtoupper($_POST['state'])."',s_state='".strtoupper($_POST['s_state'])."',pincode='".strtoupper($_POST['pincode'])."',s_pincode='".strtoupper($_POST['s_pincode'])."',mobile1='".$_POST['mobile1']."',s_mobile1='".$_POST['s_mobile1']."',mobile2='".$_POST['mobile2']."',email='".$_POST['email']."',s_email='".$_POST['s_email']."',cus_out_amt='".$_POST['cus_out_amt']."',UserId='".$_SESSION['UserId']."',status='".$_POST['status']."',ledger_group='".$_POST['ledger_group']."',gst='".strtoupper($_POST['gst'])."',FrachiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."' where id='".$_REQUEST['id']."'";
$Ecs=mysqli_query($conn,$cs);


$lgr="Update m_ledger set LedgerGroup='26',LedgerName='".strtoupper($_POST['customer_name'])."',ContactNo='".$_POST['mobile1']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."' where Id='".$_POST['LedgerId']."'";
$ledgrp=mysqli_query($conn,$lgr);

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

 $io="INSERT INTO `cust_outstanding` (`id`, `cust_name`, `invoice`, `invoice_amt`, `p_date`, `paid_amt`, `paid_date`, `balance_amt`, `total_outstanding`, `ad_amount`, `tran_amount`, `payment_mode`) VALUES (NULL, '".$_POST['customer_name']."', '0', '0', '".date('Y-m-d')."', '0', '".date('Y-m-d')."', '0', '$ttlos', '".$_POST['cus_out_amt']."', '0', 'cash');";
$Eio=mysqli_query($conn,$io);


for($j=1;$j<10;$j++)
{
	if($j <= $_POST['va'])
	{
		 $rvno=strtoupper(str_replace(" ","",$_POST['vehicle_no'.$j]));
		    $Dm="update a_customer_vehicle_details set vehicle_no='$rvno',VehicleModel='".$_POST['VehicleModelId'.$j]."',VehicleBrand='".strtoupper($_POST['VehicleBrand'.$j])."',VehicleSegment='".strtoupper($_POST['VehicleSegment'.$j])."',VehicleType='".strtoupper($_POST['VehicleType'.$j])."',InsuranceCompnayName='".strtoupper($_POST['InsuranceCompnayName'.$j])."',InsuranceNumber='".strtoupper($_POST['InsuranceNumber'.$j])."',InsuranceNumberExpiryDate='".$_POST['InsuranceNumberExpiryDate'.$j]."',UserId='".$_SESSION['UserId']."',status='".$_POST['status'.$j]."',FrachiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."' where id='".$_POST['id'.$j]."'"; 
		  $Epms=mysqli_query($conn,$Dm);  
	}
	else
	{
		if($_POST['vehicle_no'.$j]!="")
		{
		 $rvno=strtoupper(str_replace(" ","",$_POST['vehicle_no'.$j]));
		$Dm="insert into a_customer_vehicle_details set cust_no='".$_REQUEST['id']."',cust_name='".strtoupper($_POST['customer_name'])."',VehicleModel='".$_POST['VehicleModelId'.$j]."',vehicle_no='$rvno',VehicleBrand='".strtoupper($_POST['VehicleBrand'.$j])."',VehicleSegment='".strtoupper($_POST['VehicleSegment'.$j])."',VehicleType='".strtoupper($_POST['VehicleType'.$j])."',InsuranceCompnayName='".strtoupper($_POST['InsuranceCompnayName'.$j])."',InsuranceNumber='".strtoupper($_POST['InsuranceNumber'.$j])."',InsuranceNumberExpiryDate='".$_POST['InsuranceNumberExpiryDate'.$j]."',UserId='".$_SESSION['UserId']."',FrachiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',status='Active'"; 
		$Epms=mysqli_query($conn,$Dm);
		}		
	}
}

header("location:customer_view.php?s=Data Updated Successfully!");

?>