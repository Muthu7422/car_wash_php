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
        <small>GST Update</small>
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
    <section class="content container-fluid">
    <form role="form" method="post" action="gst_edit_act.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
			$id=$_REQUEST['id'];
			$g="select * from m_gst where id='$id'";
			$Eg=mysqli_query($conn,$g);
			$FEg=mysqli_fetch_array($Eg);
			?>
              <div class="box-body">
                
				<div class="form-group col-sm-4">
                  <label for="Branch">GST</label>
                  <input class="form-control" name="gst" id="gst" value="<?php echo $FEg['gst']; ?>" placeholder="CGST%" required>
                </div>
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">SGST</label>
                  <input class="form-control" name="sgst" id="sgst" value="<?php echo $FEg['sgst']; ?>" placeholder="SGST%">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Status</label>
                  <input type="hidden" class="form-control" name="gst_id" id="gst_id" value="<?php echo $FEg['gid']; ?>" readonly="true">
				  <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $FEg['id']; ?>" readonly="true">
				  <select name="status" class="form-control">
				    <option value="<?php echo $FEg['status']; ?>" selected="true"><?php echo $FEg['status']; ?></option>
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
    <div class="control-sidebar-bg"></div>
</div>
 <?php include("../../includes_db_js.php"); ?>
 

 
</body>
</html>
