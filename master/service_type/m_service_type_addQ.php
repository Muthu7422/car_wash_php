<?php
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);

if(isset($_POST['submit']))
{
  $in="insert into  m_service_type_temp set ownership='".$_POST['ownership']."',stype_no='".$_POST['stype_no']."',vcategory='".$_POST['vcategory']."',stype_name='".$_POST['stype']."',spare_name='".$_POST['spare_name']."',qty='".$_POST['qty']."',hsn_code='".$_POST['hsn_code']."',others='".$_POST['other']."',installation_amt='".$_POST['in_amt']."',labour_amt='".$_POST['labour_amt']."',show_option='".$_POST['show_option']."',v_type='".$_POST['vehcile_type']."',v_brand='".$_POST['vehcile_type']."',status='Active'";
$Ein=mysqli_query($conn,$in);  
$stype_no=$_POST['stype_no'];

header("location:m_service_type.php?stype_no=$stype_no");
}
if(isset($_POST['complete']))
{ 

$names="select * from m_service_type_temp ";
$ns=mysqli_query($conn,$names);
while($jcd=mysqli_fetch_array($ns))
{
	
 $in1="insert into m_service_type set ownership='".$_POST['ownership']."',stype_no='".$_POST['stype_no']."',vcategory='".$jcd['vcategory']."',stype='".$jcd['stype_name']."',installation_amt='".$jcd['installation_amt']."',labour_amt='".$jcd['labour_amt']."',v_type='".$jcd['v_type']."',v_brand='".$jcd['v_brand']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',status='Active'"; 
$Ein1=mysqli_query($conn,$in1);
$iid=mysqli_insert_id($conn); 


$det="insert into m_service_type_details set service_type='$iid',spare_name='".$jcd['spare_name']."',qty='".$jcd['qty']."',hsn_code='".$jcd['hsn_code']."',others='".$jcd['others']."',show_option='".$jcd['show_option']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',status='Active'";
$Fd=mysqli_query($conn,$det);
}

 $sql="delete from m_service_type_temp";
$spm=mysqli_query($conn,$sql);
	

header("location:m_service_type_view.php?s=Saved Succesfully");
}
?>