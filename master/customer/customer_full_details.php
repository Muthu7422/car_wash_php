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
      Customer Full Details
        <small></small>
      </h1>
	  
     </section>
  
    <!-- Man content -->
 
    <!-- /.content -->
	
	  <section class="content container-fluid">
       
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			   <h3>
     Customer Bill Details
      </h3>
						<?php 
						$ssc="select * from a_customer where id='".$_REQUEST['id']."'";
						$Essc=mysqli_query($conn,$ssc);
						$FEssc=mysqli_fetch_array($Essc);
						?>
                <div class="form-group col-sm-12">
				<div style="padding-left:170px" >
               <table border="1" width="650" align="left" >
                <thead>
                <tr>
				  <th>Sl No</th>
				   <th>Customer Name</th>
				    <th>Date</th>
                  <th>Bill No</th>
				  <th>Bill Amount</th>
                </tr>
                </thead>
                <tbody>
					<?php
			  	$ss="select * from a_final_bill where cname='".$_REQUEST['id']."' and FrachiseeId='".$_SESSION['FranchiseeId']."'";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $FEssc['cust_name'];?></td>
				  <td><?php echo date('d-m-Y',strtotime($FEss['bill_date']));?></td>
				  <td><?php echo $FEss['inv_no'];?></td>
				  <td><?php echo $FEss['bill_amt'];?></td>
				  <?php
				  }
				  ?>
                  
                </tr>
				
                </tbody>
              </table>
			  </div>
                </div>				
            </div>
			
			   <div class="box-body">
			   <h3>
     Customer Package Details
      </h3>
                <div class="form-group col-sm-12">
				<div style="padding-left:170px" >
               <table border="1" width="650" align="left" >
                <thead>
                <tr>
				  <th>Sl No</th>
				   <th>Customer Name</th>
				    <th>Date</th>
                  <th>Bill No</th>
				  <th>Package Details</th>
                </tr>
                </thead>
                <tbody>
					<?php
			  	$ss="select * from a_final_bill where cname='".$_REQUEST['id']."' and FrachiseeId='".$_SESSION['FranchiseeId']."'";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				$FEss=mysqli_fetch_array($Ess);
				
					
					$dec="select * from s_job_card where customer_id='".$_REQUEST['id']."'";
					$esc=mysqli_query($conn,$dec);
					while($sce=mysqli_fetch_array($esc))
					{
					
					$dec1="select * from s_job_card_pdetails where job_card_no='".$sce['id']."'";
					$esc1=mysqli_query($conn,$dec1);
					while($sce1=mysqli_fetch_array($esc1))
					{
					
					$i++;
				?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $FEssc['cust_name'];?></td>
				  <td><?php echo date('d-m-Y',strtotime($FEss['bill_date']));?></td>
				  <td><?php echo $FEss['inv_no'];?></td>
				  <td><?php echo $sce1['package_type'];?></td>
				  <?php
				  }
				}
				
				  ?>
                  
                </tr>
				
                </tbody>
              </table>
			  </div>
                </div>				
            </div>
			
			   <div class="box-body">
			   <h3>
     Customer Service Details Details
      </h3>
                <div class="form-group col-sm-12">
				<div style="padding-left:170px" >
               <table border="1" width="650" align="left" >
                <thead>
                <tr>
				  <th>Sl No</th>
				   <th>Customer Name</th>
				    <th>Date</th>
                  <th>Bill No</th>
				  <th>Service Details</th>
                </tr>
                </thead>
                <tbody>
					<?php
			  	$ss="select * from a_final_bill where cname='".$_REQUEST['id']."' and FrachiseeId='".$_SESSION['FranchiseeId']."'";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				$FEss=mysqli_fetch_array($Ess);
				
					
					$dec="select * from s_job_card where customer_id='".$_REQUEST['id']."'";
					$esc=mysqli_query($conn,$dec);
					while($sce=mysqli_fetch_array($esc))
					{
					
					$dec1="select * from s_job_card_sdetails where job_card_no='".$sce['id']."'";
					$esc1=mysqli_query($conn,$dec1);
					while($sce1=mysqli_fetch_array($esc1))
					{
					
					$i++;
				?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $FEssc['cust_name'];?></td>
				  <td><?php echo date('d-m-Y',strtotime($FEss['bill_date']));?></td>
				  <td><?php echo $FEss['inv_no'];?></td>
				  <td><?php echo $sce1['service_type'];?></td>
				  <?php
				  }
				}
				
				  ?>
                  
                </tr>
				
                </tbody>
              </table>
			  </div>
                </div>				
            </div>
			
			   <div class="box-body">
			   <h3>
     Customer Amount Pending Details
      </h3>
                <div class="form-group col-sm-12">
				<div style="padding-left:170px" >
               <table border="1" width="650" align="left" >
                <thead>
                <tr>
				  <th>Sl No</th>
				   <th>Customer Name</th>
				    <th>Date</th>
                  <th>Bill No</th>
				  <th>Bill Amount</th>
				   <th>Payable Amount</th>
				    <th>Balance Amount</th>
				   
                </tr>
                </thead>
                <tbody>
					<?php
			 	$ss="select * from a_final_bill where cname='".$_REQUEST['id']."'"; 
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				
				{
					$i++;
			  $Dec="select * from cust_outstanding where invoice='".$FEss['inv_no']."' order by id desc";
				$Edc=mysqli_query($conn,$Dec);
				$Wsx=mysqli_fetch_array($Edc);
				?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $FEssc['cust_name'];?></td>
				  <td><?php echo date('d-m-Y',strtotime($Wsx['p_date']));?></td>
				  <td><?php echo $Wsx['invoice'];?></td>
				  <td><?php echo $Wsx['invoice_amt'];?></td>
				   <td><?php echo $Wsx['tran_amount'];?></td>
				  <td><?php echo $Wsx['balance_amt'];?></td>
				  <?php
				}
				
				  ?>
                  
                </tr>
				
                </tbody>
              </table>
			  </div>
                </div>				
            </div>
			   <div class="box-body">
			   <h3>
     Customer Payment Mode Details
      </h3>
                <div class="form-group col-sm-12">
				<div style="padding-left:170px" >
               <table border="1" width="650" align="left" >
                <thead>
                <tr>
				  <th>Sl No</th>
				   <th>Customer Name</th>
				    <th>Date</th>
                  <th>Bill No</th>
				  <th>Bill Amount</th>
				   <th>Payment Mode</th>
                </tr>
                </thead>
                <tbody>
					<?php
			  	$ss="select * from a_final_bill where cname='".$_REQUEST['id']."' and FrachiseeId='".$_SESSION['FranchiseeId']."'";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $FEssc['cust_name'];?></td>
				  <td><?php echo date('d-m-Y',strtotime($FEss['bill_date']));?></td>
				  <td><?php echo $FEss['inv_no'];?></td>
				  <td><?php echo $FEss['bill_amt'];?></td>
				   <td><?php echo $FEss['ptype'];?></td>
				  <?php
				  }
				  ?>
                  
                </tr>
				
                </tbody>
              </table>
			  </div>
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
