<?php
include("../../dbinfoi.php");
error_reporting(0);
if(isset($_POST['Save'])){

$target_dir = "company_logo/";
$target_file = $target_dir .basename($_FILES["img1"]["name"]) ;
move_uploaded_file($_FILES["img1"]["tmp_name"], $target_file);



$phone1=$_POST['con_num'];
$phone2=$_POST['mobile'];

if(basename($_FILES["img1"]["name"])!='') {
  $pm="update m_vendor set Remarks='".$_POST['Remarks']."',img='$target_file',franchisee_id='".$_POST['franchisee_no']."',franchisee_name='".strtoupper($_POST['franchisee_name'])."',address='".strtoupper($_POST['address'])."',city='".strtoupper($_POST['city'])."',con_number='$phone1',mobile='$phone2',cen_manager='".$_POST['cen_manager']."',gst_no='".$_POST['gstin']."',email='".$_POST['email']."',website='".$_POST['web']."',status='".$_POST['status']."' where id='".$_REQUEST['id']."'";  
$Epm=mysqli_query($conn,$pm); 
$id=mysqli_insert_id($conn); 

} else {
	
   $pm="update m_vendor set Remarks='".$_POST['Remarks']."',franchisee_id='".$_POST['franchisee_no']."',franchisee_name='".strtoupper($_POST['franchisee_name'])."',address='".strtoupper($_POST['address'])."',city='".strtoupper($_POST['city'])."',con_number='$phone1',mobile='$phone2',cen_manager='".$_POST['cen_manager']."',gst_no='".$_POST['gstin']."',email='".$_POST['email']."',website='".$_POST['web']."',status='".$_POST['status']."' where id='".$_REQUEST['id']."'";  
$Epm=mysqli_query($conn,$pm); 
$id=mysqli_insert_id($conn); 
}


header("location:franchisee.php?s=1");

}else{
header("location:franchisee.php");	
}

?>