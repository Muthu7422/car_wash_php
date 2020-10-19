<?php
error_reporting(0);
session_start();
include("../../includes.php");
include("../../redirect.php");

$see="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'"; 
			$absc=mysqli_query($conn,$see);
			$var=mysqli_fetch_array($absc);
			$Seion=$var['franchisee_id'];			 
		
// $p="select * from s_job_card where FranchiseeId='".$_SESSION['FranchiseeId']."'";
// $Ep=mysqli_query($conn,$p);
// $Fp=mysqli_fetch_array($Ep);
// $n=mysqli_num_rows($Ep);
// $n1=$n+1;
// $pn=$Seion."JCN".$n1;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
  <style>
div.ex3 {
   border: 1px solid black;
  outline-style: solid;
  outline-color: black;
  outline-width: thin;
}
</style>


</head>
<body class="hold-transition skin-blue sidebar-mini" style="overflow: scroll;">
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
       Edit Job Card 
        <small>Services</small>
      </h1>
     </section>
     <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
              This  <strong>Job Card Details Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			  <div class="alert alert-warning">
               Service <b>Deleted</b> Successfully from this Job Crd!  <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?></div>
   <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="jobcard_edit_add.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
			<?php
           $nm="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'";
			$abc=mysqli_query($conn,$nm);
			$temp=mysqli_fetch_array($abc);
			
			
			$ps=$_REQUEST['job_card_no'];
		

			 $mob="select * from a_customer where mobile1='".$temp['smobile']."'"; 
			$mobi=mysqli_query($conn,$mob);
			$mobil=mysqli_fetch_array($mobi);
		
			 $mob1="select * from a_customer_vehicle_details where vehicle_no='".$temp['vehicle_no']."'";
			$mobi1=mysqli_query($conn,$mob1);
			$mobil1=mysqli_fetch_array($mobi1); 

			$mob15="select * from master_vehicle where Id='".$mobil1['VehicleModel']."'";
			$mobi5=mysqli_query($conn,$mob15);
			$mobil5=mysqli_fetch_array($mobi5); 
			
			
						?>
             <div class="box-body">			
			    <div class="form-group col-sm-4">
			   <label for="catname">Job Card Number</label>
				 <input type="text" class="form-control" name="job_card_no" id="job_card_no" value="<?php echo $ps; ?>" required readonly="true">
                 <input type="text" class="form-control hidden" name="job_card_id" id="job_card_id" value="<?php echo $temp['id']; ?>" required readonly="true">
				</div>
				 <div class="form-group col-sm-4">
			   <label for="catname">Date</label>
			      <input type="date" class="form-control" name="jdate" id="jdate"  value="<?php echo $temp['jdate']; ?>" onKeyPress="return tabE(this,event)"  required>
				</div>										 
				 <div class="form-group col-sm-4">
			     <label for="catname">Customer Name</label>
			     <input type="text" class="form-control" name="sname"  id="sname"  value="<?php echo $temp['sname'];?>" placeholder="Customer Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase"  readonly="true">
				 </div>							 
				 <div class="form-group col-sm-4">
			    <label for="catname">Customer Address</label>
			     <input type="txt" class="form-control" name="saddress" id="saddress"  placeholder="Address" value="<?php echo $temp['saddress'];?> <?php echo $mobil['addr'];?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase"  readonly="true">
                    </div>                
				<div class="form-group col-sm-4">
			     <label for="catname">Customer Mobile</label>
			     <input type="text" class="form-control" name="smobile" value="<?php echo $temp['smobile'];?>" id="smobile" onKeyPress="return tabE(this,event)"  placeholder=" Mobile No" readonly="true">
                 </div>
				<div class="form-group col-sm-4">
			     <label for="catname">Customer EMail</label>
			     <input type="text" class="form-control" id="smail" name="smail" value="<?php echo $temp['cemail'];?> <?php echo $mobil['email'];?>"  onKeyPress="return tabE(this,event)"  placeholder=" Mobile No" readonly="true">
                 </div>					 
				<div class="form-group col-sm-3">
			    <label for="catname">Registration No</label>
                <select class="form-control" name="vehicle_no"  id="vno"  onChange="fnCarModel()"  required readonly>
			    <option value="<?php echo $temp['vehicle_no'];?>"><?php echo $temp['vehicle_no'];?></option>
				</select>
                </div>
			
				<div class="form-group col-sm-3">
			     <label for="catname">Vehicle Model</label>
			     <input type="text" class="form-control" id="CarModel" name="CarModel"  onKeyPress="return tabE(this,event)" value="<?php echo $mobil5['VehicleModel'];?>"  placeholder=" Mobile No" readonly="true">
                 </div>	
				 	 
				<div class="form-group col-sm-3">
			    <label for="catname">KMS Driven</label>
			    <input type="text" class="form-control" name="kms" id="kms"  placeholder="KMS Driven" value="<?php echo $temp['kms'];?>" onKeyPress="return tabE(this,event)" readonly style="text-transform:uppercase">
				</div>
				
				  <div class="form-group col-sm-3 hidden">
			     <label for="catname">Customer Ledger Id</label>
			     <input type="text" class="form-control" name="CLI"  id="CLI"  value="<?php echo $mobil['LedgerId'];?>" placeholder="Customer Ledger Id" onKeyPress="return tabE(this,event)" style="text-transform:uppercase"  readonly="true">
				 </div>
				</div>
	
			<div class="box-body ex3" id="serv">
				<h2>Service Details </h2>
			 <div class="hidden">
			   <label for="catname">Service Type</label>
                <select class="form-control" id="stype" name="stype" onKeyPress="return tabE(this,event)" onChange="getamount()">
				<option value="">--Select Service--</option>
				  <?php 
				  if($mobil['id']!='')
				  {
				  $mob12="select * from a_customer_vehicle_details where cust_no='".trim($mobil['id'])."'";
				$mobi12=mysqli_query($conn,$mob12);
				$mobil12=mysqli_fetch_array($mobi12);
				  }
				  else
				  {
					 $mob12="select * from a_customer_vehicle_details where vehicle_no='".trim($temp['vehicle_no'])."'";
				     $mobi12=mysqli_query($conn,$mob12);
				     $mobil12=mysqli_fetch_array($mobi12);  
				  }
					
				  $mvs="select * from master_vehicle_segment where VehicleSegment='".trim($mobil12['VehicleSegment'])."'";
				  $mvq=mysqli_query($conn,$mvs);
				  $mvf=mysqli_fetch_array($mvq);
				  
				  $ssc="select * from m_service_type where status='Active' and v_type='".trim($mvf['Id'])."'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['stype']; ?>"><?php echo $FEssc['stype']; ?></option>
				  <?php } ?>
				  </select>
                 </div>
				 <div class="hidden">
			   <label for="catname">Service Amount</label> 
                  <input type="txt" class="form-control" name="st_amt" id="st_amt"  placeholder="Service Amount" onKeyPress="return tabE(this,event)"  readonly="true">

				</div>
				 <div class="hidden">
			   <label for="catname">Qty</label>
           
			    <input type="txt" class="form-control" name="qty" id="qty" value="1"  placeholder="Qty" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                </div>
				
				<div class="hidden">
			    <label for="catname">Customer Special Request / comments</label>
				<textarea  class="form-control" name="remarks" id="remarks"  placeholder="Customer Special Request / comments"   onKeyPress="return tabE(this,event)" style="text-transform:uppercase"></textarea>
				</div>
				<div class="hidden">
			    <label for="catname">Repair Advice / action Taken</label>
                <textarea class="form-control" name="remarks_1" id="remarks_1"  placeholder="Repair Advice / action Taken"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase"></textarea>
				</div>
				
					 <div class="hidden">
			   <label for="catname"></label>
             
                  <label for="Branch">&nbsp;</label>
                  <input type="Submit" placeholder="Add" name="AddService" id="AddService" style="background-color:#37B8F8; color:#000000" value="Add Service"  class="form-control " >
            
				  </div>
				<div class="form-group col-sm-8">
				<div>
					<table border="1" width="100%"  style="background-color:#F0F8FF" >
                <thead>
                <tr>
				   <th style="height:40px;text-align:center"> S.No </th>
                   <th style="text-align:center"> Service </th>
				   <th style="text-align:center"> Service Amount </th>
				   <th style="text-align:center"> Qty </th>
						  
				   
                </tr>
                </thead>
                <tbody>
				
				 
				<?php 
				$i=0;
				 $s="select * from s_job_card_sdetails where job_card_no='".$temp['id']."' "; 
				$Es=mysqli_query($conn,$s);
				while($FEs=mysqli_fetch_array($Es))
				{
					$i++;
					
				?>
                <tr>
				  <td style="padding:15px;text-align:left"><?php echo $i;  ?></td>
                  <td style="padding-left:5px;text-align:left"> <?php echo $FEs['service_type'];  ?></td>
				  <td style="padding-right:5px;text-align:right"><?php echo $FEs['st_amt'];  ?></td>
				  <td style="padding-right:5px;text-align:right"><?php echo $FEs['qty'];  ?></td>				 
			         </tr>
				<?php 
				
				}
				 ?>
                  </tbody>
                
              </table>
					</div>
				</div>
				<?php
				$ps="select IFNULL(sum(package_amt),0) as package_amt from s_job_card_pdetails where job_card_no='".$temp['id']."'";
				$psb=mysqli_query($conn,$ps);
				$pamt=mysqli_fetch_array($psb);
				
				$pw="select IFNULL(sum(st_amt),0) as st_amt from s_job_card_sdetails where job_card_no='".$temp['id']."'";
				$pse=mysqli_query($conn,$pw);
				$samt=mysqli_fetch_array($pse);
				
				$total=$pamt['package_amt']+$samt['st_amt'];
				?>
				 </div>
				 <br/>
                	
				<?php
				$ps="select IFNULL(sum(package_amt),0) as package_amt from s_job_card_pdetails where job_card_no='".$temp['id']."'";
				$psb=mysqli_query($conn,$ps);
				$pamt=mysqli_fetch_array($psb);
				
			    $pw="select IFNULL(sum(st_amt),0) as st_amt from s_job_card_sdetails where job_card_no='".$temp['id']."'"; 
				$pse=mysqli_query($conn,$pw);
				$samt=mysqli_fetch_array($pse);

				 $pw1="select IFNULL(sum(st_amt),0) as st_amt from s_job_card_recomdetails where job_card_no='".$temp['id']."'";
				$pse1=mysqli_query($conn,$pw1);
				$samt1=mysqli_fetch_array($pse1);
				
				$total=$pamt['package_amt']+$samt['st_amt'];
				?>
				
			
				
				
				
				
				
			

                	 <div class="box-body">			
				<div class="form-group col-sm-4">
			    <label for="catname">Total Service Amount(AED)</label>
                <input type="txt" class="form-control" name="total_amt" id="total_amt"  value="<?php echo $total; ?>" readonly onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>
				
				
				<div class="form-group col-sm-4">
			    <label for="catname"> Service Amount After VAT</label>
                <input type="txt" class="form-control" name="total_amt_agst" id="total_amt_agst"  value="<?php echo $temp['IncludeGst']; ?>" readonly onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>				
				<div class="form-group col-sm-4">
			    <label for="catname">Delivery Date</label>
                <input type="date" class="form-control" name="delivery_date" id="delivery_date" value="<?php echo $temp['jdate']; ?>"  onKeyPress="return tabE(this,event)">
				</div>
				<div class="form-group col-sm-4">
			    <label for="catname">Entry Time</label>
                <input type="" class="form-control" name="delivery_time" id="delivery_time"  value="<?php echo $temp['entry_time']; ?>" readonly  onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>
				
				<div class="form-group col-sm-4">
			    <label for="catname">Exit Time</label>
                <input type="time" class="form-control" name="delivery_time" id="delivery_time"  value="<?php echo $total; ?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>
				
			
				
			
              
					</div>
				
				 <br>
				<div class="form-group pull-right">
			    <label for="catname" class="col-sm-3 control-label"></label>
                  <label for="Branch">&nbsp;</label>
                  <input type="Submit" placeholder="Add" name="Exittime" id="Exittime" style="background-color:#37B8F8;color:#000000" value="Submit Job Card"  class="form-control" >
            	</div>
				</div>
				
			</div>
			
          <!-- /.box -->
       
	    <div class="box-footer">
                
                   
         </div> </div>
    </form>
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
