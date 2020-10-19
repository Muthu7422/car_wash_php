<?php
include("includes.php");
 $g="select * from f_user_create where user_name='".$_POST['username']."' and password='".$_POST['password']."'"; 
$Eg=mysqli_query($conn,$g);

 $n=mysqli_num_rows($Eg);  

if($n>=1)
{
$Fg=mysqli_fetch_array($Eg);

$_SESSION['user']=$_POST['username'];

$sc="select * from m_franchisee where id='".$Fg['company_name']."'";
$Esc=mysqli_query($conn,$sc);
$FEsc=mysqli_fetch_array($Esc);

 $sc1="select * from financial_year where userid='".$FEsc['id']."' AND status='Active'";
$Esc1=mysqli_query($conn,$sc1);
$FEsc1=mysqli_fetch_array($Esc1);

$_SESSION['UserId']=$Fg['id'];
$_SESSION['FranchiseeId']=$Fg['company_name'];
$_SESSION['FranchiseeCode']=$FEsc['franchisee_id'];
$_SESSION['FranchiseeName']=$FEsc['franchisee_name'];
$_SESSION['UserRole']=$Fg['user_role'];
 $_SESSION['FinancialYear']=$FEsc1['fyear'];
header("location:admin.php");
}
else
{

header("location:login.php?m=1");
}
?>