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

              <div class="box-body">
			  
                <div class="form-group col-sm-9 col-sm-offset-2">
				
                <table id="example1" class="table table-bordered table-striped">
				<thead>  
             <?php
              $Fc="select * from journal_entry where id='".$_POST['ctype']."'";
	          $Dsx=mysqli_query($conn,$Fc);
	          $Cs=mysqli_fetch_array($Dsx);

              $fdate=$_POST['From'];
		      $tdate=$_POST['To'];
             ?>
			 <?php
              if($_POST['ctype']=='Journal')
              {
             ?>
			 <h3>Journal Entry </h3>
             <h4>Report Details on : <?php echo date("d-m-Y",strtotime($fdate)); ?>  </h4>
             <br/>
            </thead>		   
                <thead>
                <tr>
				
                  <th>S.No</th>
                  <th>Date</th>
				  <th>Journal To </th>

				  <th>Debit </th>
				 <th>Credit  </th>
                </tr>
                </thead>
                <tbody>
				<?php
				
				$DebitAmount=0;
				$CreditAmount=0;
				$cash2="select * from journal_entry where date between '$fdate' and '$tdate' and franchisee_id='".$_SESSION['BranchId']."'";
				
				$cash1=mysqli_query($conn,$cash2);
				while($cash=mysqli_fetch_array($cash1))
				{
					
				     
					 $casht="select * from m_ledger where Id='".$cash['journal_to']."'";
				$cashqt=mysqli_query($conn,$casht);
				$cashfi=mysqli_fetch_array($cashqt);		

				$casht1="select * from m_ledger where Id='".$cash['journal_by']."'";
				$cashqt1=mysqli_query($conn,$casht1);
				$cashfi1=mysqli_fetch_array($cashqt1);
					 
					$DebitAmount=$DebitAmount+$cash[''];
				$CreditAmount=$CreditAmount+$cash['amount'];
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo date("d-m-Y",strtotime($cash['date']));?></td>
				   <td><?php echo $cashfi1['LedgerName'];?></td>
					
				  <td><?php echo '0';?></td>
				  <td><?php echo $cash['amount'];?></td>
				 
                </tr>
				<?php
				}
			  }
				?>	
				<thead>  
             <?php
              $Fc="select * from sup_outstanding where id='".$_POST['ctype']."'";
	          $Dsx=mysqli_query($conn,$Fc);
	          $Cs=mysqli_fetch_array($Dsx);

              $fdate=$_POST['From'];
		      $tdate=$_POST['To'];
             ?>
			 <?php
              if($_POST['ctype']=='Payment')
              {
             ?>
			 <h3>Payment Voucher </h3>
             <h4>Report Details on : <?php echo date("d-m-Y",strtotime($fdate)); ?>  </h4>
             <br/>
            </thead>		   
                <thead>
                <tr>
				
                  <th>S.No</th>
                  <th>Date</th>
				  <th>Supplier Name</th>

				  <th>Debit </th>
				 <th>Credit  </th>
                </tr>
                </thead>
                <tbody>
				<?php
				
				$DebitAmount=0;
				$CreditAmount=0;
				$cash2="select * from payment_voucher where v_date between '$fdate' and '$tdate'";
			 
				$cash1=mysqli_query($conn,$cash2);
				while($cash=mysqli_fetch_array($cash1))
				{
					
				     
					 $casht="select * from m_ledger where Id='".$cash['cust_name']."'";
				$cashqt=mysqli_query($conn,$casht);
				$cashfi=mysqli_fetch_array($cashqt);
					 
					$DebitAmount=$DebitAmount+$cash['out_amt'];
				$CreditAmount=$CreditAmount+$cash[''];
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo date("d-m-Y",strtotime($cash['v_date']));?></td>
				   <td><?php echo $cashfi['LedgerName'];?></td>
					<td><?php echo $cash['out_amt'];?></td>
				  <td><?php echo '0';?></td>
				  
				 
                </tr>
				<?php
				}
			  }
				?>	
				<thead>  
             <?php
              $Fc="select * from receipt_voucher where id='".$_POST['ctype']."'";
	          $Dsx=mysqli_query($conn,$Fc);
	          $Cs=mysqli_fetch_array($Dsx);

              $fdate=$_POST['From'];
		      $tdate=$_POST['To'];
             ?>
			 <?php
              if($_POST['ctype']=='Receipt')
              {
             ?>
			 <h3>Receipt Voucher </h3>
             <h4>Report Details on : <?php echo date("d-m-Y",strtotime($fdate)); ?> </h4>
             <br/>
            </thead>		   
                <thead>
                <tr>
				
                  <th>S.No</th>
                  <th>Date</th>
				  <th>Customer Name</th>

				  <th>Debit </th>
				 <th>Credit  </th>
                </tr>
                </thead>
                <tbody>
				<?php
				
				$DebitAmount=0;
				$CreditAmount=0;

				$cash2="select * from receipt_voucher where paid_date between '$fdate' and '$tdate'";
			
				$cash1=mysqli_query($conn,$cash2);
				while($cash=mysqli_fetch_array($cash1))
				{
					
				     
					 $casht="select * from a_customer where id='".$cash['cust_id']."'";
				$cashqt=mysqli_query($conn,$casht);
				$cashfi=mysqli_fetch_array($cashqt);
					 
					$DebitAmount=$DebitAmount+$cash3[''];
				$CreditAmount=$CreditAmount+$cash['paid_amt'];
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo date("d-m-Y",strtotime($cash['paid_date']));?></td>
				   <td><?php echo $cashfi['cust_name'];?></td>

				  <td><?php echo '0';?></td>
				  <td><?php echo $cash['paid_amt'];?></td>
				 
                </tr>
				<?php
				}
			  }
				?>	
				 <thead>  
             <?php
              $Fc="select * from s_billing where id='".$_POST['ctype']."'";
	          $Dsx=mysqli_query($conn,$Fc);
	          $Cs=mysqli_fetch_array($Dsx);

              $fdate=$_POST['From'];
		      $tdate=$_POST['To'];
             ?>
			 <?php
              if($_POST['ctype']=='Sales')
              {
             ?>
			 <h3>Sale invoice </h3>
             <h4>Report Details on : <?php echo date("d-m-Y",strtotime($fdate)); ?></h4>
             <br/>
            </thead>		   
                <thead>
                <tr>
				
                  <th>S.No</th>
                  <th>Date</th>
				  <th>Customer Name</th>

				  <th>Debit </th>
				 <th>Credit  </th>
                </tr>
                </thead>
                <tbody>
				<?php
				// $Tdate=date("Y-m-d"); 
				$DebitAmount=0;
				$CreditAmount=0;

				$cash2="select * from sales_order where pdate between '$fdate' and '$tdate' and FranchiseeId='".$_SESSION['BranchId']."'";
		
				$cash1=mysqli_query($conn,$cash2);
				while($cash=mysqli_fetch_array($cash1))
				{
					$casha="select * from sales_order_details where inv_no='".$cash['id']."'";
				$cashb=mysqli_query($conn,$casha);
				$cash3=mysqli_fetch_array($cashb);

				     
					 $casht="select * from a_customer where id='".$cash['supplier_name']."'";
				$cashqt=mysqli_query($conn,$casht);
				$cashfi=mysqli_fetch_array($cashqt);
					 
					$DebitAmount=$DebitAmount+$cash3[''];
				$CreditAmount=$CreditAmount+$cash3['TotalPurchaseAmount'];
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo date("d-m-Y",strtotime($cash['pdate']));?></td>
				   <td><?php echo $cashfi['cust_name'];?></td>

				  <td><?php echo '0';?></td>
				  <td><?php echo $cash['TotalPurchaseAmount'];?></td>
				 
                </tr>
				<?php
				}
			  }
				?>	
			<thead>  
             <?php
              $Fc="select * from s_quotation where id='".$_POST['ctype']."'";
	          $Dsx=mysqli_query($conn,$Fc);
	          $Cs=mysqli_fetch_array($Dsx);

              $fdate=$_POST['From'];
		      $tdate=$_POST['To'];
             ?>
			 <?php
              if($_POST['ctype']=='Quotation')
              {
             ?>
			 <h3>Quotation </h3>
             <h4>Report Details on : <?php echo date("d-m-Y",strtotime($fdate)); ?>  </h4>
             <br/>
            </thead>		   
                <thead>
                <tr>
				
                  <th>S.No</th>
                  <th>Date</th>
                  <th>Customer Name </th>
				  
				   <th>Debit</th>
				 <th>Credit </th>
                </tr>
                </thead>
                <tbody>
				<?php
				// $Tdate=date("Y-m-d"); 
				$DebitAmount=0;
				$CreditAmount=0;

			 $cash="select * from s_quotation where pdate between '$fdate' and '$tdate' and FranchiseeId='".$_SESSION['BranchId']."'";

				$cashq=mysqli_query($conn,$cash);
				while($cashf=mysqli_fetch_array($cashq))
				{
					 $cashi="select * from s_quotation_details where q_no='".$cashf['id']."' ORDER BY id";
				$cashqi=mysqli_query($conn,$cashi);
				$cashfi=mysqli_fetch_array($cashqi);
				
				 $casht="select * from a_customer where id='".$cashf['supplier_name']."'";
				$cashqt=mysqli_query($conn,$casht);
				$cashfi1=mysqli_fetch_array($cashqt);
				     
					$DebitAmount=$DebitAmount+$cashfi[''];
				$CreditAmount=$CreditAmount+$cashf['TotalPurchaseAmount'];
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo date("d-m-Y",strtotime($cashf['pdate']));?></td>
				  <td><?php echo $cashfi1['cust_name'];?></td>
				  
				   <td><?php echo '0';?></td>
				    <td><?php echo $cashf['TotalPurchaseAmount'];?></td>
				 
                </tr>
				<?php
				}
			  }
				?>	
          <thead>  
             <?php
              $Fc="select * from s_dc where id='".$_POST['ctype']."'";
	          $Dsx=mysqli_query($conn,$Fc);
	          $Cs=mysqli_fetch_array($Dsx);

              $fdate=$_POST['From'];
		      $tdate=$_POST['To'];
             ?>
		
          <thead>  
             <?php
              $Fc="select * from s_purchase where id='".$_POST['ctype']."'";
	          $Dsx=mysqli_query($conn,$Fc);
	          $Cs=mysqli_fetch_array($Dsx);

              $fdate=$_POST['From'];
		      $tdate=$_POST['To'];
             ?>
			 <?php
              if($_POST['ctype']=='Purchase')
              {
             ?>
			 <h3>Purchase</h3>
             <h4>Report Details on : <?php echo date("d-m-Y",strtotime($fdate)); ?>  </h4>
             <br/>
            </thead>		   
                <thead>
                <tr>
				
                  <th>S.No</th>
                  <th>Date</th>
                  <th>Supplier Name</th>
				  
				  <th>Debit </th>
				 <th>Credit </th>
                </tr>
                </thead>
                <tbody>
				<?php
				// $Tdate=date("Y-m-d"); 
				$DebitAmount=0;
				$CreditAmount=0;

				$cash="select * from s_purchase where pdate between '$fdate' and '$tdate' and FranchiseeId='".$_SESSION['BranchId']."'";
		
				$cashq=mysqli_query($conn,$cash);
				while($cashf=mysqli_fetch_array($cashq))
				{
				echo	$cashi="select * from s_purchase_details where inv_no='".$cashf['id']."'";
				$cashqi=mysqli_query($conn,$cashi);
				$cashfi=mysqli_fetch_array($cashqi);
				     $cashl="select * from m_spare where sid='".$cashfi['spare_name']."'";
				$cashql=mysqli_query($conn,$cashl);
				$cashfl=mysqli_fetch_array($cashql);
				
				$casht="select * from m_supplier where sid='".$cashf['supplier_name']."'";
				$cashqt=mysqli_query($conn,$casht);
				$cashfi1=mysqli_fetch_array($cashqt);
				     
					$DebitAmount=$DebitAmount+$cashfi['total'];
				$CreditAmount=$CreditAmount+$cashfi[''];
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo date("d-m-Y",strtotime($cashf['pdate']));?></td>
				   <td><?php echo $cashfi1['sname'];?></td>
				  
				    <td><?php echo $cashfi['total'];?></td>
				    <td><?php echo '0';?></td>
				 
                </tr>
				<?php
				}
			  }
				?>	
			<td></td>
				
				
				<td></td>
				<td><B>TOTAL : </B></td>
				<td><B><?php echo $DebitAmount;?>.00</B></td>
				<td><B><?php echo $CreditAmount;?>.00</B></td>
				</tr>
                </tbody>
				 
              </table>
			  <div class="box-footer">
                 <a href="day_book.php"><button type="button" class="btn btn-info pull-right">Back</button></a>
                </div>
                </div>
				
            </div>
		
 
</body>
</html>
