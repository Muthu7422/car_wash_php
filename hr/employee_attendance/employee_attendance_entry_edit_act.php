 <?php
include("../../includes.php");
include("../../redirect.php");


for($i=1;$i<$_POST['tnc'];$i++)
{
 $Epo="update h_employee_attendance_entry set EmployeeId='".$_POST['EmployeeId'.$i]."',Attendance='".$_POST['Attendance'.$i]."',Remarks='".$_POST['Remarks'.$i]."' where Id='".$_POST['AttendanceId'.$i]."'"; 
$dpm=mysqli_query($conn,$Epo);  
}
header("location:employee_attendance_date.php?msg=Attendance Added!");

?>