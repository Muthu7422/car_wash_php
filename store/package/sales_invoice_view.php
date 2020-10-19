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
    Sales Bill History
        <small>Bill</small>
      </h1>
	   <h4><div align="right"><a href="sales_invoice.php"><b> CREATE NEW SALES BILL</b></a></div></h4>  
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
              <h3 class="box-title">Available Sales Bill</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>S:No</th>
				  <th>Invoice No</th>
				  <th>Date</th>
				   <th>Print</th>
				 <th>Cancel Bill</th>
                  
                </tr>
                </thead>
                <tbody>
				<?php
				$ct="select * from sales_invoice where FranchiseeId='".$_SESSION['FranchiseeId']."' and bill_status='Open'";
				$Ect=mysqli_query($conn,$ct);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
				$i++;
				?>
               <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $Fct['inv_no']; ?></td>
				    <td><?php echo $Fct['sdate']; ?></td>
					  <td><a href="sales_invoice_receipt.php?inv_no=<?php echo $Fct['inv_no']; ?>"  onclick="return confirm('Are You Sure Want to Print?');" class="btn-box-tool"><i class="fa fa-print" style="font-size:20px;color:Black"></i></a></td>
					<td><a href="sales_invoice_Cancel.php?inv_no=<?php echo $Fct['inv_no']; ?>" onClick="return confirm('Are You Sure Want to Cancel?');" class="btn-box-tool"><i class="custom-icon1" style="font-size:20px;color:brown">Cancel</i></a></td> 
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