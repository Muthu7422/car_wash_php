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
      <h1>
       Profit & Loss
        <small>Accounts <?php if(!isset($_REQUEST['msg'])==''){ ?> <span class="alert alert-danger"> <?php echo $_REQUEST['msg']; ?> </span><?php } ?></small>
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
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="profit_loss_report_print.php" autocomplete="off" target="_blank">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
               
			 
	   <div class="box-body">
	  
	   <div class="col-sm-6" style="border-right-style: groove;">
	   <hr>
	    <h3 align="right"><?php echo $_SESSION['FranchiseeName'];?></h3>
		
		<h4 align="right"><input type="date" name="from" id="from" value="<?php echo $_POST['from'];?>" readonly> to <input type="date" name="to" id="to" value="<?php echo  $_POST['to'];?>" readonly></h4>
		<hr>
		
		<table class="table table-bordered">
	<tr>
		<td> <B style="color:Red"><label for="Branch">PARTICULARS</label></B></td>
		</tr>
	<?php 
	//------------DATE---------//
	$fromd=$_POST['from'];
	$tod=$_POST['to'];
	//------------DATE END---------//
	
	                             
	//---------CASH ACCOUNT MAIN OUTSTAING-----//
	
	   $opening="select * from a_cash_acc where franchisee_id='".$_SESSION['BranchId']."' order by cdate asc limit 1"; 
	   $openingq=mysqli_query($conn,$opening);
	   $opeingf=mysqli_fetch_array($openingq);

	   
	//---------CASH ACCOUNT MAIN OUTSTAING END-----//
	
	
	//------Quantity Value from purchase for Opening stock value start----//		
						$qtyselect="select SUM(total_amount) AS PRATE from s_purchase_details where qty!='0' and (pdate between '$fromd' and '$tod')  and purchase_details='Open' and franchisee_id='".$_SESSION['BranchId']."'";
                        $qtyquery=mysqli_query($conn,$qtyselect);
                        $qtyfetch=mysqli_fetch_array($qtyquery);
						$OpeingStock = $OpeingStock+$qtyfetch['PRATE'];

	//------Quantity Value from purchase for Opening stock value End----//

	//------Expense---//		
						$qtyselect1="select SUM(ExpenseAmount) AS expense from expense_details where (ExpenseDate between '$fromd' and '$tod')  and status='Active' and franchisee_id='".$_SESSION['BranchId']."'";
                        $qtyquery1=mysqli_query($conn,$qtyselect1);
                        $qtyfetch1=mysqli_fetch_array($qtyquery1);
						$netprofit = $netprofit+$qtyfetch1['expense'];

	//------Expense----//
            
                        $Gross="select sum(total_amt) as sold_sales_value from sales_invoice where (sdate between '$fromd' and '$tod') and bill_status='Open' and FranchiseeId='".$_SESSION['BranchId']."'";
						$Grossq=mysqli_query($conn,$Gross);
						$Grossf=mysqli_fetch_array($Grossq);
						
						$sold_value=round($sold_value+$Grossf['sold_sales_value'],2); 
			
	//-----Gross Profit Calculation Start-----//
	
	  $sales="select SUM(TotalTaxAmount) AS taxamount from sales_invoice where (sdate between '$fromd' AND '$tod') and FranchiseeId='".$_SESSION['BranchId']."'";
	  $salesq=mysqli_query($conn,$sales);
	  $salesf=mysqli_fetch_array($salesq);
	  
	  $tax_value=round($tax_value+$salesf['taxamount'],2); 
	
	//-----Gross Profit Calculation End-----//
	
	// Service Start-----
	
	
		                 $current_qtyselect="select SUM(total_amt) AS jrate from s_job_card where  (jdate between '$fromd' and '$tod') and status='Active' and FranchiseeId='".$_SESSION['BranchId']."' ";
                        $current_qtyquery=mysqli_query($conn,$current_qtyselect);
                        $current_qtyfetch=mysqli_fetch_array($current_qtyquery);
						$betweenRate1 = $betweenRate1+$current_qtyfetch['jrate'];
						// $ClosingStock= $betweenRate + $OpeingStock;
	
	// service End sales_order
	
	//------sales start----//
	
	  $sales="select SUM(TotalPurchaseAmount) AS SAmount from sales_order where (pdate between '$fromd' AND '$tod') and FranchiseeId='".$_SESSION['BranchId']."'";
	  $salesq=mysqli_query($conn,$sales);
	  $salesf=mysqli_fetch_array($salesq);
	 
	
		$sales_order= $sales+$salesf['SAmount'];

	 
	  //------sales  end----//
	  

	
	
	//first part start-----
	
					
					$total_1=$OpeingStock+$netprofit;
				
	//first part End-----		
	
	
		
	//Second part start-----
	
					
					$total_2=$sold_value+$betweenRate1+$tax_value+$sales_order;
				
	//Second part End-----		
	?>

		<tr>
		<td> <label for="Branch">Purcahse Accounts</label></td>
		<td> <input type="number" class="form-control" name="PurcahseAccounts" id="PurcahseAccounts" value="<?php echo $OpeingStock;?>" Placeholder="Purcahse Accounts" readonly></td>
		</tr>

		

		<tr>
		<td> <label for="Branch">Expenses</label></td>
		<td><input type="text" class="form-control" name="NettProfit" id="NettProfit" placeholder="Nett Profit" value="<?php echo $netprofit;?>" onKeyPress="return tabE(this,event)" readonly></td>
		</tr>
		
		<?php
		$fdate=$_POST['from'];
		$tdate=$_POST['to'];
				
		$i=0; 
		$Gtotal=0;
		//$ledger23="SELECT * FROM account_cash_bank WHERE (date between '$fdate' AND '$tdate') ORDER BY id"; 
 		$ledger23="select *,sum(`amount`) as sqty from account_cash_bank Where (date between '$fdate' AND '$tdate') and Narration='Expenses Details' and franchisee_id='".$_SESSION['BranchId']."' group by ledger_id";		
		$ledge23=mysqli_query($conn,$ledger23);
		while($ledg23=mysqli_fetch_array($ledge23))
		  {
			$ledger24="SELECT * FROM m_ledger WHERE Id='".$ledg23['ledger_id']."'";
			$ledge24=mysqli_query($conn,$ledger24);
		    $ledg24=mysqli_fetch_array($ledge24);
			
			$Gtotal=$Gtotal+$ledg23['sqty'];
			
		$i++;	
		?>		
		<tr><td> <?php echo $ledg24['LedgerName']; ?></td><td><?php echo $ledg23['sqty']; ?></td><td hidden><?php echo $ledg23['sqty']; ?></td></tr>				
		<?php } ?>
			<tr>
		<td> <label for="Branch"><B style="color:Red"> Total : </b></label></td>
		<td><b><input type="txt" class="form-control" style="color:red" name="NetTotalP" id="NetTotalP" value="<?php echo $total_1;?>" placeholder="Total" onKeyPress="return tabE(this,event)" readonly></b></td>
		</tr>
		</table>

            </div>
			
			
			
			 
	  
	   <div class="col-sm-6">
	    <hr>
	    <h3 align="right"><?php echo $_SESSION['franchisee_name'];?></h3>
		
		<h4 align="right"><input type="date" name="from" id="from" value="<?php echo $_POST['from'];?>" readonly> to <input type="date" name="to" id="to" value="<?php echo  $_POST['to'];?>" readonly></h4>
		<hr>
		
		
		
		<table class="table table-bordered" >
		<tr>
		<td> <B style="color:Red"><label for="Branch">PARTICULARS</label></b></td>
		</tr>
		
		
		
		
				<tr>
		<td> <label for="Branch"> Sales Account</label></td>
		<td><input type="text" class="form-control" name="GrossProfitbf" id="GrossProfitbf" value="<?php echo $sales_order;?>" placeholder="Gross Profit b/f" onKeyPress="return tabE(this,event)" readonly></td>
		</tr>
		
		<tr>
		<td> <label for="Branch">Sales Orders</label></td>
		<td><input type="text" class="form-control" name="SalesAccount"  id="SalesAccount" value="<?php echo $sold_value; ?>" Placeholder="Sales Account" readonly></td>
		</tr>
		<tr>
		<td> <label for="Branch">Tax Amount</label></td>
		<td> <input type="number" class="form-control" name="DirectIncomes" id="DirectIncomes" value="<?php echo $tax_value;?>" Placeholder="Direct Incomes" readonly></td>
		</tr>
		
		<tr>
		<td>  <label for="Branch">Services</label></td>
		<td><input type="number" class="form-control" name="ClosingStock" id="ClosingStock" value="<?php echo $betweenRate1;?>" Placeholder="Closing Stock" readonly></td>
		</tr>
		

		

		
			<tr>
		<td> <label for="Branch"><B style="color:Red"> Total : </b> </label></td>
		<td><b><input type="txt" class="form-control" style="color:red" name="NetTotalS" id="NetTotalS" placeholder="Total" value="<?php echo number_format($total_2,2); ?>" onKeyPress="return tabE(this,event)" readonly></b></td>
		</tr>
		</table>

			</div>
			
			 <button  type="submit" class="btn btn-info pull-right" >Print</button>
			
			
			
			
			
			
			
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	   
         </div>
    </form>
	</section>
    <!-- /.content -->
	

	
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

