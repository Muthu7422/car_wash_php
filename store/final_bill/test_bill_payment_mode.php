<?php
include("../../includes.php");
$date=date('Y-m-d');

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>
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
			if(document.getElementById("GstPer").value=="")
				{
					GstPer=0;
				}
				else
				{
			var GstPer=parseFloat(document.getElementById("GstPer").value);
				}
			if(document.getElementById("FromOfferAmt").value=="")
				{
					FromOfferAmt=0;
				}
				else
				{
			var FromOfferAmt=parseFloat(document.getElementById("FromOfferAmt").value);
				}
			var PaidAdvanceAmt= parseFloat(document.getElementById("PaidAdvanceAmt").value);
			var ReceivedAmount= parseFloat(document.getElementById("ReceivedAmount").value);
			var BalanceAmount= parseFloat(document.getElementById("BalanceAmount").value);
			
			var discountamt=(DiscountPer/100)*SellingPrice;
				document.getElementById("DiscountAmount").value=discountamt.toFixed(2);
			var BeforeTaxableAmt=SellingPrice-discountamt;
				document.getElementById("BeforeTaxableAmt").value=BeforeTaxableAmt.toFixed(2);
			var gstamt=(GstPer/100)*BeforeTaxableAmt;
				document.getElementById("GstAmt").value=gstamt.toFixed(2);
			var TotalAmount=BeforeTaxableAmt+gstamt;
				document.getElementById("TotalAmount").value=TotalAmount.toFixed(2);
			var off=TotalAmount-FromOfferAmt;
			var TotalBillAmount=off-PaidAdvanceAmt;
				document.getElementById("TotalBillAmount").value=TotalBillAmount.toFixed(2);
			var balamt=TotalBillAmount-ReceivedAmount;
				document.getElementById("BalanceAmount").value=balamt.toFixed(2);
				
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
<div class="wrapper" >
  <!--header Starts-->
  <?php include("../../header.php"); ?>
  <!--Header End -->
  <!-- Left side column. contains the logo and sidebar -->
   <?php include("../../leftbar.php"); ?>
 <!-- Side Bar End -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#ECF0F5" ng-app="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Bill Payment Mode
        <small>Bill </small>
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="bill_payment_mode_act.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
			<?php
			$Eds="select * from a_final_bill where id='".$_REQUEST['id']."'";
			$Esw=mysqli_query($conn,$Eds);
			$Wqa=mysqli_fetch_array($Esw);
			?>
			
              <div class="box-body">
			   <div class="form-group col-sm-4">
                  <label for="party">Actual Selling Pricet</label>
				  <input type="text" class="form-control" name="BillAmount" id="BillAmount" value="<?php echo $Wqa['ActualSellingPrice']; ?>" readonly  onKeyPress="return tabE(this,event)">
				   <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>"  readonly  onKeyPress="return tabE(this,event)">
               </div>
			  </div>
			  <div class="form-group col-sm-12">
			<div style="padding-right:250px" >
            <h4 class="box-title"><b>Available Offers Details</b></h4>
            <!-- /.box-header -->
             <table class="table table-bordered" >
			  <thead>
                <tr>
                <th>S:No</th>
                <th>Package Name</th>
				<th>Package Period</th>
				<th>Offer Amount</th>
				<th>Balance</th>
			    </tr>
				<?php
				$names1="select * from s_job_card where job_card_no='".$Wqa['job_card_no']."'"; 
				$ns1=mysqli_query($conn,$names1);
				$jcd1=mysqli_fetch_array($ns1);
				$i=0;
				$echeck="select  * from s_add_package where VehicleId='".$jcd1['vehicle_no']."'";
				$echk=mysqli_query($conn,$echeck);
				while($ecount=mysqli_fetch_array($echk)) 
				{
				$i++;
				
				$sp="select * from m_package where id='".$ecount['PackageId']."'";
				$Esp=mysqli_query($conn,$sp);
				$FEsp=mysqli_fetch_array($Esp);
				
				
				?>
                <tr>
                <td><?php echo "   ".$i; ?></td>
				<td><?php echo $FEsp['package_name']; ?></td>
				<td><?php echo $ecount['StartDate']." To ".$ecount['EndDate']; ?></td>
				<td><?php echo $FEsp['amount']; ?></td>
				<td><?php echo $ecount['AvailableAmount']; ?></td>
				</tr>
				<?php
				  }
				?>
                 </thead>
              </table>
            <!-- /.box-body -->
			</div>
        </div> 
		<?php echo $SellingPrice=$Wqa['ser_amt']+$Wqa['other_charge']; ?>
              <div class="box-body">
			  <div class="form-group col-sm-4">
                  <label for="party">Total Amount</label>
				  <input type="text" class="form-control" name="SellingPrice" id="SellingPrice"  value="<?php echo $SellingPrice; ?>" onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)" readonly>
               </div>
			    <div class="form-group col-sm-4">
                  <label for="party">Discount %</label>
				  <input type="text" class="form-control" name="DiscountPer" id="DiscountPer" ng-model="DiscountPer" onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)">
               </div>
			     <div class="form-group col-sm-4">
                  <label for="party">Discount Amount</label>
				  <input type="text" class="form-control" name="DiscountAmount" id="DiscountAmount" ng-model="DiscountAmount" onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)" readonly='ture'>
               </div>
			    <div class="form-group col-sm-4">
                  <label for="party">Before Taxable Amount</label>
				  <input type="text" class="form-control" name="BeforeTaxableAmt" id="BeforeTaxableAmt" ng-model="BeforeTaxableAmt" onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)" readonly='ture'>
               </div>
			    <div class="form-group col-sm-4">
                  <label for="party">GST %</label>
				  <select type="text" class="form-control" name="GstPer" id="GstPer" onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)">
				  <option value="<?php echo $Wqa['gst']; ?>"><?php echo $Wqa['gst']; ?></option>
				   <option>0</option>
				   <option>2.5</option>
				   <option>5</option>
				   <option>10</option>
				   <option>18</option>
				   <option>28</option>
				  </select>
               </div>
			    <div class="form-group col-sm-4">
                  <label for="party">GST Amount</label>
				  <input type="text" class="form-control" name="GstAmt" id="GstAmt" onKeyUp="sumgst();" ng-model="GstAmt" onKeyPress="return tabE(this,event)" readonly='ture'>
               </div>
			   <div class="form-group col-sm-4">
                  <label for="party">Total Amount</label>
				  <input type="text" class="form-control" name="TotalAmount" id="TotalAmount" ng-model="TotalAmount" onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)" readonly='ture'>
               </div>
			   <?php
			   
			   ?>
			   	<div class="form-group col-sm-4">
                  <label for="party">Paid Advance Amount ()</label>
				  <input type="text" class="form-control" name="PaidAdvanceAmt" id="PaidAdvanceAmt" ng-model="PaidAdvanceAmt" value="<?php echo $jcd1['PaidAmount'] ?>" readonly onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)">
               </div>
			  
			   <div class="form-group col-sm-4">
                  <label for="party"> From Offer Amount</label>
				  <input type="text" class="form-control" name="FromOfferAmt" id="FromOfferAmt" ng-model="FromOfferAmt" onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)">
               </div>
			   <div class="form-group col-sm-4">
                  <label for="party">Total Bill Amount</label>
				  <input type="text" class="form-control" name="TotalBillAmount" id="TotalBillAmount" ng-model="TotalBillAmount" readonly onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)">
               </div>
			    <div class="form-group col-sm-4">
                  <label for="party">Received Amount</label>
				  <input type="text" class="form-control" name="ReceivedAmount" id="ReceivedAmount" ng-model="ReceivedAmount" value="0"  onKeyUp="sumgst();" onKeyPress="return tabE(this,event)">
               </div>
			   <div class="form-group col-sm-4">
                  <label for="party">Balance Amount</label>
				  <input type="text" class="form-control" name="BalanceAmount" id="BalanceAmount" ng-model="BalanceAmount" onKeyPress="return tabE(this,event)" readonly='ture'>
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
				 <div class="form-group col-sm-8" id="bank_details" style="display:none">
				
					<div class="form-group col-sm-6">
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
			  	<div class="form-group col-sm-6">
              <label for="Branch">Account No</label>
              <select class="form-control" name="AccountNo" id="AccountNo" class="form-control" onChange="get_bankid();"></select>
                </div>
				<div class="form-group col-sm-6">
              <label for="Branch">Cheque Number</label>
              <input type="number" class="form-control" name="ChequeNumber" id="ChequeNumber" class="form-control">
                </div>
				<div class="form-group col-sm-6" style="display:none">
                  <label for="Branch">Bank Id</label>
                  <input type="text" class="form-control" name="BankId" id="BankId" readonly>
                </div>
				
					<div class="form-group col-sm-6" style="display:none">
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
