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
  <?php include("../../includes_db_css.php"); ?>
   
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
       Edit Employee Accommodation
        <small></small>
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
		
	function fnBalance()  
{
    var value1= parseInt(document.getElementById("totalvalue").value);
	if(document.getElementById("paying_advance_amount").value=='')
	{
    var value2=0;
	}
	else
	{
	var value2=parseInt(document.getElementById("paying_advance_amount").value);	
	}
	var sum=value1-value2;
    document.getElementById("balance_amount").value=sum;
}
	function getrent(val) {
		var value1= parseInt(document.getElementById("Amount").value);
		var value2= parseInt(document.getElementById("No_of_Emp").value);
	
		var rent = value1/value2;
		document.getElementById("rent_per_emp").value=rent;
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
    <form role="form" method="post" action="a_emp_accom_editQ.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
				 $ss="select * from emp_accom where id='".$_REQUEST['Id']."'";
				$Ess=mysqli_query($conn,$ss);
				$FEss=mysqli_fetch_array($Ess);
			?>
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
                  <input type="date" class="form-control" name="Date" id="Date" value="<?php echo $FEss['Date']; ?>" >
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Payment Mode</label>
                  <select  type="date" class="form-control" name="Pay_mode" id="Pay_mode" onChange="getcolor(this.value);" >
				  <option value="<?php echo $FEss['Pay_mode']; ?>" selected><?php echo $FEss['Pay_mode']; ?></option>
				  <option value="Bank">Bank</option>
				  <option value="Cash">Cash</option>
				  </select>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Ledger Group</label>
				  <select type="text" class="form-control" name="LedgerGroup" id="LedgerGroup" onChange="getExpType(this.value);">
				
				 <?php 
				  $set="select * from m_ledger_group where status='Active' order by ledger_group";
				  $Eset=mysqli_query($conn,$set);
				  while($FEset=mysqli_fetch_array($Eset))
				  {
				  if($FEset['id']==$FEss['LedgerGroup'])
				  {
				  ?>
				  <option value="<?php echo $FEset['id']; ?>" selected><?php echo $FEset['ledger_group']; ?></option>
				  <?php }
                   else
				   {
				  ?>
				  <option value="<?php echo $FEset['id']; ?>"><?php echo $FEset['ledger_group']; ?></option>
				   <?php }
				  }				   ?>
				  </select>
                </div>
				
				<div class="box-body">
				<div  id="cdetails" name="cdetails" >
				</div>
				 </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Amount</label>
                  <input type="number" class="form-control" name="Amount" id="Amount" step=".01" value="<?php echo $FEss['Amount']; ?>" required>
                </div>
				 
			     <div class="form-group col-sm-4">
                  <label for="Branch">Number of Employees</label>
                  <input type="number" class="form-control" name="No_of_Emp" id="No_of_Emp" onChange="getrent();" value="<?php echo $FEss['No_of_Emp']; ?>" required>
                </div>
				
			    <div class="form-group col-sm-4">
                  <label for="Branch">Rent per employee</label>
                  <input type="number" class="form-control" name="rent_per_emp" id="rent_per_emp"  value="<?php echo $FEss['rent_per_emp']; ?>">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Status</label>
                  <select class="form-control " id="Status" name="Status">
				   <option value="<?php echo $FEss['Status']; ?>" select><?php echo $FEss['Status']; ?></option>
				   <option value="Active">Active</option>
				   <option value="Deactive">Deactive</option>
				  </select>
                </div>
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>    
         </div>
    </form>
	</section>
    <!-- /.content -->
	
	  <section class="content container-fluid">
       
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
				  <th>Date</th>
				  <th>Amount</th>
				  <th>No of Employees</th>
				  <th>Rent Per Employee</th>
				  <th>Status</th>
				  
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from  emp_accom where Status='Active' order by Id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{	
					$i++;
				?>
                <tr>
                   <td><?php echo $i; ?></td>
				  <td><?php  echo $FEss['Date']; ?></td>
				  <td><?php  echo $FEss['Amount']; ?></td>
				  <td><?php  echo $FEss['No_of_Emp']; ?></td>
				  <td><?php  echo $FEss['rent_per_emp']; ?></td>
				    <td><?php  echo $FEss['Status']; ?></td>
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
	<section class="content container-fluid">
	</section>
	
</div>

  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("../../footer.php"); ?>
  <!--footer End-->
</div>
 <?php include("../../includes_db_js.php"); ?>
 
</body>
</html>
