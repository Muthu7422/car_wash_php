<?php
include("../../includes.php");
include("../../redirect.php");

  $ss1="select * from journal_entry order by id DESC";
  $Ess1=mysqli_query($conn,$ss1); 
  $Fss1=mysqli_fetch_array($Ess1);

 $nid=mysqli_num_rows($Ess1);
 $vno=$nid+1;
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
        Journal Entry<small>Master</small>
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
    var inputs = document.getElementById('cust_name').value;


$.ajax({
      type:'post',
        url:'sup_out.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("out_amt").value=msg;
   
       }
 });

}

function outst_ad(){ 
    var qty = 0;
    var inputs = document.getElementById('cust_name').value;


$.ajax({
      type:'post',
        url:'sup_out_ad.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("out_amt_ad").value=msg;
   
       }
 });

}


function getinvoice(val) {
			$.ajax({
	type: "POST",
	url: "get_invoice_supchk.php",
	data:'country_id='+val,
	success: function(data){
		$("#iname").html(data);
		}
		});
		}


</script> 

<script type="text/javascript">
    function ShowHideDiv() {
        var ttype = document.getElementById("ttype");
        var bank = document.getElementById("bank_details");
		if(ttype.value == "Cheque")
		{
	        bank.style.display = ttype.value == "Cheque" ? "block" : "none";
		}
		else if(ttype.value == 'Neft')
		{
	         bank.style.display = ttype.value == "Neft" ? "block" : "none";
		}
		else if(ttype.value == 'RTGS')
		{
	         bank.style.display = ttype.value == "RTGS" ? "block" : "none";
		}
		else
		{
			
			 bank.style.display = ttype.value == "" ? "block" : "none";
		}
			   // bank.style.display = paymentoption.value == "Neft" ? "block" : "none";
				 // bank.style.display = paymentoption.value == "RTGS" ? "block" : "none";
	 }
	 </script>
	 <script>
	 
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
</script>
   
   <section class="content container-fluid">
	<form class="form-horizontal" method="post" action="journal_entry_act.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create Journal Entry</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			    <div class="box-body">
                <div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">Journal No</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="journal_entry_no" id="journal_entry_no" value="<?php echo $vno; ?>" required readonly="true" >
                  </div>
                </div>
				
				 <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label"> Date</label>
                      <div class="col-sm-3">
                       <div class="input-group date">
                  <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="date" class="form-control pull-right" id="date" value="<?php echo date("Y-m-d") ?>" onKeyPress="return tabE1(this,event)" autofocus>
                </div>
                </div>
                </div>
                             
					
                <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">By</label>
                      <div class="col-sm-3">
                      
                      <select name="journal_by" id="journal_by" class="form-control" onChange="outst();getinvoice(this.value);outst_ad();">
					  <option>Select The Ledger</option>
							<?php
							$dcm1="select * from m_ledger ";
							$dpm1=mysqli_query($conn,$dcm1);
							while($pcm1=mysqli_fetch_array($dpm1))
							{
						?>
						<option value="<?php echo $pcm1['Id'];?>"><?php echo $pcm1['LedgerName'];?></option>
						<?php
						}
						?>
						</select>
					  
					  </div>
                    </div>  
				  
				  
				      <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">To</label>
                      <div class="col-sm-3">
                      
                      <select name="journal_to" id="journal_to" class="form-control" onChange="outst();getinvoice(this.value);outst_ad();">
					  <option>Select The Ledger</option>
							<?php
						$dep1="select * from m_ledger ";
						$dep=mysqli_query($conn,$dep1);
						while($result=mysqli_fetch_array($dep))
						{
							
						?>
						<option value="<?php echo $result['Id'];?>"><?php echo $result['LedgerName'];?></option>
						<?php
						}
						?>
						</select>
					  
					  </div>
                    </div>  
					
                     <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label"> Amount</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="amount" id="amount"   placeholder="Amount" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required>
                      </div>
                     </div> 
					
				 
					
				
				 
              <!-- /.box-body -->
			  
              <div class="box-footer">			 
                <button type="submit" class="btn btn-default " onClick="javascript:history.go(-1);">Cancel</button>
                <button type="submit" class="btn btn-info pull-right"  onClick="return confirm('Are You Sure Want to Proceed?');">Save Changes</button>
              </div>
              <!-- /.box-footer -->
            
			
         <section class="content container-fluid ">
       
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				
                  <th>S.No</th>
                  <th>Ledger By</th>
				  <th>Ledger To</th>
				  <th>Amount</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from journal_entry where franchisee_id='".$_SESSION['BranchId']."'";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$dcm="select * from m_ledger where Id='".$FEss['journal_to']."'";
							$dpm=mysqli_query($conn,$dcm);
							$pcm=mysqli_fetch_array($dpm);
							
							$dcm1="select * from m_ledger where Id='".$FEss['journal_by']."'";
							$dpm1=mysqli_query($conn,$dcm1);
							$pcm1=mysqli_fetch_array($dpm1);
				

					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $pcm1['LedgerName']; ?></td>
				  <td><?php  echo $pcm['LedgerName']; ?></td>
				  <td><?php  echo $FEss['amount']; ?></td>
            
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
	      
         </div>

	</section>
          </div>
        </div>
      </div>
      
	</form>
    </section>
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
