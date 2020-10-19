<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");


$pagename="cash_hand_over.php";
 $spno="SELECT * FROM `t_role_pages` where role_id='".$_SESSION['role_name']."' and pageno IN (SELECT id FROM `t_lmenu`where url like '%$pagename') ORDER BY `id` ASC";
$Espno=mysqli_query($conn,$spno);
$FEspno=mysqli_fetch_array($Espno);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
 
 <script>
 function getExpType():
 {
	var  
 }
 </script>
  
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
        Cash Hand Over
        <small> <?php if(!isset($_REQUEST['msg'])==''){ ?> <span class="alert alert-danger"> <?php echo $_REQUEST['msg']; ?> </span><?php } ?></small>
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
   <script>
   function getExpType(val) {
	$.ajax({
	type: "POST",
	url: "get_entry.php",
	data:'country_id='+val,
	success: function(data){
		$("#PettyType").html(data);
		}
		});
		}
		
// function getbank(val) {
	// var PaymentMode = document.getElementById('PaymentMode').value;
	
	// $.ajax({
	// type: "POST",
	// url: "get_Accounts.php",
	// data: {PaymentMode: PaymentMode},
	// success: function(data){
		// $("#cdetails").html(data);
		// }
		// });
		// }	
function getCash(val) {
	var LedgerGroup = document.getElementById('LedgerGroup').value;
	
	$.ajax({
	type: "POST",
	url: "get_cash.php",
	data: {LedgerGroup: LedgerGroup},
	success: function(data){
		$("#PettyType").html(data);
		}
		});
		}	
		
function getamount(){ 
    var qty = 0;
    var inputs = document.getElementById('BankNameT').value;


$.ajax({
      type:'post',
        url:'get_amt.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("BCash").value=msg;
   
       }
 });

}

   </script>
   
    <!-- Main content -->
    
    <!-- /.content -->
	 <section class="content container-fluid">
	    <?php 
					  if($FEspno['CreateData']>'0')
					  {
					  ?>
       <h4><div  align="right"><a href="cash_hand_over_fq.php"><b><i class="fa fa-hand-o-right" aria-hidden="true"></i>	CREATE CASH HAND OVER</b></a></div></h4>
	  <?php } ?>
	  
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
			<?php 
					  if($FEspno['ViewData']>'0')
					  {
					  ?>
               <div class="box-body">
                <div class="form-group col-sm-12" style="overflow:auto">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				 <th>S.No</th>
				 <th>Date</th>
                  <th>Branch Name</th>
				 
				  <th>Amount</th>
				  <th>Description</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from a_hand_over_cash where status='Active' and franchisee_id='".$_SESSION['BranchId']."'";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$set5="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'";
				$Eset5=mysqli_query($conn,$set5);
				$FEset5=mysqli_fetch_array($Eset5); 
				 
					
				 	$i++;
				?>
				<tr>
                  <td><?php echo $i; ?></td>
				 
				  <td><?php  echo date("d-m-Y",strtotime($FEss['CDate'])); ?></td>
				  <td><?php  echo $FEset5['franchisee_name']; ?></td>
				  
				  
				  <td><?php  echo $FEss['camount']; ?></td>
				  <td><?php  echo $FEss['Description']; ?></td>
				  
				  <td>
				       		<?php 
					  if($FEspno['EditData']>'0')
					  {
					  ?>
					  <a  href="cash_hand_over_edit.php?cid=<?php  echo $FEss['id']; ?>" class="btn-box-tool" title="Edit"><i class="fa fa-edit custom-icon1"></i></a>
 <?php } ?>
  		<?php 
					  if($FEspno['DeleteData']>'0')
					  {
					  ?> 
					  <a href="cash_hand_over_delete.php?cid=<?php echo $FEss['id']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a>
           <?php } ?>
					  
					  
                  </td>
                  <?php } ?>
                </tr>
				
                </tbody>
              </table>
                </div>
            </div>
			 <?php } ?>
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
