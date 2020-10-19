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
<body >
<div class="wrapper">
  <!--header Starts-->
 
 <!-- Side Bar End -->
  <!-- Content Wrapper. Contains page content -->
  <div >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Quotation</h1>
     </section>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <style>
div.ex3 {
   border: 1px solid black;
  
}
.modal-content
{
	width:150%;
}
</style> 
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
    <form role="form" method="post" action="sales_invoice_popup_act.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch"> Quotation Id</label>
				  <?php
				   $sem1="select * from m_vendor where id='".$_SESSION['VendorId']."'";
				  $arr1=mysqli_query($conn,$sem1);
				  $spm1=mysqli_fetch_array($arr1);
				  
				  $in="select * from s_quotation_details where id='".$_REQUEST['id']."'";
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
                  <input type="text" class="form-control" name="q_no" id="q_no" value="<?php echo $Fin['q_no']; ?>" placeholder="Invoice No" readonly>
                  <input type="hidden" class="form-control" name="pid" id="pid" value="<?php echo $Fin['id']; ?>" placeholder="Invoice No" readonly>
                </div>
			
				
				<div class="form-group col-sm-4">
                  <label for="Branch">To Vendor Name</label>
                 <input type="text" class="form-control" name="Franchisee" id="Franchisee"  value="<?php echo $spm1['franchisee_name']; ?>" placeholder="Vendor Name" readonly>
                 <input type="hidden" class="form-control" name="FranchiseeId" id="FranchiseeId"  value="<?php echo $spm1['id']; ?>" placeholder="Vendor Name" readonly>
           
                </div> </div>
				 <div class="box-body">
				
				
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
                  <input type="text" class="form-control" name="discount_per" id="discount_per" value="<?php echo $Fin['discount']; ?>" onKeyUp="sumpurchase();">
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
                <button type="submit" name="PopUp" id="PopUp"  name="product" value="product" class="btn btn-info pull-right">Save The Quotation</button>
                </div> 

				
	
         </div>
    </form>
	</section>
    <!-- /.content -->
	
</div>


</div>
 <?php include("../../includes_db_js.php"); ?>
 

 
</body>
</html>
