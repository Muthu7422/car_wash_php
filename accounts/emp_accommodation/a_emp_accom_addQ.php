<?php
include("../../includes.php");
include("../../redirect.php");


$Es="select * from emp_accom where Date='".$_POST['Date']."' and Pay_mode='".$_POST['Pay_mode']."' and LedgerGroup='".$_POST['LedgerGroup']."' and Amount='".$_POST['Amount']."' and status='Active'"; 
$Eps=mysqli_query($conn,$Es);
$duplicate=mysqli_fetch_array($Eps);

if($duplicate==0)
{
$in="insert into emp_accom set Date='".$_POST['Date']."',Pay_mode='".$_POST['Pay_mode']."',LedgerGroup='".$_POST['LedgerGroup']."',Amount='".$_POST['Amount']."',No_of_Emp='".$_POST['No_of_Emp']."',rent_per_emp='".$_POST['rent_per_emp']."',Status='Active'"; 
$Ein=mysqli_query($conn,$in);
$id=mysqli_insert_id($conn);


// $li="insert into m_ledger set LedgerGroup='".$_POST['LedgerType']."',LedgerName='".$_POST['ExpenseType']."',ContactNo='".$_SESSION['FranchiseeCode']."'";
//$Eli=mysqli_query($li);
//$eid=mysqli_insert_id();

//$ut="update expense_master set LedgerId='$eid' where Id='$id'";
//$Eut=mysqli_query($ut);

//$_SESSION['FranchiseeCode'];

header("location:a_emp_accom.php?s=Date Save Sucessfully");
}
else
{
	header("location:a_emp_accom.php?a=Already Exiting");
}
?>