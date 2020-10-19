<?php
include("../../includes.php");
include("../../redirect.php");
if(isset($_POST['sub_yaer']))
{
	$fromyear=$_POST['fromyear'];
	header("location:revenue_ovrview.php?fromyear=$fromyear");
}
if(isset($_POST['export']))
{
$date=date('d/m/Y');

header('Content-type: application/excel');
$filename = 'Revenue Overview'.$date.'.xls';
header('Content-Disposition: attachment; filename='.$filename);

?>
<body>
     <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
				
				 <tr><h3>Company Name : <?php echo $_SESSION['company']?></h3></tr>
				 <tr><h4>Revenue Overview - <?php echo $_POST['fromyear'];?></h4></tr>
		<tr>
		<th>Sl No</th>
		<th>Service Name</th>
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
			$sname="select DISTINCT(stype) as stype from m_service_type";
		    $snameq=mysqli_query($conn,$sname);
		   while($snamef=mysqli_fetch_array($snameq))
		   {
			
		    $i++;
            
			//SELECT * FROM `s_job_card_sdetails` where service_type='BIKE WASH' AND job_card_no IN (SELECT id from s_job_card where jdate BETWEEN '2019-02-01' AND '2019-02-31')	
			$year=trim($_POST['fromyear']);
		  $jobsjan="select sum(st_amt) as st_amt from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-01-01' and '$year-01-31'"; 
			$jobsqjan=mysqli_query($conn,$jobsjan);
		    $jobsfjan=mysqli_fetch_array($jobsqjan); 
			
			 $jobsfeb="select sum(st_amt) as st_amt from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-02-01' and '$year-02-28'"; 
			$jobsqfeb=mysqli_query($conn,$jobsfeb);
		    $jobsffeb=mysqli_fetch_array($jobsqfeb);
			
			$jobsmarch="select sum(st_amt) as st_amt from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-03-01' and '$year-03-31'"; 
			$jobsqmarch=mysqli_query($conn,$jobsmarch);
		    $jobsfmarch=mysqli_fetch_array($jobsqmarch);
			
			$jobsapril="select sum(st_amt) as st_amt from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-04-01' and '$year-04-30'"; 
			$jobsqapril=mysqli_query($conn,$jobsapril);
		    $jobsfapril=mysqli_fetch_array($jobsqapril);
			
			$jobsmay="select sum(st_amt) as st_amt from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-05-01' and '$year-05-31'"; 
			$jobsqmay=mysqli_query($conn,$jobsmay);
		    $jobsfmay=mysqli_fetch_array($jobsqmay);
			
			$jobsjune="select sum(st_amt) as st_amt from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-06-01' and '$year-06-31'"; 
			$jobsqjune=mysqli_query($conn,$jobsjune);
		    $jobsfjune=mysqli_fetch_array($jobsqjune);
			
			$jobsjuly="select sum(st_amt) as st_amt from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-07-01' and '$year-07-31'"; 
			$jobsqjuly=mysqli_query($conn,$jobsjuly);
		    $jobsfjuly=mysqli_fetch_array($jobsqjuly);
			
			$jobsaug="select sum(st_amt) as st_amt from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-08-01' and '$year-08-31'"; 
			$jobsqaug=mysqli_query($conn,$jobsaug);
		    $jobsfaug=mysqli_fetch_array($jobsqaug);
			
			$jobssep="select sum(st_amt) as st_amt from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-09-01' and '$year-09-31'"; 
			$jobsqsep=mysqli_query($conn,$jobssep);
		    $jobsfsep=mysqli_fetch_array($jobsqsep);
			
			$jobsoct="select sum(st_amt) as st_amt from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-10-01' and '$year-10-31'"; 
			$jobsqoct=mysqli_query($conn,$jobsoct);
		    $jobsfoct=mysqli_fetch_array($jobsqoct);
			
			$jobsnov="select sum(st_amt) as st_amt from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-11-01' and '$year-11-31'"; 
			$jobsqnov=mysqli_query($conn,$jobsnov);
		    $jobsfnov=mysqli_fetch_array($jobsqnov);
			
			$jobsdec="select sum(st_amt) as st_amt from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-12-01' and '$year-12-31'"; 
			$jobsqdech=mysqli_query($conn,$jobsdec);
		    $jobsfdec=mysqli_fetch_array($jobsqdech);
			
		
			
		?>
		
		
		
		<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $snamef['stype'];?></td>
		<td><?php echo number_format($jobsfjan['st_amt'],2);?></td>
		<td><?php echo number_format($jobsffeb['st_amt'],2);?></td>
		<td><?php echo number_format($jobsfmarch['st_amt'],2);?></td>
		<td><?php echo number_format($jobsfapril['st_amt'],2);?></td>
		<td><?php echo number_format($jobsfmay['st_amt'],2);?></td>
		<td><?php echo number_format($jobsfjune['st_amt'],2);?></td>
		<td><?php echo number_format($jobsfjuly['st_amt'],2);?></td>
		<td><?php echo number_format($jobsfaug['st_amt'],2);?></td>
		<td><?php echo number_format($jobsfsep['st_amt'],2);?></td>
		<td><?php echo number_format($jobsfoct['st_amt'],2);?></td>
		<td><?php echo number_format($jobsfnov['st_amt'],2);?></td>
		<td><?php echo number_format($jobsfdec['st_amt'],2);?></td>
		
		</tr>
		<?php
			}
			?>
			
			
			<?php
		
		
			$Pname="select DISTINCT(package_name) as package_name from m_package where package_name!=''";
		    $Pnameq=mysqli_query($conn,$Pname);
		   while($Pnamef=mysqli_fetch_array($Pnameq))
		   {
			
		    $i++;
            
			//SELECT * FROM `s_job_card_sdetails` where service_type='BIKE WASH' AND job_card_no IN (SELECT id from s_job_card where jdate BETWEEN '2019-02-01' AND '2019-02-31')	
			$year=trim($_POST['fromyear']);
		  $jobsjanP="select sum(package_amt) as package_amt from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-01-01' and '$year-01-31'"; 
			$jobsqjanP=mysqli_query($conn,$jobsjanP);
		    $jobsfjanP=mysqli_fetch_array($jobsqjanP); 
			
			 $jobsfebP="select sum(package_amt) as package_amt from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-02-01' and '$year-02-28'"; 
			$jobsqfebP=mysqli_query($conn,$jobsfebP);
		    $jobsffebP=mysqli_fetch_array($jobsqfebP);
			
			$jobsmarchP="select sum(package_amt) as package_amt from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-03-01' and '$year-03-31'"; 
			$jobsqmarchP=mysqli_query($conn,$jobsmarchP);
		    $jobsfmarchP=mysqli_fetch_array($jobsqmarchP);
			
			$jobsaprilP="select sum(package_amt) as package_amt from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-04-01' and '$year-04-30'"; 
			$jobsqaprilP=mysqli_query($conn,$jobsaprilP);
		    $jobsfaprilP=mysqli_fetch_array($jobsqaprilP);
			
			$jobsmayP="select sum(package_amt) as package_amt from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-05-01' and '$year-05-31'"; 
			$jobsqmayP=mysqli_query($conn,$jobsmayP);
		    $jobsfmayP=mysqli_fetch_array($jobsqmayP);
			
			$jobsjuneP="select sum(package_amt) as package_amt from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-06-01' and '$year-06-31'"; 
			$jobsqjuneP=mysqli_query($conn,$jobsjuneP);
		    $jobsfjuneP=mysqli_fetch_array($jobsqjuneP);
			
			$jobsjulyP="select sum(package_amt) as package_amt from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-07-01' and '$year-07-31'"; 
			$jobsqjulyP=mysqli_query($conn,$jobsjulyP);
		    $jobsfjulyP=mysqli_fetch_array($jobsqjulyP);
			
			$jobsaugP="select sum(package_amt) as package_amt from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-08-01' and '$year-08-31'"; 
			$jobsqaugP=mysqli_query($conn,$jobsaugP);
		    $jobsfaugP=mysqli_fetch_array($jobsqaugP);
			
			$jobssepP="select sum(package_amt) as package_amt from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-09-01' and '$year-09-31'"; 
			$jobsqsepP=mysqli_query($conn,$jobssepP);
		    $jobsfsepP=mysqli_fetch_array($jobsqsepP);
			
			$jobsoctP="select sum(package_amt) as package_amt from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-10-01' and '$year-10-31'"; 
			$jobsqoctP=mysqli_query($conn,$jobsoctP);
		    $jobsfoctP=mysqli_fetch_array($jobsqoctP);
			
			$jobsnovP="select sum(package_amt) as package_amt from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-11-01' and '$year-11-31'"; 
			$jobsqnovP=mysqli_query($conn,$jobsnovP);
		    $jobsfnovP=mysqli_fetch_array($jobsqnovP);
			
			$jobsdecP="select sum(package_amt) as package_amt from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-12-01' and '$year-12-31'"; 
			$jobsqdechP=mysqli_query($conn,$jobsdecP);
		    $jobsfdecP=mysqli_fetch_array($jobsqdechP);
			
		
			
		?>
		
			<tr>
			
			<td><?php echo $i;?></td>
		<td><?php echo $Pnamef['package_name'];?></td>
		<td><?php echo number_format($jobsfjanP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsffebP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfmarchP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfaprilP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfmayP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfjuneP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfjulyP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfaugP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfsepP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfoctP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfnovP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfdecP['package_amt'],2);?></td>
			
			
			</tr>
			<?php
		   }
		   ?>
			 </tbody>
			 
			 	 <tbody>
		 <?php
		$year=trim($_POST['fromyear']);
		
		  $jobsjan="select sum(st_amt) as st_amt from s_job_card_sdetails where jdate between '$year-01-01' and '$year-01-31'"; 
			$jobsqjan=mysqli_query($conn,$jobsjan);
		    $jobsfjan=mysqli_fetch_array($jobsqjan); 
			
			 $jobsfeb="select sum(st_amt) as st_amt from s_job_card_sdetails where  jdate between '$year-02-01' and '$year-02-28'"; 
			$jobsqfeb=mysqli_query($conn,$jobsfeb);
		    $jobsffeb=mysqli_fetch_array($jobsqfeb);
			
			$jobsmarch="select sum(st_amt) as st_amt from s_job_card_sdetails where  jdate between '$year-03-01' and '$year-03-31'"; 
			$jobsqmarch=mysqli_query($conn,$jobsmarch);
		    $jobsfmarch=mysqli_fetch_array($jobsqmarch);
			
			$jobsapril="select sum(st_amt) as st_amt from s_job_card_sdetails where  jdate between '$year-04-01' and '$year-04-30'"; 
			$jobsqapril=mysqli_query($conn,$jobsapril);
		    $jobsfapril=mysqli_fetch_array($jobsqapril);
			
			$jobsmay="select sum(st_amt) as st_amt from s_job_card_sdetails where  jdate between '$year-05-01' and '$year-05-31'"; 
			$jobsqmay=mysqli_query($conn,$jobsmay);
		    $jobsfmay=mysqli_fetch_array($jobsqmay);
			
			$jobsjune="select sum(st_amt) as st_amt from s_job_card_sdetails where jdate between '$year-06-01' and '$year-06-31'"; 
			$jobsqjune=mysqli_query($conn,$jobsjune);
		    $jobsfjune=mysqli_fetch_array($jobsqjune);
			
			$jobsjuly="select sum(st_amt) as st_amt from s_job_card_sdetails where  jdate between '$year-07-01' and '$year-07-31'"; 
			$jobsqjuly=mysqli_query($conn,$jobsjuly);
		    $jobsfjuly=mysqli_fetch_array($jobsqjuly);
			
			$jobsaug="select sum(st_amt) as st_amt from s_job_card_sdetails where  jdate between '$year-08-01' and '$year-08-31'"; 
			$jobsqaug=mysqli_query($conn,$jobsaug);
		    $jobsfaug=mysqli_fetch_array($jobsqaug);
			
			$jobssep="select sum(st_amt) as st_amt from s_job_card_sdetails where  jdate between '$year-09-01' and '$year-09-31'"; 
			$jobsqsep=mysqli_query($conn,$jobssep);
		    $jobsfsep=mysqli_fetch_array($jobsqsep);
			
			$jobsoct="select sum(st_amt) as st_amt from s_job_card_sdetails where  jdate between '$year-10-01' and '$year-10-31'"; 
			$jobsqoct=mysqli_query($conn,$jobsoct);
		    $jobsfoct=mysqli_fetch_array($jobsqoct);
			
			$jobsnov="select sum(st_amt) as st_amt from s_job_card_sdetails where jdate between '$year-11-01' and '$year-11-31'"; 
			$jobsqnov=mysqli_query($conn,$jobsnov);
		    $jobsfnov=mysqli_fetch_array($jobsqnov);
			
			$jobsdec="select sum(st_amt) as st_amt from s_job_card_sdetails where jdate between '$year-12-01' and '$year-12-31'"; 
			$jobsqdech=mysqli_query($conn,$jobsdec);
		    $jobsfdec=mysqli_fetch_array($jobsqdech);
			
			
		  
		  $jobsjanP="select sum(package_amt) as package_amt from s_job_card_pdetails where jdate between '$year-01-01' and '$year-01-31'"; 
			$jobsqjanP=mysqli_query($conn,$jobsjanP);
		    $jobsfjanP=mysqli_fetch_array($jobsqjanP); 
			
			 $jobsfebP="select sum(package_amt) as package_amt from s_job_card_pdetails where jdate between '$year-02-01' and '$year-02-28'"; 
			$jobsqfebP=mysqli_query($conn,$jobsfebP);
		    $jobsffebP=mysqli_fetch_array($jobsqfebP);
			
			$jobsmarchP="select sum(package_amt) as package_amt from s_job_card_pdetails where jdate between '$year-03-01' and '$year-03-31'"; 
			$jobsqmarchP=mysqli_query($conn,$jobsmarchP);
		    $jobsfmarchP=mysqli_fetch_array($jobsqmarchP);
			
			$jobsaprilP="select sum(package_amt) as package_amt from s_job_card_pdetails where jdate between '$year-04-01' and '$year-04-30'"; 
			$jobsqaprilP=mysqli_query($conn,$jobsaprilP);
		    $jobsfaprilP=mysqli_fetch_array($jobsqaprilP);
			
			$jobsmayP="select sum(package_amt) as package_amt from s_job_card_pdetails where  jdate between '$year-05-01' and '$year-05-31'"; 
			$jobsqmayP=mysqli_query($conn,$jobsmayP);
		    $jobsfmayP=mysqli_fetch_array($jobsqmayP);
			
			$jobsjuneP="select sum(package_amt) as package_amt from s_job_card_pdetails where  jdate between '$year-06-01' and '$year-06-31'"; 
			$jobsqjuneP=mysqli_query($conn,$jobsjuneP);
		    $jobsfjuneP=mysqli_fetch_array($jobsqjuneP);
			
			$jobsjulyP="select sum(package_amt) as package_amt from s_job_card_pdetails where  jdate between '$year-07-01' and '$year-07-31'"; 
			$jobsqjulyP=mysqli_query($conn,$jobsjulyP);
		    $jobsfjulyP=mysqli_fetch_array($jobsqjulyP);
			
			$jobsaugP="select sum(package_amt) as package_amt from s_job_card_pdetails where  jdate between '$year-08-01' and '$year-08-31'"; 
			$jobsqaugP=mysqli_query($conn,$jobsaugP);
		    $jobsfaugP=mysqli_fetch_array($jobsqaugP);
			
			$jobssepP="select Count(package_amt) as package_amt from s_job_card_pdetails where  jdate between '$year-09-01' and '$year-09-31'"; 
			$jobsqsepP=mysqli_query($conn,$jobssepP);
		    $jobsfsepP=mysqli_fetch_array($jobsqsepP);
			
			$jobsoctP="select sum(package_amt) as package_amt from s_job_card_pdetails where  jdate between '$year-10-01' and '$year-10-31'"; 
			$jobsqoctP=mysqli_query($conn,$jobsoctP);
		    $jobsfoctP=mysqli_fetch_array($jobsqoctP);
			
			$jobsnovP="select sum(package_amt) as package_amt from s_job_card_pdetails where  jdate between '$year-11-01' and '$year-11-31'"; 
			$jobsqnovP=mysqli_query($conn,$jobsnovP);
		    $jobsfnovP=mysqli_fetch_array($jobsqnovP);
			
			$jobsdecP="select sum(package_amt) as package_amt from s_job_card_pdetails where  jdate between '$year-12-01' and '$year-12-31'"; 
			$jobsqdechP=mysqli_query($conn,$jobsdecP);
		    $jobsfdecP=mysqli_fetch_array($jobsqdechP);
			
			
			
			
		?>
		
		<tr style="background-color:#CA202B;font-size:15px;font-weight:800;color:white">
		
		<td colspan="2">Total monthly revenue : </td>
		<td><?php echo number_format($jobsfjan['st_amt'] + $jobsfjanP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsffeb['st_amt'] + $jobsffebP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfmarch['st_amt'] + $jobsfmarchP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfapril['st_amt'] + $jobsfaprilP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfmay['st_amt'] + $jobsfmayP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfjune['st_amt'] + $jobsfjuneP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfjuly['st_amt'] + $jobsfjulyP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfaug['st_amt'] + $jobsfaugP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfsep['st_amt'] + $jobsfsepP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfoct['st_amt'] + $jobsfoctP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfnov['st_amt'] + $jobsfnovP['package_amt'],2);?></td>
		<td><?php echo number_format($jobsfdec['st_amt'] + $jobsfdecP['package_amt'],2);?></td>
		</tr>
			
			
				 </tbody>
               
              </table>
</body>



</html>
	<?php
	
}

if(isset($_POST['up_jdate']))
{	
$jobcard="select * from s_job_card";
$jobcardq=mysqli_query($conn,$jobcard);
while($jf=mysqli_fetch_array($jobcardq))
{

$fj="update s_job_card_sdetails set jdate='".$jf['jdate']."' where job_card_no='".$jf['id']."'";
$fjq=mysqli_query($conn,$fj);

$fj1="update s_job_card_pdetails set jdate='".$jf['jdate']."' where job_card_no='".$jf['id']."'";
$fjq1=mysqli_query($conn,$fj1);
header("location:revenue_ovrview.php");
}
}
?>

