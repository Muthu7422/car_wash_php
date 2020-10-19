<!DOCTYPE html>
<html>

<head>
    <!--[if gte mso 9]>
    <xml>
        <x:ExcelWorkbook>
            <x:ExcelWorksheets>
                <x:ExcelWorksheet>
                    <x:Name>Sheet 1</x:Name>
                    <x:WorksheetOptions>
                        <x:Print>
                            <x:ValidPrinterInfo/>
                        </x:Print>
                    </x:WorksheetOptions>
                </x:ExcelWorksheet>
            </x:ExcelWorksheets>
        </x:ExcelWorkbook>
    </xml>
    <![endif]-->
</head>


<?php
include("../../includes.php");
include("../../redirect.php");
$date=date('d-m-Y');
if(isset($_POST['export']))
{
header('Content-type: application/excel');
$filename = 'Daily Report for_'.date("d-m-Y",strtotime($_REQUEST['FromDate'])).'.xls';
header('Content-Disposition: attachment; filename='.$filename);

?>
<body>
  <table  class="table table-bordered table-striped" border="1">
                <thead>
				<tr>&nbsp;</tr>
			 <tr><h3>Company Name : <?php echo $_SESSION['company']?></h3></tr>
				 <tr><h4>Daily Report for <?php echo date("d-m-Y",strtotime($_REQUEST['FromDate']));?> </h4></tr>
				<tr>
				  <th>S.No</th>
				<th>Date</th>
				<th>Bill No</th>
				<th>Customer Name</th>
				<th>Model</th>
				<th>Customer No</th>
				<th>Service Name</th>
					<th>Package Name</th>
				<th>Address</th>
				<th>Vehicle No</th>
				<th>Total Item</th>
				<th>Amount</th>
				<th>Mode Of Pay</th>
					
                </tr>
                </thead>
                 <tbody>
				<?php
				$FromDate=$_REQUEST['FromDate'];
				$i=0;
				 $sco="select * from a_final_bill where bill_date='$FromDate' and FrachiseeId='".$_SESSION['FranchiseeId']."'";
				 $Esco=mysqli_query($conn,$sco);
				while($FEsco=mysqli_fetch_array($Esco))
				{
					
					$job="select * from s_job_card where job_card_no='".$FEsco['job_card_no']."'";
					$jobq=mysqli_query($conn,$job);
					$jobf=mysqli_fetch_array($jobq);
					
					$cust="select * from a_customer where id='".$FEsco['cname']."'";
					$custq=mysqli_query($conn,$cust);
					$custf=mysqli_fetch_array($custq);
					
					$custv="select * from a_customer_vehicle_details where cust_no='".$custf['id']."'";
					$custvq=mysqli_query($conn,$custv);
					$custvf=mysqli_fetch_array($custvq);
					
					$sdetails="select * from s_job_card_sdetails where job_card_no='".$jobf['id']."'";
					$sdetailsq=mysqli_query($conn,$sdetails);
					$sdetailsf=mysqli_fetch_array($sdetailsq);
					
					 $ssc="select DISTINCT(package_type) AS package_type from s_job_card_pdetails where job_card_no='".$jobf['id']."'";
				  $Essc=mysqli_query($conn,$ssc);
				$FEssc=mysqli_fetch_array($Essc);
					
					
				 $i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo date("d-m-Y",strtotime($FEsco['bill_date'])); ?></td>
				  <td><?php echo $FEsco['inv_no']; ?></td>
				  <td><?php echo $custf['cust_name'];  ?></td>
				  <td><?php echo $custvf['VehicleBrand']; ?></td>
                  <td><?php echo $custf['mobile1']; ?></td>
				 <?php
				 if($sdetailsf['service_type']!='')
				 {
				 ?>
				  <td><?php echo $sdetailsf['service_type']; ?></td>
				  <?php
				 }
				 else
				 {
					 ?>
					 <td align="center">-</td>
					 <?php
				 }
				 ?>
				  <?php
				 if($FEssc['package_type']!='')
				 {
				 ?>
				   <td><?php echo $FEssc['package_type'];?></td>
				  <?php
				 }
				 else
				 {
					 ?>
					 <td align="center">-</td>
					 <?php
				 }
				 ?>
				  
				  <td><?php echo $custf['addr'];  ?></td>
				  <td><?php echo $custvf['vehicle_no'];  ?></td>
                  <td>1</td>
				  <td><?php echo $FEsco['Total_bill_Amount']; ?></td>
				  <td><?php echo $FEsco['ptype'];?> </td>
				    
                </tr>
				<?php				
			      }				
				?>
				<tr>
                  <td colspan="5" align="right"><?php //echo $tc; ?></td>
				  <td colspan="1" align="right"><?php //echo $td;  ?></td>
				  </tr>
				  
                  </tbody>                
              </table>
			  </div>
			
			 <div class="box-body">
			  <div class="col-sm-5">
			
			    <table id="" class="table table-bordered table-striped" border="1">
			
			<thead>
			<tr>
			<h3>EXPENSES DETAILS</h3>
			<HR>
			</tr>
			 <tr>
                <th>S.No</th>
				<th>Expense</th>
				<th>Amount</th>
				 </tr>
                </thead>
                <tbody>
				<?php
				$FromDate=$_REQUEST['FromDate'];
				$i=0;
				 $sco="select * from  expense_details where ExpenseDate='$FromDate' and franchisee_id='".$_SESSION['FranchiseeId']."'";
				 $Esco=mysqli_query($conn,$sco);
				while($FEsco=mysqli_fetch_array($Esco))
				{
					
					$ex="select * from expense_master where id='".$FEsco['ExpenseType']."' and FrachiseeId='".$_SESSION['FranchiseeId']."'";
					$exq=mysqli_query($conn,$ex);
					$exf=mysqli_fetch_array($exq);
					
					
					
				 $i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                   <td><?php echo $exf['ExpenseType']; ?></td>
				  <td><?php echo $FEsco['ExpenseAmount'] + $FEsco['TaxAmount'];  ?></td>
			      </tr>
				<?php
				}
				?>
				  
                  </tbody>                
              </table>
			  </div>
			
			 <div class="box-body">
			 <div class="box-body">
			  
			  <div class="col-sm-5 col-sm-offset-2">
			  <table id="" class="table table-bordered table-striped" border="1">
			  <tr>
			  <HR>
			<h3>TOTAL SUM</h3>
			
			</tr>
			    <tr>
				  <?php 
				  $FromDate=$_REQUEST['FromDate'];
				
				 $scop="select sum(Total_bill_Amount) as Total_bill_Amount from a_final_bill where bill_date='$FromDate' and FrachiseeId='".$_SESSION['FranchiseeId']."'";
				 $Escop=mysqli_query($conn,$scop);
				$FEscop=mysqli_fetch_array($Escop);
				
				  ?>
				  
						    <td><B>TOTAL AMOUNT: </B></td>
							 
				  <td><B><?php echo $FEscop['Total_bill_Amount'];?></B></td>
				  </tr>
				  
				    <tr>
				  <?php 
				  $FromDate=$_REQUEST['FromDate'];
				
				 $scopC="select sum(Total_bill_Amount) as Total_bill_Amount from a_final_bill where ptype='Cash' and bill_date='$FromDate' and FrachiseeId='".$_SESSION['FranchiseeId']."'";
				 $EscopC=mysqli_query($conn,$scopC);
				$FEscopC=mysqli_fetch_array($EscopC);
				
				  ?>
				
						    <td><B>CASH : </B></td>
							 
				  <td><B><?php echo $FEscopC['Total_bill_Amount'];?></B></td>
				  </tr>
				  
				   <tr>
				  <?php 
				  $FromDate=$_REQUEST['FromDate'];
				
				 $scopCard="select sum(Total_bill_Amount) as Total_bill_Amount from a_final_bill where ptype='Card' and bill_date='$FromDate' and FrachiseeId='".$_SESSION['FranchiseeId']."'";
				 $EscopCard=mysqli_query($conn,$scopCard);
				$FEscopCard=mysqli_fetch_array($EscopCard);
				if($FEscopCard['Total_bill_Amount']=='')
				{
					$smt='0.00';
				}
				else
				{
					$smt=$FEscopCard['Total_bill_Amount'];
				}
				
				  ?>
				
						    <td><B>CARD : </B></td>
							 
				  <td><B><?php echo $sales_card=$smt;?></B></td>
				  </tr>
				  
				  <tr>
				  <?php 
				  $FromDate=$_REQUEST['FromDate'];				
				  $scopEX="select SUM(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate='$FromDate' and franchisee_id='".$_SESSION['FranchiseeId']."'";
				  $EscopEX=mysqli_query($conn,$scopEX);
				 $FEscopEX=mysqli_fetch_array($EscopEX);
				if($FEscopEX['ExpenseAmount']=='')
				{
					$smt='0.00';
				}
				else
				{
					$smt=$FEscopEX['ExpenseAmount'];
				}
				
				  ?>
				
						    <td><B>EXPENSE : </B></td>
							 
				  <td><B><?php echo $esmt=$smt;?></B></td>
				  </tr>
				  
				  
				   <tr>
				  <?php 
				  $FromDate=$_REQUEST['FromDate'];
				
				 $scopOC="select * from a_cash_acc where franchisee_id='".$_SESSION['FranchiseeId']."'";
				 $EscopOC=mysqli_query($conn,$scopOC);
				$FEscopOC=mysqli_fetch_array($EscopOC);
				if($FEscopOC['cash']=='')
				{
					$smt='0.00';
				}
				else
				{
					$smt=$FEscopOC['cash'];
				}
				
				  ?>
				
						    <td><B>CASH IN OFFICE : </B></td>
							 
				  <td><B><?php echo number_format($FEscopC['Total_bill_Amount']-$esmt,2);?></B></td>
				  </tr>
				  
				  
				  
				  <tr>
				  <?php 
				  $FromDate=$_REQUEST['FromDate'];
				
								
			    $scopEX2="select SUM(camount) as camount from a_hand_over_cash where CDate='$FromDate' and CBranch='".$_SESSION['FranchiseeId']."'";
				 $EscopEX2=mysqli_query($conn,$scopEX2);
				$FEscopEX2=mysqli_fetch_array($EscopEX2);
					
				  ?>
				 
						    <td><B>CASH HAND OVER </B></td>
							 
				  <td><B><?php //echo number_format($FEscopC['Total_bill_Amount']-$FEscopEX['ExpenseAmount'],2);
				   echo number_format(($FEscopEX2['camount']),2);
				  
				  ?></B></td>
				  </tr>
				  
				  
				    <tr>
				  <?php 
				  $FromDate=$_REQUEST['FromDate'];
				
				 $scopC="select sum(Total_bill_Amount) as Total_bill_Amount from a_final_bill where ptype='Cash' and bill_date='$FromDate' and FrachiseeId='".$_SESSION['FranchiseeId']."'";
				 $EscopC=mysqli_query($conn,$scopC);
				$FEscopC=mysqli_fetch_array($EscopC);
				
				 $scopEX1="select SUM(camount) as camount from a_hand_over_cash where CDate='$FromDate' and status='Active' and CBranch='".$_SESSION['FranchiseeId']."'";
				 $EscopEX1=mysqli_query($conn,$scopEX1);
				$FEscopEX1=mysqli_fetch_array($EscopEX1);
				
				 $scopEX="select SUM(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate='$FromDate' and franchisee_id='".$_SESSION['FranchiseeId']."'";
				 $EscopEX=mysqli_query($conn,$scopEX);
				$FEscopEX=mysqli_fetch_array($EscopEX);
				
				  ?>
				 
						    <td><B>CUMULATIVE DAILY TOTAL: </B></td>
							 
				  <td><B><?php //echo number_format($FEscopC['Total_bill_Amount']-$FEscopEX['ExpenseAmount'],2);
				   echo number_format((($FEscopC['Total_bill_Amount']-$esmt)+$sales_card-$FEscopEX1['camount']),2);
				  
				  ?></B></td>
				  </tr>
			  	  			       <tr>
				  <?php 
					 $date=date("Y-m-d");
					  $m=date("m");
				
     			 $scopC1="select SUM(Total_bill_Amount) as jd from a_final_bill where Month(bill_date)='$m' AND financial_year='".$_SESSION['FinancialYear']."' AND ptype='Cash' and FrachiseeId='".$_SESSION['FranchiseeId']."'";
				 $EscopC1=mysqli_query($conn,$scopC1);
			   $FEscopC1=mysqli_fetch_array($EscopC1);
			   
				// $scopEX2="select sum(camount) as camount from a_hand_over_cash where CDate>= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND status='Active'";
			    // $EscopEX2=mysqli_query($conn,$scopEX2);
				// $FEscopEX2=mysqli_fetch_array($EscopEX2);
				
				
				  ?>				 
						    <td><B>CUMULATIVE MONTHLY TOTAL: </B></td>							 
				  <td><B><?php echo  number_format((($FEscopC1['jd']-$esmt)+$sales_card),2); ?></B></td>
				  </tr>
			  
			   </tbody>                

<?php
 }


?>

</div>
</div>
</div>
</div>
</html>