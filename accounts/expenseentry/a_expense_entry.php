<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
 
 <script>
 function getExpType():
 {
	var  
 }
 </script>
  
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
        Expense Entry
        <small>Expense <?php if(!isset($_REQUEST['msg'])==''){ ?> <span class="alert alert-danger"> <?php echo $_REQUEST['msg']; ?> </span><?php } ?></small>
      </h1>
     </section>
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
   <script>
   function getExpType(val) {
	$.ajax({
	type: "POST",
	url: "get_entry.php",
	data:'country_id='+val,
	success: function(data){
		$("#ExpenseType").html(data);
		}
		});
		}
		
function getcolor(val) {
	var PaymentMode = document.getElementById('PaymentMode').value;
	
	$.ajax({
	type: "POST",
	url: "get_Accounts.php",
	data: {PaymentMode: PaymentMode},
	success: function(data){
		$("#cdetails").html(data);
		}
		});
		}	
   </script>
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="a_expense_entry_addQ.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
               
			 
	   <div class="box-body">
	   
				<div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
                  <input type="date" class="form-control" name="ExpenseDate" id="ExpenseDate" value="<?php echo date('Y-m-d'); ?>" required>
                  <input type="hidden" class="form-control" name="franchisee_id"  id="franchisee_id" value="<?php echo $var['id']; ?>" readonly placeholder="Pid" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required> 
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Payment Mode</label>
                  <select  type="date" class="form-control" name="PaymentMode" id="PaymentMode" onChange="getcolor(this.value);" required>
				  <option>--select the value--</option>
				  <option value="Bank">Bank</option>
				  <option value="Cash">Cash</option>
				  </select>
                </div>
					<div class="box-body">
				<div  id="cdetails" name="cdetails" >
				</div>
				 </div>
                      <div class="form-group col-sm-4 ">
                  <label for="Branch">Ledger Group</label>
				  <select type="text" class="form-control" name="LedgerGroup" id="LedgerGroup" onChange="getExpType(this.value);">
				 <option value="">--Select Ledger Group--</option>
				 <?php 
				  $set="select * from m_ledger_group where status='Active' order by ledger_group";
				  $Eset=mysqli_query($conn,$set);
				  while($FEset=mysqli_fetch_array($Eset))
				  {
				  
				  ?>
				  <option value="<?php echo $FEset['id']; ?>"><?php echo $FEset['ledger_group']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				
               
			    <div class="form-group col-sm-4">
			    <label for="Branch">Expense Type</label>
				  <select class="form-control" name="ExpenseT" id="ExpenseT">
				  <option value="">-- Select Expense Type --</option>
				  <?php
                    $et="select * from m_ledger where Id order by Id";				  
				    $Eet=mysqli_query($conn,$et);
				    while($FEet=mysqli_fetch_array($Eet))
				  {					  
				  ?>
				  <option value="<?php echo $FEet['Id']; ?>"><?php echo $FEet['LedgerName']; ?></option>
				  <?php } ?>
				  </select>
				</div>
				
			
				
				<div class="form-group col-sm-4" >
			 <label for="Branch">Employee Name</label>
				  <select type="text" class="form-control" name="emp_name" id="emp_name" onChange="getExpType(this.value);">
				 <option value="">--Select The Name--</option>
				 <?php 
				  $set="select * from h_employee where status='Active'";
				  $Eset=mysqli_query($conn,$set);
				  while($FEset=mysqli_fetch_array($Eset))
				  {
				  
				  ?>
				  <option value="<?php echo $FEset['id']; ?>"><?php echo $FEset['ename']; ?></option>
				  <?php } ?>
				  </select>
				</div>
			
				 <div class="form-group col-sm-4">
                  <label for="Branch">Amount(Without tax)</label>
                  <input type="number" class="form-control" name="ExpenseAmount" id="ExpenseAmount" step=".01" required>
                </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Tax Amount</label>
                  <input type="text" class="form-control" name="TaxAmount" id="TaxAmount">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Remarks</label>
                  <textarea class="form-control" name="ExpenseDescription" id="ExpenseDescription" placeholder="Description" onKeyPress="return tabE(this,event)"></textarea>
                </div>
				  <div class="form-group col-sm-2 pull-right">
			   <label for="catname"></label>
                  <label for="Branch">&nbsp;</label>
                  <input type="Submit" placeholder="Add" id="EntryExpense" name="EntryExpense"  style="background-color:#37B8F8; color:#000000" value="Submit" onClick="return confirm('Are You Sure Want To Proceed?');" class="form-control">
				  </div>   
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	   
         </div>
    </form>
	</section>
    <!-- /.content -->
	
	  <section class="content container-fluid" hidden>
       
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-12" style="overflow:auto">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				
                  <th>S.No</th>
				  <th>Expense Date</th>
                  <th>Ledger Group</th>
				   <th>Expense Type</th>
				     <th>Account No</th>
				  <th>Amount</th>
				  <th>Expense Description</th>
				  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from expense_details where Status='Active' and franchisee_id='".$_SESSION['BranchId']."' order by Id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$set5="select * from m_ledger_group where id='".$FEss['LedgerGroup']."'";
				$Eset5=mysqli_query($conn,$set5);
				$FEset5=mysqli_fetch_array($Eset5); 
				 
				$set6="select * from expense_master where Id='".$FEss['ExpenseType']."'";
				$Eset6=mysqli_query($conn,$set6);
				$FEset6=mysqli_fetch_array($Eset6); 
				
				 $set1="select * from a_bank_acc where Id='".$FEss['AccountNo']."'";
				$Eset2=mysqli_query($conn,$set1);
				$FEset3=mysqli_fetch_array($Eset2); 
					
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $FEss['ExpenseDate']; ?></td>
				  <td><?php  echo $FEset5['ledger_group']; ?></td>
				  <td><?php  echo $FEset6['ExpenseType']; ?></td>
				  <td><?php  echo $FEset3['AccountNumber']; ?></td>
				  <td><?php  echo $FEss['ExpenseAmount']; ?></td>
				   <td><?php  echo $FEss['ExpenseDescription']; ?></td>
				    <td><?php  echo $FEss['Status']; ?></td>
				  
                  <td>
                    <a href="a_expense_entry_editQ.php?Id=<?php  echo $FEss['Id']; ?>" class="btn-box-tool" onClick="return confirm('Are You Sure Want To Delete?');"><i class="fa fa-trash custom-icon1"></i></a>
				  </td>
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

  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("../../footer.php"); ?>
  <!--footer End-->
    <div class="control-sidebar-bg"></div>
</div>
 <?php include("../../includes_db_js.php"); ?>
 

 
</body>
</html>
