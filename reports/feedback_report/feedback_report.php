<?php
error_reporting(0);
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
<script>
function myFunction($val) {
    window.open("show_feed_back.php?jcn="+$val,"_blank","toolbar=no,top=200,left=500,width=700px,height=300,addressbar=no");	
	
}
</script>
 
  
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
      Feedback Report
        <small><b>Report</b></small>
      </h1>

     </section>
   
   
    <!-- Main content -->
 
    <!-- /.content -->
	
	  <section class="content container-fluid">
       <div class="row">
	   </div class="col-sm-12">
	   
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">FeedBackReports</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form class="form-horizontal" method="post" action="feedback_report_processor.php" autocomplete="off">
              <div class="box-body">
                  
               <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="date">From</label>
                 <input type="date" name="from" class="form-control pull-right" id="datepicker" value="<?php echo $_SESSION['from'];?>"onKeyPress="return tabE(this,event)">
                </div>
               <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="duedate">To</label>
                  <input type="date" name="to" class="form-control pull-right" id="datepicker1" value="<?php echo $_SESSION['to'];?>" onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4"style="padding-left:60px">
				 <label for="duedate">&nbsp;</label>
				<br>
				  <button  type="submit" name="view" id="view" class="btn btn-info pull-left" >Submit</button>
				</div>
                     
                  
              </div>
              <!-- /.box-body -->
			 
              <div class="box-footer">
			 <button  type="submit" name="export" id="export" class="btn btn-info pull-right" >EXPORT FEEDBACK REPORT TO EXCEL</button>
              </div>
              <!-- /.box-footer -->
            </form>
			
			
		
         
	   
	 
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
		
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-12">
				<div style="overflow:auto">
                <table id="example1" class="table table-bordered table-striped" width="190%">
                <thead>
                <tr>
				<th width="10px">Sl No</th>
				<th width="20px">Date</th>
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
				<th>Comments</th>
                </tr>
                </thead>
                <tbody>
					<?php
					$ss="select * from a_final_bill where bill_date between '".$_REQUEST['from']."' and '".$_REQUEST['to']."' and FrachiseeId='".$_SESSION['BranchId']."'";
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
			  </div>
                </div>				
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	      
         </div>

	</section>
	
</div>

  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("../../footer.php"); ?>
  <!--footer End-->
    <div class="control-sidebar-bg"></div>
</div>
 <?php include("../../includes_db_js.php"); ?>
 

 
</body>
</html>
