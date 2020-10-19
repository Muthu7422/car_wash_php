<?php
include("../../includes.php");

$abc1="select sname,spartno,smrp,sid from m_spare";
$abcd1=mysqli_query($conn,$abc1);
$auto_sparename="[";
$autoPartName="[";
while($ac1=mysqli_fetch_array($abcd1))
{   $stemp=$ac1['spartno']." / ".$ac1['sname']." / ".$ac1['smrp']." / ".$ac1['sid'];
    $pnTemp=$ac1['sname']." / ".$ac1['spartno']." / ".$ac1['smrp']." / ".$ac1['sid'];

	$auto_sparename.="'".$stemp."',";
	$autoPartName.="'".$pnTemp."',";
}
 $auto_sparename.="'']";
 $autoPartName.="'']";


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php include("../../includes_db_css.php"); ?>
   
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
        Service Types
        <small>Master</small>
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="m_service_type_editQ.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
			
			
				$spm="select * from m_service_type where id='".$_REQUEST['id']."'";
				$ss=mysql_query($spm);
				$spc=mysql_fetch_array($ss);
			
				$ss="select * from m_service_type_details where service_type='".$spc['id']."'";
				$Ess=mysql_query($ss);
				$FEss=mysql_fetch_array($Ess);
				
			?>
               <div class="box-body">
			   
			   <div class="form-group col-sm-4">
                  <label for="Branch">Service Type Id</label>
                  <input type="text" class="form-control" name="stypeId" id="stypeId" value="<?php echo $spc['id']; ?>" placeholder="Service Type Id" onKeyPress="return tabE(this,event)" readonly>
                </div>
				
				
			   <div class="form-group col-sm-4">
                  <label for="Branch">Service Type No</label>
                  <input type="text" class="form-control" name="stype_no" id="stype_no" value="<?php echo $spc['stype_no']; ?>" placeholder="Service Type No" onKeyPress="return tabE(this,event)" readonly>
                </div>
                <div class="form-group col-sm-4">
                  <label for="Branch">Service Type</label>
                  <input type="text" class="form-control" name="stype" id="stype" value="<?php echo $spc['stype']; ?>" placeholder="Service Type" onKeyPress="return tabE(this,event)" required>
                </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Service Amount</label>
                  <input type="text" class="form-control" name="in_amt" id="in_amt" value="<?php echo $spc['installation_amt']; ?>" placeholder="Installation Amount" onKeyPress="return tabE(this,event)" required>
                </div>
				 <div class="form-group col-sm-4 hidden">
                  <label for="Branch">Others Charge</label>
                  <input type="text" class="form-control" name="labour_amt" id="labour_amt" value="<?php echo $spc['labour_amt']; ?>" placeholder="Labour Charge" onKeyPress="return tabE(this,event)" required>
                </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Segment</label>
                  <select type="text" class="form-control" name="vehcile_type" id="vehcile_type"  onKeyPress="return tabE(this,event)" required>
				<?php
				$vtype="select * from master_vehicle_segment where Id='".$spc['v_type']."'";
					$vtypeq=mysql_query($vtype);
					$vtypef=mysql_fetch_array($vtypeq);
				?>
				
				<option value="<?php echo $vtypef['Id']; ?>"><?php echo $vtypef['VehicleSegment']; ?></option>
				<option value="">---Select The Segment---</option>
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
				 <div class="form-group col-sm-4 hidden">
                  <label for="Branch">Vehicle Brand</label>
                  <select type="text" class="form-control" name="vehcile_brand" id="vehcile_brand"  onKeyPress="return tabE(this,event)">
				  <?php
				  $rr="select * from m_vehicle_brand where Id='".$temp['v_brand']."'";
				  $ee=mysql_query($rr);
				  $tp=mysql_fetch_array($ee);
				  ?>
				  <option value="<?php echo $tp['Id'] ?>"><?php echo $tp['VehicleBrand']?></option>
				  <?php 
				  $ss="select * from m_vehicle_brand where status='Active'";
				  $Efc=mysql_query($ss);
				 while($Fcs=mysql_fetch_array($Efc))
				 {
					 ?>
					 <option value="<?php echo $Fcs['Id']; ?>"><?php echo $Fcs['VehicleBrand']; ?></option>
					 <?php
				 }
				  ?>
				  </select>
                </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Spare(Associate spare with service)</label>
                  <input type="text" class="form-control" name="spare_name" id="spare_name" placeholder="spare name" onKeyPress="return tabE(this,event)" >
                  
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Qty</label>
                  <input type="text" class="form-control" name="qty" id="qty" placeholder="Qty" onKeyPress="return tabE(this,event)" >
                </div>
				<div class="form-group col-sm-2 hidden">
                  <label for="Branch">Others</label>
                  <input type="text" class="form-control" name="other" id="other" placeholder="Others" onKeyPress="return tabE(this,event)" >
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Invoice Visibility</label>
                  <select type="text" class="form-control" name="show_option" id="show_option"  onKeyPress="return tabE(this,event)" >
				   <option>Invisible</option>
				   <option>Visible</option>
				  
				  </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Product Ownership</label>
                  <select type="text" class="form-control" name="ownership" id="ownership"  onKeyPress="return tabE(this,event)" >
				  <option><?php echo $spc['ownership']; ?></option>
				  <option>Protouch</option>
				  <option>Wurth</option>				  
				  </select>
                </div>
				
				
				
				</div>
				  <div class="box-body">
                  <button type="submit" class="btn btn-info pull-right" >Submit</button>
                </div>    
				</br>	
				
				  <div class="box-body ">
                <div class="form-group col-sm-12">
                <table  class="table table-bordered table-striped">
                <thead>
                <tr>
				
                  <th>S.No</th>
				   <th>Spare / Item Name</th>
                  <th>Service Type</th>
				  <th>Qty</th>
				  <th>MRP</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from m_service_type_details where service_type='".$spc['id']."'";
				$Ess=mysql_query($ss);
				$i=0;
				while($FEss=mysql_fetch_array($Ess))
				{
					$spm1="select * from m_service_type where id='".$FEss['service_type']."'";
					$ss1=mysql_query($spm1);
					$spc1=mysql_fetch_array($ss1);
					//echo $spc1['stype'];
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <?php
				   $names="select * from m_spare where sid='".$FEss['spare_name']."'"; 
					$ns=mysql_query($names);
					$jcd=mysql_fetch_array($ns);
					
						?>
				  <td><?php  echo $jcd['sname']; ?></td>
				  
				    <td><?php  echo $spc1['stype']; ?></td>
				  <td><?php  echo $FEss['qty']; ?></td>
				  <td style="text-align:right"><?php  echo $jcd['smrp']; ?></td>
				
                      <td><a href="service_details_delete_temp.php?stype_no=<?php echo $spc1['stype_no']; ?>&id=<?php echo $FEss['id']; ?>&stype_id=<?php echo $_REQUEST['id']; ?>" onClick="return confirm('Are You Sure Want to Delete?');" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
                     
				 
                </tr>
				<?php } 
				
				?>
             
				
                </tbody>
              </table>
                </div>
            </div>
			
			
			
			
			 
				  <div class="box-body">
                <div class="form-group col-sm-12">
                <table  class="table table-bordered table-striped">
               
                <tbody>
				<?php
				$ss="select * from m_service_type_temp where status='Active' order by id desc";
				$Ess=mysql_query($ss);
				$j=$i;
				while($FEss=mysql_fetch_array($Ess))
				{
					
					
					$j++;
				?>
                <tr>
                  <td><?php echo $j; ?></td>
				   <td><?php  echo $FEss['stype_name']; ?></td>
				  <?php
				   $names="select * from m_spare where sid='".$FEss['spare_name']."'"; 
					$ns=mysql_query($names);
					while($jcd=mysql_fetch_array($ns))
					{
						?>
				  <td><?php  echo $jcd['sname']; ?></td>
				  <?php
					}
				  ?>
				   
				  <td><?php  echo $FEss['qty']; ?></td>
				  <td><?php  echo $FEss['others']; ?></td>
				
                      <td><a href="service_delete_edit.php?id=<?php echo $FEss['id']; ?> && stype_no=<?php echo $FEss['stype_no']; ?>"  onClick="return confirm('Are You Sure Want to Delete?');" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
					   
                     
				 
                </tr>
				<?php } 
				
				?>
                </tbody>
              </table>
                </div>
            </div>
			 
			
			
			
			
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	    <div class="box-footer">
		  <a href="m_service_type.php" class="btn btn-info pull-right">Cancel </a>
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

spart = <?php echo $autoPartName; ?>;
sname = <?php echo $auto_sparename; ?>;
/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("spare_name"), spart);

//autocomplete(document.getElementById("OldCustomer"), OldCustomers);

</script> 
</body>
</html>
