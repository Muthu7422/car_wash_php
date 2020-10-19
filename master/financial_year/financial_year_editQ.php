<?php
include("../../includes.php");
include("../../redirect.php");

$in="update f_financial_year set financial_year='".$_POST['financial_year']."',start_date='".$_POST['start_date']."',end_date='".$_POST['end_date']."',sdescription='".$_POST['sdescription']."',status='".$_POST['status']."' where id='".$_POST['id']."'";
$Ein=mysqli_query($conn,$in);

header("location:financial_year_view.php?msg=1");
?>