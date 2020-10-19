<?php
include("../../includes.php");
include("../../redirect.php");
//$user=$_POST['user_name'];
///user = mysqli_real_escape_string(stripslashes($user));
 $password=$_POST['password'];
 ///$repassword = mysqli_real_escape_string(stripslashes($password));
 
  $user_name=$_POST['user_name'];
$query=mysqli_query($conn,"select * from  f_user_create where user_name='".$user_name."' and password='".$password."'") or die(mysqli_error());
$duplicate=mysqli_num_rows($query);

if(1==1)
    {

$id=$_REQUEST['id'];
$ct="update f_user_create set user_name='".$user_name."',branch_name='".$_POST['branch_name']."',company_name='".$_POST['company_name']."',financial_year='".$_POST['financial_year']."',password='".$password."' WHERE id='$id'";
$Ect=mysqli_query($conn,$ct);

//to run PHP script on submit
if(!empty($_POST['check_list']))
{
	$dp="delete from t_user_pages where uname='".$user_name."'";
	$Edp=mysqli_query($conn,$dp);
	
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){
//echo $selected."</br>";

 $iu="insert into t_user_pages set uname='".$user_name."',pageno='".$selected."'";
$Eiu=mysqli_query($conn,$iu);
$iid1=mysqli_insert_id($conn);


if(!empty($_POST['check_listi'.$selected]))
{
	$ru1="update t_user_pages set CreateData='$selected' where id='$iid1'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(!empty($_POST['check_liste'.$selected]))
{
	$ru1="update t_user_pages set EditData='$selected' where id='$iid1'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(!empty($_POST['check_listd'.$selected]))
{
	$ru1="update t_user_pages set DeleteData='$selected' where id='$iid1'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(!empty($_POST['check_listv'.$selected]))
{
	$ru1="update t_user_pages set ViewData='$selected' where id='$iid1'";
	$Eru1=mysqli_query($conn,$ru1);
}



//Select parent
 $sp="select parent from t_lmenu where id='".$selected."'";
$Esp=mysqli_query($conn,$sp);
$FEsp=mysqli_fetch_array($Esp);

  $spu="select id from t_user_pages where uname='".$_POST['user_name']."' AND pageno='".$FEsp['parent']."'";
$Espu=mysqli_query($conn,$spu);
$nr=mysqli_num_rows($Espu);
if($nr<1)
{
	//echo "</br>";
	$iu="insert into t_user_pages set uname='".$_POST['user_name']."',pageno='".$FEsp['parent']."'";echo "</br>";
	$Eiu=mysqli_query($conn,$iu);
	$iid2=mysqli_insert_id($conn);
	
	
	if(!empty($_POST['check_listi'.$selected]))
{
	$ru1="update t_user_pages set CreateData='$selected' where id='$iid2'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(!empty($_POST['check_liste'.$selected]))
{
	$ru1="update t_user_pages set EditData='$selected' where id='$iid2'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(!empty($_POST['check_listd'.$selected]))
{
	$ru1="update t_user_pages set DeleteData='$selected' where id='$iid2'";
	$Eru1=mysqli_query($conn,$ru1);
}
if(!empty($_POST['check_listv'.$selected]))
{
	$ru1="update t_user_pages set ViewData='$selected' where id='$iid2'";
	$Eru1=mysqli_query($conn,$ru1);
}

	
	
}

}
}


header("Location: f_user_create_view.php?m=1");
	}
	else
	{
	header("Location: f_user_create_view.php?d=1");
	}

?>
