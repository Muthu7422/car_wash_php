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
       Job Card History
        <small>Services</small>
      </h1>
	   <h4><div align="right"><a href="s_jobcard_delete_temp.php"><b> CREATE NEW JOB CARD DETAILS</b></a></div></h4>
     </section>
    <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
              This  <strong>Job Card Details Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['u']!="") {?> 
			  <div class="alert alert-warning">
               This  ob Card Details <b>Updated</b> Successfully!  <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?></div>
   
    <!-- Main content -->
 
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
                <div class="form-group col-sm-12">
				<div style="overflow:auto">
                <table id="example1" class="table table-bordered table-striped" width="150%">
                <thead>
                <tr>
				<th>Sl No</th>
				<th>Job Card No</th>
				<th>Date</th>
                <th>Vehicle No</th>
				<th>Customer Name</th>
				<th>Mobile</th>
				<th hidden>Add Spare</th>
				<th hidden>Add Painting Service</th>
				<th>Signature </th>
				<th>Print</th>
				<th>Edit</th>
				<th>Ready To Delivery</th>
				<th>Jobcard Close</th>
				<?php
				if($_SESSION['UserRole']=='admin')
				{
				?>
				<th>Secret Pin</th>
				<?php } ?>
				<th>Delete</th>
				
                </tr>
                </thead>
                <tbody>
					<?php
				$ss="select SecretPin,jcard_status,job_card_no,id,CustomerSignature,jdate,vehicle_no,sname,smobile from s_job_card where status='Active' and FranchiseeId='".$_SESSION['FranchiseeId']."' and jcard_status='Open' and jdate='".date('Y-m-d')."' order by id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$Ews="select id from s_spare_prepick where s_job_card_no='".$FEss['job_card_no']."' and JobcardId='".$FEss['id']."'";
					$ewq=mysqli_query($conn,$Ews);
					$Eaw=mysqli_num_rows($ewq);
					
					$Ews1="select Id from s_outsources where job_card_no='".$FEss['job_card_no']."' and JobcardId='".$FEss['id']."'";
					$ewq1=mysqli_query($conn,$Ews1);
					$Eaw1=mysqli_num_rows($ewq1);
					
				  	$n="select id from s_job_card_package_service_details where ServiceStatus='Pending' and JobcardId='".$FEss['id']."'";
					$c=mysqli_query($conn,$n);
					$nr=mysqli_num_rows($c);
					
				    $pkg="select id from  s_job_card_package_service_details where ServiceStatus='Pending' and job_card_no='".$FEss['job_card_no']."'";
                    $abc=mysqli_query($conn,$pkg);
					$abcd=mysqli_num_rows($abc); 
					
					
					$n2="select id from s_job_card_sdetails where ServiceStatus='Pending' and job_card_no='".$FEss['id']."'";
					$c2=mysqli_query($conn,$n2);
					$nr2=mysqli_num_rows($c2);
					
					$i++;
				?>
                <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $FEss['job_card_no'];?></td>
				<td><?php echo date("d-m-Y", strtotime($FEss['jdate']));?></td>
				<td><?php echo $FEss['vehicle_no'];?></td>
				<td><?php echo $FEss['sname'];?></td>
				<td><?php echo $FEss['smobile'];?></td>
				<td>
				<?php 
				if($FEss['CustomerSignature']=='')
				{
				?>
				<a href="jobcard_signature.php?JobcardId=<?php echo $FEss['id']; ?>" class="btn-box-tool"><i class="fa fa-pencil" style="font-size:22px;color:red"></i></a>
				<?php
				} 
				else{
					$pngdata=$FEss['CustomerSignature'];
				?>
				<a href="jobcard_signature.php?JobcardId=<?php echo $FEss['id']; ?>"><img src="data:<?php echo $pngdata; ?>" width="120px" height="50px" /></a>
				<?php } ?>
				</td>
				<?php
				if($Eaw<'1')
				{
				?>
				<td hidden><a href="../spare_prepick/s_spare_prepick.php?job_card_no=<?php echo $FEss['job_card_no']; ?>&&JobcardId=<?php echo $FEss['id']; ?>" class="btn-box-tool"><i class="fa fa-wrench" style="font-size:22px;color:Black"></i></a></td>
				<?php
				}
				else
				{
				?>
				<td></td>
				<?php
				}
				
				if($Eaw1<'1')
				{
				?>
				<td hidden><a href="../out_sources/out_sources.php?job_card_no=<?php echo $FEss['job_card_no']; ?>&&JobcardId=<?php echo $FEss['id']; ?>"   class="btn-box-tool"><i class="fa fa-exchange" style="font-size:22px;color:Black"></i></a></td>
				<?php
				}
				else
				{
				?>
				<td></td>
				<?php
				}
				?>
				<td>
				
				<a href="s_jobcard_receipt.php?job_card_no=<?php echo $FEss['job_card_no']; ?> &id=<?php echo $FEss['id']; ?>"  class="btn-box-tool"><i class="fa fa-print" style="font-size:22px;color:Black"></i></a>
				
				</td>
				<td><a href="s_jobcard_edit.php?job_card_no=<?php echo $FEss['job_card_no']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1" style="font-size:22px;color:Black"></i></a></td>
				<?php 
				
				
				?>
				<?php 
				if($nr==0  and $nr2==0 and $FEss['jcard_status']=='Open'and $abcd==0)
				{
				?>
				<td><a href="s_jobcard_checklist.php?job_card_no=<?php echo $FEss['job_card_no']; ?>&&JobcardId=<?php echo $FEss['id']; ?>"  class="btn-box-tool"><i class="fa fa-thumbs-o-up" style="font-size:22px;font-weight:800;color:red"></i></a></td>
				<td></td>
				<?php 
				}
				elseif($nr==0 and $nr2==0 and $FEss['jcard_status']=='Ready To Delivery' and $abcd==0)
				{
				?>
				<td><a href="#" onClick="return confirm('Already Updated Ready to Delivery. So You Can Close It');" class="btn-box-tool"><span style="font-size:22px;color:black; font-weight:800"> <i class="fa fa-check" aria-hidden="true"></i></span></a></td>
				<td><a href="s_job_cardclose.php?job_card_no=<?php echo $FEss['job_card_no']; ?>&&JobcardId=<?php echo $FEss['id']; ?>" class="btn-box-tool"><span style="font-size:20px;color:green; font-weight:800"> Close</span></a></td>
				<?php 
				}
				else
				{
				?>
				<td><a href="s_jobcard_service_pending.php?job_card_no=<?php echo $FEss['job_card_no']; ?>"  class="btn-box-tool"><span style="font-size:17px;color:red; font-weight:800"> Pending Service</span></font></td>
				<td></td>
				<?php 
				}
				?>
				
				<?php
				if($_SESSION['UserRole']=='admin')
				{
				?>
				<td><?php echo $FEss['SecretPin'];?></td>
				<?php } ?>
				
				<td><a href="s_job_service_delete.php?job_card_no=<?php echo $FEss['job_card_no']; ?>" class="btn-box-tool"><i class="fa fa-remove custom-icon1" style="font-size:22px;color:Black"></i></a></td>

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
	<section class="content container-fluid">
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
