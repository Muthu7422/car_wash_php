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
        Recommended Date 
        <small>Service</small>
      </h1>
     </section>
	
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
  
 
  
  
</script> 


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
		
            <form class="form-horizontal" method="post" action="service_temp_reco.php?id=<?php echo $FEs['id']; ?> && job_card_no=<?php echo $FEs['job_card_no']; ?> && mobile=<?php echo $temp['smobile'];?> " autocomplete="off">
              <div class="box-body">
                  <div class="hidden">
                <div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">Customer Id</label>
                  <div class="col-sm-8">
				  <?php
				  $id=$_REQUEST['id'];
				  $job_card_no=$_REQUEST['job_card_no'];
				   $mobile=$_REQUEST['mobile'];
				   
				  $sdetails="select * from s_job_card_sdetails_temp where id='$job_card_no'";
                 $sdetailssql=mysqli_query($conn,$sdetails);
                 $sd=mysqli_fetch_array($sdetailssql);
				 
				 
				   $sa="select * from a_customer where mobile1='".trim($mobile)."'";
				  $Esa=mysqli_query($conn,$sa);
				  $cust=mysqli_fetch_array($Esa);
				  
	  ?>
                 
                  </div>
                </div> </div>
				<div class="hidden">
			
					</div>
					
					
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Job Card No</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="job_card_no" id="job_card_no" value="<?php echo $job_card_no; ?>"  readonly="true">
						 <input type="text" class="form-control hidden" name="sid" id="sid" value="<?php echo $id; ?>"  readonly="true">
                      </div>
                    </div>
				<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Customer Name</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="customer_name" autofocus="autofocus" id="customer_name" value="<?php echo $cust['cust_name'];?>" placeholder="Customer Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
                      </div>
                    </div>
					
					<div class="form-group hidden">
                      <label for="catname" class="col-sm-3 control-label">Customer Id</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="Cust_Id" autofocus="autofocus" id="Cust_Id" value="<?php echo $cust['id'];?>" placeholder="Customer Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
                      </div>
                    </div>
					
                <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Address</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="address" autofocus="autofocus" id="address" value="<?php echo $cust['addr'];?>" placeholder="Address" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Primary Phone</label>
                      <div class="col-sm-8">
					  
                        <input type="text" class="form-control" name="mobile1" autofocus="autofocus" id="mobile1" value="<?php echo $cust['mobile1'];?>"  placeholder="Primary Phone Mobile" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
                      </div>
                    </div>
					<?php
					 $s="select * from s_job_card_sdetails_temp where job_card_no='".$_REQUEST['job_card_no']."' and id='".$_REQUEST['id']."'"; 
				     $Es=mysqli_query($conn,$s);
				     $FEs=mysqli_fetch_array($Es);
				     ?>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Service</label>
                      <div class="col-sm-8">
					  
                        <input type="text" class="form-control" name="service_type" autofocus="autofocus" id="service_type" value="<?php echo $FEs['service_type'];?>"  placeholder="Primary Phone Mobile" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Service Amount</label>
                      <div class="col-sm-8">
					  
                        <input type="text" class="form-control" name="st_amt" autofocus="autofocus" id="st_amt" value="<?php echo $FEs['st_amt'];?>"  placeholder="Primary Phone Mobile" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Quantity</label>
                      <div class="col-sm-8">
					  
                        <input type="text" class="form-control" name="qty" autofocus="autofocus" id="qty" value="<?php echo $FEs['qty'];?>"  placeholder="Primary Phone Mobile" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Recommended Date</label>
                      <div class="col-sm-8">
			      <input type="Date" class="form-control" name="Rdate" id="Rdate"  value="<?php echo date('m-d-y H:i:s'); ?>" onKeyPress="return tabE(this,event)" required>
				</div>
                    </div>
 
           	     <div class="form-group pull-right">
			    <label for="catname" class="col-sm-3 control-label"></label>
                  <label for="Branch">&nbsp;</label>
                  <input type="Submit" placeholder="Add" name="SubmitJobCard" id="SubmitJobCard" style="background-color:#37B8F8;color:#000000" value="Submit Next Recommended Date" class="form-control" >
            	</div>


			  </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>
              </div>
              <!-- /.box-body -->
			 
       
              <!-- /.box-footer -->
            </form>
		
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