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
        Spare Types
        <small>Master</small>
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="m_spare_brand_view.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
				$ss="select * from m_spare_brand where sid='".$_REQUEST['id']."'";
				$Ess=mysqli_query($conn,$ss);
				$FEss=mysqli_fetch_array($Ess);
			?>
              <div class="box-body">
				 <div class="form-group col-sm-4">
                  <label for="Branch">Spare Category</label>
                  <select class="form-control" id="stype" name="stype" readonly>
				  <?php 
					$sc="select * from m_spare_type where sid='".$FEss['stype']."'";
				  $Esc=mysqli_query($conn,$sc);
				 $FEsc=mysqli_fetch_array($Esc);
				  ?>
				   <option value="<?php echo $FEsc['sid']; ?>" selected><?php echo $FEsc['stype']; ?></option>
				  
				  <?php 
				  $ssc="select * from m_spare_type where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['sid']; ?>"><?php echo $FEssc['stype']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				
                <div class="form-group col-sm-4">
                  <label for="Branch">Spare Brand</label>
                  <input type="text" class="form-control" name="sbrand" id="sbrand" placeholder="Service Type" value="<?php echo $FEss['sbrand']; ?>" readonly required>
				  <input type="hidden" class="form-control" name="sid" id="sid" value="<?php echo $FEss['sid']; ?>" required>
                </div>
			
				<div class="form-group col-sm-4">
                  <label for="Branch">Status</label>
                  <select class="form-control " id="status" name="status" readonly>
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
                <button type="submit" class="btn btn-info pull-right">Back</button>
                </div>    
         </div>
    </form>
	</section>
    <!-- /.content -->
	
	  <section class="content container-fluid" hidden>
       
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
				  <th>Spare Brand</th>
			
				  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from  m_spare_brand where franchisee_id='".$_SESSION['BranchId']."' order by sid desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  
				  //echo $FEss['stype'];
					$st="select * from m_spare_type where sid='".$FEss['stype']."'";
					$Est=mysqli_query($conn,$st);
					$FEst=mysqli_fetch_array($Est);
                    
					echo $FEst['stype'];



				  ?></td>
				  <td><?php  echo $FEss['sbrand']; ?></td>
				  
				  <td><?php  echo $FEss['status']; ?></td>
                  <td>
                      <a href="m_spare_brand_edit.php?id=<?php  echo $FEss['sid']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a>
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
