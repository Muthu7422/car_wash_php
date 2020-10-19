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
     Daily Report 
      </h1>
     </section>
<script>
function Delete_Click() {
    var strconfirm = confirm("Are you sure you want to delete?");
    if (strconfirm == true) {
        return true;
    }
	else
		return false;
}  
  
  
</script>	
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
    <section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Daily Report</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form class="form-horizontal" method="post" action="daily_report_report.php" autocomplete="off">
              <div class="box-body">
 
               <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="date">Select The Date</label>
                 <input type="date" name="FromDate" class="form-control pull-right" id="FromDate" value="<?php echo $_REQUEST['FromDate']; ?> " onKeyPress="return tabE(this,event)" required>
                </div>
                 </div>
              <!-- /.box-body -->
			 
              <div class="box-footer">
			 
                <button type="submit" class="btn btn-default ">Cancel</button>
                <button  type="submit" class="btn btn-info pull-right" >Submit</button>
				
              </div>
              <!-- /.box-footer -->
            </form>
			 <div class="box-body">
		
			</div>
          </div>
        </div>
      </div>
	  
	  <?php
			
			if($_REQUEST['FromDate']!='')
			{
				?>
	   <div class="col-md-12">            
            <div class="box">
            			
            <!-- /.box-header -->
            <div class="box-body">
				<div class="col-sm-6">
			 <form action="daily_reports_export.php?FromDate=<?php echo $_REQUEST['FromDate'];?>"  method="post" name="export_excel" target="_blank">
 
			<div class="control-group">
				<div class="controls">
				  <div class="box-footer">
					<button type="submit" id="export" name="export" class="btn btn-primary button-loading" data-loading-text="Loading..."Style="background-color:green">EXPORT DAILY REPORT TO EXCEL</button>
				</div></div>
			</div>
		</form>
		</div>
		<div class="col-sm-6">
		 <form action="daily_report_report_print.php?FromDate=<?php echo $_REQUEST['FromDate'];?>"  method="post" name="export_excel" target="_blank">
 
			<div class="control-group">
				<div class="controls">
				  <div class="box-footer">
					<button type="submit" id="export" name="export" class="btn btn-primary button-loading" data-loading-text="Loading..."Style="background-color:RED">TAKE PRINT</button>
				</div></div>
			</div>
		</form>
		</div>
              <table id="" class="table table-bordered table-striped" >
				
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
				 $sco="select * from a_final_bill where bill_date='$FromDate' and FrachiseeId='".$_SESSION['BranchId']."' ";
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
				 $sco="select * from  expense_details where ExpenseDate='$FromDate' and franchisee_id='".$_SESSION['BranchId']."'";
				 $Esco=mysqli_query($conn,$sco);
				while($FEsco=mysqli_fetch_array($Esco))
				{
					
					$ex="select * from expense_master where Id='".$FEsco['ExpenseType']."' and franchisee_id='".$_SESSION['BranchId']."'";
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
				
				 $scop="select sum(Total_bill_Amount) as Total_bill_Amount from a_final_bill where bill_date='$FromDate' and FrachiseeId='".$_SESSION['BranchId']."'";
				 $Escop=mysqli_query($conn,$scop);
				$FEscop=mysqli_fetch_array($Escop);
				
				  ?>
				  
						    <td><B>TOTAL AMOUNT: </B></td>
							 
				  <td><B><?php echo $FEscop['Total_bill_Amount'];?></B></td>
				  </tr>
				  
				    <tr>
				  <?php 
				  $FromDate=$_REQUEST['FromDate'];
				
				 $scopC="select sum(Total_bill_Amount) as Total_bill_Amount from a_final_bill where ptype='Cash' and bill_date='$FromDate' and FrachiseeId='".$_SESSION['BranchId']."'";
				 $EscopC=mysqli_query($conn,$scopC);
				$FEscopC=mysqli_fetch_array($EscopC);
				
				  ?>
				
						    <td><B>CASH : </B></td>
							 
				  <td><B><?php echo $FEscopC['Total_bill_Amount'];?></B></td>
				  </tr>
				  
				   <tr>
				  <?php 
				  $FromDate=$_REQUEST['FromDate'];
				
				 $scopCard="select sum(Total_bill_Amount) as Total_bill_Amount from a_final_bill where ptype='Card' and bill_date='$FromDate' and FrachiseeId='".$_SESSION['BranchId']."'";
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
				  $scopEX="select SUM(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate='$FromDate' and franchisee_id='".$_SESSION['BranchId']."'";
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
				
				 $scopOC="select * from a_cash_acc where franchisee_id='".$_SESSION['BranchId']."'";
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
				
								
			    $scopEX2="select SUM(camount) as camount from a_hand_over_cash where CDate='$FromDate' and CBranch='".$_SESSION['BranchId']."'";
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
				
				 $scopC="select sum(Total_bill_Amount) as Total_bill_Amount from a_final_bill where ptype='Cash' and bill_date='$FromDate' and FrachiseeId='".$_SESSION['BranchId']."'";
				 $EscopC=mysqli_query($conn,$scopC);
				$FEscopC=mysqli_fetch_array($EscopC);
				
				 $scopEX1="select SUM(camount) as camount from a_hand_over_cash where CDate='$FromDate' and status='Active' and CBranch='".$_SESSION['BranchId']."'";
				 $EscopEX1=mysqli_query($conn,$scopEX1);
				$FEscopEX1=mysqli_fetch_array($EscopEX1);
				
				
				 $scopEX="select SUM(ExpenseAmount) as ExpenseAmount from expense_details where ExpenseDate='$FromDate' and franchisee_id='".$_SESSION['BranchId']."'";
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
				
     			 $scopC1="select SUM(Total_bill_Amount) as jd from a_final_bill where Month(bill_date)='$m' AND financial_year='".$_SESSION['FinancialYear']."' AND ptype='Cash'";
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
              </table>
			  
			  
			  
			  
			  
			  
			  
            </div>
			
            <!-- /.box-body -->
          </div>
           


		   
          
        </div>
      </div>
			<?php
			}
			?>
	  <!--Print End --!>
    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
	 
	 
     user experience. -->
	  <?php include("../../footer.php"); ?>
  <!--footer End-->
 <div class="control-sidebar-bg"></div>
 <?php include("../../includes_db_js.php"); ?>
</body>
</html>