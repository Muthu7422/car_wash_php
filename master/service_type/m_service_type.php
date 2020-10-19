<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

  $see="select * from m_franchisee where branch_id='".$_SESSION['FranchiseeId']."'"; 
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
        Service Types
        <small>Master</small>
      </h1>
     </section>
	  <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
              This  <strong>Service Type Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			  <div class="alert alert-danger">
              <b>Service Type Deleted Successfully!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  <?php if($_REQUEST['a']!="") {?> 
			  <div class="alert alert-warning">
               This  Service Type <b>Updated</b> Successfully! <i class="fa fa-warning" style="font-size:30px;color:white"></i>
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
  function tabE(obj,e){ 
   var e=(typeof event!='undefined')?window.event:e;// IE : Moz 
   if(e.keyCode==13){ 
     var ele = document.forms[0].elements; 
     for(var i=0;i<ele.length;i++){ 
       var q=(i==ele.length-1)?0:i+1;// if last element : if any other 
       if(obj==ele[i]){ele[q].focus();break} 
     } 
  return false; 
   } 
  } 
  
</script>	 
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="m_service_type_addQ.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
			<?php
			$p="select * from m_service_type";
			$Ep=mysqli_query($conn,$p);
			$Fp=mysqli_fetch_array($Ep);
			$n=mysqli_num_rows($Ep);
			$n1=$n+1;
			$pn="ST".$n1;
			
			
          $nm="select * from m_service_type_temp where stype_no='".$_REQUEST['stype_no']."'";
			$abc=mysqli_query($conn,$nm);
			$temp=mysqli_fetch_array($abc);
			
			if($_REQUEST['stype_no']!="")
			{
			$ps=$_REQUEST['stype_no'];
			}
			else
			{
			$ps=$pn;
			}
			?>
            
              <div class="box-body">
			   <div class="form-group col-sm-4">
                  <label for="Branch">Service Type No</label>
                  <input type="text" class="form-control" name="stype_no" id="stype_no" value="<?php echo $ps; ?>" placeholder="Service Type" onKeyPress="return tabE(this,event)" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Category</label>
                  <select type="text" class="form-control" name="vcategory" id="vcategory"  onKeyPress="return tabE(this,event)" >
				<option value="">-Select The Category-</option>
				<option value="Wash">Wash</option>
				<option value="Interior">Interior</option>
				<option value="exterior">exterior</option>
				  </select>
                </div>
                <div class="form-group col-sm-4">
                  <label for="Branch">Service Type</label>
                  <input type="text" class="form-control" name="stype" id="stype" value="<?php echo $temp['stype_name']; ?>" placeholder="Service Type" onKeyPress="return tabE(this,event)" required>
                </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Service Amount</label>
                  <input type="text" class="form-control" name="in_amt" id="in_amt" value="<?php echo $temp['installation_amt']; ?>" placeholder="Installation Amount" onKeyPress="return tabE(this,event)" required>
                </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Other Charge</label>
                  <input type="text" class="form-control" name="labour_amt" id="labour_amt" value="<?php echo $temp['labour_amt']; ?>" placeholder="Labour Charge" onKeyPress="return tabE(this,event)" >
                </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Segment</label>
               <select type="text" class="form-control" name="vehcile_type" id="vehcile_type"  onKeyPress="return tabE(this,event)" required>
			 <option value="<?php echo $temp['v_type'];?>"><?php echo $temp['v_type'];?></option>
			<option>--Select The Vehicle Segment--</option>
				  		<?php 
	  $cx="select * from master_vehicle_segment where Status='Active'";
				  $dx=mysqli_query($conn,$cx);
				  while($xd=mysqli_fetch_array($dx))
						{
						?>
						
						<?php
						if($xd['Id']==$temp['v_type'])
						{
						?>
						<option value="<?php echo $xd['Id']; ?>" selected="true"><?php echo $xd['VehicleSegment']; ?></option>
						<?php 
						}
						else
						{
							
						?>
						<option value="<?php echo $xd['Id']; ?>"><?php echo $xd['VehicleSegment']; ?></option>
						<?php } } ?>
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
				 <div class="form-group col-sm-4">
                  <label for="Branch">Spare(Associate spare with service)</label>
                  <select type="text" class="form-control" name="spare_name" id="spare_name"  autofocus="autofocus"  onKeyPress="return tabE(this,event)" >
				  <option value="">---Select the Spare / Item--</option>
				  <?php 
				  $ss="select * from m_spare where status='Active' and franchisee_id='".$_SESSION['BranchId']."'";
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
				
					<div class="form-group col-sm-3">
                  <label for="Branch">HSN Code</label>
                  <input type="text" class="form-control" name="hsn_code" id="hsn_code" placeholder="HSN Code" onKeyPress="return tabE(this,event)" >
                </div>
				
				<div class="form-group col-sm-2">
                  <label for="Branch">Qty</label>
                  <input type="text" class="form-control" name="qty" id="qty" placeholder="Qty" onKeyPress="return tabE(this,event)" >
                </div>
				<div class="form-group col-sm-3">
                  <label for="Branch">Others</label>
                  <input type="text" class="form-control" name="other" id="other" placeholder="Others" onKeyPress="return tabE(this,event)" >
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Invoice Visibility</label>
                  <select type="text" class="form-control" name="show_option" id="show_option"  onKeyPress="return tabE(this,event)" >
				  <option>Invisible</option>
				  <option>Visible</option>				  
				  </select>
                </div>
				
				<div class="form-group col-sm-4" hidden>
                  <label for="Branch">Product Ownership</label>
                  <input type="text" class="form-control" name="ownership" id="ownership" value="<?php echo $_SESSION['franchisee_name'] ?>" onKeyPress="return tabE(this,event)" readonly>
							  
                </div>
				
				
				</div>
				  <div class="box-body">
                  <button type="submit" name="submit" class="btn btn-info pull-right" >Submit</button>
                </div>    
				</br>	
				
				  <div class="box-body">
                <div class="form-group col-sm-12">
                <table  class="table table-bordered table-striped">
                <thead>
                <tr>
				
                  <th>S.No</th>
                  <th>Category</th>
				  <th>Service Type</th>
				  <th>Spare / Item Name</th>
				  <th>Rate</th>
				  <th>Qty</th>
				  <th>Other</th>
				  <th>Action</th>
				   
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from m_service_type_temp where status='Active' order by id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					
					
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				   <td><?php  echo $FEss['vcategory']; ?></td>
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
				   
				  <td><?php  echo $FEss['installation_amt']; ?></td>
				  <td><?php  echo $FEss['qty']; ?></td>
				  <td><?php  echo $FEss['others']; ?></td>
				
                      <td><a href="service_delete.php?id=<?php echo $FEss['id']; ?> && stype_no=<?php echo $FEss['stype_no']; ?>"  onClick="return confirm('Are You Sure Want to Delete?');" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
					   
                     
				 
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
	    <div class="box-footer">
		  <button type="submit" class="btn btn-info pull-left" onClick="return confirm('Are You Sure Want to Delete?');" style="font-size:16px;"><a href="m_service_type_delete_open_temp.php">Clear</a></button>
                <button type="submit" name="complete" class="btn btn-info pull-right" onClick="return confirm('Are You Sure Want to Complete?');">confirm </button>
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
            
              <div class="box-body" hidden>
                <div class="form-group col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				
                  <th>S.No</th>
                  <th>Category</th>
                  <th>Service Type</th>
				  <th hidden> Ownership</th>
				   <th> Segment</th>
				   <th> Amount</th>
					 
				  <th>Status</th>
				  <th>Action</th>
				   <th>Delete</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select* from m_service_type where status='Active' and franchisee_id='".$_SESSION['BranchId']."' AND vendor_id='".$_SESSION['VendorId']."' order by id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					
					$vtype="select * from master_vehicle_segment where Id='".$FEss['v_type']."'";
					$vtypeq=mysqli_query($conn,$vtype);
					$vtypef=mysqli_fetch_array($vtypeq);
					
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $FEss['vcategory']; ?></td>
				  <td><?php  echo $FEss['stype']; ?></td>
				   <td hidden><?php  echo $FEss['ownership']; ?></td>
				    <td><?php  echo $vtypef['VehicleSegment']; ?></td>
				  	  <td><?php 
						$amt= $FEss['installation_amt']+ $FEss['labour_amt'];
					  echo $amt ?></td>
				  <td><?php  echo $FEss['status']; ?></td>
				  <td>
                      <a href="m_service_type_edit.php?stype_no=<?php  echo $FEss['stype_no']; ?>&&id=<?php  echo $FEss['id']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a>
                     
				  </td>
				    <td><a href="service_details_delete.php?id=<?php echo $FEss['id']; ?>"  onClick="return confirm('Are You Sure Want to Delete?');" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
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
