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
	
	if(document.getElementById("discount_per").value=="")
	{
		dicount_per=0;
	}
	else
	{
	var dicount_per= parseFloat(document.getElementById("discount_per").value);
	}
	var purchase= parseFloat(document.getElementById("prate").value);
	if(document.getElementById("qty").value=="")
	{
		qty=0;
	}
	else
	{
	var qty= parseFloat(document.getElementById("qty").value);
	}
	if(document.getElementById("gst").value=="")
	{
		gst=0;
	}
	else
	{
	var gst= parseFloat(document.getElementById("gst").value);
	}
	
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
    <form role="form" method="post" action="s_purchase_edit_act.php" autocomplete="off">
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
				  $in="select * from s_purchase_temp where inv_no='".$_REQUEST['inv_no']."'";
				  $Ein=mysqli_query($conn,$in);
				  $Fin=mysqli_fetch_array($Ein);
				  
				  $dem="select * from m_supplier where sid='".$Fin['supplier_name']."'";
				  $rmp=mysqli_query($conn,$dem);
				  $rcm=mysqli_fetch_array($rmp);
				  
				  $sem="select * from m_franchisee where id='".$Fin['FrachiseeId']."'";
				  $arr=mysqli_query($conn,$sem);
				  $spm=mysqli_fetch_array($arr);
				  
				  
				 
				  
				  ?>
                  <input type="text" class="form-control" name="inv_no" id="inv_no" value="<?php echo $Fin['inv_no']; ?>" placeholder="Invoice No" required>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
                  <input type="date" class="form-control" name="pdate" id="pdate"  value="<?php echo $Fin['pdate']; ?>" placeholder="Date" required>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">To Branch Name</label>
                  <select class="form-control" id="FranchiseeId" name="FranchiseeId" >
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
                  <select class="form-control" id="supplier_name" name="supplier_name" onChange="outstanding(this.value);brand_name(this.value)">
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
                  <input class="form-control" name="out" id="out" value="<?php echo $Fin['outstand']; ?>"  placeholder="Outstanding" >
                </div>
				
				<?php 
				if(isset($_REQUEST['inv_no'])!='')
				{
					
				?>
				<div class="form-group col-sm-4">
				<?php 
				$query ="SELECT * FROM m_spare_brand WHERE supplier = '" . $rcm['sname'] . "' and status='Active'"; 
					$results = mysqli_query($conn,$query);
					$Fsname=mysqli_fetch_array($results);
				  
				  $ssc="select * from m_spare_brand where supplier='".$Fin['supplier_name']."' AND status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				
				?>
                  <label for="Branch">Spare Brand</label>
                  <select class="form-control" id="sbrand" name="sbrand" onChange="spare_name(this.value);spare_part(this.value);">
				  <?php 
				  
				   
				  while($FEssc=mysqli_fetch_array($Essc))
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
                  <label for="Branch">Spare Brand</label>
                  <select class="form-control" id="sbrand" name="sbrand" onChange="spare_name(this.value);spare_part(this.value);">
				 
				  </select>
                </div>
				<?php } ?>
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Name</label>
               <select class="form-control"  id="sparename" name="sparename" onChange="spare_mrp(this.value);spare_unit(this.value)">
			  
				  </select>
                </div>
				<div class="form-group col-sm-4">
                 <label for="Branch">Spare Part No</label>
                 <input type="text" class="form-control" id="spart_no" name="spart_no">
			    </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Units</label>
               <select class="form-control"  id="unit" name="unit">
			  
				  </select>
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Mrp</label>
                  <select type="text" class="form-control" name="prate" id="prate" onKeyUp="sumpurchase();" placeholder="Purchase Rate">
				  </select>
                </div>
				
				<div class="form-group col-sm-2">
                  <label for="Branch">Discount %</label>
                  <input type="text" class="form-control" name="discount_per" id="discount_per" onKeyUp="sumpurchase();">
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Discount Rate</label>
                  <input type="text" class="form-control" name="discount_amt" id="discount_amt" onKeyUp="sumpurchase();" readonly>
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">Purchase Rate</label>
                  <input type="text" class="form-control" name="purchase_rate" id="purchase_rate" onKeyUp="sumpurchase();" readonly>
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
                  <label for="Branch">GST</label>
                  <select type="text" class="form-control" name="gst" id="gst" onChange="sumpurchase();">
				  <option value="">--Select the Gst--</option>
				  <option>2.5</option>
				  <option>5</option>
				  <option>12</option>
				  <option>18</option>
				  <option>24</option>
				  </select>
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">GST Amount</label>
                  <input type="text" class="form-control" name="gst_amt" id="gst_amt" onKeyUp="sumpurchase();" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Net Amount</label>
                  <input type="text" class="form-control" name="net_amt" id="net_amt" readonly>
                </div>
            </div>
			
			
			<div class="box-footer">
                <button type="submit" Onclick="return confirm('Are you sure want to proceed?')" name="product" value="product" class="btn btn-info pull-right">Save The Purchase</button>
                </div> 

				
			 <div class="box-body">
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
				$ss="select * from  s_purchase_details where inv_no='".$_REQUEST['inv_no']."' order by id";
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
					$netamt=$FEss['total']+$FEss['gst_amt'];
					
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
				  <td><?php echo  $netamt; ?></td>
				  <td>
				  <a href="purchase_delete_temp_edit.php?id=<?php echo $FEss['id']; ?> && inv_no=<?php echo $FEss['inv_no']; ?> && net=<?php echo $netamt; ?>" Onclick="return confirm('Are you sure want to proceed?')" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
                  
                </tr>
				<?php } ?>
				
                </tbody>
				 <th colspan="12"><span style="float:right">TOTAL : </th>
				 <?php 
				  $sdm="select * from s_purchase_details  where inv_no='".$_REQUEST['inv_no']."'"; 
					$scm=mysqli_query($conn,$sdm);
					while($pqr=mysqli_fetch_array($scm))
					{
						$ta=$ta+$pqr['total']+$pqr['gst_amt'];
					}
				 
				 ?>
				  <th colspan="2" align="center"><input type="text" name="NetAmount" id="NetAmount" value="<?php echo $ta;  ?>"readonly class="form-control"></th>
              </table>
                </div>
            </div>
			<?php
			$Edc="select * from s_purchase where inv_no='".$_REQUEST['inv_no']."'";
			$Edq=mysqli_query($conn,$Edc);
			$Rfv=mysqli_fetch_array($Edq);
			
			?>
			
			<div class="form-group col-sm-4">
                  <label for="Branch">Description</label>
                  <textarea type="text" class="form-control" name="description" id="description" required><?php echo $Rfv['description'] ?></textarea> 
                </div>
			
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" name="main" value="main" Onclick="return confirm('Are you sure want to proceed?')">Submit The Purchase</button>
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
