<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>   
</head>
<body>
<div class="wrapper">
 
   <section class="content container-fluid">
      <!--Print Satrt--!>
	  <div class="row">
        <!-- left column -->		
        <div class="col-md-10 col-md-offset-1">            
            <div class="box">
            			
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto">
              <table id="" class="table table-bordered table-striped">
				<thead>
                  <h4 align="center"><b><?php echo $_SESSION['franchisee_name'];?></b></h4>
				  <h4 align="center">General Ledger</h4>
							  
                  <h4 align="center"><b>Date As on From : </b> <?php echo $_POST['from']; ?>  <b>Date As on To : </b> <?php echo $_POST['to']; ?> </h4>           
                </thead>
				
				<thead>
						<?php 
				  $ss="select * from m_ledger where Id='".$_POST['Sname']."'";
                 $Ess=mysqli_query($conn,$ss);
				 $FEss=mysqli_fetch_array($Ess);
				 
				 $ss1="select * from m_ledger_group where id='".$FEss['LedgerGroup']."'";
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
				
				$ledname=$_POST['Sname'];
				$fdate=$_POST['from'];
				$tdate=$_POST['to'];
				
				  // $ss2="select * from m_supplier where LedgerId='$ledname' AND status='Active'";
				  // $Ess2=mysqli_query($conn,$ss2);
				 // $FEss2=mysqli_fetch_array($Ess2);
				
				if ($_POST['Sname']=='All'){
				$ledbank="select * from account_cash_bank where (date between '$fdate' AND '$tdate') AND franchisee_id='".$_SESSION['BranchId']."'";
				}else{
				
				$ledbank="select * from account_cash_bank where ledger_group_id='$ledname' AND (date between '$fdate' AND '$tdate') AND franchisee_id='".$_SESSION['BranchId']."'";
				}
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
					   <?php }else if($ledbank2['Narration']=='Account Receivable'){  ?>
					    <td><?php echo $i; ?></td>
				<td><?php echo date("d-m-Y" ,strtotime($ledbank2['date'])); ?></td>
				<td><?php echo $ledbank2['table_id']; ?></td>
				<td><?php echo $grtt['LedgerName']; ?></td>
				<td><?php echo '0' ?></td>
				<td><?php echo $ledbank2['amount']; ?></td>
							
				<td><?php echo $pusbal; ?></td>
					  <?php }?>
				</tr>
				<?php }?>										
				<tr>
                  <td colspan="7" align="right"><?php //echo $tc; ?></td>				  		  
                </tr>
                  </tbody>                
              </table>
			
            </div>
			
			  <div class="box-footer">	
				<button type="submit" class="btn btn-default hidden">Clear</button>
                <a href="ledger_report.php"><button type="submit" class="btn btn-info pull-right" ><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</button></a>
			  </div>
	 
	    <div class="box-footer" >			   
	     <form action="ledger_report_export.php?from=<?php echo $_REQUEST['from']; ?>&to=<?php echo $_REQUEST['to']; ?>&ledname=<?php echo $_REQUEST['Sname']; ?>"  method="post" name="export_excel">
 			<div class="control-group">
			 <input type="text" name="CustomerMobileNoex" id="CustomerMobileNoex" class="form-controll hidden">
			 <input type="text" name="CustomerNameNoex" id="CustomerNameNoex" class="form-controll hidden">			
			  <div class="controls">
				<button type="submit" id="export" name="export" class="btn btn-info pull-right">EXPORT GENERAL LEDGER REPORT</button>
			  </div>
		    </div>
		 </form>
		</div>		
		
        <!-- /.box-body -->
        </div>		   
          
        </div>
	</section>
	
	
  </div>
<!--Print End --!>
	  
	  
	  
    </section>    
  </div>  

  <!--footer End-->

<?php include("../../includes_db_js.php"); ?>
</body>
</html>