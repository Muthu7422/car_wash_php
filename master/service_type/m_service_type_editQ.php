<?php
include("../../includes.php");
include("../../redirect.php");

 

if($_POST['spare_name']!='')
{
 $in="insert into  m_service_type_temp set hsn_code='".$_POST['hsn_code']."',ownership='".$_POST['ownership']."',stype_no='".$_POST['stype_no']."',vcategory='".$_POST['vcategory']."',stype_name='".$_POST['stype']."',spare_name='".$_POST['spare_name']."',qty='".$_POST['qty']."',hsn_code='".$_POST['hsn_code']."',others='".$_POST['other']."',installation_amt='".$_POST['in_amt']."',labour_amt='".$_POST['labour_amt']."',show_option='".$_POST['show_option']."',v_type='".$_POST['vehcile_type']."',v_brand='".$_POST['vehcile_type']."',status='Active'";
$Ein=mysqli_query($conn,$in);  
$stype_no=$_POST['stype_no'];

header("location:m_service_type_edit.php?stype_no=$stype_no");
}
else
{ 
 $in1="update m_service_type set ownership='".$_POST['ownership']."',vcategory='".$_POST['vcategory']."',stype='".$_POST['stype']."',installation_amt='".$_POST['in_amt']."',labour_amt='".$_POST['labour_amt']."',v_type='".$_POST['vehcile_type']."',v_brand='".$_POST['vehcile_brand']."',status='Active' where stype_no='".$_POST['stype_no']."'"; 
$Ein1=mysqli_query($conn,$in1); 
$iid=mysqli_insert_id($conn); 


 $names="select * from m_service_type_temp where stype_no='".$_POST['stype_no']."'"; 
$ns=mysqli_query($conn,$names);
while($jcd=mysqli_fetch_array($ns))
{
							

 $det="insert into m_service_type_details set hsn_code='".$_POST['hsn_code']."',service_type='".$_POST['stypeId']."',spare_name='".$jcd['spare_name']."',qty='".$jcd['qty']."',others='".$jcd['others']."',show_option='".$jcd['show_option']."',status='Active'";
$Fd=mysqli_query($conn,$det);
}

$sql="delete from m_service_type_temp ";
$spm=mysqli_query($conn,$sql);
	

header("location:m_service_type_view.php?s=Saved Succesfully");
}
?>