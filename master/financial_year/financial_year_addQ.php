<?php
include("../../includes.php");
include("../../redirect.php");



$in="insert into  f_financial_year set financial_year='".$_POST['financial_year']."',start_date='".$_POST['start_date']."',end_date='".$_POST['end_date']."',sdescription='".$_POST['sdescription']."',status='Active'";
$Ein=mysqli_query($conn,$in);
header("location:financial_year_view.php?s=Date Save Sucessfully");


?>