<?php
include("../../includes.php");
include("../../redirect.php");

$edc="insert into crm_folllowup set RefNo='".$_POST['RefNo']."',RelatedTo='".$_POST['RelatedToService']."',CustomerId='".$_POST['CustomerId']."',EnquiryDate='".$_POST['EnquiryDate']."',NextFollowDate='".$_POST['NextAppointment']."',Remarks='".$_POST['Remarks']."',EnquiryStatus='".$_POST['EnquiryStatus']."'";
$edw=mysql_query($conn,$edc); 

$Rtp="update crm_folllowup_main set NextFollowDate='".$_POST['NextAppointment']."',EnquiryStatus='".$_POST['EnquiryStatus']."' where Id='".$_POST['RefNo']."'";
$Epo=mysql_query($conn,$Rtp);

header("location:recomdetails.php");
?>