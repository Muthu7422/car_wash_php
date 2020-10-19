<?php
include("../../includes.php");
include("../../redirect.php");

 $_SESSION['ownership']=$_POST['ownership'];
$_SESSION['stype_no']=$_POST['stype_no'];
$_SESSION['stype']=$_POST['stype'];
$_SESSION['in_amt']=$_POST['in_amt'];
$_SESSION['labour_amt']=$_POST['labour_amt'];
$_SESSION['vehcile_type']=$_POST['vehcile_type'];
$_SESSION['stypeId']=$_POST['stypeId'];

if($_POST['spare_name']!='')
{

	
$ip=explode("/",$_POST['spare_name']);
	
  $in="insert into  m_service_type_temp set ownership='".$_POST['ownership']."',stype_no='".$_POST['stype_no']."',stype_name='".$_POST['stype']."',spare_name='".trim(end($ip))."',qty='".$_POST['qty']."',others='".$_POST['other']."',installation_amt='".$_POST['in_amt']."',labour_amt='".$_POST['labour_amt']."',show_option='".$_POST['show_option']."',v_type='".$_POST['vehcile_type']."',v_brand='".$_POST['vehcile_type']."',status='Active'";
//$Ein=mysqli_query($conn,$in);  
 $stype_no=$_POST['stypeId'];

 $stypeId=$_SESSION['stypeId'];
 
 $det="insert into m_service_type_details set service_type='".$_SESSION['stypeId']."',spare_name='".trim(end($ip))."',qty='".$_POST['qty']."',others='".$_POST['other']."',show_option='".$_POST['show_option']."',status='Active'";
$Fd=mysqli_query($conn,$det);

header("location:m_service_type_edit.php?id=$stype_no&id=$stypeId");
}
else
{ 
  $in1="update m_service_type set ownership='".$_SESSION['ownership']."',stype='".$_SESSION['stype']."',installation_amt='".$_SESSION['in_amt']."',labour_amt='".$_SESSION['labour_amt']."',v_type='".$_SESSION['vehcile_type']."',v_brand='".$_SESSION['vehcile_type']."',status='Active' where id='".$_POST['stypeId']."'"; 
$Ein1=mysqli_query($conn,$in1); 

$sql="delete from m_service_type_temp where stype_no='".$_POST['stype_no']."'";
$spm=mysqli_query($conn,$sql);
	

header("location:m_service_type.php?s=Saved Succesfully");
}
?>