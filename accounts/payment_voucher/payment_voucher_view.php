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
      <h1>Payment Voucher History<small>Store</small></h1> 
    </section>
  
             
			  
    <!-- Main content -->
    <section class="content container-fluid">
    
       <h4><div align="right"><a href="a_voucher_f.php"><b> CREATE NEW PAYMENT VOUCHER</b></a></div></h4>  
	    <!-- left column -->
        
           
			
            <!-- /.box-header -->
            <!-- form start -->
					
			
    
	  
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">

            <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
			
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" >
                <thead>
                <tr>
                <th>S:No</th>
				<th>Voucher Id</th>
				<th>Date</th>
				<th>Ledger Name</th>				
                <th>View </th>
				
				
                </tr>
                </thead>
                <tbody>
				<?php
$i=0;

                  $s="select * from payment_voucher order by id desc"; 
                  $Es=mysqli_query($conn,$s);
                  while($Fs=mysqli_fetch_array($Es))
				{
					
				 $s1="select * from m_ledger where Id='".$Fs['cust_name']."'"; 
                 $Es1=mysqli_query($conn,$s1);
                  $Fs1=mysqli_fetch_array($Es1);
				$i++;
				?>
<tr >
<td><?php echo $i; ?></td>
<td><?php echo $Fs['v_id']; ?></td>
<td><?php echo $Fs['v_date']; ?></td>
<td><?php echo $Fs1['LedgerName']; ?></td>
<td ><a href="payment_voucher_receipt.php?v_id=<?php echo $Fs['v_id']; ?>" title="Take Print" class="btn-box-tool"><i class="fa fa-print" style="font-size:20px;color:brown"></i></a></td>
</tr>
				 <?php } ?>				
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