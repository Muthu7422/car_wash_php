<?php
error_reporting(0);
session_start();
include("../../includes.php");
include("../../redirect.php");

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <?php  include("../../includes_db_css.php"); ?>
   <script type="text/javascript">
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

// function CopyBilling()
// {
	
	//alert("test");
		// var billingtoo =document.getElementById("f-option");

	// if(billingtoo.checked == true)
	// {
	// document.getElementById("customer_name").value=document.getElementById("s_customer_name").value;
	// document.getElementById("address").value=document.getElementById("s_address").value;
	// document.getElementById("city").value=document.getElementById("s_city").value;
	// document.getElementById("state").value=document.getElementById("s_state").value;
	// document.getElementById("pincode").value=document.getElementById("s_pincode").value;
	// document.getElementById("mobile1").value=document.getElementById("s_mobile1").value;
	// document.getElementById("mobile2").value=document.getElementById("s_mobile2").value;
	// document.getElementById("email").value=document.getElementById("s_email").value;
	// }
	// else
	// {
	//document.getElementById("").value='';
	// document.getElementById("address").value='';
	// document.getElementById("city").value='';
	// document.getElementById("state").value='';
	// document.getElementById("pincode").value='';
	// document.getElementById("mobile1").value='';
	// document.getElementById("mobile2").value='';
	// document.getElementById("email").value='';
	//}
//}

function CopyBilling()
{
	
 var n1 = document.getElementById('customer_name');
  var n2 = document.getElementById('s_customer_name');
  n2.value = n1.value;
  
  var n3 = document.getElementById('address');
  var n4 = document.getElementById('s_address');
  n4.value = n3.value;
  
  var n5 = document.getElementById('city');
  var n6 = document.getElementById('s_city');
  n6.value = n5.value;
  
    var n7 = document.getElementById('state');
  var n8 = document.getElementById('s_state');
  n8.value = n7.value;
  
    var n9 = document.getElementById('pincode');
  var n10 = document.getElementById('s_pincode');
  n10.value = n9.value;
  
    var n11 = document.getElementById('mobile1');
  var n12 = document.getElementById('s_mobile1');
  n12.value = n11.value;
  
    var n13 = document.getElementById('mobile2');
  var n14 = document.getElementById('s_mobile2');
  n14.value = n13.value;
  
    var n15 = document.getElementById('email');
  var n16 = document.getElementById('s_email');
  n16.value = n15.value;
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
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Customer Details</h3> |<a href="customer_view.php" target="_blank">View All</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form class="form-horizontal" method="post" action="customer_act.php" autocomplete="off">
              <div class="box-body">
                  <div class="hidden">
                <div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">Customer Id</label>
                  <div class="col-sm-8">
				  <?php
				   $sa="select * from a_customer";
				  $Esa=mysqli_query($conn,$sa);
				  $n=mysqli_num_rows($Esa);
				  $ect=$n+1;
				  echo "C".$ect;
				  
	  ?>
                 
                  </div>
                </div> </div>
				<div class="hidden">
				<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Customer ID</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="customer_no"  id="customer_no" value="<?php echo "C".$ect;  ?>" placeholder="Customer Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required>
                      </div>
                    </div>
					</div>
					<h4 class="box-title">Billing Details |</h4>
					
							 <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Company Name</label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control" name="company_name"  id="company_name" value="<?php  ?>" placeholder="Company Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required>
                      </div>
                    </div>  
					
					
				<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Customer Name</label>
					  <div class="col-sm-2">
					  <select name="refer" id="refer" class="form-control" required autofocus="autofocus">
					  <option value="">--Select--</Option>
					  <option value="Mr">Mr</Option>
					  <option value="Ms">Ms</Option>
					  <option value="Mrs">Mrs</Option>
					  <option value="Mrs">Miss</Option>
					  <option value="M/S">M/S</option>
					  </select>
					  </div>
                      
        
                     <div class="col-sm-3">
                        <input type="text" class="form-control" name="customer_name"  id="customer_name" value="<?php  ?>" placeholder="First Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required>
                      </div>
             
                     <div class="col-sm-3">
                        <input type="text" class="form-control" name="lname"  id="lname" value="<?php  ?>" placeholder="Last Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required>
                      </div>
                    </div>  
                <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Address</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="address" autofocus="autofocus"  id="address" value="<?php  ?>" placeholder="Address" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                      </div>
                    </div>  
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">City</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="city" autofocus="autofocus" id="city"  value="<?php  ?>" placeholder="City" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                      </div>
                    </div> 
						<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">State</label>
                      <div class="col-sm-8">
						<select class="form-control" id="state" name="state" value="<?php  ?>" onKeyPress="return tabE(this,event)">
						<option value="">--Select the State--</option>
						<?php 
						$ssc="select * from tbl_state order by id";
						$Essc=mysqli_query($conn,$ssc);
						while($FEssc=mysqli_fetch_array($Essc))
						{
						?>
						<option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['StateName']; ?></option>
						<?php } ?>
						</select>
					 </div>
                    </div>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Pin Code</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="pincode" autofocus="autofocus" id="pincode" value="<?php  ?>" placeholder="Pin Code" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                      </div>
                    </div>
					
						<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Email Id</label>
                      <div class="col-sm-8">
                        <input type="email" class="form-control" name="email" autofocus="autofocus" id="email" onkeyup="CopyBilling();" placeholder="Email Id" onKeyPress="return tabE(this,event)" >
                      </div>
                    </div> 
					
							<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Primary Phone Mobile</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="mobile1" onkeyup="CopyBilling();"  id="mobile1" pattern="^\d{10}$" placeholder="Primary Phone Mobile" onKeyPress="return tabE(this,event)" required>
                      </div>
                    </div>
			
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Secondary Phone Mobile</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="mobile2"  id="mobile2" pattern="^\d{10}$" placeholder="Secondary Phone Mobile" onKeyPress="return tabE(this,event)" >
                      </div>
                    </div>
					
					
					
				 
					
			
					
					
					<h4 class="box-title">Shipping Details |</h4> 

					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Customer Name</label>
					  <div class="col-sm-2">
					  <select name="s_refer" id="s_refer" class="form-control" required autofocus="autofocus">
					  <option value="">--Select--</Option>
					  <option value="Mr">Mr</Option>
					  <option value="Ms">Ms</Option>
					  <option value="Mrs">Mrs</Option>
					  <option value="Mrs">Miss</Option>
					  <option value="M/S">M/S</option>
					  </select>
					  </div>
                      <div for="name2" class="col-sm-6">
                        <input type="text" class="form-control" name="s_customer_name" aria-describedby="name2"  id="s_customer_name" value="<?php  ?>" placeholder="Customer Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" >
                      </div>
                    </div>
				
                <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Address</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="s_address" autofocus="autofocus" id="s_address" value="<?php  ?>" placeholder="Address" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">City</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="s_city" autofocus="autofocus" id="s_city" value="<?php  ?>" placeholder="City" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                      </div>
                    </div> 
								<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">State</label>
                      <div class="col-sm-8">
						<select class="form-control" id="s_state" name="s_state" value="<?php  ?>" onKeyPress="return tabE(this,event)">
						<option value="">--Select the State--</option>
						<?php 
						$ssc="select * from tbl_state order by id";
						$Essc=mysqli_query($conn,$ssc);
						while($FEssc=mysqli_fetch_array($Essc))
						{
						?>
						<option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['StateName']; ?></option>
						<?php } ?>
						</select>
					 </div>
                    </div>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Pin Code</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="s_pincode" autofocus="autofocus" id="s_pincode" value="<?php  ?>" placeholder="Pin Code" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                      </div>
                    </div>
					
						<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Email Id</label>
                      <div class="col-sm-8">
                        <input type="email" class="form-control" name="s_email" autofocus="autofocus" id="s_email" placeholder="Email Id" onKeyPress="return tabE(this,event)" >
                      </div>
                    </div> 
					
				
						<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Primary Phone Mobile</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="s_mobile1"   id="s_mobile1" pattern="^\d{10}$" placeholder="Primary Phone Mobile" onKeyPress="return tabE(this,event)" >
                      </div>
                    </div>
				
				
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Secondary Phone Mobile</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="s_mobile2"  id="s_mobile2" pattern="^\d{10}$" placeholder="Secondary Phone Mobile" onKeyPress="return tabE(this,event)" >
                      </div>
                    </div>
				
			
					
					<div class="form-group" style="display:none">
                      <label for="catname" class="col-sm-3 control-label">Customer Outstanding Amount</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="cus_out_amt"  id="cus_out_amt" value="0" placeholder="Customer Outstanding Amount" onKeyPress="return tabE(this,event)" >
                      </div>
                    </div>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Customer Membership</label>
                      <div class="col-sm-8">
						<select class="form-control" id="Membership" name="Membership" onKeyPress="return tabE(this,event)">
						<option value="">--Select the Memberships--</option>
						<?php 
						$ssc="select * from membership where status='Active'";
						$Essc=mysqli_query($conn,$ssc);
						while($FEssc=mysqli_fetch_array($Essc))
						{
						?>
						<option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['MemberShip']; ?></option>
						<?php } ?>
						</select>
					 </div>
                    </div>
 
 	                  <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">GST Number</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="gst" autofocus="autofocus" id="gst" placeholder="GST Number" style="text-transform:uppercase" onKeyPress="return tabE(this,event)" >
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
				
				
						<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Gift Point Customer? </label>
                      <div class="col-sm-8">
						<select class="form-control" id="AquraMiles" name="AquraMiles" onKeyPress="return tabE(this,event)">
						<option value="">--Select Customer type--</option>
						<option value="No" >No</option>
						<option value="Yes" >Yes</option>						
						</select>
					 </div>
                    </div>
				
				
            <div class="col-md-3"></div>					
           <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Vehicle Entry</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding" style="overflow:auto">
              <table class="table-bordered padding-4 disp" style="width:110%;height:20px" >
                <tr>
                  <th>S:No</th>
                  <th>Model</th>
                  <th>Brand</th>
				  <th>Segment</th>
                  <th>Type</th>
				  <th>Year</th>
				  <th>Vehicle No</th>
                  <th>Insurance company Name</th>
                  <th>Insurance Number</th>
                  <th>Insurance Expiry Date</th>
               </tr>
				<?php
				for($i=1;$i<=5;$i++)
				{
				?>
                <tr>
                <td><?php echo $i; ?> </td>
				<td><input name="<?php echo "VehicleModel".$i ?>" id="<?php echo "VehicleModel".$i ?>" type="text" size="8"  onKeyPress="return tabE(this,event)" class="form-control" onblur="fnCustomerDetails(<?php echo $i; ?>)" style="text-transform:uppercase"></td>
                <td><input name="<?php echo "VehicleBrand".$i ?>"  id="<?php echo "VehicleBrand".$i ?>" type="text" size="4"  onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase" readonly  ></td>
				<td><input name="<?php echo "VehicleSegment".$i ?>"  id="<?php echo "VehicleSegment".$i ?>" type="text" size="2" onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase" readonly ></td>
				<td><input name="<?php echo "VehicleType".$i ?>"  id="<?php echo "VehicleType".$i ?>" type="text" size="4" onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase" readonly ></td>
				<td><input name="<?php echo "Year".$i ?>"  id="<?php echo "Year".$i ?>" type="text" size="1" onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
                
				<?php 
				if($i==1)
				{
				?>
				<td><input name="<?php echo "VehicleNo".$i ?>" id="<?php echo "VehicleNo".$i ?>"  type="text" size="4" pattern="^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]+$" onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase" ></td>
				<?php }
                else
				{
				?>
				<td><input name="<?php echo "VehicleNo".$i ?>" id="<?php echo "VehicleNo".$i ?>"  type="text" size="4" pattern="^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]+$" onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>

				<?php } ?>
				<td><input name="<?php echo "InsuranceCompnayName".$i ?>" id="<?php echo "InsuranceCompnayName".$i ?>" size="4"  type="text"  onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
                <td><input name="<?php echo "InsuranceNumber".$i ?>" id="<?php echo "InsuranceNumber".$i ?>" type="text" size="4"  onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
                <td><input name="<?php echo "InsuranceNumberExpiryDate".$i ?>"  id="<?php echo "InsuranceNumberExpiryDate".$i ?>" size="4" type="date" onKeyPress="return tabE(this,event)" size="2" class="form-control"></td>
				<td style="display:none"><input name="<?php echo "VehicleModelId".$i ?>"  id="<?php echo "VehicleModelId".$i ?>" size="4" type="text" onKeyPress="return tabE(this,event)" size="2" class="form-control"></td>
                </tr>
				<?php
				}
				?>
	                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>
              </div>
              <!-- /.box-body -->
			 
              <div class="box-footer">
			 
                <button type="submit" class="btn btn-default ">Cancel</button>
                <button  type="submit" class="btn btn-info pull-right" onClick="return confirm('Are You Sure Want to Save?');">Save Changes</button>
              </div>
              <!-- /.box-footer -->
            </form>
		
          </div>
        </div>
      </div>
      <div class="row hidden">
        <!-- left column -->
		
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Customers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
				   <th style="display:none"> Customer Transaction</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ct="select * from a_customer where status='Active' and FrachiseeId='".$_SESSION['FranchiseeId']."' order by id desc limit 0,10";
				$Ect=mysqli_query($conn,$ct);
				$n=mysqli_num_rows($Ect);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
					
					$ssc="select * from a_customer_vehicle_details where cust_no='".$Fct['id']."'";
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
				   <td>
                      <a href="../../services/job_card/s_jobcard.php?mobile1=<?php echo $Fct['mobile1']; ?>&temp=del" onClick="return confirm('Are You Sure Want to Proceed?');" class="btn-box-tool"><i class="fa fa-wrench" style="font-size:23px"></i></a> 
                     
                  </td>
				 
				  <td>
                      <a href="customer_edit.php?id=<?php echo $Fct['id']; ?>" onClick="return confirm('Are You Sure Want to edit?');" class="btn-box-tool" title="Edit Customer"><i class="fa fa-edit custom-icon1" style="font-size:23px"></i></a> 
                      
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


//countries = <?php echo $vehicle; ?>;
customers = <?php echo $Brand; ?>;

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
//autocomplete(document.getElementById("vehicle"), countries);

autocomplete(document.getElementById("VehicleModel1"), customers);
autocomplete(document.getElementById("VehicleModel2"), customers);
autocomplete(document.getElementById("VehicleModel3"), customers);
autocomplete(document.getElementById("VehicleModel4"), customers);
autocomplete(document.getElementById("VehicleModel5"), customers);


</script>
 
 
</body>
</html>