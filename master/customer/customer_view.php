<?php
error_reporting(0);
session_start();
include("../../includes.php");
include("../../redirect.php");

$pagename="customer_view.php";
 $spno="SELECT * FROM `t_role_pages` where role_id='".$_SESSION['role_name']."' and pageno IN (SELECT id FROM `t_lmenu`where url like '%$pagename') ORDER BY `id` ASC";
$Espno=mysqli_query($conn,$spno);
$FEspno=mysqli_fetch_array($Espno);

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
        Customer List
        <small>Master</small>
      </h1>
     </section>
	  <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
                <strong>Customer Entry Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			  <div class="alert alert-danger">
              <b> Customer Entry Deleted Successfully!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  <?php if($_REQUEST['a']!="") {?> 
			  <div class="alert alert-warning">
                 Customer <b>already</b> exist! <i class="fa fa-warning" style="font-size:30px;color:white"></i>
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
  
  function fnCustomerDetails($i){ 
    var inputs = document.getElementById('VehicleModel'+$i+'').value;


$.ajax({
      type:'post',
        url:'ajax_customer.php',// put your real file name 
        data:{inputs},
		dataType: 'json',
        success:function(msg){
              // your message will come here.  
        document.getElementById('VehicleBrand'+$i+'').value=msg[0];
		document.getElementById('VehicleSegment'+$i+'').value=msg[1];
		document.getElementById('VehicleType'+$i+'').value=msg[2];
		document.getElementById('VehicleModelId'+$i+'').value=msg[3];

       }
 });

}
  
  
</script> 


    <!-- Main content -->
    <section class="content container-fluid">
          <section class="content container-fluid">
      <?php 
					  if($FEspno['CreateData']>'0')
					  {
					  ?>
       <h4><div align="right"><a href="customer.php"><b> CREATE NEW CUSTOMER</b></a></div></h4>  
					  <?php } ?>
      <div class="row">
        <!-- left column -->
		
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Customers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			  <?php 
					  if($FEspno['ViewData']>'0')
					  {
					  ?>
              <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
                <th>S.No</th>
                  <th>Cust Name</th>
				    <th>Vehicle No</th>
				  <th>Mobile No1</th>
				  <th style="display:none">Outstanding Amount</th>
				  <th>Status</th>
				   <th>Create Job Card</th>
				  <th style="text-align:center">Action </th>
				  <th style="text-align:center">View </th>
				   <th style="display:none"> Customer Transaction</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ct="select id,cust_name,mobile1,cus_out_amt,status from a_customer where status='Active' and FrachiseeId='".$_SESSION['BranchId']."' order by id desc ";
				$Ect=mysqli_query($conn,$ct);
				$n=mysqli_num_rows($Ect);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))				{
					
					$ssc="select vehicle_no from a_customer_vehicle_details where cust_no='".$Fct['id']."'";
						$Essc=mysqli_query($conn,$ssc);
						$FEssc=mysqli_fetch_array($Essc);
				$i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $Fct['cust_name']; ?></td>
				   <td><?php echo $FEssc['vehicle_no']; ?></td>
				  <td><?php echo $Fct['mobile1'];  ?></td>
				  <td style="display:none"><?php echo $Fct['cus_out_amt'];  ?></td>
				  <td><?php echo $Fct['status'];  ?></td>
				  	<?php 
					  if($FEspno['EditData']>'0')
					  {
					  ?>
				   <td>
                      <a href="../../services/job_card/s_jobcard.php?mobile1=<?php echo $Fct['mobile1']; ?>&temp=del" onClick="return confirm('Are You Sure Want to Proceed?');" class="btn-box-tool"><i class="fa fa-wrench" style="font-size:23px"></i></a> 
                     
                  </td>
				 
				  <td>
                      <a href="customer_edit.php?id=<?php echo $Fct['id']; ?>" onClick="return confirm('Are You Sure Want to edit?');" class="btn-box-tool" title="Edit Customer"><i class="fa fa-edit custom-icon1" style="font-size:23px"></i></a> 
                      
                 
				  	<?php
				}
				?>
				 	<?php 
					  if($FEspno['DeleteData']>'0')
					  {
					  ?>
								<a href="customer_delete.php?id=<?php echo $Fct['id']; ?>" onClick="return confirm('Are You Sure Want to Delete?');" class="btn-box-tool" title="Edit Customer"><i class="fa fa-close custom-icon1" style="font-size:23px"></i></a> 
	  	 </td>
		<?php
				}
				?>
				<td >
                 <a href="customer_details_view.php?id=<?php echo $Fct['id']; ?>"   class="btn-box-tool"><i class="fa fa-eye custom-icon1"></i></a>
                  </td>
				  <td style="display:none">
                 <a href="customer_full_details.php?id=<?php echo $Fct['id']; ?>"  onclick="return confirm('Are You Sure Want to View?');" class="btn-box-tool"><i class="fa fa-angle-double-right" style="font-size:20px;color:Black"></i></a>
                  </td>
                </tr>
				<?php
				}
				?>
                  </tbody>
                
              </table>
			  	<?php
				}
				?>
            </div>
            <!-- /.box-body -->
          </div>
            
          
        </div>
      </div>

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