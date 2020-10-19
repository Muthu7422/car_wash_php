<?php
include("../../includes.php");
include("../../redirect.php");


		$dcm="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'";
		$prs=mysqli_query($conn,$dcm);
		$sdm=mysqli_fetch_array($prs); 

		
				$ps="select IFNULL(sum(package_amt),0) as package_amt from s_job_card_pdetails where job_card_no='".$sdm['id']."' and status='Active'";
				$psb=mysqli_query($conn,$ps);
				$pamt=mysqli_fetch_array($psb);
				
				$pw="select IFNULL(sum(st_amt),0) as st_amt from s_job_card_sdetails where job_card_no='".$sdm['id']."' and status='Active'";
				$pse=mysqli_query($conn,$pw);
				$samt=mysqli_fetch_array($pse);
				
				$total=$pamt['package_amt']+$samt['st_amt'];


 $rmp="update s_job_card set total_amt='$total' where job_card_no='".$_REQUEST['job_card_no']."'"; 
$scm=mysqli_query($conn,$rmp);

$job_card_no=$_REQUEST['job_card_no'];
header("location:s_jobcard_receipt.php?job_card_no=$job_card_no");
?>