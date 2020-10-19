<?php
error_reporting(0);
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
 Indoor Outdoor
        <small>Report</small>
      </h1>      
	   
    </section>
 <form role="form" method="post" action="IndoorOutdoor_process.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
             
              <div class="box-body" style="background-color:#F0F8FF">
			  
			  
                <div class="box-body">
			
			    <div class="form-group col-sm-4">
			   <label for="catname">From</label>
				 <input type="date" class="form-control" name="from" id="from" >
              
				</div>
				
				<div class="form-group col-sm-4">
			   <label for="catname">To</label>
				 <input type="date" class="form-control" name="to" id="to"  >
              
				</div>
				<div class="form-group col-sm-4">
              <label for="Indoor">Sales Report By</label>
              <select type="text" class="form-control" name="IndoorOutdoor" id="IndoorOutdoor" placeholder="IndoorOutdoor" required>
			  <option value="">-Select-</option>
			   <option value="Indoor">Indoor</option>
			    <option value="Outdoor">Outdoor</option>
			  </select>
                </div>
				</div>
				<br/>
				<button type="submit" class="btn btn-info pull-right">View Details</button>
		 </div>	  
      
	  <br/>  <br/>  <br/>
	  
	    <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>S:No</th>
				  <th>Invoice No</th>
				   <th>Date</th>
					<th>Customer Name</th>  
                     <th>Bill Amount</th>
                      <th>Payment Mode</th>					 
                </tr>
                </thead>
                <tbody>
				<?php
				
				$customer="select * from m_franchisee WHERE TypeOfService='".$_REQUEST['IndoorOutdoor']."'";
				$customer1=mysqli_query($conn,$customer);
				$customer2=mysqli_fetch_array($customer1);
				
				$ct="select * from sales_invoice where sdate between '".$_REQUEST['from']."' and '".$_REQUEST['to']."' and FranchiseeId='".$customer2['id']."'";  
				$Ect=mysqli_query($conn,$ct);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
					
				$cus="select * from a_customer where id='".$Fct['cname']."'";
					$dec=mysqli_query($conn,$cus);
					$cust=mysqli_fetch_array($dec);	
				$i++;
				?>
               <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $Fct['inv_no']; ?></td>
				<td><?php echo $Fct['sdate']; ?></td>
				<td><?php echo $cust['cust_name']; ?></td>
				<td><?php echo $Fct['bill_amt']; ?></td>
					<td><?php echo $Fct['payment_mode']; ?></td>
				 <td><a href="sales_invoice_receipt.php?inv_no=<?php echo $Fct['inv_no']; ?> Onclick="return confirm('Are you sure want to proceed?')" title="Take Print" class="btn-box-tool" target="_blank"><i class="fa fa-print" style="font-size:20px;color:Black"></i></a></td>
                </tr>
				<?php
				}
				?>
                  </tbody>
                
              </table>
            </div>
	  
          <!-- /.box -->
      
    <!-- /.content -->
	

	
	</form>
      
			  
    <!-- Main content -->
    
    
        <!-- left column -->
        
           
			
            <!-- /.box-header -->
            <!-- form start -->
					
			<br>
</div></div></div></div>
    
	  
    
 
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