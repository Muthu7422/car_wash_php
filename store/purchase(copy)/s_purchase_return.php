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
      <h1>Purchase Return</h1>
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
		
	var mrp= parseFloat(document.getElementById("prate").value);
	
	
	var dicount_per= parseFloat(document.getElementById("discount_per").value);
	var purchase= parseFloat(document.getElementById("prate").value);
	var qty= parseFloat(document.getElementById("qty").value);
	var gst= parseFloat(document.getElementById("gst").value);

	var dicount_amt=(dicount_per/100)*mrp;
	     document.getElementById("discount_amt").value=dicount_amt.toFixed(2);
	 
	 var purhcase_rate=mrp-dicount_amt;
		 document.getElementById("purchase_rate").value=purhcase_rate.toFixed(2);
		 
	var total=purhcase_rate*qty;
	     document.getElementById("total").value=total.toFixed(2);
		 
	var gst_amount=(gst/100)*total;
		  document.getElementById("gst_amt").value=gst_amount.toFixed(2);
		  
	var net_amount=gst_amount+total;
		document.getElementById("net_amt").value=net_amount.toFixed(2);
}
		
</script>	 
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="s_purchase_return_act.php" autocomplete="off">
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
				  $in="select * from s_purchase where inv_no='".$_REQUEST['inv_no']."'";
				  $Ein=mysqli_query($conn,$in);
				  $Fin=mysqli_fetch_array($Ein);
				  
				  $dem="select * from m_supplier where sid='".$Fin['supplier_name']."'";
				  $rmp=mysqli_query($conn,$dem);
				  $rcm=mysqli_fetch_array($rmp);
				  
				  $sem="select * from m_franchisee where id='".$Fin['FrachiseeId']."'";
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
                  <label for="Branch">Supplier Name</label>
                  <select class="form-control" id="supplier_name" name="supplier_name" onChange="outstanding(this.value);brand_name(this.value)" readonly>
				  <option value="<?php echo $rcm['sid']; ?>"><?php echo $rcm['sname']; ?></option>
				  
				  </select>
                </div>
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Supplier Ledger Id</label>
                  <input class="form-control" name="SLI" id="SLI" value="<?php echo $rcm['LedgerId']; ?>"  placeholder="Outstanding" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Outstanding</label>
                  <input class="form-control" name="out" id="out" value="<?php echo $Fin['outstand']; ?>"  placeholder="Outstanding" readonly>
                </div>
				 <?php
				  $in1="select * from s_purchase_details where id='".$_REQUEST['id']."'";
				  $Ein1=mysqli_query($conn,$in1);
				  $Fin1=mysqli_fetch_array($Ein1);
				  
				  $dem1="select * from m_spare_brand where sid='".$Fin1['spare_brand']."'";
				  $rmp1=mysqli_query($conn,$dem1);
				  $rcm1=mysqli_fetch_array($rmp1);
				  
				  $sem1="select * from m_spare where sid='".$Fin1['spare_name']."'";
				  $arr1=mysqli_query($conn,$sem1);
				  $spm1=mysqli_fetch_array($arr1);
				  
				   $sem12="select * from m_unit_master where id='".$Fin1['unit']."'";
				  $arr12=mysqli_query($conn,$sem12);
				  $spm12=mysqli_fetch_array($arr12);
				 
				  
				  ?>
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Brand</label>
                  <select class="form-control" id="sbrand" name="sbrand" readonly>
				 <option value="<?php echo $Fin1['spare_brand']; ?>"><?php echo $rcm1['sbrand']; ?></option>
				  </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Name</label>
               <select class="form-control"  id="sparename"  name="sparename" readonly>
			   <option value="<?php echo $Fin1['spare_name'];?>"><?php echo $spm1['sname'];?></option>
				  </select>
                </div>
				<div class="form-group col-sm-4">
                 <label for="Branch">Spare Part No</label>
                 <input type="text" class="form-control" id="spart_no" value="<?php echo $Fin1['spare_part_no']; ?>" name="spart_no" readonly>
			    </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Units</label>
               <select class="form-control"  id="unit" name="unit" readonly>
			     <option value="<?php echo $Fin1['unit']; ?>"><?php echo $spm12['u_name']; ?></option>
				  </select>
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Mrp</label>
                  <select type="text" class="form-control" name="prate" id="prate" onKeyUp="sumpurchase();" placeholder="Purchase Rate" readonly>
				   <option value="<?php echo $Fin1['mrp']; ?>"><?php echo $Fin1['mrp']; ?></option>
				  </select>
                </div>
				
				<div class="form-group col-sm-2">
                  <label for="Branch">Discount %</label>
                  <input type="text" class="form-control" name="discount_per" id="discount_per" value="<?php echo $Fin1['discount_per']; ?>" onKeyUp="sumpurchase();" readonly>
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Discount Rate</label>
                  <input type="text" class="form-control" name="discount_amt" id="discount_amt" value="<?php echo $Fin1['discount_amt']; ?>" onKeyUp="sumpurchase();" readonly>
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Purchase Rate</label>
                  <input type="text" class="form-control" name="purchase_rate" id="purchase_rate" value="<?php echo $Fin1['purchase_rate']; ?>" onKeyUp="sumpurchase();" readonly>
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Quantity</label>
                  <input type="text" class="form-control" name="qty" id="qty" value="<?php echo $Fin1['qty']; ?>" onKeyUp="sumpurchase();">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Total</label>
                  <input type="text" class="form-control" name="total" id="total" value="<?php echo $Fin1['total']; ?>" onKeyUp="sumpurchase();" readonly >
                </div>
				
					<div class="form-group col-sm-2">
              <label for="Branch">GST %</label>
              <select type="text" class="form-control" name="sgst" id="sgst" readonly>
			
			  <option value="<?php echo $Fin1['sgst']+$Fin1['cgst']; ?>"><?php echo $Fin1['sgst']+$Fin1['cgst']; ?></option>
			
			  </select>
                </div>
				
					<div class="form-group col-sm-2 hidden">
              <label for="Branch">SGST</label>
              <select type="text" class="form-control" name="sgst" id="sgst" readonly>
			
			  <option value="<?php echo $Fin1['sgst']; ?>"><?php echo $Fin1['sgst']; ?></option>
			
			  </select>
                </div>
				<div class="form-group col-sm-2 hidden">
              <label for="Branch">CGST</label>
              <select type="text" class="form-control" name="cgst" id="cgst" readonly>
			  <option value="<?php echo $Fin1['cgst']; ?>"><?php echo $Fin1['cgst']; ?></option>
			
			  </select>
                </div>
				<div class="form-group col-sm-2 hidden">
              <label for="Branch">IGST</label>
              <select type="text" class="form-control" name="igst" id="igst"  readonly>
			  
			  <option value="<?php echo $Fin1['igst']; ?>"><?php echo $Fin1['igst']; ?></option>
			
			  </select>
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">GST Amount</label>
                  <input type="text" class="form-control" name="gst_amt" id="gst_amt" value="<?php echo $Fin1['gst_amt']; ?>" onKeyUp="sumpurchase();" readonly >
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Net Amount</label>
                  <input type="text" class="form-control" name="net_amt" id="net_amt" value="<?php echo $Fin1['total_amount']; ?>" readonly>
                </div>
            </div>
			
		

				
			 <div class="box-body hidden">
                <div class="form-group col-sm-12">
                <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>S.No</th>
                  <th>Supplier Name</th>
				  <th>Spare Brand</th>
				  <th>Spare Name</th>
				  <th>Spare Part No</th>
				  <th>Unit</th>
				  <th>Mrp</th>
				  <th>Discount Amt</th>
				  <th>Purchase Rate</th>
				  <th>Qty</th>
				  <th>Amount</th>
				   <th>GST</th>
				    <th>Total Amount</th>
				  <th>Action</th>
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
				<td><?php  echo $FEss['mrp']; ?></td>
				<td><?php  echo $FEss['discount_amt']; ?></td>
				<td><?php  echo $FEss['purchase_rate']; ?></td>
				<td><?php  echo $FEss['qty']; ?></td>
				<td><?php  echo $FEss['total']; ?></td>
				  <td><?php  echo $FEss['gst_amt']; ?></td>
				  <td><?php echo $FEss['net_amount']; ?></td>
				  <td>
				  <a href="purchase_delete _temp.php?id=<?php echo $FEss['id']; ?> && inv_no=<?php echo $FEss['inv_no']; ?>" Onclick="return confirm(''Are you sure want to proceed?')" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
                  
                </tr>
				<?php } ?>
				
                </tbody>
              </table>
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
                <button type="submit" class="btn btn-info pull-right" Onclick="return confirm('Are you sure want to proceed?')">Submit The Purchase Return Item</button>
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
