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
      <h1>Sales Invoice</h1>
     </section>

<script>
function Delete_Click() {
    var strconfirm = confirm("Are you sure you want to delete?");
    if (strconfirm == true) {
        return true;
    }
	else
		return false;
}  


function outstanding(){ 
    var qty = 0;
    var inputs = document.getElementById('customer_name').value;


$.ajax({
      type:'post',
        url:'get_outstanding.php',// put your real file name 
        data:{inputs},
		dataType: 'json',
        success:function(msg){
              // your message will come here. 
        document.getElementById("CLI").value=msg[0];			  
        document.getElementById("out").value=msg[1]; 
       }
 });

}


function getbrand($i) {
		var spare_brand = document.getElementById('spare_brand'+$i+'').value;
			$.ajax({
	type: "POST",
	url: "get_spare.php",
	data:'country_id='+spare_brand,
	success: function(data){
		$("#spare_name"+$i).html(data);
		}
		});
		}
		
function getmrp($i){ 
    var qty = 0;
    var inputs = document.getElementById('spare_name'+$i+'').value;


$.ajax({
      type:'post',
        url:'get_mrp.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("mrp"+$i).value=msg;
   
       }
 });

}

function getamount($i)
{
	amount=0;
	

var mrp = document.getElementById('mrp'+$i+'').value;
var qty = document.getElementById('qty'+$i+'').value;

var amount=mrp*qty;

document.getElementById('amount'+$i+'').value=amount;

}

function gettotal($i)
{ 

	var total = 0;
	
    inputs1 = document.getElementById('amount'+$i+'').value;
	for ( var index = 1; index <= $i; index++)
	{
		//alert('hai');
		
		//if (parseFloat(inputs1[index].value)){
        total =total + parseFloat(document.getElementById('amount'+index+'').value);
	    //alert('hai');
		//}
	}
	document.getElementById('total').value = total;
}

function sumgst()
{
    var total= parseFloat(document.getElementById("total").value);
    var dicount=parseFloat(document.getElementById("discount_per").value);
	var sgst=parseFloat(document.getElementById("sgst").value);
	var cgst=parseFloat(document.getElementById("cgst").value);
	var igst=parseFloat(document.getElementById("igst").value);
	var recable_amount=parseFloat(document.getElementById("recable_amount").value);

	
	
	var discount_amount=(dicount/100)*total;
	 document.getElementById("dicount_amt").value=discount_amount.toFixed(2);
	 
	 var amount=parseFloat(document.getElementById("total").value)-discount_amount;
	 document.getElementById("total_amt").value=amount.toFixed(2);
	 
	 var gst1=(sgst/100)*amount;
	 var gst2=(cgst/100)*amount;
	 var gst3=(igst/100)*amount;
	 
	 var gst=gst1+gst2+gst3;
	  document.getElementById("gst_amt").value=gst.toFixed(2);
	  
	  var billamount=amount+gst;
	   document.getElementById("bill_amt").value=billamount.toFixed(2);
	   
	   var bal_amt=billamount-recable_amount;
	    document.getElementById("balance_amount").value=bal_amt.toFixed(2);
}



</script>	 

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

</script>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="sales_invoice_act.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			  
			  
                <div class="form-group col-sm-4">
                  <label for="Branch">Invoice No</label>
				  <?php
				  $in="select * from sales_invoice";
				  $Ein=mysql_query($in);
				  $n=mysql_num_rows($Ein);
				  $Fin=mysql_fetch_array($Ein);
				  $ns1=$n+0001;
				  ?>
                  <input type="text" class="form-control" name="inv_no" id="inv_no" value="<?php echo SA.$ns1 ?>" placeholder="Invoice No" readonly required>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
                  <input type="date" class="form-control" name="date" id="date"  value="<?php echo $Fin['pdate']; ?>" placeholder="Date" required>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Branch Name</label>
				  <?php
				  $rpm="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'";
				  $rps=mysql_query($rpm);
				  $spu=mysql_fetch_array($rps);
				  
				  ?>
                  <select type="text" class="form-control" name="branch_name" id="branch_name" value="" readonly>
				  <option value="<?php echo $spu['id'] ?>"><?php echo $spu['franchisee_name'] ?></option>
				  </select>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
                  <select class="form-control" id="customer_name" name="customer_name" onChange="outstanding(this.value);" required>
				  <option value="">Select</option>
				  <?php 
				  $ssc="select * from a_customer where status='Active'";
				  $Essc=mysql_query($ssc);
				  while($FEssc=mysql_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['cust_name']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				
					<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Customer Ledger Id</label>
                  <input class="form-control" name="CLI" id="CLI" readonly  placeholder="Customer Ledger Id" >
                </div> 
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Outstanding</label>
                  <input class="form-control" name="out" id="out" readonly  placeholder="Outstanding" >
                </div> 
				<div class="form-group col-sm-4">
                  <label for="Branch">GSTIN</label>
                  <input class="form-control" name="gstin" id="gstin"   placeholder="GSTIN" >
                </div> 
				<div class="form-group col-sm-4">
                  <label for="Branch">Description</label>
                  <input class="form-control" name="description" id="description" placeholder="Description" >
                </div></div>
				
        <!-- left column -->
		<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Item Sales Details</h3>
            </div>
                  <div class="box-body no-padding" style="overflow:auto">
                 <table class="table-bordered padding-4 disp" style="width:100%;height:100px">
                <thead>
                <tr>
				  <th style="width:  60px">S.No</th>
				  <th style="width:  250px">Spare Brand</th>
				  <th style="width:  250px">Spare Name</th>
				  <th style="width:  100px">Rate</th>
				  <th style="width:  100px">Qty</th>
				  <th style="width:  100px">Total</th>
                </tr>
                </thead>
                <tbody>
				<?php
				for($i=1;$i<10;$i++)
				{
				?>
                <tr>
                  <td style="width:  60px"><?php echo $i; ?> </td>
                 <td style="width:  250px"> 
				 <select name="<?php echo "spare_brand".$i; ?>" id="<?php echo "spare_brand".$i; ?>" onChange="getbrand(<?php echo $i; ?>);"  class="form-control" onkeypress="return tabE(this,event)">
                   <option>--Select the Brand--</option>
	<?php
				  $sql="select distinct sbrand from m_spare";
				  $result=mysql_query($sql);
				  while ($row = mysql_fetch_array($result))
					  {
				  $dpm="select * from m_spare_brand where sid='".$row['sbrand']."'";
				  $epm=mysql_query($dpm);
				  $rpm=mysql_fetch_array($epm);
				  
				  
				  ?>
				  <option value="<?php echo $row['sbrand']; ?>"><?php echo $rpm['sbrand']; ?></option>
				  <?php
				  }
				  
				  ?>
    
<select>
				 
				 
				 </td>
					<td style="width:  250px">
					<select name="<?php echo "spare_name".$i; ?>" id="<?php echo "spare_name".$i ?>" onChange="getmrp(<?php echo $i; ?>);"  class="form-control" onkeypress="return tabE(this,event)">
					<select>
					</td>
                <td style="width:  100px">
				<input type="text" name="<?php echo "mrp".$i; ?>" id="<?php echo "mrp".$i;?>" onKeyUp="getamount(<?php echo $i;?>);" placeholder="MRP" onKeyPress="return tabE(this,event)" class="form-control" readonly>
				</td>
				<td style="width:  100px">
				<input type="text" name="<?php echo "qty".$i; ?>" id="<?php echo "qty".$i;?>" onKeyUp="getamount(<?php echo $i;?>);gettotal(<?php echo $i;?>)" onKeyPress="return tabE(this,event)" class="form-control">
				</td>
                  <td style="width:  100px">
				  <input type="text" name="<?php echo "amount".$i;  ?>" id="<?php echo "amount".$i; ?>"   onKeyUp="getamount(<?php echo $i;?>);gettotal(<?php echo $i;?>)"  onKeyPress="return tabE(this,event)" class="form-control" readonly>
				  </td>
                 
                </tr>
				<?php } ?>
				
                </tbody>
              </table>
               
           
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		 <div class="box-body">
             <div class="form-group col-sm-4">
              <label for="Branch">Total Amount</label>
              <input type="text" class="form-control" name="total" id="total" onKeyUp="sumgst();" placeholder="Invoice No" readonly>
                </div>
				<div class="form-group col-sm-4">
              <label for="Branch">Discount %</label>
              <input type="text" class="form-control" name="discount_per" id="discount_per" value="0" onKeyUp="sumgst();" placeholder="Discount %" >
                </div>
				<div class="form-group col-sm-4">
              <label for="Branch">Discount Amount</label>
              <input type="text" class="form-control" name="dicount_amt" id="dicount_amt"  onKeyUp="sumgst();" placeholder="Discount Amount" readonly>
                </div>
				</div>
		 <div class="box-body">
             <div class="form-group col-sm-4">
              <label for="Branch">Total </label>
              <input type="text" class="form-control" name="total_amt" id="total_amt" value="0" onKeyUp="sumgst();" placeholder="Total" readonly>
                </div>
				<div class="form-group col-sm-2">
              <label for="Branch">SGST</label>
              <select type="text" class="form-control" name="sgst" id="sgst" onChange="sumgst();" placeholder="GST">
			  <option value="0">--SGST--</option>
			  <?php 
			  $sg="select sgst from m_gst";
			  $sgt=mysql_query($sg);
			  while($sgst=mysql_fetch_array($sgt))
			  {
			  ?>
			  <option value="<?php echo $sgst['sgst']; ?>"><?php echo $sgst['sgst']; ?></option>
			  <?php
			  }
			  ?>
			  </select>
                </div>
				<div class="form-group col-sm-2">
              <label for="Branch">CGST</label>
              <select type="text" class="form-control" name="cgst" id="cgst" onChange="sumgst();" placeholder="GST">
			  <option value="0">--CGST--</option>
			  <?php 
			  $sg="select cgst from m_gst";
			  $sgt=mysql_query($sg);
			  while($sgst=mysql_fetch_array($sgt))
			  {
			  ?>
			  <option value="<?php echo $sgst['cgst']; ?>"><?php echo $sgst['cgst']; ?></option>
			  <?php
			  }
			  ?>
			  </select>
                </div>
				<div class="form-group col-sm-2">
              <label for="Branch">IGST</label>
              <select type="text" class="form-control" name="igst" id="igst" onChange="sumgst();" placeholder="GST">
			  <option value="0">--IGST--</option>
			  <?php 
			  $sg="select igst from m_gst";
			  $sgt=mysql_query($sg);
			  while($sgst=mysql_fetch_array($sgt))
			  {
			  ?>
			  <option value="<?php echo $sgst['igst']; ?>"><?php echo $sgst['igst']; ?></option>
			  <?php
			  }
			  ?>
			  </select>
                </div>
				<div class="form-group col-sm-2">
              <label for="Branch">GST Amount</label>
              <input type="text" class="form-control" name="gst_amt" id="gst_amt" onChange="sumgst();" placeholder="GST Amount" readonly>
                </div>
				</div>
				 <div class="box-body">
             <div class="form-group col-sm-4">
              <label for="Branch">Bill AMount </label>
              <input type="text" class="form-control" name="bill_amt" id="bill_amt" onChange="sumgst();" placeholder="Bill AMount" readonly>
                </div>
				<div class="form-group col-sm-4">
              <label for="Branch">Received Amount</label>
              <input type="text" class="form-control" name="recable_amount" id="recable_amount" value="0" onKeyUp="sumgst();" placeholder="Amount Payable" >
                </div>
				<div class="form-group col-sm-4">
              <label for="Branch">Blance Amount</label>
              <input type="text" class="form-control" name="balance_amount" id="balance_amount" onKeyUp="sumgst();" placeholder="Blance Amount" readonly>
                </div>
				<div class="form-group col-sm-4">
              <label for="Branch">Payment Mode</label>
              <select type="text" class="form-control" name="payment_mode" id="payment_mode" placeholder="Payment Mode" onchange = "ShowHideDiv()" required>
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
			  $bankq=mysql_query($bank);
			  while($bankfetch=mysql_fetch_array($bankq))
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
				<div class="form-group col-sm-6" style="display:none">
                  <label for="Branch">Bank Id</label>
                  <input type="text" class="form-control" name="BankId" id="BankId" readonly>
                </div>
				
					<div class="form-group col-sm-6" style="display:none">
                  <label for="Branch">Ledger Id</label>
                  <input type="text" class="form-control" name="LedgerId" id="LedgerId" readonly>
                </div>
				</div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Ledger Group</label>
                  <select class="form-control" name="LedgerGroup" id="LedgerGroup">
				  <?php
				  $lg="select * from m_ledger_group where id='26'";
				  $lgr=mysql_query($lg);
				  while($lgroup=mysql_fetch_array($lgr))
				  {
				  ?>
				 
				  <option value="<?php echo $lgroup['id'];?>"><?php echo $lgroup['ledger_group'];?></option>
				  <?php
				  }
				  ?>
				  </select>
                </div>	
				
				</div>
		
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" Onclick="return confirm('Are you sure want to proceed?')">Create Entry for this supplier</button>
                </div>    
         </div>
    
	</section>
    <!-- /.content -->

	
	</form>
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
