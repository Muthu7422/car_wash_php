<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);



$pagename="sales_invoice_view.php";
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
    Sales Bill History
        <small>Bill</small>
      </h1>
	        <?php 
					  if($FEspno['CreateData']>'0')
					  {
					  ?>
	   <h4><div align="right"><a href="sales_invoice.php"><b> CREATE NEW SALES BILL</b></a></div></h4>  
	   <?php } ?>
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
				  <?php 
					  if($FEspno['ViewData']>'0')
					  {
					  ?>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>S:No</th>
				<th>Invoice No</th>
				<th>Date</th>
				<th>Customer Name</th>
				<th>Payment Mode</th>
				<th>View</th>
				<th>Edit</th>
				<th>Print</th>
				<th>Send Mail</th>
				<th>Return The Bill</th>
				
				<th>Cancel Bill</th>
                  
                </tr>
                </thead>
                <tbody>
				<?php
				$i=0;
				$ct="select * from sales_invoice where FranchiseeId='".$_SESSION['BranchId']."' and bill_status='Open' order by id desc";
				$Ect=mysqli_query($conn,$ct);
				while($Fct=mysqli_fetch_array($Ect))
				{
					$Esx="select * from a_customer where id='".$Fct['cname']."'";
					$ews=mysqli_query($conn,$Esx);
					$Qwa=mysqli_fetch_array($ews);
				$i++;
				?>
               <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $Fct['inv_no']; ?></td>
				<td><?php echo date("d-m-Y",strtotime($Fct['sdate'])); ?></td>
				<td><?php echo $Qwa['cust_name']; ?></td>
				<?php
				if($Fct['payment_mode']=="")
				{
				?>
				<td><a href="salesbill_payment_mode.php?inv_no=<?php echo $Fct['inv_no']; ?>&&id=<?php echo $Fct['id'] ?>"  Onclick="return confirm('Are you sure want to proceed?')" title="Take Print" class="btn-box-tool"><i class="fa fa-inr" style="font-size:20px;color:brown">Pay</i></a></td>
						<?php 
					  if($FEspno['EditData']>'0')
					  {
					  ?>
					  <td><a href="sales_invoice_details_view.php?inv_no=<?php echo $Fct['inv_no']; ?>&&id=<?php echo $Fct['id']; ?>"  title="View" class="btn-box-tool"><i class="fa fa-eye custom-icon1" style="font-size:20px;color:brown"></i></a></td>
				<td><a href="sales_invoice_edit.php?inv_no=<?php echo $Fct['inv_no']; ?>&&id=<?php echo $Fct['id']; ?>" Onclick="return confirm('Are you sure want to proceed?')" title="Edit" class="btn-box-tool"><i class="fa fa-edit custom-icon1" style="font-size:20px;color:brown"></i></a></td> 
					  <?php } ?>
				<?php
				}
				else
				{
				?>
				<td><a href="#.php?inv_no=<?php echo $Fct['inv_no']; ?>&&id=<?php echo $Fct['id'] ?>"  Onclick="return confirm('Are you sure want to proceed?')" title="Take Print" class="btn-box-tool"></a></td>
				<td></td>
				<?php
				}
				?>
				<td><a href="sales_invoice_receipt.php?inv_no=<?php echo $Fct['inv_no']; ?>"  Onclick="return confirm('Are you sure want to proceed?')" title="Take Print" class="btn-box-tool"><i class="fa fa-print" style="font-size:20px;color:brown"></i></a></td>
				<td><a href="pdftomail/index.php?inv_no=<?php echo $Fct['inv_no']; ?>" Title="Send Mail" class="btn-box-tool" target="_blank"><i class="fa fa-envelope custom-icon1" style="font-size:20px;color:brown"></i></a></td>
				<td><a href="sales_retrun_view.php?inv_no=<?php echo $Fct['inv_no']; ?>" Onclick="return confirm('Are you sure want to proceed?')" title="Return the Sales Bill" class="btn-box-tool"><i class="fa fa-mail-forward custom-icon1" style="font-size:20px;color:brown"></i></a></td> 
				<td><a href="sales_invoice_Cancel.php?inv_no=<?php echo $Fct['inv_no']; ?>" Onclick="return confirm('Are you sure want to proceed?')" title="Cancel" class="btn-box-tool"><i class="custom-icon1" style="font-size:20px;color:brown">Cancel</i></a></td> 
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