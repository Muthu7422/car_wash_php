<?php
include("../../includes.php");

$SServiceAmount=0;
$SSpareAmount=0;

$date=date('Y-m-d');
$p="select * from a_final_bill where FrachiseeId='".$_SESSION['BranchId']."'";
$Ep=mysqli_query($conn,$p);
$Fp=mysqli_fetch_array($Ep);
$n=mysqli_num_rows($Ep);
$n1=$n+1;
$pn="EN".$n1;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
 
 <script>
function mob(){ 
    var qty = 0;
    var inputs = document.getElementById('job_card').value;


$.ajax({
      type:'post',
        url:'getcmobile.php',// put your real file name 
        data:{inputs},
		dataType: 'json',
        success:function(msg){
              // your message will come here.  
        document.getElementById("mobile").value=msg[0];
		document.getElementById("address").value=msg[1];
		document.getElementById("vehile_no").value=msg[2];
		document.getElementById("JobcardId").value=msg[3];
       
       }
 });

}
function amt(){ 
    var qty = 0;
    var inputs = document.getElementById('job_card').value;


$.ajax({
      type:'post',
        url:'get_amt.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("service_amt").value=msg;
       
       }
 });

}

function samt(){ 
    var qty = 0;
    var inputs = document.getElementById('job_card').value;


$.ajax({
      type:'post',
        url:'get_samt.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("total_service_amt").value=msg;
       
       }
 });

}


function outstanding(){ 
    var qty = 0;
    var inputs = document.getElementById('job_card').value;


$.ajax({
      type:'post',
        url:'get_outstanding.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("cust_out_amt").value=msg;
       
       }
 });

}	
	function getcolor(val) {
	var job_card = document.getElementById('job_card').value;
	var inv_no = document.getElementById('inv_no').value;
	var bill_date = document.getElementById('bdate').value;
	
	$.ajax({
	type: "POST",
	url: "get_details.php",
	data: {job_card: job_card,inv_no:inv_no,bill_date:bill_date},
	success: function(data){
		$("#cdetails").html(data);
		}
		});
		}	

		
function sumgst()
{
    var value1= parseFloat(document.getElementById("total_service_amt").value);
    var value2=parseFloat(document.getElementById("total_samt").value);
	if(document.getElementById("others_charge").value=="")
	{
		value3=0;
	}
	else
	{
	var value3=parseFloat(document.getElementById("others_charge").value);
	}
	
	if(document.getElementById("sgst").value=="")
	{
		sgst=0;
	}
	else
	{
	var sgst=parseFloat(document.getElementById("sgst").value);
	}
	if(document.getElementById("cgst").value=="")
	{
		cgst=0;
	}
	else
	{
	var cgst=parseFloat(document.getElementById("cgst").value);
	}
	if(document.getElementById("igst").value=="")
	{
		igst=0;
	}
	else
	{
	var igst=parseFloat(document.getElementById("igst").value);
	}
	var gst=sgst+cgst+igst;
	var Btotal=value1+value3;
	var total_amount=value1+value2+value3;
	 document.getElementById("total").value=total_amount.toFixed(2);
		 
	 var gst=(gst/100)*Btotal;
	 var bill_amount=total_amount+gst;
	 document.getElementById("bill_amt").value=bill_amount.toFixed(2);
}

function SesAmount(){ 
    var qty = 0;
    var inputs = 0;


$.ajax({
      type:'post',
        url:'GetServiceAmount.php',// put your real file name  ,
        data:{inputs},
		dataType: 'json',
        success:function(msg){
              // your message will come here.  
        document.getElementById("total_service_amt").value=msg[1];
		document.getElementById("total_samt").value=msg[1];
		       
       }
 });

}
function get_bankid(){ 
    var qty = 0;
    var inputs = document.getElementById('AccountNo').value;

   $.ajax({
      type:'post',
        url:'get_bankdetails.php',// put your real file name //data: {inputs: inputs,pno: pno,pdate:pdate},
       data:{inputs},
		//data:{inputs},
		dataType    : 'json',
        success:function(msg){
              // your message will come here.  
        document.getElementById("BankId").value=msg[0];
		document.getElementById("LedgerId").value=msg[1];
       
       }
 });

}
</script>
<script>
	function getce(val) {
	var mrp = parseInt(document.getElementById("esce").value);
	var quantity =  parseInt(document.getElementById("elce").value);
	 var hra = parseInt( mrp + quantity );
	 document.getElementById("tce").value = hra; 
	 }
	 
	 
	 
	function customer_name(val) {
	$.ajax({
	type: "POST",
	url: "customer_name.php",
	data:'country_id='+val,
	success: function(data){
		$("#cname").html(data);
		}
		});
		}
		
	
	 
  </script>
  <script>
  	function customer_lid(val) {
	$.ajax({
	type: "POST",
	url: "get_services.php",
	data:'country_id='+val,
	success: function(data){
	$("#CLI").html(data);
	}
	});
	}
	
		function get_account(val) {
	$.ajax({
	type: "POST",
	url: "acc_details.php",
	data:'country_id='+val,
	success: function(data){
		$("#AccountNo").html(data);
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
        Final Bill
        <small>Store </small>
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="f_bill_act.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			  
				<div class="form-group col-sm-4">
                  <label for="Branch">Bill Date</label>
                  <input type="text" class="form-control" name="bdate" id="bdate" value="<?php echo $date; ?>" required>
				  <input type="hidden" class="form-control" name="tno" id="tno" value="<?php echo rand(); ?>">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Invoice No</label>
                  <input type="text" class="form-control" name="inv_no" id="inv_no" value="<?php echo $_SESSION['FranchiseeCode']."-".$n1; ?>" placeholder="Invoice No" readonly="true">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Job Card No</label>
                  <select type="text" class="form-control" name="job_card" id="job_card" autofocus="focus"  placeholder="Vehicle Number" onChange="getcolor(this.value);mob();amt();outstanding();customer_name(this.value);customer_lid(this.value)" required>
				  <option value="">Select the Job Card</option>
				  <?php
				$snb1="select * from s_job_card where FranchiseeId='".$_SESSION['FranchiseeId']."' and jcard_status='Close'";
				$snbr1=mysqli_query($conn,$snb1);
				while($snresult1=mysqli_fetch_array($snbr1))
				{
					
					
				
				?> <option value="<?php echo $snresult1['job_card_no'];?>"><?php echo $snresult1['job_card_no'];?></option>
				
				<?php
				}
				
			
				
				?>
				  </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
                  <select type="text" class="form-control" name="cname" id="cname"  placeholder="Customer Name"  readonly="true" required>
				  </select>
                </div>
				
					<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Customer LEDGER ID</label>
				  <select type="text" class="form-control" name="CLI" id="CLI">
				  </select>
                  
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Mobile</label>
                  <input type="text" class="form-control" name="mobile" id="mobile"  placeholder=" Mobile" >
				  <input type="hidden" class="form-control" name="JobcardId" id="JobcardId"  placeholder=" Mobile" >
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Address</label>
                  <input type="text" class="form-control" name="address" id="address"  placeholder="Customer Address" readonly="true">
                </div>	
                   <div class="form-group col-sm-4">
                  <label for="Branch">Customer Vehile No</label>
                  <input type="text" class="form-control" name="vehile_no" id="vehile_no"  placeholder="Vehile No" readonly="true">
                </div>	
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Outstanding Amount</label>
                  <input type="text" class="form-control" name="cust_out_amt" id="cust_out_amt"  placeholder="Customer Outstanding Amount" readonly="true">
                </div>	
                      <div class="form-group col-sm-4">
                  <label for="Branch">Remarks</label>
                  <input type="text" class="form-control" name="remarks" id="remarks"  placeholder="Remarks">
                </div>		
   <div class="form-group col-sm-4">
                  <label for="Branch">Ledger Group</label>
                  <select class="form-control" name="LedgerGroup" id="LedgerGroup">
				  <?php
				  $lg="select * from m_ledger_group where id='33'";
				  $lgr=mysqli_query($conn,$lg);
				  while($lgroup=mysqli_fetch_array($lgr))
				  {
				  ?>
				 
				  <option value="<?php echo $lgroup['id'];?>"><?php echo $lgroup['ledger_group'];?></option>
				  <?php
				  }
				  ?>
				  </select>
                </div>						
            </div>
			
			
			
			
			
              <!-- /.box-body -->
         
		  
		<div  id="cdetails" name="cdetails" >
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
