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
        Lead Follow Up
        
      </h1>
     </section>
<div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
                <strong>Customer Enquiry Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			  <div class="alert alert-danger">
              <b> Customer Enquiry Deleted Successfully!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  <?php if($_REQUEST['a']!="") {?> 
			  <div class="alert alert-warning">
                 Customer Enquiry <b>already</b> exiting! <i class="fa fa-warning" style="font-size:30px;color:white"></i>
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
    <form role="form" method="post" action="enquiry_follow_act.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			  <?php
			  $edy="select * from s_job_card where customer_id='".$_REQUEST['Id']."'";
			  $dyg=mysqli_query($conn,$edy);
			  $fcf=mysqli_fetch_array($dyg); 
			 ?>
			  
                <div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
                  <input type="text" class="form-control" name="CustomerFirstName" id="CustomerFirstName" value="<?php echo $fcf['sname'] ?>" placeholder="Customer Name" onKeyPress="return tabE(this,event)" readonly required>
				<input type="text" class="form-control hidden" name="CustomerId" id="CustomerId" value="<?php echo $_REQUEST['Id']; ?>"  onKeyPress="return tabE(this,event)" readonly required>
   				<input type="text" class="form-control hidden" name="RefNo" id="RefNo" value="<?php echo $_REQUEST['RefNo']; ?>"  onKeyPress="return tabE(this,event)" readonly required>
				</div>
				
				<div class="form-group col-sm-4" hidden>
                  <label for="Branch">Company Name</label>
                  <input type="text" class="form-control" name="CompanyName" id="CompanyName" value="<?php echo $fcf['CompanyName'] ?>" placeholder="Customer Name" onKeyPress="return tabE(this,event)">
				<input type="text" class="form-control hidden" name="CompanyName" id="CompanyName" value="<?php echo $fcf['Id']; ?>"  onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Enquiry Date</label>
				  <input type="text" class="form-control" name="EnquiryDate" id="EnquiryDate" value="<?php echo date("Y-m-d") ?>" onKeyPress="return tabE(this,event)" readonly required>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Related To Service</label>
                 <textarea type="text" class="form-control" name="RelatedToService" id="RelatedToService" placeholder="Related To Service" onKeyPress="return tabE(this,event)" readonly="true"><?php echo $_REQUEST['stype']; ?></textarea>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Remarks</label>
                 <textarea type="text" class="form-control" name="Remarks" id="Remarks" placeholder="Remarks" onKeyPress="return tabE(this,event)"></textarea>
                </div> 
				</div>
				  
			<div class="box-body">
				<div class="form-group col-sm-4" hidden>
                  <label for="Branch">Call Purpose</label>
				 <select type="text" class="form-control" name="CallPurpose" id="CallPurpose" onKeyPress="return tabE(this,event)" >
				 <option value="">---None---</option>
                 <?php
				 $edc="select * from crm_callpurpose where Status='Active'";
				 $esx=mysqli_query($conn,$edc);
				 while($waz=mysqli_fetch_array($esx))
				 {
				 ?>
				 <option value="<?php echo $waz['Id']; ?>"><?php echo $waz['CallPurpose']; ?></option>
				 <?php
				 }
				 ?>
				 </select>
				 </div>
				  
				 <div class="form-group col-sm-4"hidden>
                  <label for="Branch">Related To</label>
				 <select type="text" class="form-control" name="RelatedTo" id="RelatedTo" onKeyPress="return tabE(this,event)" >
				 <?php
				 $edc="select * from crm_relatedto where Status='Active'";
				 $esx=mysqli_query($conn,$edc);
				 while($waz=mysqli_fetch_array($esx))
				 {
				 ?>
				 <option value="<?php echo $waz['Id']; ?>"><?php echo $waz['RelatedTo']; ?></option>
				 <?php
				 }
				 ?>
				 </select>
			  </div>	
				</div>
			
			<div class="box-body">		
				<div class="form-group col-sm-4">
                  <label for="Branch">Next Appointment</label>
                 <input type="date" class="form-control" name="NextAppointment" id="NextAppointment" onKeyPress="return tabE(this,event)" required>
                </div>
			
				<div class="form-group col-sm-4">
                  <label for="Branch">Status</label>
                 <select type="text" class="form-control" name="EnquiryStatus" id="EnquiryStatus" onKeyPress="return tabE(this,event)" required>
				 <?php
				 $edc="select * from crm_enquiry_status where Status='Active'";
				 $esx=mysqli_query($conn,$edc);
				 while($waz=mysqli_fetch_array($esx))
				 {
				 ?>
				 <option value="<?php echo $waz['Id']; ?>"><?php echo $waz['EnquiryStatus']; ?></option>
				 <?php
				 }
				 ?>
				 </select>
                </div>
            </div>
		
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
                  <th>Enquiry Date</th>
				  <th>Next Appointment</th>
				  <th>Remarks</th>
				  <th>Lead Status</th>
				 </tr>
                </thead>
                <tbody>

				<?php
			    $ss="select * from  crm_folllowup where CustomerId='".$_REQUEST['Id']."'  order by id desc";
				$Ess=mysqli_query($conn,$ss); 
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{				
					$edcr1="select * from s_job_card where Id='".$FEss['customer_id']."'";
					$edar1=mysqli_query($conn,$edcr1);
					$wsxr1=mysqli_fetch_array($edar1);
					
					$ses="select * from crm_enquiry_status where Id='".$FEss['EnquiryStatus']."'";
					$Eses=mysqli_query($conn,$ses);
					$FEses=mysqli_fetch_array($Eses);
														
					$i++; 
				?>
				
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo date("d-m-Y", strtotime($FEss['EnquiryDate'])); ?></td>
				  <td><?php  echo date("d-m-Y", strtotime($FEss['NextFollowDate'])); ?></td>
				  <td><?php  echo $FEss['Remarks']; ?></td>
				  <td><?php  echo $FEses['EnquiryStatus']; ?></td>                 
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
