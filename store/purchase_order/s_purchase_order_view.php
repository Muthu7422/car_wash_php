<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);


$pagename="s_purchase_order_view.php";
 $spno="SELECT * FROM `t_role_pages` where role_id='".$_SESSION['role_name']."' and pageno IN (SELECT id FROM `t_lmenu`where url like '%$pagename') ORDER BY `id` ASC";
$Espno=mysqli_query($conn,$spno);
$FEspno=mysqli_fetch_array($Espno);

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
    Purchase Order
        <small>History</small>
      </h1>
	   
    </section>
  
             
			  
    <!-- Main content -->
    <section class="content container-fluid">
        <?php  if($FEspno['CreateData']>'0')
					  {
					  ?>
       <h4><div align="right"><a href="s_purchase_order.php"><b> CREATE NEW PURCHASE ORDER</b></a></div></h4>  
	   
 <?php } ?>	  

	   <!-- left column -->
        
           
			
            <!-- /.box-header -->
            <!-- form start -->
					
			
    
	  
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Purchase Order</h3>
            </div>
            <!-- /.box-header -->
			 <?php 
					  if($FEspno['ViewData']>'0')
					  {
					  ?>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>S:No</th>
				  <th>PO NO</th>
				  <th>Date</th>
				  <th>Supplier Name</th>
				  <th>View</th>
				 <th>Send/Edit</th>
				 <th>Delete</th>
				
                  
                </tr>
                </thead>
                <tbody>
				<?php
				$ct="select * from s_purchase_order where FranchiseeId='".$_SESSION['BranchId']."' and purchase_details='Open'";
				$Ect=mysqli_query($conn,$ct);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
					
					$dcm="select * from m_supplier where sid='".$Fct['supplier_name']."'";
					$rmp=mysqli_query($conn,$dcm);
					$poq=mysqli_fetch_array($rmp);
				$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $Fct['inv_no']; ?></td>
				  <td><?php echo $Fct['pdate']; ?></td>
				<td><?php echo $poq['sname']; ?></td>
				<td><a href="s_purchase_order_details_view.php?inv_no=<?php echo $Fct['inv_no']; ?>"  class="btn-box-tool"><i class="fa fa-eye custom-icon1" style="font-size:20px;color:brown"></i></a> </td>
				<td> 
						<?php 
					  if($FEspno['EditData']>'0')
					  {
					  ?>
				<a href="s_purchase_order_edit_no.php?inv_no=<?php echo $Fct['inv_no']; ?>" onClick="return confirm('Are You Sure Want to Edit?');" class="btn-box-tool"><i class="fa fa-edit custom-icon1" style="font-size:20px;color:brown"></i></a> 
					<?php
				}
				?>
				<a href="pdftomail/index.php?iid=<?php echo $Fct['id']; ?>" Title="Send Mail" class="btn-box-tool" target="_blank"><i class="fa fa-envelope custom-icon1" style="font-size:20px;color:brown"></i></a> </td>

	              <td> 
	              <a href="s_purchase_order_delete.php?inv_no=<?php echo $Fct['inv_no']; ?>" Title="Delete" class="btn-box-tool" ><i class="fa fa-remove custom-icon1" style="font-size:20px;color:brown"></i></a> </td>
                  </td>
                </tr>
				<?php
				}
				?>
                  </tbody>
                
              </table>
            </div>
			<?php
				}
				?>
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