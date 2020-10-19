<?php
include("../../includes.php");

$smp="select mobile1 from a_customer where mobile1='".$_POST['mobile1']."'"; 
$Esmp=mysqli_query($conn,$smp);
$mpr=mysqli_num_rows($Esmp);

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);


if($mpr>0)
{
	
header("location:customer.php?a=3");
exit();		
}else{

$phone1=$_POST['mobile1'];
$s_phone1=$_POST['s_mobile1'];
$phone2=$_POST['mobile2'];
$s_phone2=$_POST['s_mobile2'];

 $pm="insert into a_customer set MemberShip='".$_POST['Membership']."',cust_no='".$_POST['customer_no']."',company_name='".$_POST['company_name']."',cust_name='".strtoupper($_POST['customer_name'])."',last_name='".strtoupper($_POST['lname'])."',s_cust_name='".strtoupper($_POST['s_customer_name'])."',addr='".strtoupper($_POST['address'])."',s_addr='".strtoupper($_POST['s_address'])."',city='".strtoupper($_POST['city'])."',s_city='".strtoupper($_POST['s_city'])."',state='".strtoupper($_POST['state'])."',s_state='".strtoupper($_POST['s_state'])."',pincode='".strtoupper($_POST['pincode'])."',s_pincode='".strtoupper($_POST['s_pincode'])."',mobile1='$phone1',s_mobile1='$s_phone1',mobile2='$phone2',s_mobile2='$s_phone2',email='".$_POST['email']."',s_email='".$_POST['s_email']."',cus_out_amt='".$_POST['cus_out_amt']."',gst='".$_POST['gst']."',UserId='".$_SESSION['UserId']."',status='Active',ledger_group='".$_POST['ledger_group']."',refer='".$_POST['refer']."',s_refer='".$_POST['s_refer']."',AMC='".$_POST['AquraMiles']."',FrachiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";  
$Epm=mysqli_query($conn,$pm); 
$id=mysqli_insert_id($conn);

 $lgr="insert into m_ledger set LedgerGroup='26',LedgerName='".strtoupper($_POST['customer_name'])."',ContactNo='$phone1',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
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
		
	
	
		$rvno=strtoupper(str_replace(" ","",$_POST['VehicleNo'.$i]));
 	$Dm="insert into a_customer_vehicle_details set cust_no='$id',cust_name='".strtoupper($_POST['customer_name'])."',vehicle_no='$rvno',VehicleModel='".$_POST['VehicleModelId'.$i]."',VehicleBrand='".strtoupper($_POST['VehicleBrand'.$i])."',VehicleSegment='".strtoupper($_POST['VehicleSegment'.$i])."',VehicleType='".strtoupper($_POST['VehicleType'.$i])."',InsuranceCompnayName='".strtoupper($_POST['InsuranceCompnayName'.$i])."',InsuranceNumber='".strtoupper($_POST['InsuranceNumber'.$i])."',Year='".strtoupper($_POST['Year'.$i])."',InsuranceNumberExpiryDate='".$_POST['InsuranceNumberExpiryDate'.$i]."',UserId='".$_SESSION['UserId']."',status='Active',FrachiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'"; 
		$Epms=mysqli_query($conn,$Dm);  
		 
	}
	else
	{
		//exit();
		header("location:customer_view.php");
	}
}

//exit();
header("location:../../services/job_card/s_jobcard.php?mobile1=$phone1&temp=del");
}

?>