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
    Cash Memo Sales Bill History
        <small>Bill</small>
      </h1>
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
              <h3 class="box-title">Available Cash Memo Sales Bill</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>S:No</th>
				  <th>Cash Memo No</th>
				  <th>Date</th>
				   <th>Customer Name</th>
				    <th>Bill Amount</th>
					 <th>Payment Mode</th>                  
                </tr>
                </thead>
                <tbody>
				<?php
				$ct="select * from cash_memo where FranchiseeId='".$_SESSION['FranchiseeId']."' and bill_status='Open'";
				$Ect=mysql_query($ct);
				$i=0;
				while($Fct=mysql_fetch_array($Ect))
				{
				$i++;
				?>
               <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $Fct['cash_memo_no']; ?></td>
				<td><?php echo $Fct['date']; ?></td>
				<td><?php echo $Fct['date']; ?></td>
				<td><?php echo $Fct['date']; ?></td>
				<td><?php echo $Fct['date']; ?></td>
					  
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