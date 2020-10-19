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
//$edc="update crm_enquiry set CustomerFirstName='".$_POST['CustomerFirstName']."',CustomerLastName='".$_POST['CustomerLastName']."',DateOfBirth='".$_POST['DateOfBirth']."',CustomerCountry='".$_POST['CustomerCountry']."',CompanyName='".$_POST['CompanyName']."',DateOfBirth='".$_POST['DateOfBirth']."',LeadSource='".$_POST['LeadSource']."',CustomerEmailId='".$_POST['CustomerEmailId']."',CustomerSkypeId='".$_POST['CustomerSkypeId']."',CustomerMobile1='".$_POST['CustomerMobile1']."',CustomerMobile2='".$_POST['CustomerMobile2']."',CustomerStreet='".$_POST['CustomerStreet']."',CustomerCity='".$_POST['CustomerCity']."',CustomerState='".$_POST['CustomerState']."',CustomerPinCode='".$_POST['CustomerPinCode']."',Description='".$_POST['Description']."'  where Id='".$_POST['CustomerId']."'";
$edc="update crm_enquiry set CustomerFirstName='".$_POST['CustomerFirstName']."',CustomerLastName='".$_POST['CustomerLastName']."',DateOfBirth='".$_POST['DateOfBirth']."',LeadSource='".$_POST['LeadSource']."',CustomerEmailId='".$_POST['CustomerEmailId']."',CustomerMobile1='".$_POST['CustomerMobile1']."',CustomerMobile2='".$_POST['CustomerMobile2']."',Address='".$_POST['Address']."',Description='".$_POST['Description']."',ServiceId='".$_POST['ServiceId']."',FranchiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',Status='Active' where Id='".$_POST['CustomerId']."'";
$edw=mysqli_query($conn,$edc);



for($j=1;$j<10;$j++)
{
	if($j <= $_POST['va'])
	{
		 $rvno=strtoupper(str_replace(" ","",$_POST['vehicle_no'.$j]));
	 	$Dm="update  crm_enquiry_vehicle_details set crm_enquiry_no='".$_POST['CustomerId']."',vehicle_no='$rvno',VehicleModel='".strtoupper($_POST['VehicleModel'.$j])."',VehicleBrand='".strtoupper($_POST['VehicleBrand'.$j])."',VehicleSegment='".strtoupper($_POST['VehicleSegment'.$j])."',VehicleType='".strtoupper($_POST['VehicleType'.$j])."',InsuranceCompnayName='".strtoupper($_POST['InsuranceCompnayName'.$j])."',InsuranceNumber='".strtoupper($_POST['InsuranceNumber'.$j])."',Year='".strtoupper($_POST['Year'.$j])."',InsuranceNumberExpiryDate='".$_POST['InsuranceNumberExpiryDate'.$j]."',FrachiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',UserId='".$_SESSION['UserId']."',status='Active' where id='".$_POST['id'.$j]."'"; 
		  $Epms=mysqli_query($conn,$Dm);  
	}
	else
	{
		if($_POST['vehicle_no'.$j]!="")
		{
		 $rvno=strtoupper(str_replace(" ","",$_POST['vehicle_no'.$j]));
	 	$Dm="insert into crm_enquiry_vehicle_details set crm_enquiry_no='".$_REQUEST['id']."',vehicle_no='$rvno',VehicleModel='".strtoupper($_POST['VehicleModel'.$j])."',VehicleBrand='".strtoupper($_POST['VehicleBrand'.$j])."',VehicleSegment='".strtoupper($_POST['VehicleSegment'.$j])."',VehicleType='".strtoupper($_POST['VehicleType'.$j])."',InsuranceCompnayName='".strtoupper($_POST['InsuranceCompnayName'.$j])."',InsuranceNumber='".strtoupper($_POST['InsuranceNumber'.$j])."',Year='".strtoupper($_POST['Year'.$j])."',InsuranceNumberExpiryDate='".$_POST['InsuranceNumberExpiryDate'.$j]."',FrachiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',UserId='".$_SESSION['UserId']."',status='Active'"; 
		$Epms=mysqli_query($conn,$Dm);
		}		
	}
}


header("Location:enquiry_view.php");
?>