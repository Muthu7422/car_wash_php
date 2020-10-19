<?php
error_reporting(0);
session_start();
include("../../includes.php");
include("../../redirect.php");

		//$nm="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'";
		$nm="select * from s_job_card where id='".$_REQUEST['JobcardId']."'";
		$abc=mysqli_query($conn,$nm);
		$temp=mysqli_fetch_array($abc);			
		if($_REQUEST['job_card_no']!="")
		{
			$ps=$_REQUEST['job_card_no'];
		}
		else
		{
			$ps=$pn;
		}	
?>

<!DOCTYPE html>
<html>


<head>
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		<link rel="stylesheet" type="text/css" href="http://localhost/popup/popup-window.css" />
<script type="text/javascript" src="http://localhost/popup/jquery/jquery.js"></script>
<script type="text/javascript" src="http://localhost/popup/popup-window.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
  
<script type="text/javascript" src="//code.jquery.com/jquery-1.6.2.js"></script>
<script>

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
  
$(function() {
    $('.Selectall').click(function() {
        $('.check_box').prop('checked', this.checked);
    });
});
  
$(function() {
    $('.CheckAll').click(function() {
        $('.ck_box').prop('checked', this.checked);
    });
});  
</script>
   <script type="text/javascript">
 
</script>

	<script type="text/javascript" src="ajax.js"></script>
	<script type="text/javascript" src="ajax-dynamic-list.js">
	
	/************************************************************************************************************
	(C) www.dhtmlgoodies.com, April 2006
	
	This is a script from www.dhtmlgoodies.com. You will find this and a lot of other scripts at our website.	
	
	Terms of use:
	You are free to use this script as long as the copyright message is kept intact. However, you may not
	redistribute, sell or repost it without our permission.
	
	Thank you!
	
	www.dhtmlgoodies.com
	Alf Magne Kalleland
	
	************************************************************************************************************/	
	</script>
	
	<script type="text/javascript" src="ajax-dynamic-list1.js">	
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
        Check List        
      </h1>
     </section> 
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="s_job_card_addQ.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
				<div class="box-body">			
			    <div class="form-group col-sm-4">
			   <label for="catname">Job Card Number</label>
				 <input type="text" class="form-control" name="job_card_no" id="job_card_no" value="<?php echo $ps; ?>" required readonly="true">
                 <input type="hidden" class="form-control" name="JobcardId" id="JobcardId" value="<?php echo $temp['id']; ?>" required readonly="true">
				</div>
				 <div class="form-group col-sm-4">
			   <label for="catname">Date</label>
			      <input type="datetime" class="form-control" name="jdate" id="jdate"  value="<?php echo $temp['jdate']; ?>" onKeyPress="return tabE(this,event)" readonly required>
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
				 <?php 
				$scm="select * from a_customer_vehicle_details where vehicle_no='".trim($temp['vehicle_no'])."'";
				$Escm=mysqli_query($conn,$scm);
				$FEscm=mysqli_fetch_array($Escm);
				?>
									 
				<div class="form-group col-sm-4">
			    <label for="catname">Registration No</label>
				<input type="text" class="form-control" id="CarModel" name="CarModel"  onKeyPress="return tabE(this,event)" value="<?php echo $temp['vehicle_no'];?>"  placeholder=" Mobile No" readonly="true">

                
                </div>
				
				<div class="form-group col-sm-4">
			     <label for="catname">Car Model</label>
			     <input type="text" class="form-control" id="CarModel" name="CarModel"  onKeyPress="return tabE(this,event)" value="<?php echo $FEscm['VehicleBrand']."-".$FEscm['VehicleModel'];?>"  placeholder=" Mobile No" readonly="true">
                 </div>					
				
				
				<div class="form-group col-sm-4">
			     <label for="catname">Customer special requirement</label>
			     <input type="text" class="form-control" id="ParticularInstructions" name="ParticularInstructions"  onKeyPress="return tabE(this,event)" value="<?php echo $temp['ParticularInstructions'];?>" placeholder=" special Instructions" readonly="true">
                 </div>		

					<div class="form-group col-sm-4">
			     <label for="catname">SMS</label>
			     <select class="form-control" id="PSms" name="PSms"  onKeyPress="return tabE(this,event)" placeholder=" special Instructions" readonly="true" >
				 <option value="Enable">Enable</option>
				 <option value="Disable">Disable</option>
				 </select>
                 </div>		
				</div>
                 
	 <!-- Panel Start -->
	 <div class="box-body">
	   <div class="panel panel-primary"> 
		 <div class="panel-heading"><h3>Interior Cleaning </h3></div>
			<div class="panel-body">
									
			<div class="row">
			
			<div class="form-group col-sm-4">
			 <input type="checkbox" id="selectall" name="selectall" class="Selectall"><i style="font-size:20px;"> Select All</i></label>
			</div>
			
			 <div class="form-group col-sm-4">
			  <img src="../../images/dashboardfull.jpg" width="50px" height="50px"/> <label><input type="checkbox" class="check_box" id="DashBoardFull" name="DashBoardFull" value="1" ><i style="font-size:20px;"> Dash Board Fullv</i></label>
			 </div>
			  
			<div class="form-group col-sm-4">
			  <img src="../../images/cardoorpads.jpg" width="50px" height="50px"/>  <label><input type="checkbox" class="check_box" id="DoorPads" name="DoorPads" value="1"> <i style="font-size:20px;"> Door Pads</i></label>
			</div>

			<div class="form-group col-sm-4">
			  <img src="../../images/Doors & Top.jpg" width="50px" height="50px"/>  <label><input type="checkbox" class="check_box" id="Top" name="Top" value="1"> <i style="font-size:20px;"> Top</i></label>
			</div>
			  
			<div class="form-group col-sm-4">
			  <img src="../../images/acgrill.jpg" width="50px" height="50px"/> <label><input type="checkbox" class="check_box" id="ACGrill" name="ACGrill" value="1"> <i style="font-size:20px;"> A/C Grill</i></label>
			</div>
			  
			<div class="form-group col-sm-4">
			  <img src="../../images/doorpadtray.jpg" width="50px" height="50px"/> <label><input type="checkbox" class="check_box" name="DoorPadTray" id="DoorPadTray" value="1"> <i style="font-size:20px;"> Door Pad Tray</i></label>
			 </div>
			  
			<div class="form-group col-sm-4">
			  <img src="../../images/carfootmats.jpeg" width="50px" height="50px"/> <label><input type="checkbox" class="check_box" id="FloarMats" name="FloarMats" value="1"> <i style="font-size:20px;"> Foot Mats</i></label>
			 </div>

			<div class="form-group col-sm-4">
			  <img src="../../images/carmusicsystem.jpg" width="50px" height="50px"/> <label><input type="checkbox" class="check_box" id="MicSystem" name="MicSystem" value="1"> <i style="font-size:20px;"> Mic System</i></label>
			 </div>
			  
			<div class="form-group col-sm-4">
			  <img src="../../images/powerwindowswitchrear.jpg" width="50px" height="50px"/> <label><input type="checkbox" class="check_box" id="PowerWindowSwitchRear" name="PowerWindowSwitchRear" value="1"> <i style="font-size:20px;"> Power Window Switch Rear</i></label>
			</div>
			 
			<div class="form-group col-sm-4">
			 <img src="../../images/powerwindowfront.jpg" width="50px" height="50px"/> <label><input type="checkbox" class="check_box" id="PowerWindowSwitchFront" name="PowerWindowSwitchFront" value="1"> <i style="font-size:20px;"> Power Window Switch Front</i></label>
			</div>
			
			<div class="form-group col-sm-4">
			  <img src="../../images/steering.jpg" width="50px" height="50px"/> <label><input type="checkbox" class="check_box" id="Steering" name="Steering" value="1"> <i style="font-size:20px;"> Steering</i></label>
			</div>
			  
			<div class="form-group col-sm-4">
			  <img src="../../images/headrest.jpg" width="50px" height="50px"/><label> <input type="checkbox" class="check_box" id="HeadRest" name="HeadRest" value="1"> <i style="font-size:20px;"> Head Rest</i></label>
			</div>
			  
			<div class="form-group col-sm-4">
			  <img src="../../images/floor.JPG" width="50px" height="50px"/> <label><input type="checkbox" class="check_box" id="Floor" name="Floor" value="1"> <i style="font-size:20px;"> Floor </i> </label>
			</div>
			  
			<div class="form-group col-sm-4">
			 <img src="../../images/gearknobarea.jpg" width="50px" height="50px"/> <label><input type="checkbox" class="check_box" id="GearKnobArea" name="GearKnobArea" value="1"> <i style="font-size:20px;"> Gear Knob Area</i></label>
			</div>
			
			<div class="form-group col-sm-4">
			 <img src="../../images/carseats.jpg" width="50px" height="50px"/> <label><input type="checkbox" class="check_box" id="Seats" name="Seats" value="1"> <i style="font-size:20px;"> Seats</i></label>
			</div>
			 
			<div class="form-group col-sm-4">
			 <img src="../../images/cardickey.jpg" width="50px" height="50px"/> <label><input type="checkbox" class="check_box" id="Dickey" name="Dickey" value="1"> <i style="font-size:20px;"> Dickey</i></label>
			</div>
			
			</div>
			
			</div>
		  </div>
	   </div> 
	 <!-- Panel End -->
				
	<!-- Panel Start -->
	<div class="box-body">
	  <div class="panel panel-primary"> 
		 <div class="panel-heading"><h3>Exterior Cleaning </h3></div>
			<div class="panel-body">
							
		  <div class="row">
		  
		    <div class="form-group col-sm-4">
			  <input type="checkbox" id="CheckAll" name="CheckAll" class="CheckAll"><i style="font-size:20px;"> Select All</i></label>
			</div>
		
			<div class="form-group col-sm-4">
			  <img src="../../images/Bonnet.jpg" width="50px" height="50px"/> <label><input type="checkbox" class="ck_box" id="Bonnet" name="Bonnet" value="1"> <i style="font-size:20px;"> Bonnet</i></label>
			</div>
			 
			<div class="form-group col-sm-4">
			  <img src="../../images/Side Mirror.png" width="50px" height="50px"/>  <label><input type="checkbox" class="ck_box" id="SideMirrors" name="SideMirrors" value="1"> <i style="font-size:20px;"> Side Mirrors</i></label>
			</div>

			<div class="form-group col-sm-4">
			 <img src="../../images/Tire.jpg" width="50px" height="50px"/>  <label><input type="checkbox" class="ck_box" id="Tiers" name="Tiers" value="1"> <i style="font-size:20px;"> Tire</i></label>
			</div>
			
			<div class="form-group col-sm-4">
			  <img src="../../images/Doors & Top.jpg" width="50px" height="50px"/> <label><input type="checkbox" class="ck_box" id="DoorsTop" name="DoorsTop" value="1"> <i style="font-size:20px;"> Doors & Top</i></label>
			</div>
			  
			<div class="form-group col-sm-4">
			  <img src="../../images/Door Inside Area.jpg" width="50px" height="50px"/> <label><input type="checkbox" class="ck_box" name="DoorInsideArea" id="DoorInsideArea" value="1"> <i style="font-size:20px;"> Door Inside Area</i></label>
			</div>
			  
			<div class="form-group col-sm-4">
			  <img src="../../images/Alloy Wheels.jpg" width="50px" height="50px"/> <label><input type="checkbox" class="ck_box" id="AlloyWheels" name="AlloyWheels" value="1"> <i style="font-size:20px;"> Alloy Wheels</i></label>
			</div>

			<div class="form-group col-sm-4">
			  <img src="../../images/Bumpers.jpg" width="50px" height="50px"/> <label><input type="checkbox" class="ck_box" id="Bumpers" name="Bumpers" value="1"> <i style="font-size:20px;"> Bumpers</i></label>
			</div>
			  
			<div class="form-group col-sm-4">
			  <img src="../../images/Rear Glass.jpg" width="50px" height="50px"/> <label><input type="checkbox" class="ck_box" id="WindscreenDoorGlassesRearGlass" name="WindscreenDoorGlassesRearGlass" value="1"><i style="font-size:20px;"> Windscreen / Door Glasses /Rear Glass </i></label>
			</div>
			
		</div>				
	   </div>
	  </div>
	 </div> 
	<!-- Panel End -->
												
				<div class="box-body">
				   <div class="col-sm-12">
                    <label for="Branch">&nbsp;</label>
                    <input type="Submit" placeholder="Add" name="FinishCheckList" id="FinishCheckList" style="background-color:#37B8F8;color:#000000" value="Submit" class="btn btn-info pull-right" >
                   </div>			
				</div>

			</div>			
          <!-- /.box -->
       
	    </div>
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
