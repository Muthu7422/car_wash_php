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
 
 <script>
 function getExpType()
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
        Petty Cash 
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
		
// function getamount(){ 
    // var qty = 0;
    // var inputs = document.getElementById('BankNameT').value;


// $.ajax({
      // type:'post',
        // url:'get_amt.php',// put your real file name 
        // data:{inputs},
        // success:function(msg){
             // your message will come here.  
        // document.getElementById("BCash").value=msg;
   
       // }
 // });

// }
function getbank(val) {
	var PaymentMode = document.getElementById('PaymentMode').value;
	
	$.ajax({
	type: "POST",
	url: "get_Accounts.php",
	data: {PaymentMode: PaymentMode},
	success: function(data){
		$("#cdetails").html(data);
		}
		});
		}	
function getCashs(val) {
	var PaymentMode = document.getElementById('PaymentMode').value;
	
	$.ajax({
	type: "POST",
	url: "cash_get.php",
	data: {PaymentMode: PaymentMode},
	success: function(data){
		$("#cdetails").html(data);
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
    <form role="form" method="post" action="a_petty_cash_addQ.php" autocomplete="off">
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
                  <input type="date" class="form-control" name="PDate" id="PDate" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Invoice No</label>
                  <input type="text" class="form-control" name="Inv_no" id="Inv_no" >
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Payment Mode</label>
                  <select  type="date" class="form-control" name="PaymentMode" id="PaymentMode" onChange="getbank(this.value);getCashs(this.value);" required>				  
				   <option>--select the value--</option>
				  <option value="Cash">Cash</option>
				  <option value="Bank">Bank</option>
				  <option value="NA">NA</option>
				  </select>
                </div>
				<div class="box-body">
				<div  id="cdetails" name="cdetails" >
				</div>
				 </div>
               <div class="form-group col-sm-4" hidden>
                  <label for="Branch">Branch</label>
				   <select class="form-control" name="" id="">
				   <option>--Select The Banch--</option>
				  <?php
				  $lg="select * from m_franchisee where status='Active'";
				  $lgr=mysqli_query($conn,$lg);
				  while($res=mysqli_fetch_array($lgr)){
				  ?>
                   <option value="<?php echo $res['id'];?>"><?php echo $res['franchisee_name'];?></option>
				  <?php } ?>
				  </select>
                </div>
				
							<div class="form-group col-sm-4" >
                  <label for="Branch">Branch</label>
                  <input type="text" class="form-control" name="franchisee_name" id="franchisee_name" value="<?php echo $_SESSION['franchisee_name'] ?>" readonly >
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Ledger Group</label>
				   <select class="form-control" name="LedgerGroup" id="LedgerGroup">
				  <?php
				  $lg="select * from m_ledger_group where id='36'";
				  $lgr=mysqli_query($conn,$lg);
				  while($res=mysqli_fetch_array($lgr)){
				  ?>
                 
				  <option value="<?php echo $res['id'];?>"><?php echo $res['ledger_group'];?></option>
				  <?php }?>
				  </select>
                </div>
				
		 <div class="form-group col-sm-4">
                  <label for="Branch">Petty Cash Type</label>
                  <select type="text" class="form-control" name="PettyType" id="PettyType" placeholder="Petty Type" onKeyPress="return tabE(this,event)" required>
				  <option>--Select The Type--</option>
				  <?php 
				  $lm="select * from m_ledger order by	LedgerName ";
				  $Elm=mysqli_query($conn,$lm);
				  while($FElm=mysqli_fetch_array($Elm))
				  {
				  ?>				  
				  <option value="<?php echo $FElm['Id']; ?>"><?php echo $FElm['LedgerName']; ?></option>
				  <?php } ?>
				  </select>
                </div>
               
			 <div class="form-group col-sm-4 hidden">
			 <label for="Branch">Petty Cash Type</label>
				  <select class="form-control" name="PettyType" id="PettyType">
				  </select>
				</div>
				<div class="box-body">
				<div  id="cdetails" name="cdetails" >
				</div>
				 </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Amount</label>
                  <input type="number" class="form-control" name="PettyAmount" id="PettyAmount"  >
                </div>
				 
				<div class="form-group col-sm-4">
                  <label for="Branch">Remarks</label>
                  <textarea class="form-control" name="Description" id="Description" placeholder="Description" onKeyPress="return tabE(this,event)" ></textarea>
                </div>
				  <div class="form-group col-sm-2 pull-right">
			   <label for="catname"></label>
                  <label for="Branch">&nbsp;</label>
                  <input type="Submit" placeholder="Add" id="EntryExpense" name="EntryExpense"  style="background-color:#37B8F8; color:#000000" value="Submit" class="form-control">
				  </div>   
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
