 <?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);
$sa="select * from h_employee_attendance_entry where AttendanceDate='".$_POST['AttendanceDate']."'";
$Esa=mysqli_query($conn,$sa);
$nr=mysqli_num_rows($Esa);


$ct="select * from h_employee where status='Active'";
$Ect=mysqli_query($conn,$ct);
$tnc=mysqli_num_rows($Ect);

if($nr=='0')
{
for($i=1;$i<$tnc+1;$i++)
{
 $Epo="insert into h_employee_attendance_entry set AttendanceDate='".$_POST['AttendanceDate']."',EmployeeId='".$_POST['EmployeeId'.$i]."',Attendance='".$_POST['Attendance'.$i]."',Shift='".$_POST['Shift'.$i]."',Total_Hours='".$_POST['Total_Hours'.$i]."',Late_Hours='".$_POST['Late_Hours'.$i]."',Working_Hours='".$_POST['Working_Hours'.$i]."',Remarks='".$_POST['Remarks'.$i]."',Status='Active'";  
$dpm=mysqli_query($conn,$Epo);  
}

header("location:employee_attendance_date.php?msg=Attendance Added!");
}
else
{
	header("location:employee_attendance_date.php?msg=Attendance Already Exist!");
}
?>