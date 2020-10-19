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
      <h1>Sales Invoice Edit</h1>
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
        success:function(msg){
              // your message will come here.  
        document.getElementById("out").value=msg;
       
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
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="sales_invoice_edit_act.php" autocomplete="off">
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
				  $id=$_REQUEST['id'];
				  $in="select * from sales_invoice where id='$id'";
				  $Ein=mysqli_query($conn,$in);
				  $n=mysqli_num_rows($Ein);
				  $Fin=mysqli_fetch_array($Ein);
				  //$ns1=$n+0001;
				  ?>
                  <input type="text" class="form-control" name="inv_no" id="inv_no" value="<?php echo $Fin['inv_no']; ?>" placeholder="Invoice No" readonly required>
                  <input type="hidden" class="form-control" name="SalesId" id="SalesId" value="<?php echo $Fin['id']; ?>" placeholder="Invoice No" readonly required>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
                  <input type="date" class="form-control" name="date" id="date"  value="<?php echo $Fin['sdate']; ?>" placeholder="Date" required>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Branch Name</label>
				  <?php
				  $rpm="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'";
				  $rps=mysqli_query($conn,$rpm);
				  $spu=mysqli_fetch_array($rps);
				  
				  ?>
                  <input type="text" class="form-control" name="branch_name" id="branch_name" value="<?php echo $spu['franchisee_name'] ?>" readonly>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
                  <select class="form-control" id="customer_name" name="customer_name" onChange="outstanding(this.value);" required>
				  <?php 
				  $ssc="select * from a_customer where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
					  if($FEssc['id']==$Fin['cname'])
					  {
				  ?>
  				  <option value="<?php echo $FEssc['id']; ?>" selected="true"><?php echo $FEssc['cust_name']; ?></option>
				  <?php 
					  }
					else
					{
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['cust_name']; ?></option>
				  <?php } 
				  }
				  ?>
				  </select>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Outstanding</label>
                  <input class="form-control" name="out" id="out" readonly  placeholder="Outstanding" >
                </div> 
				<div class="form-group col-sm-4">
                  <label for="Branch">Description</label>
                  <input class="form-control" name="description" id="description" placeholder="Description" >
                </div></div>
				
        <!-- left column -->
		
		
		
		<!-- Item Dynamic Table Starts -->
		<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Item Purchase Details</h3>
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
				$ssd="select * from sales_invoice_details where inv_id='$id'";
				$Essd=mysqli_query($conn,$ssd);
				$i=0;
				while($FEssd=mysqli_fetch_array($Essd))
				//for($i=1;$i<10;$i++)
				{
					$i++;
				?>
                <tr>
					<td style="width:  60px"><?php echo $i; ?> </td>
					<td style="display:none"><input type="txt" name="<?php echo "id".$i; ?>" id="<?php echo "id".$i; ?>"class="form-control" value="<?php echo $FEssd['id'];?>" readonly="true"></td>
					<td style="width:  250px"> 
					<select name="<?php echo "spare_brand".$i; ?>" id="<?php echo "spare_brand".$i; ?>" onChange="getbrand(<?php echo $i; ?>);"  class="form-control" onkeypress="return tabE(this,event)">
					<?php
					$sql="select * from m_spare_brand";
					$result=mysqli_query($conn,$sql);
					while ($row = mysqli_fetch_array($result))
					{
						if($row['sid']==$FEssd['spard_brand'])
						{
					?>
					<option value="<?php echo $row['sid']; ?>" selected><?php echo $row['sbrand']; ?></option>
					<?php
						}
						else
						{
					?>
					<option value="<?php echo $row['sid']; ?>"><?php echo $row['sbrand']; ?></option>
					<?php
						}
					}
					?>
					<select>
					</td>
					<?php 
					$ssn="select * from m_spare where sid='".$FEssd['spare_name']."'";
					$Essn=mysqli_query($conn,$ssn);
					$FEssn=mysqli_fetch_array($Essn);
					?>
					<td style="width:  250px">
					<select name="<?php echo "spare_name".$i; ?>" id="<?php echo "spare_name".$i ?>" onChange="getmrp(<?php echo $i; ?>);"  class="form-control" onkeypress="return tabE(this,event)">
					<option value="<?php echo $FEssn['sid']; ?>" select="true"><?php echo $FEssn['sname']; ?></option>
					<select>
					</td>
					<td style="width:  100px">
					<input type="text" name="<?php echo "mrp".$i; ?>" id="<?php echo "mrp".$i;?>" value="<?php echo $FEssd['mrp']; ?>" onKeyUp="getamount(<?php echo $i;?>);" placeholder="MRP" onKeyPress="return tabE(this,event)" class="form-control" readonly>
					</td>
					<td style="width:  100px">
					<input type="text" name="<?php echo "qty".$i; ?>" id="<?php echo "qty".$i;?>" value="<?php echo $FEssd['qty']; ?>" onKeyUp="getamount(<?php echo $i;?>);gettotal(<?php echo $i;?>)" onKeyPress="return tabE(this,event)" class="form-control">
					</td>
					<td style="width:  100px">
					<input type="text" name="<?php echo "amount".$i;  ?>" id="<?php echo "amount".$i; ?>" value="<?php echo $FEssd['total']; ?>"  onKeyUp="getamount(<?php echo $i;?>);gettotal(<?php echo $i;?>)"  onKeyPress="return tabE(this,event)" class="form-control" readonly>
					</td>
                </tr>
				<?php }

				$k=$i+1;
				?>
				
				<?php 
				for($i=$k;$i<10;$i++)
				{
				?>
				<tr>
					<td style="width:  60px"><?php echo $i; ?> </td>
					<td style="display:none"><input type="txt" name="<?php echo "id".$i; ?>" id="<?php echo "id".$i; ?>"class="form-control"  readonly="true"></td>
					<td style="width:  250px"> 
					<select name="<?php echo "spare_brand".$i; ?>" id="<?php echo "spare_brand".$i; ?>" onChange="getbrand(<?php echo $i; ?>);"  class="form-control" onkeypress="return tabE(this,event)">
					<option value="--- Select Brand ---">--- Select Brand ---</option>
					<?php
					$sql="select * from m_spare_brand";
					$result=mysqli_query($conn,$sql);
					while ($row = mysqli_fetch_array($result))
					{
					?>
					<option value="<?php echo $row['sid']; ?>"><?php echo $row['sbrand']; ?></option>
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
					<input type="text" name="<?php echo "mrp".$i; ?>" id="<?php echo "mrp".$i;?>"  onKeyUp="getamount(<?php echo $i;?>);" placeholder="MRP" onKeyPress="return tabE(this,event)" class="form-control" readonly>
					</td>
					<td style="width:  100px">
					<input type="text" name="<?php echo "qty".$i; ?>" id="<?php echo "qty".$i;?>"  onKeyUp="getamount(<?php echo $i;?>);gettotal(<?php echo $i;?>)" onKeyPress="return tabE(this,event)" class="form-control">
					</td>
					<td style="width:  100px">
					<input type="text" name="<?php echo "amount".$i;  ?>" id="<?php echo "amount".$i; ?>"   onKeyUp="getamount(<?php echo $i;?>);gettotal(<?php echo $i;?>)"  onKeyPress="return tabE(this,event)" class="form-control" readonly>
					</td>
                </tr>
				<?php } ?>
				
		        </tbody>
              </table>
			  
            </div>
			<span class="bg-danger text-red pull-right"><strong>Note : Change Quantity '0' to Delete an Item </strong></span>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		
		<!-- Item Dynamic Table Ends -->
		
		
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
			  $sgt=mysqli_query($conn,$sg);
			  while($sgst=mysqli_fetch_array($sgt))
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
			  $sgt=mysqli_query($conn,$sg);
			  while($sgst=mysqli_fetch_array($sgt))
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
			  $sgt=mysqli_query($conn,$sg);
			  while($sgst=mysqli_fetch_array($sgt))
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
              <label for="Branch">Receivable Amount</label>
              <input type="text" class="form-control" name="recable_amount" id="recable_amount" value="0" onKeyUp="sumgst();" placeholder="Amount Payable" >
                </div>
				<div class="form-group col-sm-4">
              <label for="Branch">Blance Amount</label>
              <input type="text" class="form-control" name="balance_amount" id="balance_amount" onKeyUp="sumgst();" placeholder="Blance Amount" readonly>
                </div>
				<div class="form-group col-sm-4">
              <label for="Branch">Payment Mode</label>
              <select type="text" class="form-control" name="payment_mode" id="payment_mode" placeholder="Payment Mode" required>
			  <option value="">-Select the Mode-</option>
			   <option>Cash</option>
			    <option>Credit</option>
				 <option>Card</option>
				  <option>Bank Transfer</option>
				   <option>Paytm</option>
				     <option>Cheque</option>
			  </select>
                </div>
				</div>
		
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" onclick="return confirm('Are You Sure Want To Proceed?');">Submit</button>
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
