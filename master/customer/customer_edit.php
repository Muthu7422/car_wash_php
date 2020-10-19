<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);

$abc1="select * from master_vehicle";
$abcd1=mysqli_query($conn,$abc1);
$Brand="[";
while($ac1=mysqli_fetch_array($abcd1))
{
	$st=$ac1['VehicleModel'];
	 $Brand.="'$st',";
}
 $Brand.="]";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
    <script>
$(function() {

  $('#customer_name').keydown(function (e) {
  
    if (e.shiftKey || e.ctrlKey || e.altKey) {
    
      e.preventDefault();
      
    } else {
    
      var key = e.keyCode;
      
      if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
      
        e.preventDefault();
        
      }

    }
    
  });
  
});
</script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/proCustom.css">    
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.css">
  
    <!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|-->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		<link rel="stylesheet" type="text/css" href="http://localhost/popup/popup-window.css" />
<script type="text/javascript" src="http://localhost/popup/jquery/jquery.js"></script>
<script type="text/javascript" src="http://localhost/popup/popup-window.js"></script>
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
function fnCustomerDetails($j){ 
    var inputs = document.getElementById('VehicleModel'+$j+'').value;


$.ajax({
      type:'post',
        url:'ajax_customer.php',// put your real file name 
        data:{inputs},
		dataType: 'json',
        success:function(msg){
              // your message will come here.  
        document.getElementById('VehicleBrand'+$j+'').value=msg[0];
		document.getElementById('VehicleSegment'+$j+'').value=msg[1];
		document.getElementById('VehicleType'+$j+'').value=msg[2];
		document.getElementById('VehicleModelId'+$j+'').value=msg[3];

       }
 });

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
        Customer Entry
        <small>Master</small>
      </h1>
     </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Customer Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?php
			
			
			$ct1="select * from a_customer where id='".$_REQUEST['id']."'";
				$Ect1=mysqli_query($conn,$ct1);
				$Fct1=mysqli_fetch_array($Ect1);
				$n=mysqli_num_rows($Ect1);
			?>
            <form class="form-horizontal" method="post" action="customer_edit_act.php?id=<?php echo $Fct1['id']; ?>">
			
			<h4 class="box-title">Billing Details |</h4> 
			
              <div class="box-body">
			  
			  		<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Company</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="company_name" autofocus="autofocus"  id="company_name" value="<?php echo  $Fct1['company_name']  ?>" placeholder="Company" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" >
                      </div>
                    </div> 
                  
                <div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">Customer Id</label>
                  <div class="col-sm-8">
                 <input type="text" class="form-control" name="customer_no"  id="customer_no"  value="<?php echo $Fct1['cust_no']; ?>" placeholder="Customer Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required>
                  </div>
                </div>
				<?php
				$ss="select * from m_vendor where id='".$Fct1['FrachiseeId']."'";
				$Edc=mysqli_query($conn,$ss);
				$Fcd=mysqli_fetch_array($Edc);
				
				?>
				 <div class="form-group" hidden>
                      <label for="catname" class="col-sm-3 control-label">Frachisee Name</label>
                      <div class="col-sm-8">
                        <input  class="form-control"  value="<?php echo $Fcd['franchisee_name']; ?>"  readonly>
                      </div>
                    </div>
                <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">First Name</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="customer_name" autofocus="autofocus" id="customer_name" value="<?php echo $Fct1['cust_name']; ?>" placeholder="Customer Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required>
                      </div>
                    </div>
					    <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Last Name</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="lname" autofocus="autofocus" id="lname" value="<?php echo $Fct1['last_name']; ?>" placeholder="Last Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required>
                      </div>
                    </div>
					<div class="form-group hidden">
                      <label for="catname" class="col-sm-3 control-label">Customer GSTIN No</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="GSTN" autofocus="autofocus" id="GSTN" value="<?php echo $Fct1['GSTN']; ?>" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" >
                      </div>
                    </div>
				<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Address</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="address" autofocus="autofocus" id="address" value="<?php echo $Fct1['addr']; ?>" placeholder="Address" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" >
                      </div>
                    </div>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">City</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="city" autofocus="autofocus" id="city" value="<?php echo $Fct1['city']; ?>" placeholder="City" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                      </div>
                    </div> 
							<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">State</label>
                      <div class="col-sm-8">
                      <select class="form-control" id="state" name="state" >
						<?php 
						$ssc1="select * from tbl_state";
						$Essc1=mysqli_query($conn,$ssc1);
						while($FEssc1=mysqli_fetch_array($Essc1))
						{
						?>
						
						<?php
						if($FEssc1['id']==$Fct1['state'])
						{
						?>
						<option value="<?php echo $FEssc1['id']; ?>" selected="true"><?php echo $FEssc1['StateName']; ?></option>
						<?php 
						}
						else
						{
							
						?>
						<option value="<?php echo $FEssc1['id']; ?>"><?php echo $FEssc1['StateName']; ?></option>
						<?php } } ?>
				  </select>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Pin Code</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="pincode" autofocus="autofocus" id="pincode" value="<?php echo $Fct1['pincode']; ?> " placeholder="Pin Code" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Primary Phone Mobile</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="mobile1" autofocus="autofocus" id="mobile1" value="<?php echo $Fct1['mobile1']; ?>" placeholder="Primary Phone Mobile" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" >
                      </div>
                    </div>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Secondary Phone Mobile</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="mobile2" autofocus="autofocus" id="mobile2" value="<?php echo $Fct1['mobile2']; ?>" placeholder="Mobile No2" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Email Id</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="email" autofocus="autofocus" id="email" value="<?php echo $Fct1['email']; ?>" placeholder="Email Id" onKeyPress="return tabE(this,event)">
                      </div>
                    </div>
					
					<h4 class="box-title">Shipping Details |</h4> 

					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Customer Name</label>

                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="s_customer_name"  id="s_customer_name" value="<?php echo $Fct1['s_cust_name']?>"; placeholder="Customer Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" >
                      </div>
                    </div>
				
                <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Address</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="s_address" autofocus="autofocus" id="s_address" value="<?php echo $Fct1['s_addr']; ?>" placeholder="Address" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">City</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="s_city" autofocus="autofocus" id="s_city" value="<?php echo $Fct1['s_city']; ?>" placeholder="City" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                      </div>
                    </div> 
				<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">State</label>
                      <div class="col-sm-8">
                      <select class="form-control" id="s_state" name="s_state" >
						<?php 
						$ssc1="select * from tbl_state";
						$Essc1=mysqli_query($conn,$ssc1);
						while($FEssc1=mysqli_fetch_array($Essc1))
						{
						?>
						
						<?php
						if($FEssc1['id']==$Fct1['s_state'])
						{
						?>
						<option value="<?php echo $FEssc1['id']; ?>" selected="true"><?php echo $FEssc1['StateName']; ?></option>
						<?php 
						}
						else
						{
							
						?>
						<option value="<?php echo $FEssc1['id']; ?>"><?php echo $FEssc1['StateName']; ?></option>
						<?php } } ?>
				  </select>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Pin Code</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="s_pincode" autofocus="autofocus" id="s_pincode" value="<?php echo $Fct1['s_pincode']; ?> " placeholder="Pin Code" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Primary Phone Mobile</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="s_mobile1"   id="s_mobile1" pattern="^\d{10}$" value="<?php echo $Fct1['s_mobile1']; ?>" placeholder="Primary Phone Mobile" onKeyPress="return tabE(this,event)" >
                      </div>
                    </div>
				
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Email Id</label>
                      <div class="col-sm-8">
                        <input type="email" class="form-control" name="s_email" autofocus="autofocus" id="s_email" placeholder="Email Id" value="<?php echo $Fct1['s_email']; ?>" onKeyPress="return tabE(this,event)" >
                      </div>
                    </div> 
					
					            <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">GST Number</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="gst" autofocus="autofocus" id="gst" value="<?php echo $Fct1['gst']; ?>" placeholder="GST Number" style="text-transform:uppercase" onKeyPress="return tabE(this,event)" >
                      </div>
                    </div> 
					
					<?php
				$sto="select ad_amount from cust_outstanding where cust_name='".strtoupper($Fct1['cust_name'])."' order by id desc";
				$Esto=mysqli_query($conn,$sto);
				$nr=mysqli_num_rows($Esto);
				if($nr>'0')
				{
					$FEsto=mysqli_fetch_array($Esto);
					$ttlos=$FEsto['ad_amount'];
				}
				else
				{
					$ttlos=0;
				}

				?>

					
					<div class="form-group hidden">
                      <label for="catname" class="col-sm-3 control-label">Customer Outstanding Amount</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="cus_out_amt" autofocus="autofocus" id="cus_out_amt" value="<?php echo $ttlos; ?>" placeholder="Customer Outstanding Amount" onKeyPress="return tabE(this,event)" >
                      </div>
                    </div> 
                    <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Status</label>
                      <div class="col-sm-8">
                      <select name="status" class="form-control">
				      <option value="<?php echo $Fct1['status']; ?>" selected="true"><?php echo $Fct1['status']; ?></option>
					  <option value="Active">Active</option>
					  <option value="Deactive">Deactive</option>
				      </select>
                      </div>
                    </div> 					
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Member Ship</label>
                      <div class="col-sm-8">
                      <select class="form-control" id="Membership" name="Membership" >
						<?php 
						$ssc="select * from membership where status='Active'";
						$Essc=mysqli_query($conn,$ssc);
						while($FEssc=mysqli_fetch_array($Essc))
						{
						?>
						
						<?php
						if($FEssc['id']==$Fct1['MemberShip'])
						{
						?>
						<option value="<?php echo $FEssc['id']; ?>" selected="true"><?php echo $FEssc['MemberShip']; ?></option>
						<?php 
						}
						else
						{
							
						?>
						<option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['MemberShip']; ?></option>
						<?php } } ?>
				  </select>
                      </div>
                    </div>
					
					  <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Ledger Group</label>
                      <div class="col-sm-8">
				  <select class="form-control" name="ledger_group" id="ledger_group" onKeyPress="return tabE(this,event)">
				  <?php
				  $lg="select * from m_ledger_group where id='26'";
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
				  <div class="form-group hidden">
				   <label for="catname" class="col-sm-3 control-label">Customer Ledger Id</label>
                      <div class="col-sm-8">
                  
                 <input type="text" class="form-control" name="LedgerId" id="LedgerId" placeholder="Customer Ledger Id" value="<?php echo $Fct1['LedgerId']; ?>" onKeyPress="return tabE(this,event)">
                </div>
				 </div>
							
           <div class="col-md-12">
          <div class="box box-danger" style="aling:center">
            <div class="box-header">
              <h3 class="box-title">Vehicle Entry</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding" style="overflow:auto;">
              <table class="table-bordered padding-4 disp" style="width:100%;height:20px;">
			  <thead>
                <tr>
                  <th style="width:  30px">S:No</th>
				  <th style="width: 180px">Model</th>
                  <th style="width:  50px">Brand</th>
				  <th style="width: 180px">Segment</th>
                  <th style="width:  50px">Type</th>
                  <th style="width: 180px">Vehicle No</th>
                  <th style="width: 180px">Insurance company Name</th>
                  <th style="width: 150px">Insurance Number</th>
                  <th style="width:  5px">Insurance Expiry Date</th>
				  <th style="width:  50px">Action</th>
                </tr>
				</thead>
				<?php
				$sv="select * from a_customer_vehicle_details where cust_no='".$Fct1['id']."'";
				$Esv=mysqli_query($conn,$sv);
				$nr=mysqli_num_rows($Esv);
				$j=0;
				while($FEsv=mysqli_fetch_array($Esv))
				{
					 $d="select * from master_vehicle where Id='".$FEsv['VehicleModel']."'"; 
				    $dd=mysqli_query($conn,$d);
				    $brand=mysqli_fetch_array($dd); 
					

					
					$j++;		
					?>
			    <tr>
                <td style="width:30px"><?php echo $j; ?>
                <input name="<?php echo "id".$j; ?>" id="<?php echo "id".$j; ?>"  type="hidden" value="<?php echo $FEsv['id']; ?>">
				</td>
					
				 <td style="width: 180px"><input name="<?php echo "VehicleModel".$j; ?>" id="<?php echo "VehicleModel".$j; ?>" type="text" value="<?php echo $brand['VehicleModel']." - ".$brand['Id']; ?>"  onKeyPress="return tabE(this,event)" onblur="fnCustomerDetails(<?php echo $j; ?>)" class="form-control" style="text-transform:uppercase"></td>
				 <td class="hidden"><input name="<?php echo "VehicleModelId".$j ?>"  id="<?php echo "VehicleModelId".$j ?>" size="4" type="text" value="<?php echo $brand['Id']; ?>"  onKeyPress="return tabE(this,event)" size="2" class="form-control"></td>
         
                <td style="width: 180px"><input name="<?php echo "VehicleBrand".$j; ?>"  id="<?php echo "VehicleBrand".$j; ?>" type="text" value="<?php echo $FEsv['VehicleBrand']; ?>" onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
				 <td style="width: 180px"><input name="<?php echo "VehicleSegment".$j; ?>" id="<?php echo "VehicleSegment".$j; ?>" type="text" value="<?php echo $FEsv['VehicleSegment']; ?>"  onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
                <td style="width: 180px"><input name="<?php echo "VehicleType".$j; ?>"  id="<?php echo "VehicleType".$j; ?>" type="text" value="<?php echo $FEsv['VehicleType']; ?>" onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
                <td style="width: 80px"><input name="<?php echo "vehicle_no".$j; ?>" id="<?php echo "vehicle_no".$j; ?>"  type="text" value="<?php echo $FEsv['vehicle_no']; ?>" onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
				<td style="width: 180px"><input name="<?php echo "InsuranceCompnayName".$j ?>" id="<?php echo "InsuranceCompnayName".$j ?>"  type="text" value="<?php echo $FEsv['InsuranceCompnayName']; ?>"  onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
                <td style="width: 150px"><input name="<?php echo "InsuranceNumber".$j ?>" id="<?php echo "InsuranceNumber".$j ?>" type="text" value="<?php echo $FEsv['InsuranceNumber']; ?>"  onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
                <td style="width: 5px"><input name="<?php echo "InsuranceNumberExpiryDate".$j ?>"  id="<?php echo "InsuranceNumberExpiryDate".$j ?>" type="date" value="<?php echo $FEsv['InsuranceNumberExpiryDate']; ?>" onKeyPress="return tabE(this,event)" class="form-control"></td>
                <td style="width: 180px">
				<select name="<?php echo "status".$j; ?>"  id="<?php echo "status".$j; ?>" class="form-control">
				    <option value="<?php echo $FEsv['status']; ?>" selected="true"><?php echo $FEsv['status']; ?></option>
					<option value="Active">Active</option>
					<option value="Deactive">Deactive</option>
				  </select>
		
				</td>
				

				</tr>
			    <?php 
				}
				for($j=$nr+1;$j<=10;$j++)
				{
				?>
                <tr>
				 <td style="width:30px"><?php echo $j; ?>
				 	
                <td style="width: 180px"><input name="<?php echo "VehicleModel".$j; ?>" id="<?php echo "VehicleModel".$j; ?>" type="text" value="<?php echo $FEsv['VehicleModel']; ?>"  onKeyPress="return tabE(this,event)" onblur="fnCustomerDetails(<?php echo $j; ?>)" class="form-control" style="text-transform:uppercase"></td>
				<td class="hidden"><input name="<?php echo "VehicleModelId".$j ?>"  id="<?php echo "VehicleModelId".$j ?>" size="4" type="text" onKeyPress="return tabE(this,event)" size="2" class="form-control"></td>
         
                <td style="width: 180px"><input name="<?php echo "VehicleBrand".$j; ?>"  id="<?php echo "VehicleBrand".$j; ?>" type="text" value="<?php echo $FEsv['VehicleBrand']; ?>" onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
				 <td style="width: 180px"><input name="<?php echo "VehicleSegment".$j; ?>" id="<?php echo "VehicleSegment".$j; ?>" type="text" value="<?php echo $FEsv['VehicleSegment']; ?>"  onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
                <td style="width: 180px"><input name="<?php echo "VehicleType".$j; ?>"  id="<?php echo "VehicleType".$j; ?>" type="text" value="<?php echo $FEsv['VehicleType']; ?>" onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
                <td style="width: 80px"><input name="<?php echo "vehicle_no".$j; ?>" id="<?php echo "vehicle_no".$j; ?>"  type="text" value="<?php echo $FEsv['vehicle_no']; ?>" onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
				<td style="width: 180px"><input name="<?php echo "InsuranceCompnayName".$j ?>" id="<?php echo "InsuranceCompnayName".$j ?>"  type="text" value="<?php echo $FEsv['InsuranceCompnayName']; ?>"  onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
                <td style="width: 150px"><input name="<?php echo "InsuranceNumber".$j ?>" id="<?php echo "InsuranceNumber".$j ?>" type="text" value="<?php echo $FEsv['InsuranceNumber']; ?>"  onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
                <td style="width: 5px"><input name="<?php echo "InsuranceNumberExpiryDate".$j ?>"  id="<?php echo "InsuranceNumberExpiryDate".$j ?>" type="date" value="<?php echo $FEsv['InsuranceNumberExpiryDate']; ?>" onKeyPress="return tabE(this,event)" class="form-control"></td>
                <td style="width: 180px">
				</td>
				</tr>
				<?php
				}
				?>
	            <input name="va" id="va"  type="hidden" value="<?php echo $nr; ?>">   
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>
					
            
              </div>
              <!-- /.box-body -->
              
                <button type="submit" class="btn btn-default ">Cancel</button>
                <button type="submit" onClick="popup_window_show('#popup_window_id_B2562FB5F3577D989E47A6B8FB6A60D4', { pos : 'window-center', parent : this, x : 0, y : 0, width : 'auto' })" class="btn btn-info pull-right">Save Changes</button>
				
				

              </div>
              <!-- /.box-footer -->
            </form>
			
			
          </div>
        </div>

    </section>
     <!-- /.content -->
  </div>
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
 <script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/



customers = <?php echo $Brand; ?>;

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/


autocomplete(document.getElementById("VehicleModel1"), customers);
autocomplete(document.getElementById("VehicleModel2"), customers);
autocomplete(document.getElementById("VehicleModel3"), customers);
autocomplete(document.getElementById("VehicleModel4"), customers);
autocomplete(document.getElementById("VehicleModel5"), customers);


</script>
</body>
</html>