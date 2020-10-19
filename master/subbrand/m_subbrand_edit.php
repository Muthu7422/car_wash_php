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
        Sub Brand
        <small>Master</small>
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="m_subbrand_edit_act.php?id=<?php echo $_REQUEST['id']; ?>">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
				$ss3="select * from m_sub_brand where id='".$_REQUEST['id']."'";
				$Ess3=mysqli_query($conn,$ss3);
				$FEss3=mysqli_fetch_array($Ess3);
			?>
              <div class="box-body">
				<div class="form-group col-sm-4">
                  <label for="Branch">Brand </label>
                  <select class="form-control " id="brand" name="brand">
				  <option value="<?php echo $FEss3['brand']; ?>" selected="selected" ><?php echo $FEss3['brand']; ?></option>
				  <?php
				  $ss2="select * from m_brand where status='Active'";
				$Ess2=mysqli_query($conn,$ss2);
				while($FEss2=mysqli_fetch_array($Ess2))
				{
				  ?>
				   <option value="<?php echo $FEss2['brand']; ?>" ><?php echo $FEss2['brand']; ?></option>
				  <?php
				  }
				  ?>
				  
				  </select>
				
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Name </label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $FEss3['sub_brand']; ?>" >
				
                </div>
               
			
				<div class="form-group col-sm-4">
                  <label for="Branch">Status</label>
                  <select class="form-control " id="status" name="status">
				   <option value="<?php echo $FEss3['status']; ?>" select><?php echo $FEss3['status']; ?></option>
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
