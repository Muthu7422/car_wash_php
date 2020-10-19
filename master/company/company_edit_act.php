<?php
include("../../dbinfoi.php");

$target_dir = "company_logo/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

$phone1="+91".$_POST['mobile1'];
$phone2="+91".$_POST['mobile2'];

if(basename($_FILES["img"]["name"])!="")
{
 $pm="update  m_company set company_code='".$_POST['company_no']."',cus_name='".strtoupper($_POST['company_name'])."',a_addrs='".strtoupper($_POST['address'])."',mobile1='$phone1',mobile2='$phone2',email='".$_POST['email']."',website='".$_POST['web']."',gstin='".$_POST['gstin']."'img='$target_file',ac_holder_name='".$_POST['ac_holder_name']."',b_name='".$_POST['bank_name']."',ac_no='".$_POST['ac_no']."',branch='".$_POST['branch']."',ifsc_code='".$_POST['ifsc']."',status='".$_POST['status']."' where id='".$_REQUEST['id']."'";  
$Epm=mysqli_query($conn,$pm); 
}
else
{
 $pm1="update  m_company set company_code='".$_POST['company_no']."',cus_name='".strtoupper($_POST['company_name'])."',a_addrs='".strtoupper($_POST['address'])."',mobile1='$phone1',mobile2='$phone2',email='".$_POST['email']."',website='".$_POST['web']."',gstin='".$_POST['gstin']."',ac_holder_name='".$_POST['ac_holder_name']."',b_name='".$_POST['bank_name']."',ac_no='".$_POST['ac_no']."',branch='".$_POST['branch']."',ifsc_code='".$_POST['ifsc']."',status='".$_POST['status']."' where id='".$_REQUEST['id']."'";   
$Epm1=mysqli_query($conn,$pm1); 
}
if($_POST['status']=='Active')
{
header("location:company.php?s=Data Updated Successfully!");
}
else
{
header("location:company.php?d=Data Updated Successfully!");
}

?>