<?php
include("../../includes.php");
include("../../redirect.php");
$in="Update  reference_scheme set ReferenceId='".$_POST['ReferenceId']."',ReferenceAmount='".$_POST['ReferenceAmount']."',status='".$_POST['status']."' where Id='".$_POST['RID']."' ";
$Ein=mysqli_query($conn,$in);

header("location:reference_scheme.php?u=1");
?>