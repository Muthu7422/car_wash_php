<?php
error_reporting(0);
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
        Customer Enquiry
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
}
</script>	 
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="enquiry_edit_act.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			  <?php
			  $edy="select * from crm_enquiry where Id='".$_REQUEST['Id']."'";
			  $dyg=mysqli_query($conn,$edy);
			  $fcf=mysqli_fetch_array($dyg);
			  ?>
			  
			    <div class="form-group col-sm-4">
                  <label for="Branch">Customer First Name</label>
				 <input type="hidden" class="form-control" name="CustomerId" id="CustomerId" value="<?php echo $fcf['Id']; ?>" onKeyPress="return tabE(this,event)">

                  <input type="text" class="form-control" name="CustomerFirstName" id="CustomerFirstName" value="<?php echo $fcf['CustomerFirstName'] ?>" onKeyPress="return tabE(this,event)">
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Customer Last Name</label>
                  <input type="text" class="form-control" name="CustomerLastName" id="CustomerLastName" value="<?php echo $fcf['CustomerLastName'] ?>" onKeyPress="return tabE(this,event)">
                </div>
				
				
					<div class="form-group col-sm-4">
                  <label for="Branch">Date Of Birth</label>
                 <input type="date" class="form-control" name="DateOfBirth" id="DateOfBirth" value="<?php echo date('Y-m-d');?>" onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4" hidden>
                  <label for="Branch">Company Name</label>
                  <input type="text" class="form-control" name="CompanyName" id="CompanyName" value="<?php echo $fcf['CompanyName'] ?>" onKeyPress="return tabE(this,event)">
                </div>
				</div>
				
			<div class="box-body">
			
			
			
				  
			
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Email Id</label>
                  <input type="text" class="form-control" name="CustomerEmailId" id="CustomerEmailId" value="<?php echo $fcf['CustomerEmailID'] ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" onKeyPress="return tabE(this,event)">
                </div>
				
					 <div class="form-group col-sm-4">
                  <label for="Branch">Customer Mobile</label>
                  <input type="text" class="form-control" name="CustomerMobile1" id="CustomerMobile1" value="<?php echo $fcf['CustomerMobile1'] ?>" onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Secondary Mobile</label>
                  <input type="text" class="form-control" name="CustomerMobile2" id="CustomerMobile2" value="<?php echo $fcf['CustomerMobile2'] ?>"  onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4" hidden>
                  <label for="Branch">Customer skype Id</label>
                  <input type="email" class="form-control" name="CustomerSkypeId" id="CustomerSkypeId" value="<?php echo $fcf['CustomerSkypeId'] ?>"  onKeyPress="return tabE(this,event)">
                </div>
				</div>
				
			<div class="box-body">
			
			
				<div class="form-group col-sm-4">
                  <label for="Branch">Address</label>
                  <input type="text" class="form-control" name="Address" id="Address" placeholder="Address" value="<?php echo $fcf['Address'] ?>"onKeyPress="return tabE(this,event)"></input>
                </div>
				
				   
				   		<div class="form-group col-sm-4">
                 <label for="Branch">Lead Sources</label>
                 <select type="text" class="form-control" name="LeadSource" id="LeadSource" onKeyPress="return tabE(this,event)">
				 <option value="<?php echo $fcf['LeadSource'] ?>"><?php echo $fcf['LeadSource'] ?></option>
				 <option value="Advertisement">Advertisement</option>
                 <option value="External Referral">External Referral</option>
                 <option value="Employee Referral">Employee Referral</option>
				 <option value="Database Extraction">Database Extraction</option>
                 <option value="Inbound Call">Inbound Call</option>
                 <option value="Cold Call">Cold Call</option>
				 </select>
                </div>
							
				<div class="form-group col-sm-4">
                  <label for="Branch">Description Information</label>
                 <input type="text" class="form-control" name="Description" id="Description" onKeyPress="return tabE(this,event)"><?php echo $fcf['Description'] ?></input>
                </div>
				     <div class="form-group col-sm-4">
                  <label for="Branch">Service Name</label>
                  <select type="text" class="form-control" name="ServiceId" id="ServiceId"  onKeyPress="return tabE(this,event)" >
				
				  <?php 
				  $cx1="select * from m_service_type where Status='Active'";
				  $dx1=mysqli_query($conn,$cx1);
				  while($xd1=mysqli_fetch_array($dx1))
				  {
				  ?>
				  <option value="<?php echo $xd1['id']; ?>" <?php if($xd1['id']==$fcf['ServiceId']){ ?>selected <?php }?>><?php echo $xd1['stype']; ?></option>
			  <?php
				  }
				  ?>
				  </select>    
				  </div>
				   
				<div class="form-group col-sm-4" hidden>
                  <label for="Branch">Street</label>
                  <input type="text" class="form-control" name="CustomerStreet" id="CustomerStreet" value="<?php echo $fcf['CustomerStreet'] ?>" onKeyPress="return tabE(this,event)">
                </div>
				</div>
				
				<div class="box-body">
				
				<div class="form-group col-sm-4" hidden>
				<label for="Branch">City</label>
				<input type="text" class="form-control" name="CustomerCity" id="CustomerCity" value="<?php echo $fcf['CustomerCity'] ?>" onKeyPress="return tabE(this,event)">
				
				 </div>
             
                  				
   				<div class="form-group col-sm-4" hidden>
                  <label for="Branch">State</label>
				 <select type="text" class="form-control" name="CustomerState" id="CustomerState" onKeyPress="return tabE(this,event)">
				 <option value"<?php echo $fcf['CustomerState'] ?>"><?php echo $fcf['CustomerState'] ?></option>
				 <option value="Andhra Pradesh">Andhra Pradesh</option>
                 <option value="Tamil Nadu">Tamil Nadu</option>
				 <option value="Telugana">Telugana</option>
                 <option value="Kerala">Kerala</option>
				 <option value="Karnataka">Karnataka</option>
				 </select>
				</div>
								
				<div class="form-group col-sm-4" hidden>
                  <label for="Branch">Pin Code</label>
                  <input type="text" class="form-control" name="CustomerPinCode" id="CustomerPinCode" value="<?php echo $fcf['CustomerPincode'] ?>" pattern="[0-9]{6}" onKeyPress="return tabE(this,event)">
                </div>
				</div>
			
			
			<div class="box-body">
								
				 <div class="form-group col-sm-4" hidden>
                  <label for="Branch">Country</label>
                  <input type="text" class="form-control" name="CustomerCountry" id="CustomerCountry" value="<?php echo $fcf['CustomerCountry'] ?>" onKeyPress="return tabE(this,event)">
                </div>
		

		
				
				<div id="EnquiryDate" style="visibility: hidden">
				<div class="form-group col-sm-4">
                  <label for="Branch">Enquiry Date</label>
                 <input type="date" class="form-control" name="EnquiryDate" id="EnquiryDate" value="<?php echo date('Y-m-d');?>" onKeyPress="return tabE(this,event)">
                </div>
		
         		<div class="form-group col-sm-4">
                  <label for="Branch">Next Follow-up Date</label>
                 <input type="date" class="form-control" name="NextFollowDate" id="NextFollowDate" onKeyPress="return tabE(this,event)">
                </div>
            </div>
			</div>

                  
			
			<div class="box-body">
			
			<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Status</label>
                 <input type="text" class="form-control" name="EnquiryStatus" id="EnquiryStatus" onKeyPress="return tabE(this,event)">
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
				$sv="select * from crm_enquiry_vehicle_details where crm_enquiry_no='".$fcf['Id']."'";
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
				<div style="overflow:auto">
                <table id="example1" class="table table-bordered table-striped" width="150%">
                <thead>
                <tr>
				  <th>S.No</th>
                  <th>Name</th>
				  <th>Company Name</th>
				  <th>Mobile</th>
				  <th>Street</th>
				  <th>City</th>
				  <th>Enquiry Date</th>
				  <th>Next Follow </th>
				  <th>Status</th>
				  <th>Remarks</th>
				  <th>Follow Up</th>
				 
                </tr>
                </thead>
                <tbody>
				<?php
				if($_SESSION['UserRole']=='admin')
				{
				    $ss="select * from  crm_enquiry where Status='Active' and  FranchiseeId='".$_SESSION['BranchId']."' order by id desc";
				}
				else
				{
			    	$ss="select * from  crm_enquiry where Status='Active' and FranchiseeId='".$_SESSION['BranchId']."' and EnquiryStatus='1' order by id desc";
				}
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
				  <td><?php  echo $FEss['CompanyName'];?></td>
				  <td><?php  echo $FEss['CustomerMobile1']; ?></td>
				  <td><?php  echo $FEss['CustomerStreet']; ?></td>
				  <td><?php  echo $FEss['CustomerCity']; ?></td>
				  <td><?php  echo $FEss['EnquiryDate']; ?></td>
				  <td><?php  echo $FEss['NextFollowDate']; ?></td>
				  <td><?php  echo $wsxr['EnquiryStatus']; ?></td>
				  <td><?php  echo $FEss['Description']; ?></td>
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
	
	
</div>
<div class="control-sidebar-bg"></div>
  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("../../footer.php"); ?>
  <!--footer End-->
    <div class="control-sidebar-bg"></div>
</div>
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
