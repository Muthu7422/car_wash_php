<?php
error_reporting(0);
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
       Package Master Service Details
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
</script> 

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
		
            <form class="form-horizontal" method="post" action="#.php" autocomplete="off">
              <div class="box-body">                
				
				<?php 
				$s="select * from m_package where package_no='".$_REQUEST['package_no']."'";
				$Es=mysqli_query($conn,$s);
				$FEs=mysqli_fetch_array($Es);
				?>
				 <div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">Package Name No</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" name="package_name"  id="package_name" value="<?php echo $FEs['package_no']; ?>"  placeholder="Package Name" readonly onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required> 
                  </div>
                </div>
                <div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">Package Name</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" name="package_name"  id="package_name" value="<?php echo $FEs['package_name']; ?>"  placeholder="Package Name" readonly onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required> 
                  </div>
                </div>
				
				 <div class="form-group">
                  <label for="Branch" class="col-sm-3 control-label">Vehicle  Type</label>
				    <div class="col-sm-8">
                  <select type="text" class="form-control" name="vehcile_type" id="vehcile_type"  onKeyPress="return tabE(this,event)" required>
				  <?php
				  $cx="select * from master_vehicle_segment where id='".$FEs['v_type']."'";
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
				
				<div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">Total Amount</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" name="amount"  id="amount" value="<?php echo $FEs['amount']; ?>"  placeholder="Amount" readonly onKeyPress="return tabE(this,event)" style="text-transform:uppercase" > 
                  </div>
                </div>
				
                <div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">Amount per Service</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" name="aps"  id="aps" value="<?php echo $FEs['NoOfTerms']; ?>"  placeholder="Amount per Service" readonly onKeyPress="return tabE(this,event)" style="text-transform:uppercase" > 
                  </div>
                </div>
					
					 
					<br/>
					
					 <div class="box-body" >
              <table id="example1" class="table table-bordered table-striped condensed" width="50%" style="align:center" >
                <thead>
                <tr align="center">
				  <th width="15%">S.No</th>
                  <th width="85%">Service</th>
                </tr>
                </thead>
                <tbody>
				<?php
				 $s="select * from m_package_service where package_no='".$_REQUEST['package_no']."'";
				$Es=mysqli_query($conn,$s);
				$tnc=mysqli_num_rows($Es);
				while($FEs=mysqli_fetch_array($Es))
				{
				
				$i++;
				
				
				?>
                <tr>
				  <td>&nbsp;<?php echo $i;  ?></td>
				  <td>&nbsp;<?php echo $FEs['service'];  ?></td>				  
                </tr>
				<?php
				}
				
				?>
                  </tbody>
                
              </table>
            </div>
					<br/>
					
				
				
		<input type="hidden" class="form-control" id="tc" name="tc"  value="<?php echo $tnc; ?>" >
              </div>
              <!-- /.box-body -->
			 
             
              <!-- /.box-footer -->
            </form>
		
          </div>
        </div>
      </div>
      <div class="hidden">
        <!-- left column -->
		
        <div class="col-md-12">
            
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
				$ct="select * from  m_package";
				$Ect=mysqli_query($conn,$ct);
				while($Fct=mysqli_fetch_array($Ect))
				{
				$ct1="select * from   m_package_service where package_no='".$Fct['package_no']."'";
				$Ect1=mysqli_query($conn,$ct1);
				$Fct1=mysqli_fetch_array($Ect1);
				
				$i++;
				
				
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $Fct['package_no']; ?></td>
				  <td><?php echo $Fct1['package_name'];  ?></td>
				  <td><?php echo $Fct['amount'];  ?></td>
				  <td>
                      <a href="#.php?package_no=<?php echo $Fct['package_no']; ?>" onClick="return confirm('Are You Sure Want to edit?');" class="btn-box-tool">VIEW DEATILS</a> 
                     
                  </td>
				  <td><?php echo $Fct['status'];  ?></td>
				  <td>
                      <a href="#.php?package_no=<?php echo $Fct['package_no']; ?>" onClick="return confirm('Are You Sure Want to edit?');" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a> 
                     
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