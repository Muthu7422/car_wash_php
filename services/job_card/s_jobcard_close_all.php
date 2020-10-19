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
       Job Card History
        <small><b>Close</b></small>
		 
           
      </h1>

     </section>
   
   
    <!-- Main content -->
 
    <!-- /.content -->
	
	  <section class="content container-fluid">
       
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
                <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
				<th>Sl No</th>
				<th>Job Card No</th>
				<th>Date</th>
                <th>Vehicle No</th>
				<th>Customer Name</th>
				<th>Mobile</th>
				<th>View</th>
				<th>Print</th>
				<th>Rating</th>
                </tr>
                </thead>
                <tbody>
					<?php
				$ss="select * from s_job_card where status='Active' and FranchiseeId='".$_SESSION['BranchId']."' and jcard_status='Close'";
			   // $ss="select * from s_job_card where  jdate >= DATE_SUB(CURDATE(), INTERVAL 1 DAY) and jcard_status='Close' Order by job_card_no DESC";
				//$ss="select * from s_job_card where  `jdate` >= DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND jcard_status='Close' ORDER BY job_card_no DESC";
			
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					
					$x="select * from a_final_bill where FrachiseeId='".$_SESSION['BranchId']."' and JobcardId='".$FEss['id']."'";
					$dx=mysqli_query($conn,$x);
					$cxs=mysqli_num_rows($dx);
					$dsa=mysqli_fetch_array($dx);
					
					$i++;
				?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $FEss['job_card_no'];?></td>
				  <td><?php echo date("d-m-Y", strtotime($FEss['jdate']));?></td>
				  <td><?php echo $FEss['vehicle_no'];?></td>
				  <td><?php echo $FEss['sname'];?></td>
				  <td><?php echo $FEss['smobile'];?></td>
				  <?php 
				  if($cxs<'1')
				  {
				  ?>
				  <td><a href="jobcard_close_view.php?job_card_no=<?php echo $FEss['job_card_no']; ?>&&JobcardId=<?php echo $FEss['id']; ?>" target="_blanck"  onclick="return confirm('Are You Sure Want to View the Job Card?');" class="btn-box-tool"><i class="fa fa-print" style="font-size:20px;color:red"></i></a></td>
				  <td align="center"><a href="../../store/final_bill/f_bill1.php?job_card_no=<?php echo $FEss['job_card_no']; ?>&&JobcardId=<?php echo $FEss['id']; ?>" target="_blanck"  onclick="return confirm('Are You Sure Want to View the Job Card?');" class="btn-box-tool"><i class="fa fa-file" style="font-size:20px;color:red"></i></a></td>
				   <?php 
				  }
				  else
				  {
				  ?>
				  <td><a href="jobcard_close_view.php?job_card_no=<?php echo $FEss['job_card_no']; ?>&&JobcardId=<?php echo $FEss['id']; ?>" target="_blanck"  onclick="return confirm('Are You Sure Want to View the Job Card?');" class="btn-box-tool"><i class="fa fa-eye" style="font-size:20px;color:red"></i></a></td>
				  <td align="center"><a href="../../store/final_bill/final_receipt.php?inv_no=<?php echo $dsa['inv_no']; ?>&&JobcardId=<?php echo $FEss['id']; ?>" target="_blanck"  onclick="return confirm('Are You Sure Want to View the Job Card?');" class="btn-box-tool"><i class="fa fa-print" style="font-size:20px;color:red"></i></a></td>

				  <?php
				  }
				  $rat=$FEss['q1'] + $FEss['q2'] + $FEss['q3'] + $FEss['q4'] + $FEss['q5']+$FEss['q6']+$FEss['q7'];
				  $ratting=$rat/14;
				  $rating=$ratting*10;
				  
				  
				  ?>
				    <td><a href="#" onClick="myFunction('<?php echo $FEss['job_card_no'];  ?>');"><?php echo round($rating, 1);?>/10</a></td>
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
