<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);

$pagename="enquiry_view.php";
 $spno="SELECT * FROM `t_user_pages` where uname='".$_SESSION['user']."' and pageno IN (SELECT id FROM `t_lmenu`where url like '%$pagename') ORDER BY `id` ASC";
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
    Enquiry
        <small>History</small>
      </h1>
	   
    </section>
  
             
			  
    <!-- Main content -->
    <section class="content container-fluid">
      <?php 
					  if($FEspno['CreateData']>'0')
					  {
					  ?>
       <h4><div align="right"><a href="enquiry.php"><b> CREATE NEW ENQUIRY</b></a></div></h4>  
					  <?php } ?>
	    <!-- left column -->
        
           
			
            <!-- /.box-header -->
            <!-- form start -->
					
					 
    
	  	
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
			 
            <div class="box-header">
              <h3 class="box-title">Available Enquiries</h3>
            </div>
            <!-- /.box-header -->
		  <?php 
					  if($FEspno['ViewData']>'0')
					  {
					  ?>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
	              <th>S.No</th>
                  <th>Name</th>
				  <th hidden>Company Name</th>
				  <th>Mobile</th>
				  <th hidden>Street</th>
				  <th hidden>City</th>
				  <th hidden>Enquiry Date</th>
				  <th hidden>Next Follow </th>
				  <th hidden>Status</th>
				  <th hidden>Remarks</th>
				  <th hidden>Follow Up</th>
				  <th>Edit</th>
                </tr>
                </thead>
                <tbody>
				<?php
			$ss="select * from  crm_enquiry where Status='Active' and FranchiseeId='".$_SESSION['BranchId']."' order by id desc";
			$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$edcr="select * from crm_enquiry_status where Id='".$FEss['EnquiryStatus']."'";
					$edar=mysqli_query($conn,$edcr);
					$wsxr=mysqli_fetch_array($edar);
					
					$edno="select * from crm_enquiry where Id='".$FEss['CustomerMobile1']."'";
					$edmo=mysqli_query($conn,$edno);
					$wsno=mysqli_fetch_array($edmo);
										
					$i++;
				?>
                <tr>
	               <td><?php  echo $i; ?></td>
				  <td><?php  echo $FEss['CustomerFirstName'];  ?></td>
				  <td hidden><?php  echo $FEss['CompanyName'];?></td>
				  <td><?php  echo $FEss['CustomerMobile1']; ?></td>
				  <td hidden><?php  echo $FEss['CustomerStreet']; ?></td>
				  <td hidden><?php  echo $FEss['CustomerCity']; ?></td>
				  <td hidden><?php  echo $FEss['EnquiryDate']; ?></td>
				  <td hidden><?php  echo $FEss['NextFollowDate']; ?></td>
				  <td hidden><?php  echo $wsxr['EnquiryStatus']; ?></td>
				  <td hidden><?php  echo $FEss['Description']; ?></td>
				  <td hidden><a href="enquiry_follow.php?Id=<?php  echo $FEss['Id']; ?>" class="btn-box-tool" Onclick="return confirm('Are You Sure Want To Proceed?')"><i class="fa fa-user-plus custom-icon1" style="font-size:24px;color:red"></i></a> 
				      <a href="sms_service.php?CustomerMobile1=<?php echo $FEss['CustomerMobile1'];?>" class="btn-box-tool" Onclick="return confirm('Are You Sure Want To proceed?')"><font color=blue size='5'>SMS</font></a>
				</td>
               
                  <td>
				  		<?php 
					  if($FEspno['EditData']>'0')
					  {
					  ?>
                   <td><a href="enquiry_edit.php?Id=<?php  echo $FEss['Id']; ?>" class="btn-box-tool" Onclick="return confirm('Are You Sure Want To Proceed?')"><font color=blue size='5'>Edit</font></a>
					  <?php }	 ?>

                  </td>
				 
                </tr>
				<?php } ?>
                  </tbody>
                
              </table>
            </div>
				<?php } ?>
            <!-- /.box-body -->
          </div>
            
          
        </div>
      </div>
	        			

     
	  
	
    </section>
    <!-- /.content -->
  
  </div>
 
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
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