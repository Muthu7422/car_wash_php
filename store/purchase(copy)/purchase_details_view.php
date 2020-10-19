<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);
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
    Purchase  Items View 
        <small>Invoice No :<?php echo $_REQUEST['inv_no']; ?></small>
      </h1>
    </section>
  
             
			  
    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
           
            <!-- /.box-header -->
            <!-- form start -->
					
			
    
	  
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
            <!-- /.box-header -->
          	 <div class="box-body" style="overflow:auto">
                <div class="form-group col-sm-12">
                <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>S.No</th>
                  <th>Supplier Name</th>
				  <th>Spare Brand</th>
				  <th>Spare Name</th>
				  <th>Spare Part No</th>
				  <th>Unit</th>
				  <th>Mrp</th>
				  <th>Discount Amt</th>
				  <th>Purchase Rate</th>
				  <th>Qty</th>
				  <th>Amount</th>
				  <th>GST</th>
				  <th>Total Amount</th>
				  <th style="background-color:#E6CFCC">Return Purchase</th>
                </tr>
                </thead>
                <tbody>
				<?php
				
			$Wpm="select * from s_purchase where inv_no='".$_REQUEST['inv_no']."'";
				$Wrp=mysqli_query($conn,$Wpm);
				$Wsd=mysqli_fetch_array($Wrp);
				
				$ss="select * from  s_purchase_details where inv_no='".$Wsd['id']."'";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
					
				 	 $sdm="select * from m_spare_brand where sid='".$FEss['spare_brand']."'"; 
					$scm=mysqli_query($conn,$sdm);
					$pqr=mysqli_fetch_array($scm);
					
					$sdm2="select * from m_spare where sid='".$FEss['spare_name']."'"; 
					$scm2=mysqli_query($conn,$sdm2);
					$pqr2=mysqli_fetch_array($scm2);
					
					$sdm1="select * from m_supplier where sid='".$FEss['supplier_name']."'"; 
					$scm1=mysqli_query($conn,$sdm1);
					$pqr1=mysqli_fetch_array($scm1);
					
					 $ses="select * from m_unit_master where id='".$FEss['unit']."'";
					$arrs=mysqli_query($conn,$ses);
					$spms=mysqli_fetch_array($arrs);
					
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo $pqr1['sname'];  ?></td>
				  <td><?php  echo $pqr['sbrand']; ?></td>
				  <td><?php  echo $pqr2['sname']; ?></td>
				  <td><?php  echo $FEss['spare_part_no']; ?></td>
				<td><?php  echo $spms['u_name']; ?></td>
				<td><?php  echo $FEss['mrp']; ?></td>
				<td><?php  echo $FEss['discount_amt']; ?></td>
				<td><?php  echo $FEss['purchase_rate']; ?></td>
				<td><?php  echo $FEss['qty']; ?></td>
				<td><?php  echo $FEss['total']; ?></td>
				  <td><?php  echo $FEss['gst_amt']; ?></td>
				  <td><?php echo $FEss['total_amount']; ?></td>
				 <td style="background-color:#E6CFCC"><a href="s_purchase_return.php?inv_no=<?php echo $Wsd['inv_no']; ?> && id=<?php  echo $FEss['id']; ?>" onClick="return confirm('Are You Sure Want to Return?');" class="btn-box-tool"><i class="custom-icon1" style="font-size:15px;color:black">Return</i></a></td> 
                  
                </tr>
				<?php } ?>
				
                </tbody>
              </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
            
          
        </div>
      </div>
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