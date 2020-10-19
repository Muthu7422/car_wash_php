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
        <div class="col-md-12">            
            <div class="box">
            			
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
				<thead>                
                  Customer Payment Details From <?php echo date("d-m-Y",strtotime($_REQUEST['FromDate'])); ?> 
                </thead>
                
			<thead>
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
				 $sco="select * from a_final_bill where bill_date='$FromDate'";
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
			
			    <table id="" class="table table-bordered table-striped">
			
			<thead>
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
				 $sco="select * from  expense_details where ExpenseDate='$FromDate'";
				 $Esco=mysqli_query($conn,$sco);
				while($FEsco=mysqli_fetch_array($Esco))
				{
					
					$ex="select * from expense_master where id='".$FEsco['ExpenseType']."'";
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
			 
			  
			  <div class="col-sm-5 col-sm-offset-2">
			  <table id="" class="table table-bordered table-striped">
			    <tr>
				  <?php 
				  $FromDate=$_REQUEST['FromDate'];
				
				 $scop="select sum(Total_bill_Amount) as Total_bill_Amount from a_final_bill where bill_date='$FromDate'";
				 $Escop=mysqli_query($conn,$scop);
				$FEscop=mysqli_fetch_array($Escop);
				
				  ?>
				  
						    <td><B>TOTAL AMOUNT: </B></td>
							 
				  <td><B><?php echo $FEscop['Total_bill_Amount'];?></B></td>
				  </tr>
				  
				    <tr>
				  <?php 
				  $FromDate=$_REQUEST['FromDate'];
				
				 $scopC="select sum(Total_bill_Amount) as Total_bill_Amount from a_final_bill where ptype='Cash' and bill_date='$FromDate'";
				 $EscopC=mysqli_query($conn,$scopC);
				$FEscopC=mysqli_fetch_array($EscopC);
				
				  ?>
				
						    <td><B>CASH : </B></td>
							 
				  <td><B><?php echo $FEscopC['Total_bill_Amount'];?></B></td>
				  </tr>
				  
				   <tr>
				  <?php 
				  $FromDate=$_REQUEST['FromDate'];
				
				 $scopCard="select sum(Total_bill_Amount) as Total_bill_Amount from a_final_bill where ptype='Card' and bill_date='$FromDate'";
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
				  $scopEX="select SUM(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate='$FromDate'";
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
				
				 $scopOC="select * from a_cash_acc";
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
				
				 $scopC="select sum(Total_bill_Amount) as Total_bill_Amount from a_final_bill where ptype='Cash' and bill_date='$FromDate'";
				 $EscopC=mysqli_query($conn,$scopC);
				$FEscopC=mysqli_fetch_array($EscopC);
				
				 $scopEX="select SUM(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate='$FromDate'";
				 $EscopEX=mysqli_query($conn,$scopEX);
				$FEscopEX=mysqli_fetch_array($EscopEX);
				
				  ?>
				 
						    <td><B>CUMULATIVE TOTAL: </B></td>
							 
				  <td><B><?php //echo number_format($FEscopC['Total_bill_Amount']-$FEscopEX['ExpenseAmount'],2);
				   echo number_format((($FEscopC['Total_bill_Amount']-$esmt)+$sales_card),2);
				  
				  ?></B></td>
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

  <!--footer End-->

<?php include("../../includes_db_js.php"); ?>
</body>
</html>