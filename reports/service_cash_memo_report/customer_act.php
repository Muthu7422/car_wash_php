<?php
include("../../dbinfo.php");




$phone1="+91".$_POST['mobile1'];
$phone2="+91".$_POST['mobile2'];


 echo $pm="insert into a_customer set cust_no='".$_POST['customer_no']."',cust_name='".strtoupper($_POST['customer_name'])."',addr='".strtoupper($_POST['address'])."',mobile1='$phone1',mobile2='$phone2',email='".$_POST['email']."',cus_out_amt='".$_POST['cus_out_amt']."',status='Active'";  
$Epm=mysql_query($pm); 
$id=mysql_insert_id();

for($i=0;$i<10;$i++)
{
	if($_POST['vehicle_no'.$i]!="")
	{
  $Dm="insert into service_cash_memo_details set service_cash_memo_no='".$_POST['service_cash_memo_no']."',service_type='".$_POST['service_type'.$i]."',service_amount='".$_POST['service_amount'.$i]."',qty='".$_POST['qty'.$i]."',total_amount='".$_POST['installation_amt'.$i]."'"; exit;
		  $Epms=mysql_query($Dm); 
	}
	else
	{
		header("location:customer.php");
	}
}


header("location:customer.php");


?>