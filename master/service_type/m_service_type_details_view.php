<?php
error_reporting(0);
include("../../includes.php");
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
        Service Types
        <small>Master</small>
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="m_service_type_view.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
			
			
				$spm="select * from m_service_type where stype_no='".$_REQUEST['stype_no']."' AND id='".$_REQUEST['id']."'";
				$ss=mysqli_query($conn,$spm);
				$spc=mysqli_fetch_array($ss);
			
				$ss="select * from m_service_type_details where service_type='".$spc['id']."'";
				$Ess=mysqli_query($conn,$ss);
				$FEss=mysqli_fetch_array($Ess);
				
			?>
               <div class="box-body">
			   
			   <div class="form-group col-sm-4">
                  <label for="Branch">Service Type Id</label>
                  <input type="text" class="form-control" name="stypeId" id="stypeId" value="<?php echo $spc['id']; ?>" placeholder="Service Type Id" onKeyPress="return tabE(this,event)" readonly>
                </div>
				
				
			   <div class="form-group col-sm-4">
                  <label for="Branch">Service Type No</label>
                  <input type="text" class="form-control" name="stype_no" id="stype_no" value="<?php echo $spc['stype_no']; ?>" placeholder="Service Type No" onKeyPress="return tabE(this,event)" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Category</label>
                  <select type="text" class="form-control" name="vcategory" id="vcategory"  onKeyPress="return tabE(this,event)" readonly>
				<option value="">-Select The Category-</option>
				
				 <option value="Wash" <?php if($spc['vcategory']=="Wash") {?>selected<?php } ?>>Wash</option>
				 <option value="Interior" <?php if($spc['vcategory']=="Interior") {?>selected<?php } ?>>Interior</option>
				 <option value="exterior" <?php if($spc['vcategory']=="exterior") {?>selected<?php } ?>>exterior</option>
			
				
				  </select>
                </div>
                <div class="form-group col-sm-4">
                  <label for="Branch">Service Type</label>
                  <input type="text" class="form-control" name="stype" id="stype" value="<?php echo $spc['stype']; ?>" placeholder="Service Type" onKeyPress="return tabE(this,event)" required readonly>
                </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Service Amount</label>
                  <input type="text" class="form-control" name="in_amt" id="in_amt" value="<?php echo $spc['installation_amt']; ?>" placeholder="Installation Amount" onKeyPress="return tabE(this,event)" required readonly>
                </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Other Charge</label>
                  <input type="text" class="form-control" name="labour_amt" id="labour_amt" value="<?php echo $spc['labour_amt']; ?>" placeholder="Labour Charge" onKeyPress="return tabE(this,event)" required readonly>
                </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Segment</label>
                  <select type="text" class="form-control" name="vehcile_type" id="vehcile_type"  onKeyPress="return tabE(this,event)" required readonly>
				<?php
				$vtype="select * from master_vehicle_segment where Id='".$spc['v_type']."'";
					$vtypeq=mysqli_query($conn,$vtype);
					$vtypef=mysqli_fetch_array($vtypeq);
				?>
				
				<option value="<?php echo $vtypef['Id']; ?>"><?php echo $vtypef['VehicleSegment']; ?></option>
				<option value="">---Select The Segment---</option>
				  <?php 
				  $cx="select * from master_vehicle_segment where Status='Active'";
				  $dx=mysqli_query($conn,$cx);
				  while($xd=mysqli_fetch_array($dx))
				  {
				  ?>
				  <option value="<?php echo $xd['Id']; ?>"><?php echo $xd['VehicleSegment']; ?></option>
				  <?php
				  }
				  ?>
				  </select>
                </div>
				 <div class="form-group col-sm-4 hidden">
                  <label for="Branch">Vehicle Brand</label>
                  <select type="text" class="form-control" name="vehcile_brand" id="vehcile_brand"  onKeyPress="return tabE(this,event)">
				  <?php
				  $rr="select * from m_vehicle_brand where Id='".$temp['v_brand']."'";
				  $ee=mysqli_query($conn,$rr);
				  $tp=mysqli_fetch_array($ee);
				  ?>
				  <option value="<?php echo $tp['Id'] ?>"><?php echo $tp['VehicleBrand']?></option>
				  <?php 
				  $ss="select * from m_vehicle_brand where status='Active'";
				  $Efc=mysqli_query($conn,$ss);
				 while($Fcs=mysqli_fetch_array($Efc))
				 {
					 ?>
					 <option value="<?php echo $Fcs['Id']; ?>"><?php echo $Fcs['VehicleBrand']; ?></option>
					 <?php
				 }
				  ?>
				  </select>
                </div>
				 <div class="form-group col-sm-4" hidden>
                  <label for="Branch">Spare(Associate spare with service)</label>
                  <select type="text" class="form-control" name="spare_name" id="spare_name"  autofocus="autofocus"  onKeyPress="return tabE(this,event)" >
				  <option value="">---Select the Spare / Item--</option>
				  <?php 
				  $ss="select * from m_spare where status='Active'";
				  $Efc=mysqli_query($conn,$ss);
				 while($Fcs=mysqli_fetch_array($Efc))
				 {
					 ?>
					 <option value="<?php echo $Fcs['sid']; ?>"><?php echo $Fcs['sname']; ?></option>
					 <?php
				 }
				  ?>
				  </select>
                </div>
				<div class="form-group col-sm-2" hidden>
                  <label for="Branch">Qty</label>
                  <input type="text" class="form-control" name="qty" id="qty" placeholder="Qty" onKeyPress="return tabE(this,event)" >
                </div>
				<div class="form-group col-sm-2" hidden>
                  <label for="Branch">Others</label>
                  <input type="text" class="form-control" name="other" id="other" placeholder="Others" onKeyPress="return tabE(this,event)" >
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Invoice Visibility</label>
                  <select type="text" class="form-control" name="show_option" id="show_option"  onKeyPress="return tabE(this,event)" readonly>
				   <option>Invisible</option>
				   <option>Visible</option>
				  
				  </select>
                </div>
				<div class="form-group col-sm-4" hidden>
                  <label for="Branch">Product Ownership</label>
                  <select type="text" class="form-control" name="ownership" id="ownership"  onKeyPress="return tabE(this,event)" readonly >
				  <option><?php echo $spc['ownership']; ?></option>
				  <option>Protouch</option>
				  <option>Wurth</option>				  
				  </select>
                </div>
				
				
				
				</div>
				  <div class="box-body">
                  <button type="submit" class="btn btn-info pull-right" >Back</button>
                </div>    
				</br>	
				
				  <div class="box-body" hidden>
                <div class="form-group col-sm-12">
                <table  class="table table-bordered table-striped">
                <thead>
                <tr>
				
                  <th>S.No</th>
				   <th>Spare / Item Name</th>
                  <th>Service Type</th>
				  <th>Qty</th>
				  <th>Other</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from m_service_type_details where service_type='".$spc['id']."'";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$spm1="select * from m_service_type where id='".$FEss['service_type']."'";
					$ss1=mysqli_query($conn,$spm1);
					$spc1=mysqli_fetch_array($ss1);
					
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <?php
				   $names="select * from m_spare where sid='".$FEss['spare_name']."'"; 
					$ns=mysqli_query($conn,$names);
					while($jcd=mysqli_fetch_array($ns))
					{
						?>
				  <td><?php  echo $jcd['sname']; ?></td>
				  <?php
					}
				  ?>
				    <td><?php  echo $spc1['stype']; ?></td>
				  <td><?php  echo $FEss['qty']; ?></td>
				  <td><?php  echo $FEss['others']; ?></td>
				
                      <td><a href="service_details_delete_temp.php?stype_no=<?php echo $spc1['stype_no']; ?>  && id=<?php echo $FEss['id']; ?>" onClick="return confirm('Are You Sure Want to Delete?');" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
                     
				 
                </tr>
				<?php } 
				
				?>
             
				
                </tbody>
              </table>
                </div>
            </div>
			
			
			
			
			 
				  <div class="box-body">
                <div class="form-group col-sm-12">
                <table  class="table table-bordered table-striped">
               
                <tbody>
				<?php
				$ss="select * from m_service_type_temp where status='Active' order by id desc";
				$Ess=mysqli_query($conn,$ss);
				$j=$i;
				while($FEss=mysqli_fetch_array($Ess))
				{
					
					
					$j++;
				?>
                <tr>
                  <td><?php echo $j; ?></td>
				   <td><?php  echo $FEss['stype_name']; ?></td>
				  <?php
				   $names="select * from m_spare where sid='".$FEss['spare_name']."'"; 
					$ns=mysqli_query($conn,$names);
					while($jcd=mysqli_fetch_array($ns))
					{
						?>
				  <td><?php  echo $jcd['sname']; ?></td>
				  <?php
					}
				  ?>
				   
				  <td><?php  echo $FEss['qty']; ?></td>
				  <td><?php  echo $FEss['others']; ?></td>
				
                      <td><a href="service_delete_edit.php?id=<?php echo $FEss['id']; ?> && stype_no=<?php echo $FEss['stype_no']; ?>"  onClick="return confirm('Are You Sure Want to Delete?');" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
					   
                     
				 
                </tr>
				<?php } 
				
				?>
                </tbody>
              </table>
                </div>
            </div>
			
			
			
			
			
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	    <div class="box-footer" hidden>
		   <button type="submit" class="btn btn-info pull-right" onClick="return confirm('Are You Sure Want to Update?');">Update </button>
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
