<?php
error_reporting(0);
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
      <h1>
       Role Create 
        <small></small>
      </h1>
    </section>
   <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
                <strong>Role Created Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			  <div class="alert alert-success">
              <b> Role Updated Successfully!<i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  <?php if($_REQUEST['a']!="") {?> 
			  <div class="alert alert-warning">
                 Role <b>already</b> exiting! <i class="fa fa-warning" style="font-size:30px;color:white"></i>
              </div> <?php } ?></div>
             
			  
    <!-- Main content -->
    <section class="content container-fluid">
      
            <h4><div align="right" style=" border::groove; color:#00BFFF"> <a href="f_role_create.php"><button>Add New Role</button></a> </div></h4>
            <!-- /.box-header -->
            <!-- form start -->
					
				<?php
			if(isset($_REQUEST['id'])!="")
			{
			$ct1="select * from f_user_create where id='".$_REQUEST['id']."'";
				$Ect1=mysqli_query($conn,$ct1);
				$Fct1=mysqli_fetch_array($Ect1);
			?>
            <form class="form-horizontal" method="post" action="f_role_create_edit.php?id=<?php echo $Fct1['id']; ?>">
              <div class="box-body">
                  
               <div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">User Code</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $Fct1['user_id']; ?>" onKeyPress="return tabE(this,event)" required readonly="ture">
                  </div>
                </div>
                <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Finacial Year</label>
                      <div class="col-sm-4">
                 <select  class="form-control" name="financial_year" id="financial_year" value=<?php echo $Fct1['financial_year']; ?> required>
							 
				 <?php
                      $Es1="select * from f_financial_year where status='Active'"; 
                       $Eps1=mysqli_query($conn,$Es1);
                       while($duplicate1=mysqli_fetch_array($Eps1)){
				  ?>

				   <option value="<?php echo $duplicate1['financial_year']; ?>" <?php if($duplicate1['financial_year']==$Fct1['financial_year']){ ?>selected <?php }?>><?php echo $duplicate1['financial_year']; ?></option>
			  <?php } ?>
					</select>				  
                      </div>
                    </div> 
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">User Name</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="user_name" id="user_name" value="<?php echo $Fct1['user_name']; ?>"  placeholder="User Name" readonly="true">
                      </div>
                    </div> <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Company </label>
                      <div class="col-sm-4">
                        <select type="text" class="form-control" name="company_name"  id="company_name" >
												<option></option>

						 <?php
						 
				//  $sqlf="select * from m_franchisee";
				//  $sql="SELECT m_franchisee.franchisee_name FROM `m_franchisee` left join company ON m_franchisee.franchisee_id=company.id AND "
				  $sqlf="select * from m_vendor";
				  $resultf=mysqli_query($conn,$sqlf);
				  while ($rowf = mysqli_fetch_array($resultf))
				  {
				  if($Fct1['company_name']==$rowf['vendor_id'])
				  {
				  ?>
				  <option value="<?php echo $rowf['vendor_id']; ?>" selected><?php echo $rowf['franchisee_name']; ?></option>
				  <?php
				  }
				  else
				  {
				  ?>
				  <option value="<?php echo $rowf['vendor_id']; ?>"><?php echo $rowf['franchisee_name']; ?></option>
				  <?php
				  }
				  
				  }
				  ?>
						</select>
                      </div>
                    </div> <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Password</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="password" id="password" value="<?php echo $Fct1['password']; ?>"  placeholder="Password" required>
                      </div>
                    </div>  

                   <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Branch Name </label>
                      <div class="col-sm-4">
                        <select class="form-control" name="branch_name"  id="branch_name" >
						<option></option>
						 <?php						 
				echo  $sqlf1="select * from m_franchisee ";
				  $resultf1=mysqli_query($conn,$sqlf1);
				  while ($rowf1 = mysqli_fetch_array($resultf1))
				  {
				  if($Fct1['branch_name']==$rowf1['branch_id'])
				  {
				  ?>
				  <option value="<?php echo $rowf1['branch_id']; ?>" selected><?php echo $rowf1['franchisee_name']; ?></option>
				  <?php
				  }
				  else
				  {
				  ?>
				  <option value="<?php echo $rowf1['branch_id']; ?>"><?php echo $rowf1['franchisee_name']; ?></option>
				  <?php
				  }
				  
				  }
				  ?>
						</select>
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
			  
			  
			  
			  <div class="box-body">
				<div class="box-header with-border">
					<h3 class="box-title"> User Access Pages</h3>
				</div>
			    <?php 
				$uname=$Fct1['user_name'];
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
				<?php
				 $sup="select * from t_user_pages where uname='$uname' AND pageno='".$FEslm['id']."'";
				$Esup=mysqli_query($conn,$sup);
				$nup=mysqli_num_rows($Esup);
				
				
				$sa="SELECT id FROM `t_lmenu` where parent='".$FEslm['id']."'";
				$Esa=mysqli_query($conn,$sa);
				$nchild=mysqli_num_rows($Esa);
				
				$sap="select t3.t1id from (SELECT t1.id as t1id,t1.uname,t1.pageno,t2.parent,t2.id as t2id FROM t_user_pages t1 LEFT JOIN t_lmenu t2 on t1.pageno=t2.id AND t1.id IN (select id from t_user_pages where uname='$uname')) as t3 where uname='$uname' AND parent='".$FEslm['id']."'";
				$Esap=mysqli_query($conn,$sap);
				$nachild=mysqli_num_rows($Esap);
								
				$sup="select * from t_user_pages where uname='$uname' AND pageno='".$FEslm['id']."'";
				$Esup=mysqli_query($conn,$sup);
				$nup=mysqli_num_rows($Esup);
				
				//if($nup >'0')
				
			    if($nchild==$nachild)
				{
				?>
					<label><input type="checkbox" name="check_list[]" id="check_list[]" class="<?php echo "checked_all".$FEslm['id']; ?>" value="<?php echo $FEslm['id']; ?>" checked="true"><b><?php echo $i.". ".$FEslm['category']; ?></b></label>
				<?php }
				else
				{	?>	
					<label><input type="checkbox" name="check_list[]" id="check_list[]" class="<?php echo "checked_all".$FEslm['id']; ?>" value="<?php echo $FEslm['id']; ?>"><b><?php echo $i.". ".$FEslm['category']; ?></b></label>
				<?php } ?>
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
					
					
					
					<?php
				 $sup1="select * from t_user_pages where uname='$uname' AND pageno='".$FEssc1['id']."'";
				$Esup1=mysqli_query($conn,$sup1);
				$nup1=mysqli_num_rows($Esup1);
				if($nup1 >'0')
				{
				?>
					<label><input type="checkbox" name="check_list[]" id="check_list[]" class="<?php echo "checkbox".$FEslm['id']; ?>" value="<?php echo $FEssc1['id']; ?>" checked="true"><?php echo  $i.". ".$j.". ".$FEssc1['category']; ?></label>
				<?php }
				else
				{	?>	
					<label><input type="checkbox" name="check_list[]" id="check_list[]" class="<?php echo "checkbox".$FEslm['id']; ?>" value="<?php echo $FEssc1['id']; ?>"><?php echo  $i.". ".$j.". ".$FEssc1['category']; ?></label>

				<?php } ?>
					<?php 
					$ssc2="select id,category,cicon,url from t_lmenu where parent='".$FEssc1['id']."'";
					$Essc2=mysqli_query($conn,$ssc2);
					$nsc2=mysqli_num_rows($Essc2);
					$k=0;
					while($FEssc2=mysqli_fetch_array($Essc2))
					{
						$k++;
		    		?>
					<div class="form-group">
				    <div class="col-sm-2"></div>
				    <div class="col-sm-8 checkbox">
					
					<?php
					 $sup2="select * from t_user_pages where uname='$uname' AND pageno='".$FEssc2['id']."'";
					$Esup2=mysqli_query($conn,$sup2);
					$nup2=mysqli_num_rows($Esup2);
					if($nup2 >'10')
					{
						
				?>
					<label><input type="checkbox" name="check_list[]" id="check_list[]" value="<?php echo $FEssc2['id']; ?>" checked="true"><i><?php echo $i.". ".$j.". ".$k.". ".$FEssc2['category']; ?></i></label>
					<?php }
				if($nup2 >'10')
				{	
				
			?>
					<label><input type="checkbox" name="check_list[]" id="check_list[]" value="<?php echo $FEssc2['id']; ?>"><i><?php echo $i.". ".$j.". ".$k.". ".$FEssc2['category']; ?></i></label>
				<?php } ?>
										
					</div>
					
				    </div>
					<?php } ?>
							
					
				    </div>
				    
<?php
if($nup1 >'0')
{
$srt="select * from t_user_pages where uname='$uname' AND pageno='".$FEssc1['id']."'";	
$Esrt=mysqli_query($conn,$srt);
$Fr=mysqli_fetch_array($Esrt);
?>
<div class="col-sm-2">
<label><input type="checkbox" name="<?php echo "check_listi".$FEssc1['id']; ?>" id="<?php echo "check_listi".$FEssc1['id']; ?>" class="<?php echo "checkbox".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>" <?php if($Fr['CreateData']>0) {?> checked="true" <?php } ?>><i class="fa fa-plus" aria-hidden="true"></i></label>
<label><input type="checkbox" name="<?php echo "check_liste".$FEssc1['id']; ?>" id="<?php echo "check_liste".$FEssc1['id']; ?>" class="<?php echo "checkbox".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>" <?php if($Fr['EditData']>0) {?> checked="true" <?php } ?>><i class="fa fa-edit" aria-hidden="true"></i></label>
<label><input type="checkbox" name="<?php echo "check_listd".$FEssc1['id']; ?>" id="<?php echo "check_listd".$FEssc1['id']; ?>" class="<?php echo "checkbox".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>" <?php if($Fr['DeleteData']>0) {?> checked="true" <?php } ?>><i class="fa fa-trash" aria-hidden="true"></i></label>
<label><input type="checkbox" name="<?php echo "check_listv".$FEssc1['id']; ?>" id="<?php echo "check_listv".$FEssc1['id']; ?>" class="<?php echo "checkbox".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>" <?php if($Fr['ViewData']>0) {?> checked="true" <?php } ?>><i class="fa fa-eye" aria-hidden="true"></i></label>
</div>
<?php 
}
if($nup1 <'1')
{
 ?>
<div class="col-sm-2">
<label><input type="checkbox" name="<?php echo "check_listi".$FEssc1['id']; ?>" id="<?php echo "check_listi".$FEssc1['id']; ?>" class="<?php echo "checkbox".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>"><i class="fa fa-plus" aria-hidden="true"></i></label>
<label><input type="checkbox" name="<?php echo "check_liste".$FEssc1['id']; ?>" id="<?php echo "check_liste".$FEssc1['id']; ?>" class="<?php echo "checkbox".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i></label>
<label><input type="checkbox" name="<?php echo "check_listd".$FEssc1['id']; ?>" id="<?php echo "check_listd".$FEssc1['id']; ?>" class="<?php echo "checkbox".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></label>
<label><input type="checkbox" name="<?php echo "check_listv".$FEssc1['id']; ?>" id="<?php echo "check_listv".$FEssc1['id']; ?>" class="<?php echo "checkbox".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></label>
</div>
 <?php } ?>
					
					
				    </div>
					<?php } ?>
				</div>
				<div class="col-sm-6"></div>
				
				</div>
				<?php } ?>
				
				
			  </div>
			  
			  
              <!-- /.box-body -->
              
                <button type="submit" class="btn btn-default ">Cancel</button>
                <button type="submit" onClick="return confirm('Are You Sure Want to Save?');" class="btn btn-info pull-right">Save Changes</button>
              <!-- /.box-footer -->
            </form>	
			<?php
			}
			?>
         
	  
	  
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available User Create</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S:No</th>
				  <th>Financial Year</th>
				  
				  <th>Company Name</th>
				  <th>User Name</th>
                  <th>Password</th>
                  <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ct="select f_user_create.*,m_vendor.franchisee_name from f_user_create left join m_vendor on f_user_create.company_name=m_vendor.vendor_id";
				$Ect=mysqli_query($conn,$ct);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
				$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $Fct['financial_year']; ?></td>
				    
					  <td><?php echo $Fct['franchisee_name']; ?></td>
					  <td><?php echo $Fct['user_name']; ?></td>
					    <td><?php echo $Fct['password']; ?></td>
                  <td>
                      <a href="f_role_create_view.php?id=<?php echo $Fct['id']; ?>" onClick="return confirm('Are You Sure Want to Edit?');" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a>
                     
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
	  </div>
    </section>
    <!-- /.content -->
  
  </div>
 
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
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