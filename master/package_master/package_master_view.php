<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);

$pagename="package_master_view.php";
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
   Package Master
        <small>History</small>
      </h1>
	   
    </section>
  
             
			  
    <!-- Main content -->
    <section class="content container-fluid">
      <?php 
					  if($FEspno['CreateData']>'0')
					  {
					  ?>
       <h4><div align="right"><a href="package_master.php"><b> CREATE NEW PACKAGE</b></a></div></h4>  
					  <?php } ?>
	    <!-- left column -->
        
           
			
            <!-- /.box-header -->
            <!-- form start -->
					
					 
    
	  	
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
			 
            <div class="box-header">
              <h3 class="box-title">Available packages</h3>
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
				$ct="select * from  m_package where franchisee_id='".$_SESSION['BranchId']."' and status='Active'";
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
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $Fct['package_no']; ?></td>
				  <td><?php echo $Fct1['package_name'];  ?></td>
				  <td><?php echo $Fct['amount'];  ?></td>
				  <td>
                      <a href="service_package_detail.php?package_no=<?php echo $Fct['package_no']; ?>"  class="btn-box-tool">VIEW DEATILS</a> 
                  </td>
				  <td><?php echo $Fct['status'];  ?></td>
                  <td>
				  		<?php 
					  if($FEspno['EditData']>'0')
					  {
					  ?>
                      <a href="package_master_edit.php?package_no=<?php echo $Fct['package_no']; ?>&pid=<?php echo $Ect1['id']; ?>" onClick="return confirm('Are You Sure Want to edit?');" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a> 
					  <?php }	 ?>
		  
		   <?php 
					  if($FEspno['DeleteData']>'0')
					  {
					  ?>
                      <a href="package_service_delete.php?package_no=<?php echo $Fct['package_no']; ?>" onClick="return confirm('Are You Sure Want to Delete?');" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a> 
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