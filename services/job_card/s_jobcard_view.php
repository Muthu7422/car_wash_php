<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

 
 
$pagename="s_jobcard_view.php";
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
<?php



   $time1 = date("H:i",time() + 1200);
// $time2 = date("H:i",time() + 1080);
 $leada="select * from  s_job_card where jcard_status='Ready To Delivery' AND DeliveryTime='$time1'"; 
$lead_datea=mysqli_query($conn,$leada);
$lead_maina=mysqli_fetch_array($lead_datea);

 $tble=$lead_maina['DeliveryTime'];


  $tabl1=json_encode(array($time1,$time2));
 
 
if($tble==$time1)
{
					
 ?> 
  <!--Alert Popup for CRM----------->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
<!--------------------->
<?php
}?>
  
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
	  	  <?php 
					  if($FEspno['ViewData']>'0')
					  {
					  ?>
	   <h4><div align="right"><a href="s_jobcard_delete_temp.php"><b> CREATE NEW JOB CARD DETAILS</b></a></div></h4>
					  <?php } ?>
	 </section>
	 	<!----------Alert------------
	-----------------------------
	--------------------------->
       <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Ready To Delivery <span style="background-color:red;color:white;padding:5px"><?php echo date("h:i",time($time1))?></span></h4>
            </div>
            <div class="modal-body">
				<div class="box-body">
                    <div class="form-group">
					<table id="" class="table table-bordered table-striped" align="left">
				
				<thead>
                <tr>
                  <th>S.No</th>
                  <th>Customer Name</th>
				  <th>Mobile No</th>
				  <th>Vehicle No</th>
				  <th>Service Name</th>
				  </tr>
				  </thead>
				  <tbody>
				  <?php
                      $i=0;				  
					 $lead="select * from  s_job_card where jcard_status='Ready To Delivery' AND DeliveryTime='$time1'"; 
					$lead_date=mysqli_query($conn,$lead);
					while($lead_main=mysqli_fetch_array($lead_date))
					{
					
					$customer="select * from a_customer where id='".$lead_main['customer_id']."'";
					$cust_q=mysqli_query($conn,$customer);
					$cusr_f=mysqli_fetch_array($cust_q);
					
					$customer_v="select * from a_customer_vehicle_details where vehicle_no='".$lead_main['vehicle_no']."'";
					$custv_q=mysqli_query($conn,$customer_v);
					$cusrv_f=mysqli_fetch_array($custv_q);
					
					$customer_j="select * from s_job_card_sdetails where job_card_no='".$lead_main['id']."'";
					$custv_j=mysqli_query($conn,$customer_j);
					$cusrv_j=mysqli_fetch_array($custv_j);
					
					$customer_s="select * from m_service_type where stype='".$cusrv_j['service_type']."'";
					$custv_s=mysqli_query($conn,$customer_s);
					$cusrv_s=mysqli_fetch_array($custv_s);
					
					$i++;
					?>
					<tr>
				  <td><?php  echo $i; ?></td>
				   <td><?php  echo $cusr_f['cust_name']; ?></td>
				    <td><?php  echo $cusr_f['mobile1']; ?></td>
					<td><?php echo $cusrv_f['vehicle_no'];?></td>
					<td><?php echo $cusrv_s['stype'];?></td>
				  </tr>
				  <?php
					}
					?>
				    </tbody>
					</table>
                    </div>
					  </div>
            </div>
        </div>
    </div>
</div>
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
            	  <?php 
					  if($FEspno['ViewData']>'0')
					  {
					  ?>
              <div class="box-body">
                <div class="form-group col-sm-12">
				<div style="overflow:auto"  >
                <table id="example1" class="table table-bordered table-striped" width="100%">
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
				
				<th>Ready To Delivery</th>
				<th>Vehicle Model</th>
				
				<th>Print</th>
				<th>Edit</th>
				<?php
				if($_SESSION['UserRole']=='admin')
				{
				?>
				<th class="hidden">Secret Pin</th>
				<?php } ?>
				<th>View Photos</th>
				<th>Delete</th>
				 </tr>
                </thead>
                <tbody>
					<?php
				$ss="select SecretPin,jcard_status,job_card_no,id,CustomerSignature,jdate,vehicle_no,sname,smobile from s_job_card where status='Active' and FranchiseeId='".$_SESSION['BranchId']."' and jcard_status!='Close' order by id desc";
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
					
					$cust="select * from a_customer where mobile1='".trim($FEss['smobile'])."'";
                    $custs=mysqli_query($conn,$cust);
                     $custf=mysqli_fetch_array($custs);
					
				     $fdf="select * from a_customer_vehicle_details where vehicle_no='".trim($FEss['vehicle_no'])."'";
				     //$fdf="select t1.cust_name,t1.VehicleModel,t2.VehicleModel from a_customer_vehicle_details t1 where t1.cust_name='".$FEss['sname']."' left join master_vehicle t2 on t1.VehicleModel=t2.VehicleModel ";
				     $hx=mysqli_query($conn,$fdf);
					 $fhf=mysqli_fetch_array($hx);
					
					 $fdf1="select * from master_vehicle where Id='".$fhf['VehicleModel']."'";
			     	 $hx1=mysqli_query($conn,$fdf1);
					 $fhf1=mysqli_fetch_array($hx1);
					
					
				  	// $n="select id from s_job_card_package_service_details where ServiceStatus='Pending' and JobcardId='".$FEss['id']."'";
					// $c=mysqli_query($conn,$n);
					// $nr=mysqli_num_rows($c);
					
				    // $pkg="select id from  s_job_card_package_service_details where ServiceStatus='Pending' and job_card_no='".$FEss['job_card_no']."'";
                    // $abc=mysqli_query($conn,$pkg);
					// $abcd=mysqli_num_rows($abc); 
					
					
					// $n2="select id from s_job_card_sdetails where ServiceStatus='Pending' and job_card_no='".$FEss['id']."'";
					// $c2=mysqli_query($conn,$n2);
					// $nr2=mysqli_num_rows($c2);
					
					$i++;
				?>
                <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $FEss['job_card_no'];?></td>
				<td><?php echo date("d-m-Y", strtotime($FEss['jdate']));?></td>
				<td><?php echo $fhf['vehicle_no'];?></td>
				<td><?php echo $FEss['sname'];?></td>
				<td><?php echo $FEss['smobile'];?></td>
				
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
				<?php 
				if($nr==0  and $nr2==0 and $FEss['jcard_status']=='Open'and $abcd==0)
				{
				?>
				<a href="s_jobcard_checklist.php?job_card_no=<?php echo $FEss['job_card_no']; ?>&&JobcardId=<?php echo $FEss['id']; ?>"  class="btn-box-tool"><i class="fa fa-thumbs-o-up" style="font-size:22px;font-weight:800;color:red"></i></a>
				
				<?php 
				}
				elseif($nr==0 and $nr2==0 and $FEss['jcard_status']=='Ready To Delivery' and $abcd==0)
				{
				?>
				<a href="../../store/final_bill/f_bill1.php?job_card_no=<?php echo $FEss['job_card_no'];?>&JobcardId=<?php echo $FEss['id'];?>" class="btn-box-tool"><span style="font-size:20px;color:green; font-weight:800"> Close</span></a>
			<!-- /.	<a href="s_job_cardclose.php?job_card_no=<?php //echo $FEss['job_card_no']; ?>&JobcardId=<?php //echo $FEss['id']; ?>" class="btn-box-tool"><span style="font-size:20px;color:green; font-weight:800"> Close</span></a> -->
				<?php 
				}
				?>
				</td>
				<td><?php echo $fhf1['VehicleModel'];?></td>
				<td>
				
				<a href="s_jobcard_receipt.php?job_card_no=<?php echo $FEss['job_card_no']; ?> &id=<?php echo $FEss['id']; ?>"  class="btn-box-tool"><i class="fa fa-print" style="font-size:22px;color:Black"></i></a>
				
				</td>
				<td>
						<?php 
					  if($FEspno['EditData']>'0')
					  {
					  ?>
				<a href="s_jobcard_edit.php?job_card_no=<?php echo $FEss['job_card_no']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1" style="font-size:22px;color:Black"></i></a>
				<?php } ?>
				</td>
				<?php
				if($_SESSION['UserRole']=='admin')
				{
				?>
				<td class="hidden"><?php echo $FEss['SecretPin'];?></td>
				<?php } ?>
				
				<td><a href="s_jobcard_image.php?jobid=<?php echo $FEss['id'];?>"><i class="fa fa-picture-o" aria-hidden="true" style="font-size:25px"></i></a></td>
				
				<td><a href="s_job_service_delete.php?job_card_no=<?php echo $FEss['job_card_no'];?>" class="btn-box-tool"><i class="fa fa-remove custom-icon1" style="font-size:22px;color:Black"></i></a></td>

				<?php } ?>			
                </tr>
				
                </tbody>
              </table>
			  </div>
                </div>				
            </div>
			<?php } ?>
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
