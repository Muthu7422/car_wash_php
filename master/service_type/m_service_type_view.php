<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);

$pagename="m_service_type_view.php";
 $spno="SELECT * FROM `t_role_pages` where role_id='".$_SESSION['role_name']."' and pageno IN (SELECT id FROM `t_lmenu`where url like '%$pagename') ORDER BY `id` ASC";
$Espno=mysqli_query($conn,$spno);
$FEspno=mysqli_fetch_array($Espno);

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
    Service Type
        <small>History</small>
      </h1>
	   
    </section>
  
             
			  
    <!-- Main content -->
    <section class="content container-fluid">
      <?php 
					  if($FEspno['CreateData']>'0')
					  {
					  ?>
       <h4><div align="right"><a href="m_service_type.php"><b> CREATE NEW SERVICE TYPE</b></a></div></h4>  
					  <?php } ?>
	    <!-- left column -->
        
           
			
            <!-- /.box-header -->
            <!-- form start -->
					
					 
    
	  	
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
			 
            <div class="box-header">
              <h3 class="box-title">Available Service Types</h3>
            </div>
            <!-- /.box-header -->
		  <?php 
					  if($FEspno['ViewData']>'0')
					  {
					  ?>
            <div class="box-body">
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
				  <th>View</th>
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
					  echo $amt ?>
				  </td>
				  <td><?php  echo $FEss['status']; ?></td>
				  <td> <a href="m_service_type_details_view.php?stype_no=<?php  echo $FEss['stype_no']; ?>&&id=<?php  echo $FEss['id']; ?>" class="btn-box-tool"><i class="fa fa-eye custom-icon1"></i></a></td>
                  <td>
				  		<?php 
					  if($FEspno['EditData']>'0')
					  {
					  ?>
                      <a href="m_service_type_edit.php?stype_no=<?php  echo $FEss['stype_no']; ?>&&id=<?php  echo $FEss['id']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a>
					  <?php }	 ?>
		  
					    <?php 
					  if($FEspno['DeleteData']>'0')
					  {
					  ?>
				    <td><a href="service_details_delete.php?id=<?php echo $FEss['id']; ?>"  onClick="return confirm('Are You Sure Want to Delete?');" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
					  <?php }	 ?>
                  </td>
                </tr>
				<?php } ?>
                  </tbody>
                
              </table>
            </div>
				<?php } ?>
            <!-- /.box-body -->
          </div>
            
          
        </div>
      </div>
	        			

     
	  
	
    </section>
    <!-- /.content -->
  
  </div>
 
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
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