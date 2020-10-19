<?php
include("../../dbinfoi.php");    
  
	    $echeck="select * from a_customer where id='".trim($_POST['inputs1'])."' order by id desc"; 
       $echk=mysqli_query($conn,$echeck);
        $ecount=mysqli_fetch_array($echk); 
      
	 echo  $admount=trim($ecount['mobile1']);
	  
	  
?>	  


