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
    Service Cash Memo Bill History
        <small>Bill</small>
      </h1>
	   <h4><div align="right"><a href="service_cash_memo.php"><b> CREATE NEW SERVICE CASH MEMO BILL</b></a></div></h4>  
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
              <h3 class="box-title">Available Service Cash Memo Bill</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>S:No</th>
				<th>Service Cash Memo No</th>
				<th>Date</th>
				<th>Customer Name</th>
				<th>Bill Amount</th>
				<th>Aqura Mile Point</th>
				<th>Edit</th>
				<th>Print</th>
				
		 <th>Cancel Bill</th>
                  
                </tr>
                </thead>
                <tbody>
				<?php
				$i=0;
				$ct="select * from service_cash_memo";
				$Ect=mysql_query($ct);
				while($Fct=mysql_fetch_array($Ect))
				{
					$Esx="select * from a_customer where id='".$Fct['customer_name']."'";
					$ews=mysql_query($Esx);
					$Qwa=mysql_fetch_array($ews);
				$i++;
				?>
               <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $Fct['service_cash_memo_no']; ?></td>
				<td><?php echo date("d-m-Y",strtotime($Fct['date'])); ?></td>
				<td><?php echo $Qwa['cust_name']; ?></td>
				<td><?php echo $Fct['bill_amt']; ?></td>
				<td><?php echo $Qwa['AMCEarned']; ?></td>
				<?php
				if($Fct['payment_mode']=="")
				{
				?>
				<td><a href="service_cash_memo_edit.php?service_cash_memo_no=<?php echo $Fct['service_cash_memo_no']; ?>&&id=<?php echo $Fct['id']; ?>" Onclick="return confirm('Are you sure want to proceed?')" title="Edit" class="btn-box-tool"><i class="fa fa-edit custom-icon1" style="font-size:20px;color:brown"></i></a></td> 
				<?php
				}
				else
				{
				?>
				<td><a href="#.php?service_cash_memo_no=<?php echo $Fct['service_cash_memo_no']; ?>&&id=<?php echo $Fct['id'] ?>"  Onclick="return confirm('Are you sure want to proceed?')" title="Take Print" class="btn-box-tool"></a></td>
				<td></td>
				<?php
				}
				?>
				<td><a href="service_cash_memo_receipt.php?service_cash_memo_no=<?php echo $Fct['service_cash_memo_no']; ?>"  Onclick="return confirm('Are you sure want to proceed?')" title="Take Print" class="btn-box-tool"><i class="fa fa-print" style="font-size:20px;color:brown"></i></a></td>
				<td><a href="service_cash_memo_Cancel.php?service_cash_memo_no=<?php echo $Fct['service_cash_memo_no']; ?>" Onclick="return confirm('Are you sure want to proceed?')" title="Cancel" class="btn-box-tool"><i class="custom-icon1" style="font-size:20px;color:brown">Cancel</i></a></td> 
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