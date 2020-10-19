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
    Purchase Asset History
        <small>Store</small>
      </h1>
	   
    </section>
  
             
			  
    <!-- Main content -->
    <section class="content container-fluid">
    
       <h4><div align="right"><a href="s_purchase_asset.php"><b> CREATE NEW PURCHASE ASSET</b></a></div></h4>  
	    <!-- left column -->
        
           
			
            <!-- /.box-header -->
            <!-- form start -->
					
			
    
	  
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Purchase Asset</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>S:No</th>
				  <th>Invoice No</th>
				  <th>Date</th>
				  <th>Supplier Name</th>
                <th>View </th>
				 <th>Cancel Bill</th>
				
                  
                </tr>
                </thead>
                <tbody>
				<?php
				$ct="select Distinct InvoiceNo,PaDate,SupplierName from s_purchase_asset where FranchiseeId='".$_SESSION['FranchiseeId']."' and purchase_details='Open'";
				$Ect=mysqli_query($conn,$ct);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
					
					$dcm="select * from m_supplier where sid='".$Fct['SupplierName']."'";
					$rmp=mysqli_query($conn,$dcm);
					$poq=mysqli_fetch_array($rmp);
				$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $Fct['InvoiceNo']; ?></td>
				    <td><?php echo $Fct['PaDate']; ?></td>
					  <td><?php echo $poq['sname']; ?></td>
					   <td>
	 <a href="purchase_asset_details_view.php?InvoiceNo=<?php echo $Fct['InvoiceNo']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-file-o custom-icon1" style="font-size:20px;color:brown"></i></a></td>
	 
	 
	 <td>
	  
	 <a href="purchase_asset_Cancel.php?InvoiceNo=<?php echo $Fct['InvoiceNo']; ?>" onClick="return confirm('Are You Sure Want to Cancel?');" class="btn-box-tool"><i class="custom-icon1" style="font-size:20px;color:brown">Cancel</i></a></td> 
	 
	
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