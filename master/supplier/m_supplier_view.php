<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);

$pagename="m_supplier_view.php";
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
    Supplier
        <small>History</small>
      </h1>
	   
    </section>
  
             
			  
    <!-- Main content -->
    <section class="content container-fluid">
      <?php 
					  if($FEspno['CreateData']>'0')
					  {
					  ?>
       <h4><div align="right"><a href="m_supplier.php"><b> CREATE NEW SUPPLIER</b></a></div></h4>  
					  <?php } ?>
	    <!-- left column -->
        
           
			
            <!-- /.box-header -->
            <!-- form start -->
					
					 
    
	  	
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
			 
            <div class="box-header">
              <h3 class="box-title">Available Suppliers</h3>
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
                  <th>Supplier Name</th>
				  <th>Mobile 1</th>
				  <th>City</th>
				  <th>Status</th>
				  <th>View</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
			<?php
				$ss="select * from  m_supplier where status='Active' and franchisee_id='".$_SESSION['BranchId']."' order by sid desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo $FEss['sname'];  ?></td>
				  <td><?php  echo $FEss['smobile1']; ?></td>
				  <td><?php  echo $FEss['scity']; ?></td>
				  <td><?php  echo $FEss['status']; ?></td>
				  <td> <a href="m_supplier_details_view.php?id=<?php  echo $FEss['sid']; ?>" class="btn-box-tool"><i class="fa fa-eye custom-icon1"></i></a> </td>
                  <td>
		  
					    <?php 
					  if($FEspno['EditData']>'0')
					  {
					  ?>
				  <a href="m_supplier_edit.php?id=<?php  echo $FEss['sid']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a> 
					  <?php }	 ?>
					  
					   <?php 
					  if($FEspno['DeleteData']>'0')
					  {
					  ?>
				  <a href="m_supplier_delete.php?id=<?php  echo $FEss['sid']; ?>" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a> 
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