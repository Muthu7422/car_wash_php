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

              <div class="box-body">
			  
                <div class="form-group col-sm-9 col-sm-offset-2">
				<h5>
               Day Book For <?php echo date("d-m-Y");?>
				</h5>
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				
                  <th>S.No</th>
                  <th>Date</th>
				  <th>Particulars</th>
				  <th>Vch Type</th>
				  <th>Vch No</th>
				  <th>Debit Amount (Inwards QTY)</th>
				 <th>Credit Amount (Outwards QTY) </th>
                </tr>
                </thead>
                <tbody>
				<?php
				 $Tdate=date("Y-m-d"); 
				$cash="select * from account_cash where TransactionDate='$Tdate' and franchisee_id='".$_SESSION['BranchId']."'";
				$cashq=mysqli_query($conn,$cash);
				while($cashf=mysqli_fetch_array($cashq))
				{
					if($cashf['TransactionFrom']=='s_purchase')
					{
						$particular='Purchase';
					}
					if($cashf['TransactionFrom']=='sales_invoice')
					{
						$particular='Sales';
					}
					if($cashf['TransactionFrom']=='s_job_card')
					{
						$particular='Job Card';
					}
					if($cashf['TransactionFrom']=='a_final_bill')
					{
						$particular='Service';
					}
					if($cashf['TransactionFrom']=='expense_details')
					{
						$particular='Expense';
					}
					if($cashf['TransactionFrom']=='cust_outstanding')
					{
						$particular='Customer Outstanding';
					}
					if($cashf['TransactionFrom']=='sup_outstanding')
					{
						$particular='Supplier Outstanding';
					}
					
					if($cashf['TransactionType']=='Debit')
					{
						$Debit=$cashf['Amount'];
						$Credit='0.00';
					}
					if($cashf['TransactionType']=='Credit')
					{
						$Debit='0.00';
						$Credit=$cashf['Amount'];
					}
					
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo date("d-m-Y",strtotime($cashf['TransactionDate']));?></td>
				  <td><?php echo $particular;?></td>
				  <td><?php echo $cashf['TransactionType'];?></td>
				  <td><?php echo $cashf['ReferenceNo'];?></td>
				   <td><?php echo $Debit;?></td>
				    <td><?php echo $Credit;?></td>
				 
                </tr>
				<?php
				}
				?>
				<?php
				 $Tdate=date("Y-m-d"); 
				$cash="select * from account_bank where TransactionDate='$Tdate' and franchisee_id='".$_SESSION['BranchId']."'";
				$cashq=mysqli_query($conn,$cash);
				while($cashf=mysqli_fetch_array($cashq))
				{
					if($cashf['TransactionFrom']=='s_purchase')
					{
						$particular='Purchase';
					}
					if($cashf['TransactionFrom']=='sales_invoice')
					{
						$particular='Sales';
					}
					if($cashf['TransactionFrom']=='s_job_card')
					{
						$particular='Job Card';
					}
					if($cashf['TransactionFrom']=='a_final_bill')
					{
						$particular='Service';
					}
					if($cashf['TransactionFrom']=='expense_details')
					{
						$particular='Expense';
					}
					if($cashf['TransactionFrom']=='cust_outstanding')
					{
						$particular='Customer Outstanding';
					}
					if($cashf['TransactionFrom']=='sup_outstanding')
					{
						$particular='Supplier Outstanding';
					}
					
					if($cashf['TransactionType']=='Debit')
					{
						$Debit=$cashf['Amount'];
						$Credit='0.00';
					}
					if($cashf['TransactionType']=='Credit')
					{
						$Debit='0.00';
						$Credit=$cashf['Amount'];
					}
					
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo date("d-m-Y",strtotime($cashf['TransactionDate']));?></td>
				  <td><?php echo $particular;?></td>
				  <td><?php echo $cashf['TransactionType'];?></td>
				  <td><?php echo $cashf['ReferenceNo'];?></td>
				   <td><?php echo $Debit;?></td>
				    <td><?php echo $Credit;?></td>
				 
                </tr>
				<?php
				}
				?>
				<tr>
				<?php 
				$cash="select SUM(Amount) AS TCAmount from account_cash where TransactionDate='$Tdate' AND TransactionType='Credit' and franchisee_id='".$_SESSION['BranchId']."'";
				$cashq=mysqli_query($conn,$cash);
				$cashf=mysqli_fetch_array($cashq);
				
				$cashb="select SUM(Amount) AS TCAmount from account_bank where TransactionDate='$Tdate' AND TransactionType='Credit' and franchisee_id='".$_SESSION['BranchId']."'";
				$cashqb=mysqli_query($conn,$cashb);
				$cashfb=mysqli_fetch_array($cashqb);
				
				$cashD="select SUM(Amount) AS TCAmount from account_cash where TransactionDate='$Tdate' AND TransactionType='Debit' and franchisee_id='".$_SESSION['BranchId']."'";
				$cashqD=mysqli_query($conn,$cashD);
				$cashfD=mysqli_fetch_array($cashqD);
				
				$cashbD="select SUM(Amount) AS TCAmount from account_bank where TransactionDate='$Tdate' AND TransactionType='Debit' and franchisee_id='".$_SESSION['BranchId']."'";
				$cashqbD=mysqli_query($conn,$cashbD);
				$cashfbD=mysqli_fetch_array($cashqbD);
				$DebitAmount=$cashfD['TCAmount']+$cashfbD['TCAmount'];
				$CreditAmount=$cashf['TCAmount']+$cashfb['TCAmount'];
				?>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><B>TOTAL : </B></td>
				<td><B><?php echo $DebitAmount;?>.00</B></td>
				<td><B><?php echo $CreditAmount;?>.00</B></td>
				</tr>
                </tbody>
              </table>
                </div>
            </div>
		
 
</body>
</html>
