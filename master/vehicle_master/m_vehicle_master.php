<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");


$abc1="select * from m_vehicle_brand";
$abcd1=mysqli_query($conn,$abc1);
$Brand="[";
while($ac1=mysqli_fetch_array($abcd1))
{
	$st=$ac1['VehicleBrand']." - ".$ac1['Id'];
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
        Vehicle Master
      </h1>
     </section>
	 <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
                <strong><?php echo $_REQUEST['s']; ?></strong> <i class="glyphicon glyphicon-warning" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
			  <?php if($_REQUEST['msg']=="2") {?> 
			  <div class="alert alert-success">
                <strong><?php echo "Invalid Brandname "; ?></strong> <i class="glyphicon glyphicon-warning" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			  <div class="alert alert-danger">
              <b> Vehicle Types Deleted Successfully!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  <?php if($_REQUEST['a']!="") {?> 
			  <div class="alert alert-warning">
                  Vehicle Type  <b>already</b> exists! <i class="fa fa-warning" style="font-size:30px;color:white"></i>
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

  
</script>	 
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="m_vehicle_master_addQ.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Type</label>
                  <select type="text" class="form-control" name="VehicleType" id="VehicleType" onKeyPress="return tabE(this,event)" required>
				  <option value="">-Select The Type-</option>
				  <?php 
				  $cx="select * from m_vehicle_type where Status='Active'";
				  $dx=mysqli_query($conn,$cx);
				  while($xd=mysqli_fetch_array($dx))
				  {
				  ?>
				  <option value="<?php echo $xd['Id']; ?>"><?php echo $xd['VehicleType']; ?></option>
				  <?php
				  }
				  ?>
				  </select>
                </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Segment</label>
                  <select type="text" class="form-control" name="VehicleSegment" id="VehicleSegment" onKeyPress="return tabE(this,event)" required>
				  <option value="">-Select The Type-</option>
				  <?php 
				  $cx="select * from master_vehicle_segment where Status='Active'";
				  $dx=mysqli_query($conn,$cx);
				  while($xd=mysqli_fetch_array($dx))
				  {
				  ?>
				  <option value="<?php echo $xd['Id']; ?>"><?php echo $xd['VehicleSegment']; ?></option>
				  <?php
				  }
				  ?>
				  </select>
                </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Brand</label>
                  <input type="text" class="form-control" name="VehicleBrand" id="VehicleBrand" onKeyPress="return tabE(this,event)" required>
                </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Model</label>
                 <input type="text" class="form-control" name="VehicleModel" id="VehicleModel" placeholder="Vehicle Model" onKeyPress="return tabE(this,event)" required>
                </div>
            </div>
			 <div class="box-body">
			  <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>  </div> 
				        <div class="box-body">
						 <h4>Available Vehicle Master</h4>
                <div class="form-group col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				
                  <th>S.No</th>
                  <th>Vehicle Type</th>
				  <th>Vehicle Segment</th>
				  <th>Vehicle Brand</th>
				  <th>Vehicle Model</th>
				  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from master_vehicle order by Id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{	
			
								$dcx="select * from m_vehicle_type where Id=".$FEss['VehicleType']."";
								$da=mysqli_query($conn,$dcx);
								$xa=mysqli_fetch_array($da);
								
								$dcx1="select * from master_vehicle_segment where Id=".$FEss['VehicleSegment']."";
								$da1=mysqli_query($conn,$dcx1);
								$xa1=mysqli_fetch_array($da1);
								
								$dcx2="select * from m_vehicle_brand where Id=".$FEss['VehicleBrand']."";
								$da2=mysqli_query($conn,$dcx2);
								$xa2=mysqli_fetch_array($da2);
			
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $xa['VehicleType']; ?></td>
				  <td><?php  echo $xa1['VehicleSegment']; ?></td>
				  <td><?php  echo $xa2['VehicleBrand']; ?></td>
				  <td><?php  echo $FEss['VehicleModel']; ?></td>
				  <td><?php  echo $FEss['Status']; ?></td>
                  <td><a href="m_vehicle_master_edit.php?Id=<?php echo $FEss['Id']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a></td>
                </tr>
				<?php } ?>
                </tbody>
              </table>
                </div>
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	     
         </div>
    </form>
	</section>
    <!-- /.content -->
</div>

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

autocomplete(document.getElementById("VehicleBrand"), customers);

</script>
 <?php include("../../includes_db_js.php"); ?>
</body>
</html>
