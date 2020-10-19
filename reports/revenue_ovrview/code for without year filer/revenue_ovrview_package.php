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
			$sname="select DISTINCT(stype) as stype from m_service_type where stype!=''";
		    $snameq=mysqli_query($conn,$sname);
		   while($snamef=mysqli_fetch_array($snameq))
		   {
			
		    $i++;
            
			//SELECT * FROM `s_job_card_sdetails` where service_type='BIKE WASH' AND job_card_no IN (SELECT id from s_job_card where jdate BETWEEN '2019-02-01' AND '2019-02-31')	
			$year=date("Y");
		  $jobsjan="select Count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-01-01' and '$year-01-31'"; 
			$jobsqjan=mysqli_query($conn,$jobsjan);
		    $jobsfjan=mysqli_fetch_array($jobsqjan); 
			
			 $jobsfeb="select Count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-02-01' and '$year-02-28'"; 
			$jobsqfeb=mysqli_query($conn,$jobsfeb);
		    $jobsffeb=mysqli_fetch_array($jobsqfeb);
			
			$jobsmarch="select Count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-03-01' and '$year-03-31'"; 
			$jobsqmarch=mysqli_query($conn,$jobsmarch);
		    $jobsfmarch=mysqli_fetch_array($jobsqmarch);
			
			$jobsapril="select Count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-04-01' and '$year-04-30'"; 
			$jobsqapril=mysqli_query($conn,$jobsapril);
		    $jobsfapril=mysqli_fetch_array($jobsqapril);
			
			$jobsmay="select Count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-05-01' and '$year-05-31'"; 
			$jobsqmay=mysqli_query($conn,$jobsmay);
		    $jobsfmay=mysqli_fetch_array($jobsqmay);
			
			$jobsjune="select Count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-06-01' and '$year-06-31'"; 
			$jobsqjune=mysqli_query($conn,$jobsjune);
		    $jobsfjune=mysqli_fetch_array($jobsqjune);
			
			$jobsjuly="select Count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-07-01' and '$year-07-31'"; 
			$jobsqjuly=mysqli_query($conn,$jobsjuly);
		    $jobsfjuly=mysqli_fetch_array($jobsqjuly);
			
			$jobsaug="select Count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-08-01' and '$year-08-31'"; 
			$jobsqaug=mysqli_query($conn,$jobsaug);
		    $jobsfaug=mysqli_fetch_array($jobsqaug);
			
			$jobssep="select Count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-09-01' and '$year-09-31'"; 
			$jobsqsep=mysqli_query($conn,$jobssep);
		    $jobsfsep=mysqli_fetch_array($jobsqsep);
			
			$jobsoct="select Count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-10-01' and '$year-10-31'"; 
			$jobsqoct=mysqli_query($conn,$jobsoct);
		    $jobsfoct=mysqli_fetch_array($jobsqoct);
			
			$jobsnov="select Count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-11-01' and '$year-11-31'"; 
			$jobsqnov=mysqli_query($conn,$jobsnov);
		    $jobsfnov=mysqli_fetch_array($jobsqnov);
			
			$jobsdec="select Count(id) as id from s_job_card_sdetails where service_type='".$snamef['stype']."' and jdate between '$year-12-01' and '$year-12-31'"; 
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
		<?php
			}
			?>
		</tr>
		 
		 <?php
		 $year=date("Y");
		 
		 	$sname="select DISTINCT(package_name) as ptype from m_package where package_name!=''";
		    $snameq=mysqli_query($conn,$sname);
		   while($snamef=mysqli_fetch_array($snameq))
		   {
			$i++;
            $jobsjan="select Count(id) as id from s_job_card_pdetails where package_type='".$snamef['ptype']."' and jdate between '$year-01-01' AND '$year-01-31'"; 
			$jobsqjan=mysqli_query($conn,$jobsjan);
		    $jobsfjan=mysqli_fetch_array($jobsqjan); 
			
			$jobsfeb="select Count(id) as id from s_job_card_pdetails where package_type='".$snamef['ptype']."' and jdate between '$year-02-01' and '$year-02-28'"; 
			$jobsqfeb=mysqli_query($conn,$jobsfeb);
		    $jobsffeb=mysqli_fetch_array($jobsqfeb);
			
			$jobsmarch="select Count(id) as id from s_job_card_pdetails where package_type='".$snamef['ptype']."' and jdate between '$year-03-01' and '$year-03-31'"; 
			$jobsqmarch=mysqli_query($conn,$jobsmarch);
		    $jobsfmarch=mysqli_fetch_array($jobsqmarch);
			
			$jobsapril="select Count(id) as id from s_job_card_pdetails where package_type='".$snamef['ptype']."' and jdate between '$year-04-01' and '$year-04-30'"; 
			$jobsqapril=mysqli_query($conn,$jobsapril);
		    $jobsfapril=mysqli_fetch_array($jobsqapril);
			
			$jobsmay="select Count(id) as id from s_job_card_pdetails where package_type='".$snamef['ptype']."' and jdate between '$year-05-01' and '$year-05-31'"; 
			$jobsqmay=mysqli_query($conn,$jobsmay);
		    $jobsfmay=mysqli_fetch_array($jobsqmay);
			
			$jobsjune="select Count(id) as id from s_job_card_pdetails where package_type='".$snamef['ptype']."' and jdate between '$year-06-01' and '$year-06-31'"; 
			$jobsqjune=mysqli_query($conn,$jobsjune);
		    $jobsfjune=mysqli_fetch_array($jobsqjune);
			
			$jobsjuly="select Count(id) as id from s_job_card_pdetails where package_type='".$snamef['ptype']."' and jdate between '$year-07-01' and '$year-07-31'"; 
			$jobsqjuly=mysqli_query($conn,$jobsjuly);
		    $jobsfjuly=mysqli_fetch_array($jobsqjuly);
			
			$jobsaug="select Count(id) as id from s_job_card_pdetails where package_type='".$snamef['ptype']."' and jdate between '$year-08-01' and '$year-08-31'"; 
			$jobsqaug=mysqli_query($conn,$jobsaug);
		    $jobsfaug=mysqli_fetch_array($jobsqaug);
			
			$jobssep="select Count(id) as id from s_job_card_pdetails where package_type='".$snamef['ptype']."' and jdate between '$year-09-01' and '$year-09-31'"; 
			$jobsqsep=mysqli_query($conn,$jobssep);
		    $jobsfsep=mysqli_fetch_array($jobsqsep);
			
			$jobsoct="select Count(id) as id from s_job_card_pdetails where package_type='".$snamef['ptype']."' and jdate between '$year-10-01' and '$year-10-31'"; 
			$jobsqoct=mysqli_query($conn,$jobsoct);
		    $jobsfoct=mysqli_fetch_array($jobsqoct);
			
			$jobsnov="select Count(id) as id from s_job_card_pdetails where package_type='".$snamef['ptype']."' and jdate between '$year-11-01' and '$year-11-31'"; 
			$jobsqnov=mysqli_query($conn,$jobsnov);
		    $jobsfnov=mysqli_fetch_array($jobsqnov);
			
			$jobsdec="select Count(id) as id from s_job_card_pdetails where package_type='".$snamef['ptype']."' and jdate between '$year-12-01' and '$year-12-31'"; 
			$jobsqdech=mysqli_query($conn,$jobsdec);
		    $jobsfdec=mysqli_fetch_array($jobsqdech);
			?>
			<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $snamef['ptype'];?></td>
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
			 </tbody>
			
		</table>
		</div>
		</div>
		
		      <table class="table table-bordered">
                <thead>
		<tr style="background-color:red; color:white;font-size:15px;font-weight:800">
		
		<th>&nbsp </th>
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
		$year=date("Y");
		  $jobsjan="select Count(id) as id from s_job_card_sdetails where jdate between '$year-01-01' and '$year-01-31'"; 
			$jobsqjan=mysqli_query($conn,$jobsjan);
		    $jobsfjan=mysqli_fetch_array($jobsqjan); 
			
			 $jobsfeb="select Count(id) as id from s_job_card_sdetails where  jdate between '$year-02-01' and '$year-02-28'"; 
			$jobsqfeb=mysqli_query($conn,$jobsfeb);
		    $jobsffeb=mysqli_fetch_array($jobsqfeb);
			
			$jobsmarch="select Count(id) as id from s_job_card_sdetails where  jdate between '$year-03-01' and '$year-03-31'"; 
			$jobsqmarch=mysqli_query($conn,$jobsmarch);
		    $jobsfmarch=mysqli_fetch_array($jobsqmarch);
			
			$jobsapril="select Count(id) as id from s_job_card_sdetails where  jdate between '$year-04-01' and '$year-04-30'"; 
			$jobsqapril=mysqli_query($conn,$jobsapril);
		    $jobsfapril=mysqli_fetch_array($jobsqapril);
			
			$jobsmay="select Count(id) as id from s_job_card_sdetails where  jdate between '$year-05-01' and '$year-05-31'"; 
			$jobsqmay=mysqli_query($conn,$jobsmay);
		    $jobsfmay=mysqli_fetch_array($jobsqmay);
			
			$jobsjune="select Count(id) as id from s_job_card_sdetails where jdate between '$year-06-01' and '$year-06-31'"; 
			$jobsqjune=mysqli_query($conn,$jobsjune);
		    $jobsfjune=mysqli_fetch_array($jobsqjune);
			
			$jobsjuly="select Count(id) as id from s_job_card_sdetails where  jdate between '$year-07-01' and '$year-07-31'"; 
			$jobsqjuly=mysqli_query($conn,$jobsjuly);
		    $jobsfjuly=mysqli_fetch_array($jobsqjuly);
			
			$jobsaug="select Count(id) as id from s_job_card_sdetails where  jdate between '$year-08-01' and '$year-08-31'"; 
			$jobsqaug=mysqli_query($conn,$jobsaug);
		    $jobsfaug=mysqli_fetch_array($jobsqaug);
			
			$jobssep="select Count(id) as id from s_job_card_sdetails where  jdate between '$year-09-01' and '$year-09-31'"; 
			$jobsqsep=mysqli_query($conn,$jobssep);
		    $jobsfsep=mysqli_fetch_array($jobsqsep);
			
			$jobsoct="select Count(id) as id from s_job_card_sdetails where  jdate between '$year-10-01' and '$year-10-31'"; 
			$jobsqoct=mysqli_query($conn,$jobsoct);
		    $jobsfoct=mysqli_fetch_array($jobsqoct);
			
			$jobsnov="select Count(id) as id from s_job_card_sdetails where jdate between '$year-11-01' and '$year-11-31'"; 
			$jobsqnov=mysqli_query($conn,$jobsnov);
		    $jobsfnov=mysqli_fetch_array($jobsqnov);
			
			$jobsdec="select Count(id) as id from s_job_card_sdetails where jdate between '$year-12-01' and '$year-12-31'"; 
			$jobsqdech=mysqli_query($conn,$jobsdec);
		    $jobsfdec=mysqli_fetch_array($jobsqdech);
			
			
			
			
			
		?>
		
		<tr style="background-color:black;font-size:15px;font-weight:800;color:white">
		
		<td>Total monthly revenue : </td>
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
	
			</tbody>
			 </table>
		
		</div>
		
              <!-- /.box-body -->
			 
                <div class="box-footer">
			 
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