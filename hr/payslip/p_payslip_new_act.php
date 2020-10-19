 <?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);

for($i=0;$i<100;$i++)
{
if($_POST['total'.$i]!='')
{
 $Epo="insert into h_payroll_calculation set MonthlyIncentive='".$_POST['MonthlyIncentive'.$i]."',e_code='".$_POST['ecode'.$i]."',e_name='".$_POST['employee_name'.$i]."',dep='".$_POST['dept'.$i]."',total_days='".$_POST['totaldays'.$i]."',Total_Hours='".$_POST['Total_Hours'.$i]."',basic_salary='".$_POST['salary'.$i]."',worked_days='".$_POST['work_day'.$i]."',phd='".$_POST['phd'.$i]."',deduction='".$_POST['deduction'.$i]."',total='".$_POST['total'.$i]."',eid='".$_POST['id'.$i]."',month_pay='".$_POST['paymonths']."',PerHoursalary='".$_POST['PerHoursalary'.$i]."',PerDaysalary='".$_POST['PerDaysalary'.$i]."',work_hour='".$_POST['work_hour'.$i]."',NoOFHourLeft='".$_POST['NoOFHourLeft'.$i]."',franchisee_id='".$_SESSION['FranchiseeId']."'"; 
$dpm=mysqli_query($conn,$Epo);  
}
}
header("location:p_payslip.php");
?>