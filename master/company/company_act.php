<?php
include("../../dbinfoi.php");
$target_dir = "company_logo/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

$phone1="+91".$_POST['mobile1'];
$phone2="+91".$_POST['mobile2'];


 $pm="insert into  m_company set company_code='".$_POST['company_no']."',cus_name='".strtoupper($_POST['company_name'])."',a_addrs='".strtoupper($_POST['address'])."',mobile1='$phone1',mobile2='$phone2',email='".$_POST['email']."',website='".$_POST['web']."',gstin='".$_POST['gstin']."',img='$target_file',ac_holder_name='".$_POST['ac_holder_name']."',b_name='".$_POST['bank_name']."',ac_no='".$_POST['ac_no']."',branch='".$_POST['branch']."',ifsc_code='".$_POST['ifsc']."',status='Active'";  
$Epm=mysqli_query($conn,$pm); 
$id=mysqli_insert_id($conn);

header("location:company.php?s=1");


?>