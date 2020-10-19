<?php
include("../../includes.php");
include("../../redirect.php");
$in="update emp_accom set Date='".$_POST['Date']."',Pay_mode='".$_POST['Pay_mode']."',LedgerGroup='".$_POST['LedgerGroup']."',Amount='".$_POST['Amount']."',No_of_Emp='".$_POST['No_of_Emp']."',rent_per_emp='".$_POST['rent_per_emp']."' and Status='".$_POST['Status']."' where Id='".$_POST['Id']."'";
$Ein=mysqli_query($conn,$in);

header("location:a_emp_accom.php?msg=1");
?>