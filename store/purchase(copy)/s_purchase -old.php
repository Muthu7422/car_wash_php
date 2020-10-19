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
      <h1>Purchase</h1>
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


function spare(){ 
    var qty = 0;
    var inputs = document.getElementById('spare_name').value;


$.ajax({
      type:'post',
        url:'get.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("spart_no").value=msg;
   
       }
 });

}

function spare1(){ 
    var qty = 0;
    var inputs = document.getElementById('spare_name').value;


$.ajax({
      type:'post',
        url:'get1.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("prate").value=msg;
   
       }
 });

}

function outstanding(){ 
    var qty = 0;
    var inputs = document.getElementById('supplier_name').value;
	
$.ajax({
      type:'post',
        url:'get_outstanding.php',// put your real file name //data: {inputs: inputs,pno: pno,pdate:pdate},
       data:{inputs},
		//data:{inputs},
		dataType    : 'json',
        success:function(msg){
              // your message will come here.  
        document.getElementById("out").value=msg[0];
		document.getElementById("SLI").value=msg[1];
		document.getElementById("gstin").value=msg[2];
       
       }
 });

}



function supplier(){ 
    var qty = 0;
    var inputs = document.getElementById('supplier_name').value;


$.ajax({
      type:'post',
        url:'get2.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("out").value=msg;
   
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


function brand_name(val) {
	$.ajax({
	type: "POST",
	url: "s_brand_name.php",
	data:'country_id='+val,
	success: function(data){
		$("#sbrand").html(data);
		}
		});
		}
  
function spare_name(val) {
	$.ajax({
	type: "POST",
	url: "spare_name.php",
	data:'country_id='+val,
	success: function(data){
		$("#sparename").html(data);
		}
		});
		}

function spare_mrp(val) {
	$.ajax({
	type: "POST",
	url: "spare_mrp.php",
	data:'country_id='+val,
	success: function(data){
		$("#prate").html(data);
		}
		});
		}
		
function spare_unit(val) {
	$.ajax({
	type: "POST",
	url: "spare_unit.php",
	data:'country_id='+val,
	success: function(data){
		$("#unit").html(data);
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
		
function sumpurchase()
{
	if(document.getElementById("purchase_rate").value=="")
	{
		purchase_rate=0;
	}
	else
	{
	var purchase_rate= parseFloat(document.getElementById("purchase_rate").value);
	}
	if(document.getElementById("qty").value=="")
	{
		qty=0;
	}
	else
	{
	var qty= parseFloat(document.getElementById("qty").value);
	}
	
	var gst= parseFloat(document.getElementById("gst").value);
	
	
	var total=purchase_rate*qty;
		document.getElementById("total").value=total.toFixed(2);
	var gstper=gst;
	var gst_amt=(gstper/100)*total;
		document.getElementById("gst_amt").value=gst_amt.toFixed(2);
	var net_amt=total+gst_amt;
		document.getElementById("net_amt").value=net_amt.toFixed(2);
	
}
		
</script>	 
   <script>
   
   function pending()
{
	var input3 = 0;
	var input1=document.getElementById('NetAmount').value;
	var input2=document.getElementById('PaidAmount').value;
	input3=input1-input2;
	document.getElementById('PendingAmount').value=input3.toFixed(2);
	
}
</script>

<script type="text/javascript">
    function ShowHideDiv() {
        var paymentoption = document.getElementById("paymentoption");
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
</script>

<script>
function sumgst()
{
    
}

</script>
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="s_purchase_temp_act_old.php" enctype="multipart/form-data" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
             <div class="box-header with-border">
             
             <?php if($_REQUEST['m']!="") {?> 
			  <div class="alert alert-danger">
              <b>Invoice No Already Exist ! <i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			   </div>
			   
			   
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Invoice No</label>
				  <?php
				  $in="select * from s_purchase_details_temp where inv_no='".$_REQUEST['inv_no']."'";
				  $Ein=mysql_query($in);
				  $Fin=mysql_fetch_array($Ein);
				  
				  $dem="select * from m_supplier where sid='".$Fin['supplier_name']."'";
				  $rmp=mysql_query($dem);
				  $rcm=mysql_fetch_array($rmp);
				  
				  $sem="select * from m_franchisee where id='".$Fin['FrachiseeId']."'";
				  $arr=mysql_query($sem);
				  $spm=mysql_fetch_array($arr);
				  
				  
				 
				  
				  ?>
                  <input type="text" class="form-control" name="inv_no" id="inv_no" value="<?php echo $Fin['inv_no']; ?>" placeholder="Invoice No" required>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
                  <input type="date" class="form-control" name="pdate" id="pdate"  value="<?php echo $Fin['pdate']; ?>" placeholder="Date" required>
                </div>
				<div  class="hidden">
                  <label for="Branch">Purchase Order No</label>
                  <select type="text" class="form-control" name="PurchaseOrderNo" id="PurchaseOrderNo">
				  <option value="">--Select The Value--</option>
				  <?php
				  $R="select * from s_purchase_order";
				  $RR=mysql_query($R);
				  while($RRR=mysql_fetch_array($RR))
				  {
				  ?>
				  <option value=" <?php echo $RRR['inv_no']; ?> "><?php echo $RRR['inv_no']; ?></option>
				  <?php
				  }
				  ?>
				  </select>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">To Branch Name</label>
                  <select class="form-control" id="FranchiseeId" name="FranchiseeId" >
			  	  <?php 
				  $ssc="select * from m_franchisee where status='Active'";
				  $Essc=mysql_query($ssc);
				  while($FEssc=mysql_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['franchisee_name']; ?></option>
				  <?php } ?>
				  </select>
                </div> </div>
				 <div class="box-body">
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier Name</label>
                  <select class="form-control" id="supplier_name" name="supplier_name" onChange="outstanding(this.value);brand_name(this.value)">
				  
				  
				  
				  <option value="<?php echo $rcm['sid']; ?>"><?php echo $rcm['sname']; ?></option>
				  <option value="">Select</option>
				  
				  <?php 
				  $ssc="select * from m_supplier where status='Active'";
				  $Essc=mysql_query($ssc);
				  while($FEssc=mysql_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['sid']; ?>"><?php echo $FEssc['sname']; ?></option>
				  <?php } ?>
				  </select>
                </div>
					<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Supplier Ledger Id</label>
                  <input class="form-control" name="SLI" id="SLI" value="<?php echo $rcm['LedgerId']; ?>"  placeholder="LEDGER ID" >
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Outstanding</label>
                  <input class="form-control" name="out" id="out" value="<?php echo $Fin['outstand']; ?>" readonly  placeholder="Outstanding" >
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">GSTIN</label>
                  <input type="text" class="form-control" value="<?php echo $Fin['gstin']; ?>" readonly name="gstin" id="gstin">
                </div>
				
				<?php 
				if(isset($_REQUEST['inv_no'])!='')
				{
					
				?>
				<div class="form-group col-sm-4">
				<?php 
				$query ="SELECT * FROM m_spare_brand WHERE supplier = '" . $rcm['sid'] . "' and status='Active'"; 
					$results = mysql_query($query);
					$Fsname=mysql_fetch_array($results);
				  
				  $ssc="select * from m_spare_brand where supplier='".$Fin['supplier_name']."' AND status='Active'";
				  $Essc=mysql_query($ssc);
				
				?>
                  <label for="Branch">Spare / Item Brand</label>
                  <select class="form-control" id="sbrand" name="sbrand" onChange="spare_name(this.value);spare_part(this.value);">
				  <option value="">--Select Spare / Item Brand-- </option>
				  <?php 
				  
				   
				  while($FEssc=mysql_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['sid']; ?>"><?php echo $FEssc['sbrand']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				<?php
				}
				if(isset($_REQUEST['inv_no'])=='')
				{
				?>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare / Item Brand</label>
                  <select class="form-control" id="sbrand" name="sbrand" onChange="spare_name(this.value);spare_part(this.value);">
				 
				  </select>
                </div>
				<?php } ?>
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare / Item Name</label>
               <select class="form-control"  id="sparename" name="sparename" onChange="spare_mrp(this.value);spare_unit(this.value)">
			  
				  </select>
                </div>
				<div class="form-group col-sm-4">
                 <label for="Branch">Spare Part / Item No</label>
                 <input type="text" class="form-control" id="spart_no" name="spart_no">
			    </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Units</label>
               <select class="form-control"  id="unit" name="unit">
			  
				  </select>
                </div>
				<div class="form-group col-sm-2 hidden">
                  <label for="Branch">Mrp</label>
                  <select type="text" class="form-control" name="prate" id="prate"  placeholder="Purchase Rate">
				  </select>
                </div>
				
				<div class="form-group col-sm-2 hidden">
                  <label for="Branch">Discount %</label>
                  <input type="text" class="form-control" name="discount_per" id="discount_per" >
                </div>
				<div class="form-group col-sm-2 hidden">
                  <label for="Branch">Discount Rate</label>
                  <input type="text" class="form-control" name="discount_amt" id="discount_amt" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Purchase Rate</label>
                  <input type="number" class="form-control" name="purchase_rate" id="purchase_rate" onKeyUp="sumpurchase();">
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Quantity</label>
                  <input type="text" class="form-control" name="qty" id="qty" onKeyUp="sumpurchase();">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Total</label>
                  <input type="text" class="form-control" name="total" id="total" onKeyUp="sumpurchase();" readonly >
                </div>
				<div class="form-group col-sm-2">
              <label for="Branch">GST %</label>
              <select type="text" class="form-control" name="gst" id="gst" onChange="sumpurchase();" placeholder="GST">
			  <option value="0">---Select GST---</option>
			  <?php 
			  $sg="select * from m_gst";
			  $sgt=mysql_query($sg);
			  while($sgst=mysql_fetch_array($sgt))
			  {
			  ?>
			  <option value="<?php echo $sgst['gst']; ?>"><?php echo $sgst['gst']; ?></option>
			  <?php
			  }
			  ?>
			  </select>
                </div>
				
				<div class="form-group col-sm-2">
              <label for="Branch">GST Amount</label>
              <input type="text" class="form-control" name="gst_amt" id="gst_amt" onKeyUp="sumpurchase();" placeholder="GST Amount" readonly>
                </div>

				<div class="form-group col-sm-4">
                  <label for="Branch">Net Amount</label>
                  <input type="text" class="form-control" name="net_amt" id="net_amt" readonly>
                </div>
            </div>
			
			
			<div class="box-footer">
                <button type="submit" Onclick="return confirm('Are you sure want to proceed?')" class="btn btn-info pull-right">Save The Purchase</button>
                </div> 

				
			 <div class="box-body">
			 <div class="container_fluid">
			 <div class="row">
                <div class="form-group col-sm-12">
			
                <table id="example" class="table table-bordered">
                <thead>
                <tr>
				  <th>SL NO</th>
                  <th>SUPPLIER</th>
				  <th>BRAND</th>
				  <th>SPARE / ITEM</th>
				  <th>PART NO</th>
				  <th>UNIT</th>
				  <th>MRP</th>
				  <th>DISCOUNT</th>
				  <th>PURCHASE RATE</th>
				  <th>QTY</th>
				  <th>AMOUNT</th>
				   <th>GST</th>
				    <th>TOTAL</th>
				  <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from  s_purchase_details_temp order by id";
				$Ess=mysql_query($ss);
				$i=0;
				while($FEss=mysql_fetch_array($Ess))
				{
					$i++;
					
				 	 $sdm="select * from m_spare_brand where sid='".$FEss['spare_brand']."'"; 
					$scm=mysql_query($sdm);
					$pqr=mysql_fetch_array($scm);
					
					$sdm2="select * from m_spare where sid='".$FEss['spare_name']."'"; 
					$scm2=mysql_query($sdm2);
					$pqr2=mysql_fetch_array($scm2);
					
					$sdm1="select * from m_supplier where sid='".$FEss['supplier_name']."'"; 
					$scm1=mysql_query($sdm1);
					$pqr1=mysql_fetch_array($scm1);
					
					 $ses="select * from m_unit_master where id='".$FEss['unit']."'";
					$arrs=mysql_query($ses);
					$spms=mysql_fetch_array($arrs);
					
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo $pqr1['sname'];  ?></td>
				  <td><?php  echo $pqr['sbrand']; ?></td>
				  <td><?php  echo $pqr2['sname']; ?></td>
				  <td><?php  echo $FEss['spare_part_no']; ?></td>
				<td><?php  echo $spms['u_name']; ?></td>
				<td><?php  echo $FEss['mrp']; ?></td>
				<td><?php  echo $FEss['discount_amt']; ?></td>
				<td><?php  echo $FEss['purchase_rate']; ?></td>
				<td><?php  echo $FEss['qty']; ?></td>
				<td><?php  echo $FEss['total']; ?></td>
				  <td><?php  echo $FEss['gst_amt']; ?></td>
				  <td><?php echo $FEss['net_amount']; ?></td>
				  <td>
				  <a href="purchase_delete _temp.php?id=<?php echo $FEss['id']; ?> && inv_no=<?php echo $FEss['inv_no']; ?>" Onclick="return confirm('Are you sure want to proceed?')" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
                  
                </tr>
				<?php } ?>
                </tbody>
				 <th colspan="12"><span style="float:right">TOTAL : </th>
				 <?php 
				  $sdm="select * from s_purchase_details_temp"; 
					$scm=mysql_query($sdm);
					while($pqr=mysql_fetch_array($scm))
					{
						$ta=$ta+$pqr['net_amount'];
					}
				 
				 ?>
				  <th colspan="2" align="center"><input type="text" name="NetAmount" id="NetAmount" value="<?php echo $ta;  ?>"readonly class="form-control"></th>
              </table>
			  
                </div>
            </div>
			 </div>
            </div>
			 <div class="box-body">
			<div class="form-group col-sm-4">
                  <label for="Branch">Paid Amount</label>
                  <input type="text" class="form-control" name="PaidAmount" id="PaidAmount" onKeyUp="pending();">
                </div>
				
					<div class="form-group col-sm-4">
                  <label for="Branch">Pending Amount</label>
                  <input type="text" class="form-control" name="PendingAmount" id="PendingAmount" readonly>
                </div>
			
			<div class="form-group col-sm-4">
                  <label for="Branch">Description</label>
                  <textarea type="text" class="form-control" name="description" id="description"></textarea>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Payment Mode</label>
                  <select type="text" class="form-control" name="paymentoption" id="paymentoption"  onchange = "ShowHideDiv()">
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
				
				<div class="form-group col-sm-4">
              <label for="Branch">Cheque Number Or Reference No</label>
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
				<div class="form-group col-sm-4">
                  <label for="Branch">Ledger Group</label>
				  <?php
				  $lg="select * from m_ledger_group where id='23'";
				  $lgr=mysql_query($lg);
				  $res=mysql_fetch_array($lgr);
				  ?>
                  <select class="form-control" name="LedgerGroup" id="LedgerGroup">
				  <option value="<?php echo $res['id'];?>"><?php echo $res['ledger_group'];?></option>
				  </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Image Upload</label>
                  <input type="file" class="form-control" name="PurchasePhoto" id="PurchasePhoto">
                </div>
				                </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		  <div class="box-body">
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" Onclick="return confirm('Are you sure want to proceed?')">Submit The Purchase</button>
                </div>    
         </div>  </div>
    
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
