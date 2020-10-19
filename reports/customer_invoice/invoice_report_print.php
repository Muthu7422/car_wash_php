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
        <div class="col-md-9 col-md-offset-2">            
            <div class="box">
            			
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
				<thead>                
                  Customer Service Invoice From <?php echo $_POST['from']; ?>  To  <?php echo $_POST['to']; ?>              
                </thead>
                
				<thead>
                <tr>
                  <th>S.No</th>
                  <th>Date</th>
				  <th>Customer Name</th>
				  <th>Invoice No.</th>
				  <th>Invoice Amt.</th>
				  <th>Paid Amt.</th>
				  <th>Pending Amt.</th>
				  <th>Paid Details</th>
				 
                </tr>
                </thead>
                <tbody>
				<?php
				$fdate=$_POST['from'];
				$tdate=$_POST['to'];
				
				 $ss="select a_final_bill.*,a_customer.LedgerId,a_customer.cust_name from a_final_bill left join a_customer on a_final_bill.cname=a_customer.id where cname ='".$_POST['CustomerName']."' AND (bill_date between '$fdate' AND '$tdate') order by bill_date";
				$Ess=mysqli_query($conn,$ss);
				$i=0;								
				while($FEss=mysqli_fetch_array($Ess))
				{
				
				 
				 $i++;
				 
				 
				 $sc="select sum(Amount) as Amount from account_cash where ReferenceNo='".$FEss['job_card_no']."' AND TransactionFrom='s_job_card' AND LedgerId='".$FEss['LedgerId']."' AND franchisee_id='".$_SESSION['BranchId']."'";
				 $Esc=mysqli_query($conn,$sc);
				 $FEsc=mysqli_fetch_array($Esc);
				 
				 $sb="select sum(Amount) as Amount from account_bank where ReferenceNo='".$FEss['job_card_no']."' AND TransactionFrom='s_job_card' AND LedgerId='".$FEss['LedgerId']."' AND franchisee_id='".$_SESSION['BranchId']."'";
				 $Esb=mysqli_query($conn,$sb);
				 $FEsb=mysqli_fetch_array($Esb);
				 $pamountj=$FEsc['Amount']+$FEsb['Amount'];
				 
				 
				 $scf="select sum(Amount) as Amount from account_cash where ReferenceNo='".$FEss['job_card_no']."' AND TransactionFrom='a_final_bill' AND LedgerId='".$FEss['LedgerId']."' AND franchisee_id='".$_SESSION['BranchId']."'";
				 $Escf=mysqli_query($conn,$scf);
				 $FEscf=mysqli_fetch_array($Escf);
				 
				 $sbf="select sum(Amount) as Amount from account_bank where ReferenceNo='".$FEss['job_card_no']."' AND TransactionFrom='a_final_bill' AND LedgerId='".$FEss['LedgerId']."' AND franchisee_id='".$_SESSION['BranchId']."'";
				 $Esbf=mysqli_query($conn,$sbf);
				 $FEsbf=mysqli_fetch_array($Esbf);
				 $pamountf=$FEscf['Amount']+$FEsbf['Amount'];
				 
				 $sco="select sum(Amount) as Amount from account_cash where ReferenceNo='".$FEss['inv_no']."' AND TransactionFrom='cust_outstanding' AND LedgerId='".$FEss['LedgerId']."' AND franchisee_id='".$_SESSION['BranchId']."'";
				 $Esco=mysqli_query($conn,$sco);
				 $FEsco=mysqli_fetch_array($Esco);
				 
				 $sbo="select sum(Amount) as Amount from account_bank where ReferenceNo='".$FEss['inv_no']."' AND TransactionFrom='cust_outstanding' AND LedgerId='".$FEss['LedgerId']."' AND franchisee_id='".$_SESSION['BranchId']."'";
				 $Esbo=mysqli_query($conn,$sbo);
				 $FEsbo=mysqli_fetch_array($Esbo);
				 $pamounto=$FEsco['Amount']+$FEsbo['Amount'];
				 
				 
				 
				 $pamount=($pamountj+$pamountf+$pamounto);
				 $aamount=$FEss['Total_bill_Amount'];
				 $pending=($aamount-$pamount);
				 
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $FEss['bill_date']; ?></td>
				  <td><?php echo $FEss['cust_name']; ?></td>
				  <td><?php echo $FEss['inv_no'];  ?></td>
				  <td align="right"><?php echo $aamount;  ?></td>				  
				  <td align="right"><?php echo number_format($pamount,2);  ?></td>
				  <td align="right"><?php echo number_format($pending,2);  ?></td>				  
				  <td align="center"><a href="invoice_report_Bill_wise_print.php?inv_no=<?php echo $FEss['inv_no']; ?>&&inv_amt=<?php echo $aamount; ?>&&pending_amt=<?php echo number_format($pending,2);?>" target="_blank"><font color="#3C3633">View</font></a></td>				  
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
			
            <!-- /.box-body -->
          </div>
           
<div class="box">
            			
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
				<thead>                
                  Customer Sales Invoice From <?php echo $_POST['from']; ?>  To  <?php echo $_POST['to']; ?>              
                </thead>
                
				<thead>
                <tr>
                  <th>S.No</th>
                  <th>Date</th>
				  <th>Customer Name</th>
				  <th>Invoice No.</th>
				  <th>Invoice Amt.</th>
				  <th>Paid Amt.</th>
				  <th>Pending Amt.</th>
				  <th>Paid Details</th>
				 
                </tr>
                </thead>
                <tbody>
				<?php
				$fdate=$_POST['from'];
				$tdate=$_POST['to'];
				
				$ss="select sales_invoice.*,a_customer.LedgerId,a_customer.cust_name from sales_invoice left join a_customer on sales_invoice.cname=a_customer.id where cname ='".$_POST['CustomerName']."' AND (sdate between '$fdate' AND '$tdate')  AND FranchiseeId='".$_SESSION['BranchId']."' order by sdate";
				$Ess=mysqli_query($conn,$ss);
				$i=0;								
				while($FEss=mysqli_fetch_array($Ess))
				{
				
				 
				 $i++;		 
				 
				 $sc="select sum(Amount) as Amount from account_cash where ReferenceNo='".$FEss['inv_no']."' AND TransactionFrom='sales_invoice' AND LedgerId='".$FEss['LedgerId']."' AND franchisee_id='".$_SESSION['BranchId']."'";
				 $Esc=mysqli_query($conn,$sc);
				 $FEsc=mysqli_fetch_array($Esc);
				 
				 $sb="select sum(Amount) as Amount from account_bank where ReferenceNo='".$FEss['inv_no']."' AND TransactionFrom='sales_invoice' AND LedgerId='".$FEss['LedgerId']."' AND franchisee_id='".$_SESSION['BranchId']."'";
				 $Esb=mysqli_query($conn,$sb);
				 $FEsb=mysqli_fetch_array($Esb);
				 $pamountj=$FEsc['Amount']+$FEsb['Amount'];
				 
				 
				 $sco="select sum(Amount) as Amount from account_cash where ReferenceNo='".$FEss['inv_no']."' AND TransactionFrom='cust_outstanding' AND LedgerId='".$FEss['LedgerId']."' AND franchisee_id='".$_SESSION['BranchId']."'";
				 $Esco=mysqli_query($conn,$sco);
				 $FEsco=mysqli_fetch_array($Esco);
				 
				 $sbo="select sum(Amount) as Amount from account_bank where ReferenceNo='".$FEss['inv_no']."' AND TransactionFrom='cust_outstanding' AND LedgerId='".$FEss['LedgerId']."' AND franchisee_id='".$_SESSION['BranchId']."'";
				 $Esbo=mysqli_query($conn,$sbo);
				 $FEsbo=mysqli_fetch_array($Esbo);
				 $pamounto=$FEsco['Amount']+$FEsbo['Amount'];
				 
				 $pamount=($pamountj+$pamounto);
				 $aamount=$FEss['bill_amt'];
				 $pending=($aamount-$pamount);
				 
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $FEss['sdate']; ?></td>
				  <td><?php echo $FEss['cust_name']; ?></td>
				  <td><?php echo $FEss['inv_no'];  ?></td>
				  <td align="right"><?php echo $aamount;  ?></td>				  
				  <td align="right"><?php echo number_format($pamount,2);  ?></td>
				  <td align="right"><?php echo number_format($pending,2);  ?></td>				  
				  <td align="center"><a href="invoice_report_Bill_wise_print.php?inv_no=<?php echo $FEss['inv_no']; ?>&&inv_amt=<?php echo $aamount; ?>&&pending_amt=<?php echo number_format($pending,2);?>" target="_blank"><font color="#3C3633">View</font></a></td>	  
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