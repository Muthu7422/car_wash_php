<?php
error_reporting(0);
ob_start();
include("../../includes.php");
include("../../redirect.php");



$abc1="select sname,spartno,smrp,sid from m_spare where status='Active' AND franchisee_id='".$_SESSION['BranchId']."'";
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
		
function sumpurchase($i)
{
	var totalBT = 0;
	if(document.getElementById('purchase_rate'+$i+'').value=='')
	{
		purchase_rate=0;
	}
	else
	{
	var purchase_rate= parseFloat(document.getElementById('purchase_rate'+$i+'').value);
	}
	if(document.getElementById('qty'+$i+'').value=='')
	{
		qty=0;
	}
	else
	{
	var qty= parseFloat(document.getElementById('qty'+$i+'').value);
	}
	
	var gst= parseFloat(document.getElementById('gst'+$i+'').value);
	
	var discount_per= parseFloat(document.getElementById('discount_per'+$i+'').value);
	
	
	var total=purchase_rate*qty;
		document.getElementById('total'+$i+'').value=total.toFixed(2);
	
	var discountper=discount_per;
	
	var dis_amt=(discountper/100)*total;
	document.getElementById('discount_amt2'+$i+'').value=dis_amt.toFixed(2);
	var disct_amt=total-dis_amt;
	document.getElementById('discount_amt'+$i+'').value=disct_amt.toFixed(2);
	var gstper=gst;
	var gst_amt=(gstper/100)*disct_amt;
		document.getElementById('gst_amt'+$i+'').value=gst_amt.toFixed(2);
	var net_amt=gst_amt+disct_amt;
		document.getElementById('net_amt'+$i+'').value=net_amt.toFixed(2);
		for ( var index = 1; index <= $i; index++)
	{
				
		//if (parseFloat(inputs1[index].value)){
         totalBT =totalBT + parseFloat(document.getElementById('net_amt'+index+'').value);
		 
	    //alert('hai');
		//}
	}
	document.getElementById('NetAmount').value = totalBT.toFixed(2);
	
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

<script>
		function myFunction($val) {
    window.open("purchase_popup.php?id="+$val,"_blank","toolbar=no,top=50,left=50,width=1300px,height=600,addressbar=no");
	
	
}

function purchseorder(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","get_order_details.php?q="+str,true);
  xmlhttp.send();
}
</script>
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="s_purchase_order_create_act.php" enctype="multipart/form-data" autocomplete="off">
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
				  
				  if($_POST['jobtype']=='Order_no')
	       {
			 $mob="select * from s_purchase_order where inv_no='".$_POST['Orderno']."'";
			$mobi=mysqli_query($conn,$mob);
			$mobil=mysqli_fetch_array($mobi);
		
		   $ssc="select * from m_supplier where  sid='".$mobil['supplier_name']."' AND status='Active'";
		   $Essc=mysqli_query($conn,$ssc);
		  $FEssc=mysqli_fetch_array($Essc);
			
			$_SESSION['orderid']=$mobil['id'];
			
	      }
	
				  $sem1="select * from m_vendor where id='".$_SESSION['VendorId']."'";
				  $arr1=mysqli_query($conn,$sem1);
				  $spm1=mysqli_fetch_array($arr1);
				  $in="select * from s_purchase_order where inv_no='".$_REQUEST['inv_no']."'";
				  $Ein=mysqli_query($conn,$in);
				  $Fin=mysqli_fetch_array($Ein);
				  
				  $dem="select * from m_supplier where sid='".$Fin['supplier_name']."'";
				  $rmp=mysqli_query($conn,$dem);
				  $rcm=mysqli_fetch_array($rmp);
				  
				  $sem="select * from m_vendor where id='".$Fin['FrachiseeId']."'";
				  $arr=mysqli_query($conn,$sem);
				  $spm=mysqli_fetch_array($arr);
				  
				  
				 
				  
				  ?>
                  <input type="text" class="form-control" name="inv_no" id="inv_no"  placeholder="Invoice No" required>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
                  <input type="date" class="form-control" name="pdate" id="pdate"  value="<?php echo date('Y-m-d'); ?>" placeholder="Date" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Purchase Order No</label>
                  <input type="text" class="form-control" name="PurchaseOrderNo" id="PurchaseOrderNo" value="<?php echo $mobil['inv_no'];?>" readonly >
				  
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">To Vendor Name</label>
                 <input type="text" class="form-control" name="Franchisee" id="Franchisee"  value="<?php echo $spm1['franchisee_name']; ?><?php echo $spm['franchisee_name']; ?>" placeholder="Vendor Name" readonly>
                 <input type="hidden" class="form-control" name="FranchiseeId" id="FranchiseeId"  value="<?php echo $spm1['id']; ?><?php echo $spm['id']; ?>" placeholder="Vendor Name" readonly>
           
                </div> </div>
				 <div class="box-body">
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier Name</label>
                  <input class="form-control" id="supplier" name="supplier" value="<?php echo $FEssc['sname']; ?>" readonly>
                  <input class="form-control"type="hidden" id="supplier_name" name="supplier_name" value="<?php echo $FEssc['sid']; ?>" readonly>
				 
                </div>
					<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Supplier Ledger Id</label>
                  <input class="form-control" name="SLI" id="SLI" value="<?php echo $rcm['LedgerId']; ?>"  placeholder="LEDGER ID" >
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Outstanding</label>
                  <input class="form-control" name="out" id="out" value="<?php echo $Fin['outstand']; ?><?php echo $mobil['outstand'];?>" readonly  placeholder="Outstanding" >
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">GSTIN</label>
                  <input type="text" class="form-control" value="<?php echo $Fin['gstin']; ?><?php echo $mobil['gstin'];?>" readonly name="gstin" id="gstin">
                </div>
                </div>
				
				
				

				
			 <div id="txtHint" class="box-body">
			 <div class="container_fluid">
			 <div class="row">
                <div class="form-group col-sm-12">
			
                <table id="example" class="table table-bordered">
                <thead>
                <tr>
				  <th>SL NO</th>
                  
				 
				  <th>SPARE</th>
				  <th>PART NO</th>
				  <th>HSN Code</th>
				  				 
				  <th>MRP</th>
				  <th>P.Rate</th>
				  <th>QTY</th>
				  <th>AMOUNT</th>
				  <th>DISCOUNT %</th>
				  <th>TAXABLE VALUE</th>
				   <th>GST</th>
				   <th>GST AMT</th>
				    <th>TOTAL</th>
				  <th>DELETE</th>
                </tr>
                </thead>
                <tbody>
				<?php
		
		  $echeck3="select * from s_purchase_order_details where inv_no='".$mobil['id']."' and status='Active' AND purchase_status='Pending'"; 
		$echk3=mysqli_query($conn,$echeck3);
         while($ecount3=mysqli_fetch_array($echk3)){
	      $i++;
		  
			
					
				 	 $sdm="select * from m_spare_brand where sid='".$ecount3['spare_brand']."'"; 
					$scm=mysqli_query($conn,$sdm);
					$pqr=mysqli_fetch_array($scm);
					
					$sdm2="select * from m_spare where sid='".$ecount3['spare_name']."'"; 
					$scm2=mysqli_query($conn,$sdm2);
					$pqr2=mysqli_fetch_array($scm2);
					
					$sdm1="select * from m_supplier where sid='".$ecount3['supplier_name']."'"; 
					$scm1=mysqli_query($conn,$sdm1);
					$pqr1=mysqli_fetch_array($scm1);
					
					 $ses="select * from m_unit_master where id='".$ecount3['unit']."'";
					$arrs=mysqli_query($conn,$ses);
					$spms=mysqli_fetch_array($arrs);
					//$rtr=$ecount3['total']-$ecount3['discount_amt'];
				?>
<tr>
                  <td><?php echo $i; ?> </td>
                			 
				 <td style="width:200px">
			    <input type="text" name="<?php echo "spare_name".$i; ?>" id="<?php echo "spare_name".$i;?>" value="<?php echo $pqr2['sname'];?>"  placeholder="" onKeyPress="return tabE(this,event)" class="form-control"> 
				</td>
				<td style="width:200px" class="hidden" >
			    <input type="text" name="<?php echo "POID".$i; ?>" id="<?php echo "POID".$i;?>" value="<?php echo $ecount3['id'];?>"  placeholder="" onKeyPress="return tabE(this,event)" class="form-control"> 
				</td>
                  <td style="width:150px" >
				  <input type="text" name="<?php echo "part_no".$i;  ?>" id="<?php echo "part_no".$i; ?>" value="<?php echo $ecount3['spare_part_no'];?>"   onKeyPress="" class="form-control" >
				  </td>
				      <td style="width:190px" >
				  <input type="text" name="<?php echo "hsn_code".$i;  ?>" id="<?php echo "hsn_code".$i; ?>" value="<?php echo $ecount3['hsn_code'];?>"   onKeyPress="" class="form-control" >
				  </td>
				  
				   <td style="width:150px">
				  <input type="text" name="<?php echo "mrp".$i;  ?>" id="<?php echo "mrp".$i; ?>" value="<?php echo number_format($ecount3['mrp'],2);?>" onKeyUp="sumpurchase(<?php echo $i; ?>);"  onKeyPress="" class="form-control" >
				  </td>	  
				  <td style="width:150px">
				  <input type="text" name="<?php echo "purchase_rate".$i;  ?>" id="<?php echo "purchase_rate".$i; ?>" value="<?php echo number_format($ecount3['purchase_rate'],2);?>" onKeyUp="sumpurchase(<?php echo $i; ?>);"  onKeyPress="" class="form-control" >
				  </td>
				   <td style="width:150px">
				  <input type="text" name="<?php echo "qty".$i;  ?>" id="<?php echo "qty".$i; ?>" value="<?php echo number_format($ecount3['qty'],2);?>"  onKeyUp="sumpurchase(<?php echo $i; ?>);"  onKeyPress="" class="form-control" >
				  </td>
				    <td style="width:150px">
				  <input type="text" name="<?php echo "total".$i;  ?>" id="<?php echo "total".$i; ?>" value="<?php echo number_format($ecount3['total'],2); ?>" onKeyUp="sumpurchase(<?php echo $i; ?>);"  onKeyPress="" class="form-control" >
				  </td> 
				  <td style="width:100px">
				  <input type="text" name="<?php echo "discount_per".$i;  ?>" id="<?php echo "discount_per".$i; ?>" value="<?php echo number_format($ecount3['discount_per'],2); ?>" onKeyUp="sumpurchase(<?php echo $i; ?>);"  onKeyPress="" class="form-control" >
				  </td>
				  <td style="width:150px" class="hidden">
				  <input type="text" name="<?php echo "discount_amt2".$i;  ?>" id="<?php echo "discount_amt2".$i; ?>"  onKeyUp="sumpurchase(<?php echo $i; ?>);"  onKeyPress="" class="form-control" >
				  </td> <td style="width:150px">
				  <input type="text" name="<?php echo "discount_amt".$i;  ?>" id="<?php echo "discount_amt".$i; ?>"  onKeyUp="sumpurchase(<?php echo $i; ?>);"  onKeyPress="" class="form-control" >
				  </td>
				  <td style="width:250px"> 
				 <select class="form-control" id="<?php echo "gst".$i; ?>" name="<?php echo "gst".$i; ?>" onKeyUp="sumpurchase(<?php echo $i; ?>);" >
				 <option value="0">-Select VAT-</option>
				 <?php
				  $sql="select * from  m_gst order by id desc";
				  $result=mysqli_query($conn,$sql);
				  while ($row = mysqli_fetch_array($result)) {				  
				  ?>
				  <option value="<?php echo $row['gst']; ?>"><?php echo $row['gst']; ?></option>
				  <?php } ?>	
				  </select>
				  </td>
				  <td style="width:150px">
				   
				  <input type="text" name="<?php echo "gst_amt".$i;  ?>" id="<?php echo "gst_amt".$i; ?>" value="<?php echo number_format($ecount3['gst_amt'],2); ?>" onKeyUp="sumpurchase(<?php echo $i; ?>);" onKeyPress="" class="form-control" >
				  </td>
				   <td style="width:150px">
				   
				  <input type="text" name="<?php echo "net_amt".$i;  ?>" id="<?php echo "net_amt".$i; ?>" value="<?php echo number_format($ecount3['total'],2); ?>" onKeyUp="sumpurchase(<?php echo $i; ?>);" onKeyPress="" class="form-control" >
				  </td>
				  
				  	<td style="width:250px">
				<select type="text" name="<?php echo "status".$i; ?>" id="<?php echo "status".$i;?>"   class="form-control">
				
				 <option value="Complete">Complete</option>
				 <option value="Pending">Pending</option>
				 

				  </select>
                				</td>
                </tr>
				
				<?php } ?>
				
                </tbody>
				 <th colspan="10"><span style="float:right">TOTAL : </th>
				 <?php 
				  // $sdm="select * from s_purchase_order_details where inv_no='".$mobil['id']."' and status='Active'"; 
					// $scm=mysqli_query($conn,$sdm);
					// while($pqr=mysqli_fetch_array($scm))
					// {
						// $ta=$ta+$pqr['total'];
					// }
				 
				 ?>
				  <th colspan="2" align="center"><input type="text" name="NetAmount" id="NetAmount" readonly class="form-control"></th>
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
				$ss="select * from a_cash_acc where franchisee_id='".$_SESSION['BranchId']."' order by Id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				$FEss=mysqli_fetch_array($Ess);
				
					$acc="select SUM(Amount) AS Amount from account_cash where TransactionType='Debit' and franchisee_id='".$_SESSION['BranchId']."' ";
					$sccq=mysqli_query($conn,$acc);
					$acf=mysqli_fetch_array($sccq);
					
					$acc1="select SUM(Amount) AS Amount from account_cash where TransactionType='Credit' and franchisee_id='".$_SESSION['BranchId']."'";
					$sccq1=mysqli_query($conn,$acc1);
					$acf1=mysqli_fetch_array($sccq1);
					
		$acc1="select SUM(Amount) AS Amount from account_bank where TransactionType='Debit' and franchisee_id='".$_SESSION['BranchId']."' ";
					$sccq1=mysqli_query($conn,$acc1);
					$acf1=mysqli_fetch_array($sccq1);
					
					$acc11="select SUM(Amount) AS Amount from account_bank where TransactionType='Credit' and franchisee_id='".$_SESSION['BranchId']."'";
					$sccq11=mysqli_query($conn,$acc11);
					$acf11=mysqli_fetch_array($sccq11);
					
					
					$OB=$FEss['cash']+$acf1['Amount'];
					$open=$OB-$acf['Amount'];		
					
					$OB1=$FEss['cash']+$acf11['Amount'];
					$open1=$OB1-$acf['Amount'];
					$i++;
					
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
                  <input type="text" class="form-control" name="BCashb"  id="BCashb"  value="<?php echo $OB1;?>">
				  </div> 
				</div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Ledger Group</label>
				  <?php
				  $lg="select * from m_ledger_group where id='21'";
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
                <button type="submit" name="Add" id="Add" class="btn btn-info pull-right" >Submit The Purchase</button>
                </div>    
         </div>  </div>
    
	</section>
    <!-- /.content -->
	</form>
</div>

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
