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
      <h1>Purchase Asset</h1>
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

		
</script>	 
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="s_purchase_asset_temp_act.php" autocomplete="off">
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
				  $in="select * from s_purchase_asset_temp where InvoiceNo='".$_REQUEST['InvoiceNo']."'";
				  $Ein=mysqli_query($conn,$in);
				  $Fin=mysqli_fetch_array($Ein);
				  
				  $dem="select * from m_supplier where sid='".$Fin['SupplierName']."'";
				  $rmp=mysqli_query($conn,$dem);
				  $rcm=mysqli_fetch_array($rmp);
				  
				  $sem="select * from m_franchisee where id='".$Fin['FrachiseeId']."'";
				  $arr=mysqli_query($conn,$sem);
				  $spm=mysqli_fetch_array($arr);
				  ?>
                  <input type="text" class="form-control" name="InvoiceNo" id="InvoiceNo" value="<?php echo $Fin['InvoiceNo']; ?>" placeholder="Invoice No" required>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
                  <input type="date" class="form-control" name="PaDate" id="PaDate"  value="<?php echo $Fin['PaDate']; ?>" placeholder="Date" required>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">To Branch Name</label>
                  <select class="form-control" id="FrachiseeId" name="FrachiseeId" >
			  	  <?php 
				  $ssc="select * from m_franchisee where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['franchisee_name']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier Name</label>
                  <select class="form-control" id="SupplierName" name="SupplierName" onChange="outstanding(this.value);brand_name(this.value)">
				  <option><?php echo $rcm['sname']; ?></option>
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
                  <label for="Branch">Product Name</label>
                  <input class="form-control" name="ProductName" id="ProductName"   placeholder="Product Name" >
                </div>
				<div class="form-group col-sm-4">
				
                  <label for="Branch">Product Brand</label>
                  <select class="form-control" id="ProductBrand" name="ProductBrand">
				  <option value="">--Select Brand--</option>
				  <?php 
				  $br="select * from m_asset_brand where status='Active'";
				  $bran=mysqli_query($conn,$br);
				  while($FEssc=mysqli_fetch_array($bran))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['brand']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Product Model</label>
               <input type="txt" class="form-control"  id="ProductModel" name="ProductModel" placeholder="Product Model">
                </div>
				<div class="col-md-12"></div>
				<div class="form-group col-sm-4">
                 <label for="Branch">Any Other Specificaton</label>
                 <input type="text" class="form-control" id="OtherSpecificaton" name="OtherSpecificaton" placeholder="Any Other Specificaton">
			    </div>
								
				<div class="form-group col-sm-4">
                  <label for="Branch">Purchase Rate</label>
                  <input type="text" class="form-control" name="PurchaseRate" id="PurchaseRate" placeholder="Purchase Rate">
				  
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Quantity</label>
                  <input type="text" class="form-control" name="Quantity" id="Quantity" placeholder="Quantity">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Expiry / AMC Date</label>
                  <input type="date" class="form-control" name="ExpiryDate" id="ExpiryDate" placeholder="Date">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Service Person Contact</label>
                  <input type="text" class="form-control" name="ServicePerson" id="ServicePerson" value="<?php echo $Fin['ServicePerson'];?>" placeholder="Service Person Contact">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Remarks</label>
                  <input type="text" class="form-control" name="Remarks" id="Remarks" placeholder="Remarks">
                </div>
				 </div>
			    <div class="box-body">
				<div class="form-group col-sm-12">
                  <label for="Branch"></label>
                  <input type="submit" class="btn btn-info pull-right" name="EntryItem" id="Remarks"  value="Submit Item">
                </div>
            </div>
			     <div class="box-body">
                <div class="form-group col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>S.No</th>
                  <th>Supplier Name</th>
				  <th>Product Brand</th>
				   <th>Product Model</th>
				  <th>Product Name</th>
				  <th>Purchase Rate</th>
				  <th>Qty</th>
				  <th>Total</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from  s_purchase_asset_temp where status='Active' order by id";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
					
				 	 $sdm="select * from m_asset_brand where id='".$FEss['ProductBrand']."'"; 
					$scm=mysqli_query($conn,$sdm);
					$pqr=mysqli_fetch_array($scm);
					
					$sdm1="select * from m_supplier where sid='".$FEss['SupplierName']."'"; 
					$scm1=mysqli_query($conn,$sdm1);
					$pqr1=mysqli_fetch_array($scm1);
					
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo $pqr1['sname'];  ?><input type="hidden" name="InvoiceNo" id="InvoiceNo" value="<?php echo $FEss['InvoiceNo']; ?>" ></td>
				  <td><?php  echo $pqr['brand']; ?></td>
				  <td><?php  echo $FEss['ProductModel']; ?></td>
				  <td><?php  echo $FEss['ProductName']; ?></td>
				  <td><?php echo $FEss['PurchaseRate']; ?></td>
				   <td><?php echo $FEss['Quantity']; ?></td>
				  <td><?php
				   $tot=$FEss['PurchaseRate']*$FEss['Quantity'];
				   echo $tot; ?></td>
				  <td>
				  <a href="purchase_asset_delete.php?id=<?php echo $FEss['id']; ?> && InvoiceNo=<?php echo $FEss['InvoiceNo']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
                  
                </tr>
				<?php } ?>
				
                </tbody>
              </table>
                </div>
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	    <div class="box-footer">
               <div class="form-group col-sm-12">
                  <label for="Branch"></label>
                  <input type="submit" class="btn btn-info pull-right" name="EntryItem" id="Remarks"  value="Complete Purchase">
                </div>
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
