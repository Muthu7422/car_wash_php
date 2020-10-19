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
        Lead
        <small>Process</small>
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
 function fnGetDistrict() {
		var spare_brand = document.getElementById('CustomerState').value;
			$.ajax({
	type: "POST",
	url: "get_district.php",
	data:'country_id='+spare_brand,
	success: function(data){
		$("#CustomerDistrict").html(data);
		}
		});
		} 
</script>	 
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="status_enquiry.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
             <div class="box-body">
				<div class="form-group col-sm-4">
                  <label for="Branch">Status</label>
                 <select type="text" class="form-control" name="EnquiryStatus" id="EnquiryStatus" onKeyPress="return tabE(this,event)" required>
				 <option value="">---Select The Customer Status----</option>
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
			<!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
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
				<div style="overflow:auto">
                <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
				  <th>S.No</th>
                  <th>Customer Name</th>
				  <th hidden>Company Name</th>
				  <th>Mobile</th>
				  <th>E-mail</th>

				  <th>Follow Up</th>
                </tr>
                </thead>
                <tbody>
				
				 <?php 
	  if(isset($_POST['EnquiryStatus']))
	  {
		$ss="select * from  crm_enquiry where Status='Active' and EnquiryStatus='".$_POST["EnquiryStatus"]."' and FranchiseeId='".$_SESSION['FranchiseeId']."' order by id desc";  
	  }
	  else
	  {
		  $ss="select * from  crm_enquiry where Status='Active' and FranchiseeId='".$_SESSION['FranchiseeId']."'  order by id desc";   
	  }
				
				
				
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$ses="select * from crm_enquiry_status where Id='".$FEss['EnquiryStatus']."'";
					$Eses=mysqli_query($conn,$ses);
					$FEses=mysqli_fetch_array($Eses);
					
					$i++;
					
				?>
                
				 <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo $FEss['CustomerFirstName'];  ?></td>
				  <td hidden><?php echo $FEss['CompanyName'];  ?></td>
				  <td><?php  echo $FEss['CustomerMobile1']; ?></td>
				  <td><?php  echo $FEss['CustomerEmailID']; ?></td>
				
				<td><a href="enquiry_follow.php?Id=<?php  echo $FEss['Id']; ?>" class="btn-box-tool" Onclick="return confirm('Are You Sure Want To Proceed?')"><i class="fa fa-user-plus custom-icon1" style="font-size:24px;color:red"></i></a> 
				<a href="sms_service.php?CustomerMobile1=<?php echo $FEss['CustomerMobile1'];?>" class="btn-box-tool" Onclick="return confirm('Are You Sure Want To proceed?')"><font color=blue size='5'>SMS</font></a>
				</td>
                  
                </tr>
				<?php } ?>
                </tbody>
              </table>
                </div>
				 </div>
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	      
         </div>

	</section>
	<?php ?>
	
	
	
	
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
