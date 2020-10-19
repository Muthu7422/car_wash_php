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
        Painter
        <small>Master</small>
      </h1>
     </section>
<div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
                <strong>Painters Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			  <div class="alert alert-danger">
              <b> Painters Deleted Successfully!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  <?php if($_REQUEST['a']!="") {?> 
			  <div class="alert alert-warning">
                 Painters <b>already</b> exist ! <i class="fa fa-warning" style="font-size:30px;color:white"></i>
              </div> <?php } ?></div>
<script>
function Delete_Click() {
    var strconfirm = confirm("Are you sure you want to delete?");
    if (strconfirm == true) {
        return true;
    }
	else
		return false;
}  

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
    <form role="form" method="post" action="m_painter_addQ.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			  
			  
                <div class="form-group col-sm-4">
                  <label for="Branch">Painter Name</label>
                  <input type="text" class="form-control" name="PainterName" id="PainterName" placeholder="Painter Name" onKeyPress="return tabE(this,event)" required>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Painter Mobile</label>
                  <input type="text" class="form-control" name="PainterMobile" id="PainterMobile" placeholder="Painter Mobile" onKeyPress="return tabE(this,event)">
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Painter Secondary Mobile</label>
                  <input type="text" class="form-control" name="PainterSecondaryMobile" id="PainterSecondaryMobile" placeholder="Painter Mobile" onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Painter GST No</label>
                  <input type="text" class="form-control" name="GstNo" id="GstNo" placeholder="Painter GST No" onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Painter Address</label>
                  <textarea class="form-control" name="PainterAddress" id="PainterAddress" placeholder="Painter Addres" onKeyPress="return tabE(this,event)"></textarea>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Painter State</label>
                <select class="form-control" id="Painterstate" name="Painterstate" onKeyPress="return tabE(this,event)">
				<option selected="selected">Select the State</option>
				  <option >TAMILNADU</option>
                  <option>KERALA</option>
				  <option>ANDHRA PRADESH</option>
				  <option>KARNATAKA</option>
				  <option>MAHARASHTRA</option>
				  <option>MADHYA PRADESH</option>
				  <option>UTTAR PRADESH</option>
				  <option>RAJASTHAN</option>
				  <option>BIHAR</option>
				  <option>ODISSA</option>
				  <option>JAMMU & KASHMIR</option>
				  <option>ASSAM</option>
				  <option>HARYANA</option>
				  <option>ARUNACHAL PRADESH</option>
				  <option>GUJARAT</option>
				  <option>CHHATTISGARH</option>
				  <option>GOA</option>
				  <option>HIMACHAL PRADESH</option>
				  <option>JHARKHAND</option>
				  <option>MANIPUR</option>
				  <option>MEGHALAYA</option>
				  <option>MIZORAM</option>
				  <option>NAGALAND</option>
				  <option>PUNJAB</option>
				  <option>SIKKIM</option>
				  <option>TELANGANA</option>
				  <option>TRIPURA</option>
				  <option>UTTARAKHAND</option>
				  <option>WEST BENGAL</option>
				</select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Painter City</label>
                  <input type="text" class="form-control" name="PainterCity" id="PainterCity" placeholder="Painter City" onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Email ID</label>
                 <input type="email" class="form-control" name="PainterEmail" id="PainterEmail" placeholder="Email ID" onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="hidden">
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplying Brand</label>
                  <select class="form-control" id="sbrand" name="sbrand" onKeyPress="return tabE(this,event)">
				  <option value="">--Select The Brand--</option>
				  <?php 
				  $ssc="select * from m_spare_brand where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['sid']; ?>"><?php echo $FEssc['sbrand']; ?></option>
				  <?php } ?>
				  </select>
                </div>  </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Description</label>
                  <textarea class="form-control" name="sdescription" id="sdescription" placeholder="Description" onKeyPress="return tabE(this,event)"></textarea>
                </div>
				
				
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Opening Balance</label>
                 <input type="text" class="form-control" name="opening_balance" id="opening_balance" placeholder="Opening Balance" onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Ledger Group</label>
				  <select class="form-control" name="ledger_group" id="ledger_group" onKeyPress="return tabE(this,event)">
				  <?php
				  $lg="select * from m_ledger_group where id='23'";
				  $lgr=mysqli_query($conn,$lg);
				  while($lgroup=mysqli_fetch_array($lgr))
				  {
				  ?>
				 
				  <option value="<?php echo $lgroup['id'];?>"><?php echo $lgroup['ledger_group'];?></option>
				  <?php
				  }
				  ?>
				  </select>
                </div>
				
				
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" onClick="return confirm('Are You Sure Want to Save?');">Submit</button>
                </div>    
         </div>
    </form>
	</section>
    <!-- /.content -->
	
	  <section class="content container-fluid">
       
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>S.No</th>
                  <th>Painter Name</th>
				  <th>Mobile 1</th>
				  <th>City</th>
				  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from  m_painters_master where status='Active' order by Id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo $FEss['PainterName'];  ?></td>
				  <td><?php  echo $FEss['PainterMobile']; ?></td>
				  <td><?php  echo $FEss['PainterCity']; ?></td>
				  <td><?php  echo $FEss['status']; ?></td>
				  <td><a href="m_painter_edit.php?Id=<?php  echo $FEss['Id']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a> 
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
<div class="control-sidebar-bg"></div>
  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("../../footer.php"); ?>
  <!--footer End-->
    <div class="control-sidebar-bg"></div>
</div>
 <?php include("../../includes_db_js.php"); ?>
 

 
</body>
</html>
