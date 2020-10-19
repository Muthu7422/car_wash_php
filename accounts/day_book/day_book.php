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
     Day Book
        <small>Accounts</small>
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
   
   
    <!-- Main content -->
    <!-- /.content -->
	
	  <section class="content container-fluid">
       <form class="form-horizontal" method="post" action="day_book_print.php" autocomplete="off" target="_blank">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
		
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
             
              <div class="box-body">
			  <br>
			  <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="date">Date</label>
                 <input type="date" name="From" class="form-control pull-right" id="From" value="<?php echo date('Y-m-d'); ?>" onKeyPress="return tabE(this,event)" readonly>
                </div>
				
				<div class="form-group col-sm-4" style="padding-left:60px" hidden>
                  <label for="date">To</label>
                 <input type="date" name="To" class="form-control pull-right" id="To" value="<?php echo date('Y-m-d'); ?>" onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="Branch">Types</label>
				  <select class="form-control" id="ctype" name="ctype" onChange="" required>
				  <option value="">--select Type</option>
				  
                   <option value="Sales">Sales</option>
				   <option value="Purchase">Purchase</option>
				   <option value="Quotation" hidden>Quotation</option>
				   <option value="Receipt">Receipt Voucher</option>
				   <option value="Payment">Payment Voucher</option>
				   <option value="Journal">Journal</option>
				  </select>
                </div>
				
			  </div>
			  
		<!-- /.box-body -->
		
		       <div class="box-footer">
                  <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>

				 </div>
				<!-- /.box -->
			</div>
		</div>
	  </form>
	</section>
    <!-- /.content -->
				
			<section class="content container-fluid hidden">       	
			  <div class="row">
				<div class="col-md-12">
				 <div class="box box-primary">
				 
				<div class="box-body"> 
			 <!-- <h3>
                For <?php echo date("d-m-Y");?>
				</h3> -->
				
                <div class="form-group col-sm-12 ">
				 <button  type="submit" class="btn btn-info pull-right" ><i class="fa fa-print" style="font-size:20px"></i> PRINT DAY BOOK</button>
                <table class="table table-bordered table-striped">
                <thead>
                <tr>
				
                  <th>S.No</th>
                  <th>Date</th>
				  <th>Particulars</th>
				  <th>Vch Type</th>
				  <th>Vch No</th>
				  <th><b style="color:red">Debit Amount</b><br>Inwards QTY</th>
				 <th><b style="color:red">Credit Amount</b> <br>Outwards QTY</th>
                </tr>
                </thead>
                <tbody>
				<?php
				 $Tdate=date("Y-m-d"); 
				$cash="select * from account_cash where TransactionDate='$Tdate' AND Amount>'0'";
				$cashq=mysqli_query($conn,$cash);
				while($cashf=mysqli_fetch_array($cashq))
				{
					if($cashf['TransactionFrom']=='s_purchase')
					{
						$particular='Purchase';
					}
					if($cashf['TransactionFrom']=='sales_invoice')
					{
						$particular='Sales';
					}
					if($cashf['TransactionFrom']=='s_job_card')
					{
						$particular='Job Card';
					}
					if($cashf['TransactionFrom']=='a_final_bill')
					{
						$particular='Service';
					}
					if($cashf['TransactionFrom']=='expense_details')
					{
						$particular='Expense';
					}
					if($cashf['TransactionFrom']=='cust_outstanding')
					{
						$particular='Customer Outstanding';
					}
					if($cashf['TransactionFrom']=='sup_outstanding')
					{
						$particular='Supplier Outstanding';
					}
					
					if($cashf['TransactionType']=='Debit')
					{
						$Debit=$cashf['Amount'];
						$Credit='0.00';
					}
					if($cashf['TransactionType']=='Credit')
					{
						$Debit='0.00';
						$Credit=$cashf['Amount'];
					}
					
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo date("d-m-Y",strtotime($cashf['TransactionDate']));?></td>
				  <td><?php echo $particular;?></td>
				  <td><?php echo $cashf['TransactionType'];?></td>
				  <td><?php echo $cashf['ReferenceNo'];?></td>
				   <td style="text-align:right"><?php echo $Debit;?></td>
				    <td style="text-align:right"><?php echo $Credit;?></td>
				 
                </tr>
				<?php
				}
				?>
				
				<?php
				 $Tdate=date("Y-m-d"); 
				$cash="select * from account_bank where TransactionDate='$Tdate' AND Amount>'0'";
				$cashq=mysqli_query($conn,$cash);
				while($cashf=mysqli_fetch_array($cashq))
				{
					if($cashf['TransactionFrom']=='s_purchase')
					{
						$particular='Purchase';
					}
					if($cashf['TransactionFrom']=='sales_invoice')
					{
						$particular='Sales';
					}
					if($cashf['TransactionFrom']=='s_job_card')
					{
						$particular='Job Card';
					}
					if($cashf['TransactionFrom']=='a_final_bill')
					{
						$particular='Service';
					}
					if($cashf['TransactionFrom']=='expense_details')
					{
						$particular='Expense';
					}
					if($cashf['TransactionFrom']=='cust_outstanding')
					{
						$particular='Customer Outstanding';
					}
					if($cashf['TransactionFrom']=='sup_outstanding')
					{
						$particular='Supplier Outstanding';
					}
					
					if($cashf['TransactionType']=='Debit')
					{
						$Debit=$cashf['Amount'];
						$Credit='0.00';
					}
					if($cashf['TransactionType']=='Credit')
					{
						$Debit='0.00';
						$Credit=$cashf['Amount'];
					}
					
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo date("d-m-Y",strtotime($cashf['TransactionDate']));?></td>
				  <td><?php echo $particular;?></td>
				  <td><?php echo $cashf['TransactionType'];?></td>
				  <td><?php echo $cashf['ReferenceNo'];?></td>
				   <td style="text-align:right"><?php echo $Debit;?></td>
				    <td style="text-align:right"><?php echo $Credit;?></td>
				 
                </tr>
				<?php
				}
				?>
				<tr>
				<?php 
				$cash="select SUM(Amount) AS TCAmount from account_cash where TransactionDate='$Tdate' AND TransactionType='Credit'";
				$cashq=mysqli_query($conn,$cash);
				$cashf=mysqli_fetch_array($cashq);
				
				$cashb="select SUM(Amount) AS TCAmount from account_bank where TransactionDate='$Tdate' AND TransactionType='Credit'";
				$cashqb=mysqli_query($conn,$cashb);
				$cashfb=mysqli_fetch_array($cashqb);
				
				$cashD="select SUM(Amount) AS TCAmount from account_cash where TransactionDate='$Tdate' AND TransactionType='Debit'";
				$cashqD=mysqli_query($conn,$cashD);
				$cashfD=mysqli_fetch_array($cashqD);
				
				$cashbD="select SUM(Amount) AS TCAmount from account_bank where TransactionDate='$Tdate' AND TransactionType='Debit'";
				$cashqbD=mysqli_query($conn,$cashbD);
				$cashfbD=mysqli_fetch_array($cashqbD);
				$DebitAmount=$cashfD['TCAmount']+$cashfbD['TCAmount'];
				$CreditAmount=$cashf['TCAmount']+$cashfb['TCAmount'];
				?>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
					<td><B>TOTAL : </B></td>
				<td style="text-align:right"><B><?php echo number_format($DebitAmount,2);?></B></td>
				<td style="text-align:right"><B><?php echo number_format($CreditAmount,2);?></B></td>
				</tr>
                </tbody>
              </table>
                </div>
				
            
			
			
              <!-- /.box-body -->
         </div>
		  
          <!-- /.box -->
		   
        </div>
	      
         </div>
     </div>
	</section>
	
</div>
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
