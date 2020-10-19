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
<script>
function getbranch(){
	
    var inputs = document.getElementById('company_name').value;
//alert("edfgjd"+inputs);
	$.ajax({
	type: "POST",
	
	url: "get_branch.php",
	
	data:{inputs:inputs},
	success: function(data){
		$("#cdetails").html(data);
		}
		});
}
</script>
<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Anchor start -->
<!--<a href="#" onClick="popup_window_show('#popup_window_id_B2562FB5F3577D989E47A6B8FB6A60D4', { pos : 'window-center', parent : this, x : 0, y : 0, width : 'auto' }); return false;">Open popup window</a>-->
<!-- Anchor end -->

<!-- Popup Window start -->

<!-- Popup Window end -->
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
        User Create
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
	<?php 
	$ss="select * from f_user_create";
$Ess=mysqli_query($conn,$ss);
$Fss=mysqli_fetch_array($Ess);
$ns=mysqli_num_rows($Ess);
$ns1=$ns+0001;
$dc="US".$ns1;
	
	?>
    <section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create User </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?php
			if(isset($_REQUEST['id'])!="")
			{
			$ct1="select * from t_category where id='".$_REQUEST['id']."'";
				$Ect1=mysqli_query($conn,$ct1);
				$Fct1=mysqli_fetch_array($Ect1);
			?>
            <form class="form-horizontal" method="post" action="category_edit.php?id=<?php echo $Fct1['id']; ?>">
              <div class="box-body">
                  
                <div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">Category Code</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="categorycode" id="categorycode" value="<?php echo $Fct1['code']; ?>" autocomplte="off" placeholder="Category Code" required>
                  </div>
                </div>
                <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Category Name</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="categoryname" autofocus="autofocus" id="categoryname" value="<?php echo $Fct1['category']; ?>" placeholder="Category Name" required>
                      </div>
                    </div>                   
                  <?php 
					if(isset($_REQUEST['category']))
				     {
					  ?>
					   <script type="text/javascript">
					   </script>
					   <?PHP
					   }
					   ?>
              </div>
              <!-- /.box-body -->
              
                <button type="submit" class="btn btn-default ">Cancel</button>
                <button type="submit" onClick="popup_window_show('#popup_window_id_B2562FB5F3577D989E47A6B8FB6A60D4', { pos : 'window-center', parent : this, x : 0, y : 0, width : 'auto' })" class="btn btn-info pull-right">Save Changes</button>
				
				

              </div>
              <!-- /.box-footer -->
            </form>
			<?php
			}
			else
			{
			
			?>
            <form class="form-horizontal" method="post" action="f_user_create_act.php" autocomplete="off">
              <div class="box-body">
                  <?php 
				  
			 $Es="select * from financial_year where fyear='".$_SESSION['FinancialYear']."'"; 
                $Eps=mysqli_query($conn,$Es);
               $duplicate=mysqli_fetch_array($Eps);
			   ?>
                <div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">User Code</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $dc; ?>" onKeyPress="return tabE(this,event)" required readonly="ture">
                  </div>
                </div>
         
		 
		 <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Finacial Year</label>
                      <div class="col-sm-4">
                        <select type="text" class="form-control" name="financial_year" id="financial_year"  placeholder="Category Name" required>
						 <?php
				  $sql="select * from f_financial_year";
				  $result=mysqli_query($conn,$sql);
				  while ($row = mysqli_fetch_array($result)) {
				  
				  ?>
				  <option value="<?php echo $row['financial_year']; ?>"><?php echo $row['financial_year']; ?></option>
				  <?php
				  }
				  
				  ?>
						</select>
                      </div>
                    </div> 
		 
		
					
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Vendor Name</label>
                      <div class="col-sm-4">
                        <select type="text" class="form-control" name="company_name" id="company_name" onChange="getbranch(this.value);" required>
						 				  <option value="">---Select The Company---</option>

						 <?php
				  $sql="select * from m_vendor where status='Active'";
				  $result=mysqli_query($conn,$sql);
				  while ($row = mysqli_fetch_array($result)) {
				  
				  ?>
				  <option value="<?php echo $row['vendor_id']; ?>"><?php echo $row['franchisee_name']; ?></option>
				  <?php
				  }
				  
				  ?>
						</select>
                      </div>
                    </div>
					
					
							  
				<div class="box-body">
				<div  id="cdetails" name="cdetails" > </div>	
				</div>
					
					
				
					
					
					 
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">User Name</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="user_name" id="user_name"  placeholder="User Name" required>
                      </div>
                    </div> 
					
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Password</label>
                   	  <div class="col-sm-4">
                        <input type="text" class="form-control" name="password" id="password"  placeholder="Password" required><input type="checkbox" checked="true" onclick="myFunction()">Show Password

                      </div>
                    
					</div>                   
                  
				   			<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Role</label>
                      <div class="col-sm-4">
                        <select type="text" class="form-control" name="role_name" id="role_name"  required>
						 				  <option value="">---Select The User Role---</option>

						 <?php
				  $sql="select * from user_role where status='Active'";
				  $result=mysqli_query($conn,$sql);
				  while ($row = mysqli_fetch_array($result)) {
				  
				  ?>
				  <option value="<?php echo $row['role_name']; ?>"><?php echo $row['role_name']; ?></option>
				  <?php
				  }
				  
				  ?>
						</select>
                      </div>
                    </div>
					
					
				  
              </div>
						  <div class="box-body" hidden>
				<div class="box-header with-border">
					<h3 class="box-title"> User Access Pages</h3>
				</div>
			    <?php 
			    $slm="select id,category,cicon,url from t_lmenu where parent='0'";
				$Eslm=mysqli_query($conn,$slm);
				$i=0;
				while($FEslm=mysqli_fetch_array($Eslm))
				{
					$i++;
				?>
				<div class="form-group">
				<div class="col-sm-2"></div>
<div class="col-sm-4 checkbox">
	<label><input type="checkbox" name="check_list[]" id="check_list[]" class="<?php echo "checked_all".$FEslm['id']; ?>" value="<?php echo $FEslm['id']; ?>"><b><?php echo $i.". ".$FEslm['category']; ?></b></label>
	<?php 
	$ssc1="select id,category,cicon,url from t_lmenu where parent='".$FEslm['id']."'";
	$Essc1=mysqli_query($conn,$ssc1);
	$nsc1=mysqli_num_rows($Essc1);
	$j=0;
	while($FEssc1=mysqli_fetch_array($Essc1))
	{
		$j++;
	?>
	<div class="form-group">
	<div class="col-sm-2"></div>
	<div class="col-sm-8 checkbox">
<label>
<input type="checkbox" name="check_list[]" id="check_list[]" class="<?php echo "checkbox".$FEslm['id']; ?>" value="<?php echo $FEssc1['id']; ?>"><?php echo  $i.". ".$j.". ".$FEssc1['category']; ?>
</label>		
	</div>	
	<div class="col-sm-2">
	<label><input type="checkbox" name="<?php echo "check_listi".$FEssc1['id']; ?>" id="<?php echo "check_listi".$FEssc1['id']; ?>" class="<?php echo "checkbox".$FEslm['id']; ?>" value="<?php echo $FEssc1['id']; ?>"><i class="fa fa-plus" aria-hidden="true" title="Create"></i></label>
	<label><input type="checkbox" name="<?php echo "check_liste".$FEssc1['id']; ?>" id="<?php echo "check_liste".$FEssc1['id']; ?>" class="<?php echo "checkbox".$FEslm['id']; ?>" value="<?php echo $FEssc1['id']; ?>"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></label>
	<label><input type="checkbox" name="<?php echo "check_listd".$FEssc1['id']; ?>" id="<?php echo "check_listd".$FEssc1['id']; ?>" class="<?php echo "checkbox".$FEslm['id']; ?>" value="<?php echo $FEssc1['id']; ?>"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></label>
	<label><input type="checkbox" name="<?php echo "check_listv".$FEssc1['id']; ?>" id="<?php echo "check_listv".$FEssc1['id']; ?>" class="<?php echo "checkbox".$FEslm['id']; ?>" value="<?php echo $FEssc1['id']; ?>"><i class="fa fa-eye" aria-hidden="true" title="View"></i></label>
	</div>	
	</div>
	<?php } ?>
</div>
				<div class="col-sm-6"></div>				
				</div>
				<?php } ?>				
			  </div>  
			  
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default ">Cancel</button>
                <button onClick="return confirm('Are You Sure Want to Save?');" type="submit" class="btn btn-info pull-right">Save Changes</button>
              </div>
              <!-- /.box-footer -->
            </form>
			<?php
			}
			?>
          </div>
        </div>
      </div>
      <div class="hidden">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category Code</th>
                  <th>Category Name</th>
                  <th width="15%">Edit / Delete</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ct="select * from t_category";
				$Ect=mysqli_query($conn,$ct);
				while($Fct=mysqli_fetch_array($Ect))
				{
				?>
                <tr>
                  <td><?php echo $Fct['code']; ?></td>
                  <td><?php echo $Fct['category']; ?></td>
                  <td>
                      <a href="category.php?id=<?php echo $Fct['id']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a>
                      <a href="category_delete.php?id=<?php echo $Fct['id']; ?>" onClick="popup_window_show('#popup_window_id_33ED1F5BB26C0F584EEC6292161E14FB', { pos : 'window-center', parent : this, x : 0, y : 0, width : 'auto' });;" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a>
                  </td>
                </tr>
				<?php
				}
				?>
                  </tbody>
                <tfoot>
                <tr>
                  <th>Category Code</th>
                  <th>Category Name</th>
                  <th>Edit / Delete</th>
                </tr>
                </tfoot>
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
 
 <script type="text/javascript">        
		<?php 
		 $slm="select id,category,cicon,url from t_lmenu where parent='0'";
				$Eslm=mysqli_query($conn,$slm);
				$i=0;
				while($FEslm=mysqli_fetch_array($Eslm))
				{		
		?>
		$('.<?php echo "checked_all".$FEslm['id']; ?>').on('change', function() {     
                $('.<?php echo "checkbox".$FEslm['id']; ?>').prop('checked', $(this).prop("checked"));              
        });
        //deselect "checked all", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
        $('.<?php echo "checkbox".$FEslm['id']; ?>').change(function(){ //".checkbox" change 
            if($('.<?php echo "checkbox".$FEslm['id']; ?>:checked').length == $('.<?php echo "checkbox".$FEslm['id']; ?>').length){
                   $('.<?php echo "checked_all".$FEslm['id']; ?>').prop('checked',true);
            }else{
                   $('.<?php echo "checked_all".$FEslm['id']; ?>').prop('checked',false);
            }
        });	
				<?php } ?>		
    </script>
</body>
</html>