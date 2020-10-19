<?php
include("../includes.php");
include("../redirect.php");
error_reporting(0);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../includes_db_css.php"); ?>
 
 
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!--header Starts-->
  <?php include("../header.php"); ?>
  <!--Header End -->
  <!-- Left side column. contains the logo and sidebar -->
   <?php include("../leftbar.php"); ?>
 <!-- Side Bar End -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#ECF0F5">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <small>Change Password</small>
      </h1>
     </section>
	  <div class="box-header with-border">
            <?php if(isset($_REQUEST['s'])!='') {?> 
			  <div class="alert alert-success">
                <strong>Your Old Pssword is Wrong!</strong> <i class="fa fa-warning" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
            </div>
	 
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="change_password_act.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
          
              <div class="box-body">
              
				<div class="form-group col-sm-4">
                  <label for="Branch">OLD Password</label>
                  <input type="password" class="form-control" name="old_password" id="old_password" placeholder="OLD PASSWORD" required>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">New Password</label>
                  <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" required>
                </div>
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Change Password</button>
                </div>    
         </div>
    </form>
	</section>
    <!-- /.content -->
	
	 
	<section class="content container-fluid">
	</section>
	
</div>

  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("../footer.php"); ?>
  <!--footer End-->
    <div class="control-sidebar-bg"></div>
</div>
 <?php include("../includes_db_js.php"); ?>
 

 
</body>
</html>
