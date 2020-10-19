<?php
include("../../dbinfoi.php");

 $pm="update h_designation set dname='".strtoupper($_POST['stype'])."',description='".strtoupper($_POST['sdescription'])."',status='Active' where id='".$_REQUEST['id']."'";  
$Epm=mysqli_query($conn,$pm);

header("location:h_designation.php");

?>