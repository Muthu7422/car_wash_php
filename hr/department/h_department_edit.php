<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);


   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);
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
        Department Types
        <small>Master</small>
      </h1>
     </section>
   <?php
   $d="select * from h_department where id='".$_REQUEST['id']."'";
   $Ed=mysqli_query($conn,$d);
   $Fd=mysqli_fetch_array($Ed);
   ?>
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="h_department_edit_act.php?id=<?php echo $Fd['id']; ?>">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Department Type</label>
                  <input type="text" class="form-control" name="dtype" id="dtype" value="<?php echo $Fd['dname']; ?>" placeholder="Department Type" required>
                   <input type="hidden" class="form-control" name="franchisee_id"  id="franchisee_id" value="<?php echo $var['id']; ?>" readonly placeholder="Pid" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required> 
				</div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Description</label>
                  <textarea class="form-control" name="sdescription" id="sdescription"  placeholder="description" ><?php echo $Fd['description']; ?></textarea>
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
                
                </div>
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	      
         </div>

	</section>
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
