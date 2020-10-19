<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);
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
     Service Annual Report 
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
              <h3 class="box-title">Service Overview</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form class="form-horizontal" method="post" action="service_ovrview_act.php" autocomplete="off">
              <div class="box-body">
			  
			    <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="date">Select The Year</label>
                 <input type="number" name="fromyear" id="fromyear" min="1900" max="2099" step="1" value="<?php if($_REQUEST['fromyear']!=''){ echo trim($_REQUEST['fromyear']); } else{ echo date("Y"); }?>" class="form-control">
                </div>
				
				<input type="submit" name="sub_yaer" value="Submit Year" class="btn btn-info pull-right">
              </div>
			  
			  
		 <div class="box-body">
                <div class="form-group col-sm-12">
				<div style="overflow:auto">
                <table id="example1" class="table table-bordered table-striped" width="150%">
                <thead>
		<tr>
		<th>Sl No </th>
		<th>Service Name</th>
		<th>January / <?php if($_REQUEST['fromyear']!=''){ echo $_REQUEST['fromyear'];}else{ echo date("Y");}?></th>
		<th>February / <?php if($_REQUEST['fromyear']!=''){ echo $_REQUEST['fromyear'];}else{ echo date("Y");}?></th>
		<th>March / <?php if($_REQUEST['fromyear']!=''){ echo $_REQUEST['fromyear'];}else{ echo date("Y");}?></th>
		<th>April / <?php if($_REQUEST['fromyear']!=''){ echo $_REQUEST['fromyear'];}else{ echo date("Y");}?></th>
		<th>May / <?php if($_REQUEST['fromyear']!=''){ echo $_REQUEST['fromyear'];}else{ echo date("Y");}?></th>
		<th>June / <?php if($_REQUEST['fromyear']!=''){ echo $_REQUEST['fromyear'];}else{ echo date("Y");}?></th>
		<th>July / <?php if($_REQUEST['fromyear']!=''){ echo $_REQUEST['fromyear'];}else{ echo date("Y");}?></th>
		<th>August / <?php if($_REQUEST['fromyear']!=''){ echo $_REQUEST['fromyear'];}else{ echo date("Y");}?></th>
		<th>September / <?php if($_REQUEST['fromyear']!=''){ echo $_REQUEST['fromyear'];}else{ echo date("Y");}?></th>
		<th>October / <?php if($_REQUEST['fromyear']!=''){ echo $_REQUEST['fromyear'];}else{ echo date("Y");}?></th>
		<th>November / <?php if($_REQUEST['fromyear']!=''){ echo $_REQUEST['fromyear'];}else{ echo date("Y");}?></th>
		<th>December / <?php if($_REQUEST['fromyear']!=''){ echo $_REQUEST['fromyear'];}else{ echo date("Y");}?></th>
		
		</tr>
		 </thead>
		 <tbody>
		<?php
		
		$j=0;
		$i=0;
			$sname="select DISTINCT(stype) as stype from m_service_type where franchisee_id='".$_SESSION['BranchId']."'";
		    $snameq=mysqli_query($conn,$sname);
		   while($snamef=mysqli_fetch_array($snameq))
		   {
			
		    $i++;
            
			//SELECT * FROM `s_job_card_sdetails` where service_type='BIKE WASH' AND job_card_no IN (SELECT id from s_job_card where jdate BETWEEN '2019-02-01' AND '2019-02-31')	
			
			if($_REQUEST['fromyear']!='')
			{
			$year=$_REQUEST['fromyear']; 
			}
			else
			{
			$year=date("Y");
			}
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
		
		
			$Pname="select DISTINCT(package_name) as package_name from m_package where package_name!='' and franchisee_id='".$_SESSION['FranchiseeId']."'";
		    $Pnameq=mysqli_query($conn,$Pname);
		   while($Pnamef=mysqli_fetch_array($Pnameq))
		   {
			
		    $i++;
            
			//SELECT * FROM `s_job_card_sdetails` where service_type='BIKE WASH' AND job_card_no IN (SELECT id from s_job_card where jdate BETWEEN '2019-02-01' AND '2019-02-31')	
			if($_REQUEST['fromyear']!='')
			{
			$year=$_REQUEST['fromyear']; 
			}
			else
			{
			$year=date("Y");
			}
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
		if($_REQUEST['fromyear']!='')
			{
			$year=$_REQUEST['fromyear']; 
			}
			else
			{
			$year=date("Y");
			}
		
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
		</div>
		</div>
		
		     
		
		</div>
		
              <!-- /.box-body -->
			 
                <div class="box-footer">
			   <button  type="submit" name="export" id="export" class="btn btn-info pull-left">EXPORT Service Overview to EXCEL</button>
                <button  type="submit" name="up_jdate" id="up_jdate" class="btn btn-info pull-right">Submit</button>
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