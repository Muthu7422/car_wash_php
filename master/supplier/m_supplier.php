<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

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
        Supplier
        <small>Master</small>
      </h1>
     </section>
<div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
                <strong>Supplier Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			  <div class="alert alert-danger">
              <b> Supplier Deleted Successfully!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  <?php if($_REQUEST['a']!="") {?> 
			  <div class="alert alert-warning">
                 Supplier <b>already</b> exist ! <i class="fa fa-warning" style="font-size:30px;color:white"></i>
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
  
  
function CopyBilling()
{
	
 var n1 = document.getElementById('sname');
  var n2 = document.getElementById('shipping_name');
  n2.value = n1.value;
  
  var n3 = document.getElementById('smobile1');
  var n4 = document.getElementById('shipping_mobile1');
  n4.value = n3.value;
  
  var n5 = document.getElementById('smobile2');
  var n6 = document.getElementById('shipping_mobile2');
  n6.value = n5.value;
  
    var n7 = document.getElementById('scity');
  var n8 = document.getElementById('shipping_city');
  n8.value = n7.value;
  
    var n9 = document.getElementById('sstate');
  var n10 = document.getElementById('shipping_state');
  n10.value = n9.value;
  
    var n11 = document.getElementById('semail');
  var n12 = document.getElementById('shipping_email');
  n12.value = n11.value;
  
    var n13 = document.getElementById('saddress');
  var n14 = document.getElementById('shipping_address');
  n14.value = n13.value;
  

}
  
</script>	 
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="m_supplier_addQ.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
								<h4 class="box-title">Billing Details |</h4> 
<div class="box-body">
			  
			  
                <div class="form-group col-sm-4">
                  <label for="Branch">Supplier Name</label>
                  <input type="text" class="form-control" name="sname" id="sname" placeholder="Supplier Name" onKeyPress="return tabE(this,event)" required>
                  <input type="hidden" class="form-control" name="franchisee_id"  id="franchisee_id" value="<?php echo $var['id']; ?>" readonly placeholder="Pid" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required> 
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Supplier Mobile</label>
                  <input type="text" class="form-control" name="smobile1" id="smobile1" placeholder="Supplier Mobile" onKeyPress="return tabE(this,event)">
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier Secondary Mobile</label>
                  <input type="text" class="form-control" name="smobile2" id="smobile2" placeholder="Secondary Mobile" onKeyPress="return tabE(this,event)">
                </div>
			
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier Address</label>
                  <textarea class="form-control" name="saddress" id="saddress" placeholder="Supplier Addres" onKeyPress="return tabE(this,event)"></textarea>
                </div>
				
					<div class="form-group col-sm-4">
                  <label for="Branch">Supplier City</label>
                  <input type="text" class="form-control" name="scity" id="scity" placeholder="Supplier City" onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier State</label>
                <select class="form-control" id="sstate" name="sstate" onKeyPress="return tabE(this,event)">
				<option selected="selected">Select the State</option>
				  <option >TAMILNADU</option>
                  <option>KERALA</option>
				  <option>ANDHRA PRADESH</option>
				  <option>KARNATAKA</option>
				  <option>MAHARASHTRA</option>
				  <option>MADHYA PRADESH</option>
				  <option>UTTAR PRADESH</option>
				  <option>RAJASTHAN</option>
				  <option>BIHAR</option>
				  <option>ODISSA</option>
				  <option>JAMMU & KASHMIR</option>
				  <option>ASSAM</option>
				  <option>HARYANA</option>
				  <option>ARUNACHAL PRADESH</option>
				  <option>GUJARAT</option>
				  <option>CHHATTISGARH</option>
				  <option>GOA</option>
				  <option>HIMACHAL PRADESH</option>
				  <option>JHARKHAND</option>
				  <option>MANIPUR</option>
				  <option>MEGHALAYA</option>
				  <option>MIZORAM</option>
				  <option>NAGALAND</option>
				  <option>PUNJAB</option>
				  <option>SIKKIM</option>
				  <option>TELANGANA</option>
				  <option>TRIPURA</option>
				  <option>UTTARAKHAND</option>
				  <option>WEST BENGAL</option>
				</select>
                </div>
			
				
				
				<div class="col-md-12"></div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Email ID</label>
                 <input type="email" class="form-control" name="semail" id="semail" placeholder="Email ID" onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="hidden">
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplying Brand</label>
                  <select class="form-control" id="sbrand" name="sbrand" onKeyPress="return tabE(this,event)">
				  <option value="">--Select The Brand--</option>
				  <?php 
				  $ssc="select * from m_spare_brand where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['sid']; ?>"><?php echo $FEssc['sbrand']; ?></option>
				  <?php } ?>
				  </select>
                </div>  </div>
			
				
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Opening Balance</label>
                 <input type="text" class="form-control" name="opening_balance" id="opening_balance" placeholder="Opening Balance" onKeyPress="return tabE(this,event)">
                </div>
				
		
				
				
            </div>


			
				<h4 class="box-title">Shipping Details |</h4> 
				
				
              <div class="box-body">
			  
			  
                <div class="form-group col-sm-4">
                  <label for="Branch">Supplier Name</label>
                  <input type="text" class="form-control" name="shipping_name" id="shipping_name" placeholder="Supplier Name" onfocus="CopyBilling();" onKeyPress="return tabE(this,event)" required>
                  <input type="hidden" class="form-control" name="franchisee_id"  id="franchisee_id" value="<?php echo $var['id']; ?>" readonly placeholder="Pid" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required> 
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Supplier Mobile</label>
                  <input type="text" class="form-control" name="shipping_mobile1" id="shipping_mobile1" placeholder="Supplier Mobile" onKeyPress="return tabE(this,event)">
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier Secondary Mobile</label>
                  <input type="text" class="form-control" name="shipping_mobile2" id="shipping_mobile2" placeholder="Secondary Mobile" onKeyPress="return tabE(this,event)">
                </div>
			
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier Address</label>
                  <textarea class="form-control" name="shipping_address" id="shipping_address" placeholder="Supplier Addres" onKeyPress="return tabE(this,event)"></textarea>
                </div>
				
					<div class="form-group col-sm-4">
                  <label for="Branch">Supplier City</label>
                  <input type="text" class="form-control" name="shipping_city" id="shipping_city" placeholder="Supplier City" onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier State</label>
                <select class="form-control" id="shipping_state" name="shipping_state" onKeyPress="return tabE(this,event)">
				<option selected="selected">Select the State</option>
				  <option >TAMILNADU</option>
                  <option>KERALA</option>
				  <option>ANDHRA PRADESH</option>
				  <option>KARNATAKA</option>
				  <option>MAHARASHTRA</option>
				  <option>MADHYA PRADESH</option>
				  <option>UTTAR PRADESH</option>
				  <option>RAJASTHAN</option>
				  <option>BIHAR</option>
				  <option>ODISSA</option>
				  <option>JAMMU & KASHMIR</option>
				  <option>ASSAM</option>
				  <option>HARYANA</option>
				  <option>ARUNACHAL PRADESH</option>
				  <option>GUJARAT</option>
				  <option>CHHATTISGARH</option>
				  <option>GOA</option>
				  <option>HIMACHAL PRADESH</option>
				  <option>JHARKHAND</option>
				  <option>MANIPUR</option>
				  <option>MEGHALAYA</option>
				  <option>MIZORAM</option>
				  <option>NAGALAND</option>
				  <option>PUNJAB</option>
				  <option>SIKKIM</option>
				  <option>TELANGANA</option>
				  <option>TRIPURA</option>
				  <option>UTTARAKHAND</option>
				  <option>WEST BENGAL</option>
				</select>
                </div>
			
				
				
				<div class="col-md-12"></div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Email ID</label>
                 <input type="email" class="form-control" name="shipping_email" id="shipping_email" placeholder="Email ID" onKeyPress="return tabE(this,event)">
                </div>

</div>

				
				
              <div class="box-body">
			  
			  <div class="form-group col-sm-4">
                  <label for="Branch">Ledger Group</label>
				  <select class="form-control" name="ledger_group" id="ledger_group" onKeyPress="return tabE(this,event)" >
				  <?php
				  $lg="select * from m_ledger_group where id='21'";
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
				
					<div class="form-group col-sm-4">
                  <label for="Branch">Supplier GST No</label>
                  <input type="text" class="form-control" name="GstNo" id="GstNo" placeholder="Supplier GST No" onKeyPress="return tabE(this,event)">
                </div>

	
				<div class="form-group col-sm-4">
                  <label for="Branch">Description</label>
                  <textarea class="form-control" name="sdescription" id="sdescription" placeholder="Description" onKeyPress="return tabE(this,event)"></textarea>
                </div>

                
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
	
	  <section class="content container-fluid" hidden>
       
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>S.No</th>
                  <th>Supplier Name</th>
				  <th>Mobile 1</th>
				  <th>City</th>
				  <th>Status</th>
				  <th>Action</th>
				  <th>View</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from  m_supplier where status='Active' and franchisee_id='".$_SESSION['BranchId']."' order by sid desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo $FEss['sname'];  ?></td>
				  <td><?php  echo $FEss['smobile1']; ?></td>
				  <td><?php  echo $FEss['scity']; ?></td>
				  <td><?php  echo $FEss['status']; ?></td>
				  <td><a href="m_supplier_edit.php?id=<?php  echo $FEss['sid']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a> 
				</td>  
				<td><a href="m_supplier_details_view.php?id=<?php  echo $FEss['sid']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a> 
				</td>
                  
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
 

 
</body>
</html>
