<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

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
       Package Master
        <small>Master</small>
      </h1>
     </section>
	  <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
                <strong>  Package Master Entry Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			  <div class="alert alert-danger">
              <b>   Package Master Entry Deactive Successfully!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  <?php if($_REQUEST['a']!="") {?> 
			  <div class="alert alert-warning">
                   Package Master <b>already</b> exiting! <i class="fa fa-warning" style="font-size:30px;color:white"></i>
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
<script>

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
  
  function myFunction($val) {
    window.open("show_items_list_pp.php?iname="+$val,"_blank","toolbar=no,top=200,left=500,width=350px,height=300,addressbar=no");
}

function getmachine(){
  var inputs = document.getElementById('service_name').value;
	$.ajax({
	type:'POST',
	url:'get_machine_types.php',
	data:{inputs},
    dataType:'json',
	success:function(msg){
	document.getElementById("Camount").value=msg;
	
        }
	  });
	 }

</script> 

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Package Master Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form class="form-horizontal" method="post" action="package_master_act.php" autocomplete="off">
              <div class="box-body">                
				 <div class="form-group ">
                  <label for="catcode" class="col-sm-3 control-label">Pid</label>
                  <div class="col-sm-4">
				   <?php
				   $sa="select * from m_package";
				  $Esa=mysqli_query($conn,$sa);
				  $n=mysqli_num_rows($Esa);
				    $ect=$n+1;
					?>
                  <input type="text" class="form-control" name="package_no"  id="package_no" value="<?php echo "P".$ect; ?>" readonly placeholder="Pid" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required> 
                  <input type="hidden" class="form-control" name="franchisee_id"  id="franchisee_id" value="<?php echo $var['id']; ?>" readonly placeholder="Pid" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required> 
                  </div>
                </div>  
				<?php 
				$s="select * from m_package_service_temp order by id desc";
				$Es=mysqli_query($conn,$s);
				$FEs=mysqli_fetch_array($Es);
				?>
                <div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">Package Name</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" name="package_name"  id="package_name" value="<?php echo $FEs['package']; ?>"  placeholder="Package Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required> 
                  </div>
                </div>
				 <div class="form-group">
                  <label for="Branch" class="col-sm-3 control-label">Vehicle  Type</label>
				    <div class="col-sm-8">
                  <select type="text" class="form-control" name="vehcile_type" id="vehcile_type"  onKeyPress="return tabE(this,event)" >
				  <option value="">-Select The Segment-</option>
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
                </div>
				 <div class="form-group hidden">
                  <label for="Branch" class="col-sm-3 control-label">Vehcile Brand</label>
				    <div class="col-sm-8">
                  <select type="text" class="form-control" name="vehcile_brand" id="vehcile_brand"  onKeyPress="return tabE(this,event)">
				  <?php
				  $rr="select * from m_vehicle_brand where Id='".$FEs['v_brand']."'";
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
                </div>  </div>
				
				<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Services</label>
                      <div class="col-sm-8">
						<select class="form-control" name="service_name" id="service_name" autofocus="autofocus"  onChange="getmachine();">
						<option value="">Select Service</option>
					    <?php 
						$ss="select DISTINCT(stype) AS stype from m_service_type where status='Active' order by id";
						$Ess=mysqli_query($conn,$ss);
						while($FEss=mysqli_fetch_array($Ess))
						{
						?>
						<option value="<?php echo $FEss['stype']; ?>"><?php echo $FEss['stype']; ?></option>
					    <?php } ?>
						</select>
                      </div>
                    </div>
					<div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">Cost Per Service</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" name="Camount"  id="Camount" value="<?php echo $FEs['amount'] ?>"  placeholder="Amount" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly> 
                  </div>
                </div>
                
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">&nbsp;</label>
                      <div class="col-sm-8" style="padding-right:550px">
						<button  type="submit" class="btn btn-info pull-right">Add</button>
                      </div>
                    </div>
					 
					<br/>
					<div style="padding-left:170px" >
					<table border="1" width="650" align="center" >
                <thead>
                <tr>
				  <th>S.No</th>
                  <th>Package Name</th>
                  <th>Service</th>
                  <th>Amount</th>
				    <th>Action</th>
					 <th>View Items</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$i=0;
				 $s="select * from m_package_service_temp  order by id desc";
				$Es=mysqli_query($conn,$s);
				$tnc=mysqli_num_rows($Es);
				while($FEs=mysqli_fetch_array($Es))
				{
					$i++;
				?>
                <tr>
				  <td>&nbsp;<?php echo $i;  ?></td>
                  <td>&nbsp;<?php echo $FEs['package'];  ?></td>
				  <td>&nbsp;<?php echo $FEs['service'];  ?></td>				  
				  <td>&nbsp;<?php echo $FEs['Camount'];  ?></td>				  
				  <td><a href="service_delete.php?id=<?php echo $FEs['id']; ?> && package_no=<?php echo $FEs['package_no']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
				   <td> 
                  <input type="button" class="form-control" name="service"  id="service" value="<?php echo $FEs['service'];  ?>" onClick="myFunction('<?php echo $FEs['service'];  ?>');" class="form-control">
				</td>
                </tr>
				<?php } ?>
                  </tbody>
				    <?php 
				  $sql="select * from m_package_service_temp where id"; 
				  $Esql=mysqli_query($conn,$sql);
				  while($Fsql=mysqli_fetch_array($Esql))
					{
					$ttl=$ttl+$Fsql['Camount'];
					}				 
				   ?>			
              </table>
					</div>
					<br/>
					<div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">Total Amount</label>
                  <div class="col-sm-2">
                  <input type="text" class="form-control" name="Tamount"  id="Tamount" value="<?php echo $ttl; ?>"  placeholder="Amount" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly > 
                  </div>
                </div>
				
					
					<div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">Package Amount</label>
                  <div class="col-sm-4">
                  <input type="text" class="form-control" name="amount"  id="amount" value="<?php echo $FEs['amount'] ?>"  placeholder="Amount" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" > 
                  </div>
                </div>
				
				
				<div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">Remarks</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" name="remarks"  id="remarks"   placeholder="Remarks" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" > 
                  </div>
                </div>
				<div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">Status</label>
                  <div class="col-sm-8">
                        <select class="form-control" name="status" id="status" style="text-transform:uppercase; "  onChange="servicecost();">
						<option value="Active">Active</option>				   
						<option value="Inactive">Inactive</option>					  
						</select>
                  </div>
                </div>
		<input type="hidden" class="form-control" id="tc" name="tc"  value="<?php echo $tnc; ?>" >
              </div>
              <!-- /.box-body -->
			 
              <div class="box-footer">
			 
                <button type="submit" class="btn btn-default ">Cancel</button>
                <button  type="submit" class="btn btn-info pull-right" onClick="return confirm('Are You Sure Want to Save?');">Save Changes</button>
              </div>
              <!-- /.box-footer -->
            </form>
		
          </div>
        </div>
      </div>
	  
	  
      <div class="row" hidden>
        <!-- left column -->
		<div class="col-md-12  pull-left">
            <div class="box">
            <div class="box-header" >
              <h3 class="box-title">Available Package Master</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Package No</th>
				  <th>Package Name</th>
				  <th>Amount</th>
				   <th>View Pakage Serevice Details</th>
				  <th>Status</th>
				  <th width="15%">Edit </th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ct="select * from  m_package where franchisee_id='".$_SESSION['BranchId']."'";
				$Ect=mysqli_query($conn,$ct);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
				$ct1="select * from   m_package_service where package_no='".$Fct['package_no']."'";
				$Ect1=mysqli_query($conn,$ct1);
				$Fct1=mysqli_fetch_array($Ect1);
				
				 $dcm1="select *from m_service_type where stype='".$Fct1['package_name']."'";
		     	$Fcm1=mysqli_query($conn,$dcm1);
			    $Ect1=mysqli_fetch_array($Fcm1);
				$i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $Fct['package_no']; ?></td>
				  <td><?php echo $Fct1['package_name'];  ?></td>
				  <td><?php echo $Fct['amount'];  ?></td>
				  <td>
                      <a href="service_package_detail.php?package_no=<?php echo $Fct['package_no']; ?>"  class="btn-box-tool">VIEW DEATILS</a> 
                  </td>
				  <td><?php echo $Fct['status'];  ?></td>
				  <td>
                      <a href="package_master_edit.php?package_no=<?php echo $Fct['package_no']; ?>&pid=<?php echo $Ect1['id']; ?>" onClick="return confirm('Are You Sure Want to edit?');" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a> 
                  </td>
                </tr>
				<?php
				}
				?>
                 </tbody>
             </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
	 
	 
     user experience. -->
	  <?php include("../../footer.php"); ?>
  <!--footer End-->
 <div class="control-sidebar-bg"></div>
 <?php include("../../includes_db_js.php"); ?>
</body>
</html>