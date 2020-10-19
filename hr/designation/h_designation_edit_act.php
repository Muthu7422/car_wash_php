<?php
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);


 $pm="update h_designation set dname='".strtoupper($_POST['stype'])."',description='".strtoupper($_POST['sdescription'])."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',status='Active' where id='".$_REQUEST['id']."'";  
$Epm=mysqli_query($conn,$pm);

header("location:h_designation_view.php");

?>