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
		
		<h4 align="left"><?php echo $_POST['from'];?> to <?php echo  $_POST['to'];?></h4>
		<hr>
	<table class="table table-bordered">
	<tr>
	<th>PARTICULARS</th>
	<th>AMOUNT </th>
<tr>
		
		<td> Opening Stock : </td>
		<td><?php echo $_POST['OpeningStock']; ?> </td>
		</tr>
		<tr>
		<td> Purcahse Accounts : </td>
		<td><?php echo $_POST['PurcahseAccounts']; ?> </td>
		</tr>
		
		<tr>
		<td>  Gross Profit C/O :</td>
		<td><?php echo $_POST['GrossProfitCO']; ?> </td>
		</tr>
		
			<tr>
		<td> Total : </td>
		<td><?php echo $_POST['TotalAmountP']; ?> </td>
		</tr>
		
		<tr>
		<td> Nett Profit : </td>
		<td><?php echo $_POST['NettProfit']; ?> </td>
		</tr>
			<tr>
		<td> <B> NET TOTAL: </b></td>
		<td><b><?php echo $_POST['NetTotalP']; ?> </b></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		</tr>
		<tr>
		<td> Sales Account</td>
		<td><?php echo $_POST['SalesAccount'];?></td>
		</tr>
		<tr>
		<td> Direct Incomes : </td>
		<td><?php echo $_POST['DirectIncomes'];?></td>
		</tr>
		
		<tr>
		<td>  Closing Stock : </td>
		<td><?php echo $_POST['ClosingStock'];?></td>
		</tr>
		
		<tr>
		<td> Total : </td>
		<td><?php echo $_POST['TotalAmountS'];?></td>
		</tr>
		
			<tr>
		<td> Gross Profit b/f :</td>
		<td><?php echo $_POST['GrossProfitbf'];?></td>
		</tr>
		
		<tr>
		<td> Indirect Incomes : </td>
		<td><?php echo $_POST['IndirectIncomes'];?></td>
		</tr>
		
			<tr>
		<td> Indirect Expenses : </td>
		<td><?php echo $_POST['IndirectExpenses'];?></td>
		</tr>
		
			<tr>
		<td><label for="Branch"><B> NET TOTAL : </b> </label></td>
		<td><b><?php echo $_POST['NetTotalS'];?></b></td>
		
		</tr>
</table>
</div>
</div>
   </div>
</body>
</html>

