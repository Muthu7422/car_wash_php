<?php
include("../../includes.php");
$date=date('Y-m-d');

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
 



  
<script type="text/javascript">
    function ShowHideDiv() {
        var paymentoption = document.getElementById("payment_mode");
        var bank = document.getElementById("bank_details");
		if(paymentoption.value == "Cheque")
		{
	        bank.style.display = paymentoption.value == "Cheque" ? "block" : "none";
		}
		else if(paymentoption.value == 'Neft')
		{
	         bank.style.display = paymentoption.value == "Neft" ? "block" : "none";
		}
		else if(paymentoption.value == 'RTGS')
		{
	         bank.style.display = paymentoption.value == "RTGS" ? "block" : "none";
		}
		else
		{
			
			 bank.style.display = paymentoption.value == "" ? "block" : "none";
		}
			   // bank.style.display = paymentoption.value == "Neft" ? "block" : "none";
				 // bank.style.display = paymentoption.value == "RTGS" ? "block" : "none";
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
function sumgst()
{
			var SellingPrice= parseFloat(document.getElementById("SellingPrice").value);
			if(document.getElementById("DiscountPer").value=="")
				{
					DiscountPer=0;
				}
				else
				{
			var DiscountPer=parseFloat(document.getElementById("DiscountPer").value);
				}
			if(document.getElementById("CGST").value=="")
				{
					CGST=0;
				}
				else
				{
			var CGST=parseFloat(document.getElementById("CGST").value);
				}
			if(document.getElementById("SGST").value=="")
				{
					SGST=0;
				}
				else
				{
			var SGST=parseFloat(document.getElementById("SGST").value);
				}
			if(document.getElementById("IGST").value=="")
				{
					IGST=0;
				}
				else
				{
			var IGST=parseFloat(document.getElementById("IGST").value);
				}
			var ReceivedAmount=parseFloat(document.getElementById("ReceivedAmount").value);
	
			var discountamt=(DiscountPer/100)*SellingPrice;
				document.getElementById("DiscountAmount").value=discountamt.toFixed(2);
			var BeforeTaxableAmt=SellingPrice-discountamt;
				document.getElementById("BeforeTaxableAmt").value=BeforeTaxableAmt.toFixed(2);
			var gst1=(SGST/100)*BeforeTaxableAmt;
			var gst2=(CGST/100)*BeforeTaxableAmt;
			var gst3=(IGST/100)*BeforeTaxableAmt;
			var gst=gst1+gst2+gst3;
				document.getElementById("GstAmt").value=gst.toFixed(2);
			var billamt=BeforeTaxableAmt+gst;
				document.getElementById("TotalBillAmount").value=billamt.toFixed(2);
			var BalanceAmount=billamt-ReceivedAmount;
				document.getElementById("BalanceAmount").value=BalanceAmount.toFixed(2);
				
}
function sumdiscount()
{
	var a = parseFloat(document.getElementById("BillAmount").value);
	var b = parseFloat(document.getElementById("DiscountPer").value);
	
	var c = 0;
	var c=a*b/100;
	
	parseFloat(document.getElementById("DiscountAmount").value=c);
	var d=0;
	var d=a-c;
	
	document.getElementById("BeforeTaxableAmt").value=d.toFixed(2);
	document.getElementById("TotalBillAmount").value=d.toFixed(2);
}

function sumrcvd()
{
	
	var a = parseFloat(document.getElementById("TotalBillAmount").value);
	var b = parseFloat(document.getElementById("ReceivedAmount").value);
	
	var c = a-b;
	
	document.getElementById("BalanceAmount").value=c.toFixed(2);
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
       Bill Payment Mode
        <small>Bill </small>
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="salesbill_payment_mode_act.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
			<?php
			$Eds="select * from sales_invoice where id='".$_REQUEST['id']."'";
			$Esw=mysqli_query($conn,$Eds);
			$Wqa=mysqli_fetch_array($Esw);
			?>
			
              <div class="box-body">
			   <div class="form-group col-sm-4">
                  <label for="party">Bill Amount </label>
				  <input type="text" class="form-control" name="BillAmount" id="BillAmount" value="<?php echo $Wqa['ActualSellingPrice']; ?>" readonly  onKeyPress="return tabE(this,event)">
				   <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>"  readonly  onKeyPress="return tabE(this,event)">
               </div>
			  </div>
              <div class="box-body">
			 
			    <div class="form-group col-sm-4">
                  <label for="party">Total Taxable Amount </label>
				  <input type="text" class="form-control" name="SellingPrice" id="SellingPrice" value="<?php echo $Wqa['total_amt'] ; ?>" onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)" readonly>
               </div>
			    <div class="form-group col-sm-2">
                  <label for="party">Total Tax Amount</label>
				  <input type="text" class="form-control" name="TotalTaxAmount" id="TotalTaxAmount" value="<?php echo $Wqa['TotalTaxAmount']; ?>" onKeyPress="return tabE(this,event)" readonly='ture'>
               </div>
			   
			    <div class="form-group col-sm-4">
                  <label for="party">Discount %</label>
				  <input type="text" class="form-control" name="DiscountPer" id="DiscountPer"  onKeyUp="sumdiscount();" onKeyPress="return tabE(this,event)">
               </div>
			     <div class="form-group col-sm-4">
                  <label for="party">After Discount</label>
				  <input type="text" class="form-control" name="DiscountAmount" id="DiscountAmount"   onKeyPress="return tabE(this,event)" readonly='ture'>
               </div>
			    <div class="form-group col-sm-4">
                  <label for="party">Discounted Amount</label>
				  <input type="text" class="form-control" name="BeforeTaxableAmt" id="BeforeTaxableAmt"  onKeyPress="return tabE(this,event)" readonly='ture'>
               </div>
			   
			   <div class="form-group col-sm-4">
                  <label for="party">Total Bill Amount</label>
				  <input type="text" class="form-control" name="TotalBillAmount" id="TotalBillAmount" readonly  onKeyPress="return tabE(this,event)">
               </div>
			    <div class="form-group col-sm-4">
                  <label for="party">Received Amount</label>
				  <input type="text" class="form-control" name="ReceivedAmount" id="ReceivedAmount" value="0"  onKeyUp="sumrcvd();" onKeyPress="return tabE(this,event)">
               </div>
			   <div class="form-group col-sm-4">
                  <label for="party">Balance Amount</label>
				  <input type="text" class="form-control" name="BalanceAmount" id="BalanceAmount" onKeyPress="return tabE(this,event)" readonly='ture'>
               </div>
			     <div class="form-group col-sm-4">
                  <label for="Branch">Ledger Group</label>
                  <select class="form-control" name="LedgerGroup" id="LedgerGroup">
				  <?php
				  $lg="select * from m_ledger_group where id='26'";
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
			
			    <div class="form-group col-sm-4">
                  <label for="party">Payment Mode</label>
				  <select class="form-control" name="payment_mode" id="payment_mode" onchange = "ShowHideDiv()">
				    <option value="">Select the Option</option>
				  <option value="Cash">Cash</option>
				   <option value="Credit">Credit</option>
				   <option value="Cheque">Cheque</option>
				   <option value="Neft">Neft</option>
				   <option value="RTGS">RTGS</option>
				  </select>
				   </div>
				 <div class="form-group col-sm-12" id="bank_details" style="display:none">
				
					<div class="form-group col-sm-4">
              <label for="Branch">Bank Name</label>
              <select class="form-control" name="BankName" id="BankName" onChange="get_account(this.value);">
			   <option value="">--Select Bank--</option>
			  <?php
			  $bank="select DISTINCT(BankName) as  BankName from a_bank_acc";
			  $bankq=mysqli_query($conn,$bank);
			  while($bankfetch=mysqli_fetch_array($bankq))
			  {
			  ?>
			 <option value="<?php echo $bankfetch['BankName'];?>"><?php echo $bankfetch['BankName'];?></option>
			  <?php
			  }
			  ?>
			  </select>
                </div>
			  	<div class="form-group col-sm-4">
              <label for="Branch">Account No</label>
              <select class="form-control" name="AccountNo" id="AccountNo" class="form-control" onChange="get_bankid();"></select>
                </div>
				<div class="form-group col-sm-4">
              <label for="Branch">Cheque Number Or Reference No</label>
              <input type="number" class="form-control" name="ChequeNumber" id="ChequeNumber" class="form-control">
                </div>
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Bank Id</label>
                  <input type="text" class="form-control" name="BankId" id="BankId" readonly>
                </div>
				
					<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Ledger Id</label>
                  <input type="text" class="form-control" name="LedgerId" id="LedgerId" readonly>
                </div>
				</div>					
            </div>
				 <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" Onclick="return confirm('Are you sure want to proceed?')">Submit The Invoice</button>
                </div> 
              <!-- /.box-body -->
		 
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
