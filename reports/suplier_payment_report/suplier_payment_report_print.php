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
                  Supplier Payment Details From <?php echo $_POST['from']; ?>  To  <?php echo $_POST['to']; ?>              
                </thead>
                
				<thead>
                <tr>
                  <th>S.No</th>
                  <th>Date</th>
				  <th>Supplier Name</th>
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
				$i=0;
			   
				  $ss="select s_purchase.*,m_supplier.LedgerId,m_supplier.sname from s_purchase left join m_supplier on s_purchase.	supplier_name=m_supplier.sid where (pdate between '$fdate' AND '$tdate') order by pdate desc";
				  $Ess=mysqli_query($conn,$ss);
				 while($FEss=mysqli_fetch_array($Ess))
				 {
					 $i++;
					 
					
				  $sc="select sum(Amount) as Amount from account_cash where ReferenceNo='".$FEss['inv_no']."' AND TransactionFrom='s_purchase' AND franchisee_id='".$_SESSION['BranchId']."'";
				 $Esc=mysqli_query($conn,$sc);
				 $FEsc=mysqli_fetch_array($Esc);
				 
				  $sb="select sum(Amount) as Amount from account_bank where ReferenceNo='".$FEss['inv_no']."' AND TransactionFrom='s_purchase' AND franchisee_id='".$_SESSION['BranchId']."'";
				 $Esb=mysqli_query($conn,$sb);
				 $FEsb=mysqli_fetch_array($Esb);
				 $pamountj=$FEsc['Amount']+$FEsb['Amount'];
				 
			 
				
				 
				 $sco="select sum(Amount) as Amount from account_cash where ReferenceNo='".$FEss['inv_no']."' AND TransactionFrom='sup_outstanding' AND franchisee_id='".$_SESSION['BranchId']."'";
				 $Esco=mysqli_query($conn,$sco);
				 $FEsco=mysqli_fetch_array($Esco);
				 
				  $sbo="select sum(Amount) as Amount from account_bank where ReferenceNo='".$FEss['inv_no']."' AND TransactionFrom='sup_outstanding' AND franchisee_id='".$_SESSION['BranchId']."'";
				 $Esbo=mysqli_query($conn,$sbo);
				 $FEsbo=mysqli_fetch_array($Esbo);
				 $pamounto=$FEsco['Amount']+$FEsbo['Amount'];
				 
				 
				 
				  $pamount=($pamountj+$pamounto);
				 $aamount=$FEss['TotalPurchaseAmount'];
				  $pending=($aamount-$pamount);
			
              
				 
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $FEss['pdate']; ?></td>
				  <td><?php echo $FEss['sname']; ?></td>
				  <td><?php echo $FEss['inv_no'];  ?></td>
				  
			
               <td align="right"><?php echo $aamount;  ?></td>				  
				  <td align="right"><?php echo number_format($pamount,2);  ?></td>
				  <td align="right"><?php echo number_format($pending,2);  ?></td>				  
				  <td align="center"><a href="suplier_payment_billwise_print.php?inv_no=<?php echo $FEss['inv_no']; ?>&&inv_amt=<?php echo $aamount; ?>&&pending_amt=<?php echo number_format($pending,2);?>" target="_blank"><font color="#3C3633">View</font></a></td>				  
                </tr>
				<?php				
			      }				
				?>
				<tr>
                  <td colspan="5" align="right"><?php //echo $tc; ?></td>
				  <td colspan="1" align="right"><?php //echo $td;  ?></td>
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