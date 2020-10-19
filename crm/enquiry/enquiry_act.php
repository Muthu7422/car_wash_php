<?php
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

//$edc="insert into crm_enquiry set CustomerFirstName='".$_POST['CustomerFirstName']."',CustomerLastName='".$_POST['CustomerLastName']."',DateOfBirth='".$_POST['DateOfBirth']."',CustomerAddress='".$_POST['CustomerAddress']."',LeadSource='".$_POST['LeadSource']."',CustomerEmailId='".$_POST['CustomerEmailId']."',CustomerSkypeId='".$_POST['CustomerSkypeId']."',CustomerMobile1='".$_POST['CustomerMobile1']."',CustomerMobile2='".$_POST['CustomerMobile2']."',CustomerStreet='".$_POST['CustomerStreet']."',CustomerCity='".$_POST['CustomerCity']."',CustomerState='".$_POST['CustomerState']."',CustomerPinCode='".$_POST['CustomerPinCode']."',EnquiryDate='".$_POST['EnquiryDate']."',NextFollowDate='".$_POST['NextFollowDate']."',FranchiseeId='".$_POST['FranchiseeId']."',EnquiryStatus='1',Remarks='".$_POST['Remarks']."',Status='Active'";"
$edc="insert into crm_enquiry set CustomerFirstName='".$_POST['CustomerFirstName']."',CustomerLastName='".$_POST['CustomerLastName']."',DateOfBirth='".$_POST['DateOfBirth']."',LeadSource='".$_POST['LeadSource']."',CustomerEmailId='".$_POST['CustomerEmailId']."',CustomerMobile1='".$_POST['CustomerMobile1']."',CustomerMobile2='".$_POST['CustomerMobile2']."',Address='".$_POST['Address']."',Description='".$_POST['Description']."',ServiceId='".$_POST['ServiceId']."',FranchiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',Status='Active'";
$edw=mysqli_query($conn,$edc);
$id=mysqli_insert_id($conn);

for($i=1;$i<5;$i++)
{
	
	if($_POST['VehicleNo'.$i]!="")
	{
	$id1=$_POST['VehicleModel'.$i];
		$name=explode("-",$id1);
		$BrandName=trim($name[1]);
		
		
		$rvno=strtoupper(str_replace(" ","",$_POST['VehicleNo'.$i]));
	 	$Dm="insert into crm_enquiry_vehicle_details set crm_enquiry_no='$id',vehicle_no='$rvno',VehicleModel='$BrandName',VehicleBrand='".strtoupper($_POST['VehicleBrand'.$i])."',VehicleSegment='".strtoupper($_POST['VehicleSegment'.$i])."',VehicleType='".strtoupper($_POST['VehicleType'.$i])."',InsuranceCompnayName='".strtoupper($_POST['InsuranceCompnayName'.$i])."',InsuranceNumber='".strtoupper($_POST['InsuranceNumber'.$i])."',Year='".strtoupper($_POST['Year'.$i])."',InsuranceNumberExpiryDate='".$_POST['InsuranceNumberExpiryDate'.$i]."',FrachiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',UserId='".$_SESSION['UserId']."',status='Active'"; 
		$Epms=mysqli_query($conn,$Dm);   
		 }
	else
	{
		//exit();
		header("location:enquiry_view.php");
	}
	
}



header("Location:enquiry_view.php");
?>