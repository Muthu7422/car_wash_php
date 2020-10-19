<?php
include("includes.php");
  $g="select * from f_user_create where user_name='".$_POST['username']."' and password='".$_POST['password']."'"; 
$Eg=mysqli_query($conn,$g);

 $n=mysqli_num_rows($Eg);  

if($n>=1)
{
$Fg=mysqli_fetch_array($Eg);

 $sc21="select * from user_role where role_name='".$Fg['user_role']."'";
$Esc21=mysqli_query($conn,$sc21);
$FEsc21=mysqli_fetch_array($Esc21);

$_SESSION['user']=$_POST['username'];
 $_SESSION['role_name']=$FEsc21['role_id'];

$sc="select * from m_vendor where vendor_id='".$Fg['company_name']."'";
$Esc=mysqli_query($conn,$sc);
$FEsc=mysqli_fetch_array($Esc);

 $sc2="select * from m_franchisee where vendor_id='".$Fg['company_name']."'";
$Esc2=mysqli_query($conn,$sc2);
$FEsc2=mysqli_fetch_array($Esc2);

 $sc1="select * from financial_year where userid='".$FEsc['id']."' AND status='Active'";
$Esc1=mysqli_query($conn,$sc1);
$FEsc1=mysqli_fetch_array($Esc1);

$_SESSION['UserId']=$Fg['id'];
 $_SESSION['VendorId']=$Fg['company_name'];
 $_SESSION['BranchId']=$FEsc2['branch_id'];
 $_SESSION['franchisee_name']=$FEsc2['franchisee_name'];
$_SESSION['VendorCode']=$FEsc['franchisee_id'];
$_SESSION['VendorName']=$FEsc['franchisee_name'];
$_SESSION['UserRole']=$Fg['user_role'];
 $_SESSION['FinancialYear']=$FEsc1['fyear'];
header("location:admin.php");
}
else
{

header("location:login.php?m=1");
}
?>