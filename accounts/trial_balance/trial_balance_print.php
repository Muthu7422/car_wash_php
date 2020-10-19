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
    <form role="form" method="post" action="trial_balance_date.php" autocomplete="off">
  <div class="box-body">
	   
	    
	   
	    <h3 align="right"><?php echo $_SESSION['FranchiseeName'];?></h3>
		
		<h4 align="right">1-10-2018 to <?php echo date('d-m-Y');?></h4>
		<h4 align="right">Closing Balance</h4>
		
	   <div class="col-sm-6">
	 
		
				<table class="table table-bordered">
	    <tr>
		  <td> <B style="color:Red"><label for="Branch" >SI.No</label></B></td>
		  <td> <B style="color:Red"><label for="Branch">Account Name</label></B></td>
		  <td> <B style="color:Red"><label for="Branch">Opening Balance</label></B></td>
		  <td> <B style="color:Red"><label for="Branch">Debit</label></B></td>
		  <td> <B style="color:Red"><label for="Branch">Credit</label></B></td>
		  <td> <B style="color:Red"><label for="Branch">Closing Balance</label></B></td>
		</tr>
		
		 	
	<?php
	    $fdate=$_POST['from'];
        $tdate=$_POST['to'];

	 $cashb1="select t1.id,t1.type,t2.LedgerName,t1.`ledger_id`,sum(t1.`amount`) as sqty from account_cash_bank t1 left join m_ledger t2 on t1.`ledger_id`=t2.Id group by t1.ledger_id,(t1.date between '$fdate' AND '$tdate')";
	  $cashqb1=mysqli_query($conn,$cashb1);
	 while( $cashfb1=mysqli_fetch_array($cashqb1)){

	
	  	$ledgergrp="select *from m_ledger_group where id='".$cashfb1['ledger_id']."'";
	   $ledgergrp1=mysqli_query($conn,$ledgergrp);
	   $ledgergrp11=mysqli_fetch_array($ledgergrp1);


	                    $dep111="select sum(amount) as amts from account_cash_bank  where ledger_id='".$cashfb1['ledger_id']."' and type='Debit'";
						$dep14=mysqli_query($conn,$dep111);
						$result11=mysqli_fetch_array($dep14);
												
		                $dep1="select sum(amount) as amt from account_cash_bank where ledger_id='".$cashfb1['ledger_id']."' and type='Credit'";
						$dep11=mysqli_query($conn,$dep1);
						$result1=mysqli_fetch_array($dep11);
						
                    $debit=$result11['amts'];							
					$credit=$result1['amt'];	
					

                    $t_c=$debit-$credit;

	                $c_b=$ledgergrp11['opening_bal']+$t_c;

$i++;
	?>		
		       <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo $cashfb1['LedgerName']; ?></td>
				  <td><?php echo number_format($ledgergrp11['opening_bal'],2); ?></td>
				  <td><?php echo number_format($debit,2); ?></td>
				  <td><?php echo number_format($credit,2) ?></td>
				  <td><?php echo number_format($c_b,2); ?></td>
			
	
            
                </tr>	
	<?php } ?>				
		</table>
			  <button href="trial_balance_date.php" type="submit" class="btn btn-info pull-right"><i class="fa fa-arrow" aria-hidden="true"></i> Back</button>						
	</div>

	</div>

	</form>

	



 
</body>
</html>
