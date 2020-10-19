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
     Purchase Return
        <small>Store</small>
      </h1>      
	   
    </section>
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Purchase Returns</h3>
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
               
				 <th>View Return Details</th>
                  
                </tr>
                </thead>
                <tbody>
				<?php
				$ct="select * from s_purchase_return where FrachiseeId='".$_SESSION['FranchiseeId']."'";
				$Ect=mysqli_query($conn,$ct);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
				$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $Fct['inv_no']; ?></td>
				    <td><?php echo $Fct['rdate']; ?></td>
					  <td><?php echo $Fct['supplier_name']; ?></td>
					   <td>
	   <a href="s_purchase_return_details.php?inv_no=<?php echo $Fct['inv_no']; ?>" class="btn-box-tool" onClick="return confirm('Are You Sure Want to View?');"><i class="fa fa-forward custom-icon1" style="font-size:20px;color:brown"></i></a></td>
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
     
	 

    <!-- /.content -->
   <?php include("../../footer.php"); ?>
  </div>
 
  <!-- /.content-wrapper -->

  <!-- Main Footer -->

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
	 
  <!--footer End-->
 <?php include("../../includes_db_js.php"); ?>
</body>
</html>