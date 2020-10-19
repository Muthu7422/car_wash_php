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
     Cash/Bank Summary
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
    <form role="form" method="post" action="a_expense_entry_addQ.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
               
			 
	   <div class="box-body">
	   
	    <div class="col-sm-12">
	   <hr>
	    <h4 align="right">Bank Accounts</h4>
	    <h3 align="right"><?php echo $_SESSION['FranchiseeName'];?></h3>
		
		<h4 align="right">1-10-2018 to <?php echo date('d-m-Y');?></h4>
		<h4 align="right">Closing Balance</h4>
		<hr>
		</div>
	  
	   <div class="col-sm-6">
	 
		
		<table class="table table-bordered">
	<tr>
		<td> <B style="color:Red"><label for="Branch">PARTICULARS</label></B></td>
		</tr>
	
		<tr>
		
		<td> <label for="Branch">Cash In Hand</label></td>
		
		</tr>
		<tr>
		<td> <label for="Branch">Cash</label></td>
		
		</tr>
		
		<tr>
		<td>  <label for="Branch">Bank Accounts</label></td>
		
		</tr>
		<tr>
		<td>  <label for="Branch">Bank Name</label></td>
		
		</tr>
			<tr>
		<td> <label for="Branch"><B style="color:Red"> Grand Total : </b></label></td>
		
		</tr>
		
	
		</table>
	 
	</div>
	
	<div class="col-sm-3">
	 
		
		<table class="table table-bordered">
	<tr>
		<td> <B style="color:Red"><label for="Branch">Debit</label></B></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		<tr>
	<td>&nbsp;</td>
		</tr>
		
		<tr>
		<td>&nbsp;</td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		
		<tr>
		<td>&nbsp;</td>
		</tr>
		
		<tr>
		<td>&nbsp;</td>
		</tr>
	</table>
	</div>
	
		<div class="col-sm-3">
	
		<table class="table table-bordered">
	<tr>
		<td> <B style="color:Red"><label for="Branch">Credit</label></B></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		<tr>
	<td>&nbsp;</td>
		</tr>
		
		<tr>
		<td>&nbsp;</td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		
		<tr>
		<td>&nbsp;</td>
		</tr>
		
		<tr>
		<td>&nbsp;</td>
		</tr>
	</table>
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
