<?php
include("../../dbinfoi.php");

if(isset($_POST['Save'])){
$target_dir = "company_logo/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

$phone1=$_POST['con_num'];
$phone2=$_POST['mobile'];

  $pm="insert into  m_franchisee set vendor_id='".$_POST['vendor_id']."',branch_id='".$_POST['branch_id']."',Remarks='".$_POST['Remarks']."',img='$target_file',franchisee_id='".$_POST['franchisee_no']."',franchisee_name='".strtoupper($_POST['franchisee_name'])."',address='".strtoupper($_POST['address'])."',city='".strtoupper($_POST['city'])."',con_number='$phone1',mobile='$phone2',cen_manager='".$_POST['cen_manager']."',gst_no='".$_POST['gstin']."',email='".$_POST['email']."',website='".$_POST['web']."',status='Active'";  
$Epm=mysqli_query($conn,$pm); 
$id=mysqli_insert_id($conn);


 $p="update job_card_no set branch_id=branch_id+1 where id='1'";
 $Ep=mysqli_query($conn,$p);
 
 $vendor_id=$_POST['vendor_id'];


header("location:branch_view.php?s=1 & id=$vendor_id");
}else{
header("location:branch_view.php");	
}

?>