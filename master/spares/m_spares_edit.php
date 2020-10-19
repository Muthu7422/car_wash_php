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
        Spare
        <small>Master</small>
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="m_spares_editQ.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			  
				<?php
				$ss="select * from m_spare where sid='".$_REQUEST['id']."'";
				$Ess=mysqli_query($conn,$ss);
				$FEss=mysqli_fetch_array($Ess);
				
				?>
                <div class="form-group col-sm-4">
                  <label for="Branch">Spare Type</label>
				  <select class="form-control" id="stype" name="stype" required="true">
				  
				  
				  <?php
				  $ssc1="select * from m_spare_type where sid='".$FEss['stype']."' and status='Active'"; 
				  $Essc1=mysqli_query($conn,$ssc1);
				  while($FEssc1=mysqli_fetch_array($Essc1))
				  {
				  ?>
				   <option value="<?php echo $FEssc1['sid']; ?>"><?php echo $FEssc1['stype']; ?></option>
				   <?php
				   }
				   ?>
				  
				  
				  
				  
				  <option value="">--Select Spare Type--</option>
				  
				  
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
                  <select class="form-control" id="sbrand" name="sbrand">
				  
				    <?php
				  $ssc2="select * from m_spare_brand where sid='".$FEss['sbrand']."' and status='Active'"; 
				  $Essc2=mysqli_query($conn,$ssc2);
				  while($FEssc2=mysqli_fetch_array($Essc2))
				  {
				  ?>
				   <option value="<?php echo $FEssc2['sid']; ?>"><?php echo $FEssc2['sbrand']; ?></option>
				   <?php
				   }
				   ?>
				  
				  
				  
				  
				  
				   <option value="">--Select Spare Brand--</option>
				  
				  
				  
				  
				  <?php 
				  $ssc="select * from m_spare_brand where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['sid']; ?>"><?php echo $FEssc['sbrand']; ?></option>
				  <?php } ?>
				  </select>
				   <input type="hidden" class="form-control" name="sid" id="sid" value="<?php echo $FEss['sid']; ?>">
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Name</label>
                  <input type="text" class="form-control" name="sname" id="sname" value="<?php echo $FEss['sname']; ?>">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Units  </label>
                  <select class="form-control" id="units" name="units" onKeyPress="return tabE(this,event)" required>
				   <?php 
				  $ssc="select * from m_unit_master where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
					  if($FEssc['id']==$FEss['units'])
					  {
				  ?>
  				  <option value="<?php echo $FEssc['id']; ?>" selected="true"><?php echo $FEssc['u_name']; ?></option>
				  <?php }
						else
						{
					?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['u_name']; ?></option>
				  <?php }
				  }	 ?>
				</select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Part No</label>
                   <input type="text" class="form-control" name="spartno" id="spartno" value="<?php echo $FEss['spartno']; ?>" required>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">HSN Code</label>
                   <input type="text" class="form-control" name="hsn" id="hsn" value="<?php echo $FEss['hsn_code']; ?>"  placeholder="hsn" onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">M.R.P</label>
                  <input type="text" class="form-control" name="smrp" id="smrp" value="<?php echo $FEss['smrp']; ?>" required>
                </div> 
				<div class="form-group col-sm-4">
                  <label for="Branch">Minimum Stock</label>
                  <input type="text" class="form-control" name="min_stock" id="min_stock" value="<?php echo $FEss['min_stock']; ?>" required>
                </div> 
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Tax %</label>
                  <input type="text" class="form-control" name="TaxRate" id="TaxRate" value="<?php echo $FEss['TaxRate']; ?>" required>
                </div> 
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Supplier </label>
                <select class="form-control" id="ssupplier" name="ssupplier">
				
				<?php
				  $ssc3="select * from m_supplier where sid='".$FEss['ssupplier']."' and status='Active'"; 
				  $Essc3=mysqli_query($conn,$ssc3);
				  while($FEssc3=mysqli_fetch_array($Essc3))
				  {
				  ?>
				   <option value="<?php echo $FEssc3['sid']; ?>"><?php echo $FEssc3['sname']; ?></option>
				   <?php
				   }
				   ?>
				   
				   <option value="">--Select Supplier--</option>
				   <?php 
				  $ssc="select * from m_supplier where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['sid']; ?>"><?php echo $FEssc['sname']; ?></option>
				  <?php } ?>
				</select>
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
	
	  <section class="content container-fluid">
       
      <div class="hidden">
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
                  <th>Spare Name</th>
				  <th>Spare Type</th>
				  <th>Brand</th>
				  <th>Part No</th>
				  <th>M.R.P</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from  m_spare order by sid desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo $FEss['sname'];  ?></td>
				  <td>
				  <?php  
				  //echo $FEss['stype'];
					$st="select * from m_spare_type where franchisee_id='".$_SESSION['FranchiseeId']."' where sid='".$FEss['stype']."'";
					$Est=mysqli_query($conn,$st);
					$FEst=mysqli_fetch_array($Est);
					echo $FEst['stype'];
				  ?>
				  
				  </td>
				  <td><?php 
					$st="select * from m_spare_brand where sid='".$FEss['sbrand']."'";
					$Est=mysqli_query($conn,$st);
					$FEst=mysqli_fetch_array($Est);
                    
					  echo $FEst['sbrand'];

				  ?></td>
				   <td><?php  echo $FEss['spartno']; ?></td>
				    <td><?php  echo $FEss['smrp']; ?></td>
				  <td><?php  echo $FEss['status']."    "; ?> <a href="m_spares_edit.php?id=<?php  echo $FEss['sid']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a> </td>
                  
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
