<?php
include("../../dbinfo.php");




$phone1="+91".$_POST['mobile1'];
$phone2="+91".$_POST['mobile2'];


 $pm="insert into a_customer set cust_no='".$_POST['customer_no']."',cust_name='".strtoupper($_POST['customer_name'])."',addr='".strtoupper($_POST['address'])."',mobile1='$phone1',mobile2='$phone2',email='".$_POST['email']."',cus_out_amt='".$_POST['cus_out_amt']."',status='Active'";  
$Epm=mysql_query($pm); 
$id=mysql_insert_id();

for($i=0;$i<10;$i++)
{
	if($_POST['vehicle_no'.$i]!="")
	{
		  $Dm="insert into a_customer_vehicle_details set cust_no='$id',cust_name='".strtoupper($_POST['customer_name'])."',vehicle_no='".strtoupper($_POST['vehicle_no'.$i])."',vehicle_name='".strtoupper($_POST['vehicle_name'.$i])."',vehicle_make='".strtoupper($_POST['vehicle_make'.$i])."',status='Active'"; 
		  $Epms=mysql_query($Dm); 
	}
	else
	{
		header("location:customer.php");
	}
}


header("location:customer.php");


?>