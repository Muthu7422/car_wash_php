<?php
include("../../includes.php");

	$echeck="select * from tbl_state where l_state = '".$_POST['state']."'";
    $echk=mysqli_query($conn,$echeck);
    $ecount=mysqli_fetch_array($echk); 
      
?>	  


