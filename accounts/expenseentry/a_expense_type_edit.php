<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);

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
       Edit Vehicle Types
        <small>Master</small>
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="m_vehicle_type_editQ.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
				$ss="select * from m_vehicle_type where Id='".$_REQUEST['Id']."'";
				$Ess=mysqli_query($conn,$ss);
				$FEss=mysqli_fetch_array($Ess);
			?>
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Type</label>
                  <input type="text" class="form-control" name="VehicleType" id="VehicleType" placeholder="Vehicle Type" value="<?php echo $FEss['VehicleType']; ?>" required>
				  <input type="hidden" class="form-control" name="Id" id="Id" value="<?php echo $FEss['Id']; ?>" required>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Description</label>
                  <textarea class="form-control" name="VehicleDescription" id="VehicleDescription" placeholder="Vehicle Description"><?php echo $FEss['VehicleDescription']; ?></textarea>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Status</label>
                  <select class="form-control " id="Status" name="Status">
				   <option value="<?php echo $FEss['Status']; ?>" select><?php echo $FEss['Status']; ?></option>
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
                  <th>Vehicle Type</th>
				  <th>Description</th>
				  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from m_vehicle_type order by Id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $FEss['VehicleType']; ?></td>
				  <td><?php  echo $FEss['VehicleDescription']; ?></td>
				  <td><?php  echo $FEss['Status']; ?></td>
                  <td>
                      <a href="m_vehicle_type_edit.php?Id=<?php  echo $FEss['Id']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a>
					 
                  </td>
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
	<section class="content container-fluid">
	</section>
	
</div>

  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("../../footer.php"); ?>
  <!--footer End-->
</div>
 <?php include("../../includes_db_js.php"); ?>
 
</body>
</html>
