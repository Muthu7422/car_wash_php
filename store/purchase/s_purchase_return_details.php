<?php
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
      <h1>Purchase Retuen <small>Store</small></h1>
	  
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
function Delete_Click() {
    var strconfirm = confirm("Are you sure you want to delete?");
    if (strconfirm == true) {
        return true;
    }
	else
		return false;
}  


function spare(){ 
    var qty = 0;
    var inputs = document.getElementById('spare_name').value;


$.ajax({
      type:'post',
        url:'get.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("spart_no").value=msg;
   
       }
 });

}

function spare1(){ 
    var qty = 0;
    var inputs = document.getElementById('spare_name').value;


$.ajax({
      type:'post',
        url:'get1.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("prate").value=msg;
   
       }
 });

}

function outstanding(){ 
    var qty = 0;
    var inputs = document.getElementById('supplier_name').value;
	
$.ajax({
      type:'post',
        url:'get_outstanding.php',// put your real file name //data: {inputs: inputs,pno: pno,pdate:pdate},
       data:{inputs},
		//data:{inputs},
		dataType    : 'json',
        success:function(msg){
              // your message will come here.  
        document.getElementById("out").value=msg[0];
       
       }
 });

}



function supplier(){ 
    var qty = 0;
    var inputs = document.getElementById('supplier_name').value;


$.ajax({
      type:'post',
        url:'get2.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("out").value=msg;
   
       }
 });

}
  
function spare_name(val) {
	$.ajax({
	type: "POST",
	url: "spare_name.php",
	data:'country_id='+val,
	success: function(data){
		$("#sparename").html(data);
		}
		});
		}
  function spare_part(val) {
	$.ajax({
	type: "POST",
	url: "spare_part.php",
	data:'country_id='+val,
	success: function(data){
		$("#spart_no").html(data);
		}
		});
		}
		
		
		
function spare_rate(){ 
    var qty = 0;
    var inputs = document.getElementById('spart_no').value;
	
$.ajax({
      type:'post',
        url:'get_spartno.php',// put your real file name //data: {inputs: inputs,pno: pno,pdate:pdate},
       data:{inputs},
	   dataType: 'json',
		//data:{inputs},
        success:function(msg){
              // your message will come here.  
       // document.getElementById("spartno").value=msg[0];
		document.getElementById("prate").value=msg[1];
       }
 });

}


function gettot($i)
{
input1=0;
input2=0;

var amt = document.getElementById('prate'+$i+'').value;
var qty = document.getElementById('qty'+$i+'').value;

var input1=amt*qty;

document.getElementById('total'+$i+'').value=input1;
document.getElementById('qtys').value=qty;
document.getElementById('totals').value=input1;
}
		
</script>	 
   <?php 
    $Spm="select * from s_purchase where inv_no='".$_REQUEST['inv_no']."'"; 
          $Sdm=mysqli_query($conn,$Spm);
		  $count=mysqli_fetch_array($Sdm);
   ?>
    <!-- Main content -->
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Purchase Returns</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>S:No</th>
				<th>Invoice No</th>
				<th>Date</th>
				<th>Supplier Name</th>
               <th>Items</th>
			   <th>Retuen Qty</th>
                  
                </tr>
                </thead>
                <tbody>
				<?php
				$ct="select * from s_purchase_return where FrachiseeId='".$_SESSION['FranchiseeId']."' and inv_no='".$_REQUEST['inv_no']."'";
				$Ect=mysqli_query($conn,$ct);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
					$edc="select * from  m_spare where sid='".$Fct['sname']."'";
					$eds=mysqli_query($conn,$edc);
					$was=mysqli_fetch_array($eds);
					
					$edc1="select * from  m_supplier where sid='".$Fct['supplier_name']."'";
					$eds1=mysqli_query($conn,$edc1);
					$was1=mysqli_fetch_array($eds1);
					
					
				$i++;
				?>
                <tr>
                 <td><?php echo $i; ?></td>
                 <td><?php echo $Fct['inv_no']; ?></td>
				 <td><?php echo $Fct['rdate']; ?></td>
				<td><?php echo $was1['sname']; ?></td>
				<td><?php echo $was['sname']; ?></td>
				<td><?php echo $Fct['return_qty']; ?></td>
                </tr>
				<?php
				}
				?>
                  </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
            
          
        </div>
     
	 

    <!-- /.content -->
   <?php include("../../footer.php"); ?>
  </div>
	

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
