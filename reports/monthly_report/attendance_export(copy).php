<!DOCTYPE html>

<html>

<head>
    <!--[if gte mso 9]>
    <xml>
        <x:ExcelWorkbook>
            <x:ExcelWorksheets>
                <x:ExcelWorksheet>
                    <x:Name>Sheet 1</x:Name>
                    <x:WorksheetOptions>
                        <x:Print>
                            <x:ValidPrinterInfo/>
                        </x:Print>
                    </x:WorksheetOptions>
                </x:ExcelWorksheet>
            </x:ExcelWorksheets>
        </x:ExcelWorkbook>
    </xml>
    <![endif]-->
</head>

  <?php                 
error_reporting(0);       
	   // if($_POST['month_name']=='1' OR '2' OR '3' OR '4' OR '5' OR '6' OR '7' OR '8' OR '9' OR '10' OR '11' OR '12')
                 // {
				// $Mfrom=date('Y')."-".$_POST['month_name']."-01";
		         // $Mto=date('Y')."-".$_POST['month_name']."-31";
					 ?>
<?php
include("../../includes.php");
include("../../redirect.php");
$date=date('d/m/Y');
if(isset($_POST['export']))
{
header('Content-type: application/excel');
$filename = 'monthly_attendance_report From_'.date("d-m-Y",strtotime($_REQUEST['from'])).' To_'.date("d-m-Y",strtotime($_REQUEST['to'])).' .xls';
header('Content-Disposition: attachment; filename='.$filename);

?>
 
<body>
  <table  class="table table-bordered table-striped">
                <thead>
				<tr>&nbsp;</tr>
			 <tr><h3>Company Name : <?php echo $_SESSION['company']?></h3></tr>
				 <tr><h4>Overall Final Attendance Report From  <?php echo date("d-m-Y",strtotime($_REQUEST['from']));?> To  <?php echo date("d-m-Y",strtotime($_REQUEST['to']));?> </h4></tr>
				<tr>
				<th>S.No</th>
                  <th>Employee Name</th>
                  <th>Department</th>
				  <th>Total Present</th>

                </tr>
                </thead>
                <tbody>
				
	<?php
				$ct="select * from h_employee where status='Active'";
				$Ect=mysqli_query($conn,$ct);
				$tnc=mysqli_num_rows($Ect);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
					$Wep="select * from h_department where id='".$Fct['edepart']."'";
					$Epm=mysqli_query($conn,$Wep);
					$tpm=mysqli_fetch_array($Epm);
					
					$Wep1="select * from h_employee_attendance_entry where status='Active'";
					$Epm1=mysqli_query($conn,$Wep1);
					$tpm1=mysqli_fetch_array($Epm1);
					$i++;
				?>
       <tr>
				<td><?php echo $i; ?></td>
                <td><?php echo $Fct['ename']; ?></td>	            
                <td><?php echo $tpm['dname']; ?></td>	            
               <?php
				 $y=$_POST['AttendanceDate']."-";
				 $m=$_POST['month_name']."-";
				$tl=0; 
				for($k=1;$k<32;$k++)
				{
					$ad=$y.$m.$k;
				?>
				 <td><?php 
				$aq="SELECT Attendance FROM `h_employee_attendance_entry` where EmployeeId='".$Fct['id']."' AND AttendanceDate='$ad' ";
				$Eaq=mysqli_query($conn,$aq);
				$FEaq=mysqli_fetch_array($Eaq);
				if($FEaq['Attendance']=='')
				{
					echo "H";
				}
				if($FEaq['Attendance']=='1')
				{
					echo "P";
				}
				if($FEaq['Attendance']=='0.5')
				{
					echo "HALF";
				}
				if($FEaq['Attendance']=='0')
				{
					echo "AB";
				}
				echo $FEaq['Attendance'];
				 $tl=$tl+$FEaq['Attendance'];
				 ?></td>
				<?php } ?>

                 <td><?php echo $tl; ?></td>
				</tr>
				<?php
				}
				//}
}
				?>
                  </tbody>
               
              </table>
</body>


<?php
 


?>
</html>