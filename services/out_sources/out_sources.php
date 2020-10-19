<?php
error_reporting(0);
ob_start();
include("../../includes.php");
include("../../redirect.php");


$p="select * from s_spare_prepick";
$Ep=mysqli_query($conn,$p);
$Fp=mysqli_fetch_array($Ep);
$n=mysqli_num_rows($Ep);
$n1=$n+1;
$pn="SP".$n1;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>

	<script>
	
	 function getamt(val)
	 {
	var Amount=parseFloat(document.getElementById("Amount").value);
	var Tax=parseFloat(document.getElementById("Tax").value);
	var TaxTotalAmount=(Tax/100)*Amount;
	document.getElementById("TaxTotalAmount").value=TaxTotalAmount.toFixed(2);
	var TotalAmount=Amount+TaxTotalAmount;
	document.getElementById("TotalAmount").value=TotalAmount.toFixed(2);
	 }
	 
  
function getmrp(){ 
    var qty = 0;
    var inputs = document.getElementById('Outsources').value;


$.ajax({
      type:'post',
        url:'getamount.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("Amount").value=msg;
       
       }
 });

}


</script>

  
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
        Painting 
        <small>Services</small>
      </h1>
     </section>
  
    <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
              This  <strong>Spares Prepick Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			<div class="alert alert-danger">
              <b>Spares Prepick Deleted Successfully!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?></div>
				
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="outsources_addQ.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
			
		 	$nm="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."' and id='".$_REQUEST['JobcardId']."'"; 
			$abc=mysqli_query($conn,$nm);
			$temp=mysqli_fetch_array($abc);
			?>
              <div class="box-body">
			  <div class="hidden">
                <div class="form-group col-sm-4">
                  <label for="Branch">Pre Pick Number</label>
                  <input type="text" class="form-control" name="pre_pick_no" id="pre_pick_no" value="<?php echo $pn;?>" readonly="true" required>
                </div>
				 </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Date </label>
                  <input type="text" value="<?php echo date("Y-m-d")?>" class="form-control" name="Date" id="Date" readonly required>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Job Card Number</label>
                 <input class="form-control" name="job_card_no" id="job_card_no"   value="<?php echo $temp['job_card_no'] ?>" readonly onChange="getvehicle();getmobiles();getnames()" required>
				  <input type="hidden" class="form-control" name="JobcardId" id="JobcardId"   value="<?php echo $temp['id'] ?>" readonly required>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Number</label>
                  <input type="text" class="form-control" name="vehicle_no" value="<?php echo $temp['vehicle_no'] ?>" id="vehicle_no" placeholder="Vehicle Number" readonly="true">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Mobile</label>
                  <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $temp['smobile'] ?>" placeholder="Mobile" readonly="true">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
                  <input type="text" class="form-control" name="name" id="name" value="<?php echo $temp['sname'] ?>" placeholder="Customer Name" readonly="true">
                </div>   
				</div>
				  <div class="box-body">
					<div class="form-group col-sm-4">
                  <label for="Branch">Painting Details</label>
				  <select class="form-control" id="Outsources" name="Outsources" autofocus="focus"  onChange="getmrp()">
				   <option value="">--Select The Value--</option>
                   <?php 
				  $ssc="select * from m_service_type where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['stype']; ?></option>
				  <?php } ?>
				  </select>
                </div>	
				<div class="form-group col-sm-4">
                  <label for="Branch">Amount</label>
                  <input type="text" class="form-control" name="Amount" id="Amount" placeholder="Amount">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Tax %</label>
                  <select type="text" class="form-control" name="Tax" id="Tax" onChange="getamt()">
				   <option value="">--Select The Value--</option>
                   <?php 
				  $ssc="select * from m_gst where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['igst']; ?>"><?php echo $FEssc['igst']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Tax Amount</label>
                  <input type="text" class="form-control" name="TaxTotalAmount" id="TaxTotalAmount" readonly placeholder="Tax Amount">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Total Amount</label>
                  <input type="text" class="form-control" name="TotalAmount" id="TotalAmount" readonly placeholder="Total Amount">
                </div>
				 </div>
				  <div class="box-body">
				   <div class="box-footer">
				 <div class="form-group col-sm-16">
                  <input type="submit" class="btn btn-info pull-right" name="AddSources" id="AddSources" value="Add">
                </div> </div>
				 </div>
			  </br>
			   </br>
				 <div class="box-body">
				<div class="form-group col-sm-12">
				<div>
					<table border="1" width="95%"  style="background-color:#F0F8FF" >
                <thead>
                <tr>
				<th style="height:40px;width:90px">S.No</th>
                <th style="width:300px">Painting Details</th>
				<th style="width:130px">Amount</th>
				<th  style="width:70px">Tax %</th>
				<th style="width:130px">Taxamount</th>
				<th style="width:130px">Total Amount</th>
                <th style="width:50px">Action</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				$i=0;
				 $s="select * from s_outsources_temp where JobcardId='".$_REQUEST['JobcardId']."' and FranchiseeId='".$_SESSION['FranchiseeId']."'";
				$Es=mysqli_query($conn,$s);
				while($FEs=mysqli_fetch_array($Es))
				{
				$i++;	
						$ssc="select * from m_service_type where id='".$FEs['Outsources']."'";  
						$Essc=mysqli_query($conn,$ssc);
						while($FEssc=mysqli_fetch_array($Essc))
						{
				?>
                <tr>
				<td style="height:40px"><?php echo $i;  ?></td>
                <td><?php echo $FEssc['stype'];  ?></td>
				<td><?php echo $FEs['Amount'];  ?></td>
				<td><?php echo $FEs['Tax'];  ?></td>
				<td><?php echo $FEs['TaxTotalAmount'];  ?></td>
				<td><?php echo $FEs['TotalAmount'];  ?></td>
				<td><a href="outsources_addQ.php?Act=Del&&JobcardId=<?php echo $FEs['JobcardId']; ?>&&Id=<?php echo $FEs['Id']; ?>&&job_card_no=<?php echo $_REQUEST['job_card_no']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
                </tr>
				<?php 
				}
				}
				 ?>
                  </tbody>
                
              </table>
					</div>
				</div>
						
            </div>
				<div class="box-body">
				<div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
                  <input type="date" class="form-control" name="OutsourcesDate" id="OutsourcesDate" value="<?php echo date('Y-m-d'); ?>">
                </div>
				<div class="form-group col-sm-4">
			    <label for="catname">Painter Name</label>
                <select class="form-control" name="PainterName"  id="PainterName">
			    <option value="">--select The Name</option>
				<?php 
				$mob1="select * from m_painters_master where status='Active'";
				$mobi1=mysqli_query($conn,$mob1);
				while($Pain=mysqli_fetch_array($mobi1))
				{
				?>	
				<option value="<?php echo $Pain['Id'];?>"><?php echo $Pain['PainterName'];?></option>
				<?php
				}
				?>
				</select>
                </div>
				<div class="form-group col-sm-4">
                <label for="Branch">Note</label>
                <textarea class="form-control" name="Note" id="Note"  placeholder="Note"></textarea>
                </div>
				 </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

				  <div class="box-body">
				   <div class="box-footer">
				 <div class="form-group col-sm-16">
                  <input type="submit" class="btn btn-info pull-right" name="Finish" id="Finish" value="Finish">
                </div> </div>
				 </div>
   
	</section>
    <!-- /.content -->	
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