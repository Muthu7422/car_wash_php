<?php
include("../../includes.php");
include("../../redirect.php");   
  
	   $echeck="select units from m_spare where sid='".$_POST['inputs']."' and status='Active'"; 
       $echk=mysqli_query($conn,$echeck);
        $ecount=mysqli_fetch_array($echk); 
      
	   echo $ecount['units'];
      
?>	  


