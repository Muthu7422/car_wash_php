<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);

$pagename="s_quotation_view.php";
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
    Quotation History
        <small>Master</small>
      </h1>
	   
    </section>
  
             
			  
    <!-- Main content -->
    <section class="content container-fluid">
    <?php  if($FEspno['CreateData']>'0')
					  {
					  ?>
       <h4><div align="right"><a href="s_quotation.php"><b> CREATE NEW QUOTATION</b></a></div></h4>  
 <?php } ?>	  
	  <!-- left column -->
        
           
			
            <!-- /.box-header -->
            <!-- form start -->
					
			
    
	  
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Quotations</h3>
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
				<th>Quotation No</th>
				<th>Date</th>
				<th>Customer Name</th>
                <th>Quotation Amount </th>
                <th>View </th>
                <th>Create sales Order </th>
				
                  
                </tr>
                </thead>
                <tbody>
				<?php
				$ct="select * from s_quotation where FranchiseeId='".$_SESSION['BranchId']."' and purchase_details='Open' order by id desc";
				$Ect=mysqli_query($conn,$ct);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
					
					$dcm="select * from a_customer where id='".$Fct['supplier_name']."'";
					$rmp=mysqli_query($conn,$dcm);
					$poq=mysqli_fetch_array($rmp);
					
							
					$dcm1="select * from a_customer where id='".$Fct1['supplier_name']."'";
					$rmp1=mysqli_query($conn,$dcm1);
					$poq1=mysqli_fetch_array($rmp1);
					
					$hgfq="SELECT count(*) as cq FROM `s_quotation` where q_no='".$Fct['q_no']."'";
				     $Fhgfq=mysqli_query($conn,$hgfq);
                     $Ehgfq=mysqli_fetch_array($Fhgfq);
					 
					 $hgfj="SELECT count(*) as cj FROM `sales_order` where q_no='".$Fct['q_no']."' ";
				     $Fhgfj=mysqli_query($conn,$hgfj);
                     $Ehgfj=mysqli_fetch_array($Fhgfj);
					
		
				$i++;
				?>
                <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $Fct['q_no']; ?></td>
				<td><?php echo $Fct['pdate']; ?></td>
				<td><?php echo $poq['cust_name']; ?></td>
				<td><?php echo $Fct['TotalPurchaseAmount']; ?></td>
				<td> <a href="s_quotation_receipt.php?q_no=<?php echo $Fct['q_no']; ?>"  class="btn-box-tool"><i class="fa fa-print custom-icon1" style="font-size:20px;color:brown"></i></a> </td>
				
				    <?php 				   
				     if($Ehgfq['cq']!=$Ehgfj['cj']) {			    
					?>
				  <td> <a href="../sales_invoice/sales_invoice.php?q_no=<?php echo $Fct['q_no']; ?>"  class="btn-box-tool"><i class="fa fa-file-o custom-icon1" style="font-size:20px;color:green"></i></a> </td>
				
				        <?php }
				     else {				
					 ?>
				  <td> <a href="#"  class="btn-box-tool"><i class="fa fa-thumbs-o-up custom-icon1" style="font-size:20px;color:green"></i></a> </td>
				    <?php } ?>
	 
	
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