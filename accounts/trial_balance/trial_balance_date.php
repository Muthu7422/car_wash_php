<?php
include("../../includes.php");
include("../../redirect.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            
   <!-- /.box-header -->
            <!-- form start -->
	<form name="form1" method="post" action="trial_balance.php"> 
	<form class="form-horizontal" method="post" action="trial_balance.php" autocomplete="off">
	  <!-- form start -->	
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
               <div class="box-body">	
                <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="date">From</label>
                  <input type="date" name="from" id="datepicker" class="form-control pull-right" onKeyPress="return tabE(this,event)">
                </div>
				
                <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="duedate">To</label>
                  <input type="date" name="to" id="datepicker1" class="form-control pull-right" onKeyPress="return tabE(this,event)">
                </div>							
               </div>
              <!-- /.box-body -->                          
        </div>      
   </div>
    <!-- /.box-body -->
            
            <div class="box-footer">
                <button class="hidden" type="submit" class="btn btn-default ">Cancel</button>
                <button type="submit"  class="btn btn-info pull-right" >Submit</button>
            </div>
              <!-- /.box-footer -->
            </form>
						  
      </div>
    </div>
    </section>
	
    <!-- /.section -->
	
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
