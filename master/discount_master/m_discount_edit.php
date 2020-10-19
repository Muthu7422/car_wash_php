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
  <?php include("../../includes_db_css.php"); ?>
   
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
        Discount
        <small>Master</small>
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="m_discount_editQ.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
				$ss="select * from m_discount where id='".$_REQUEST['id']."'";
				$Ess=mysqli_query($conn,$ss);
				$FEss=mysqli_fetch_array($Ess);
			?>
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Discount Name</label>
                  <input type="text" class="form-control" name="d_name" id="d_name" placeholder="Discount Name" value="<?php echo $FEss['d_name']; ?>" required>
				  <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $FEss['id']; ?>" required>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Discount Percentage</label>
                  <input class="form-control" name="d_percentage" id="d_percentage" placeholder="Discount Percentage" value="<?php echo $FEss['d_percentage']; ?>">
                </div>

					<div class="form-group col-sm-4">
                  <label for="Branch">Start Time</label>
                  <input type="time" class="form-control" name="s_time" id="s_time" placeholder="Start Time" value="<?php echo $FEss['s_time']; ?>">
                </div>
					<div class="form-group col-sm-4">
                  <label for="Branch">End Time</label>
                  <input type="time" class="form-control" name="e_time" id="e_time" placeholder="End Time" value="<?php echo $FEss['e_time']; ?>" >
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Status</label>
                  <select class="form-control " id="status" name="status">
				   <option value="<?php echo $FEss['status']; ?>" select><?php echo $FEss['status']; ?></option>
				   <option value="Active">Active</option>
				   <option value="Deactive">Deactive</option>
				  </select>
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
    </form>
	</section>
    <!-- /.content -->
	

	
</div>

  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("../../footer.php"); ?>
  <!--footer End-->
</div>
 <?php include("../../includes_db_js.php"); ?>
 
</body>
</html>
