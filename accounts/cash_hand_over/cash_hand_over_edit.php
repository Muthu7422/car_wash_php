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
       Cash Hand Over <small>Edit</small>
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="cash_hand_over_editQ.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
		$ss="select * from a_hand_over_cash where id='".$_REQUEST['cid']."'";
				$Ess=mysqli_query($conn,$ss);
				$FEss=mysqli_fetch_array($Ess);
			?>
              <div class="box-body">
			  <div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
                  <input type="date" class="form-control" name="CDate" id="CDate" value="<?php echo date('Y-m-d'); ?>" required>
                </div>	
				 
                <div class="form-group col-sm-4">
                  <label for="Branch">Branch Name</label>
                  <select type="text" class="form-control" name="CBranch" id="CBranch"  onKeyPress="return tabE(this,event)" >
				  <option>--Select The Type--</option>
				  <?php 
				  $lm="select * from m_franchisee where status='Active'";
				  $Elm=mysqli_query($conn,$lm);
				  while($FElm=mysqli_fetch_array($Elm))
				  {
				  ?>				  
				
				    <option value="<?php echo $FElm['id']; ?>" <?php if($FElm['id']==$FEss['CBranch']){ ?>selected <?php }?>><?php echo $FElm['franchisee_name']; ?></option>
			 
				  <?php } ?>
				  </select>
                </div>
				
		       
               <div class="form-group col-sm-4">
                  <label for="Branch">Amount </label>
                  <input type="text" class="form-control" name="camount" id="camount" value="<?php echo $FEss['camount']; ?>" placeholder="Amount" onKeyPress="return tabE(this,event)" >
                  <input type="hidden" class="form-control" name="cid" id="cid" value="<?php echo $FEss['id']; ?>" placeholder="Amount" onKeyPress="return tabE(this,event)" >
                </div>
			 
				 
				<div class="form-group col-sm-4">
                  <label for="Branch">Description</label>
                  <input type="text" class="form-control" name="Description" id="Description"  value="<?php echo $FEss['Description']; ?>" placeholder="Description" onKeyPress="return tabE(this,event)" >
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
