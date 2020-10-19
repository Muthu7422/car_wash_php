<?php
include("../../includes.php");
include("../../redirect.php");


  $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var2=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

 $see2="select * from a_customer where mobile1='".$_POST['mobile']."'"; 
$absc2=mysqli_query($conn,$see2);
$tyi=mysqli_num_rows($absc2);
$var4=mysqli_fetch_array($absc2);

if($tyi>0){
		$som1="insert into s_job_card set job_card_no='".$_POST['job_card_no']."',vehicle_no='".$_POST['vno']."',total_amt='".$_POST['amount']."',gst_amt='".$_POST['Gamount']."',gst='".$_POST['gst']."',IncludeGst='".$_POST['tamount']."',BalanceAmount='".$_POST['tamount']."',saddress='".$_POST['address']."',TechnicianName='".$_POST['sengineer']."',financial_year='".$_SESSION['FinancialYear']."',status='Active',jcard_status='Open',FranchiseeId='".$var2['branch_id']."',vendor_id='".$var1['vendor_id']."',UserId='".$_SESSION['UserId']."',bookingid='".$_POST['bookingid']."',customer_id='".$var4['id']."',sname='".$_POST['cname']."',smobile='".$_POST['mobile']."',jdate='".$_POST['d']."',DeliveryTime='".$_POST['dtime']."',DeliveryDate='".$_POST['ddate']."',source='Myautocart'";
 $soms1=mysqli_query($conn,$som1); 
 $pcm2=mysqli_insert_id($conn);


 $som2="insert into s_job_card_sdetails set job_card_no='$pcm2',service_type='".$_POST['service_name']."',st_amt='".$_POST['amount']."',jdate='".$_POST['d']."',qty='1',status='Active',ServiceStatus='Pending'";
 $soms2=mysqli_query($conn,$som2); 

 
$upj="update job_card_no set jcn=jcn+1 where id='1'"; 
$upw=mysqli_query($conn,$upj);

$upj1="update myautocart_service_bookings set status='Job created' where id='".$_POST['bookingid']."'"; 
$upw1=mysqli_query($conn,$upj1);

}else 
{
	
	 $see4="select * from a_customer_vehicle_details where vehicle_no='".$_POST['vno']."'"; 
$absc4=mysqli_query($conn,$see4);
$tyi4=mysqli_num_rows($absc4);
$var5=mysqli_fetch_array($absc4);

if($tyi4>0){
	
	$som="insert into a_customer set cust_name='".$_POST['cname']."',last_name='".$_POST['lastname']."',status='Active',FrachiseeId='".$var2['branch_id']."',vendor_id='".$var1['vendor_id']."',UserId='".$_SESSION['UserId']."',addr='".$_POST['address']."',mobile1='".$_POST['mobile']."',email='".$_POST['email']."'";
 $soms=mysqli_query($conn,$som); 
 $pcm=mysqli_insert_id($conn);
 

 $som1="insert into s_job_card set job_card_no='".$_POST['job_card_no']."',vehicle_no='".$_POST['vno']."',total_amt='".$_POST['amount']."',gst_amt='".$_POST['Gamount']."',gst='".$_POST['gst']."',IncludeGst='".$_POST['tamount']."',BalanceAmount='".$_POST['tamount']."',saddress='".$_POST['address']."',TechnicianName='".$_POST['sengineer']."',financial_year='".$_SESSION['FinancialYear']."',status='Active',jcard_status='Open',FranchiseeId='".$var2['branch_id']."',vendor_id='".$var1['vendor_id']."',UserId='".$_SESSION['UserId']."',bookingid='".$_POST['bookingid']."',customer_id='$pcm',sname='".$_POST['cname']."',smobile='".$_POST['mobile']."',jdate='".$_POST['d']."',DeliveryTime='".$_POST['dtime']."',DeliveryDate='".$_POST['ddate']."',source='Myautocart'";
 $soms1=mysqli_query($conn,$som1); 
 $pcm1=mysqli_insert_id($conn);


 $som2="insert into s_job_card_sdetails set job_card_no='$pcm1',service_type='".$_POST['service_name']."',st_amt='".$_POST['amount']."',jdate='".$_POST['d']."',qty='1',status='Active',ServiceStatus='Pending'";
 $soms2=mysqli_query($conn,$som2); 

 
$upj="update job_card_no set jcn=jcn+1 where id='1'"; 
$upw=mysqli_query($conn,$upj);

$upj1="update myautocart_service_bookings set status='Job created' where id='".$_POST['bookingid']."'"; 
$upw1=mysqli_query($conn,$upj1);
}
else
{
	
	$som="insert into a_customer set cust_name='".$_POST['cname']."',last_name='".$_POST['lastname']."',status='Active',FrachiseeId='".$var2['branch_id']."',vendor_id='".$var1['vendor_id']."',UserId='".$_SESSION['UserId']."',addr='".$_POST['address']."',mobile1='".$_POST['mobile']."',email='".$_POST['email']."'";
 $soms=mysqli_query($conn,$som); 
 $pcm=mysqli_insert_id($conn);
 
 $som3="insert into a_customer_vehicle_details set cust_no='$pcm',cust_name='".$_POST['cname']."',last_name='".$_POST['lastname']."',status='Active',FrachiseeId='".$var2['branch_id']."',vendor_id='".$var1['vendor_id']."',UserId='".$_SESSION['UserId']."',VehicleModel='".$_POST['vmodel']."',vehicle_no='".$_POST['vno']."',VehicleSegment='".$_POST['segment']."',VehicleBrand='".$_POST['make']."',VehicleType='".$_POST['vehicle_type']."',Year='".$_POST['year']."'";
 $soms3=mysqli_query($conn,$som3); 
 $pcm3=mysqli_insert_id($conn);

 $som1="insert into s_job_card set job_card_no='".$_POST['job_card_no']."',vehicle_no='".$_POST['vno']."',total_amt='".$_POST['amount']."',gst_amt='".$_POST['Gamount']."',gst='".$_POST['gst']."',IncludeGst='".$_POST['tamount']."',BalanceAmount='".$_POST['tamount']."',saddress='".$_POST['address']."',TechnicianName='".$_POST['sengineer']."',financial_year='".$_SESSION['FinancialYear']."',status='Active',jcard_status='Open',FranchiseeId='".$var2['branch_id']."',vendor_id='".$var1['vendor_id']."',UserId='".$_SESSION['UserId']."',bookingid='".$_POST['bookingid']."',customer_id='$pcm',sname='".$_POST['cname']."',smobile='".$_POST['mobile']."',jdate='".$_POST['d']."',DeliveryTime='".$_POST['dtime']."',DeliveryDate='".$_POST['ddate']."',source='Myautocart'";
 $soms1=mysqli_query($conn,$som1); 
 $pcm1=mysqli_insert_id($conn);


 $som2="insert into s_job_card_sdetails set job_card_no='$pcm1',service_type='".$_POST['service_name']."',st_amt='".$_POST['amount']."',jdate='".$_POST['d']."',qty='1',status='Active',ServiceStatus='Pending'";
 $soms2=mysqli_query($conn,$som2); 

 
$upj="update job_card_no set jcn=jcn+1 where id='1'"; 
$upw=mysqli_query($conn,$upj);

$upj1="update myautocart_service_bookings set status='Job created' where id='".$_POST['bookingid']."'"; 
$upw1=mysqli_query($conn,$upj1);
}
}
header("location:../../services/job_card/s_jobcard_view.php");


?>