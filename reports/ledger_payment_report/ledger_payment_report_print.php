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
  <?php  include("../../includes_db_css.php"); ?>   
</head>
<body class="">
<div class="wrapper"> 
    <section class="content container-fluid">
	
	
      <!--Print Satrt--!>
	  <div class="row">
        <!-- left column -->		
        <div class="col-md-8 col-md-offset-2">            
            <div class="box">
            			
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
			   <thead>  
<?php 
 $lid1="select * from a_customer where LedgerId='".$_POST['LedgerId']."' and status='Active'";
 $lidq1=mysqli_query($conn,$lid1);
$lidf1=mysqli_fetch_array($lidq1);
?>			   
   			   
               <h4>   Cash Transaction From <?php echo $_POST['from']; ?>  To  <?php echo $_POST['to']; ?>    For <?php echo $lidf1['cust_name']; ?>    <h4>           
                </thead>
                
				<thead>
                <tr>
                  <th>S.No</th>
                  <th>Date</th>
				  <th>LedgerGroup</th>
				  <th>Remarks</th>
				  <th>Credit</th>
				  <th>Debit</th>
				 
                </tr>
                </thead>
                <tbody>
				<?php
				$fdate=$_POST['from'];
				$tdate=$_POST['to'];
				$LedgerId=$_POST['LedgerId'];
				
				$ss="select * from a_cash_acc order by Id desc";
				$Ess=mysqli_query($conn,$ss);
				$FEss=mysqli_fetch_array($Ess);
								
				$acc="select SUM(Amount) AS Amount from account_cash where TransactionType='Debit' AND TransactionDate<'$fdate' and LedgerId='$LedgerId' AND franchisee_id='".$_SESSION['BranchId']."'";
				$sccq=mysqli_query($conn,$acc);
				$acf=mysqli_fetch_array($sccq);
					
				$acc1="select SUM(Amount) AS Amount from account_cash where TransactionType='Credit'AND TransactionDate<'$fdate' and LedgerId='$LedgerId' AND franchisee_id='".$_SESSION['BranchId']."'";
				$sccq1=mysqli_query($conn,$acc1);
				$acf1=mysqli_fetch_array($sccq1);
				
				$oa=$FEss['cash']+$acf1['Amount']-$acf['Amount'];
				
				$tc=0;
				$td=0;
				$i=0;
				$ct="select * from account_cash where TransactionDate between '$fdate' AND '$tdate' and LedgerId='$LedgerId' AND franchisee_id='".$_SESSION['BranchId']."' order by TransactionDate";
				$Ect=mysqli_query($conn,$ct);
				while($Fct=mysqli_fetch_array($Ect))
				{
				  $ct1="select * from m_ledger_group where id='".$Fct['LedgerGroup']."'";
				 $Ect1=mysqli_query($conn,$ct1);
				$Fct1=mysqli_fetch_array($Ect1);
				 
				 $i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $Fct['TransactionDate']; ?></td>
				  <td><?php echo $Fct1['ledger_group'];  ?></td>
				  <td><?php echo $Fct['Remarks'];  ?></td>
				  <?php 
				  $open=$oa;
				  if($Fct['TransactionType']=='Credit')
				  {
					  $credit=$Fct['Amount'];
					  $debit="0.00";
					  $oa=$oa+$credit-$debit;
				  }
				  else
				  {
					 $debit=$Fct['Amount'];
					  $credit="0.00";
						$oa=$oa+$credit-$debit;					  
				  }
				  ?>
				  <td align="right"><?php echo $credit;  ?></td>
				  <td align="right"><?php echo $debit;  ?></td>
				  
				 
				  
                </tr>
				<?php				
				$tc=$tc+$credit;
				$td=$td+$debit;
				}				
				?>
				<tr>
                  <td colspan="5" align="right"><?php echo $tc; ?></td>
				  <td colspan="1" align="right"><?php echo $td;  ?></td>
				 
                </tr>
                  </tbody>                
              </table>
            </div>
			<br>
			            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
			   <thead>        
           <h4>    Bank Transaction From <?php echo $_POST['from']; ?>  To  <?php echo $_POST['to']; ?> For <?php echo $lidf1['cust_name']; ?>    <h4>          
                </thead>
                
				<thead>
                <tr>
                  <th>S.No</th>
                  <th>Date</th>
				  <th>LedgerGroup</th>
				  <th>Remarks</th>
				   <th>Bank Name</th>
				  <th>Account No</th>
				  <th>Credit</th>
				  <th>Debit</th>
				 
                </tr>
                </thead>
                <tbody>
				<?php
				$fdate=$_POST['from'];
				$tdate=$_POST['to'];
				$LedgerId=$_POST['LedgerId'];
				
			
				
				
								
				$acc="select SUM(Amount) AS Amount from account_bank where TransactionType='Debit' AND TransactionDate<'$fdate' AND LedgerId='$LedgerId' AND franchisee_id='".$_SESSION['BranchId']."'";
				$sccq=mysqli_query($conn,$acc);
				$acf=mysqli_fetch_array($sccq);
					
				$acc1="select SUM(Amount) AS Amount,BankId from account_bank where TransactionType='Credit'AND TransactionDate<'$fdate' AND LedgerId='$LedgerId' AND franchisee_id='".$_SESSION['BranchId']."'";
				$sccq1=mysqli_query($conn,$acc1);
				$acf1=mysqli_fetch_array($sccq1);
				
				$acc12="select * from account_bank where TransactionType='Credit' AND LedgerId='$LedgerId' AND franchisee_id='".$_SESSION['BranchId']."'";
				$sccq12=mysqli_query($conn,$acc12);
				$acf12=mysqli_fetch_array($sccq12);
				
				$ss="select * from a_bank_acc where Id = '".$acf12['BankId']."' order by Id desc";
				$Ess=mysqli_query($conn,$ss);
				$FEss=mysqli_fetch_array($Ess);
				
				
				$tc=0;
				$td=0;
				$i=0;
				$ct="select * from account_bank where TransactionDate between '$fdate' AND '$tdate' AND LedgerId='$LedgerId' AND franchisee_id='".$_SESSION['BranchId']."' order by TransactionDate";
				$Ect=mysqli_query($conn,$ct);
				while($Fct=mysqli_fetch_array($Ect))
				{
				  $ct1="select * from m_ledger_group where id='".$Fct['LedgerGroup']."'";
				 $Ect1=mysqli_query($conn,$ct1);
				$Fct1=mysqli_fetch_array($Ect1);
				 
				 $i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $Fct['TransactionDate']; ?></td>
				  <td><?php echo $Fct1['ledger_group'];  ?></td>
				  <td><?php echo $Fct['Remarks'];  ?></td>
				 <td align="right"><?php echo $FEss['BankName'];  ?></td>
				    <td align="right"><?php echo $FEss['AccountNumber'];  ?></td>
				  <td align="right"><?php echo $credit;  ?></td>
				  <td align="right"><?php echo $debit;  ?></td>
				   
				  
				 
				  
                </tr>
				<?php				
				$tc=$tc+$credit;
				$td=$td+$debit;
				}				
				?>
				<tr>
                  <td colspan="7" align="right"><?php echo $tc; ?></td>
				  <td colspan="1" align="right"><?php echo $td;  ?></td>
				 
                </tr>
                  </tbody>                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
            
          
        </div>
      </div>
	  <!--Print End --!>
	  
	  
	  
    </section>    
  </div>  
<?php //include("../../footer.php"); ?>
  <!--footer End-->

<?php include("../../includes_db_js.php"); ?>
</body>
</html>