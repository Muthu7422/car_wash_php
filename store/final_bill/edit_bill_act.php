<?php
include("../../includes.php");

 $in="update a_bill set bill_date='".$_POST['bdate']."',vehicle_no='".$_POST['vno']."',cust_name='".$_POST['cname']."',cust_mobile='".$_POST['mobile']."',cust_addr='".$_POST['address']."',pay_mode='".$_POST['pmode']."',remarks='".$_POST['remark']."',spares_prepick='".$_POST['pre_pick']."',status='Active' where id='".$_REQUEST['id']."'";  
$Ein=mysqli_query($conn,$in);

header("location:final_bill.php?msg=1");
?>