<?php
error_reporting(0);
session_start();
include("../../includes.php");
include("../../redirect.php");


            $see="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'"; 
			$absc=mysqli_query($conn,$see);
			$var=mysqli_fetch_array($absc);
			$Seion=$var['franchisee_id'];			 
			
$p="select * from s_job_card where FranchiseeId='".$_SESSION['FranchiseeId']."'";
$Ep=mysqli_query($conn,$p);
$Fp=mysqli_fetch_array($Ep);
$n=mysqli_num_rows($Ep);
$n1=$n+1;
$pn=$Seion."JCN".$n1;


?>

<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
 
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
  
function regno(){ 
    var qty = 0;
    var inputs = document.getElementById('vno').value;


$.ajax({
      type:'post',
        url:'get1.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("vehicle_model").value=msg;
       
       }
 });

}

function regno(){ 
    var qty = 0;
    var inputs = document.getElementById('vno').value;


$.ajax({
      type:'post',
        url:'get1.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("sname").value=msg;
       
       }
 });

}

function mod(){ 
    var qty = 0;
    var inputs = document.getElementById('vno').value;


$.ajax({
      type:'post',
        url:'get2.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("smobile").value=msg;
       
       }
 });

}

function mob(){ 
    var qty = 0;
    var inputs = document.getElementById('vno').value;


$.ajax({
      type:'post',
        url:'getcmobile.php',// put your real file name 
        data:{inputs},
		 dataType: 'json',
        success:function(msg){
              // your message will come here.  
        document.getElementById("smobile").value=msg[1];
		document.getElementById("sname").value=msg[0];
		document.getElementById("saddress").value=msg[2];
       
       }
 });

}


function getamount(){ 
    var qty = 0;
    var inputs = document.getElementById('stype').value;


$.ajax({
      type:'post',
        url:'get_amount.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("st_amt").value=msg;
       
       }
 });

}

function getpackageamt(){ 
    var qty = 0;
    var inputs = document.getElementById('ptype').value;


$.ajax({
      type:'post',
        url:'get_pac_amt.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("pk_amt").value=msg;
       
       }
 });

}

function sum()
{
    var value1= parseInt(document.getElementById("service_amt").value);
    var value2=parseInt(document.getElementById("gst").value);
	var value3=parseInt(document.getElementById("discount").value);
	var cgst=(value2/100)*value1;
    var sum=value1+cgst-value3;
    document.getElementById("total_amount").value=sum;

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
        Job Card Services
        <small>Close</small>
      </h1>
     </section>
   
			 
 
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="s_job_card_close_addQ.php" autocomplete="off">
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
			?>
             <div class="box-body">
			
			    <div class="form-group col-sm-4">
			      <label for="catname">Job Card Number</label>
				  <input type="text" class="form-control" name="job_card_no" id="job_card_no" value="<?php echo $temp['job_card_no']; ?>" required readonly="true">              
				</div>
				<div class="form-group col-sm-4">
			      <label for="catname">Date</label>
			      <input type="datetime" class="form-control" name="jdate" id="jdate"   value="<?php echo $temp['jdate']; ?>" onKeyPress="return tabE(this,event)" readonly required>
				</div>
				<div class="form-group col-sm-4">
			      <label for="catname">Vehicle Number</label>
                  <input class="form-control js-example-basic-single" name="vehicle_no"  id="vno"  value="<?php echo $temp['vehicle_no']; ?>" readonly onKeyPress="return tabE(this,event)">				 
                </div>							
				<div class="form-group col-sm-4">
			      <label for="catname">Customer Mobile</label>
			      <input type="text" class="form-control" name="smobile" value="<?php echo $temp['smobile'];?>" id="smobile" onKeyPress="return tabE(this,event)"  placeholder=" Mobile No" readonly="true">
                </div>
				<div class="form-group col-sm-4">
			      <label for="catname">Customer Name</label>
			      <input type="text" class="form-control" name="sname"  id="sname"  value="<?php echo $temp['sname'];?>" placeholder="Customer Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase"  readonly="true">
				</div>
				<div class="form-group col-sm-4">
			      <label for="catname">Customer Address</label>
			      <input type="txt" class="form-control" name="saddress" id="saddress"  placeholder="Address" value="<?php echo $temp['saddress'];?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase"  readonly="true">
                </div>

				</div>
				
			  <div class="form-group">
			    <label for="catname" class="col-sm-8 control-label"></label>
                <div class="col-sm-2">
                  <label for="Branch">&nbsp;</label>
                  <input type="Submit" placeholder="Add" style="background-color:#37B8F8;color:#000000" value="Close Job Card"  class="form-control" onclick="return confirm('Are You Sure Want to Close Job Card?');" >
                </div>
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
