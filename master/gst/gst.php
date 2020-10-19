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
        
        <small>GST</small>
      </h1>
     </section>
	  <div class="box-header with-border">
            <?php if(isset($_REQUEST['s'])!='') {?> 
			  <div class="alert alert-success">
                <strong>GST Entry Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if(isset($_REQUEST['d'])!='') {?> 
			  <div class="alert alert-success">
              <b> GST Entry Update Successfully!<i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  <?php if(isset($_REQUEST['a'])!='') {?> 
			  <div class="alert alert-warning">
                 GST <b>already</b> exiting! <i class="fa fa-warning" style="font-size:30px;color:white"></i>
              </div> <?php } ?></div>
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
    <form role="form" method="post" action="gst_act.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
			$g="select * from m_gst";
			$Eg=mysqli_query($conn,$g);
			$n=mysqli_num_rows($Eg);
			$n1=$n+1;
			?>
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Gst Id</label>
                  <input type="text" class="form-control" name="gst_id" id="gst_id" value="<?php echo "G".$n1; ?>" readonly="true">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">GST</label>
                  <input class="form-control" name="gst" id="gst" placeholder="GST%" required>
                </div>
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">SGST</label>
                  <input class="form-control" name="sgst" id="sgst" value="0" placeholder="SGST%">
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
                  <th>GST</th>
				  <th class="hidden">SGST</th>
				  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from m_gst where status='Active' order by id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $FEss['gst']; ?></td>
				  <td class="hidden"><?php  echo $FEss['sgst']; ?></td>
				  <td><?php  echo $FEss['status']; ?></td>
				  <td>
                      <a href="gst_edit.php?id=<?php  echo $FEss['id']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a>
                     
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
    <div class="control-sidebar-bg"></div>
</div>
 <?php include("../../includes_db_js.php"); ?>
 

 
</body>
</html>
