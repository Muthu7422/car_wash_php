<?php 
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

 $echeck="select * from m_service_type where stype='".trim($_POST['service_name'])."'"; 	
$echk=mysql_query($echeck);
$ecount=mysql_fetch_array($echk);	
					
 $pm="insert into m_package_service set package_no='".$_POST['package_no']."',ServiceId='".$ecount['id']."',service='".trim($_POST['service_name'])."',package_name='".$_POST['package_name']."',status='Active'"; 
$Epm=mysql_query($pm);
$pno=$_POST['package_no'];

header("location:service_package_detail.php?package_no=$pno");
?>