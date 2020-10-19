<?php
include("../../dbinfoi.php");


$id=$_POST['sid'];

$sdetails="select * from s_job_card_sdetails_temp where id='$id'";
$sdetailssql=mysqli_query($conn,$sdetails);
$sd=mysqli_fetch_array($sdetailssql);

 $det="insert into s_job_card_recomdetails set job_card_no='".$sd['job_card_no']."',service_type='".$sd['service_type']."',st_amt='".$sd['st_amt']."',qty='".$sd['qty']."',remarks='".$sd['remarks']."',remarks_1='".$sd['remarks_1']."',RecomDate='".$_POST['Rdate']."',status='Active',ServiceStatus='Pending',customerId='".$_POST['Cust_Id']."'"; 
$Esr=mysqli_query($conn,$det);   

$edc="insert into crm_folllowup_main set CallPurpose='".$sd['job_card_no']."',RelatedTo='".$sd['service_type']."',CustomerId='".$_POST['Cust_Id']."',EnquiryDate='".date('Y-m-d')."',NextFollowDate='".$_POST['Rdate']."',Remarks='".$sd['remarks']."',EnquiryStatus='1'";
$edw=mysqli_query($conn,$edc); 
$RefNo=mysqli_insert_id($conn);

$edc="insert into crm_folllowup set RefNo='$RefNo',CallPurpose='".$sd['job_card_no']."',RelatedTo='".$sd['service_type']."',CustomerId='".$_POST['Cust_Id']."',EnquiryDate='".date('Y-m-d')."',NextFollowDate='".$_POST['Rdate']."',Remarks='".$sd['remarks']."',EnquiryStatus='1'";
$edw=mysqli_query($conn,$edc); 




$ct="delete from s_job_card_sdetails_temp where id='$id'";
$Ect=mysqli_query($conn,$ct);
$job_card_no=$_POST['job_card_no'];


header("location:s_jobcard.php?job_card_no=$job_card_no && id=#serv");
?>