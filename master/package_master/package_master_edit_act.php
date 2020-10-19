<?php
include("../../includes.php");
include("../../redirect.php");

 $pm="update m_package set package_no='".$_POST['package_no']."',amount='".$_POST['amount']."',Tamount='".$_POST['Tamount']."',Camount='".$_POST['Camount']."',package_name='".$_POST['package_name']."',v_type='".$_POST['vehcile_type']."',v_brand='".$_POST['vehcile_type']."',status='".$_POST['status']."',Remarks='".$_POST['remarks']."' where id='".$_POST['Id']."'"; 
$Epm=mysqli_query($conn,$pm); 

$aac="select * from m_package_service where package_no='".$_POST['package_no']."'";
$aacq=mysqli_query($conn,$aac);
while($aacf=mysqli_fetch_array($aacq))
{

$pm12="update m_package_service set package_name='".$_POST['package_name']."' where package_no='".$_POST['package_no']."'"; 
$Epm12=mysqli_query($conn,$pm12); 

 $pm12="update m_service_type set stype='".$_POST['package_name']."',installation_amt='".$_POST['amount']."',v_type='".$_POST['vehcile_type']."' where id='".$_POST['id']."'"; 
$Epm12=mysqli_query($conn,$pm12); 
}
               
if($_POST['service_name']!='')
{

 $pm12="update m_package_service set package_name='".$_POST['package_name']."' where package_no='".$_POST['package_no']."'"; 
$Epm12=mysqli_query($conn,$pm12);  

  $pm1="insert into m_service_type set stype='".$_POST['package_name']."',installation_amt='".$_POST['amount']."',v_type='".$_POST['vehcile_type']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',status='Active'"; 
$Epm1=mysqli_query($conn,$pm1);

 $pm1="insert into m_package_service set package_no='".$_POST['package_no']."',service='".$_POST['service_name']."',Tamount='".$_POST['Tamount']."',Camount='".$_POST['Camount']."',package_name='".$_POST['package_name']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',status='Active'"; 
$Epm1=mysqli_query($conn,$pm1);  


$package_no=$_POST['package_no'];
header("location:package_master_edit.php?package_no=$package_no");
}
else
{
header("location:package_master_view.php");
}
?>