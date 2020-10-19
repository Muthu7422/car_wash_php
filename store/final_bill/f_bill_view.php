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
    Final Bill History
        <small>Bill</small>
      </h1>
	   <h4><div align="right"><a href="f_bill.php"><b> CREATE NEW BILL</b></a></div></h4>  
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
              <h3 class="box-title">Available Final Bill</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 <div class="form-group col-sm-12">
				<div style="overflow:auto">
              <table id="example1" class="table table-bordered table-striped" width="120%">
                <thead>
                <tr>
                <th>S:No</th>
				<th>Invoice No</th>
				<th>Date</th>
				<th>Customer Name</th>
				<th>vehicle No</th>
				<th>Job Card No</th>
				<th>Print</th>
				<th>Payment Mode</th>
				<th>Service Pending</th>
				<th>Cancel Bill</th>
                  
                </tr>
                </thead>
                <tbody>
				<?php
				$ct="select * from a_final_bill where FrachiseeId='".$_SESSION['FranchiseeId']."' and bill_status=''";
				$Ect=mysqli_query($conn,$ct);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
					$edc="select * from a_customer_vehicle_details where cust_no='".$Fct['cname']."'";
					$esx=mysqli_query($conn,$edc);
					$cis=mysqli_fetch_array($esx);
					
				$i++;
				?>
               <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $Fct['inv_no']; ?></td>
				<td><?php echo date("m-d-Y", strtotime($Fct['bill_date'])); ?></td>
				<td><?php echo $cis['cust_name']; ?></td>
				<td><?php echo $cis['vehicle_no']; ?></td>
				<td><?php echo $Fct['job_card_no']; ?></td>
				<td><a href="final_receipt.php?inv_no=<?php echo $Fct['inv_no']; ?>"  onclick="return confirm('Are You Sure Want to Print?');" class="btn-box-tool"><i class="fa fa-print" style="font-size:20px;color:Black"></i></a> 
					<a href="pdftomail/index.php?inv_no=<?php echo $Fct['inv_no']; ?>" Title="Send Mail" class="btn-box-tool" target="_blank"><i class="fa fa-envelope custom-icon1" style="font-size:20px;color:brown"></i></a></td>
				<?php
				if($Fct['ptype']=='')
				{
				?>
				<td><a href="bill_payment_mode.php?inv_no=<?php echo $Fct['inv_no']; ?>&&id=<?php echo $Fct['id']; ?>" target="_blank" onclick="return confirm('Are You Sure Want to Proceed?');" class="btn-box-tool"><i class="fa fa-rupee" style="font-size:20px;color:brown">Pay</i></a></td>
				<?php
				}
				else
				{
				?>
				<td><a href="#.php?inv_no=<?php echo $Fct['inv_no']; ?>&&id=<?php echo $Fct['id']; ?>" target="_blank" onclick="return confirm('Are You Sure Want to Proceed?');" class="btn-box-tool"></a></td>
				<?php
				}
				?>
				<td><a href="bill_package_details.php?inv_no=<?php echo $Fct['inv_no']; ?>&&id=<?php echo $Fct['id']; ?>"  onclick="return confirm('Are You Sure Want to Proceed?');" class="btn-box-tool"><i class="fa fa-car" style="font-size:20px;color:brown"></i></a> </td>
				<td><a href="f_bill_Cancel.php?inv_no=<?php echo $Fct['inv_no']; ?>" onClick="return confirm('Are You Sure Want to Cancel?');" class="btn-box-tool"><i class="custom-icon1" style="font-size:20px;color:brown">Cancel</i></a></td> 
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
<div class="control-sidebar-bg"></div>
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