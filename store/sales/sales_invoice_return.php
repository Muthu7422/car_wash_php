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
      <h1>Sales Return</h1>
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

		
function sumpurchase()
{
		
	var mrp= parseFloat(document.getElementById("mrp").value);
	var qty= parseFloat(document.getElementById("qty").value);
	
	var totalamt=mrp*qty;
			document.getElementById("total_amount").value=totalamt.toFixed(2);
	
	var dicount_per= parseFloat(document.getElementById("discount_per").value);
	
	var dicount_amt=(dicount_per/100)*totalamt;
			document.getElementById("discount_amt").value=dicount_amt.toFixed(2);
	var total=totalamt+dicount_amt;
			document.getElementById("total").value=total.toFixed(2);
			
	var sgst= parseFloat(document.getElementById("sgst").value);
	var cgst= parseFloat(document.getElementById("cgst").value);
	var igst= parseFloat(document.getElementById("igst").value);
	
	var gst=sgst+cgst+igst;
	var gst_amt=(gst/100)*total;
			document.getElementById("gst_amt").value=gst_amt.toFixed(2);
	var netamt=total+gst_amt;
			document.getElementById("net_amt").value=netamt.toFixed(2);
			
	var recamt=parseFloat(document.getElementById("rec_amt").value);
	var rec_amt=netamt-recamt;
			document.getElementById("bal_amt").value=rec_amt.toFixed(2);
}
		
</script>	 
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="sales_invoice_return_act.php" autocomplete="off">
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
				  $in="select * from sales_invoice where inv_no='".$_REQUEST['inv_no']."'";
				  $Ein=mysqli_query($conn,$in);
				  $Fin=mysqli_fetch_array($Ein);
				  
				  $dem="select * from a_customer where id='".$Fin['cname']."'";
				  $rmp=mysqli_query($conn,$dem);
				  $rcm=mysqli_fetch_array($rmp);
				  
				  $sem="select * from m_franchisee where id='".$Fin['branch_name']."'";
				  $arr=mysqli_query($conn,$sem);
				  $spm=mysqli_fetch_array($arr);
				  
				  
				 
				  
				  ?>
                  <input type="text" class="form-control" name="inv_no" id="inv_no" value="<?php echo $Fin['inv_no']; ?>" placeholder="Invoice No" readonly required>
                </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Return Date</label>
                  <input type="date" class="form-control" name="rdate" id="rdate"  required>
				   <input type="hidden" class="form-control" name="id" id="id"  value="<?php echo $_REQUEST['id']; ?>" placeholder="Date" readonly required>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">To Branch Name</label>
                  <select class="form-control" id="FranchiseeId" name="FranchiseeId" readonly>
			  	  <?php 
				   $ssc="select * from m_franchisee where status='Active'"; 
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['franchisee_name']; ?></option>
				  <?php } ?>
				  </select>
                </div> </div>
				 <div class="box-body">
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
                  <select class="form-control" id="cust_name" name="cust_name" onChange="outstanding(this.value);brand_name(this.value)" readonly>
				  <option value="<?php echo $rcm['id']; ?>"><?php echo $rcm['cust_name']; ?></option>
				  </select>
                </div>
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">CLI</label>
                  <input class="form-control" name="CLI" id="CLI" value="<?php echo $rcm['LedgerId']; ?>" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Outstanding</label>
                  <input class="form-control" name="out" id="out" value="<?php echo $Fin['cust_out_stand']; ?>"  placeholder="Outstanding" readonly>
                </div>
				 <?php
				  $in1="select * from sales_invoice_details where id='".$_REQUEST['id']."'";
				  $Ein1=mysqli_query($conn,$in1);
				  $Fin1=mysqli_fetch_array($Ein1);
				  
				  $dem1="select * from m_spare_brand where sid='".$Fin1['spard_brand']."'";
				  $rmp1=mysqli_query($conn,$dem1);
				  $rcm1=mysqli_fetch_array($rmp1);
				  
				  $sem1="select * from m_spare where sid='".$Fin1['spare_name']."'";
				  $arr1=mysqli_query($conn,$sem1);
				  $spm1=mysqli_fetch_array($arr1);
				  
				  ?>
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Brand</label>
                  <select class="form-control" id="sbrand" name="sbrand" readonly>
				 <option value="<?php echo $Fin1['spard_brand']; ?>"><?php echo $rcm1['sbrand']; ?></option>
				  </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Name</label>
               <select class="form-control"  id="sparename"  name="sparename" readonly>
			   <option value="<?php echo $Fin1['spare_name'];?>"><?php echo $spm1['sname'];?></option>
				  </select>
                </div>
				
				<div class="form-group col-sm-2">
                  <label for="Branch">Mrp</label>
                  <select type="text" class="form-control" name="mrp" id="mrp" onKeyUp="sumpurchase();" placeholder="Purchase Rate" readonly>
				   <option value="<?php echo $Fin1['mrp']; ?>"><?php echo $Fin1['mrp']; ?></option>
				  </select>
                </div>
				
				<div class="form-group col-sm-2">
                  <label for="Branch">Quantity</label>
                  <input type="text" class="form-control" name="qty" id="qty" value="<?php echo $Fin1['qty']; ?>" onKeyUp="sumpurchase();">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Total</label>
                  <input type="text" class="form-control" name="total_amount" id="total_amount" value="<?php echo $Fin1['total']; ?>" onKeyUp="sumpurchase();" readonly >
                </div>
				
				<div class="form-group col-sm-2">
                  <label for="Branch">Discount %</label>
                  <input type="text" class="form-control" name="discount_per" id="discount_per" value="<?php echo $Fin['discount_per']; ?>" onKeyUp="sumpurchase();" readonly>
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Discount Rate</label>
                  <input type="text" class="form-control" name="discount_amt" id="discount_amt" value="<?php echo $Fin['dicount_amt']; ?>" onKeyUp="sumpurchase();" readonly>
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Total</label>
                  <input type="text" class="form-control" name="total" id="total" value="<?php echo $Fin['total']; ?>" onKeyUp="sumpurchase();" readonly>
                </div>
				
				<div class="form-group col-sm-2">
                  <label for="Branch">SGST</label>
                  <input type="text" class="form-control" name="sgst" id="sgst" value="<?php echo $Fin1['sgst']; ?>" onKeyUp="sumpurchase();" readonly >
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">CGST</label>
                  <input type="text" class="form-control" name="cgst" id="cgst" value="<?php echo $Fin1['cgst']; ?>" onKeyUp="sumpurchase();" readonly >
                </div>
				<div class="form-group col-sm-2 hidden">
                  <label for="Branch">IGST</label>
                  <input type="text" class="form-control" name="igst" id="igst" value="<?php echo $Fin1['igst']; ?>" onKeyUp="sumpurchase();" readonly >
                </div>
				
				<div class="form-group col-sm-2">
                  <label for="Branch">GST Amount</label>
                  <input type="text" class="form-control" name="gst_amt" id="gst_amt" value="<?php echo $Fin1['gst_amt']; ?>" onKeyUp="sumpurchase();" readonly >
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Net Amount</label>
                  <input type="text" class="form-control" name="net_amt" id="net_amt" value="<?php echo $Fin['bill_amt']; ?>" readonly>
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Received Amount</label>
                  <input type="text" class="form-control" name="rec_amt" id="rec_amt" value="<?php echo $Fin['rec_amt']; ?>" readonly>
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Balnace Amount</label>
                  <input type="text" class="form-control" name="bal_amt" id="bal_amt" value="<?php echo $Fin['bal_amt']; ?>" readonly>
                </div>
            </div>
			<div class="form-group col-sm-4">
                  <label for="Branch">Description</label>
                  <textarea type="text" class="form-control" name="description"  id="description" required></textarea>
                </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" Onclick="return confirm('Are you sure want to proceed?')">Submit The Sales Return Item</button>
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
