<?php
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

 $pm="insert into h_employee set Franchiseeid='".$_POST['fran_name']."',ecode='".$_POST['ecode']."',ename='".strtoupper($_POST['ename'])."',emobile='".$_POST['emobile']."',smobile='".$_POST['smobile']."',eaddr='".$_POST['saddress']."',ecity='".strtoupper($_POST['scity'])."',estate='".strtoupper($_POST['sstate'])."',joindate='".$_POST['date']."',email='".$_POST['semail']."',edesign='".strtoupper($_POST['edesign'])."',edepart='".strtoupper($_POST['edept'])."',salary='".strtoupper($_POST['salary'])."',remarks='".strtoupper($_POST['remarks'])."',blood_group='".$_POST['blood_group']."',FrachiseeId='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',status='Active'";  
$Epm=mysqli_query($conn,$pm);
$id=mysqli_insert_id($conn);


//select the path
$dir = "employeefiles/".$id;
$files=mkdir($dir);

//Upload the Employee Photo
  $target_dir = "$dir/$files";
$target_file = $target_dir . basename($_FILES["EmployeePhoto"]["name"]);
$extension = pathinfo($_FILES["EmployeePhoto"]["name"], PATHINFO_EXTENSION);
$nname = mt_rand();
 $upath=$target_dir . $nname.".".$extension;
 $iupath=$target_dir . $nname.".".basename($_FILES["EmployeePhoto"]["name"]); 
move_uploaded_file($_FILES["EmployeePhoto"]["tmp_name"], $upath); 




//Upload the AatherCard Photo
  $target_dir = "$dir/$files";
$target_file = $target_dir . basename($_FILES["AatherCard"]["name"]);
$extension = pathinfo($_FILES["AatherCard"]["name"], PATHINFO_EXTENSION);
$nname = mt_rand();
 $upathAatherCard=$target_dir . $nname.".".$extension;
 $iupath=$target_dir . $nname.".".basename($_FILES["AatherCard"]["name"]); 
move_uploaded_file($_FILES["AatherCard"]["tmp_name"], $upathAatherCard); 




//Upload the Pancard Photo
  $target_dir = "$dir/$files";
$target_file = $target_dir . basename($_FILES["Pancard"]["name"]);
$extension = pathinfo($_FILES["Pancard"]["name"], PATHINFO_EXTENSION);
$nname = mt_rand();
 $upathPancard=$target_dir . $nname.".".$extension;
 $iupath=$target_dir . $nname.".".basename($_FILES["Pancard"]["name"]); 
move_uploaded_file($_FILES["Pancard"]["tmp_name"], $upathPancard); 





//Upload the DrivingLicence Photo
  $target_dir = "$dir/$files";
$target_file = $target_dir . basename($_FILES["DrivingLicence"]["name"]);
$extension = pathinfo($_FILES["DrivingLicence"]["name"], PATHINFO_EXTENSION);
$nname = mt_rand();
 $upathDrivingLicence=$target_dir . $nname.".".$extension;
 $iupath=$target_dir . $nname.".".basename($_FILES["DrivingLicence"]["name"]); 
move_uploaded_file($_FILES["DrivingLicence"]["tmp_name"], $upathDrivingLicence); 





//Upload the VoterId Photo
  $target_dir = "$dir/$files";
$target_file = $target_dir . basename($_FILES["VoterId"]["name"]);
$extension = pathinfo($_FILES["VoterId"]["name"], PATHINFO_EXTENSION);
$nname = mt_rand();
 $upathVoterId=$target_dir . $nname.".".$extension;
 $iupath=$target_dir . $nname.".".basename($_FILES["VoterId"]["name"]); 
move_uploaded_file($_FILES["VoterId"]["tmp_name"], $upathVoterId); 






//Upload the OtherDocuments Photo
  $target_dir = "$dir/$files";
$target_file = $target_dir . basename($_FILES["OtherDocuments"]["name"]);
$extension = pathinfo($_FILES["OtherDocuments"]["name"], PATHINFO_EXTENSION);
$nname = mt_rand();
 $upathOtherDocuments=$target_dir . $nname.".".$extension;
 $iupath=$target_dir . $nname.".".basename($_FILES["OtherDocuments"]["name"]); 
move_uploaded_file($_FILES["OtherDocuments"]["tmp_name"], $upathOtherDocuments); 

$emp_proof="insert into h_employee_proof set emp_id='$id',ecode='".$_POST['ecode']."',EmployeePhoto='$upath',AatherCard='$upathAatherCard',Pancard='$upathPancard',DrivingLicence='$upathDrivingLicence',VoterId='$upathVoterId',OtherDocuments='$upathOtherDocuments'";
$emp=mysqli_query($conn,$emp_proof);


header("location:h_employee_view.php");

?>