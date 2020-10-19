<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);


   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);
               
if($_POST['service_name']!="")
{
 $pm="insert into m_package_service_temp set package_no='".$_POST['package_no']."',Camount='".$_POST['Camount']."',package='".$_POST['package_name']."',v_type='".$_POST['vehcile_type']."',v_brand='".$_POST['vehcile_type']."',service='".$_POST['service_name']."',status='Active'"; 
$Epm=mysqli_query($conn,$pm);
$package_no=$_POST['package_no'];
header("location:package_master.php?package_no=$package_no");
}
else
{
	            $echeck2="select  *  from m_package_service_temp where package_no='".$_POST['package_no']."'";
				$echk2=mysqli_query($conn,$echeck2);
				$abc2=mysqli_fetch_array($echk2);
				
   $pm="insert into m_package set package_no='".$_POST['package_no']."',amount='".$_POST['amount']."',package_name='".$abc2['package']."',Tamount='".$_POST['Tamount']."',Camount='".$abc2['Camount']."',v_type='".$abc2['v_type']."',v_brand='".$abc2['v_brand']."',status='".$_POST['status']."',Remarks='".$_POST['remarks']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'"; 
$Epm=mysqli_query($conn,$pm);

    $pm1="insert into m_service_type set stype='".$_POST['package_name']."',installation_amt='".$_POST['amount']."',v_type='".$_POST['vehcile_type']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',status='Active'"; 
$Epm1=mysqli_query($conn,$pm1); 

				$echeck1="select  *  from m_package_service_temp where package_no='".$_POST['package_no']."'";
				$echk1=mysqli_query($conn,$echeck1);
				while($abc1=mysqli_fetch_array($echk1))
				{
   $pm="insert into m_package_service set package_no='".$_POST['package_no']."',service='".$abc1['service']."',Camount='".$abc1['Camount']."',Tamount='".$_POST['Tamount']."',package_name='".$abc1['package']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',status='".$_POST['status']."'"; 
$Epm=mysqli_query($conn,$pm); 

}

 $Spm="delete from  m_package_service_temp ";
$scm=mysqli_query($conn,$Spm);
header("location:package_master_view.php");
}


?>