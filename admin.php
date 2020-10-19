<?php
error_reporting(0);
include("includes.php");
include("redirect.php");
$date=date('d-m-Y');
$next_date=date('Y-m-d', strtotime($date. ' + 1 days'));


  $see="select * from m_franchisee where branch_id='".$_SESSION['FranchiseeId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("includes_db_css.php"); ?>
  <?php
 $leada="select * from  crm_folllowup_main where NextFollowDate='".$next_date."'"; 
$lead_datea=mysqli_query($conn,$leada);
$lead_maina=mysqli_fetch_array($lead_datea);
if($lead_maina['NextFollowDate']==$next_date)
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
}
?>


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!--header Starts-->
  <?php include("header.php"); ?>
  <!--Header End -->
   <style>
div.ex3 {
   border: 1px solid black;
  outline-style: solid;
  outline-color: black;
  outline-width: thin;
}
.modal-content
{
	width:150%;
}
</style> 
  
  
  <!-- Left side column. contains the logo and sidebar -->
   <?php include("leftbar.php"); ?>
 
 <!-- Side Bar End -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#FFFFFF">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
	<!----------Alert------------
	-----------------------------
	--------------------------->
       <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> Lead Alert for <span style="background-color:red;color:white;padding:5px"><?php echo date('d-m-Y',strtotime($date.'+1 days'))?></span></h4>
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
					$lead="select * from  crm_folllowup_main where NextFollowDate='".date('Y-m-d', strtotime($date. ' + 1 days'))."'"; 
					$lead_date=mysqli_query($conn,$lead);
					while($lead_main=mysqli_fetch_array($lead_date))
					{
					
					$customer="select * from a_customer where id='".$lead_main['CustomerId']."'";
					$cust_q=mysqli_query($conn,$customer);
					$cusr_f=mysqli_fetch_array($cust_q);
					
					$customer_v="select * from a_customer_vehicle_details where cust_no='".$cusr_f['id']."'";
					$custv_q=mysqli_query($conn,$customer_v);
					$cusrv_f=mysqli_fetch_array($custv_q);
					$i++;
					?>
					<tr>
				  <td><?php  echo $i; ?></td>
				   <td><?php  echo $cusr_f['cust_name']; ?></td>
				    <td><?php  echo $cusr_f['mobile1']; ?></td>
					<td><?php echo $cusrv_f['vehicle_no'];?></td>
					<td><?php echo $lead_main['RelatedTo'];?></td>
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

<!----------------------
	-----------------------------
	--------------------------->
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6" style="display:none" >
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
			
			<?php
			 $date=date("Y-m-d");
		$lin="select COUNT(id) as tot_jobcard from s_job_card where jdate='$date' and FranchiseeId='".$_SESSION['FranchiseeId']."'";
		$linc=mysqli_query($conn,$lin);
		$ans=mysqli_fetch_array($linc);
		
		
		$lin1="select COUNT(id) as p_service from pending_service where pending_date='$date' and Status='Active'";
		$linc1=mysqli_query($conn,$lin1);
		$ans1=mysqli_fetch_array($linc1);
		
		 $m=date("m");
	 	$lin2="select SUM(TotalPurchaseAmount) as pd from s_purchase where Month(pdate)='$m' and FranchiseeId"; 
		$linc2=mysqli_query($conn,$lin2);
		$ans2=mysqli_fetch_array($linc2);
		  
		  $lin3="select SUM(total_amt) as sd from sales_invoice where Month(sdate)='$m' and FranchiseeId='".$_SESSION['FranchiseeId']."' ";
		$linc3=mysqli_query($conn,$lin3);
		$ans3=mysqli_fetch_array($linc3);
		
				
		  $ds="select SUM(Total_bill_Amount) as jd from a_final_bill where Month(bill_date)='$m' AND financial_year='".$_SESSION['FinancialYear']."' AND FrachiseeId='".$_SESSION['FranchiseeId']."'";
		$sa=mysqli_query($conn,$ds);
		$dxsa=mysqli_fetch_array($sa);
		
		
		
		  $monthNum  = $m;
          $monthName = date('F', mktime(0, 0, 0, $monthNum, 10)); // March



			?>
			  <h3><?php echo $ans['tot_jobcard'];?></h3>

              <h4><B>JOB CARD / <br>(<?php echo date("d-m-Y");?>)</B></h4>
            </div>
            <div class="icon">
            <i class="fa fa-wrench" aria-hidden="true"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6" style="display:none">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
             <h3><?php echo $ans1['p_service'];?></h3>

             <h4><B><a href="services/job_card/s_jobcard_view.php"><font color="#fff">PENDING JOB CARD / </font></a><br>(<?php echo date("d-m-Y");?>)</B></h4>
            </div>
            <div class="icon">
              <i class="fa fa-cogs" aria-hidden="true"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6" style="display:none">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><i class="fa fa-inr" aria-hidden="true"></i><?php echo $ans2['pd'];?></h3>

              <h4 style="font-variant:small-caps"><B>PURCHASE / <br><?php echo $monthName; ?></B></h4>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6" style="display:none">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
             <h3><i class="fa fa-inr" aria-hidden="true"></i><?php echo $ans3['sd'];?></h3>

              <h4 style="font-variant:small-caps"><B> BILLING (SALES) / <br><?php echo $monthName; ?></B></h4>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
		  
        </div>
		  <div class="box-body">
		    <div class="col-md-2">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
			<a href="services/job_card/s_jobcard_no.php">
				<H5 ><B style="color:white">CREATE NEW JOB CARD </B></h5>
				&nbsp;<br><br>
				<br>
              <div class="icon">
            <i class="fa fa-car" aria-hidden="true"></i>
            </div>
			</a>
            </div>
            <div class="icon" style="background-color:lightblue">
              <i class="ion ion-pie-albums"></i>
            </div>
          </div>
        <!-- ./col -->
      </div>
	  
	  
		
		 <div class="col-md-2">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
			
			<?php
			$DisplayCDate=date('d-m-Y');
			$CDate=date('Y-m-d');
			
			$aq="select * from s_job_card where jcard_status='Open' and jdate='$CDate'";
			$cds=mysqli_query($conn,$aq);
			$COpen=mysqli_num_rows($cds);
			
			?>
				<h3><?php echo $COpen;?></h3>
              <h4 style="font-variant:small-caps"><B><a href="services/job_card/s_jobcard_view_from_dashboard_open.php" target="_blank"> <font color="white">Jobcard Open</font></a><br><?php echo $DisplayCDate; ?></B></h4>
            </div>
            <div class="icon">
              <i class="ion ion-pie-albums"></i>
            </div>
          </div>
        <!-- ./col -->
      </div>
	  
	  
	   <div class="col-md-2">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
			<?php
			$aqw="select * from s_job_card where jcard_status='Ready To Delivery' and jdate='$CDate'";
			$cd=mysqli_query($conn,$aqw);
			$count=mysqli_num_rows($cd);
			
			?>
				<h3><?php echo $count;?></h3>
              <h5 style="font-variant:small-caps"><B><a href="services/job_card/s_jobcard_view_from_dashboard_ready.php" target="_blank"> <font color="white"> Jobcard Ready To Delivery</font></a><br><?php echo $DisplayCDate; ?></B></h5>
            </div>
            <div class="icon" style="background-color:lightblue">
              <i class="ion ion-pie-albums"></i>
            </div>
          </div>
        <!-- ./col -->
      </div>
	   <div class="col-md-2">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
			<?php
			$aq1="select * from s_job_card where jcard_status='Close' and jdate='$CDate' and FranchiseeId='".$_SESSION['FranchiseeId']."'";
			$cds1=mysqli_query($conn,$aq1);
			$Counts=mysqli_num_rows($cds1);
			
			?>
				<h3><?php echo $Counts;?></h3>
                          <h4 style="font-variant:small-caps"><B><a href="services/job_card/s_jobcard_view_from_dashboard_closed.php" target="_blank"> <font color="white"> Jobcard Close</font></a><br><?php echo $DisplayCDate; ?></B></h4>
            </div>
            <div class="icon">
              <i class="ion ion-pie-albums"></i>
            </div>
          </div>
        <!-- ./col -->
      </div>
	  <div class="col-md-2">
          <!-- small box -->
          <div class="small-box bg-red"style="background-color:#F0FFFF">
            <div class="inner">
			<?php
			if($ans3['sd']!='')
			{
			?>
              <h3>Rs.<?php echo $ans3['sd']; ?></h3>
			<?php
			}
			else
			{
			?>
			<h3>Rs.0.00</h3>
			<?php
			}
			?>

              <h4 style="font-variant:small-caps"><B><a href="store/sales/sales_invoice_view.php" target="_blank"> <font color="white">Accessories Sale  </font></a> <br><?php echo $monthName; ?></B></h4>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
          </div>
        </div>
		<div class="col-md-2">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
			<?php
			// echo $dxsa['jd']!='';
			if($dxsa['jd']!='')
			{
			?>
              <h3>Rs.<?php echo $dxsa['jd'];?></h3>
			  <?php
			}
			else
			{
			?>
			<h3>Rs.0.00</h3>
			<?php
			}
			?>
             
              <h4 style="font-variant:small-caps"><B><a href="store/final_bill/f_bill_view.php" target="_blank"> <font color="white">Jobcard Sales Bill</font></a> <br><?php echo $monthName; ?></B></h4>
            </div>
            <div class="icon">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </div>
          </div>
        </div> 
	   </div>
			   <div class="box-body">
	         
	       <div class="col-md-2">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
			<?php
				// $myautocart_tidi = new mysqli("localhost", "root", "", "myautocart_tidi"); 
				$mtr="select count(id) AS count from myautocart_service_bookings where vendor_id='".$_SESSION['VendorId']."' AND status='Active'";
				$mya=mysqli_query($conn,$mtr);
				$rto=mysqli_fetch_array($mya);
				$ert=$rto['count'];
			?>
				<h3><?php echo $ert; ?></h3>
                          <h4 style="font-variant:small-caps"><B><a href="services/myautocart_details/autocart_jobcart_view.php" target="_blank"> <font color="white"> Service Bookings</font></a><br><?php echo $DisplayCDate; ?></B></h4>
            </div>
            <div class="icon">
              <i class="ion ion-pie-albums"></i>
            </div>
          </div>
        <!-- ./col -->
      </div>
		
		  <div class="col-lg-4 col-xs-6" hidden>
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
			<?php
			if($ans3['sd']!='')
			{
			?>
              <h3>Rs.<?php echo $ans3['sd'];?></h3>
			  <?php
			}
			else
			{
			?>
			<h3>Rs.0.00</h3>
			<?php
			}
			?>

              <h4 style="font-variant:small-caps"><B><a href="store/sales/sales_invoice_view.php" target="_blank"> <font color="white">Sales </font></a> <br><?php echo $monthName; ?></B></h4>
            </div>
            <div class="icon">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </div>
          </div>
        </div>
</div>

      <!-- /.row -->
      <!-- Main row -->
	
    <section class="content container-fluid">
	
	
      <!--Print Satrt--!>
	  <div class="row">
        <!-- left column -->		
        <div class="col-md-12">            
            <div class="box">
            			
            <!-- /.box-header -->
            <div class="box-body ex3">
              <table id="" class="table table-bordered table-striped" align="left">
				<thead>                
               <h4>  Vehicle Service Status with Promised Delivery Time </h4>   
                </thead>
                
				<thead>
                <tr>
                  <th>S.No</th>
                  <th>Job Card Number</th>
				  <th>Customer Name</th>
				  <th>Phone No</th>
				  <th>Vehicle Number</th>
				  <th>Vehicle Model</th>
				  <th>Delivery Date</th>
				  <th>Delivery Time</th>
				  <th hidden>Service View</th>
				  
				  
				  </tr>
                </thead>
                <tbody>
				<?php
				$i=0;
			   
			    $ss="select * from s_job_card where jcard_status='Open' and FranchiseeId='".$_SESSION['FranchiseeId']."'  order by id desc";
				
				$Ess=mysqli_query($conn,$ss);
				while($FEss=mysqli_fetch_array($Ess))
				{
					$edcr="select * from a_customer_vehicle_details where vehicle_no='".$FEss['vehicle_no']."'";
					$edar=mysqli_query($conn,$edcr);
					$wsxr=mysqli_fetch_array($edar);

                    $svm="select * from master_vehicle where Id='".$wsxr['VehicleModel']."'";
                    $Esvm=mysqli_query($conn,$svm);
                    $FEsvm=mysqli_fetch_array($Esvm);
					$i++;

				?>
              
                <tr>
                  <td><?php echo $i;  ?></td>
				  <td><?php echo $FEss['job_card_no']; ?></td>
				  <td><?php echo $FEss['sname']; ?></td>
				  <td><?php echo $FEss['smobile']; ?></td>
				  <td><?php echo $FEss['vehicle_no'];  ?></td>
				  <td><?php echo $FEsvm['VehicleModel'];  ?></td>
				  <td><?php echo date("d-m-Y", strtotime($FEss['DeliveryDate']));?></td>
				  <td><?php echo $FEss['DeliveryTime']; ?></td>	
				  <td hidden><a href="daily_report_report_print.php?JobcradId=<?php echo $FEss['id']; ?>" target="_blank">Service view</a></td>				  
                </tr>
				<?php				
			      }				
				?>
				<tr>
                  <td colspan="5" align="right"><?php //echo $tc; ?></td>
				  <td colspan="1" align="right"><?php //echo $td;  ?></td>
                  </tbody>                
              </table>
            </div>
			
            <!-- /.box-body -->
          </div>
        </div>
      
      
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          
          
          
          <!-- /.nav-tabs-custom -->

          <!-- Chat box -->
          
          <!-- /.box (chat box) -->

          <!-- TO DO List -->
          
          <!-- /.box -->

          <!-- quick email widget -->
         

        </section>
		
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
         
          <!-- /.box -->

          <!-- solid sales graph -->
          
          <!-- /.box -->

          <!-- Calendar -->
         
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("footer.php"); ?>

</div>
 <?php include("includes_db_js.php"); ?>
</body>
</html>
