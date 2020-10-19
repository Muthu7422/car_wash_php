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
       Financial Year
        <small>Master</small>
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="financial_year_editQ.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
				$ss="select * from f_financial_year where id='".$_REQUEST['id']."'";
				$Ess=mysqli_query($conn,$ss);
				$FEss=mysqli_fetch_array($Ess);
			?>
              <div class="box-body">
               
				<div class="form-group col-sm-4">
                  <label for="Branch">Financial Name</label>
                  <input type="text" class="form-control" name="financial_year" id="financial_year" value="<?php echo $FEss['financial_year']; ?>" placeholder="Financial Year" onKeyPress="return tabE(this,event)" required>
				   <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $FEss['id']; ?>" required>                
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Start Date</label>
                     <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Financial Year" value=<?php echo date("d-m-Y")?> onKeyPress="return tabE(this,event)" required>
            
                   </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">End Date</label>
                  <input type="date" class="form-control" name="end_date" id="end_date" placeholder="Financial Year" value=<?php echo date("d-m-Y")?> onKeyPress="return tabE(this,event)" required>
                   </div>
				<div class="form-group col-sm-4">
                  <label for="Branch"> Description</label>
                  <textarea class="form-control" name="sdescription" id="sdescription" placeholder="description"><?php echo $FEss['sdescription']; ?></textarea>
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
	
	  <section class="content container-fluid hidden">
       
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
                  <th>Spare Type</th>
				  <th>Description</th>
				  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from m_spare_type order by sid desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $FEss['stype']; ?></td>
				  <td><?php  echo $FEss['sdescription']; ?></td>
				  <td><?php  echo $FEss['status']; ?></td>
                  <td>
                      <a href="m_spare_type_edit.php?id=<?php  echo $FEss['sid']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a>
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
