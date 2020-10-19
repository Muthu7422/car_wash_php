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
<div class="col-sm-12">
  <div class="box-body">
  <div class="col-sm-6 col-sm-offset-3">
  <h3 align="left"><?php echo $_SESSION['FranchiseeName'];?> - Profit & Loss</h3>
		
		 <h4 align="left"><b>Date From : </b><?php echo $_POST['from'];?> <b>Date To : </b> <?php echo  $_POST['to'];?></h4>	   
		<hr>
	  <table class="table table-bordered">
	   <tr>
		 <td style="background-color:#49f3499e"><b>Account</b></td>
		 <td style="background-color:#49f3499e"><b>Total Amount</b></td>
		 <td style="background-color:#49f3499e" hidden><b>2019</b></td>
	   </tr>
	<?php 
	//------------DATE---------//
	$fromd=$_POST['from'];
	$tod=$_POST['to'];
	//------------DATE END---------//
	//------ Sales value start----//		
					 $qtyselect="select SUM(total_amount) AS totalbill from s_billing where (cdate between '".$_REQUEST['from']."' AND '".$_REQUEST['to']."') and status='Active'";
                        $qtyquery=mysqli_query($conn,$qtyselect);
                        $qtyfetch=mysqli_fetch_array($qtyquery);
						
						$OpeingStock = $qtyfetch['totalbill'];
						
					   $current_qtyselect="select SUM(total_amount) AS totalreturnbill from s_billing_return where (cdate between '".$_REQUEST['from']."' AND '".$_REQUEST['to']."') and status='Active'";
                      $current_qtyquery=mysqli_query($conn,$current_qtyselect);
                        $current_qtyfetch=mysqli_fetch_array($current_qtyquery);
						$betweenRate = $current_qtyfetch['totalreturnbill'];
						$ClosingStock= $OpeingStock-$betweenRate;
						
	//------ Sales  value End----//
            
					//------Purchase Opening stock value start----//		
					 $qtyselect1="select SUM(TotalPurchaseAmount) AS totalbill from s_purchase where (pdate between '".$_REQUEST['from']."' AND '".$_REQUEST['to']."') and purchase_details='Purchase'";
                        $qtyquery1=mysqli_query($conn,$qtyselect1);
                        $qtyfetch1=mysqli_fetch_array($qtyquery1);
						
						$OpeingStock1 = $qtyfetch1['totalbill'];
						
					   $current_qtyselect1="select SUM(TotalPurchaseAmount) AS totalreturnbill from s_purchase_return where (pdate between '".$_REQUEST['from']."' AND '".$_REQUEST['to']."') and purchase_details='Purchase Return'";
                      $current_qtyquery1=mysqli_query($conn,$current_qtyselect1);
                        $current_qtyfetch1=mysqli_fetch_array($current_qtyquery1);
						$betweenRate1 = $current_qtyfetch1['totalreturnbill'];
						$ClosingStock1= $OpeingStock1-$betweenRate1;
						
	//------ purchase for Opening stock value End----//
		//------Direct Expenses value start----//	
		$ledger="SELECT * FROM m_ledger_group where ledger_group='Direct Expenses' AND status='Active'";
		$ledge=mysqli_query($conn,$ledger);
		$ledg=mysqli_fetch_array($ledge);
		
		 $ledger1="SELECT SUM(ExpenseAmount) AS totalexpenses FROM expense_details where LedgerGroup='".$ledg['id']."' AND (ExpenseDate between '".$_REQUEST['from']."' AND '".$_REQUEST['to']."')";
		$ledge1=mysqli_query($conn,$ledger1);
		$ledg1=mysqli_fetch_array($ledge1);
		$expensesd=$ledg1['totalexpenses'];
		//------ Direct Expenses value end----//		
	//------Indirect Expenses value start----//	
		$ledger1="SELECT * FROM m_ledger_group where ledger_group='Indirect Expenses' AND status='Active'";
		$ledge1=mysqli_query($conn,$ledger1);
		$ledg1=mysqli_fetch_array($ledge1);
		
		 $ledger2="SELECT SUM(ExpenseAmount) AS totalexpenses FROM expense_details where LedgerGroup='".$ledg1['id']."' AND (ExpenseDate between '".$_REQUEST['from']."' AND '".$_REQUEST['to']."')";
		$ledge2=mysqli_query($conn,$ledger2);
		$ledg2=mysqli_fetch_array($ledge2);
		$expensese=$ledg2['totalexpenses'];
		$totalsalespurchase=$ClosingStock-$OpeingStock1-$expensesd;
		
		$nettradingprofit=$totalsalespurchase-$expensese;
		//------Indirect Expenses value end----//	
		
					
					
						//------Repairing And Maintanance value start----//	
		$ledger11="SELECT * FROM m_ledger_group where ledger_group='Repairing And Maintanance' AND status='Active'";
		$ledge11=mysqli_query($conn,$ledger11);
		$ledg11=mysqli_fetch_array($ledge11);
		
		 $ledger22="SELECT * FROM expense_details where LedgerGroup='".$ledg11['id']."' AND (ExpenseDate between '".$_REQUEST['from']."' AND '".$_REQUEST['to']."')";
		$ledge22=mysqli_query($conn,$ledger22);
		$ledg22=mysqli_fetch_array($ledge22);

$totalr_m=$totalr_m+$ledg22['ExpenseAmount'];
		
		//------Repairing And Maintanance value end----//
					
			
				//------Repairing And Maintanance value start----//	
		$ledger11="SELECT * FROM m_ledger_group where ledger_group='Repairing And Maintanance' AND status='Active'";
		$ledge11=mysqli_query($conn,$ledger11);
		$ledg11=mysqli_fetch_array($ledge11);
		
		$ledger22="SELECT * FROM expense_details where LedgerGroup='".$ledg11['id']."' AND (ExpenseDate between '".$_REQUEST['from']."' AND '".$_REQUEST['to']."')";
		$ledge22=mysqli_query($conn,$ledger22);
		$ledg22=mysqli_fetch_array($ledge22);

$totalr_m=$totalr_m+$ledg22['ExpenseAmount'];
		
		//------Repairing And Maintanance value end----//				
	
	?>
		
		<tr><td><b>Operating Profit<b></td><td>&nbsp;</td><td hidden>&nbsp;</td></tr>
		
		<tr><td><b>Gross Profit<b></td><td>&nbsp;</td><td hidden>&nbsp;</td></tr>
		
		<tr><td><b>Revenue</b></td><td>&nbsp;</td><td hidden>&nbsp;</td></tr>		
		
		<tr><td><?php echo $OpeingStock; ?> Product Sales</td><td><?php echo $OpeingStock; ?></td><td hidden><?php echo $OpeingStock; ?></td></tr>
		
		<tr><td><b>Total Revenue</b></td><td><b><?php echo $OpeingStock; ?></b></td><td hidden><b><?php echo $OpeingStock; ?></b></td></tr>
		
		<tr><td><b>Cost of Revenue</b></td><td>&nbsp;</td><td hidden>&nbsp;</td></tr>
		
		<tr><td><?php echo $OpeingStock; ?> Cost of Goods Sold</td><td><?php echo $OpeingStock; ?></td><td hidden><?php echo $OpeingStock; ?></td></tr>
		
		<tr><td><?php echo $OpeingStock; ?> FOC Account</td><td><?php echo $OpeingStock; ?></td><td hidden><?php echo $OpeingStock; ?></td></tr>
		
		<tr><td><?php echo $OpeingStock; ?> Purchases A/C</td><td><?php echo $OpeingStock1; ?></td><td hidden><?php echo $OpeingStock1; ?></td></tr>
		
		<tr><td><b>Total Cost of Revenue<b></td><td><b><?php echo $OpeingStock; ?></b></td><td hidden><b><?php echo $OpeingStock; ?></b></td></tr>
		
		<tr><td><b>Total Gross Profit<b></td><td><b><?php echo $OpeingStock; ?></b></td><td hidden><b><?php echo $OpeingStock; ?></b></td></tr>
		
		<tr><td><b>Operating Expenses<b></td><td>&nbsp;</td><td hidden>&nbsp;</td></tr>
		
		<tr><td><b>General & Admn Expenses<b></td><td>&nbsp;</td><td hidden>&nbsp;</td></tr>
		
		<?php
		$fdate=$_POST['from'];
		$tdate=$_POST['to'];
				
		$i=0; 
		$Gtotal=0;
		//$ledger23="SELECT * FROM account_cash_bank WHERE (date between '$fdate' AND '$tdate') ORDER BY id"; 
		$ledger23="select *,sum(`amount`) as sqty from account_cash_bank Where (date between '$fdate' AND '$tdate') group by ledger_id";		
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
		
		 
		
		<tr><td><b>Total General & Admn Expenses<b></td><td><b><?php echo $Gtotal; ?></b></td><td hidden><b><?php echo $Gtotal; ?></b></td></tr>
		
		
		</table>

<a href="profit_loss.php"><button  type="submit" class="btn btn-info pull-right" >back</button></a>

</div>
</div>

   </div>
</body>
</html>

