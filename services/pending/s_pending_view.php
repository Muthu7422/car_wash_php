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
       Pending Service Report
        <small>Services</small>
      </h1>
	   <h4><div align="right"><a href="s_pending.php"><b> CREATE NEW PENDING DETAILS</b></a></div></h4>
     </section>
     <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
                <strong>Service Pending Details Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['m']!="") {?> 
			  <div class="alert alert-danger">
              <b> Sevice already in Pending!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  
			   <?php if($_REQUEST['d']!="") {?> 
			  <div class="alert alert-danger">
              <b> Pending Details Deleted Successfully!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?></div>
   
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
				   <th>Pending Code</th>
				    <th>Date</th>
                  <th>Job Card No</th>
				  <th>Vehicle No</th>
				  <th>Customer Name</th>
				
					 <th>Mobile</th>
					 <th>Date Since</th>
					  <th>Pending Reason</th>
					   <th>Delete</th>
                </tr>
                </thead>
                <tbody>
					<?php
				$ss="select * from pending_service where status='Active' order by id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $FEss['pending_no'];?></td>
				  <td><?php echo $FEss['pending_date'];?></td>
				  <td><?php echo $FEss['job_card_no'];?></td>
				  <td><?php echo $FEss['vehicle_no'];?></td>
				  <td><?php echo $FEss['name'];?></td>
				    <td><?php echo $FEss['mobile'];?></td>
					  <td><?php echo $FEss['date_since'];?></td>
					    <td><?php echo $FEss['other'];?></td>
				 
					<td>  <a href="s_pending_delete.php?id=<?php echo $FEss['id']; ?>" onClick="return confirm('Are You Shure ? You Want to Delete ?');" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>

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
	<section class="content container-fluid">
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
