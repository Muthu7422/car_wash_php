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
       Balance Sheet
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
    <form role="form" method="post" action="#" autocomplete="off" target="_blank">
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
		
		<table class="table table-bordered">
	<tr>
		<td> <B style="color:Red"><label for="Branch">Current Assets</label></B></td>
		</tr>
        <?php 
	
		 	$Es="select SUM(Amount) AS SAmount from account_cash where TransactionType='Credit'";
			$Eq=mysqli_query($conn,$Es);
			$Eqi=mysqli_fetch_array($Eq);
			
			$Es1="select SUM(Amount) AS SAmount from account_bank where TransactionType='Credit'";
			$Eq1=mysqli_query($conn,$Es1);
			$Eqi1=mysqli_fetch_array($Eq1);
			
			$netcash=$Eqi1['SAmount']+$Eqi['SAmount'];
			
		 	$Yr="select m_spare.smrp,item_stock.StockQuantity from m_spare INNER JOIN item_stock ON m_spare.sid=item_stock.ItemId";
			$Re=mysqli_query($conn,$Yr);
			while($Tc=mysqli_fetch_array($Re))
			{
				 $total=$Tc['smrp']*$Tc['StockQuantity'];
				 $inventory=$inventory+$total;
			}
			
			$Edsa="select DISTINCT(cust_name) from cust_outstanding where franchisee_id='".$_SESSION['BranchId']."'";
			$Rfaw=mysqli_query($conn,$Edsa);
			while($iu=mysqli_fetch_array($Rfaw))
			{
				$Pol="select * from cust_outstanding where cust_name='".$iu['cust_name']."' and franchisee_id='".$_SESSION['BranchId']."' order by id desc limit 1";
				$Tgf=mysqli_query($conn,$Pol);
				$Bvc=mysqli_fetch_array($Tgf);
			
					$total1=$total1+$Bvc['total_outstanding'];
				
				
			}
			
			?>
		<tr>
		
		<td> <label for="Branch">Cash In Bank</label></td>
		<td><input type="text" class="form-control" name="OpeningStock" id="OpeningStock" value="<?php echo $Eqi1['SAmount']; ?>" readonly></td>
		</tr>
		<tr>
		<td> <label for="Branch">Cash In Hand</label></td>
		<td> <input type="number" class="form-control" name="PurcahseAccounts" id="PurcahseAccounts" value="<?php echo $Eqi['SAmount']; ?>" readonly></td>
		</tr>
			<tr>
		<td> <label for="Branch"<B style="color:Red">Net Cash</b></label></td>
		<td><b><input type="txt"  class="form-control" style="color:red" name="TotalAmountP" id="TotalAmountP" value="<?php echo number_format($netcash,2) ?>" placeholder="Total Amount" onKeyPress="return tabE(this,event)" readonly></b></td>
		</tr>
		
		<tr>
		<td> <label for="Branch">Inventory</label></td>
		<td><input type="txt" class="form-control" name="NettProfit" id="NettProfit" placeholder="Nett Profit" value="<?php echo number_format($inventory,2); ?>" onKeyPress="return tabE(this,event)" readonly></td>
		</tr>
		<tr>
		<td> <label for="Branch">Accounts Receivable</label></td>
		<td><input type="txt" class="form-control" name="NettProfit" id="NettProfit" placeholder="Nett Profit" value="<?php echo $total1; ?>" onKeyPress="return tabE(this,event)" readonly></td>
		</tr>
		<?php
				$Totalnetassets=$netcash+$inventory+$total;
				
				?>
			<tr>
		<td> <label for="Branch"><B style="color:Red"> Total Current  Assets : </b></label></td>
		<td><b><input type="txt" class="form-control" style="color:red" name="NetTotalP" id="NetTotalP" value="<?php echo $Totalnetassets;?>" placeholder="Total" onKeyPress="return tabE(this,event)" readonly></b></td>
		</tr>
		
		<tr>
		<td> <label for="Branch"><B style="color:Red"></b></label></td>
		<td> <label for="Branch"><B style="color:Red"></b></label></td>
		</tr>
		<?php 
		$Eop="select SUM(ExpenseAmount+TaxAmount) As Land from expense_details where LedgerGroup='15' and ExpenseType='3'";
		$Trd=mysqli_query($conn,$Eop);
		$Tde=mysqli_fetch_array($Trd);
		
		$Eop1="select SUM(ExpenseAmount+TaxAmount) As Buildings from expense_details where LedgerGroup='15' and ExpenseType='10'";
		$Trd1=mysqli_query($conn,$Eop1);
		$Tde1=mysqli_fetch_array($Trd1);
		
		$Eop2="select SUM(ExpenseAmount+TaxAmount) As Equipment from expense_details where LedgerGroup='15' and ExpenseType='11'";
		$Trd2=mysqli_query($conn,$Eop2);
		$Tde3=mysqli_fetch_array($Trd2);
		
		?>
		<tr>
		<td> <label for="Branch"><B style="color:Red"> Fixed Assets: </b></label></td>
		</tr>
			<tr>
		
		<td> <label for="Branch">Land</label></td>
		<td><input type="text" class="form-control" value="<?php echo $Tde['Land']; ?>" name="OpeningStock" id="OpeningStock" readonly></td>
		</tr>
			<tr>
		<td> <label for="Branch">Buildings</label></td>
		<td><input type="text" class="form-control" name="OpeningStock" value="<?php echo $Tde1['Buildings']; ?>" id="OpeningStock"  readonly></td>
		</tr>
			<tr>
		<td> <label for="Branch">Less Depreciation</label></td>
		<td><input type="text" class="form-control" name="OpeningStock" value="0.00" id="OpeningStock"  readonly></td>
		</tr>
		<?php
		$NetLand=$Tde['Land']+$Tde1['Buildings'];
		
		?>
		<tr>
		<td> <label for="Branch"><B style="color:Red">Net Land & Buildings</b></label></td>
		<td><input type="text" class="form-control" style="color:red" name="OpeningStock"  id="OpeningStock"  value="<?php echo number_format($NetLand,2); ?>" readonly></td>
		</tr>
		<tr>
		<td> <label for="Branch"><B style="color:Red"></b></label></td>
		<td> <label for="Branch"><B style="color:Red"></b></label></td>
		</tr>
			<tr>
		
		<td> <label for="Branch">Equipment</label></td>
		<td><input type="text" class="form-control" name="OpeningStock" value="<?php echo $Tde3['Equipment']; ?>" id="OpeningStock"  readonly></td>
		</tr>
			<tr>
		<td> <label for="Branch">Less Depreciation	</label></td>
		<td><input type="text" class="form-control" name="OpeningStock" value="0.00" id="OpeningStock" readonly></td>
		</tr>
		<tr>
		<td> <label for="Branch"><B style="color:Red">Net Equipment	</b></label></td>
		<td><input type="text" class="form-control" style="color:red" name="OpeningStock" id="OpeningStock" value="<?php echo $Tde3['Equipment']; ?>"  readonly></td>
		</tr>
		<tr height="500px">
		<td><label for="Branch"></label></td>
		<td><label for="Branch"></label></td>
		</tr>
		<?php
		$TotalAssets=$Totalnetassets+$NetLand+$Tde3['Equipment'];
		?>
		<tr>
		<td><label for="Branch">TOTAL ASSETS</label></td>
		<td><label for="Branch"></label><?php echo $TotalAssets ?></td>
		</tr>
		</table>

            </div>
			
			 <?php 
	
		 	$Es="select SUM(Amount) AS SAmount from account_cash where TransactionType='Debit'";
			$Eq=mysqli_query($conn,$Es);
			$Eqi=mysqli_fetch_array($Eq);
			
			$Es1="select SUM(Amount) AS PAmount from account_bank where TransactionType='Debit'";
			$Eq1=mysqli_query($conn,$Es1);
			$Eqi1=mysqli_fetch_array($Eq1);
			
			$Account=$Eqi['SAmount']+$Eqi1['PAmount'];
			// $AccountPayable=$AccountPayable+$Account;
			
			//Salary provision Amount start****
		  	$Ren="select SUM(ExpenseAmount) AS spamount from expense_details where LedgerGroup='58' and franchisee_id='".$_SESSION['BranchId']."'";
			$Wqa=mysqli_query($conn,$Ren);
			$Fcd=mysqli_fetch_array($Wqa);

			
		 	 $salary_provision=$salary_provision+$Fcd['spamount']; 
			// Salary provision End ****
			
			//Office Rent Total Amount start****
		  	$Rens="select SUM(Amount) AS AccAmount from account_cash where LedgerGroup='35'";
			$Wqas=mysqli_query($conn,$Rens);
			$Fcds=mysqli_fetch_array($Wqas);
			
			$Ren2="select SUM(Amount) AS BaAmount from account_bank where LedgerGroup='35'";
			$Wqa2=mysqli_query($conn,$Ren2);
			$Fcd2=mysqli_fetch_array($Wqa2);
			
		 	 $Office=$Fcds['AccAmount']+$Fcd2['BaAmount']; 
			// Office Rent total amount End ****
			
			//Deposits Rent Total Amount start****
		  	$Rena="select SUM(Amount) AS AccAmount from account_cash where LedgerGroup='10'";
			$Wqaa=mysqli_query($conn,$Rena);
			$Fcda=mysqli_fetch_array($Wqaa);
			
			$p="select SUM(Amount) AS BaAmount from account_bank where LedgerGroup='10'";
			$sp=mysqli_query($conn,$p);
			$spc=mysqli_fetch_array($sp);
			
		 	 $Deposits=$Fcda['AccAmount']+$spc['BaAmount']; 
			// Deposits Rent total amount End ****
			
			//Account payable Start
			
			
				$Pol1="select SUM(total_outstanding) AS total_outstanding from sup_outstanding where franchisee_id='".$_SESSION['BranchId']."' ";
				$Tgf1=mysqli_query($conn,$Pol1);
				$Bvc1=mysqli_fetch_array($Tgf1);
				
				$AccountPayable=$AccountPayable+$Bvc1['total_outstanding'];
			
			//Accounts payable end
			?>
	   <div class="col-sm-6" style="border-right-style: groove;">
	    <hr>
	    <h3 align="right"><?php echo $_SESSION['franchisee_name'];?></h3>
		<hr>
		<table class="table table-bordered" >
		<tr>
		<td> <B style="color:Red"><label for="Branch">Current Liabilities:</label></b></td>
		</tr>
		<tr>
		<td> <label for="Branch">Accounts Payable</label></td>
		<td><input type="text" class="form-control" name="SalesAccount"  id="SalesAccount" value="<?php echo number_format($AccountPayable,2); ?>" readonly></td>
		</tr>
		<tr>
		<td> <label for="Branch">Salary provision</label></td>
		<td> <input type="text" class="form-control" name="DirectIncomes" value="<?php echo number_format($salary_provision,2); ?>" id="DirectIncomes" readonly></td>
		</tr>
		
		<tr>
		<td>  <label for="Branch">Office Rent</label></td>
		<td><input type="text" class="form-control" name="ClosingStock" id="ClosingStock" value="<?php echo number_format($Office,2); ?>"   readonly></td>
		</tr>
		<tr>
		<td>  <label for="Branch">Utilities</label></td>
		<td><input type="number" class="form-control" name="ClosingStock" id="ClosingStock" value="0.00"   readonly></td>
		</tr>
		<tr>
		<td>  <label for="Branch">Federal Income Tax Payable</label></td>
		<td><input type="number" class="form-control" name="ClosingStock" id="ClosingStock" value="0.00"  readonly></td>
		</tr>
		<tr>
		<td>  <label for="Branch">Overdrafts</label></td>
		<td><input type="number" class="form-control" name="ClosingStock" id="ClosingStock" value="0.00"  readonly></td>
		</tr>
		<tr>
		<td><label for="Branch">Customer Deposits</label></td>
		<td><input type="number" class="form-control" name="ClosingStock" id="ClosingStock" value="<?php echo $Deposits; ?>"   readonly></td>
		</tr>
		<tr>
		<td><label for="Branch">Pension Payable</label></td>
		<td><input type="number" class="form-control" name="ClosingStock" id="ClosingStock" value="0.00"  readonly></td>
		</tr>
		<tr>
		<td><label for="Branch">Union Dues Payable</label></td>
		<td><input type="number" class="form-control" name="ClosingStock" id="ClosingStock" value="0.00"  readonly></td>
		</tr>
		<tr>
		<td><label for="Branch">Medical Payable</label></td>
		<td><input type="number" class="form-control" name="ClosingStock" id="ClosingStock" value="0.00"  readonly></td>
		</tr>
		<tr>
		<td><label for="Branch">Sales Tax Payable</label></td>
		<td><input type="number" class="form-control" name="ClosingStock" id="ClosingStock" value="0.00"  readonly></td>
		</tr>
		<?php
		$TotalCurrentLiabilities=$AccountPayable+$Deposits+$Office+$salary_provision;
		?>
		<tr>
		<td> <label for="Branch"><B style="color:Red">Total Current Liabilities </b> </label></td>
		<td><b><input type="txt" class="form-control" style="color:red" name="NetTotalS" id="NetTotalS" value="<?php echo number_format($TotalCurrentLiabilities,2) ?>"   onKeyPress="return tabE(this,event)" readonly></b></td>
		</tr>
		<tr>
		<td><label for="Branch"</label></td>
		<td><label for="Branch"</label></td>
		</tr>
		<tr>
		<td><label for="Branch">Long-Term Liabilities:</label></td>
		<td><label for="Branch"></label></td>
		</tr>
		<tr>
		<td><label for="Branch"> Long-Term Loans</label></td>
		<td><input type="number" class="form-control" name="ClosingStock" id="ClosingStock" value="0.00"  readonly></td>
		</tr>
		<tr>
		<td><label for="Branch">Mortgage</label></td>
		<td><input type="number" class="form-control" name="ClosingStock" id="ClosingStock" value="0.00"   readonly></td>
		</tr>
		<tr>
		<td> <label for="Branch"><B style="color:Red">Total Long-Term Liabilities </b> </label></td>
		<td><b><input type="txt" class="form-control" style="color:red" name="NetTotalS" id="NetTotalS" value="0.00"   onKeyPress="return tabE(this,event)" readonly></b></td>
		</tr>
		<tr>
		<td><label for="Branch"></label></td>
		<td><label for="Branch"></label></td>
		</tr>
		<tr>
		<td><label for="Branch">TOTAL LIABILITIES</label></td>
		<td><label for="Branch"><?php echo "0.00" ?></label></td>
		</tr>
		<tr>
		<td><label for="Branch"></label></td>
		<td><label for="Branch"></label></td>
		</tr>
		<tr>
		<td><label for="Branch"><B style="color:Red">Owners' Equity:<b/></label></td>
		<td><label for="Branch"></label></td>
		</tr>
		<tr>
		<td><label for="Branch">Common Stock</label></td>
		<td><input type="number" class="form-control" name="ClosingStock" id="ClosingStock" value="0.00"   readonly></td>
		</tr>
		<tr>
		<td><label for="Branch"> Owner - Draws</label></td>
		<td><input type="number" class="form-control" name="ClosingStock" id="ClosingStock" value="0.00"  readonly></td>
		</tr>
		<tr>
		<td><label for="Branch">Retained Earnings</label></td>
		<td><input type="number" class="form-control" name="ClosingStock" id="ClosingStock" value="0.00"  readonly></td>
		</tr>		
		<tr>
		<td> <label for="Branch"><B style="color:Red">Total Owners' Equity: </b> </label></td>
		<td><b><input type="txt" class="form-control" style="color:red" name="NetTotalS" id="NetTotalS" value="0.00"   onKeyPress="return tabE(this,event)" readonly></b></td>
		</tr>
		<tr>
		<td><label for="Branch"></label></td>
		<td><label for="Branch"></label></td>
		</tr>
		<?php 
		
		
		
		?>
		<tr>
		<td><label for="Branch">LIABILITIES AND EQUITY</label></td>
		<td><label for="Branch"></label><?php echo number_format($TotalCurrentLiabilities,2); ?></td>
		</tr>
		</table>

			</div>


          <!-- /.box -->
        </div>
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

