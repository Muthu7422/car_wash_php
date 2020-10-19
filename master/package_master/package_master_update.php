<?php
include("../../dbinfoi.php");


$pm="select * from a_customer where customer='".$_POST['categoryname']."'"; 
$Epm=mysqli_query($conn,$pm);
$Fpm=mysqli_fetch_array($Epm);


$n = mysqli_num_rows($Epm); 

$phone1="+91".$_POST['mobile1'];
$phone2="+91".$_POST['mobile2'];

 $pm="insert into a_customer set cust_name='".strtoupper($_POST['customer_name'])."',addr='".strtoupper($_POST['address'])."',mobile1='$phone1',mobile2='$phone2',email='".$_POST['email']."',v_no1='".strtoupper($_POST['vehicle_no1'])."',v_name1='".strtoupper($_POST['vehicle_name1'])."',v_make1='".strtoupper($_POST['vehicle_make1'])."',status=1";  exit;
$Epm=mysqli_query($conn,$pm);

$vs="select * from a_customer where vno1='".$_POST['vehicle_no1']."'";
$Evs=mysqli_query($conn,$vs);
$Fvs=mysqli_fetch_array($Evs);

header("location:customer1.php?id='".$Fvs['id']."'");

?>