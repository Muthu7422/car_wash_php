<?php
error_reporting(0);
ob_start();
include("../../includes.php");
include("../../redirect.php");



$abc1="select sname,spartno,smrp,sid from m_spare where status='Active' AND franchisee_id='".$_SESSION['FranchiseeId']."'";
$abcd1=mysqli_query($conn,$abc1);
$auto_sparename="[";
$autoPartName="[";
while($ac1=mysqli_fetch_array($abcd1))
{   $stemp=$ac1['spartno']." / ".$ac1['sname']." / ".$ac1['smrp']." / ".$ac1['sid'];
    $pnTemp=$ac1['sname']." / ".$ac1['spartno']." / ".$ac1['smrp']." / ".$ac1['sid'];

	$auto_sparename.="'".$stemp."',";
	$autoPartName.="'".$pnTemp."',";
}
 $auto_sparename.="'']";
 $autoPartName.="'']";
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
function isNumberKey(evt, element) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57) && !(charCode == 46 || charCode == 8))
    return false;
  else {
    var len = $(element).val().length;
    var index = $(element).val().indexOf('.');
    if (index > 0 && charCode == 46) {
      return false;
    }
    if (index > 0) {
      var CharAfterdot = (len + 1) - index;
      if (CharAfterdot > 3) {
        return false;
      }
    }

  }
  return true;
}
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

// function spare_mrp(val) {
	// alert("ghghjgjh");
	// $.ajax({
	// type: "POST",
	// url: "spare_mrp.php",
	// data:'country_id='+val,
	// success: function(data){
		// $("#spart_no").html(data);
		// }
		// });
		// }
		function spare_mrp(){ 
    var qty = 0;
    var inputs = document.getElementById('sparename').value;


$.ajax({
      type:'post',
        url:'spare_part_no.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("spart_no").value=msg;
   
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
//Autocomplete start
function clearPartNo()
{
	document.getElementById('spart').value = '';
}
function clearPartName()
{
	document.getElementById('sname').value = '';
}
function focusTBPartNo()
{
	document.getElementById("partno").focus();
}
function GetItemDetails(){ 
    var qty = 0;
	var inputs='';
	if(document.getElementById('sname').value.length>0)
	{
		 inputs = document.getElementById('sname').value;
	}
    if(document.getElementById('spart').value.length>0)
	{
		 inputs = document.getElementById('spart').value;
	}
$.ajax({
      type:'post',
        url:'get_spare_details.php',// put your real file name 
        data:{inputs},
		dataType: 'json',
        success:function(msg){
			//alert('msg'+msg);
         document.getElementById("sid").value=msg[0];			  
      	
		document.getElementById("gst").value=msg[4];
		document.getElementById("partname").value=msg[1];
		document.getElementById("hsncode").value=msg[3];
		document.getElementById("partno").value=msg[2];
		
		document.getElementById("mrp1").value=msg[5];
		document.getElementById("unit").value=msg[7];
		document.getElementById("sbrand").value=msg[8];
		document.getElementById("brandid").value=msg[9];
		document.getElementById("unitid").value=msg[10];
		document.getElementById("rate").value=msg[6];
		
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
        document.getElementById("BCashb").value=msg;
   
       }
 });

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
	 function ShowHideDiv1() {
        var paymentoption = document.getElementById("paymentoption");
        var bank = document.getElementById("bank_details1");
		if(paymentoption.value == "Cash")
		{
	        bank.style.display = paymentoption.value == "Cash" ? "block" : "none";
		}
		
		else
		{
			
			 bank.style.display = paymentoption.value == "" ? "block" : "none";
		}
	 }
	  function ShowHideDiv2() {
        var paymentoption = document.getElementById("paymentoption");
        var bank = document.getElementById("bank_details2");
		if(paymentoption.value == "Bank")
		{
	        bank.style.display = paymentoption.value == "Bank" ? "block" : "none";
		}
		
		else
		{
			
			 bank.style.display = paymentoption.value == "" ? "block" : "none";
		}
	 }
</script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script type="text/javascript">
	
 function myFunction() {
   // window.open("myModal?id="+$val,"_blank","toolbar=no,top=50,left=50,width=1300px,height=600,addressbar=no");
	// $('#myModal').modal({
    // show: 'false'
// });
 //$('#bookId').val($(this).data('id'));
//alert("ewe"+val($(this).data('id')));
	$('#myModal').modal('show'); 
 }

</script>
 <style>
div.ex3 {
   border: 1px solid black;
  
}
.modal-content
{
	width:150%;
}
</style> 
  
        <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
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
	
	var discount_per= parseFloat(document.getElementById("discount_per").value);
	
	
	var total=purchase_rate*qty;
		document.getElementById("total").value=total.toFixed(2);
	
	var discountper=discount_per;
	
	var dis_amt=(discountper/100)*total;
	document.getElementById("discount_amt").value=dis_amt.toFixed(2);
	var disct_amt=total-dis_amt;
	var gstper=gst;
	var gst_amt=(gstper/100)*disct_amt;
		document.getElementById("gst_amt").value=gst_amt.toFixed(2);
	var net_amt=gst_amt+disct_amt;
		document.getElementById("net_amt").value=net_amt.toFixed(2);
	
}

</script>	 
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="purchase_popup_act.php" autocomplete="off">   
 <div class="box box-primary">	
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Invoice No</label>
				  <?php
				   $sem1="select * from m_vendor where id='".$_SESSION['VendorId']."'";
				  $arr1=mysqli_query($conn,$sem1);
				  $spm1=mysqli_fetch_array($arr1);
				  
				  $in="select * from s_purchase_details_temp where id='".$_REQUEST['id']."'";
				  $Ein=mysqli_query($conn,$in);
				  $Fin=mysqli_fetch_array($Ein);
				  
				  $dem="select * from m_supplier where sid='".$Fin['supplier_name']."'";
				  $rmp=mysqli_query($conn,$dem);
				  $rcm=mysqli_fetch_array($rmp);
				  
				  $sem="select * from m_vendor where id='".$Fin['FrachiseeId']."'";
				  $arr=mysqli_query($conn,$sem);
				  $spm=mysqli_fetch_array($arr);
				  
				  $sem2="select * from m_unit_master where id='".$Fin['unit']."'";
				  $arr2=mysqli_query($conn,$sem2);
				  $spm2=mysqli_fetch_array($arr2);
				  
				   $sem3="select * from m_spare where sid='".$Fin['spare_name']."'";
				  $arr3=mysqli_query($conn,$sem3);
				  $spm3=mysqli_fetch_array($arr3);
				 
				  $sem4="select * from m_spare_brand where sid='".$Fin['spare_brand']."'";
				  $arr4=mysqli_query($conn,$sem4);
				  $spm4=mysqli_fetch_array($arr4);
				  
				  ?>
                  <input type="text" class="form-control" name="inv_no" id="inv_no" value="<?php echo $Fin['inv_no']; ?>" placeholder="Invoice No" readonly>
                  <input type="hidden" class="form-control" name="pid" id="pid" value="<?php echo $Fin['id']; ?>" placeholder="Invoice No" readonly>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
                  <input type="date" class="form-control" name="pdate" id="pdate"  value="<?php echo $Fin['pdate']; ?>" placeholder="Date" readonly>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">To Vendor Name</label>
                 <input type="text" class="form-control" name="Franchisee" id="Franchisee"  value="<?php echo $spm1['franchisee_name']; ?>" placeholder="Vendor Name" readonly>
                 <input type="hidden" class="form-control" name="FranchiseeId" id="FranchiseeId"  value="<?php echo $spm1['id']; ?>" placeholder="Vendor Name" readonly>
           
                </div> </div>
				 <div class="box-body">
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier Name</label>
                  <select class="form-control" id="supplier_name" name="supplier_name" onChange="outstanding(this.value);brand_name(this.value)" readonly>
				  <option value="<?php echo $rcm['sid']; ?>"><?php echo $rcm['sname']; ?></option>
				  <option value="">Select</option>
				  
				  <?php 
				  $ssc="select * from m_supplier where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['sid']; ?>"><?php echo $FEssc['sname']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Outstanding</label>
                  <input class="form-control" name="out" id="out" value="<?php echo $Fin['outstand']; ?>" readonly  placeholder="Outstanding" >
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">GSTIN</label>
                  <input type="text" class="form-control" value="<?php echo $Fin['gstin']; ?>" readonly name="gstin" id="gstin">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Brand</label>
                  <input class="form-control" id="sbrand" name="sbrand" value="<?php echo $spm4['sbrand']; ?>" readonly>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Name</label>
               <input class="form-control"  id="sparename" name="sparename" value="<?php echo $spm3['sname']; ?>" readonly>
              </div>
				<div class="form-group col-sm-4">
                 <label for="Branch">Spare Part No</label>
                 <input type="text" class="form-control" value="<?php echo $Fin['spare_part_no']; ?>" id="spart_no" name="spart_no" readonly>
			    </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Units</label>
               <input class="form-control"  id="unit" name="unit" value="<?php echo $spm2['u_name']; ?>" readonly>
			  
				 
                </div>
				<div class="form-group col-sm-2 hidden">
                  <label for="Branch">Mrp</label>
                  <select type="text" class="form-control" name="prate" id="prate" value="<?php echo $Fin['gstin']; ?>" onKeyUp="sumpurchase();" placeholder="Purchase Rate">
				  </select>
                </div>
				

				<div class="form-group col-sm-2">
                  <label for="Branch">Purchase Rate</label>
                  <input type="text" class="form-control" name="purchase_rate" id="purchase_rate" value="<?php echo $Fin['purchase_rate']; ?>" onKeyUp="sumpurchase();" readonly>
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Quantity</label>
                  <input type="text" class="form-control" name="qty" id="qty" value="<?php echo $Fin['qty']; ?>" onKeyUp="sumpurchase();">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Total</label>
                  <input type="text" class="form-control" name="total" id="total" value="<?php echo $Fin['total']; ?>" onKeyUp="sumpurchase();" readonly >
                </div>
								<div class="form-group col-sm-2">
                  <label for="Branch">Discount %</label>
                  <input type="text" class="form-control" name="discount_per" id="discount_per" value="<?php echo $Fin['discount']; ?>" onKeyUp="sumpurchase();" required>
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Discount Rate</label>
                  <input type="text" class="form-control" name="discount_amt" id="discount_amt" value="<?php echo $Fin['discount_amt']; ?>" onKeyUp="sumpurchase();" readonly>
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">GST</label>
                  <input type="text" class="form-control" name="gst" id="gst" value="<?php echo $Fin['TotalGstPer']; ?>" onChange="sumpurchase();" readonly>


                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">GST Amount</label>
                  <input type="text" class="form-control" name="gst_amt" id="gst_amt" value="<?php echo $Fin['gst_amt']; ?>" onKeyUp="sumpurchase();" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Net Amount</label>
                  <input type="text" class="form-control" name="net_amt" id="net_amt" value="<?php echo $Fin['net_amount']; ?>" readonly>
                </div>
            </div>
			
			
			<div class="box-footer">
                <button type="submit" name="PopUp" id="PopUp"  class="btn btn-info pull-right">Save The Purchase</button>
                </div> 
                </div> 

				
	
        
    </form>
	</section>

     
</div>
</div>
</div>
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
				  				   $sem1="select * from m_vendor where id='".$_SESSION['VendorId']."'";
				  $arr1=mysqli_query($conn,$sem1);
				  $spm1=mysqli_fetch_array($arr1);
				  $in="select * from s_purchase_details_temp where inv_no='".$_REQUEST['inv_no']."'";
				  $Ein=mysqli_query($conn,$in);
				  $Fin=mysqli_fetch_array($Ein);
				  
				  $dem="select * from m_supplier where sid='".$Fin['supplier_name']."'";
				  $rmp=mysqli_query($conn,$dem);
				  $rcm=mysqli_fetch_array($rmp);
				  
				  $sem="select * from m_vendor where id='".$Fin['FrachiseeId']."'";
				  $arr=mysqli_query($conn,$sem);
				  $spm=mysqli_fetch_array($arr);
				  
				  
				 
				  
				  ?>
                  <input type="text" class="form-control" name="inv_no" id="inv_no" value="<?php echo $Fin['inv_no']; ?>" placeholder="Invoice No" required>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
                  <input type="date" class="form-control" name="pdate" id="pdate"  value="<?php echo date('Y-m-d'); ?>" placeholder="Date" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Purchase Order No</label>
                  <select type="text" class="form-control" name="PurchaseOrderNo" id="PurchaseOrderNo"   >
				  <option value="">--Select The Value--</option>
				  <?php
				  $R="select * from s_purchase_order";
				  $RR=mysqli_query($conn,$R);
				  while($RRR=mysqli_fetch_array($RR))
				  {
				  ?>
				  <option value=" <?php echo $RRR['inv_no']; ?> "><?php echo $RRR['inv_no']; ?></option>
				  <?php
				  }
				  ?>
				  </select>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">To Vendor Name</label>
                 <input type="text" class="form-control" name="Franchisee" id="Franchisee"  value="<?php echo $spm1['franchisee_name']; ?><?php echo $spm['franchisee_name']; ?>" placeholder="Vendor Name" readonly>
                 <input type="hidden" class="form-control" name="FranchiseeId" id="FranchiseeId"  value="<?php echo $spm1['id']; ?><?php echo $spm['id']; ?>" placeholder="Vendor Name" readonly>
           
                </div> </div>
				 <div class="box-body">
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier Name</label>
                  <select class="form-control" id="supplier_name" name="supplier_name" onChange="outstanding(this.value);brand_name(this.value)">
				  <option>--Select The Name--</option>
			  <?php 
				  $ssc="select * from m_supplier where franchisee_id='".$_SESSION['FranchiseeId']."' AND status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				   <option value="<?php echo $FEssc['sid'];?>"<?php if($FEssc['sid']==$Fin['supplier_name']) {?>selected<?php } ?>><?php echo $FEssc['sname'];?></option>
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
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Partno(Partno/Partname/(ID-for Ref))</label>
                  <input type="text" class="form-control" id="spart" name="spart" onFocus="clearPartName();" onfocusout="GetItemDetails();focusTBPartNo();">
				</div>	
				<div class="form-group col-sm-2" align="center">
                  <label for="Branch">(OR)</label>                  
				</div>	
                <div class="form-group col-sm-4">
                  <label for="Branch">Spare Name(Partname/Partno/(ID-for Ref))</label>
                  <input type="text" class="form-control" id="sname" name="sname" onFocus="clearPartNo();" >
				</div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Brand</label>
                  <input class="form-control" id="sbrand" name="sbrand" onFocus="GetItemDetails();" readonly>
                </div>
                <div class="form-group col-sm-4">
                  <label for="Branch">Part No</label>
                  <input type="text" class="form-control" name="partno" id="partno"  onKeyPress="return tabE(this,event)" readonly placeholder="Part No">
                </div>				
				<div class="form-group col-sm-4">
                  <label for="Branch">HSN Code</label>
                  <input type="text" class="form-control" name="hsncode" id="hsncode"  readonly placeholder="HSN Code">
                </div>				
				<div class="form-group col-sm-4">
                  <label for="Branch">Part Name</label>
                  <input type="text" class="form-control" name="partname" id="partname"  readonly placeholder="Name">
                </div>				
					
               <div class="form-group col-sm-4 hidden">
                  <label for="Branch">MRP</label>
                  <input type="text" class="form-control" name="mrp1" id="mrp1" onKeyPress="return tabE(this,event)">
                </div>						
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Tax Amount Rs.</label>
                  <input type="text" class="form-control" name="rate" id="rate" onKeyPress="return tabE(this,event)" readonly placeholder="Tax Amount Rs.">
                </div>	
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Id</label>
                  <input type="text" class="form-control" name="sid" id="sid" readonly placeholder="">
                </div>
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">BrandId</label>
                  <input type="text" class="form-control" name="brandid" id="brandid" readonly placeholder="">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Units</label>
             
			  <input type="text" class="form-control" name="unit" id="unit" readonly placeholder="">
			  <input type="hidden" class="form-control" name="unitid" id="unitid" readonly placeholder="">
             
				
                </div>
			
				<div class="form-group col-sm-4">
                  <label for="Branch">Purchase Rate</label>
                  <input type="text" class="form-control" name="purchase_rate" id="purchase_rate" onKeyUp="sumpurchase();">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Quantity</label>
                  <input type="text" class="form-control" name="qty" id="qty" onKeyUp="sumpurchase();">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Total</label>
                  <input type="text" class="form-control" name="total" id="total" onKeyUp="sumpurchase();" readonly >
                </div>
				
				<div class="form-group col-sm-2">
              <label for="Branch">GST %</label>
              <input type="text" class="form-control" name="gst" id="gst" onChange="sumpurchase();" placeholder="GST" readonly>
		
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
                <button type="submit" name="Add" id="Add" Onclick="return confirm('Are you sure want to proceed?')" class="btn btn-info pull-right">Save The Purchase</button>
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
				  <th>SPARE</th>
				  <th>PART NO</th>
				  <th>UNIT</th>
				 
				  <th>PURCHASE RATE</th>
				  <th>QTY</th>
				  <th>AMOUNT</th>
				  <th>DISCOUNT</th>
				  <th>TAXABLE VALUE</th>
				   <th>GST</th>
				    <th>TOTAL</th>
				  <th>EDIT</th>
				  <th>DELETE</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from  s_purchase_details_temp order by id";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
					
				 	 $sdm="select * from m_spare_brand where sid='".$FEss['spare_brand']."'"; 
					$scm=mysqli_query($conn,$sdm);
					$pqr=mysqli_fetch_array($scm);
					
					$sdm2="select * from m_spare where sid='".$FEss['spare_name']."'"; 
					$scm2=mysqli_query($conn,$sdm2);
					$pqr2=mysqli_fetch_array($scm2);
					
					$sdm1="select * from m_supplier where sid='".$FEss['supplier_name']."'"; 
					$scm1=mysqli_query($conn,$sdm1);
					$pqr1=mysqli_fetch_array($scm1);
					
					 $ses="select * from m_unit_master where id='".$FEss['unit']."'";
					$arrs=mysqli_query($conn,$ses);
					$spms=mysqli_fetch_array($arrs);
					
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo $pqr1['sname'];  ?></td>
				  <td><?php  echo $pqr['sbrand']; ?></td>
				  <td><?php  echo $pqr2['sname']; ?></td>
				  <td><?php  echo $FEss['spare_part_no']; ?></td>
				<td><?php  echo $spms['u_name']; ?></td>
				
				<td><?php  echo $FEss['purchase_rate']; ?></td>
				<td><?php  echo $FEss['qty']; ?></td>
				<td><?php  echo $FEss['total']; ?></td>
				<td><?php  echo $FEss['discount']; ?></td>
				<td><?php  echo $FEss['discount_amt']; ?></td>
				  <td><?php  echo $FEss['gst_amt']; ?></td>
				  <td><?php echo $FEss['net_amount']; ?></td>
				   <td onClick="myFunction('<?php echo $FEss['id'];  ?>');"><a value="<?php echo $FEss['id']; ?>" name="bookId" id="bookId" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a></td>
                
				  <td>
				  <a href="purchase_delete_temp.php?id=<?php echo $FEss['id']; ?> && inv_no=<?php echo $FEss['inv_no']; ?>" Onclick="return confirm('Are you sure want to proceed?')" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
				  
                </tr>
				<?php } ?>
                </tbody>
				 <th colspan="12"><span style="float:right">TOTAL : </th>
				 <?php 
				  $sdm="select * from s_purchase_details_temp"; 
					$scm=mysqli_query($conn,$sdm);
					while($pqr=mysqli_fetch_array($scm))
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
                  <input type="text" class="form-control" name="PendingAmount" id="PendingAmount" value="<?php echo $_POST['PendingAmount']; ?>" readonly>
                </div>
			
			<div class="form-group col-sm-4">
                  <label for="Branch">Description</label>
                  <textarea type="text" class="form-control" name="description" id="description"></textarea>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Payment Mode</label>
                  <select type="text" class="form-control" name="paymentoption" id="paymentoption"   onchange = "ShowHideDiv();ShowHideDiv1();ShowHideDiv2()">
				    <option value="">Select the Option</option>
				  <option value="Cash">Cash</option>
				  <option value="Bank">Bank</option>
				   <option value="Credit">Credit</option>
				   <option value="Cheque">Cheque</option>
				   <option value="Neft">Neft</option>
				   <option value="RTGS">RTGS</option>
				      <option value="Card">Card</option>
				   <option value="UPI">UPI</option>
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
				
					<div class="form-group col-sm-8" id="bank_details1" style="display:none">
				
					<?php 		
					$acc1="select * from account_cash order by id desc";
					$sccq1=mysqli_query($conn,$acc1);
					$acf1=mysqli_fetch_array($sccq1);
					
					$OB=$acf1['cash_bal'];
					
?>
 	
			 <div class="form-group col-sm-4 ">
                  <label for="Branch">Balance Amount</label>
                  <input type="text" class="form-control" name="BCash" id="BCash" value="<?php  echo $OB; ?>">
                 
				  </div> 
				</div>
				<div class="form-group col-sm-8" id="bank_details2" style="display:none">
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Bank Name</label>
				  <select type="text" class="form-control" name="BankNameT" id="BankNameT" onchange="getamount();">
				  <option value="">--Select Bank--</option>
				  <?php 
				  $set="select * from a_bank_acc where status='Active' order by Id";
				  $Eset=mysqli_query($conn,$set);
				  while($FEset=mysqli_fetch_array($Eset))
				  {
				  ?>
				  <option value="<?php echo $FEset['Id']; ?>"><?php echo $FEset['BankName']; ?></option>
				  <?php
				  } ?>
				  </select>
     	  </div>	

			 <div class="form-group col-sm-4 ">
                  <label for="Branch">Balance Amount</label>
                  <input type="text" class="form-control" name="BCashb" id="BCashb" >
				  </div> 
				</div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Ledger Group</label>
				  <?php
				  $lg="select * from m_ledger_group where id='23'";
				  $lgr=mysqli_query($conn,$lg);
				  $res=mysqli_fetch_array($lgr);
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
                <button type="submit" class="btn btn-info pull-right" >Submit The Purchase</button>
                </div>    
         </div>  </div>
    
	</section>
    <!-- /.content -->
	</form>
  <!-- /.content-wrapper -->
 <!--footer start-->
 <script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/

spart = <?php echo $autoPartName; ?>;
sname = <?php echo $auto_sparename; ?>;
/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("spart"), sname);
autocomplete(document.getElementById("sname"), spart);
//autocomplete(document.getElementById("OldCustomer"), OldCustomers);

</script>
 
 <?php include("../../footer.php"); ?>
  <!--footer End-->
    <div class="control-sidebar-bg"></div>
</div>
 <?php include("../../includes_db_js.php"); ?>
</body>
</html>
