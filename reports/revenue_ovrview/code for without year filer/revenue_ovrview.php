<?php
include("../../includes.php");
include("../../redirect.php");




?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
   
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!--header Starts-->
  <?php include("../../header.php"); ?>
  <!--Header End -->
  <!-- Left side column. contains the logo and sidebar -->
   <?php include("../../leftbar.php"); ?>
 <!-- Side Bar End -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#ECF0F5">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     Annual Report 
      </h1>
     </section>
<script>
function Delete_Click() {
    var strconfirm = confirm("Are you sure you want to delete?");
    if (strconfirm == true) {
        return true;
    }
	else
		return false;
}  
  
  
</script>	
<script>

function tabE(obj,e){ 
   var e=(typeof event!='undefined')?window.event:e;// IE : Moz 
   if(e.keyCode==13){ 
     var ele = document.forms[0].elements; 
     for(var i=0;i<ele.length;i++){ 
       var q=(i==ele.length-1)?0:i+1;// if last element : if any other 
       if(obj==ele[i]){ele[q].focus();break} 
     } 
  return false; 
   } 
  }
  
</script> 

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Revenue Overview</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form class="form-horizontal" method="post" action="revenue_ovrview_act.php" autocomplete="off">
              <div class="box-body">
 
              

              </div>
			  
			  
		 <div class="box-body">
                <div class="form-group col-sm-12">
				<div style="overflow:auto">
                <table id="example1" class="table table-bordered table-striped" width="150%">
                <thead>
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
			$year=date("Y");
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
			$year=date("Y");
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
		$year=date("Y");
		
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
		</div>
		</div>
		
		     
		
		</div>
		
              <!-- /.box-body -->
			 
                <div class="box-footer">
			   <button  type="submit" name="export" id="export" class="btn btn-info pull-left">EXPORT Revenue Overview to EXCEL</button>
                <button  type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
			  
			  
            </form>
			
			
		
          </div>
        </div>
		
		
      </div>
	 
    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
	 
	 
     user experience. -->
	  <?php include("../../footer.php"); ?>
  <!--footer End-->
 <div class="control-sidebar-bg"></div>
 <?php include("../../includes_db_js.php"); ?>
 
 
</body>
</html>