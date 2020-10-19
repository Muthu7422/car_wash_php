<?php
error_reporting(0);
session_start();
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);
$Seion=$var['franchisee_id'];
				  
				  	
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
 
 <script>
 function getExpType():
 {
	var  
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
        Cash Hand Over
        <small> <?php if(!isset($_REQUEST['msg'])==''){ ?> <span class="alert alert-danger"> <?php echo $_REQUEST['msg']; ?> </span><?php } ?></small>
      </h1>
     </section>
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

  
</script>	 
   <script>
   function getExpType(val) {
	$.ajax({
	type: "POST",
	url: "get_entry.php",
	data:'country_id='+val,
	success: function(data){
		$("#PettyType").html(data);
		}
		});
		}
		
// function getbank(val) {
	// var PaymentMode = document.getElementById('PaymentMode').value;
	
	// $.ajax({
	// type: "POST",
	// url: "get_Accounts.php",
	// data: {PaymentMode: PaymentMode},
	// success: function(data){
		// $("#cdetails").html(data);
		// }
		// });
		// }	
function getCash(val) {
	var LedgerGroup = document.getElementById('LedgerGroup').value;
	
	$.ajax({
	type: "POST",
	url: "get_cash.php",
	data: {LedgerGroup: LedgerGroup},
	success: function(data){
		$("#PettyType").html(data);
		}
		});
		}	
		
function getamount(){ 
    var qty = 0;
    var inputs = document.getElementById('BankNameT').value;


$.ajax({
      type:'post',
        url:'get_amt.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("BCash").value=msg;
   
       }
 });

}

   </script>
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="cash_hand_over_addQ.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
               
			 
<div class="box-body">
	           
	   
				<div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
                  <input type="date" class="form-control" name="CDate" id="CDate" value="<?php echo date('Y-m-d'); ?>" required>
                </div>		

			
				
				
				 <div class="form-group col-sm-4" >
                  <label for="Branch">Branch Name</label>
                  <input type="email"  class="form-control" name="CBranch" id="CBranch" value="<?php echo $var['franchisee_name'];?>" placeholder="Franchisee Name" onKeyPress="return tabE(this,event)" readonly>
                  <input type="hidden"  class="form-control" name="CBranchid" id="CBranchid" value="<?php echo $var['id'];?>" placeholder="Franchisee Name" onKeyPress="return tabE(this,event)" readonly>
                 </div>
				
		          <div class="form-group col-sm-4">
                  <label for="Branch">Amount</label>
                  <input type="text" class="form-control" name="camount" id="camount" placeholder="Amount" onKeyPress="return tabE(this,event)" >
                </div>
			 
				 
				<div class="form-group col-sm-4">
                  <label for="Branch">Description</label>
                  <textarea class="form-control" name="Description" id="Description" placeholder="Description" onKeyPress="return tabE(this,event)" ></textarea>
                </div>
				 
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	   
         </div>
		 	<div class="box-footer">	
     <a href="cash_hand_over.php"><button type="button" class="btn btn-info pull-left" ><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</button></a>
   </div>
		  <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>    
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
