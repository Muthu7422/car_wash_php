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


function gethsn($i){ 
    var qty = 0;
    var inputs = document.getElementById('spare_name'+$i+'').value;


$.ajax({
      type:'post',
        url:'get_hsn.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("hsn"+$i).value=msg;
   
       }
 });

}


function gettax($i){ 
    var qty = 0;
    var inputs = document.getElementById('spare_name'+$i+'').value;


$.ajax({
      type:'post',
        url:'get_tax.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("TaxOfMrp"+$i).value=msg;
   
       }
 });

}


function ratec($i)
{
	rate=0;
	

var mrp = parseFloat(document.getElementById('mrp'+$i+'').value);
var taxpercentage = parseFloat(document.getElementById('TaxOfMrp'+$i+'').value);

var input = 100+taxpercentage;
var rate1 = (taxpercentage/input)*mrp;
var rate2 = mrp-rate1;


document.getElementById('BeforeTaxOfMrp'+$i+'').value=rate2.toFixed(2);



}
function getamount($i)
{
	amount=0;
	

var BeforeTaxMrp = document.getElementById('BeforeTaxOfMrp'+$i+'').value;
var qty = document.getElementById('qty'+$i+'').value;

var amount=BeforeTaxMrp*qty;

document.getElementById('amount'+$i+'').value=amount.toFixed(2);
document.getElementById('total_amount'+$i+'').value=amount.toFixed(2);


}

function gettotal($i)
{ 

	var total = 0;
	var totalBT = 0;
	
    inputs1 = document.getElementById('total_amount'+$i+'').value;
	for ( var index = 1; index <= $i; index++)
	{
		//alert('hai');
		
		//if (parseFloat(inputs1[index].value)){
         totalBT =totalBT + parseFloat(document.getElementById('amount'+index+'').value);
		 total =total + parseFloat(document.getElementById('total_amount'+index+'').value);
	    //alert('hai');
		//}
	}
	document.getElementById('bill_amt').value = total.toFixed(2);
	document.getElementById('total').value = totalBT.toFixed(2);
	
}

function sumgst($i)
{
    var total= parseFloat(document.getElementById('amount'+$i+'').value);
	var gst=parseFloat(document.getElementById('gst'+$i+'').value);
	
	 var gst1=(gst/100)*total;
	
	 var total_amt=total+gst1;
	  document.getElementById('tax_amt'+$i+'').value=gst1.toFixed(2);
	  	  document.getElementById('total_amount'+$i+'').value=total_amt.toFixed(2);
}

function getgstsum($i)
{
	

	var cgstt = 0;
	var sgstt = 0;
	var igstt = 0;
	var TTAX = 0;
	
    inputs1 = document.getElementById('gst'+$i+'').value;
	for ( var index = 1; index <= $i; index++)
	{
		//alert('hai');
		
		//if (parseFloat(inputs1[index].value)){
      
		 TTAX=TTAX + parseFloat(document.getElementById('tax_amt'+index+'').value);
	    //alert('hai');
		//}
	}
	
	document.getElementById('TotalTaxAmount').value = TTAX.toFixed(2);
	

}

function amcpoint(){
  var inputs = document.getElementById('customer_name').value;
	$.ajax({
	type:'POST',
	url:'get_amce.php',
	data:{inputs},
	dataType:'json',
	success:function(msg){
	document.getElementById("amcep").value=msg[0];
	document.getElementById("mobile").value=msg[1];
	
        }
	  });
	 }


    function pending()
{
	var input3 = 0;
	var input1=document.getElementById('amcep').value;
	var input2=document.getElementById('u_am_point').value;
	input3=input1-input2;
	document.getElementById('b_am_point').value=input3.toFixed(2);
	
}

    function ShowHideDiv() {
        var ttype = document.getElementById("ttype");
        var bank = document.getElementById("bank_details");
		if(ttype.value == "Bank")
		{
	        bank.style.display = ttype.value == "Bank" ? "block" : "none";
		}

		else
		{
			
			 bank.style.display = ttype.value == "" ? "block" : "none";
		}
		
				 
				 
		var ttype = document.getElementById("ttype");
        var cash = document.getElementById("cash_details");
		if(ttype.value == "Cash")
		{
	        cash.style.display = ttype.value == "Cash" ? "block" : "none";
		}
		
		else
		{
			
			 cash.style.display = ttype.value == "" ? "block" : "none";
		}
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
				  $in="select * from sales_invoice where franchisee_id='".$_SESSION['BranchId']."'";
				  $Ein=mysqli_query($conn,$in);
				  $n=mysqli_num_rows($Ein);
				  $Fin=mysqli_fetch_array($Ein);
				  $ns1=$n+0001;
				  
				    $month = date('m');
					$day = date('d');
					$year = date('Y');

					$today = $year . '-' . $month . '-' . $day;
					

		    	$mob="select * from a_customer where cust_name='".$_POST['customer']."'";
			$mobi=mysqli_query($conn,$mob);
			$mobil=mysqli_fetch_array($mobi);	

				  
				  ?>
                  <input type="text" class="form-control" name="inv_no" id="inv_no" value="<?php echo SA.$ns1 ?>" placeholder="Invoice No" readonly required>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
				  
                  <input type="date" class="form-control" name="date" id="date"  value="<?php echo date('Y-m-d'); ?>" placeholder="Date" required>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Branch Name</label>
				  <?php
				  $rpm="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'";
				  $rps=mysqli_query($conn,$rpm);
				  $spu=mysqli_fetch_array($rps);
				  
				  ?>
                  <select type="text" class="form-control" name="branch_name" id="branch_name" value="" readonly>
				  <option value="<?php echo $spu['id'] ?>"><?php echo $spu['franchisee_name'] ?></option>
				  </select>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
                  <select class="form-control" id="customer_name" name="customer_name" onChange="amcpoint(this.value);" required>
				  <option value="">Select</option>
				  <?php 
				  $ssc="select * from a_customer where status='Active' and  FrachiseeId='".$_SESSION['BranchId']."'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				 <option value="<?php echo $FEssc['id']; ?>" <?php if($FEssc['cust_name']==$mobil['cust_name']){ ?>selected <?php }?>><?php echo $FEssc['cust_name']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				
						 <div class="form-group col-sm-4">  
				   <label for="Branch">Mobile No</label>
			       <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $mobil['mobile1']; ?>"   placeholder="Mobile Number" >
				 </div>
				
						 <div class="form-group col-sm-4">  
				   <label for="Branch">Gift Points</label>
			       <input type="text" class="form-control" name="amcep" id="amcep" value="<?php echo $mobil['AMCEarned']; ?>"   placeholder="Gift Points" >
				 </div>	
				 
				          <div class="form-group col-sm-4">
                  <label for="Branch">Use Gift Point</label>
                  <select  type="date" class="form-control" name="PaymentMode" id="PaymentMode"  >
				  <option value="No">No</option>
				  <option value="Yes">Yes</option>
				  </select>
                </div>
				 
				 
				 			<div class="form-group col-sm-3">
              <label for="Branch">Used Gift Point</label>
              <input type="text" class="form-control" name="u_am_point" id="u_am_point"  placeholder="Use Gift point" onChange="pending();" >
                </div>
				                           
				<div class="form-group col-sm-3">
              <label for="Branch">Balance Gift Point</label>
              <input type="text" class="form-control" name="b_am_point" id="b_am_point"  placeholder="Balance Gift points">
                </div>
				
					<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Customer Ledger Id</label>
                  <input class="form-control" name="CLI" id="CLI" readonly  placeholder="Customer Ledger Id" >
                </div> 
				
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Customer Outstanding</label>
                  <input class="form-control" name="out" id="out" readonly  placeholder="Outstanding" >
                </div> 
				<div class="form-group col-sm-4 hidden">
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
                 <table class="table-bordered padding-4 disp" style="width:120%;height:10px">
                <thead>
                <tr>
				  <th>S.No</th>
				  <th style="width:  250px">Spare Brand</th>
				  <th style="width:  250px">Spare Name</th>
				  	  <th style="width:  250px">HSN Code</th>
				  <th style="width:  100px">MRP</th>
				 <!-- <th style="width:  150px">Tax % (MRP)</th> -->
				 <th style="width:  130px">Before TAX</th>
				  <th style="width:  60px">Qty</th>
				  <th style="width:  200px">Taxable Amount</th>
				   <th style="width:  150px">GST</th>
				    <th style="width:  150px">Tax Amount</th>
					   <th style="width:  150px">TOTAL AMOUNT</th>
                </tr>
                </thead>
                <tbody>
				<?php
				for($i=1;$i<10;$i++)
				{
				?>
                <tr>
                  <td><?php echo $i; ?> </td>
                 <td style="width:  250px"> 
				 <select name="<?php echo "spare_brand".$i; ?>" id="<?php echo "spare_brand".$i; ?>" onChange="getbrand(<?php echo $i; ?>);"  class="form-control" onkeypress="return tabE(this,event)">
                   <option>--Select the Brand--</option>
	<?php
				  $sql="select distinct sbrand from m_spare";
				  $result=mysqli_query($conn,$sql);
				  while ($row = mysqli_fetch_array($result))
					  {
				  $dpm="select * from m_spare_brand where sid='".$row['sbrand']."' and franchisee_id='".$_SESSION['FranchiseeId']."' ";
				  $epm=mysqli_query($conn,$dpm);
				  $rpm=mysqli_fetch_array($epm);
				  
				  
				  ?>
				  <option value="<?php echo $row['sbrand']; ?>"><?php echo $rpm['sbrand']; ?></option>
				  <?php
				  }
				  
				  ?>
    
<select>
				 
				 
				 </td>
					<td>
					<select name="<?php echo "spare_name".$i; ?>" id="<?php echo "spare_name".$i ?>" onChange="getmrp(<?php echo $i; ?>);gettax(<?php echo $i;?>);;gethsn(<?php echo $i;?>);"  class="form-control" onkeypress="return tabE(this,event)">
					<select>
					</td>
					
				<td style="width:  100px">
				<input type="text" name="<?php echo "hsn".$i; ?>" id="<?php echo "hsn".$i;?>"  placeholder="HSN Code" onKeyUp="getamount(<?php echo $i;?>);ratec(<?php echo $i;?>);" onKeyPress="return tabE(this,event)" class="form-control" readonly>
				
				</td>
					
                <td style="width:  100px">
				<input type="text" name="<?php echo "mrp".$i; ?>" id="<?php echo "mrp".$i;?>" onKeyUp="getamount(<?php echo $i;?>);ratec(<?php echo $i;?>);" placeholder="MRP" onKeyPress="return tabE(this,event)" class="form-control" readonly>
				<input type="hidden" name="<?php echo "TaxOfMrp".$i; ?>" id="<?php echo "TaxOfMrp".$i;?>" placeholder="Tax" onKeyUp="ratec(<?php echo $i;?>)" onKeyPress="return tabE(this,event)" class="form-control" readonly>
				
				</td>
				
				
				
				
				
				<td>
				<input type="text" name="<?php echo "BeforeTaxOfMrp".$i; ?>" id="<?php echo "BeforeTaxOfMrp".$i;?>" placeholder="Before Tax" onKeyPress="return tabE(this,event)" class="form-control" readonly>
				</td>
				
				<td>
				<input type="text" name="<?php echo "qty".$i; ?>" id="<?php echo "qty".$i;?>" onKeyUp="getamount(<?php echo $i;?>);gettotal(<?php echo $i;?>)" onKeyPress="return tabE(this,event)" class="form-control">
				</td>
                  <td>
				  <input type="text" name="<?php echo "amount".$i;  ?>" id="<?php echo "amount".$i; ?>"   onKeyUp="getamount(<?php echo $i;?>);gettotal(<?php echo $i;?>)"  onKeyPress="return tabE(this,event)" class="form-control" readonly>
				  </td>
				  
				  
				  
				  
				  <td>
                   <select type="text" class="form-control" name="<?php echo "gst".$i; ?>" id="<?php echo "gst".$i; ?>" onChange="sumgst(<?php echo $i; ?>);gettotal(<?php echo $i;?>);getgstsum(<?php echo $i;?>)" >
			  <option value="0">--GST--</option>
			  <?php 
			  $sg="select gst from m_gst";
			  $sgt=mysqli_query($conn,$sg);
			  while($sgst=mysqli_fetch_array($sgt))
			  {
			  ?>
			  <option value="<?php echo $sgst['gst']; ?>"><?php echo $sgst['gst']; ?></option>
			  <?php
			  }
			  ?>
			  </select>
				  </td>
				
				
				  
				  <td>
				   <input type="text" name="<?php echo "tax_amt".$i;  ?>" id="<?php echo "tax_amt".$i; ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly>
				   </td>
                  <td>
				   <input type="text" name="<?php echo "total_amount".$i;  ?>" id="<?php echo "total_amount".$i; ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly>
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
              <label for="Branch">Total Taxable Amount</label>
              <input type="text" class="form-control" name="total" id="total"  placeholder="Total Amount" readonly>
                </div>
			
			    <div class="form-group col-sm-3">
                  <label for="party">Total Tax Amount</label>
				  <input type="text" class="form-control" name="TotalTaxAmount" id="TotalTaxAmount" onKeyPress="return tabE(this,event)" readonly='ture'>
               </div>
				  <div class="form-group col-sm-3">
              <label for="Branch">Bill Amount </label>
              <input type="text" class="form-control" name="bill_amt" id="bill_amt"  placeholder="Bill AMount" readonly>
                </div>
				
				<?php 			
				$aa="select * from a_customer where cust_name='".trim($temp['sname'])."' and mobile1='".trim($temp['smobile'])."'";
			$bb=mysqli_query($conn,$aa);
			$cc=mysqli_fetch_array($bb); 
			?>
			
			
				  <div class="form-group col-sm-4 hidden">
			     <label for="catname">Customer Ledger Id</label>
			     <input type="text" class="form-control" name="CLI"  id="CLI"  value="<?php echo $cc['LedgerId'];?>" placeholder="Customer Ledger Id" onKeyPress="return tabE(this,event)" style="text-transform:uppercase"  readonly="true">
				 </div>
				
							<div class="form-group col-sm-4" >
			    <label for="catname">Payment Mode</label>
						<select name="ttype" id="ttype" class="form-control" onchange = "ShowHideDiv()">
				<option value="" >--Select The Paymenty Mode--</option>
				<option value="Cash" >Cash</option>
				<option value="Bank">Bank</option>
				
				</select>
				</div>
				
				
				
	
					 <div class="form-group col-sm-8" id="cash_details" style="display:none">
				

		<?php
				$ss="select * from a_cash_acc where franchisee_id='".$_SESSION['BranchId']."' order by Id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$acc="select SUM(Amount) AS Amount from account_cash where TransactionType='Debit' and franchisee_id='".$_SESSION['BranchId']."' ";
					$sccq=mysqli_query($conn,$acc);
					$acf=mysqli_fetch_array($sccq);
					
					$acc1="select SUM(Amount) AS Amount from account_cash where TransactionType='Credit' and franchisee_id='".$_SESSION['BranchId']."'";
					$sccq1=mysqli_query($conn,$acc1);
					$acf1=mysqli_fetch_array($sccq1);
					
					
					$OB=$FEss['cash']+$acf1['Amount'];
					$open=$OB-$acf['Amount'];
					$i++;
				?>
					  	<div class="form-group col-sm-6" hi>
              <label for="Branch">Available Cash Balance</label> 
              <input type="text" name="cash_balance" id="cash_balance" value="<?php echo $open;  ?>" class="form-control"  readonly></input>
                </div>
				<?php } ?>
				</div>	
				
				
									
							<div class="form-group col-sm-8" id="bank_details" style="display:none">

		<?php
				$ss="select * from a_bank_acc where franchisee_id='".$_SESSION['BranchId']."' order by Id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$acc="select SUM(Amount) AS Amount from account_bank where TransactionType='Debit' and franchisee_id='".$_SESSION['BranchId']."' ";
					$sccq=mysqli_query($conn,$acc);
					$acf=mysqli_fetch_array($sccq);
					
					$acc1="select SUM(Amount) AS Amount from account_bank where TransactionType='Credit' and franchisee_id='".$_SESSION['BranchId']."'";
					$sccq1=mysqli_query($conn,$acc1);
					$acf1=mysqli_fetch_array($sccq1);
					
					
					$OB=$FEss['Amount']+$acf1['Amount'];
					$open=$OB-$acf['Amount'];
					$i++;
				?>
					  	<div class="form-group col-sm-6">
              <label for="Branch">Available Bank Balance</label> 
              <input type="text" name="bank_balance" id="bank_balance" value="<?php echo $open; ?>" class="form-control" readonly></input>
                </div>
				<?php } ?>
				</div>
				
				
				
				
				</div>
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" Onclick="return confirm('Are you sure want to proceed?')">Submit the Sale Invoice</button>
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
