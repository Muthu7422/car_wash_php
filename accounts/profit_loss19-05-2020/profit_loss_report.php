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
   
   

	<?php 
	//------------DATE---------//
	$fromd=$_POST['from'];
	$tod=$_POST['to'];
	//------------DATE END---------//
	//------ Sales value start----//		
					 $qtyselect="select SUM(total_amount) AS totalbill from sales_order where (pdate between '".$_REQUEST['from']."' AND '".$_REQUEST['to']."') and status='Active'";
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
		
					
	
	?>
		
		
		
		<?php 
		//------ Expenses value Start----//	
		$expensestotal=0;
		 $ledger3="SELECT * FROM expense_details where (ExpenseDate between '".$_REQUEST['from']."' AND '".$_REQUEST['to']."') AND status='Active'";
		$ledge3=mysqli_query($conn,$ledger3);
		while($ledg3=mysqli_fetch_array($ledge3)){
		$expensesamount=$ledg3['ExpenseAmount']; 
		
		$ledger4="SELECT * FROM expense_master where id='".$ledg3['ExpenseType']."' AND status='Active'";
		$ledge4=mysqli_query($conn,$ledger4);
		$ledg4=mysqli_fetch_array($ledge4);
	    $expensename=$ledg4['ExpenseType'];
		//------ Expenses value end----//	
		?>
		
		<?php
		$expensestotal=$expensestotal+$expensesamount;
		} ?>
			
			
       
	
	
	   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="profit_loss_report_print.php" autocomplete="off" >
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->                          
			 
	   <div class="box-body">	  
	   <div class="col-sm-6" >
	     <h3 align="center"><b><?php echo $_SESSION['franchisee_name'];?></b></h3>
		 <h4 align="center"><b>P&L (Net Profit)</b></h4>
	   <hr>	 
		 <h5 align="left"><b>Target Moves : </b> All Posted Entries</h5>
		 <h5 align="left"><b>Date From : </b><?php echo $_POST['from'];?> <b>Date To : </b> <?php echo  $_POST['to'];?></h5>	   

		
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
					 $qtyselect="select SUM(TotalPurchaseAmount	) AS totalbill from sales_order where (pdate between '".$_REQUEST['from']."' AND '".$_REQUEST['to']."') and status='Active' and FranchiseeId='".$_SESSION['BranchId']."'";
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
					 $qtyselect1="select SUM(TotalPurchaseAmount) AS totalbill from s_purchase where (pdate between '".$_REQUEST['from']."' AND '".$_REQUEST['to']."') and purchase_details='Purchase' and FranchiseeId='".$_SESSION['BranchId']."'";
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
		
		 $ledger1="SELECT SUM(ExpenseAmount) AS totalexpenses FROM expense_details where LedgerGroup='".$ledg['id']."' AND (ExpenseDate between '".$_REQUEST['from']."' AND '".$_REQUEST['to']."') and franchisee_id='".$_SESSION['BranchId']."'";
		$ledge1=mysqli_query($conn,$ledger1);
		$ledg1=mysqli_fetch_array($ledge1);
		$expensesd=$ledg1['totalexpenses'];
		//------ Direct Expenses value end----//		
	//------Indirect Expenses value start----//	
		$ledger1="SELECT * FROM m_ledger_group where ledger_group='Indirect Expenses' AND status='Active'";
		$ledge1=mysqli_query($conn,$ledger1);
		$ledg1=mysqli_fetch_array($ledge1);
		
		 $ledger2="SELECT SUM(ExpenseAmount) AS totalexpenses FROM expense_details where LedgerGroup='".$ledg1['id']."' AND (ExpenseDate between '".$_REQUEST['from']."' AND '".$_REQUEST['to']."') and franchisee_id='".$_SESSION['BranchId']."'";
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
		
		 $ledger22="SELECT * FROM expense_details where LedgerGroup='".$ledg11['id']."' AND (ExpenseDate between '".$_REQUEST['from']."' AND '".$_REQUEST['to']."') and franchisee_id='".$_SESSION['BranchId']."'";
		$ledge22=mysqli_query($conn,$ledger22);
		$ledg22=mysqli_fetch_array($ledge22);

$totalr_m=$totalr_m+$ledg22['ExpenseAmount'];
		
		//------Repairing And Maintanance value end----//
					
			
				//------Repairing And Maintanance value start----//	
		$ledger11="SELECT * FROM m_ledger_group where ledger_group='Repairing And Maintanance' AND status='Active'";
		$ledge11=mysqli_query($conn,$ledger11);
		$ledg11=mysqli_fetch_array($ledge11);
		
		$ledger22="SELECT * FROM expense_details where LedgerGroup='".$ledg11['id']."' AND (ExpenseDate between '".$_REQUEST['from']."' AND '".$_REQUEST['to']."') and franchisee_id='".$_SESSION['BranchId']."'";
		$ledge22=mysqli_query($conn,$ledger22);
		$ledg22=mysqli_fetch_array($ledge22);

$totalr_m=$totalr_m+$ledg22['ExpenseAmount'];
		
		//------Repairing And Maintanance value end----//				
	
	?>
		
		<tr><td><b>Operating Profit<b></td><td>&nbsp;</td><td hidden>&nbsp;</td></tr>
		
		<tr><td><b>Gross Profit<b></td><td>&nbsp;</td><td hidden>&nbsp;</td></tr>
		
		<tr><td><b>Revenue</b></td><td>&nbsp;</td><td hidden>&nbsp;</td></tr>		
		
		<tr><td>Product Sales</td><td><?php echo $OpeingStock; ?></td><td hidden><?php echo $OpeingStock; ?></td></tr>
		
		<tr><td><b>Total Revenue</b></td><td><b><?php echo $OpeingStock; ?></b></td><td hidden><b><?php echo $OpeingStock; ?></b></td></tr>
		
		<tr><td><b>Cost of Revenue</b></td><td>&nbsp;</td><td hidden>&nbsp;</td></tr>
		
		<tr><td><?php echo $OpeingStock; ?> Cost of Goods Sold</td><td><?php echo $OpeingStock; ?></td><td hidden><?php echo $OpeingStock; ?></td></tr>
		
		<tr><td><?php echo $OpeingStock; ?> FOC Account</td><td><?php echo $OpeingStock; ?></td><td hidden><?php echo $OpeingStock; ?></td></tr>
		
		<tr><td hidden><?php echo $OpeingStock; ?> Purchases A/C</td ><td hidden><?php echo $OpeingStock1; ?></td><td hidden><?php echo $OpeingStock1; ?></td></tr>
		
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
	echo	$ledger23="select *,sum(`amount`) as sqty from account_cash_bank Where (date between '$fdate' AND '$tdate') group by ledger_id and franchisee_id='".$_SESSION['BranchId']."'";		
		$ledge23=mysqli_query($conn,$ledger23);
		while($ledg23=mysqli_fetch_array($ledge23))
		  {
		echo	$ledger24="SELECT * FROM m_ledger WHERE Id='".$ledg23['ledger_id']."'";
			$ledge24=mysqli_query($conn,$ledger24);
		    $ledg24=mysqli_fetch_array($ledge24);
			
			$Gtotal=$Gtotal+$ledg23['sqty'];
			
		$i++;	
		?>		
		<tr><td> <?php echo $ledg24['LedgerName']; ?></td><td><?php echo $ledg23['sqty']; ?></td><td hidden><?php echo $ledg23['sqty']; ?></td></tr>				
		<?php } ?>
		
		 
		
		<tr><td><b>Total General & Admn Expenses<b></td><td><b><?php echo $Gtotal; ?></b></td><td hidden><b><?php echo $Gtotal; ?></b></td></tr>
		
		
		</table>
         <button hidden type="submit" class="hidden" >Print</button>
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

