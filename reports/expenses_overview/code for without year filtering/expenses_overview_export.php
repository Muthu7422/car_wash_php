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
include("../../includes.php");
include("../../redirect.php");
$date=date('d/m/Y');

header('Content-type: application/excel');
$filename = 'Expenses Overview'.$date.'.xls';
header('Content-Disposition: attachment; filename='.$filename);

?>
<body>
     <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
				
				 <tr><h3>Company Name : <?php echo $_SESSION['company']?></h3></tr>
				 <tr><h4>Expenses Overview</h4></tr>
                

		<tr>
		<th>Sl No</th>
		<th>Categories</th>
		<th>January</th>
		<th>February</th>
		<th>March</th>
		<th>April</th>
		<th>May</th>
		<th>June</th>
		<th>July</th>
		<th>August</th>
		<th>September</th>
		<th>October</th>
		<th>November</th>
		<th>December</th>
		
		</tr>
		 </thead>
		 <tbody>
		<?php
		
		$j=0;
		$i=0;
			$expense="select DISTINCT(ExpenseType) as ExpenseType,Id from expense_master";
		    $expenseq=mysqli_query($conn,$expense);
		    while($expensef=mysqli_fetch_array($expenseq))
		   {
			
		    $i++;
            
			//SELECT * FROM `s_job_card_sdetails` where service_type='BIKE WASH' AND job_card_no IN (SELECT id from s_job_card where jdate BETWEEN '2019-02-01' AND '2019-02-31')	
			$year=date("Y");
		  $jobsjan="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseType='".$expensef['Id']."' and ExpenseDate between '$year-01-01' and '$year-01-31'"; 
			$jobsqjan=mysqli_query($conn,$jobsjan);
		    $jobsfjan=mysqli_fetch_array($jobsqjan); 
			
			 $jobsfeb="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseType='".$expensef['Id']."' and ExpenseDate between '$year-02-01' and '$year-02-28'"; 
			$jobsqfeb=mysqli_query($conn,$jobsfeb);
		    $jobsffeb=mysqli_fetch_array($jobsqfeb);
			
			$jobsmarch="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseType='".$expensef['Id']."' and ExpenseDate between '$year-03-01' and '$year-03-31'"; 
			$jobsqmarch=mysqli_query($conn,$jobsmarch);
		    $jobsfmarch=mysqli_fetch_array($jobsqmarch);
			
			$jobsapril="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseType='".$expensef['Id']."' and ExpenseDate between '$year-04-01' and '$year-04-30'"; 
			$jobsqapril=mysqli_query($conn,$jobsapril);
		    $jobsfapril=mysqli_fetch_array($jobsqapril);
			
			$jobsmay="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseType='".$expensef['Id']."' and 	ExpenseDate between '$year-05-01' and '$year-05-31'"; 
			$jobsqmay=mysqli_query($conn,$jobsmay);
		    $jobsfmay=mysqli_fetch_array($jobsqmay);
			
			$jobsjune="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseType='".$expensef['Id']."' and ExpenseDate between '$year-06-01' and '$year-06-31'"; 
			$jobsqjune=mysqli_query($conn,$jobsjune);
		    $jobsfjune=mysqli_fetch_array($jobsqjune);
			
			$jobsjuly="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseType='".$expensef['Id']."' and ExpenseDate between '$year-07-01' and '$year-07-31'"; 
			$jobsqjuly=mysqli_query($conn,$jobsjuly);
		    $jobsfjuly=mysqli_fetch_array($jobsqjuly);
			
			$jobsaug="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseType='".$expensef['Id']."' and ExpenseDate between '$year-08-01' and '$year-08-31'"; 
			$jobsqaug=mysqli_query($conn,$jobsaug);
		    $jobsfaug=mysqli_fetch_array($jobsqaug);
			
			$jobssep="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseType='".$expensef['Id']."' and ExpenseDate between '$year-09-01' and '$year-09-31'"; 
			$jobsqsep=mysqli_query($conn,$jobssep);
		    $jobsfsep=mysqli_fetch_array($jobsqsep);
			
			$jobsoct="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseType='".$expensef['Id']."' and ExpenseDate between '$year-10-01' and '$year-10-31'"; 
			$jobsqoct=mysqli_query($conn,$jobsoct);
		    $jobsfoct=mysqli_fetch_array($jobsqoct);
			
			$jobsnov="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseType='".$expensef['Id']."' and ExpenseDate between '$year-11-01' and '$year-11-31'"; 
			$jobsqnov=mysqli_query($conn,$jobsnov);
		    $jobsfnov=mysqli_fetch_array($jobsqnov);
			
			$jobsdec="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseType='".$expensef['Id']."' and ExpenseDate between '$year-12-01' and '$year-12-31'"; 
			$jobsqdech=mysqli_query($conn,$jobsdec);
		    $jobsfdec=mysqli_fetch_array($jobsqdech);
								
	     ?>
		
		
		
		<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $expensef['ExpenseType'];?></td>
		<td><?php echo number_format($jobsfjan['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsffeb['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfmarch['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfapril['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfmay['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfjune['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfjuly['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfaug['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfsep['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfoct['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfnov['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfdec['ExpenseAmount'],2);?></td>
		
		</tr>
		<?php
			}
			?>
			</tbody>
			 <tbody>
		 <?php
		    $year=date("Y");
		
		    $jobsjan="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-01-01' and '$year-01-31'"; 
			$jobsqjan=mysqli_query($conn,$jobsjan);
		    $jobsfjan=mysqli_fetch_array($jobsqjan); 
			
			$jobsfeb="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-02-01' and '$year-02-28'"; 
			$jobsqfeb=mysqli_query($conn,$jobsfeb);
		    $jobsffeb=mysqli_fetch_array($jobsqfeb);
			
			$jobsmarch="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-03-01' and '$year-03-31'"; 
			$jobsqmarch=mysqli_query($conn,$jobsmarch);
		    $jobsfmarch=mysqli_fetch_array($jobsqmarch);
			
			$jobsapril="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-04-01' and '$year-04-30'"; 
			$jobsqapril=mysqli_query($conn,$jobsapril);
		    $jobsfapril=mysqli_fetch_array($jobsqapril);
			
			$jobsmay="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-05-01' and '$year-05-31'"; 
			$jobsqmay=mysqli_query($conn,$jobsmay);
		    $jobsfmay=mysqli_fetch_array($jobsqmay);
			
			$jobsjune="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-06-01' and '$year-06-31'"; 
			$jobsqjune=mysqli_query($conn,$jobsjune);
		    $jobsfjune=mysqli_fetch_array($jobsqjune);
			
			$jobsjuly="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-07-01' and '$year-07-31'"; 
			$jobsqjuly=mysqli_query($conn,$jobsjuly);
		    $jobsfjuly=mysqli_fetch_array($jobsqjuly);
			
			$jobsaug="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-08-01' and '$year-08-31'"; 
			$jobsqaug=mysqli_query($conn,$jobsaug);
		    $jobsfaug=mysqli_fetch_array($jobsqaug);
			
			$jobssep="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-09-01' and '$year-09-31'"; 
			$jobsqsep=mysqli_query($conn,$jobssep);
		    $jobsfsep=mysqli_fetch_array($jobsqsep);
			
			$jobsoct="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-10-01' and '$year-10-31'"; 
			$jobsqoct=mysqli_query($conn,$jobsoct);
		    $jobsfoct=mysqli_fetch_array($jobsqoct);
			
			$jobsnov="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-11-01' and '$year-11-31'"; 
			$jobsqnov=mysqli_query($conn,$jobsnov);
		    $jobsfnov=mysqli_fetch_array($jobsqnov);
			
			$jobsdec="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-12-01' and '$year-12-31'"; 
			$jobsqdech=mysqli_query($conn,$jobsdec);
		    $jobsfdec=mysqli_fetch_array($jobsqdech);
											
		 ?>
		
		<tr style="background-color:#CA202B;font-size:15px;font-weight:800;color:white">
		
		<td colspan="2"><b>Total Expenses: </b></td>
		<td><?php echo number_format($jobsfjan['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsffeb['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfmarch['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfapril['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfmay['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfjune['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfjuly['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfaug['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfsep['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfoct['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfnov['ExpenseAmount'],2);?></td>
		<td><?php echo number_format($jobsfdec['ExpenseAmount'],2);?></td>
		</tr>
		
			
				 </tbody>
               
              </table>
</body>



</html>