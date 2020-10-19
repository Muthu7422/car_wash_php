<?php
include("../../includes.php");
include("../../redirect.php");    
  
       $echeck="select * from s_job_card where job_card_no = '".$_POST['inputs']."'";
       $echk=mysqli_query($conn,$echeck);
       $ecount=mysqli_fetch_array($echk); 
      
	  $a=$ecount['jdate'];
	  $b=date("Y-m-d");
	  $date1 =date_create("$a");
      $date2 = date_create("$b");

//difference between two dates
//$diff = date_diff($date1,$date2);
//$c=$diff->format("%a");

$c =(strtotime($b) - strtotime($a)) / (60 * 60 * 24);

	
$start = strtotime('$date2');
$end = strtotime('$date1');
//$c = ceil(abs($end - $start) / 86400);
	
	
	
	   echo json_encode(array($a,$c));
	  // echo $ecount['vehicle_name'];
      
?>	  


