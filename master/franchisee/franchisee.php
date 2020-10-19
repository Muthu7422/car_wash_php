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
        Company Entry
        <small>Master</small>
      </h1>
     </section>
	  <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
                <strong>Company Details Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			  <div class="alert alert-danger">
              <b> Company Entry Deactive Successfully!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  <?php if($_REQUEST['a']!="") {?> 
			  <div class="alert alert-warning">
                 Company <b>already</b> exiting! <i class="fa fa-warning" style="font-size:30px;color:white"></i>
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
</script> 

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Company Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form class="form-horizontal" method="post" action="franchisee_act.php" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                  
                <div class="hidden">
                  <label for="catcode" class="col-sm-3 control-label">Franchisee Id</label>
                  <div class="col-sm-4">
				  <?php
				   $sa="select * from m_franchisee";
				  $Esa=mysqli_query($conn,$sa);
				  $n=mysqli_num_rows($Esa);
				  $ect=$n+1;
				  
				  $p="select * from job_card_no where id='1'";
                  $Ep=mysqli_query($conn,$p);
                  $Fp=mysqli_fetch_array($Ep);
                  $pn=$Fp['vendor_id'];
					?>
	            <input type="text" class="form-control" name="franchisee_no"  id="franchisee_no" value="<?php echo "F".$ect;  ?>" placeholder="Franchisee ID" onKeyPress="return tabE(this,event)" readonly style="text-transform:uppercase" required>
	            <input type="text" class="form-control" name="vendor_id"  id="vendor_id" value="<?php echo $pn;  ?>" placeholder="Franchisee ID" onKeyPress="return tabE(this,event)" readonly style="text-transform:uppercase" required>
                 
                  </div>
                </div>
				
				<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Company Name</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="franchisee_name" autofocus="autofocus" id="franchisee_name" value="<?php  ?>" placeholder="Company Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required>
                      </div>
                    </div>
                <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Address</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="address" autofocus="autofocus" id="address" value="<?php  ?>" placeholder="Address" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                      </div>
                    </div>
					
					        <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">City</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="city" autofocus="autofocus" id="city" value="<?php  ?>" placeholder="City" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                      </div>
                    </div>
					
						<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Mobile No</label>
                      <div class="col-sm-8">
					  
                        <input type="text" class="form-control" name="mobile" id="mobile" value="<?php  ?>" placeholder="Mobile No" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                      </div>
                    </div>
						<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Email Id</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="email" autofocus="autofocus" id="email" value="<?php  ?>" placeholder="Email Id" onKeyPress="return tabE(this,event)" >
                      </div>
                    </div> 
                        <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">WebSite</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="web" autofocus="autofocus" id="web" value="<?php  ?>" placeholder="WebSite" onKeyPress="return tabE(this,event)" >
                      </div>
                    </div> 	
						<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Contact Person</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="cen_manager" autofocus="autofocus" id="cen_manager" value="<?php  ?>" placeholder="Center Person" onKeyPress="return tabE(this,event)" >
                      </div>
                    </div> 	
						<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Contact Number</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="con_num" autofocus="autofocus" id="con_num" value="<?php  ?>" placeholder="Contact Number" onKeyPress="return tabE(this,event)" >
                      </div>
                    </div> 
				
					   <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">GSTIN</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="gstin" autofocus="autofocus" id="gstin" value="<?php  ?>" placeholder="GSTIN" onKeyPress="return tabE(this,event)" >
                      </div>
                    </div> 	
				
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Remarks</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="Remarks" autofocus="autofocus" id="Remarks" value="<?php  ?>" placeholder="Remarks" onKeyPress="return tabE(this,event)" >
                      </div>
                    </div>
						<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Company Logo</label>
					   <div class="col-sm-8">
                        <input type="file"  name="img"  id="img"   onKeyPress="return tabE(this,event)" >
                         </div> 
                    </div> 				 					
              </div>
              <!-- /.box-body -->
			 
              <div class="box-footer">
			 
                 <a href="franchisee.php"><button type="" name="Back" id="Back"class="btn btn-info" ><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</button></a>
                <button  type="submit" name="Save" id="Save" class="btn btn-info pull-right" onClick="return confirm('Are You Sure Want to Save?');">Save Changes</button>
              </div>
              <!-- /.box-footer -->
            </form>
		
          </div>
        </div>
      </div>
      <div class="row">
        <!-- left column -->
		
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header" >
              <h3 class="box-title">Available Company</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
				  
                  <th>Company Name</th>
				  <th>Address</th>
				  <th>Contact Person</th>
				   <th>Contact Number</th>
				     <th>Company Logo</th>
				  <th>Status</th>
				  <th>Edit </th>
				  <th>Delete </th>
				  <th>Company Details View</th>
				  <th>Add Branch </th>
				  <th>View Branch </th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ct="select * from m_vendor where status='Active' order by franchisee_name";
				$Ect=mysqli_query($conn,$ct);
				$n=mysqli_num_rows($Ect);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
				$i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $Fct['franchisee_name']; ?></td>
				  <td><?php echo $Fct['address'];  ?></td>
				 
				  <td><?php echo $Fct['cen_manager'];  ?></td>
				    <td><?php echo $Fct['con_number'];  ?></td>
				 <td><img src="<?php echo $Fct['img'];  ?>" height="50" width="50"></td>
				  <td><?php echo $Fct['status'];  ?></td>
				  <td>
                      <a href="franchisee_edit.php?id=<?php echo $Fct['id']; ?>" onClick="return confirm('Are You Sure Want to edit?');" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a> 
                     
                  </td>  
				 
				 <td>
                      <a href="franchisee_delete.php?id=<?php echo $Fct['id']; ?>" onClick="return confirm('Are You Sure Want to Delete?');" class="btn-box-tool"><i class="fa fa-remove custom-icon1"></i></a>                     
                  </td>
				  
				   <td>
                      <a href="company_details_view.php?id=<?php echo $Fct['id']; ?>" class="btn-box-tool"><i class="fa fa-eye custom-icon1"></i></a>                     
                  </td>
				  				  <td>
                      <a href="branch.php?id=<?php echo $Fct['id']; ?>" class="btn-box-tool"><i class="fa fa-plus custom-icon1"></i></a> 
                     
                  </td>
				  				  <td>
                      <a href="branch_view.php?id=<?php echo $Fct['vendor_id']; ?>" class="btn-box-tool"><i class="fa fa-eye custom-icon1"></i></a> 
                     
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