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
        <small><b>Open</b></small>
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
				  <th>Close the Jobcard</th>
                </tr>
                </thead>
                <tbody>
			    <?php
				$ss="select * from s_job_card where status='Active' and FranchiseeId='".$_SESSION['FranchiseeId']."' and jcard_status='Open'";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $FEss['job_card_no'];?></td>
				  <td><?php echo $FEss['jdate'];?></td>
				  <td><?php echo $FEss['vehicle_no'];?></td>
				  <td><?php echo $FEss['sname'];?></td>
				  <td><?php echo $FEss['smobile'];?></td>				 
				  <td><a href="s_jobcard_close.php?job_card_no=<?php echo $FEss['job_card_no']; ?>"  onclick="return confirm('Are You Sure Want to Close Job Card?');" class="btn-box-tool"><i class="fa fa-edit" style="font-size:20px;color:Black"></i></a></td>
	
				<?php } ?>				 
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
