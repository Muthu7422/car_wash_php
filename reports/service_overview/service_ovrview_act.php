<?php
include("../../includes.php");
include("../../redirect.php");
if(isset($_POST['sub_yaer']))
{
	$fromyear=$_POST['fromyear'];
	header("location:service_overview.php?fromyear=$fromyear");
}
if(isset($_POST['export']))
{
$date=date('d/m/Y');

header('Content-type: application/excel');
$filename = 'Service Overview-'.$date.'.xls';
header('Content-Disposition: attachment; filename='.$filename);

?>
<body>
     <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
				
				 <tr><h3>Company Name : <?php echo $_SESSION['company']?></h3></tr>
				 <tr><h4>Service Overview - <?php echo $_POST['fromyear'];?></h4></tr>
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
		 	$sname="select DISTINCT(stype) as stype from m_service_type where franchisee_id='".$_SESSION['BranchId']."' ";
		    $snameq=mysqli_query($conn,$sname);
		   while($snamef=mysqli_fetch_array($snameq))
		   {
			
		    $i++;
            
			//SELECT * FROM `s_job_card_sdetails` where service_type='BIKE WASH' AND job_card_no IN (SELECT id from s_job_card where jdate BETWEEN '2019-02-01' AND '2019-02-31')	
			$year=trim($_POST['fromyear']);
		  $jobsjan="select count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-01-01' and '$year-01-31'"; 
			$jobsqjan=mysqli_query($conn,$jobsjan);
		    $jobsfjan=mysqli_fetch_array($jobsqjan); 
			
			 $jobsfeb="select count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-02-01' and '$year-02-28'"; 
			$jobsqfeb=mysqli_query($conn,$jobsfeb);
		    $jobsffeb=mysqli_fetch_array($jobsqfeb);
			
			$jobsmarch="select count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-03-01' and '$year-03-31'"; 
			$jobsqmarch=mysqli_query($conn,$jobsmarch);
		    $jobsfmarch=mysqli_fetch_array($jobsqmarch);
			
			$jobsapril="select count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-04-01' and '$year-04-30'"; 
			$jobsqapril=mysqli_query($conn,$jobsapril);
		    $jobsfapril=mysqli_fetch_array($jobsqapril);
			
			$jobsmay="select count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-05-01' and '$year-05-31'"; 
			$jobsqmay=mysqli_query($conn,$jobsmay);
		    $jobsfmay=mysqli_fetch_array($jobsqmay);
			
			$jobsjune="select count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-06-01' and '$year-06-31'"; 
			$jobsqjune=mysqli_query($conn,$jobsjune);
		    $jobsfjune=mysqli_fetch_array($jobsqjune);
			
			$jobsjuly="select count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-07-01' and '$year-07-31'"; 
			$jobsqjuly=mysqli_query($conn,$jobsjuly);
		    $jobsfjuly=mysqli_fetch_array($jobsqjuly);
			
			$jobsaug="select count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-08-01' and '$year-08-31'"; 
			$jobsqaug=mysqli_query($conn,$jobsaug);
		    $jobsfaug=mysqli_fetch_array($jobsqaug);
			
			$jobssep="select count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-09-01' and '$year-09-31'"; 
			$jobsqsep=mysqli_query($conn,$jobssep);
		    $jobsfsep=mysqli_fetch_array($jobsqsep);
			
			$jobsoct="select count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-10-01' and '$year-10-31'"; 
			$jobsqoct=mysqli_query($conn,$jobsoct);
		    $jobsfoct=mysqli_fetch_array($jobsqoct);
			
			$jobsnov="select count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-11-01' and '$year-11-31'"; 
			$jobsqnov=mysqli_query($conn,$jobsnov);
		    $jobsfnov=mysqli_fetch_array($jobsqnov);
			
			$jobsdec="select count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-12-01' and '$year-12-31'"; 
			$jobsqdech=mysqli_query($conn,$jobsdec);
		    $jobsfdec=mysqli_fetch_array($jobsqdech);
			
		
			
		?>
		
		
		
		<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $snamef['stype'];?></td>
		<td><?php echo $jobsfjan['id'];?></td>
		<td><?php echo $jobsffeb['id'];?></td>
		<td><?php echo $jobsfmarch['id'];?></td>
		<td><?php echo $jobsfapril['id'];?></td>
		<td><?php echo $jobsfmay['id'];?></td>
		<td><?php echo $jobsfjune['id'];?></td>
		<td><?php echo $jobsfjuly['id'];?></td>
		<td><?php echo $jobsfaug['id'];?></td>
		<td><?php echo $jobsfsep['id'];?></td>
		<td><?php echo $jobsfoct['id'];?></td>
		<td><?php echo $jobsfnov['id'];?></td>
		<td><?php echo $jobsfdec['id'];?></td>
		
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
		  $jobsjanP="select count(id) as id from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-01-01' and '$year-01-31'"; 
			$jobsqjanP=mysqli_query($conn,$jobsjanP);
		    $jobsfjanP=mysqli_fetch_array($jobsqjanP); 
			
			 $jobsfebP="select count(id) as id from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-02-01' and '$year-02-28'"; 
			$jobsqfebP=mysqli_query($conn,$jobsfebP);
		    $jobsffebP=mysqli_fetch_array($jobsqfebP);
			
			$jobsmarchP="select count(id) as id from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-03-01' and '$year-03-31'"; 
			$jobsqmarchP=mysqli_query($conn,$jobsmarchP);
		    $jobsfmarchP=mysqli_fetch_array($jobsqmarchP);
			
			$jobsaprilP="select count(id) as id from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-04-01' and '$year-04-30'"; 
			$jobsqaprilP=mysqli_query($conn,$jobsaprilP);
		    $jobsfaprilP=mysqli_fetch_array($jobsqaprilP);
			
			$jobsmayP="select count(id) as id from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-05-01' and '$year-05-31'"; 
			$jobsqmayP=mysqli_query($conn,$jobsmayP);
		    $jobsfmayP=mysqli_fetch_array($jobsqmayP);
			
			$jobsjuneP="select count(id) as id from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-06-01' and '$year-06-31'"; 
			$jobsqjuneP=mysqli_query($conn,$jobsjuneP);
		    $jobsfjuneP=mysqli_fetch_array($jobsqjuneP);
			
			$jobsjulyP="select count(id) as id from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-07-01' and '$year-07-31'"; 
			$jobsqjulyP=mysqli_query($conn,$jobsjulyP);
		    $jobsfjulyP=mysqli_fetch_array($jobsqjulyP);
			
			$jobsaugP="select count(id) as id from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-08-01' and '$year-08-31'"; 
			$jobsqaugP=mysqli_query($conn,$jobsaugP);
		    $jobsfaugP=mysqli_fetch_array($jobsqaugP);
			
			$jobssepP="select count(id) as id from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-09-01' and '$year-09-31'"; 
			$jobsqsepP=mysqli_query($conn,$jobssepP);
		    $jobsfsepP=mysqli_fetch_array($jobsqsepP);
			
			$jobsoctP="select count(id) as id from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-10-01' and '$year-10-31'"; 
			$jobsqoctP=mysqli_query($conn,$jobsoctP);
		    $jobsfoctP=mysqli_fetch_array($jobsqoctP);
			
			$jobsnovP="select count(id) as id from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-11-01' and '$year-11-31'"; 
			$jobsqnovP=mysqli_query($conn,$jobsnovP);
		    $jobsfnovP=mysqli_fetch_array($jobsqnovP);
			
			$jobsdecP="select count(id) as id from s_job_card_pdetails where package_type='".$Pnamef['package_name']."' and jdate between '$year-12-01' and '$year-12-31'"; 
			$jobsqdechP=mysqli_query($conn,$jobsdecP);
		    $jobsfdecP=mysqli_fetch_array($jobsqdechP);
			
			
		
			
		?>
		
			<tr>
			
			<td><?php echo $i;?></td>
		<td><?php echo $Pnamef['package_name'];?></td>
		<td><?php echo $jobsfjanP['id'];?></td>
		<td><?php echo $jobsffebP['id'];?></td>
		<td><?php echo $jobsfmarchP['id'];?></td>
		<td><?php echo $jobsfaprilP['id'];?></td>
		<td><?php echo $jobsfmayP['id'];?></td>
		<td><?php echo $jobsfjuneP['id'];?></td>
		<td><?php echo $jobsfjulyP['id'];?></td>
		<td><?php echo $jobsfaugP['id'];?></td>
		<td><?php echo $jobsfsepP['id'];?></td>
		<td><?php echo $jobsfoctP['id'];?></td>
		<td><?php echo $jobsfnovP['id'];?></td>
		<td><?php echo $jobsfdecP['id'];?></td>
			
			
			</tr>
			<?php
		   }
		   ?>
			 </tbody>
			 
			 	 <tbody>
		 <?php
		$year=trim($_POST['fromyear']);
		
		    $jobsjan="select count(id) as id from s_job_card_sdetails where jdate between '$year-01-01' and '$year-01-31'"; 
			$jobsqjan=mysqli_query($conn,$jobsjan);
		    $jobsfjan=mysqli_fetch_array($jobsqjan); 
			
			 $jobsfeb="select count(id) as id from s_job_card_sdetails where  jdate between '$year-02-01' and '$year-02-28'"; 
			$jobsqfeb=mysqli_query($conn,$jobsfeb);
		    $jobsffeb=mysqli_fetch_array($jobsqfeb);
			
			$jobsmarch="select count(id) as id from s_job_card_sdetails where  jdate between '$year-03-01' and '$year-03-31'"; 
			$jobsqmarch=mysqli_query($conn,$jobsmarch);
		    $jobsfmarch=mysqli_fetch_array($jobsqmarch);
			
			$jobsapril="select count(id) as id from s_job_card_sdetails where  jdate between '$year-04-01' and '$year-04-30'"; 
			$jobsqapril=mysqli_query($conn,$jobsapril);
		    $jobsfapril=mysqli_fetch_array($jobsqapril);
			
			$jobsmay="select count(id) as id from s_job_card_sdetails where  jdate between '$year-05-01' and '$year-05-31'"; 
			$jobsqmay=mysqli_query($conn,$jobsmay);
		    $jobsfmay=mysqli_fetch_array($jobsqmay);
			
			$jobsjune="select count(id) as id from s_job_card_sdetails where jdate between '$year-06-01' and '$year-06-31'"; 
			$jobsqjune=mysqli_query($conn,$jobsjune);
		    $jobsfjune=mysqli_fetch_array($jobsqjune);
			
			$jobsjuly="select count(id) as id from s_job_card_sdetails where  jdate between '$year-07-01' and '$year-07-31'"; 
			$jobsqjuly=mysqli_query($conn,$jobsjuly);
		    $jobsfjuly=mysqli_fetch_array($jobsqjuly);
			
			$jobsaug="select count(id) as id from s_job_card_sdetails where  jdate between '$year-08-01' and '$year-08-31'"; 
			$jobsqaug=mysqli_query($conn,$jobsaug);
		    $jobsfaug=mysqli_fetch_array($jobsqaug);
			
			$jobssep="select count(id) as id from s_job_card_sdetails where  jdate between '$year-09-01' and '$year-09-31'"; 
			$jobsqsep=mysqli_query($conn,$jobssep);
		    $jobsfsep=mysqli_fetch_array($jobsqsep);
			
			$jobsoct="select count(id) as id from s_job_card_sdetails where  jdate between '$year-10-01' and '$year-10-31'"; 
			$jobsqoct=mysqli_query($conn,$jobsoct);
		    $jobsfoct=mysqli_fetch_array($jobsqoct);
			
			$jobsnov="select count(id) as id from s_job_card_sdetails where jdate between '$year-11-01' and '$year-11-31'"; 
			$jobsqnov=mysqli_query($conn,$jobsnov);
		    $jobsfnov=mysqli_fetch_array($jobsqnov);
			
			$jobsdec="select count(id) as id from s_job_card_sdetails where jdate between '$year-12-01' and '$year-12-31'"; 
			$jobsqdech=mysqli_query($conn,$jobsdec);
		    $jobsfdec=mysqli_fetch_array($jobsqdech);
			
			
		  
		  $jobsjanP="select count(id) as id from s_job_card_pdetails where jdate between '$year-01-01' and '$year-01-31'"; 
			$jobsqjanP=mysqli_query($conn,$jobsjanP);
		    $jobsfjanP=mysqli_fetch_array($jobsqjanP); 
			
			 $jobsfebP="select count(id) as id from s_job_card_pdetails where jdate between '$year-02-01' and '$year-02-28'"; 
			$jobsqfebP=mysqli_query($conn,$jobsfebP);
		    $jobsffebP=mysqli_fetch_array($jobsqfebP);
			
			$jobsmarchP="select count(id) as id from s_job_card_pdetails where jdate between '$year-03-01' and '$year-03-31'"; 
			$jobsqmarchP=mysqli_query($conn,$jobsmarchP);
		    $jobsfmarchP=mysqli_fetch_array($jobsqmarchP);
			
			$jobsaprilP="select count(id) as id from s_job_card_pdetails where jdate between '$year-04-01' and '$year-04-30'"; 
			$jobsqaprilP=mysqli_query($conn,$jobsaprilP);
		    $jobsfaprilP=mysqli_fetch_array($jobsqaprilP);
			
			$jobsmayP="select count(id) as id from s_job_card_pdetails where  jdate between '$year-05-01' and '$year-05-31'"; 
			$jobsqmayP=mysqli_query($conn,$jobsmayP);
		    $jobsfmayP=mysqli_fetch_array($jobsqmayP);
			
			$jobsjuneP="select count(id) as id from s_job_card_pdetails where  jdate between '$year-06-01' and '$year-06-31'"; 
			$jobsqjuneP=mysqli_query($conn,$jobsjuneP);
		    $jobsfjuneP=mysqli_fetch_array($jobsqjuneP);
			
			$jobsjulyP="select count(id) as id from s_job_card_pdetails where  jdate between '$year-07-01' and '$year-07-31'"; 
			$jobsqjulyP=mysqli_query($conn,$jobsjulyP);
		    $jobsfjulyP=mysqli_fetch_array($jobsqjulyP);
			
			$jobsaugP="select count(id) as id from s_job_card_pdetails where  jdate between '$year-08-01' and '$year-08-31'"; 
			$jobsqaugP=mysqli_query($conn,$jobsaugP);
		    $jobsfaugP=mysqli_fetch_array($jobsqaugP);
			
			$jobssepP="select count(id) as id from s_job_card_pdetails where  jdate between '$year-09-01' and '$year-09-31'"; 
			$jobsqsepP=mysqli_query($conn,$jobssepP);
		    $jobsfsepP=mysqli_fetch_array($jobsqsepP);
			
			$jobsoctP="select count(id) as id from s_job_card_pdetails where  jdate between '$year-10-01' and '$year-10-31'"; 
			$jobsqoctP=mysqli_query($conn,$jobsoctP);
		    $jobsfoctP=mysqli_fetch_array($jobsqoctP);
			
			$jobsnovP="select count(id) as id from s_job_card_pdetails where  jdate between '$year-11-01' and '$year-11-31'"; 
			$jobsqnovP=mysqli_query($conn,$jobsnovP);
		    $jobsfnovP=mysqli_fetch_array($jobsqnovP);
			
			$jobsdecP="select count(id) as id from s_job_card_pdetails where  jdate between '$year-12-01' and '$year-12-31'"; 
			$jobsqdechP=mysqli_query($conn,$jobsdecP);
		    $jobsfdecP=mysqli_fetch_array($jobsqdechP);
			
			
			
			
		?>
		
		<tr style="background-color:#CA202B;font-size:15px;font-weight:800;color:white">
		
		<td colspan="2">Total Service Overview : </td>
		<td><?php echo $jobsfjan['id'] + $jobsfjanP['id'];?></td>
		<td><?php echo $jobsffeb['id'] + $jobsffebP['id'];?></td>
		<td><?php echo $jobsfmarch['id'] + $jobsfmarchP['id'];?></td>
		<td><?php echo $jobsfapril['id'] + $jobsfaprilP['id'];?></td>
		<td><?php echo $jobsfmay['id'] + $jobsfmayP['id'];?></td>
		<td><?php echo $jobsfjune['id'] + $jobsfjuneP['id'];?></td>
		<td><?php echo $jobsfjuly['id'] + $jobsfjulyP['id'];?></td>
		<td><?php echo $jobsfaug['id'] + $jobsfaugP['id'];?></td>
		<td><?php echo $jobsfsep['id'] + $jobsfsepP['id'];?></td>
		<td><?php echo $jobsfoct['id'] + $jobsfoctP['id'];?></td>
		<td><?php echo $jobsfnov['id'] + $jobsfnovP['id'];?></td>
		<td><?php echo $jobsfdec['id'] + $jobsfdecP['id'];?></td>
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

