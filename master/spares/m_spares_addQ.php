<?php
include("../../includes.php");
include("../../redirect.php");

$see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


$see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);


   $in="insert into  m_spare set units='".$_POST['units']."',hsn_code='".$_POST['hsn']."',stype='".$_POST['stype']."',sbrand='".$_POST['sbrand']."',sname='".$_POST['sname']."',spartno='".$_POST['spartno']."',smrp='".$_POST['smrp']."',ssupplier='".$_POST['ssupplier']."',min_stock='".$_POST['min_stock']."',TaxRate='".$_POST['TaxRate']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."',status='Active'"; 
$Ein=mysqli_query($conn,$in);

header("location:m_spares_view.php?s=1");
?>