<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");


   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);
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
        Expenses Type
        <small>Master</small>
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
    <form role="form" method="post" action="a_expense_type_addQ.php" autocomplete="off">
	
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Expenses Ledger Type</label>
                  <select type="text" class="form-control" name="LedgerType" id="LedgerType" placeholder="Vehicle Type" onKeyPress="return tabE(this,event)" required>
				  <option>--Select The Value--</option>
				  <?php 
				  $lm="select * from m_ledger_group order by ledger_group";
				  $Elm=mysqli_query($conn,$lm);
				  while($FElm=mysqli_fetch_array($Elm))
				  {
				  ?>				  
				  <option value="<?php echo $FElm['id']; ?>"><?php echo $FElm['ledger_group']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Category</label>
                  <input class="form-control" name="ecategory" id="ecategory" placeholder="category" onKeyPress="return tabE(this,event)">
                  <input type="hidden" class="form-control" name="franchisee_id"  id="franchisee_id" value="<?php echo $var['id']; ?>" readonly placeholder="Pid" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required> 
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Expenses Type</label>
                  <input class="form-control" name="ExpenseType" id="ExpenseType" placeholder="Expenses Type" onKeyPress="return tabE(this,event)">
                </div>
            </div>
			  <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" Onclick="return confirm('Are You Want To Proceed?')">Submit</button>
                </div>   
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	   
         </div>
    </form>
	</section>
    <!-- /.content -->
	
	  <section class="content container-fluid" hidden>
       
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
		
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			  <h3>
				Available Expenses Type
				</h3>
                <div class="form-group col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				
                  <th>S.No</th>
                  <th>Expenses Ledger Type</th>
                  <th>Category</th>
				  <th>Expenses Type</th>
				  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select expense_master.*,m_ledger_group.ledger_group from expense_master LEFT JOIN m_ledger_group ON expense_master.LedgerType=m_ledger_group.id where expense_master.franchisee_id='".$_SESSION['BranchId']."' order by Id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $FEss['ledger_group']; ?></td>
				  <td><?php  echo $FEss['ecategory']; ?></td>
				  <td><?php  echo $FEss['ExpenseType']; ?></td>
				  <td><?php  echo $FEss['Status']; ?></td>
                  <td>
                      <a href="a_expense_type_edit.php?Id=<?php  echo $FEss['Id']; ?>" class="btn-box-tool" Onclick="return confirm('Are You Want To Proceed?')"><i class="fa fa-edit custom-icon1"></i></a>
					 
                  </td>
                </tr>
				<?php } ?>
                </tbody>
              </table>
                </div>
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	      
         </div>

	</section>
	
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
