<?php
include("../../dbinfoi.php");





$pm="insert into h_designation set dname='".strtoupper($_POST['stype'])."',description='".strtoupper($_POST['sdescription'])."',status='Active'";  
$Epm=mysqli_query($conn,$pm);

header("location:h_designation.php");

?>