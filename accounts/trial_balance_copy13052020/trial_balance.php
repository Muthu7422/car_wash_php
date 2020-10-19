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
     Trial Balance
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
    <form role="form" method="post" action="trial_balance_print.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
               
			 
	   <div class="box-body">
	   
	    <div class="col-sm-12">
	   <hr>
	   
	    <h3 align="right"><?php echo $_SESSION['FranchiseeName'];?></h3>
		
		<h4 align="right">1-10-2018 to <?php echo date('d-m-Y');?></h4>
		<h4 align="right">Closing Balance</h4>
		<hr>
		</div>
	  
	   <div class="col-sm-6">
	 
		
		<table class="table table-bordered">
	<tr>
		<td> <B style="color:Red"><label for="Branch">PARTICULARS</label></B></td>
		</tr>
	
		<tr>
		
		<td>Current Liabilities</td>
		
		</tr>
		<tr>
		<td>Current Assets : </td></tr>
		
		<tr>
		<td>  Sales Accounts : </td></tr>
		<tr>
		<td> Purchase Accounts : </td></tr>
		
		<tr>
		<td>Indirect Incomes :</td></tr>
		
		<tr>
		<td> Indirect Expenses : </td></tr>
		
		<tr>
		<td> Proffit & Loss Account</td></tr>
		
		<tr>
		<td> Difference in Opening Blances : </td></tr>
			<tr>
		<td> <B style="color:Red"> Grand Total : </td></tr>
		
	
		</table>
	 
	</div>
	
	<div class="col-sm-3">
	 <?php
	 //---------CASH ACCOUNT MAIN OUTSTAING-----//
	   $opening="select * from a_cash_acc where  franchisee_id='".$_SESSION['BranchId']."' order by cdate asc limit 1"; 
	   $openingq=mysqli_query($conn,$opening);
	   $opeingf=mysqli_fetch_array($openingq);
	   
	   $openingd="select * from a_bank_acc where  franchisee_id='".$_SESSION['BranchId']."'"; 
	   $openingqd=mysqli_query($conn,$openingd);
	   $opeingfd=mysqli_fetch_array($openingqd);
	   $obm=$opeingf['StartedOpening']+$opeingfd['Amount']; 
	   
	   
	  $cash="select sum(Amount) as Amount from account_cash where TransactionType='Credit' and franchisee_id='".$_SESSION['BranchId']."'";
	  $cashq=mysqli_query($conn,$cash);
	  $cashf=mysqli_fetch_array($cashq);
	   
	   $cashb="select sum(Amount) as Amount from account_bank where TransactionType='Credit' and franchisee_id='".$_SESSION['BranchId']."'";
	  $cashqb=mysqli_query($conn,$cashb);
	  $cashfb=mysqli_fetch_array($cashqb);
	 $TotalCredit=$cashf['Amount']+$cashfb['Amount']; 
	 
	   $cashd="select sum(Amount) as Amount from account_cash where TransactionType='Debit' and franchisee_id='".$_SESSION['BranchId']."'";
	  $cashqd=mysqli_query($conn,$cashd);
	  $cashfd=mysqli_fetch_array($cashqd);
	   
	   $cashbd="select sum(Amount) as Amount from account_bank where TransactionType='Debit' and franchisee_id='".$_SESSION['BranchId']."'";
	  $cashqbd=mysqli_query($conn,$cashbd);
	  $cashfbd=mysqli_fetch_array($cashqbd);
	 $TotalDebit=$cashfd['Amount']+$cashfbd['Amount'];
	 
	 $TotalCashAmount=$TotalCredit-$TotalDebit; 
	  $OpeningAmount=$TotalCashAmount + $obm; 
	  $obd=$obm; 
   //---------CASH ACCOUNT MAIN OUTSTAING END-----//
	 
	//------sales amount from Bank and Cash start----//
	  $sales="select SUM(Amount) AS SAmount from account_cash where TransactionType='Credit' And TransactionFrom='sales_invoice' and franchisee_id='".$_SESSION['BranchId']."' ";
	  $salesq=mysqli_query($conn,$sales);
	  $salesf=mysqli_fetch_array($salesq);
	 
	
	 $salesb="select SUM(Amount) AS SAmount from account_bank where TransactionType='Credit' And TransactionFrom='sales_invoice' and franchisee_id='".$_SESSION['BranchId']."' ";
	 $salesqb=mysqli_query($conn,$salesb);
	 $salesfb=mysqli_fetch_array($salesqb);
	 
	 $sales1="select SUM(Amount) AS SAmount from account_cash where TransactionType='Debit' And TransactionFrom='sales_invoice' and franchisee_id='".$_SESSION['BranchId']."' ";
	 $salesq1=mysqli_query($conn,$sales1);
	 $salesf1=mysqli_fetch_array($salesq1);
	 
	  $sales1b="select SUM(Amount) AS SAmount from account_bank where TransactionType='Debit' And TransactionFrom='sales_invoice' and franchisee_id='".$_SESSION['BranchId']."' ";
	  $salesq1b=mysqli_query($conn,$sales1b);
	  $salesf1b=mysqli_fetch_array($salesq1b);
	 
	  $salesIncomeadd=$salesf['SAmount']+$salesfb['SAmount'];
	  $salesIncomeminus=$salesf1['SAmount']+$salesf1b['SAmount'];
	  $salesIncome=$salesIncomeadd-$salesIncomeminus; 
	 //------sales amount from Bank and Cash end----//
	  
	//------purchase amount from Bank and Cash start----//
	$purchase="select SUM(Amount) AS PAmount from account_cash where TransactionType='Debit' And TransactionFrom='s_purchase' and franchisee_id='".$_SESSION['BranchId']."' ";
	$purchaseq=mysqli_query($conn,$purchase);
	$purchasef=mysqli_fetch_array($purchaseq);
	
	$purchaseb="select SUM(Amount) AS PAmount from account_bank where TransactionType='Debit' And TransactionFrom='s_purchase' and franchisee_id='".$_SESSION['BranchId']."' ";
	$purchaseqb=mysqli_query($conn,$purchaseb);
	$purchasefb=mysqli_fetch_array($purchaseqb);
	
	$purchase1="select SUM(Amount) AS PAmount from account_cash where TransactionType='Credit' And TransactionFrom='s_purchase' and franchisee_id='".$_SESSION['BranchId']."'";
	$purchaseq1=mysqli_query($conn,$purchase1);
	$purchasef1=mysqli_fetch_array($purchaseq1);
	
	$purchase1b="select SUM(Amount) AS PAmount from account_bank where TransactionType='Credit' And TransactionFrom='s_purchase' and franchisee_id='".$_SESSION['BranchId']."' ";
	$purchaseq1b=mysqli_query($conn,$purchase1b);
	$purchasef1b=mysqli_fetch_array($purchaseq1b);
	
	$purchaseadd=$purchasef['PAmount']+$purchasefb['PAmount'];
	$purchaseminus=$purchasef1['PAmount']+$purchasef1b['PAmount'];
	$purchaseIncome=$purchaseadd-$purchaseminus; 
	//------purchase amount from Bank and Cash end----//
	$ProfitLoss=$salesIncome-$purchaseIncome;
	
	//----Fianall bill and expense return for Indirect Income start---//
		$indincome="select SUM(Amount) AS Amount from account_cash where TransactionType='Credit' And TransactionFrom='a_final_bill' and franchisee_id='".$_SESSION['BranchId']."' ";
		$indincomeq=mysqli_query($conn,$indincome);
		$indincomef=mysqli_fetch_array($indincomeq);
					
		$indincome1="select SUM(Amount) AS Amount from account_cash where TransactionType='Credit' And TransactionFrom='expense_details' and franchisee_id='".$_SESSION['BranchId']."' ";
		$indincomeq1=mysqli_query($conn,$indincome1);
		$indincomef1=mysqli_fetch_array($indincomeq1);
		$Indirectincome=$indincomef['Amount']+$indincomef1['Amount'];
	//----Fianall bill and expense return for Indirect Income end---//
					
	//----Fianall bill return and expense for Indirect Expense start---//
		$indexpense="select SUM(Amount) AS Amount from account_cash where TransactionType='Debit' And TransactionFrom='a_final_bill' and franchisee_id='".$_SESSION['BranchId']."' ";
		$indexpenseq=mysqli_query($conn,$indexpense);
		$indexpensef=mysqli_fetch_array($indexpenseq);
					
		$indexpense1="select SUM(Amount) AS Amount from account_cash where TransactionType='Debit' And TransactionFrom='expense_details' and franchisee_id='".$_SESSION['BranchId']."' ";
		$indexpenseq1=mysqli_query($conn,$indexpense1);
		$indexpensef1=mysqli_fetch_array($indexpenseq1);
		$Indirectexpense=$indexpensef['Amount']+$indexpensef1['Amount'];
	//----Fianall bill return and expense for Indirect Expense end---//
	 
	 
	 //-------Current Liabilities start-----//

	
	
	$sname="select DISTINCT(cust_name) from sup_outstanding"; 
	 $snameq=mysqli_query($conn,$sname);
	while($snamef=mysqli_fetch_array($snameq))
	{
	 $sname1="select * from sup_outstanding where cust_name='".$snamef['cust_name']."' and franchisee_id='".$_SESSION['BranchId']."' order by id desc limit 1"; 
	 $snameq1=mysqli_query($conn,$sname1);
	while($snamef1=mysqli_fetch_array($snameq1))
	{
	$Outstanding=$Outstanding+$snamef1['total_outstanding'];  
	}
	}
	
	
	$salesRate="select sum(tax_amt) as tax_amt from sales_invoice_details";
	$salesRateq=mysqli_query($conn,$salesRate);
	$salesRatef=mysqli_fetch_array($salesRateq);
	$TotalSaleTaxAmt= $salesRatef['tax_amt']; 
	
	$CLD=$Outstanding+$TotalSaleTaxAmt;
	
	$PRATEselect="select SUM(purchase_rate) AS PRATE from s_purchase_details where qty!='0' and purchase_details='Open'";
    $PRATEselectQ=mysqli_query($conn,$PRATEselect);
    $PRATEselectF=mysqli_fetch_array($PRATEselectQ);
	
	 $CLC=$PRATEselectF['PRATE']; 
     //-------Current Liabilities end----//
	 
	 //---current Assets Start----//
	 $fa="select sum(Amount) as assetamount from account_bank where LedgerGroup='15' and franchisee_id='".$_SESSION['BranchId']."'";
	 $faq=mysqli_query($conn,$fa);
	 $faf=mysqli_fetch_array($faq);
	 
	 $fad="select sum(Amount) as assetamount from account_cash where LedgerGroup='15' and franchisee_id='".$_SESSION['BranchId']."'";
	 $faqd=mysqli_query($conn,$fad);
	 $fafd=mysqli_fetch_array($faqd);
	 $TotalAsset=$faf['assetamount']+$fafd['assetamount']; 
	 
	 $co="select DISTINCT(cust_name) from cust_outstanding"; 
	 $coq=mysqli_query($conn,$co);
	while($cof=mysqli_fetch_array($coq))
	{
		$coa="select * from cust_outstanding where cust_name='".$cof['cust_name']."' order by id desc limit 1"; 
	 $coaq=mysqli_query($conn,$coa);
	while($coaf=mysqli_fetch_array($coaq))
	{
	$TotalOut=$TotalOut+$coaf['total_outstanding'];  
	}
	}
	//---current Assets End----//
		?>
		<?php   $TotalAssetValueD=$TotalAsset;
         		$TotalAssetValueC = $TotalOut + $TotalAsset + $OpeningAmount;
		?>
		
		<table class="table table-bordered">
	<tr>
		<td> <B style="color:Red"><label for="Branch">Debit</label></B></td>
		</tr>
		<tr>
		<td><?php echo round($CLD,2);?></td>
		</tr>
		<tr>
	<td><?php echo $TotalAssetValueD; ?></td>
		</tr>
		
		<tr>
		<td>&nbsp;</td>
		</tr>
		<tr>
	<td><?php echo $purchaseadd;?></td>
		</tr>
		
		<tr>
		<td>&nbsp;</td>
		</tr>
		
		<tr>
		<td><?php echo $Indirectexpense;?></td>
		</tr>
		
		<tr>
		<td>&nbsp;</td>
		</tr>
		
		<tr>
		<td>&nbsp;</td>
		</tr>
			<tr>
		<td><b><?php echo round($CLD,2) + $TotalAssetValueD + $purchaseadd + $Indirectexpense;?></b></td>
		</tr>
		
		<tr>
		<td>&nbsp;</td>
		</tr>
		
	</table>
	</div>
	<div class="col-sm-3">
	 
		
			<table class="table table-bordered">
	<tr>
		<td> <B style="color:Red"><label for="Branch">Credit</label></B></td>
		</tr>
		<tr>
		<td><?php echo $CLC;?></td>
		</tr>
		<tr>
	    <td><?php echo $TotalAssetValueC;?></td>
		</tr>
		
		<tr>
		<td><?php echo $salesIncomeadd;?></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		
		<tr>
		<td><?php echo $Indirectincome;?></td>
		</tr>
		
		<tr>
		<td>&nbsp;</td>
		</tr>
		
		<tr>
		<td><?php echo $ProfitLoss;?></td>
		</tr>
		
		<tr>
		<td><?php echo $obd;?></td>
		</tr>
			<tr>
		<td><b><?php echo $CLC+$TotalAssetValueC+$salesIncomeadd+$Indirectincome+$ProfitLoss+$obd;?></b></td>
		</tr>
		
		<tr>
		<td>&nbsp;</td>
		</tr>
		
	</table>
	
	<button type="submit" class="btn btn-info pull-right"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
	</div>
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
