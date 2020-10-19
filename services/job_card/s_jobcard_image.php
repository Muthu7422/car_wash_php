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
       Job Card Images
        <small><b>Services</b></small>
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
            <?php
			 $jobcard="select * from s_jobcard_images where JobCardId='".$_REQUEST['jobid']."'"; 
			$jobcardq=mysqli_query($conn,$jobcard);
			$jobcardf=mysqli_fetch_array($jobcardq);
			
			$jobcard_details="select * from s_job_card where id='".$_REQUEST['jobid']."'";
			$jobcard_detailsq=mysqli_query($conn,$jobcard_details);
			$jobcard_detailsf=mysqli_fetch_array($jobcard_detailsq);
			?>
			
			<div class="box-body">
                <div class="form-group col-sm-12">
				<h2>Customer Details : </h2>
					<div class="col-sm-4">
					<h4>Vehicle No</h4>
					<input type="text" value="<?php echo $jobcard_detailsf['vehicle_no'];?>" name="vehicle_no" id="vehicle_no" class="form-control" readonly>
                  </div>	
				  <div class="col-sm-4">
					<h4>Customer Name</h4>
					<input type="text" value="<?php echo $jobcard_detailsf['sname'];?>" name="vehicle_no" id="vehicle_no" class="form-control" readonly>
                  </div>	
				  <div class="col-sm-4">
					<h4>Customer Mobile</h4>
					<input type="text" value="<?php echo $jobcard_detailsf['smobile'];?>" name="vehicle_no" id="vehicle_no" class="form-control" readonly>
                  </div>
				  
				  </div>
				  
              <div class="box-body">
                <div class="form-group col-sm-12">
				<h2>Vehicle Images : </h2>
				
					<div class="col-sm-4">
					<h4>Photo 1</h4>
					<img width="100%" src="image/<?php echo $jobcardf['VImage1'];?>">
                  </div>	
				<div class="col-sm-4">
					<h4>Photo 2</h4>
					<img width="100%" src="image/<?php echo $jobcardf['VImage2'];?>">
                   </div>
				   <div class="col-sm-4">
					<h4>Photo 3</h4>
					<img width="100%" src="image/<?php echo $jobcardf['VImage3'];?>">
                 </div>	
				 <div class="col-sm-4">
					<h4>Photo 4</h4>
					<img width="100%" src="image/<?php echo $jobcardf['VImage4'];?>">
                 </div>	
				 <div class="col-sm-4">
					<h4>Photo 5</h4>
					<img width="100%" src="image/<?php echo $jobcardf['VImage5'];?>">
                 </div>	
				 <div class="col-sm-4">
					<h4>Photo 6</h4>
					<img width="100%" src="image/<?php echo $jobcardf['VImage6'];?>">
                 </div>	
				 <div class="col-sm-4">
					<h4>Photo 7</h4>
					<img width="100%" src="image/<?php echo $jobcardf['VImage7'];?>">
                 </div>	
				 <div class="col-sm-4">
					<h4>Photo 8</h4>
					<img width="100%" src="image/<?php echo $jobcardf['VImage8'];?>">
                 </div>	
				 <div class="col-sm-4">
					<h4>Photo 9</h4>
					<img width="100%" src="image/<?php echo $jobcardf['VImage9'];?>">
                 </div>	
				 <div class="col-sm-4">
					<h4>Photo 10</h4>
					<img width="100%" src="image/<?php echo $jobcardf['VImage10'];?>">
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
