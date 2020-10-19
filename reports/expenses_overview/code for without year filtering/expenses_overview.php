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
              <h3 class="box-title">Expenses Overview</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form class="form-horizontal" method="post" action="expenses_overview_export.php" autocomplete="off">
              <div class="box-body">
 
              

              </div>
			  
			  
		 <div class="box-body">
                <div class="form-group col-sm-12">
				<div style="overflow:auto">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
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
		<?php } ?>
			
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
		
		</div>
		
		</div>
		
              <!-- /.box-body -->
			    <div class="box-footer">
			 
                <button  type="submit" class="btn btn-info pull-right" >EXPORT Overall Expenses To EXCEL </button>
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