<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);

$pagename="s_purchase_view.php";
 $spno="SELECT * FROM `t_role_pages` where role_id='".$_SESSION['role_name']."' and pageno IN (SELECT id FROM `t_lmenu`where url like '%$pagename') ORDER BY `id` ASC";
$Espno=mysqli_query($conn,$spno);
$FEspno=mysqli_fetch_array($Espno);

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
    Purchase History
        <small>Store</small>
      </h1>
	   
    </section>
  
             
			  
    <!-- Main content -->
    <section class="content container-fluid">
    <?php  if($FEspno['CreateData']>'0')
					  {
					  ?>
       <h4><div align="right"><a href="s_purchase_search.php"><b> CREATE NEW PURCHASE</b></a></div></h4>  
 <?php } ?>	  
	  <!-- left column -->
        
           
			
            <!-- /.box-header -->
            <!-- form start -->
					
			
    
	  
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Purchase</h3>
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
                <th>S:No</th>
				<th>Invoice No</th>
				<th>Date</th>
				<th>Supplier Name</th>
				<th hidden>Purchase Photo</th>
                <th>View </th>
				<th class="hidden">Edit </th>
				<th>Cancel Bill</th>
				
                  
                </tr>
                </thead>
                <tbody>
				<?php
				$ct="select * from s_purchase where FranchiseeId='".$_SESSION['BranchId']."' and purchase_details='Open'";
				$Ect=mysqli_query($conn,$ct);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
					
					$dcm="select * from m_supplier where sid='".$Fct['supplier_name']."'";
					$rmp=mysqli_query($conn,$dcm);
					$poq=mysqli_fetch_array($rmp);
				$i++;
				?>
                <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $Fct['inv_no']; ?></td>
				<td><?php echo $Fct['pdate']; ?></td>
				<td><?php echo $poq['sname']; ?></td>
				<td hidden><a href="<?php  echo "image/".$Fct['PurchasePhoto']; ?>" target="_blank"><?php echo $Fct['PurchasePhoto'];?></a></td>
				<td> <a href="purchase_details_view.php?inv_no=<?php echo $Fct['inv_no']; ?>" onClick="return confirm('Are You Sure Want to View?');" class="btn-box-tool"><i class="fa fa-file-o custom-icon1" style="font-size:20px;color:brown"></i></a> </td>
				<td class="hidden"> <a href="s_purchase_edit_no.php?inv_no=<?php echo $Fct['inv_no']; ?>" onClick="return confirm('Are You Sure Want to Edit?');" class="btn-box-tool"><i class="fa fa-edit custom-icon1" style="font-size:20px;color:brown"></i></a> </td>
				<td><a href="purchase_Cancel.php?inv_no=<?php echo $Fct['inv_no']; ?>" onClick="return confirm('Are You Sure Want to Cancel?');" class="btn-box-tool"><i class="custom-icon1" style="font-size:20px;color:brown">Cancel</i></a></td> 
	 
	
                </tr>
				<?php
				}
				?>
                  </tbody>
                
              </table>
            </div>
				<?php
				}
				?>
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