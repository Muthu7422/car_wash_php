<?php
include("../../includes.php");
include("../../redirect.php");
$date=date('d-m-Y');
if(isset($_POST['view']))
{
$_POST['from'];
$_POST['to'];
$_SESSION['from']=$_POST['from'];
$_SESSION['to']=$_POST['to'];
header("location:feedback_report.php?from=".$_POST['from']."&to=".$_POST['to']."");
}
if(isset($_POST['export']))
	
	{
	 header('Content-type: application/excel');
     $filename = 'Customer Feedback Details Report-'.$date.'.xls';
     header('Content-Disposition: attachment; filename='.$filename);
?>


<body>
             <table  class="table table-bordered table-striped">
               <thead>
				 <tr>&nbsp;</tr>
			     <tr><h3>Company Name : <?php echo $_SESSION['company']?></h3></tr>
				 <tr><h4>Customer Feedback Details Report from - <?php echo $_POST['from'];?> To - <?php echo $_POST['to'];?> </h4></tr>			

              
                <tr>
				   <th width="10px">Sl No</th>
				   <th width="20px">Customer Name</th>
				   <th width="30px">Mobile</th>
				   <th width="20px">Job Card No</th>
				   <th>How would you rate our customer friendliness?</th>
				   <th>Kindly rate the exterior cleanliness of your car</th>
				   <th>If service provided, kindly rate the interior cleanliness of your car</th>
				   <th>If car detailing was provided, kindly rate the quality of the service</th>
				   <th>Kindly rate the cleanliness of our facilities</th>
				   <th>How would you rate the quality of vacuuming</th>
				   <th>Would you recommend us to your friends & family?</th>
				   <th>Total Rating</th>
                </tr>
              </thead>
                  <tbody>
					<?php
					$ss="select * from a_final_bill where bill_date between '".$_REQUEST['from']."' and '".$_REQUEST['to']."'";
				//$ss="select * from s_job_card where status='Active' and FranchiseeId='".$_SESSION['FranchiseeId']."' and jcard_status='Close' and jdate between '".$_REQUEST['from']."' and '".$_REQUEST['to']."'";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					
					$x="select * from s_job_card where id='".$FEss['JobcardId']."'"; 
				
					//$x="select * from a_final_bill where FrachiseeId='".$_SESSION['FranchiseeId']."' and JobcardId='".$FEss['id']."'";
					$dx=mysqli_query($conn,$x);
					$cxs=mysqli_num_rows($dx);
					$dsa=mysqli_fetch_array($dx);
					
					$i++;
					$q1=$dsa['q1'];
					$q2=$dsa['q2'];
					$q3=$dsa['q3'];
					$q4=$dsa['q4'];
					$q5=$dsa['q5'];
					$q6=$dsa['q6'];
					$q7=$dsa['q7'];
				?>
                <tr>
                  <td><?php echo $i;?></td>
				    <td><?php echo date("d-m-Y",strtotime($dsa['jdate']));?></td>
                  <td><?php echo $dsa['sname'];?></td>
				  <td><?php echo $dsa['smobile'];?></td>
				  <td><?php echo $dsa['job_card_no'];?></td>
				  <td><?php echo number_format($q1,2);?></td>
				  <td><?php echo number_format($q2,2);?></td>
				  <td><?php echo number_format($q3,2);?></td>
				  <td><?php echo number_format($q4,2);?></td>
				  <td><?php echo number_format($q5,2);?></td>
				  <td><?php echo number_format($q6,2);?></td>
				  <td><?php echo number_format($q7,2);?></td>
				 <?php 
				 $rat=$dsa['q1'] + $dsa['q2'] + $dsa['q3'] + $dsa['q4'] + $dsa['q5']+$dsa['q6']+$dsa['q7'];
				  $ratting=$rat/14;
				  $rating=$ratting*10;
				  
				  
				  ?>
				    <td><?php echo round($rating, 1);?>/10</a></td>
				 
                  <td><?php echo $dsa['Comments'];?> </td>
				   <?php
				  }
				  ?>
                </tr>
				
                </tbody>
              </table>
</body>


<?php
 }
?>
</html>