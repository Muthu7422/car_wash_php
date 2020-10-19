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
  Cash Memo Payment Mode
        <small>Report</small>
      </h1>      
	   
    </section>
 <form role="form" method="post" action="payment_mode_process.php">
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
				 <input type="date" class="form-control" name="from" id="from" required>
              
				</div>
				
				<div class="form-group col-sm-4">
			   <label for="catname">To</label>
				 <input type="date" class="form-control" name="to" id="to" required >
              
				</div>
				<div class="form-group col-sm-4">
              <label for="Branch">Payment Mode</label>
              <select type="text" class="form-control" name="payment_mode" id="payment_mode" placeholder="Payment Mode" required>
			  <option value="">-Select the Mode-</option>
			   <?php 
			  $sg="select * from m_payment_mode";
			  $sgt=mysql_query($sg);
			  while($sgst=mysql_fetch_array($sgt))
			  {
			  ?>
			  <option value="<?php echo $sgst['PaymentMode']; ?>"><?php echo $sgst['PaymentMode']; ?></option>
			  <?php
			  }
			  ?>
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
				  <th>Cash Memo No</th>
				  <th>Date</th>
				   <th>Customer Name</th>
				    <th>Bill Amount</th>
					<th>Bill Receipt</th>      					 
                </tr>
                </thead>
                <tbody>
				<?php
			 	$ct="select * from cash_memo where date between '".$_REQUEST['from']."' and '".$_REQUEST['to']."' and bill_status='Open' and FranchiseeId='".$_SESSION['FranchiseeId']."' and payment_mode='".$_REQUEST['payment_mode']."'"; 
				$Ect=mysql_query($ct);
				$i=0;
				while($Fct=mysql_fetch_array($Ect))
				{
					
					$cus="select * from a_customer where id='".$Fct['cname']."'";
					$dec=mysql_query($cus);
					$cust=mysql_fetch_array($dec);
				$i++;
				?>
               <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $Fct['cash_memo_no']; ?></td>
				<td><?php echo $Fct['date']; ?></td>
				<td><?php echo $cust['cust_name']; ?></td>
				<td><?php echo $Fct['bill_amount']; ?></td>
				 <td><a href="cash_memo_receipt.php?cash_memo_no=<?php echo $Fct['cash_memo_no']; ?>"  Onclick="return confirm('Are you sure want to proceed?')" title="Take Print" class="btn-box-tool"><i class="fa fa-print" style="font-size:20px;color:Black"></i></a></td>
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