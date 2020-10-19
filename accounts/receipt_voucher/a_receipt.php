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
        Payment Voucher 
        <small>Accounts</small>
      </h1>
     </section>
	 
 <script>
function Delete_Click() {
    var strconfirm = confirm("Are you sure you want to delete?");
    if (strconfirm == true) {
        return true;
    }
	else
		return false;
}  
  
  
</script>	 
  
   
    <!-- Main content -->
	<form role="form" method="post" action="a_receiptQ.php">
    <section class="content container-fluid">
    
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Date </label>
                  <input type="date" class="form-control" name="vdate" id="vdate" value="<?php echo $_POST['vdate']; ?>" required>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
                   <input type="text" class="form-control" name="sname" id="sname" value="<?php echo $_POST['supplier_name']; ?>" required>
				</div>
		
				<div class="form-group col-sm-4">
                  <label for="Branch">Amount</label>
                  <input type="text" class="form-control" name="amount" id="amount" value="<?php echo $_POST['amount']; ?>" required>
                </div>
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
        </div>    
        </div>
    
	</section>
    <!-- /.content -->
	
	  <section class="content container-fluid">
       
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				
                  <th>S.No</th>
                  <th>Inv No</th>
				  <th>Date</th>
				   <th>Outstanding Amount</th>
				   <th>Paying Amount</th>
				  
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from fb_outstanding where pamount<amount AND cname like '%".trim($_POST['supplier_name'])."%' order by id";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $FEss['bno']; ?></td>
				  <td><?php  echo $FEss['bdate']; ?></td>
				  <td><?php  echo $FEss['amount']-$FEss['pamount']; ?></td>
				  <td><input type="text" id="pamount[]" name="pamount[]" class="form-control"><input type="hidden" id="pid[]" name="pid[]" value="<?php echo $FEss['bno']; ?>" class="form-control"></td>
                </tr>
				<?php } ?>
                </tbody>
              </table>
                </div>
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	      
         </div>

	</section>
	</form>
	<section class="content container-fluid">
	</section>
	
</div>

  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("../../footer.php"); ?>
  <!--footer End-->
    <div class="control-sidebar-bg"></div>
</div>
 <?php include("../../includes_db_js.php"); ?>
 

 
</body>
</html>
