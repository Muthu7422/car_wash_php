<?php
include("../../includes.php");
include("../../redirect.php");

 $_SESSION['stype_no']=$_POST['stype_no'];
//echo "</br>";
 $_SESSION['ownership']=$_POST['ownership'];
//echo "</br>";
 $_SESSION['stype_name']=$_POST['stype'];
//echo "</br>";
 $_SESSION['installation_amt']=$_POST['in_amt'];
//echo "</br>";
 $_SESSION['labour_amt']=$_POST['labour_amt'];
//echo "</br>";
 $_SESSION['v_type']=$_POST['vehcile_type'];
//echo "</br>";


if(isset($_POST['submit']))
{





	
	$ip=explode("/",$_POST['spare_name']);

	
 $in="insert into  m_service_type_temp set ownership='".$_POST['ownership']."',stype_no='".$_POST['stype_no']."',stype_name='".$_POST['stype']."',spare_name='".trim(end($ip))."',qty='".$_POST['qty']."',others='".$_POST['other']."',installation_amt='".$_POST['in_amt']."',labour_amt='".$_POST['labour_amt']."',show_option='".$_POST['show_option']."',v_type='".$_POST['vehcile_type']."',v_brand='".$_POST['vehcile_type']."',status='Active'";
$Ein=mysql_query($in);  
$stype_no=$_POST['stype_no'];

header("location:m_service_type.php?stype_no=$stype_no");
}
if(isset($_POST['complete']))
{ 

 $in1="insert into m_service_type set ownership='".$_SESSION['ownership']."',stype_no='".$_SESSION['stype_no']."',stype='".$_SESSION['stype_name']."',installation_amt='".$_SESSION['installation_amt']."',labour_amt='".$_SESSION['labour_amt']."',v_type='".$_SESSION['v_type']."',v_brand='".$_SESSION['v_type']."',status='Active'"; 
$Ein1=mysql_query($in1);
$iid=mysql_insert_id(); 


$names="select * from m_service_type_temp where stype_no='".$_POST['stype_no']."'";
$ns=mysql_query($names);
while($jcd=mysql_fetch_array($ns))
{
	



 $det="insert into m_service_type_details set service_type='$iid',spare_name='".$jcd['spare_name']."',qty='".$jcd['qty']."',others='".$jcd['others']."',show_option='".$jcd['show_option']."',status='Active'";
$Fd=mysql_query($det);
}

//exit();
$sql="delete from m_service_type_temp where stype_no='".$_SESSION['stype_no']."'";
$spm=mysql_query($sql);
	

header("location:m_service_type.php?s=Saved Succesfully");
}
?>