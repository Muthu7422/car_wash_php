<?php
include("../../includes.php");

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
        Final Bill Package Pending 
        <small>Bill </small>
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="f_bill_act.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			  <?php
			  $wqa="select * from a_final_bill where id='".$_REQUEST['id']."'";
			  $Rfe=mysqli_query($conn,$wqa);
			  $Saz=mysqli_fetch_array($Rfe);
			  
			  $Ew="select * from a_customer where id='".$Saz['cname']."'";
			  $Wqa=mysqli_query($conn,$Ew);
			  $Qwa=mysqli_fetch_array($Wqa);
			  ?>
				<div class="form-group col-sm-4">
                  <label for="Branch">Bill Date</label>
                  <input type="text" class="form-control" name="bdate" id="bdate" value="<?php echo $Saz['bill_date']; ?>" required>
				  <input type="hidden" class="form-control" name="id" id="id">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Invoice No</label>
                  <input type="text" class="form-control" name="inv_no" id="inv_no" value="<?php echo $Saz['inv_no']; ?>" placeholder="Invoice No" readonly="true">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Job Card No</label>
                  <input type="text" class="form-control" name="job_card" id="job_card" value="<?php echo $Saz['job_card_no']; ?>" readonly  placeholder="Vehicle Number">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
                  <input type="text" class="form-control" name="cname" id="cname"  value="<?php echo $Qwa['cust_name'] ?>" readonly="true" required>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Mobile</label>
                  <input type="text" class="form-control" name="mobile" id="mobile"  value="<?php echo $Qwa['mobile1'] ?>" readonly placeholder=" Mobile" >
                </div>	
                   <div class="form-group col-sm-4">
                  <label for="Branch">Customer Vehile No</label>
                  <input type="text" class="form-control" name="vehile_no" id="vehile_no" value="<?php echo $Saz['cvehile'] ?>" placeholder="Vehile No" readonly="true">
                </div>	
	
						
            </div>
			
			  <div class="box-body">
                  <label for="Branch">Service Details</label><br/>
				  <?php
				  $i=0;
				   $Qw="SELECT * FROM finalbillpackage WHERE BillNo='".$Saz['inv_no']."' and JobCardNo='".$Saz['job_card_no']."'"; 
				  $Wqa=mysqli_query($conn,$Qw);
				  while($Wsq=mysqli_fetch_array($Wqa))
				  {
							$i++;
				  ?>
                 <input type="checkbox" name="Packagedetails[]" id="Packagedetails[]" checked value="<?php echo $Wsq['ServiceName'] ?>" disabled><?php echo $Wsq['ServiceName'] ?><br>
				 
				 <?php
				  }
				 ?>
				
                </div>
			
			 <div class="box-body">
                  <label for="Branch">Service Details</label><br/>
				  <?php
				  $i=0;
				   $Qw="SELECT * FROM finalbillpackage WHERE BillNo='".$Saz['inv_no']."' and JobCardNo='".$Saz['job_card_no']."'"; 
				  $Wqa=mysqli_query($conn,$Qw);
				  $Wsq=mysqli_fetch_array($Wqa);
				  
				
						$Edsw="select * from m_package_service where package_name='".$Wsq['PackageName']."'";
						$Ews=mysqli_query($conn,$Edsw);
						while($Saz=mysqli_fetch_array($Ews))
				  {
				 ?>
				  <input type="checkbox" name="Packagedetails[]" id="Packagedetails[]" checked value="<?php echo $Saz['service'] ?>"><?php echo $Saz['service'] ?><br>
				 <?php
				  }
				  
				 ?>
                </div>
			
              <!-- /.box-body -->
         
		  
		<div  id="cdetails" name="cdetails" >
		</div>
		 
          <!-- /.box -->
        </div>
		</div>
				
				
				
		
    </form>
	</section>
    <!-- /.content -->
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
