<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");


 $see="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
			$absc=mysqli_query($conn,$see);
			$var=mysqli_fetch_array($absc);
			$Seion=$var['franchisee_id'];	
			
$p="select * from job_card_no where id='1'";
$Ep=mysqli_query($conn,$p);
$Fp=mysqli_fetch_array($Ep);

$pn=$Seion."-".$Fp['jcn'];

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
        Service Booking Details
        <small>Service</small>
      </h1>
     </section>
<div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
                <strong>Supplier Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			  <div class="alert alert-danger">
              <b> Supplier Deleted Successfully!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  <?php if($_REQUEST['a']!="") {?> 
			  <div class="alert alert-warning">
                 Supplier <b>already</b> exist ! <i class="fa fa-warning" style="font-size:30px;color:white"></i>
              </div> <?php } ?></div>
<script>
function Delete_Click() {
    var strconfirm = confirm("Are you sure you want to delete?");
    if (strconfirm == true) {
        return true;
    }
	else
		return false;
}  

  function tabE(obj,e){ 
   var e=(typeof event!='undefined')?window.event:e;// IE : Moz 
   if(e.keyCode==13){ 
     var ele = document.forms[0].elements; 
     for(var i=0;i<ele.length;i++){ 
       var q=(i==ele.length-1)?0:i+1;// if last element : if any other 
       if(obj==ele[i]){ele[q].focus();break} 
     } 
  return false; 
   } 
  } 
  
  function sumgst()
{
    var total_amount= parseFloat(document.getElementById("amount").value); 
	if(document.getElementById("gst").value=='')
	{
		var gst=0;
	}
	else
	{
		 var gst=parseFloat(document.getElementById("gst").value);
	}
	
	var gst=(gst/100)*total_amount;
	var including_gst=total_amount+gst;
	document.getElementById("Gamount").value=gst.toFixed(2);
	document.getElementById("tamount").value=including_gst.toFixed(2);
}


  
</script>	 
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="autocart_jobcart_deatils_act.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
							
<div class="box-body">
			  <?php   
			  $host_name = "localhost";
                $user_name= "root";
                $password= "";
                $database1 = "myautocart";
                //$database2 = "myautocart_tidi";
                $autocart = mysqli_connect($host_name ,$user_name,$password,$database1);
                //$tidi = mysqli_connect($host_name ,$user_name,$password,$database2);
				$i=0;
                 $sql = "SELECT * FROM myautocart_service_bookings where id='".$_REQUEST['sid']."'";
                  $result = mysqli_query($conn, $sql);
				 $Fct=mysqli_fetch_array($result);
			
					$Esx="select * from tbl_customer where customer_id='".$Fct['customer_id']."'";
					$ews=mysqli_query($autocart, $Esx);
					$Qwa=mysqli_fetch_array($ews);
					
					$Esx1="select * from tbl_vendor where vendor_id='".$Fct['vendor_id']."'";
					$ews1=mysqli_query($autocart, $Esx1);
					$Qwa1=mysqli_fetch_array($ews1);
					
					$Esx2="select * from tbl_services where id='".$Fct['vendor_service_id']."'";
					$ews2=mysqli_query($autocart, $Esx2);
					$Qwa2=mysqli_fetch_array($ews2);
					
					$Esx3="select * from tbl_vendor_services where service_id='".$Qwa2['id']."'";
					$ews3=mysqli_query($autocart, $Esx3);
					$Qwa3=mysqli_fetch_array($ews3);
					
					$Esx4="select * from tbl_category where category_id='".$Fct['category_id']."'";
					$ews4=mysqli_query($autocart, $Esx4);
					$Qwa4=mysqli_fetch_array($ews4);
									
					
					$Esx9="select * from tbl_service_invoice_details where vehicle_no='".$Fct['vehicle_number']."'";
					$ews9=mysqli_query($autocart, $Esx9);
					$Qwa9=mysqli_fetch_array($ews9);
					
					$Esx6="select * from tbl_cust_service_vehicle_details where id='".$Qwa9['appointment_id']."'";
					$ews6=mysqli_query($autocart, $Esx6);
					$Qwa6=mysqli_fetch_array($ews6);
					
					
					$Esx5="select * from tbl_segment where id='".$Qwa6['segment_id']."'";
					$ews5=mysqli_query($autocart, $Esx5);
					$Qwa5=mysqli_fetch_array($ews5);
					
				    $Esx7="select * from tbl_model where id='".$Qwa6['model']."'";
					$ews7=mysqli_query($autocart, $Esx7);
					$Qwa7=mysqli_fetch_array($ews7);
					
					  $Esx8="select * from tbl_make where id='".$Qwa6['make_brand']."'";
					$ews8=mysqli_query($autocart, $Esx8);
					$Qwa8=mysqli_fetch_array($ews8);
					
					if($_REQUEST['job_card_no']!="")
			{
			$ps=$_REQUEST['job_card_no'];
			}
			else
			{
			 $ps=$pn; 
			}
?>
			  <div class="form-group col-sm-4">
			   <label for="catname">Job Card Number</label>
				 <input type="text" class="form-control" name="job_card_no" id="job_card_no" value="<?php echo $ps; ?>" required readonly="true">
              
				</div>
			  
                <div class="form-group col-sm-4">
                  <label for="Branch">Service Booking.No</label>
                  <input type="text" class="form-control" name="sname" id="sname" value="<?php echo $Fct['service_order_no'] ;?>" placeholder="Service Booking No" onKeyPress="return tabE(this,event)" readonly>
                  <input type="hidden" class="form-control" name="bookingid" id="bookingid" value="<?php echo $Fct['id'] ;?>" placeholder="Service Booking No" onKeyPress="return tabE(this,event)" readonly>
                </div>
                 <div class="form-group col-sm-4">
                  <label for="Branch">Vendor Name </label>
                 <input type="text" class="form-control" name="vendor_name" id="vendor_name" value="<?php echo $Qwa1['vendor_name'] ;?>" placeholder="Vendor" onKeyPress="return tabE(this,event)">
                </div>
               <div class="form-group col-sm-4 ">
                  <label for="Branch">Customer Name</label>
                 <input type="text" class="form-control" name="cname" value="<?php echo $Qwa['f_name'] ;?>" id="cname" placeholder="Name" onKeyPress="return tabE(this,event)" readonly>
                 <input type="hidden" class="form-control" name="lastname" value="<?php echo $Qwa['l_name'] ;?>" id="lastname" placeholder="Name" onKeyPress="return tabE(this,event)" readonly>
                 <input type="hidden" class="form-control" name="mobile" value="<?php echo $Qwa['mobile'] ;?>" id="mobile" placeholder="Name" onKeyPress="return tabE(this,event)">
                 <input type="hidden" class="form-control" name="address" value="<?php echo $Qwa['address'] ;?>" id="address" placeholder="Name" onKeyPress="return tabE(this,event)">
                 <input type="hidden" class="form-control" name="email" value="<?php echo $Qwa['email'] ;?>" id="email" placeholder="Name" onKeyPress="return tabE(this,event)">
                </div>
				
					<div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
                  <input type="text" class="form-control" name="d" id="d" value="<?php echo $Fct['appointment_date'] ;?>"  onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Time</label>
                  <input type="text" class="form-control" name="t" id="t" value="<?php echo $Fct['appointment_time'] ;?>" onKeyPress="return tabE(this,event)">
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Service Name</label>
                  <input type="text" class="form-control" name="service_name" value="<?php echo $Qwa2['service_name'] ;?>" id="service_name" placeholder="Service Name" onKeyPress="return tabE(this,event)"readonly>
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Service Amount</label>
                  <input type="text" class="form-control" name="amount" id="amount" value="<?php echo $Qwa3['amount'] ;?>" placeholder="Service Amount" onKeyPress="return tabE(this,event)" readonly>
                </div>
					
			
				<div class="form-group col-sm-4">
                  <label for="Branch">GST %</label>
                  <select type="text" class="form-control" name="gst" id="gst" onchange="sumgst();"  placeholder="Service Amount" onKeyPress="return tabE(this,event)" >
				  <option>--Select the gst--</option>
				   <?php 
				$mob1="select * from m_gst";
				$mobi1=mysqli_query($conn,$mob1);
				while($mobil1=mysqli_fetch_array($mobi1))
				{
				?>	
				<option value="<?php echo $mobil1['gst'];?>"><?php echo $mobil1['gst'];?></option>
				<?php
				}
				?>
				  </select>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Gst Amount</label>
                  <input type="text" class="form-control" name="Gamount" id="Gamount" placeholder="Gst Amount" onKeyPress="return tabE(this,event)" readonly>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Total Amount</label>
                  <input type="text" class="form-control" name="tamount" id="tamount" placeholder="Total Amount" onKeyPress="return tabE(this,event)" readonly>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Category</label>
                 <input type="text" class="form-control" name="category_name" id="category_name" value="<?php echo $Qwa4['category_name'] ;?>" placeholder="Category" onKeyPress="return tabE(this,event)"readonly>
                </div>
						
				<div class="form-group col-sm-4">
                  <label for="Branch">Segment</label>
                 <input type="text" class="form-control" name="segment" id="segment" value="<?php echo $Qwa5['segment'] ;?>" placeholder="Segment" onKeyPress="return tabE(this,event)" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Vehicle.No</label>
                 <input type="text" class="form-control" name="vno" id="vno" value="<?php echo $Qwa9['vehicle_no'] ;?>"  placeholder="No" onKeyPress="return tabE(this,event)" readonly>
                 <input type="hidden" class="form-control" name="vehicle_type" id="vehicle_type" value="<?php echo $Qwa6['vehicle_type'] ;?>"  placeholder="No" onKeyPress="return tabE(this,event)" readonly>
                 <input type="hidden" class="form-control" name="year" id="year" value="<?php echo $Qwa6['year'] ;?>"  placeholder="No" onKeyPress="return tabE(this,event)" readonly>
                 <input type="hidden" class="form-control" name="make" id="make" value="<?php echo $Qwa8['make'] ;?>"  placeholder="No" onKeyPress="return tabE(this,event)" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Model</label>
                 <input type="text" class="form-control" name="vmodel1" id="vmodel1" value="<?php echo $Qwa7['model'] ;?>"  placeholder="Model" onKeyPress="return tabE(this,event)"readonly>
                 <input type="hidden" class="form-control" name="vmodel" id="vmodel" value="<?php echo $Qwa7['id'] ;?>"  placeholder="Model" onKeyPress="return tabE(this,event)"readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Delivery Date</label>
                 <input type="date" class="form-control" name="ddate" id="ddate"    onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Delivery Time</label>
                 <input type="time" class="form-control" name="dtime" id="dtime"   onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Service Engineer</label>
                 <select type="text" class="form-control" name="sengineer" id="sengineer"   onKeyPress="return tabE(this,event)">
				 <option>--Select The Name--</option>
                     <?php 
				$mob1="select * from h_employee where vendor_id='".$_SESSION['VendorId']."'";
				$mobi1=mysqli_query($conn,$mob1);
				while($mobil1=mysqli_fetch_array($mobi1))
				{
				?>	
				<option value="<?php echo $mobil1['id'];?>"><?php echo $mobil1['ename'];?></option>
				<?php
				}
				?>
				 </select>
                </div>
				
				
		
				
				
            </div>
       <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		

	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" >Submit</button>
                </div>    
         </div>
    </form>
	</section>
    <!-- /.content -->
	
	
	
</div>
<div class="control-sidebar-bg"></div>
  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("../../footer.php"); ?>
  <!--footer End-->
    <div class="control-sidebar-bg"></div>
</div>
 <?php include("../../includes_db_js.php"); ?>
 

 
</body>
</html>
