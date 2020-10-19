<?php
include("../../includes.php");
include("../../redirect.php");

// $user=$_POST['user_name'];
// $reuser = mysqli_real_escape_string(stripslashes($user));

 $password=$_POST['password'];
 //$repassword = mysqli_real_escape_string(stripslashes($password));

 

$user_name=$_POST['user_name'];
$query=mysqli_query($conn,"select * from  f_user_create where user_name='".$user_name."'") or die(mysqli_error());
$duplicate=mysqli_num_rows($query);

if($duplicate==0)
    {


 $pm="insert into f_user_create set user_role='".$_POST['role_name']."',user_id='".$_POST['user_id']."',financial_year='".$_POST['financial_year']."',user_name='".$user_name."',branch_name='".$_POST['branch_name']."',company_name='".$_POST['company_name']."',password='".$password."'";  
$Epm=mysqli_query($conn,$pm);


//to run PHP script on submit
if(!empty($_POST['check_list'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){
//echo $selected."</br>";

 $iu="insert into t_user_pages set uname='".$user_name."',pageno='".$selected."'";
$Eiu=mysqli_query($conn,$iu);
$iid1=mysqli_insert_id($conn);


if(isset($_REQUEST['check_listi'.$selected]))
{
	$ru1="update t_user_pages set CreateData='$selected' where id='$iid1'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(isset($_REQUEST['check_liste'.$selected]))
{
	$ru1="update t_user_pages set EditData='$selected' where id='$iid1'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(isset($_REQUEST['check_listd'.$selected]))
{
	$ru1="update t_user_pages set DeleteData='$selected' where id='$iid1'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(isset($_REQUEST['check_listv'.$selected]))
{
	$ru1="update t_user_pages set ViewData='$selected' where id='$iid1'";
	$Eru1=mysqli_query($conn,$ru1);
}


//echo $_REQUEST['check_listi'.$selected];

//Select parent
$sp="select parent from t_lmenu where id='".$selected."'";
$Esp=mysqli_query($conn,$sp);
$FEsp=mysqli_fetch_array($Esp);

$spu="select id from t_user_pages where uname='".$_POST['user_name']."' AND pageno='".$FEsp['parent']."'";
$Espu=mysqli_query($conn,$spu);
$nr=mysqli_num_rows($Espu);
if($nr<1)
{
 	$iu="insert into t_user_pages set uname='".$_POST['user_name']."',pageno='".$FEsp['parent']."'";
	$Eiu=mysqli_query($conn,$iu);
	$iid2=mysqli_insert_id($conn);
	
if(isset($_REQUEST['check_listi'.$selected]))
{
	$ru1="update t_user_pages set CreateData='$selected' where id='$iid2'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(isset($_REQUEST['check_liste'.$selected]))
{
	$ru1="update t_user_pages set EditData='$selected' where id='$iid2'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(isset($_REQUEST['check_listd'.$selected]))
{
	$ru1="update t_user_pages set DeleteData='$selected' where id='$iid2'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(isset($_REQUEST['check_listv'.$selected]))
{
	$ru1="update t_user_pages set ViewData='$selected' where id='$iid2'";
	$Eru1=mysqli_query($conn,$ru1);
}
	
	
}

}
}

header("location:f_user_create_view.php?s=1");
}
else
{

header("location:f_user_create_view.php?a=1");
}


?>
