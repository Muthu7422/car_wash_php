<?php
include("../../includes.php");
include("../../redirect.php");
$in="update m_payment_mode set PaymentMode='".$_POST['PaymentMode']."',PaymentDescription='".$_POST['PaymentDescription']."',Status='".$_POST['Status']."' where Id='".$_POST['Id']."'";
$Ein=mysqli_query($conn,$in);

header("location:m_payment_mode.php?msg=1");
?>