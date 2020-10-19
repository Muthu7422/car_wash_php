<?php
include("../../dbinfoi.php");


$phone1=$_POST['mobile1'];
$phone2=$_POST['mobile2'];

 $pm="insert into a_customer set cust_name='".strtoupper($_POST['customer_name'])."',addr='".strtoupper($_POST['address'])."',mobile1='$phone1',mobile2='$phone2',email='".$_POST['email']."',v_no1='".strtoupper($_POST['vehicle_no2'])."',v_name1='".strtoupper($_POST['vehicle_name2'])."',v_make1='".strtoupper($_POST['vehicle_make2'])."',status=1";  
$Epm=mysqli_query($conn,$pm);

$vs="select * from a_customer where v_no1='".$_POST['vehicle_no2']."'";
$Evs=mysqli_query($conn,$vs);
$Fvs=mysqli_fetch_array($Evs);

if($_POST['add']!="")
{
header("location:customer1.php?id=".$Fvs['id']."");
}
else
{
header("location:customer.php");
}



?>