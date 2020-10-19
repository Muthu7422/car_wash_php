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
    Purchase Asset
        <small>Store</small>
      </h1>
    </section>
  
             
			  
    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            <h4><div align="right" style=" border::groove; color:#00BFFF"> <a href="s_purchase_asset.php"><button>Create New Purchase Asset</button></a> </div></h4>
			<br>
            <!-- /.box-header -->
            <!-- form start -->
					
			
    
	  
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Purchase Assets</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow:auto">
              <table id="example1" class="table table-bordered table-striped" style="width:160%">
                <thead>
                <tr>
                  <th>S:No</th>
				  <th>Invoice No</th>
				  <th>Date</th>
				  <th>Supplier Name</th>
				   <th>Product Name</th>
				    <th>Product Brand</th>
					 <th>Product Model</th>
					  <th>Other Specificaton</th>
					   <th>Purchase Rate</th>
					    <th>Quantity</th>
						 <th>Total</th>
						  <th>Status</th>

                </tr>
                </thead>
                <tbody>
				<?php
				$i=0;
				 $ct="select * from s_purchase_asset where InvoiceNo='".$_REQUEST['InvoiceNo']."'"; 
				$Ect=mysqli_query($conn,$ct);
				while($Fct=mysqli_fetch_array($Ect))
				{
					
					$dcm="select * from m_supplier where sid='".$Fct['SupplierName']."'";
					$rmp=mysqli_query($conn,$dcm);
					$poq=mysqli_fetch_array($rmp);
					
					
					
					$dcm1="select * from  m_asset_brand where id='".$Fct['ProductBrand']."'";
					$rmp1=mysqli_query($conn,$dcm1);
					$poq1=mysqli_fetch_array($rmp1);
					
					
				$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $Fct['InvoiceNo']; ?></td>
				    <td><?php echo $Fct['PaDate']; ?></td>
					  <td><?php echo $poq['sname']; ?></td>
					   <td><?php echo $Fct['ProductName']; ?></td>
					    <td><?php echo $poq1['brand']; ?></td>
						 <td><?php echo $Fct['ProductModel']; ?></td>
						  <td><?php echo $Fct['OtherSpecificaton']; ?></td>
						    <td><?php echo $Fct['PurchaseRate']; ?></td>
							  <td><?php echo $Fct['Quantity']; ?></td>
							    <td><?php echo $Fct['total']; ?></td>
								  <td><?php echo $Fct['status']; ?></td>
					  
					  						 
					  
                  
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