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
     Trial Balance
        <small>Accounts <?php if(!isset($_REQUEST['msg'])==''){ ?> <span class="alert alert-danger"> <?php echo $_REQUEST['msg']; ?> </span><?php } ?></small>
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
    <section class="content container-fluid">
    <form role="form" method="post" action="trial_balance_print.php" autocomplete="off">
	<!-- form start -->
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
        <div class="box box-primary">
             <!-- /.box-header -->                  			 
	    <div class="box-body">
		
	    <div class="col-sm-12">
	        <hr>	   
	         <h3 align="left"><b><?php echo $_SESSION['franchisee_name'];?></b></h3>
			 <h4 align="left"><b>Trial Balance</b></h4>
             <h5 align="left"><b>Date From : </b> <?php echo date("d-m-Y",strtotime($_POST['from'])); ?>  </br> <b>Date To : </b> <?php echo date("d-m-Y",strtotime($_POST['to'])); ?></h5>			 				     
		    
		    <hr>
		</div>		
		
	<div class="col-sm-12">	 		
		<table class="table table-bordered">
	    <tr>
		  <td> <B style="color:Red"><label for="Branch" >SI.No</label></B></td>
		  <td> <B style="color:Red"><label for="Branch">Account Name</label></B></td>
		  <td> <B style="color:Red"><label for="Branch">Opening Balance</label></B></td>
		  <td> <B style="color:Red"><label for="Branch">Debit</label></B></td>
		  <td> <B style="color:Red"><label for="Branch">Credit</label></B></td>
		  <td> <B style="color:Red"><label for="Branch">Closing Balance</label></B></td>
		</tr>
		
		 	
	<?php
	    $fdate=$_POST['from'];
        $tdate=$_POST['to'];

	 $cashb1="select t1.id,t1.type,t2.LedgerName,t1.`ledger_id`,sum(t1.`amount`) as sqty from account_cash_bank t1 left join m_ledger t2 on t1.`ledger_id`=t2.Id where t1.franchisee_id='".$_SESSION['BranchId']."' group by t1.ledger_id,(t1.date between '$fdate' AND '$tdate')  ";
	  $cashqb1=mysqli_query($conn,$cashb1);
	 while( $cashfb1=mysqli_fetch_array($cashqb1)){

	
	  	$ledgergrp="select *from m_ledger_group where id='".$cashfb1['ledger_id']."'";
	   $ledgergrp1=mysqli_query($conn,$ledgergrp);
	   $ledgergrp11=mysqli_fetch_array($ledgergrp1);


	                    $dep111="select sum(amount) as amts from account_cash_bank  where ledger_id='".$cashfb1['ledger_id']."' and type='Debit' and franchisee_id='".$_SESSION['BranchId']."'";
						$dep14=mysqli_query($conn,$dep111);
						$result11=mysqli_fetch_array($dep14);
												
		                $dep1="select sum(amount) as amt from account_cash_bank where ledger_id='".$cashfb1['ledger_id']."' and type='Credit' and franchisee_id='".$_SESSION['BranchId']."'";
						$dep11=mysqli_query($conn,$dep1);
						$result1=mysqli_fetch_array($dep11);
						
                    $debit=$result11['amts'];							
					$credit=$result1['amt'];	
					

                    $t_c=$debit-$credit;

	                $c_b=$ledgergrp11['opening_bal']+$t_c;

$i++;
	?>		
		       <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo $cashfb1['LedgerName']; ?></td>
				  <td><?php echo number_format($ledgergrp11['opening_bal'],2); ?></td>
				  <td><?php echo number_format($debit,2); ?></td>
				  <td><?php echo number_format($credit,2) ?></td>
				  <td><?php echo number_format($c_b,2); ?></td>
			
	
            
                </tr>	
	<?php } ?>				
		</table>
		
	  <button type="submit" class="btn btn-info pull-right"><i class="fa fa-print" aria-hidden="true"></i> Print</button>						
	</div>	  	
    <!-- /.box-body -->
			  
          </div>
          <!-- /.box -->
        </div>	   
      </div>
    </form>
	</section>
    <!-- /.content -->
	
	

	
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
