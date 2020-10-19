<?php
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
      <h1>
       Painter Voucher
        <small>Report</small>
      </h1>
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
  
  
</script>	
<script>

function tabE(obj,e){ 
   var e=(typeof event!='undefined')?window.event:e;// IE : Moz 
   if(e.keyCode==13){ 
     var ele = document.forms[0].elements; 
     for(var i=0;i<ele.length;i++){ 
       var q=(i==ele.length-1)?0:i+1;// if last element : if any other 
       if(obj==ele[i]){ele[q].focus();break} 
     } 
  return false; 
   } 
  } 
</script> 

<script type="text/javascript">
    function ShowHideDiv() {
        var paymentoption = document.getElementById("payment_mode");
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
</script>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
		
            <form method="post" action="painter_voucher_process.php" autocomplete="off">
              <div class="box-body">
                  
				<div class="form-group col-sm-4">
			    <label for="catname">Painter Name</label>
                  <input type="text" class="form-control" name="PainterName" id="PainterName" value="<?php echo $_REQUEST['PainterName'];?>" readonly="true" required>
				  <input type="hidden" class="form-control" name="PainterId" id="PainterId" value="<?php echo $_REQUEST['painterid'];?>" readonly="true" required>
                </div>
				<?php
				  $dem="select * from m_painters_master where Id='".$_REQUEST['painterid']."'";
				  $rmp=mysqli_query($conn,$dem);
				  $rcm=mysqli_fetch_array($rmp); 
				?>
					<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Painter Ledger Id</label>
                  <input class="form-control" name="PLI" id="PLI" value="<?php echo $rcm['LedgerId']; ?>"  placeholder="LEDGER ID" >
                </div>
				
				
				<div class="form-group col-sm-4">
			    <label for="catname">Invoice No</label>
				<input type="text" class="form-control" name="InvoiceNo" id="InvoiceNo" value="<?php echo $_REQUEST['invoiceno']; ?>" readonly="true" required>
                  <input type="hidden" class="form-control" name="InvoiceId" id="InvoiceId" value="<?php echo $_REQUEST['invoiceid']; ?>" readonly="true" required>
                </div>
				<div class="form-group col-sm-4">
			    <label for="catname">Paid Date</label>
                  <input type="date" class="form-control" name="PaidDate" id="PaidDate" value="<?php echo date('Y-m-d');?>" required>
                </div>
				<div class="form-group col-sm-4">
			    <label for="catname">Paid Amount</label>
                  <input type="number" class="form-control" name="PaidAmount" id="PaidAmount" value="<?php echo "0";?>"  required>
                </div>
				  <div class="form-group col-sm-4">
                  <label for="Branch">Ledger Group</label>
                  <select class="form-control" name="LedgerGroup" id="LedgerGroup">
				  <?php
				  $lg="select * from m_ledger_group where id='23'";
				  $lgr=mysqli_query($conn,$lg);
				  while($lgroup=mysqli_fetch_array($lgr))
				  {
				  ?>
				 
				  <option value="<?php echo $lgroup['id'];?>"><?php echo $lgroup['ledger_group'];?></option>
				  <?php
				  }
				  ?>
				  </select>
                </div>
				 <div class="form-group col-sm-4">
                  <label for="party">Payment Mode</label>
				  <select class="form-control" name="payment_mode" id="payment_mode" onchange = "ShowHideDiv()">
				    <option value="">Select the Option</option>
				  <option value="Cash">Cash</option>
				    <option value="Cheque">Cheque</option>
				   <option value="Neft">Neft</option>
				   <option value="RTGS">RTGS</option>
				  </select>
				   </div>
				 <div class="form-group col-sm-12" id="bank_details" style="display:none">
				
					<div class="form-group col-sm-4">
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
			  	<div class="form-group col-sm-4">
              <label for="Branch">Account No</label>
              <select class="form-control" name="AccountNo" id="AccountNo" class="form-control" onChange="get_bankid();"></select>
                </div>
				<div class="form-group col-sm-4">
              <label for="Branch">Cheque Number Or Reference No</label>
              <input type="number" class="form-control" name="ChequeNumber" id="ChequeNumber" class="form-control">
                </div>
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Bank Id</label>
                  <input type="text" class="form-control" name="BankId" id="BankId" readonly>
                </div>
				
					<div class="form-group col-sm-4">
                  <label for="Branch">Ledger Id</label>
                  <input type="text" class="form-control" name="LedgerId" id="LedgerId" readonly>
                </div>
				</div>	
              </div>
			   <div class="box-body">
			                <div class="box-footer">
			 <?php 
			 if($_REQUEST['balance']>'0')
			 {
			 ?>
              <button  type="submit" class="btn btn-info pull-right" onClick="return confirm('Are You Sure Want To Save?');">Submit</button>
			  <?php
			 }
			 ?>
              </div>
			    </div>
			       <div class="box-header">
              <h3 class="box-title">Payment Report</h3>
            </div>
            <!-- /.box-header -->
               <div class="box-body">
                <div class="form-group col-sm-12">
				<div style="overflow:auto">
                <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
				<th>Sl No</th>
				<th>Painter Name</th>
				<th>Invoice No</th>
                <th>Paid Date</th>
				<th>Paid Amount</th>
								
                </tr>
                </thead>
                <tbody>										
				<?php
					$i=0;
				 	$Dcs="select * from painter_outstanding where InvoiceId='".$_REQUEST['invoiceid']."'"; 
					$ds=mysqli_query($conn,$Dcs);
					while($cx=mysqli_fetch_array($ds))
					{
						
						$co="select * from m_painters_master where Id='".$cx['PainterName']."'";
						$mn=mysqli_query($conn,$co);
						$cxsa=mysqli_fetch_array($mn);
						
						$Dcs1="select * from s_outsources where Id='".$cx['InvoiceId']."'"; 
					   $ds1=mysqli_query($conn,$Dcs1);
					   $cx1=mysqli_fetch_array($ds1);
						
						 $Cdsa="select * from a_final_bill where Id='".$cx1['Id']."'"; 
						$nx=mysqli_query($conn,$Cdsa);
						$cxz=mysqli_fetch_array($nx);
						
						$i++;
				?>
                <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $cxsa['PainterName'];?></td>
				<td><?php echo $cxz['inv_no'];?></td>
				<td><?php echo $cx['PaidDate'];?></td>
				<td><?php echo $cx['PaidAmount'];?></td>
				<?php
				}				
				?>                  
                </tr>				
                </tbody>
              </table>
			  </div>
                </div>				
            </div>
              <!-- /.box-body -->
              <!-- /.box-footer -->
            </form>
			
			
		
          </div>
        </div>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
	 
	 
     user experience. -->
	  <?php include("../../footer.php"); ?>
  <!--footer End-->
 <div class="control-sidebar-bg"></div>
 <?php include("../../includes_db_js.php"); ?>
</body>
</html>