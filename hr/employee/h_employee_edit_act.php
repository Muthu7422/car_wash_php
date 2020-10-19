<?php
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);
 $pm="update h_employee set Franchiseeid='".$_POST['fran_name']."',ecode='".$_POST['ecode']."',ename='".strtoupper($_POST['ename'])."',emobile='".$_POST['emobile']."',smobile='".$_POST['smobile']."',eaddr='".$_POST['saddress']."',ecity='".strtoupper($_POST['scity'])."',estate='".strtoupper($_POST['sstate'])."',joindate='".$_POST['date']."',email='".$_POST['semail']."',edesign='".strtoupper($_POST['edesign'])."',edepart='".strtoupper($_POST['edept'])."',salary='".strtoupper($_POST['salary'])."',remarks='".strtoupper($_POST['remarks'])."',blood_group='".$_POST['blood_group']."',FrachiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',status='Active' where id='".$_POST['emp_id']."'";  
$Epm=mysqli_query($conn,$pm);


//select the path


//Upload the Employee Photo
if(basename($_FILES["EmployeePhoto"]["name"])!='')
{
	
	$id=$_POST['emp_id'];
	$dir = "employeefiles/".$id;
$files=mkdir($dir);
  $target_dir = "$dir/$files";
$target_file = $target_dir . basename($_FILES["EmployeePhoto"]["name"]);
$extension = pathinfo($_FILES["EmployeePhoto"]["name"], PATHINFO_EXTENSION);
$nname = mt_rand();
echo $upath=$target_dir . $nname.".".$extension; 
 $iupath=$target_dir . $nname.".".basename($_FILES["EmployeePhoto"]["name"]); 
move_uploaded_file($_FILES["EmployeePhoto"]["tmp_name"], $upath); 

 $emp_proof="Update h_employee_proof set ecode='".$_POST['ecode']."',EmployeePhoto='$upath' where emp_id='".$_POST['emp_id']."'";
$emp=mysqli_query($conn,$emp_proof);

}














//Upload the AatherCard Photo
if(basename($_FILES["AatherCard"]["name"])!='')
{
	$id=$_POST['emp_id'];
	$dir = "employeefiles/".$id;
$files=mkdir($dir);
  $target_dir = "$dir/$files";
$target_file = $target_dir . basename($_FILES["AatherCard"]["name"]);
$extension = pathinfo($_FILES["AatherCard"]["name"], PATHINFO_EXTENSION);
$nname = mt_rand();
echo $upathAatherCard=$target_dir . $nname.".".$extension;
 $iupath=$target_dir . $nname.".".basename($_FILES["AatherCard"]["name"]); 
move_uploaded_file($_FILES["AatherCard"]["tmp_name"], $upathAatherCard); 

$emp_proof="Update h_employee_proof set ecode='".$_POST['ecode']."',AatherCard='$upathAatherCard' where emp_id='".$_POST['emp_id']."'";
$emp=mysqli_query($conn,$emp_proof);

}














//Upload the Pancard Photo
if(basename($_FILES["Pancard"]["name"])!='')
{
	$id=$_POST['emp_id'];
	$dir = "employeefiles/".$id;
$files=mkdir($dir);
  $target_dir = "$dir/$files";
$target_file = $target_dir . basename($_FILES["Pancard"]["name"]);
$extension = pathinfo($_FILES["Pancard"]["name"], PATHINFO_EXTENSION);
$nname = mt_rand();
 echo $upathPancard=$target_dir . $nname.".".$extension;
 $iupath=$target_dir . $nname.".".basename($_FILES["Pancard"]["name"]); 
move_uploaded_file($_FILES["Pancard"]["tmp_name"], $upathPancard); 

$emp_proof="Update h_employee_proof set ecode='".$_POST['ecode']."',Pancard='$upathPancard' where emp_id='".$_POST['emp_id']."'";
$emp=mysqli_query($conn,$emp_proof);


}





//Upload the DrivingLicence Photo
if(basename($_FILES["DrivingLicence"]["name"])!='')
{
	$id=$_POST['emp_id'];
	$dir = "employeefiles/".$id;
$files=mkdir($dir);
  $target_dir = "$dir/$files";
$target_file = $target_dir . basename($_FILES["DrivingLicence"]["name"]);
$extension = pathinfo($_FILES["DrivingLicence"]["name"], PATHINFO_EXTENSION);
$nname = mt_rand();
echo $upathDrivingLicence=$target_dir . $nname.".".$extension;
 $iupath=$target_dir . $nname.".".basename($_FILES["DrivingLicence"]["name"]); 
move_uploaded_file($_FILES["DrivingLicence"]["tmp_name"], $upathDrivingLicence); 

$emp_proof="Update h_employee_proof set ecode='".$_POST['ecode']."',DrivingLicence='$upathDrivingLicence' where emp_id='".$_POST['emp_id']."'";
$emp=mysqli_query($conn,$emp_proof);


}








//Upload the VoterId Photo
if(basename($_FILES["VoterId"]["name"])!='')
{
	$id=$_POST['emp_id'];
	$dir = "employeefiles/".$id;
$files=mkdir($dir);
  $target_dir = "$dir/$files";
$target_file = $target_dir . basename($_FILES["VoterId"]["name"]);
$extension = pathinfo($_FILES["VoterId"]["name"], PATHINFO_EXTENSION);
$nname = mt_rand();
echo $upathVoterId=$target_dir . $nname.".".$extension;
 $iupath=$target_dir . $nname.".".basename($_FILES["VoterId"]["name"]); 
move_uploaded_file($_FILES["VoterId"]["tmp_name"], $upathVoterId); 

$emp_proof="Update h_employee_proof set ecode='".$_POST['ecode']."',VoterId='$upathVoterId' where emp_id='".$_POST['emp_id']."'";
$emp=mysqli_query($conn,$emp_proof);
}







//Upload the OtherDocuments Photo
if(basename($_FILES["OtherDocuments"]["name"])!='')
{
	$id=$_POST['emp_id'];
	$dir = "employeefiles/".$id;
$files=mkdir($dir);
  $target_dir = "$dir/$files";
$target_file = $target_dir . basename($_FILES["OtherDocuments"]["name"]);
$extension = pathinfo($_FILES["OtherDocuments"]["name"], PATHINFO_EXTENSION);
$nname = mt_rand();
echo $upathOtherDocuments=$target_dir . $nname.".".$extension;
 $iupath=$target_dir . $nname.".".basename($_FILES["OtherDocuments"]["name"]); 
move_uploaded_file($_FILES["OtherDocuments"]["tmp_name"], $upathOtherDocuments); 

$emp_proof="Update h_employee_proof set ecode='".$_POST['ecode']."',OtherDocuments='$upathOtherDocuments' where emp_id='".$_POST['emp_id']."'";
$emp=mysqli_query($conn,$emp_proof);

}
header("location:h_employee_view.php");

?>