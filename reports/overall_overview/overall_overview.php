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
              <h3 class="box-title">Overall Overview</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form class="form-horizontal" method="post" action="overall_overview_export.php" autocomplete="off">
              <div class="box-body">
 
               <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="date">Select The Year</label>
                 <input type="number" name="fromyear" id="fromyear" min="1900" max="2099" step="1" value="<?php if($_REQUEST['fromyear']!=''){ echo trim($_REQUEST['fromyear']); } else{ echo date("Y"); }?>" class="form-control">
                </div>
				
				<input type="submit" name="sub_yaer" value="Submit Year" class="btn btn-info pull-right">

              </div>
			  
			  
			  
			 <div class="box-body">	   
<table class="table table-bordered">
<thead>
<tr style="background-color:#FAEBD7">
<th>P&L metrics</th>
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
 if($_REQUEST['fromyear']!='')
 {
	 $year=$_REQUEST['fromyear'];
 }
 else
 {
	 $year=date("Y");
 }
		
		  $jobsjan="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where bill_date between '$year-01-01' and '$year-01-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqjan=mysqli_query($conn,$jobsjan);
		    $jobsfjan=mysqli_fetch_array($jobsqjan); 
			
			 $jobsfeb="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-02-01' and '$year-02-28' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqfeb=mysqli_query($conn,$jobsfeb);
		    $jobsffeb=mysqli_fetch_array($jobsqfeb);
			
			$jobsmarch="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-03-01' and '$year-03-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqmarch=mysqli_query($conn,$jobsmarch);
		    $jobsfmarch=mysqli_fetch_array($jobsqmarch);
			
			$jobsapril="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-04-01' and '$year-04-30' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqapril=mysqli_query($conn,$jobsapril);
		    $jobsfapril=mysqli_fetch_array($jobsqapril);
			
			$jobsmay="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-05-01' and '$year-05-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqmay=mysqli_query($conn,$jobsmay);
		    $jobsfmay=mysqli_fetch_array($jobsqmay);
			
			$jobsjune="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where bill_date between '$year-06-01' and '$year-06-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqjune=mysqli_query($conn,$jobsjune);
		    $jobsfjune=mysqli_fetch_array($jobsqjune);
			
			$jobsjuly="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-07-01' and '$year-07-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqjuly=mysqli_query($conn,$jobsjuly);
		    $jobsfjuly=mysqli_fetch_array($jobsqjuly);
			
			$jobsaug="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-08-01' and '$year-08-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqaug=mysqli_query($conn,$jobsaug);
		    $jobsfaug=mysqli_fetch_array($jobsqaug);
			
			$jobssep="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-09-01' and '$year-09-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqsep=mysqli_query($conn,$jobssep);
		    $jobsfsep=mysqli_fetch_array($jobsqsep);
			
			$jobsoct="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-10-01' and '$year-10-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqoct=mysqli_query($conn,$jobsoct);
		    $jobsfoct=mysqli_fetch_array($jobsqoct);
			
			$jobsnov="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where bill_date between '$year-11-01' and '$year-11-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqnov=mysqli_query($conn,$jobsnov);
		    $jobsfnov=mysqli_fetch_array($jobsqnov);
			
			$jobsdec="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where bill_date between '$year-12-01' and '$year-12-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqdech=mysqli_query($conn,$jobsdec);
		    $jobsfdec=mysqli_fetch_array($jobsqdech);
			
			
		  
		 
		?>
		
		<tr>
		
		<td style="background-color:#F0F8FF"><b>Revenue : </b></td>
		<td><?php echo number_format($jobsfjan['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsffeb['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfmarch['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfapril['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfmay['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfjune['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfjuly['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfaug['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfsep['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfoct['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfnov['ServiceAmountAfterGst'],2);?></td>
		<td><?php echo number_format($jobsfdec['ServiceAmountAfterGst'],2);?></td>
		</tr>
		

<?php

 if($_REQUEST['fromyear']!='')
 {
	 $year=$_REQUEST['fromyear'];
 }
 else
 {
	 $year=date("Y");
 }
		
		  $jobsjan="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-01-01' and '$year-01-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqjan=mysqli_query($conn,$jobsjan);
		    $jobsfjan=mysqli_fetch_array($jobsqjan); 
			
			 $jobsfeb="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-02-01' and '$year-02-28' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqfeb=mysqli_query($conn,$jobsfeb);
		    $jobsffeb=mysqli_fetch_array($jobsqfeb);
			
			$jobsmarch="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-03-01' and '$year-03-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqmarch=mysqli_query($conn,$jobsmarch);
		    $jobsfmarch=mysqli_fetch_array($jobsqmarch);
			
			$jobsapril="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-04-01' and '$year-04-30' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqapril=mysqli_query($conn,$jobsapril);
		    $jobsfapril=mysqli_fetch_array($jobsqapril);
			
			$jobsmay="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-05-01' and '$year-05-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqmay=mysqli_query($conn,$jobsmay);
		    $jobsfmay=mysqli_fetch_array($jobsqmay);
			
			$jobsjune="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-06-01' and '$year-06-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqjune=mysqli_query($conn,$jobsjune);
		    $jobsfjune=mysqli_fetch_array($jobsqjune);
			
			$jobsjuly="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-07-01' and '$year-07-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqjuly=mysqli_query($conn,$jobsjuly);
		    $jobsfjuly=mysqli_fetch_array($jobsqjuly);
			
			$jobsaug="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-08-01' and '$year-08-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqaug=mysqli_query($conn,$jobsaug);
		    $jobsfaug=mysqli_fetch_array($jobsqaug);
			
			$jobssep="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-09-01' and '$year-09-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqsep=mysqli_query($conn,$jobssep);
		    $jobsfsep=mysqli_fetch_array($jobsqsep);
			
			$jobsoct="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-10-01' and '$year-10-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqoct=mysqli_query($conn,$jobsoct);
		    $jobsfoct=mysqli_fetch_array($jobsqoct);
			
			$jobsnov="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-11-01' and '$year-11-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqnov=mysqli_query($conn,$jobsnov);
		    $jobsfnov=mysqli_fetch_array($jobsqnov);
			
			$jobsdec="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-12-01' and '$year-12-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqdech=mysqli_query($conn,$jobsdec);
		    $jobsfdec=mysqli_fetch_array($jobsqdech);
			
			
			
			
		?>
		
		<tr>
		
		<td style="background-color:#F0F8FF"><b>Operating expenses : </b></td>
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
		
		<tr>
		<?php
		 $jobsjan1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where bill_date between '$year-01-01' and '$year-01-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqjan1=mysqli_query($conn,$jobsjan1);
		    $jobsfjan1=mysqli_fetch_array($jobsqjan1); 
			
			
			 $jobsfeb1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-02-01' and '$year-02-28' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqfeb1=mysqli_query($conn,$jobsfeb1);
		    $jobsffeb1=mysqli_fetch_array($jobsqfeb1);
			
			$jobsmarch1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-03-01' and '$year-03-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqmarch1=mysqli_query($conn,$jobsmarch1);
		    $jobsfmarch1=mysqli_fetch_array($jobsqmarch1);
			
			$jobsapril1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-04-01' and '$year-04-30' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqapril1=mysqli_query($conn,$jobsapril1);
		    $jobsfapril1=mysqli_fetch_array($jobsqapril1);
			
			$jobsmay1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-05-01' and '$year-05-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqmay1=mysqli_query($conn,$jobsmay1);
		    $jobsfmay1=mysqli_fetch_array($jobsqmay1);
			
			$jobsjune1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where bill_date between '$year-06-01' and '$year-06-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqjune1=mysqli_query($conn,$jobsjune1);
		    $jobsfjune1=mysqli_fetch_array($jobsqjune1);
			
			$jobsjuly1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-07-01' and '$year-07-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqjuly1=mysqli_query($conn,$jobsjuly1);
		    $jobsfjuly1=mysqli_fetch_array($jobsqjuly1);
			
			$jobsaug1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-08-01' and '$year-08-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqaug1=mysqli_query($conn,$jobsaug1);
		    $jobsfaug1=mysqli_fetch_array($jobsqaug1);
			
			$jobssep1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-09-01' and '$year-09-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqsep1=mysqli_query($conn,$jobssep1);
		    $jobsfsep1=mysqli_fetch_array($jobsqsep1);
			
			$jobsoct1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where  bill_date between '$year-10-01' and '$year-10-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqoct1=mysqli_query($conn,$jobsoct1);
		    $jobsfoct1=mysqli_fetch_array($jobsqoct1);
			
			$jobsnov1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where bill_date between '$year-11-01' and '$year-11-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqnov1=mysqli_query($conn,$jobsnov1);
		    $jobsfnov1=mysqli_fetch_array($jobsqnov1);
			
			$jobsdec1="select sum(ServiceAmountAfterGst) as ServiceAmountAfterGst from a_final_bill where bill_date between '$year-12-01' and '$year-12-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$jobsqdech1=mysqli_query($conn,$jobsdec1);
		    $jobsfdec1=mysqli_fetch_array($jobsqdech1);
			
			
			
			
			
			 $jobsjan="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-01-01' and '$year-01-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqjan=mysqli_query($conn,$jobsjan);
		    $jobsfjan=mysqli_fetch_array($jobsqjan); 
			
			 $jobsfeb="select sum(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate between '$year-02-01' and '$year-02-28' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqfeb=mysqli_query($conn,$jobsfeb);
		    $jobsffeb=mysqli_fetch_array($jobsqfeb);
			
			$jobsmarch="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-03-01' and '$year-03-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqmarch=mysqli_query($conn,$jobsmarch);
		    $jobsfmarch=mysqli_fetch_array($jobsqmarch);
			
			$jobsapril="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-04-01' and '$year-04-30' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqapril=mysqli_query($conn,$jobsapril);
		    $jobsfapril=mysqli_fetch_array($jobsqapril);
			
			$jobsmay="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-05-01' and '$year-05-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqmay=mysqli_query($conn,$jobsmay);
		    $jobsfmay=mysqli_fetch_array($jobsqmay);
			
			$jobsjune="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-06-01' and '$year-06-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqjune=mysqli_query($conn,$jobsjune);
		    $jobsfjune=mysqli_fetch_array($jobsqjune);
			
			$jobsjuly="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-07-01' and '$year-07-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqjuly=mysqli_query($conn,$jobsjuly);
		    $jobsfjuly=mysqli_fetch_array($jobsqjuly);
			
			$jobsaug="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-08-01' and '$year-08-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqaug=mysqli_query($conn,$jobsaug);
		    $jobsfaug=mysqli_fetch_array($jobsqaug);
			
			$jobssep="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-09-01' and '$year-09-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqsep=mysqli_query($conn,$jobssep);
		    $jobsfsep=mysqli_fetch_array($jobsqsep);
			
			$jobsoct="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-10-01' and '$year-10-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqoct=mysqli_query($conn,$jobsoct);
		    $jobsfoct=mysqli_fetch_array($jobsqoct);
			
			$jobsnov="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-11-01' and '$year-11-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqnov=mysqli_query($conn,$jobsnov);
		    $jobsfnov=mysqli_fetch_array($jobsqnov);
			
			$jobsdec="select sum(ExpenseAmount) as ExpenseAmount  from expense_details where ExpenseDate between '$year-12-01' and '$year-12-31' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
			$jobsqdech=mysqli_query($conn,$jobsdec);
		    $jobsfdec=mysqli_fetch_array($jobsqdech);
			
			$jan=$jobsfjan1['ServiceAmountAfterGst']-$jobsfjan['ExpenseAmount'];
			$feb=$jobsffeb1['ServiceAmountAfterGst']-$jobsffeb['ExpenseAmount'];
			$mar=$jobsfmarch1['ServiceAmountAfterGst']-$jobsfmarch['ExpenseAmount'];
			$apr=$jobsfapril1['ServiceAmountAfterGst']-$jobsfapril['ExpenseAmount'];
			$may=$jobsfmay1['ServiceAmountAfterGst']-$jobsfmay['ExpenseAmount'];
			$jun=$jobsfjune1['ServiceAmountAfterGst']-$jobsfjune['ExpenseAmount'];
			$jul=$jobsfjuly1['ServiceAmountAfterGst']-$jobsfjuly['ExpenseAmount'];
			$aug=$jobsfaug1['ServiceAmountAfterGst']-$jobsfaug['ExpenseAmount'];
			$sep=$jobsfsep1['ServiceAmountAfterGst']-$jobsfsep['ExpenseAmount'];
			$oct=$jobsfoct1['ServiceAmountAfterGst']-$jobsfoct['ExpenseAmount'];
			$nov=$jobsfnov1['ServiceAmountAfterGst']-$jobsfnov['ExpenseAmount'];
			$dec=$jobsfdec1['ServiceAmountAfterGst']-$jobsfdec['ExpenseAmount'];
			?>
		<td style="background-color:#F0F8FF"><b>Operating profit : </b></td>
		<td><?php echo number_format($jan,2);?></td>
		<td><?php echo number_format($feb,2);?></td>
      	<td><?php echo number_format($mar,2);?></td>
		<td><?php echo number_format($apr,2);?></td>
		<td><?php echo number_format($may,2);?></td>
		<td><?php echo number_format($jun,2);?></td>
		<td><?php echo number_format($jul,2);?></td>
		<td><?php echo number_format($aug,2);?></td>
		<td><?php echo number_format($sep,2);?></td>
		<td><?php echo number_format($oct,2);?></td>
		<td><?php echo number_format($nov,2);?></td>
		<td><?php echo number_format($dec,2);?></td>
		</tr>
		
		<tr>
		<td style="background-color:#F0F8FF"><b>Net profit : </b></td>
		<td><?php echo number_format($jan,2);?></td>
		<td><?php echo number_format($feb,2);?></td>
      	<td><?php echo number_format($mar,2);?></td>
		<td><?php echo number_format($apr,2);?></td>
		<td><?php echo number_format($may,2);?></td>
		<td><?php echo number_format($jun,2);?></td>
		<td><?php echo number_format($jul,2);?></td>
		<td><?php echo number_format($aug,2);?></td>
		<td><?php echo number_format($sep,2);?></td>
		<td><?php echo number_format($oct,2);?></td>
		<td><?php echo number_format($nov,2);?></td>
		<td><?php echo number_format($dec,2);?></td>
		</tr>
		
		<tr>
		<?php
		 $b1="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where bill_date between '$year-01-01' and '$year-01-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$b11=mysqli_query($conn,$b1);
		    $b111=mysqli_fetch_array($b11); 
			
			
			 $b2="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where  bill_date between '$year-02-01' and '$year-02-28' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$b22=mysqli_query($conn,$b2);
		    $b222=mysqli_fetch_array($b22);
			
			$b3="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where  bill_date between '$year-03-01' and '$year-03-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$b33=mysqli_query($conn,$b3);
		    $b333=mysqli_fetch_array($b33);
			
			$b4="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where  bill_date between '$year-04-01' and '$year-04-30' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$b44=mysqli_query($conn,$b4);
		    $b444=mysqli_fetch_array($b44);
			
			$b5="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where  bill_date between '$year-05-01' and '$year-05-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$b55=mysqli_query($conn,$b5);
		    $b555=mysqli_fetch_array($b55);
			
			$b6="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where bill_date between '$year-06-01' and '$year-06-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$b66=mysqli_query($conn,$b6);
		    $b666=mysqli_fetch_array($b66);
			
			$b7="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where  bill_date between '$year-07-01' and '$year-07-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$b77=mysqli_query($conn,$b7);
		    $b777=mysqli_fetch_array($b77);
			
			$b8="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where  bill_date between '$year-08-01' and '$year-08-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$b88=mysqli_query($conn,$b8);
		    $b888=mysqli_fetch_array($b88);
			
			$b9="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where  bill_date between '$year-09-01' and '$year-09-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$b99=mysqli_query($conn,$b9);
		    $b999=mysqli_fetch_array($b99);
			
			$b10="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where  bill_date between '$year-10-01' and '$year-10-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$b1010=mysqli_query($conn,$b10);
		    $b101010=mysqli_fetch_array($b1010);
			
			$b11="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where bill_date between '$year-11-01' and '$year-11-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$b1111=mysqli_query($conn,$b11);
		    $b111111=mysqli_fetch_array($b1111);
			
			$b12="select sum(TotalServiceAmount) as TotalServiceAmount from a_final_bill where bill_date between '$year-12-01' and '$year-12-31' and FrachiseeId='".$_SESSION['FranchiseeId']."'"; 
			$b1212=mysqli_query($conn,$b12);
		    $b121212=mysqli_fetch_array($b1212);
			
			$tax1=$jobsfjan1['ServiceAmountAfterGst']-$b111['TotalServiceAmount'];
			
			$tax2=$jobsffeb1['ServiceAmountAfterGst']-$b222['TotalServiceAmount'];
			$tax3=$jobsfmarch1['ServiceAmountAfterGst']-$b333['TotalServiceAmount'];
			$tax4=$jobsfapril1['ServiceAmountAfterGst']-$b444['TotalServiceAmount'];
			$tax5=$jobsfmay1['ServiceAmountAfterGst']-$b555['TotalServiceAmount'];
			$tax6=$jobsfjune1['ServiceAmountAfterGst']-$b666['TotalServiceAmount'];
			$tax7=$jobsfjuly1['ServiceAmountAfterGst']-$b777['TotalServiceAmount'];
			$tax8=$jobsfaug1['ServiceAmountAfterGst']-$b888['TotalServiceAmount'];
			$tax9=$jobsfsep1['ServiceAmountAfterGst']-$b999['TotalServiceAmount'];
			$tax10=$jobsfoct1['ServiceAmountAfterGst']-$b101010['TotalServiceAmount'];
			$tax11=$jobsfnov1['ServiceAmountAfterGst']-$b111111['TotalServiceAmount'];
			$tax12=$jobsfdec1['ServiceAmountAfterGst']-$b121212['TotalServiceAmount'];
			
		?>
		<td style="background-color:#F0F8FF"><b>Tax(GST) : </b></td>
		<td><?php echo number_format($tax1,2);?></td>
		<td><?php echo number_format($tax2,2);?></td>
		<td><?php echo number_format($tax3,2);?></td>
		<td><?php echo number_format($tax4,2);?></td>
		<td><?php echo number_format($tax5,2);?></td>
		<td><?php echo number_format($tax6,2);?></td>
		<td><?php echo number_format($tax7,2);?></td>
		<td><?php echo number_format($tax8,2);?></td>
		<td><?php echo number_format($tax9,2);?></td>
		<td><?php echo number_format($tax10,2);?></td>
		<td><?php echo number_format($tax11,2);?></td>
		<td><?php echo number_format($tax12,2);?></td>
		</tr>
		
		<tr>
		<td style="background-color:#F0F8FF"><b>Profit after tax : </b></td>
		<td><?php echo number_format($jan-$tax1,2);?></td>
		<td><?php echo number_format($feb-$tax2,2);?></td>
      	<td><?php echo number_format($mar-$tax3,2);?></td>
		<td><?php echo number_format($apr-$tax4,2);?></td>
		<td><?php echo number_format($may-$tax5,2);?></td>
		<td><?php echo number_format($jun-$tax6,2);?></td>
		<td><?php echo number_format($jul-$tax7,2);?></td>
		<td><?php echo number_format($aug-$tax8,2);?></td>
		<td><?php echo number_format($sep-$tax9,2);?></td>
		<td><?php echo number_format($oct-$tax10,2);?></td>
		<td><?php echo number_format($nov-$tax11,2);?></td>
		<td><?php echo number_format($dec-$tax12,2);?></td>
		</tr>
		
		<tr>
		<td style="background-color:#F0F8FF"><b>Depriciation : </b></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		</tr>
		<tr>
		<td style="background-color:#F0F8FF"><b>Interest : </b></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		</tr>

</tbody>


</table>
         		
		
		</div>
		
              <!-- /.box-body -->
			 
                 <div class="box-footer">
			 
                <button  type="submit" class="btn btn-info pull-right" >EXPORT Overall Overview To EXCEL </button>
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