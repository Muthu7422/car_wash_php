<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);

$pagename="m_spares_view.php";
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
    Spares / Item 
        <small>History</small>
      </h1>
	   
    </section>
  
             
			  
    <!-- Main content -->
    <section class="content container-fluid">
      <?php 
					  if($FEspno['CreateData']>'0')
					  {
					  ?>
       <h4><div align="right"><a href="m_spares.php"><b> CREATE NEW SPARE</b></a></div></h4>  
					  <?php } ?>
	    <!-- left column -->
        
           
			
            <!-- /.box-header -->
            <!-- form start -->
					
					 
    
	  	
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
			 
            <div class="box-header">
              <h3 class="box-title">Available Spares</h3>
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
                  <th>Spare / Item Name</th>
				  <th>MoU</th>
				  <th>Spare / Item Type</th>
				  <th>Brand / Item</th>
				  <th>Part No</th>
				  <th>M.R.P</th>
				  <th>Min.Stock</th>
				  <th>Status</th>
				  <th>View</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
		<?php
				$i=0;
				$ss="select * from  m_spare where franchisee_id='".$_SESSION['BranchId']."' and status='Active' order by sid desc";
				$Ess=mysqli_query($conn,$ss);
				
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                    <td><?php echo $i; ?></td>
				  <td><?php echo $FEss['sname'];  ?></td>
				  <td><?php
					$su="select * from m_unit_master where id='".$FEss['units']."'";
					$Esu=mysqli_query($conn,$su);
					$FEsu=mysqli_fetch_array($Esu);

				  echo $FEsu['u_name'];  ?></td>
				  <td>
				  <?php  
				  //echo $FEss['stype'];
					$st="select * from m_spare_type where sid='".$FEss['stype']."'";
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
					<td><?php  echo $FEss['min_stock']; ?></td>
					<td><?php  echo $FEss['status']; ?></td>
                   <td><a href="m_spares_details_view.php?id=<?php  echo $FEss['sid']; ?>" class="btn-box-tool"><i class="fa fa-eye custom-icon1"></i></a> </td>					
					<td>
				  		<?php 
					  if($FEspno['EditData']>'0')
					  {
					  ?>
				  <a href="m_spares_edit.php?id=<?php  echo $FEss['sid']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a> 
					  <?php }	 ?>
		  
					   <?php 
					  if($FEspno['DeleteData']>'0')
					  {
					  ?>
				  <a href="m_spares_delete.php?id=<?php  echo $FEss['sid']; ?>" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a> 
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