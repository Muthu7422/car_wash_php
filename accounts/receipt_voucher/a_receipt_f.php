<?php
include("../../includes.php");
include("../../redirect.php");

 /* $ss1="select * from cust_outstanding order by id DESC";
$Ess1=mysqli_query($conn,$ss1);
$nid=mysqli_num_rows($Ess1);
$Fss1=mysqli_fetch_array($Ess1);
 
 $vno=$nid+1; */
  $dcn="select * from receipt_voucher";
				  $Edcn=mysqli_query($conn,$dcn);
				  $Rn=mysqli_num_rows($Edcn);
				  $Fdcn=mysqli_fetch_array($Edcn);
				  $dcno=$Rn+1;
 
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
        Receipt Voucher
        <small>Accounts</small>
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

function outst(){ 
    var qty = 0;
    var inputs = document.getElementById('cust_id').value;


$.ajax({
      type:'post',
        url:'cust_out.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("out_amt").value=msg;
   
       }
 });

}

function outst_ad(){ 
    var qty = 0;
    var inputs = document.getElementById('cust_id').value;


$.ajax({
      type:'post',
        url:'cust_out_ad.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("out_amt_ad").value=msg;
      
      
       }
 });

}
function custno(){ 
    var qty = 0;
    var inputs1 = document.getElementById('cust_id').value;


$.ajax({
      type:'post',
        url:'cust_mole_number.php',// put your real file name 
        data:{inputs1},
        success:function(msg){
              // your message will come here.  
        document.getElementById("cust_number").value=msg;
      
      
       }
 });

}
function outst_ad1(){ 
    var qty = 0;
    var inputs = document.getElementById('cust_id').value;


$.ajax({
      type:'post',
        url:'cust_voucher_id.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("aid").value=msg;
      
      
       }
 });

}


function getinvoice(val) {
			$.ajax({
	type: "POST",
	url: "get_invoice_custchk.php",
	data:'country_id='+val,
	success: function(data){
		$("#iname").html(data);
		}
		});
		}
function getbank(val) {
	var jstatus = document.getElementById('jstatus').value;
	
	$.ajax({
	type: "POST",
	url: "get_Accounts.php",
	data: {jstatus: jstatus},
	success: function(data){
		$("#cdetails").html(data);
		}
		});
		}	
function getCash(val) {
	var jstatus = document.getElementById('jstatus').value;
	
	$.ajax({
	type: "POST",
	url: "get_cash.php",
	data: {jstatus: jstatus},
	success: function(data){
		$("#cdetails").html(data);
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
        document.getElementById("BCash").value=msg;
   
       }
 });

}
		
    function ShowHideDiv() {
        var paymentoption = document.getElementById("ttype");
        var bank = document.getElementById("bank_details");
		if(paymentoption.value == "bank")
		{
	        bank.style.display = paymentoption.value == "bank" ? "block" : "none";
		}
		else
		{
			
			 bank.style.display = paymentoption.value == "" ? "block" : "none";
		}
			   // bank.style.display = paymentoption.value == "Neft" ? "block" : "none";
				 // bank.style.display = paymentoption.value == "RTGS" ? "block" : "none";
	 }
	 



</script> 
  
   <section class="content container-fluid">
	<form class="form-horizontal" method="post" action="a_voucher_out_act.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create Voucher</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
            
              <div class="box-body">
			  <?php 
             $p="select * from job_card_no where branch_id='".$_SESSION['BranchId']."'";
             $Ep=mysqli_query($conn,$p);
             $Fp=mysqli_fetch_array($Ep);
             $pn=$Fp['rv'];
			  $rv=$pn+1;
			 

			/*  if($_REQUEST['Voucher_Id']!="")
			 {
			 $Ajon=$_REQUEST['Voucher_Id'];
			 }
			 else
			 { */
			 $Ajon=$pn; 
			 //}
			  ?>
                  
                <div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">Voucher Id</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="Voucher_Id" id="Voucher_Id" value="<?php echo $Ajon; ?>"  readonly="true">
                    </div>
                </div>
				
				 <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Voucher Date</label>
                      <div class="col-sm-3">
                       <div class="input-group date">
                  <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="v_date" class="form-control pull-right" id="v_date" value="<?php echo date("Y-m-d") ?>" onKeyPress="return tabE1(this,event)" autofocus>
                </div>
                </div>
                      </div>
                             
			
					 <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Customer Name</label>
                      <div class="col-sm-3">
                      
                      <select name="cust_id" id="cust_id" class="form-control" onChange="outst();getinvoice(this.value);outst_ad();outst_ad1();custno();">
					 
					  <option>Select The Customer Name</option>
							<?php
						
						 $dep1="select * from a_customer where FrachiseeId='".$_SESSION['BranchId']."' AND status='Active'";
						$dep=mysqli_query($conn,$dep1);
						while($result=mysqli_fetch_array($dep))  
						{
						?>
						<option value="<?php echo $result['id'];?>"><?php echo $result['cust_name'];?></option>
						<?php
						}
						?>
						</select>
					  
					  </div>
                    </div>  
			
				  <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Customer Mobile</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="cust_number" id="cust_number"   placeholder="Customer Mobile" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required readonly="true">
						      </div>
                    </div> 	
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Outstanding Amount</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="out_amt" id="out_amt"   placeholder="Outstanding" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required readonly="true">
						      </div>
                    </div> 	 
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Outstanding Invoice</label>
                      <div class="col-sm-3">
						<div name="iname" id="iname">
						</div>
                      </div>
                    </div> 

				
				  <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Paid Amount</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="out_amt_ad" id="out_amt_ad"   placeholder="Paid Amount" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required readonly="true">
                        <input type="hidden" class="form-control" name="aid" id="aid" placeholder="Advance" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required readonly="true">
                      </div>
                    </div>					
                  <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Receipt Amount</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="amount" id="amount"   placeholder="Amount" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required>
                      </div>
                    </div> 
					  <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Payment Mode</label>
					  <div class="col-sm-3">
                  <select  type="text" class="form-control" name="jstatus" id="jstatus" onChange="getbank(this.value);getCash(this.value)" required>
				  <option>--select the value--</option>
				  <option value="Bank">Bank</option>
				  <option value="Cash">Cash</option>
				 
				  </select>
                </div> </div>
				<div class="box-body">
				<div  id="cdetails" name="cdetails" >
				</div>
				 </div>
				
				
            
			  <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Remarks</label>
                      <div class="col-sm-3">
                        <textarea class="form-control" name="remarks" id="remarks"   placeholder=""></textarea>
                      </div>
                    </div>
			  
			  
			  </div> 
              <!-- /.box-body -->
			  
              <div class="box-footer">
			 
                <button type="submit" class="btn btn-default " onClick="javascript:history.go(-1);">Cancel</button>
                <button type="submit" class="btn btn-info pull-right" Onclick="return confirm('Are you sure want to proceed?')">Save Changes</button>
              </div>
              <!-- /.box-footer -->
              </div>
			
          </div>
        </div>
     
      
	</form>
	 </section>
	
	
	<div class="row" hidden>
        <!-- left column -->
		
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Receipt</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
              <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
                <th>S.No</th>
                <th>Date</th>
				<th>Voucher ID</th>
                <th>Cust Name</th>
				<th>Paid Amount</th>
				<th>Payment Mode</th>
				<th>Remarks</th>
				<th>Print</th>
				</tr>
                </thead>
                <tbody>
				<?php
		
				
				
				$ct="SELECT * from receipt_voucher where franchisee_id='".$_SESSION['BranchId']."'";
				$Ect=mysqli_query($conn,$ct);
				$n=mysqli_num_rows($Ect);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{								

 
	            $acc1="select * from a_customer where FrachiseeId='".$_SESSION['BranchId']."' and id='".$Fct['cust_id']."'";
					$sccq1=mysqli_query($conn,$acc1);
					$acf1=mysqli_fetch_array($sccq1);			
				$i++;											
				$bg="#FFF";
				?>
                <tr style="background-color:<?php echo $bg; ?>">
                 <td><?php echo $i; ?></td>
				  <td><?php echo $Fct['paid_date']; ?></td>
				  <td><?php echo $Fct['Voucher_Id']; ?></td>
                  <td><?php echo $acf1['cust_name']; ?></td>
				  <td><?php echo $Fct['paid_amt']; ?></td>
				  <td><?php echo $Fct['payment_mode'];  ?></td>
				  <td><?php echo $Fct['remarks'];  ?></td>
				  <td><a href="receipt_print.php?Voucher_Id=<?php echo $Fct['id']; ?>" target="_blank"><i class="fa fa-print" style="font-size:20px;color:red"></i></a></td>
				  
                </tr>
				<?php
				}
				?>
                  </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
            
         
        </div>
      </div>
	
     </div>
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
