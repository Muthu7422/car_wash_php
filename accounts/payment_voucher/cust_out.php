<?php
include("../../includes.php");    
  
	   $echeck="select * from sup_outstanding where sup_name='".$_POST['inputs']."' order by id desc"; 
       $echk=mysqli_query($conn,$echeck);
        $ecount=mysqli_fetch_array($echk); 
      
	   echo $ecount['total_outstanding'];
      
?>	  


