<!DOCTYPE html>
<html>
<?php
include("../../includes.php");
include("../../redirect.php");

                    $Wep1="select * from h_employee_attendance_entry where status='Active'";
					$Epm1=mysqli_query($conn,$Wep1);
					$tpm1=mysqli_fetch_array($Epm1);

$date=date('d/m/Y');
if(isset($_POST['export']))
{
header('Content-type: application/excel');
$filename = 'monthly_attendance_report for '.$tpm1['AttendanceDate'].'-'.$date.'.xls';
header('Content-Disposition: attachment; filename='.$filename);

?>
 
<body>
  <table  class="table table-bordered table-striped">
                <thead>
				<tr>&nbsp;</tr>
			 <tr><h3>Company Name : <?php echo $_SESSION['company']?></h3></tr>
				 <tr><h4>Overall Final Attendance Report Month <?php echo date("Y-m-d",strtotime($tpm1['AttendanceDate']));?> </h4></tr>
				 <tr>
				<th>S:no</th>
			
                <th>Emp Name</th>
                <th>Department</th>
				<th>01</th>
				<th>02</th>
				<th>03</th>
				<th>04</th>
				<th>05</th>
				<th>06</th>
				<th>07</th>
				<th>08</th>
				<th>09</th>
				<th>10</th>
				<th>11</th>
				<th>12</th>
				<th>13</th>
				<th>14</th>
				<th>15</th>
				<th>16</th>
				<th>17</th>
				<th>18</th>
				<th>19</th>
				<th>20</th>
				<th>21</th>
				<th>22</th>
				<th>23</th>
				<th>24</th>
				<th>25</th>
				<th>26</th>
				<th>27</th>
				<th>28</th>
				<th>29</th>
				<th>30</th>
				<th>31</th>
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
				<?php
				//if($dpm<'1')
				//{
				?>
                <tr>
				<td align="left"><?php echo  $i; ?></td>
                <td><?php echo $Fct['ename']; ?></td>	            
                <td><?php echo $tpm['dname']; ?></td>	            
	             <?php
				 $y=$tpm1['AttendanceDate']."-";
				 $m=date("Y-m-d",strtotime($tpm1['AttendanceDate']));
				$tl=0; 
				for($k=1;$k<32;$k++)
				{
				$ad=$m;
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
				//echo $FEaq['Attendance'];
				$tl=$tl+$FEaq['Attendance'];
				?></td>
				<?php } ?>

                 <td><?php echo $tl; ?></td>
				</tr>
				<?php
				}
				}

				?>
                  </tbody>
               
              </table>
</body>


<?php
 


?>
</html>