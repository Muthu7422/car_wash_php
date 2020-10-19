<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");



$abc1="select * from master_vehicle";
$abcd1=mysqli_query($conn,$abc1);
$Brand="[";
while($ac1=mysqli_fetch_array($abcd1))
{
	$st=$ac1['VehicleModel']." - ".$ac1['Id'];
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
        Lead (Or) Enquiry
        <small>Process</small> |  <small><a href="detailsimport.php">Upload CSV</a></small>
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

       }
 });

}		
</script>	 
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="enquiry_act.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			  
			    <div class="form-group col-sm-4">
                  <label for="Branch">Customer First Name</label>
                  <input type="text" class="form-control" name="CustomerFirstName" id="CustomerFirstName" placeholder="Customer First Name" onKeyPress="return tabE(this,event)">
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Customer Last Name</label>
                  <input type="text" class="form-control" name="CustomerLastName" id="CustomerLastName" placeholder="Customer Last Name" onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Company Name</label>
                  <input type="text" class="form-control" name="CompanyName" id="CompanyName" placeholder="Company Name" onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Date Of Birth</label>
                 <input type="date" class="form-control" name="DateOfBirth" id="DateOfBirth" value="<?php echo date('Y-m-d');?>" onKeyPress="return tabE(this,event)">
                </div>
			
				</div>
				
			<div class="box-body">
			
				
				  
			
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Email Id</label>
                  <input type="email" class="form-control" name="CustomerEmailId" id="CustomerEmailId" placeholder="Customer Email ID" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" onKeyPress="return tabE(this,event)">
                </div>
				
				
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Customer skype Id</label>
                  <input type="email" class="form-control" name="CustomerSkypeId" id="CustomerSkypeId" placeholder="Customer Skype ID" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" onKeyPress="return tabE(this,event)">
                </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Customer Mobile</label>
                  <input type="tel" class="form-control" name="CustomerMobile1" id="CustomerMobile1" placeholder="Mobile" pattern="^\d{10}$" onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Secondary Mobile</label>
                  <input type="tel" class="form-control" name="CustomerMobile2" id="CustomerMobile2" placeholder="Secondary Mobile" pattern="^\d{10}$" onKeyPress="return tabE(this,event)">
                </div>
				</div>
				
			<div class="box-body">
				<div class="form-group col-sm-4">
                  <label for="Branch">Address</label>
                  <textarea type="text" class="form-control" name="Address" id="Address" placeholder="Address" onKeyPress="return tabE(this,event)"></textarea>
                </div>
				<div class="form-group col-sm-4">
                 <label for="Branch">Lead Sources</label>
                 <select type="text" class="form-control" name="LeadSource" id="LeadSource" onKeyPress="return tabE(this,event)">
				 <option value="">---None---</option>
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
                 <textarea type="text" class="form-control" name="Description" id="Description" placeholder="Description" onKeyPress="return tabE(this,event)"></textarea>
                </div>
				</div>

			
			<div class="box-body">
			
			<div class="form-group col-sm-4">
                  <label for="Branch">Select The Service Name</label>
                 <select type="text" class="form-control" name="ServiceId" id="ServiceId" onKeyPress="return tabE(this,event)">
				 <option value="">--Select The Service--</option>
				 <?php
				 $d="select * from m_service_type where status='Active'";
				 $sa=mysqli_query($conn,$d);
				 while($swq=mysqli_fetch_array($sa))
				 {
				 ?>
				 <option value="<?php echo $swq['id'];?>"><?php echo $swq['stype'];?></option>
				 <?php 
				 }
				 ?>
				 </select>
                </div>
			 </div>
			         <div class="box-header">
              <h3 class="box-title">Vehicle Entry</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding" style="overflow:auto">
              <table class="table-bordered padding-4 disp" style="width:150%;height:20px" >
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
				<td><input name="<?php echo "VehicleModel".$i ?>" id="<?php echo "VehicleModel".$i ?>" type="text"  onKeyPress="return tabE(this,event)" class="form-control" onblur="fnCustomerDetails(<?php echo $i; ?>)" style="text-transform:uppercase"></td>
                <td><input name="<?php echo "VehicleBrand".$i ?>"  id="<?php echo "VehicleBrand".$i ?>" type="text" onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
				<td><input name="<?php echo "VehicleSegment".$i ?>"  id="<?php echo "VehicleSegment".$i ?>" type="text" onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
				<td><input name="<?php echo "VehicleType".$i ?>"  id="<?php echo "VehicleType".$i ?>" type="text" onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
				<td><input name="<?php echo "Year".$i ?>"  id="<?php echo "Year".$i ?>" type="text" onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
                <td><input name="<?php echo "VehicleNo".$i ?>" id="<?php echo "VehicleNo".$i ?>"  type="text"  onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
				<td><input name="<?php echo "InsuranceCompnayName".$i ?>" id="<?php echo "InsuranceCompnayName".$i ?>"  type="text"  onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
                <td><input name="<?php echo "InsuranceNumber".$i ?>" id="<?php echo "InsuranceNumber".$i ?>" type="text"  onKeyPress="return tabE(this,event)" class="form-control" style="text-transform:uppercase"></td>
                <td><input name="<?php echo "InsuranceNumberExpiryDate".$i ?>"  id="<?php echo "InsuranceNumberExpiryDate".$i ?>" type="date" onKeyPress="return tabE(this,event)" size="2" class="form-control"></td>
                </tr>
				<?php
				}
				?>
	                
              </table>
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
				if($_SESSION['UserRole']=='admin')
				{
				    $ss="select * from  crm_enquiry where Status='Active' and FranchiseeId='".$_SESSION['BranchId']."' order by id desc";
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
                   <td><a href="enquiry_edit.php?Id=<?php  echo $FEss['Id']; ?>" class="btn-box-tool" Onclick="return confirm('Are You Sure Want To Proceed?')"><font color=blue size='5'>Edit</font></a>
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
