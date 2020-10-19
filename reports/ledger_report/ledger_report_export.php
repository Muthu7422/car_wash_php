<!DOCTYPE html>
<html>
<?php
include("../../includes.php");
include("../../redirect.php");
                      
//echo $yui=$_POST['export'];exit;
if(isset($_POST['export']))
{
	
	$fdate=$_REQUEST['from'];
   $tdate=$_REQUEST['to'];
header('Content-type: application/excel');
$filename = 'General Ledger Report From_'.date("d-m-Y",strtotime($fdate)).' To_'.date("d-m-Y",strtotime($tdate)).' .xls';
header('Content-Disposition: attachment; filename='.$filename); 
?>


<body>
     <table  class="table table-bordered table-striped" border="1">	
		<thead>
                  <h4 align="center"><b><?php echo $_SESSION['FranchiseeName'];?></b></h4>
				  <h4 align="center">General Ledger</h4>
				  		  
                  <h4 align="center"><b>Date As on From : </b> <?php echo date("d-m-Y",strtotime($fdate)); ?>  <b>Date As on To : </b> <?php echo date("d-m-Y",strtotime($tdate)); ?> </h4>           
                </thead>
			
		<thead>
						<?php 
				  $ss="select * from m_ledger where Id='".$_REQUEST['ledname']."'";
                 $Ess=mysqli_query($conn,$ss);
				 $FEss=mysqli_fetch_array($Ess);
				 
				 $ss1="select * from m_ledger_group where Id='".$FEss['LedgerGroup']."'";
                 $Ess1=mysqli_query($conn,$ss1);
				 $FEss1=mysqli_fetch_array($Ess1);
				 ?>
				  <h5><b>Ledger Name:</b><?php echo $FEss['LedgerName']; ?></h5> 	
					
				 		  
				</thead>
				
                
				<thead>
                <tr style="background-color:#FAEBD7">
                  <th>S.No</th>                 
				  <th>Date</th>
				  <th>Ref</th>
				  <th>Narration</th>
				  <th>Debit</th>
				  <th>Credit</th>
				  <th>Balance</th>				  
                </tr>
                </thead>
                <tbody>
				<?php 
				
				$i=0;
				
				$ledname=$_REQUEST['ledname'];
				
				
				  // $ss2="select * from m_supplier where LedgerId='$ledname' AND status='Active'";
				  // $Ess2=mysqli_query($conn,$ss2);
				 // $FEss2=mysqli_fetch_array($Ess2);
				
				
			     $ledbank="select * from account_cash_bank where ledger_id='$ledname' AND (date between '$fdate' AND '$tdate')";
				$ledbank1=mysqli_query($conn,$ledbank);
				while($ledbank2=mysqli_fetch_array($ledbank1)){
					
					 $bran="select * from m_ledger where Id='".$ledbank2['ledger_id']."'";
				  $branc=mysqli_query($conn,$bran);
				  $grtt=mysqli_fetch_array($branc);
				 
				 
				 $pusbal=$ledbank2['amount']-0;
				$i++;
				?>
                <tr>
				<?php if($ledbank2['Narration']=='Sales'){?>
				<td><?php echo $i; ?></td>
				<td><?php echo date("d-m-Y" ,strtotime($ledbank2['date'])); ?></td>
				<td><?php echo $ledbank2['table_id']; ?></td>
				<td><?php echo $grtt['LedgerName']; ?></td>
				<td><?php echo $ledbank2['amount']; ?></td>
				<td><?php echo '0' ?></td>
				<td><?php echo $pusbal; ?></td>
			   <?php }else if($ledbank2['Narration']=='Purchase'){?>    	
				<td><?php echo $i; ?></td>
				<td><?php echo date("d-m-Y" ,strtotime($ledbank2['date'])); ?></td>
				<td><?php echo $ledbank2['table_id']; ?></td>
				<td><?php echo $grtt['LedgerName']; ?></td>
				<td><?php echo '0' ?></td>
				<td><?php echo $ledbank2['amount']; ?></td>
				
				<td><?php echo $pusbal; ?></td>
				      <?php }else if($ledbank2['Narration']=='Expenses Details'){?>  
                <td><?php echo $i; ?></td>
				<td><?php echo date("d-m-Y" ,strtotime($ledbank2['date'])); ?></td>
				<td><?php echo $ledbank2['table_id']; ?></td>
				<td><?php echo $grtt['LedgerName']; ?></td>
				<td><?php echo $ledbank2['amount']; ?></td>
				<td><?php echo '0' ?></td>
				<td><?php echo $pusbal; ?></td>					  
				      <?php }else if($ledbank2['Narration']=='Payment Voucher'){?>  
					   <td><?php echo $i; ?></td>
				<td><?php echo date("d-m-Y" ,strtotime($ledbank2['date'])); ?></td>
				<td><?php echo $ledbank2['table_id']; ?></td>
				<td><?php echo $grtt['LedgerName']; ?></td>
				<td><?php echo $ledbank2['amount']; ?></td>
				<td><?php echo '0' ?></td>
				<td><?php echo $pusbal; ?></td>		
				      <?php }else if($ledbank2['Narration']=='Receipt voucher'){?>    	
					  <td><?php echo $i; ?></td>
				<td><?php echo date("d-m-Y" ,strtotime($ledbank2['date'])); ?></td>
				<td><?php echo $ledbank2['table_id']; ?></td>
				<td><?php echo $grtt['LedgerName']; ?></td>
				<td><?php echo '0' ?></td>
				<td><?php echo $ledbank2['amount']; ?></td>
				<td><?php echo $pusbal; ?></td>	
				      <?php }else if($ledbank2['Narration']=='Stock-In-Hand'){?>    	
						 <td><?php echo $i; ?></td>
				<td><?php echo date("d-m-Y" ,strtotime($ledbank2['date'])); ?></td>
				<td><?php echo $ledbank2['table_id']; ?></td>
				<td><?php echo $grtt['LedgerName']; ?></td>
				<td><?php echo '0' ?></td>
				<td><?php echo $ledbank2['amount']; ?></td>
				<td><?php echo $pusbal; ?></td>	
					   <?php }else if($ledbank2['Narration']=='Petty Cash'){?>
					   <td><?php echo $i; ?></td>
				<td><?php echo date("d-m-Y" ,strtotime($ledbank2['date'])); ?></td>
				<td><?php echo $ledbank2['table_id']; ?></td>
				<td><?php echo $grtt['LedgerName']; ?></td>
				<td><?php echo $ledbank2['amount']; ?></td>
				<td><?php echo '0' ?></td>
				
				<td><?php echo $pusbal; ?></td>	
					 <?php }else if($ledbank2['Narration']=='Account Payable'){  ?>
					    <td><?php echo $i; ?></td>
				<td><?php echo date("d-m-Y" ,strtotime($ledbank2['date'])); ?></td>
				<td><?php echo $ledbank2['table_id']; ?></td>
				<td><?php echo $grtt['LedgerName']; ?></td>
				<td><?php echo $ledbank2['amount']; ?></td>
				<td><?php echo '0' ?></td>
				
				<td><?php echo $pusbal; ?></td>
					  <?php }?>
				</tr>
				<?php }?>										
				<tr>
                  <td colspan="7" align="right"><?php //echo $tc; ?></td>				  		  
                </tr>
                  </tbody>                
              </table>
			
          
	
	
	 </body>
<?php 
}
  ?>	
</html>