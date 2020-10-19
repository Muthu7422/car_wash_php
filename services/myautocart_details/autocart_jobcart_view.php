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
    Jobcart View
        <small>Service</small>
      </h1>
	   <h4 class="hidden"><div align="right"><a href="autocart_jobcart.php"><b> CREATE NEW JOBCART</b></a></div></h4>  
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
           
            <!-- /.box-header -->
            <!-- form start -->
					
			
    
	  
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Jobcart</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>S:No</th>
				<th>Service Booking No</th>
				<th>Date</th>
				<th>Customer Name</th>
				
			
				<th>Print</th>
				
	
                  
                </tr>
                </thead>
                <tbody>
				<?php
				$host_name = "localhost";
                $user_name= "root";
                $password= "";
                $database1 = "myautocart";
                //$database2 = "myautocart_tidi";
                $autocart = mysqli_connect($host_name ,$user_name,$password,$database1);
                //$tidi = mysqli_connect($host_name ,$user_name,$password,$database2);
				$i=0;
                 $sql = "SELECT * FROM myautocart_service_bookings where vendor_id='".$_SESSION['VendorId']."' AND  status='Active'";
                  $result = mysqli_query($conn, $sql);
				 while($Fct=mysqli_fetch_array($result))
				{
					$Esx="select * from tbl_customer where customer_id='".$Fct['customer_id']."'";
					$ews=mysqli_query($autocart, $Esx);
					$Qwa=mysqli_fetch_array($ews);
				$i++;
				?>
               <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $Fct['service_order_no']; ?></td>
				<td><?php echo date("d-m-Y",strtotime($Fct['appointment_date'])); ?></td>
				<td><?php echo $Qwa['f_name']; ?></td>
				
				<td><a href="autocart_service_details.php?sid=<?php echo $Fct['id']; ?>" title="View" class="btn-box-tool"><i class="fa fa-eye" style="font-size:20px;color:brown"></i></a></td>
			       </tr>
				<?php
				}
				?>
                  </tbody>
                
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
            
          
        </div>
      </div>
	        </div>
        </div>
      </div>
	  
	
    </section>
    <!-- /.content -->
  
  </div>
 
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
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